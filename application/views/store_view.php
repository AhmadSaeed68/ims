<?php include "login/header.php";
$id=$this->session->userdata('user_id');

?>
<!-- Trigger the modal with a button -->

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" id="form" name="form">
          <div class="form-group">
          <input type="hidden" name="user_id" value="<?=$id->id;?>">
            <label class="control-label col-sm-2" for="name">Name</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="name" placeholder="Enter Store Name" name="name">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2" for="description">Description</label>
            <div class="col-sm-10">
            <textarea class="form-control" rows="5" name="description" id="description"></textarea>
            </div>
          </div>
          
          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <button type="submit" name="submit" id="submit" class="btn btn-default">Add</button>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<div class="container">

  <div class="panel panel-default">
    <div class="panel-heading w3-center w3-padding-24">
    <span class="fa-2x">
<i class="fa fa-deaf  w3-text-orange fa-fw"></i>  Store Detail
   </span>
<button type="button" class="btn btn-outline addstore w3-right btn-primary w3-black w3-hover-green btn-xs" id="addstore" data-toggle="modal" style="margin-bottom:20px;"><span class="fa fa-plus-square w3-text-red"></span> Add Store</button>

    </div>
    <div class="panel-body">
    <table class="table table-hover order_data" id="order_data">
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Description</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
    <?php
    foreach($data as $data):
    ?>
      <tr>
        <td><?=$data['id'];?></td>
        <td><?=$data['name'];?></td>
        <td><?=$data['description'];?></td>
        <td>
          <div class="dropdown">
            <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">Action
            <span class="caret"></span></button>
            <ul class="dropdown-menu">
              <li class="dropdown-header">Select One</li>
              <li class="divider"></li>
              <li><button class="w3-button w3-block w3-red delete" id="<?php echo $data['id']; ?>" >Delete</button></li>
              
              
              
              
            </ul>
          </div>
        </td>
      </tr>
    <?php endforeach;?>
      
    </tbody>
  </table>

    </div>
  </div>
</div>

  
</div>
  <!-- jQuery JS CDN -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <!-- jQuery DataTables JS CDN -->
  <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
  <!-- Bootstrap JS CDN -->
  <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
  <!-- Bootstrap JS CDN -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  <script>
  $(document).ready(function(){
        var orderdataTable = $('#order_data').DataTable({
      "order":[0,'desc'],
"columnDefs":[
{

"targets":[0,1,2],
"orderable":false,
},
],
  
});
    
  });
$('.addstore').click(function(){
$('#myModal').modal('show');
$('.modal-title').html("<i class='fa fa-plus'></i> Add Store");
$(document).on('submit','#form',function(event){

event.preventDefault();
var form_data=$(this).serialize();
    $.ajax({
    url: "<?php echo base_url() ?>store_controller/add_store",
    method:"POST",
    data:form_data,
    success:function(data){
          swal({
          title: "✅ New Vendor Added",
          text: data,
          icon: "success",
          });

    window.location = "<?php echo base_url() ?>store_controller/index";
    }
    });
});


});

 		     $(document).on('click', '.delete', function(){
                    var id = $(this).attr("id");
                                            swal({
                        title: "This will be Permanently Delete?",
                        text: "After this you will unable to recover",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                        })
                        .then((willDelete) => {
                        if (willDelete) {
                      $.ajax({
                    url:"<?php echo base_url() ?>store_controller/delete",
                    method:"POST",
                    data:{id:id},
                    success:function(data)
                    {
                        window.location = "<?php echo base_url() ?>store_controller/index";
                    
                }
                })
                            swal("Poof! Your imaginary file has been deleted!", {
                            icon: "success",
                            });
                        } else {
                            swal("Your imaginary file is safe!");
                        }
                        });
            
        
                  
          
           
         });
</script>