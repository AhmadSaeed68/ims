  <?php
      include_once"login/header.php";
      $id=$this->session->userdata('user_id');
      $user_id=$id->id;
  ?>
  <input type="text" hidden="true" id='user_id' value="<?=$user_id;?>">


  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
  <!-- DataTables CSS CDN -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
  <!-- Font Awesome CSS CDN -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
  <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css">
  
  <script>

  $(document).ready(function(){
     var datatable= $("#mytable").dataTable();
  });


  </script>


      <div class="container-fluid w3-padding-32">
          <div class="card border-primary mb-6 sm-6" style="max-width: 200rem;">
      <div class="card-header w3-center"> <span class="w3-center"> <i class="fa  fa-2x fa-bar-chart w3-text-yellow" ></i> Stock List</span> </div>
      
      <div class="card-body">
      
      <div class="container-fluid w3-padding-32">

  <div class="panel panel-default">
    <div class="panel-heading">
    <div class="pull pull-right w3-padding-24">
       
        <input type="button" class="btn btn-outline-success w3-red " data-toggle="modal" data-target="#add_category" value="Add Category" aria-hidden="true">
        <div id="add_category" class="modal" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add Category</h4>
        </div>
        <div class="modal-body">
        <?php //echo form_open("prd/add_category/{$user_id}");?>
        <form method="POST" action="">
              <div class="form-group">
                  <label for="usr">Category Name:</label>
                  <input type="text" class="form-control" id="category_name" name="category_name">
                  </div>
                  <div class="form-group">
                  <label for="pwd">Status:</label>
                  
                      <select class="form-control" name="category_status" id="category_status">
                        <option value="active">active</option>
                        <option value="inactive">Inactive</option>
                      </select>
              </div>
              <div class="form_group"><input type="submit" value="submit"  id="category_submit" name="category_submit"></div>
              
              
              </form>
            
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>

    </div>
  </div>
        </div>
    <div class="panel-body">
  <div class="col-sm-12">

          <table id="mytable" class="table table-bordered w3-black">
  <thead>
  <tr>
      <th><i class="glyphicon glyphicon-bookmark"></i>Category Id</th>
      <th><i class=" 
      glyphicon glyphicon-user w3-text-blue"></i>User Id</th>
  <th><i class="glyphicon glyphicon-open-file w3-text-red"></i>Category Name</th>
  <th><i class="glyphicon glyphicon-open-file w3-text-green"></i>Status</th>
  <th><i class="glyphicon glyphicon-open-file w3-text-blue"></i>Edit</th>
  <th><i class="glyphicon glyphicon-open-file w3-text-red"></i>Delete</th>
    
    
  </tr>

  </thead>
  <tbody>
  <?php 
    foreach($category as $query):
    ?>
        <tr>
      <td>
      <?= $query->category_id?>
      </td>
      <td>
      <?= $query->user_id?>
      </td>
      <td>
      <?= $query->category_name?>
      </td>
      <td>
      <?= $query->category_status?>
      </td>
      <td>
      <input type="button" class="btn btn-info btn-sm view_data" value="Edit" id="<?php echo $query->category_id; ?>">
      </td>
      <td>
      
      </td>
  </tr>
  <?php endforeach;?>
  </tbody>

  </table>



  </div>

  </div>

  </div>

      </div>
      </div>
      </div>
      </div>
      </div></div>
      </div>
      <div class="modal fade" id="phoneModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true" style="margin-top: -20px;">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header ">User Detail
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="myModalLabel"></h4>
        </div>
        <div class="modal-body">
        
          <!-- Place to print the fetched phone -->
          <div id="phone_result">
          
          ?>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script> 
  <!-- jQuery DataTables JS CDN -->
  <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
  <!-- Bootstrap JS CDN -->
  <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
  <!-- Bootstrap JS CDN -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script> 

    <script type="text/javascript">
    $(document).ready(function(){
      $("#category_submit").click(function(){
        
        var name=$("#category_name").val();
        var status=$("#category_status").val();
        var id=$("#user_id").val();
        
        $.ajax({
          type: 'POST',
          url  : "<?php echo base_url(); ?>prd/add_category",
          data: {category_name:name,category_status:status,id:id},
          success:  function(feedback){
            $('#feedback1').html(feedback);
             $('#add_category').modal('show');
             datatable.ajax.reload();
            // return false;
            
          }
        });
      });
  });
    </script> 
  <script type="text/javascript">

      // Start jQuery function after page is loaded
          $(document).ready(function(){
          // Initiate DataTable function comes with plugin
          $('#dataTable').DataTable();
          // Start jQuery click function to view Bootstrap modal when view info button is clicked
              $('.view_data').click(function(){
              // Get the id of selected phone and assign it in a variable called phoneData
                  var phoneData = $(this).attr('id');
                  // Start AJAX function
                  $.ajax({
                  // Path for controller function which fetches selected phone data
                      url: "<?php echo base_url() ?>prd/get_category_result",
                      // Method of getting data
                      method: "POST",
                      // Data is sent to the server
                      data: {phoneData:phoneData},
                      // Callback function that is executed after data is successfully sent and recieved
                      success: function(data){
                      // Print the fetched data of the selected phone in the section called #phone_result 
                      // within the Bootstrap modal
                          $('#phone_result').html(data);
                          // Display the Bootstrap modal
                          $('#phoneModal').modal('show');
                      }
              });
              // End AJAX function
          });
      });  
      </script>

      



  <?php include"login/footer.php"; ?>
  <div id="feedback1" class="feedback1"></div>
  



