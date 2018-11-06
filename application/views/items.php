<?php include_once"login/header.php";

$id=$this->session->userdata('user_id');

echo $id->id;

?>



<div class="container w3-padding-64">

<!-- <div class='jumbotron'>

<h1 class='w3-center'><span class='fa fa-file-text-o w3-text-blue-gray'> </span> Available items Detail</h1>



</div> -->

<div class="card-header w3-center"> </div>

<div class="w3-right"><input type="button" class=" btn btn-info btn-sm add_data" value="Add Item" id="<?php echo $id->id; ?>"></div>

<div class="panel panel-default">

<div class="panel-heading w3-center w3-padding-24">

   <span class=" fa fa-sitemap w3-text-green fa-2x">
       Items Detail
   </span>

    </div>

    <!-- Pannel tag -->

        <div class="panel-body">

        <table id="brand_data" class="table table-bordered table-striped">

<thead>

    <tr>

        <th>

            <i class="glyphicon glyphicon-bookmark"></i>item Id

        </th>

        <th>

            <i class="glyphicon glyphicon-user w3-text-blue"></i>category ID

        </th>

        <th>

            <i class="glyphicon glyphicon-open-file w3-text-red"></i>Category Name

        </th>

        <th>

            <i class="fa fa-list-alt w3-text-red"></i>Item Name

        </th>

        <th>

            <i class="fa fa-barcode w3-text-blue"></i>item Code

        </th>

        <th>

            <i class="fa fa-newspaper-o w3-text-green"></i>Item Description

        </th>



        <th>

            <i class="fa fa-heartbeat w3-text-orange"></i>Item Status

        </th>

        <!-- <th>

            <i class="fa fa-heartbeat w3-text-orange"></i>Item Quantity

        </th> -->

        <th>

            <i class="fa fa-scissors w3-text-orange"></i>Action

        </th>


    

    

    </tr>



</thead>

    <tbody>

        <?php 

        foreach($item as $item):

        ?>

    <tr>

        <td>

            <?= $item['item_id']?>

        </td>

        <td>

            <?= $item['category_id']?>

        </td>

        <td>

            <?= $item['category_name']?>

        </td>

        <td>

            <?=$item['item_name']?>

        </td>

        <td>

            <?=$item['item_code']?>

        </td>

        <td>

            <?=$item['item_description']?>

        </td>

        

        <td>
<?php $status=$item['item_status']; if($status=="active"){
                                            echo "<span class='w3-green'>Active</span>";
                                            }else{
                                            echo "<span class='w3-red'>Dective</span>";
                                        }?>
            
        </td>

        <!-- <td>

            <?php //$item['item_qty']?>

        </td> -->
 <td> <div class="dropdown">
                                        <button class="btn w3-orange btn-default dropdown-toggle" type="button" data-toggle="dropdown">Action
                                        <span class="caret"></span></button>
                                        <ul class="dropdown-menu">

                                            <li>  <input type="button" class="w3-btn w3-block w3-orange edit" value="Edit" id="<?=$item['item_id']?>"></li>
                                            <li> 
                                                <button class="w3-button w3-block w3-red delete" id="<?=$item['item_id']?>" data-status="<?=$item['item_status']?>">Change Status</button>
                                            </li>
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



<!-- view Modal -->

    <div class="modal fade" id="phoneModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true" style="margin-top: -20px;">

    <div class="modal-dialog modal-lg">

        <div class="modal-content">

        <div class="modal-header">

            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

            <h4 class="modal-title" id="myModalLabel"></h4>

        </div>

        <div class="modal-body">

            <!-- Place to print the fetched phone -->

            <div id="phone_result"></div>

        </div>

        <div class="modal-footer">

        

            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

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
      
         var dataTable = $('#brand_data').DataTable({
            "order":[0,'desc'],
            "columnDefs":[
    {
      
     "targets":[0,2,3,4,5,6,7,8],
     "orderable":false,
    },
   ],
          });
        });

    $(document).ready(function(){
            // Initiate DataTable function comes with plugin
            $('#dataTable').DataTable();
            // Start jQuery click function to view Bootstrap modal when view info button is clicked
                $('.add_data').click(function(){
                // Get the id of selected phone and assign it in a variable called phoneData
                    var phoneData = $(this).attr('id');
                    // Start AJAX function
                    $.ajax({
                    
                    url: "<?php echo base_url() ?>items_controller/get_item",
                    method: "POST",
                        data: {phoneData:phoneData},
                        success: function(data){
                        // Print the fetched data of the selected phone in the section called #phone_result 
                        // within the Bootstrap modal
                            $('#phone_result').html(data);
                        
                            $('#phoneModal').modal('show');
                             $('.modal-title').html("<i class='fa fa-plus w3-text-green'></i> <span class='w3-text-blue'>Add Items</span> ");
                        }
                });
                // End AJAX function
            });
        });  
  
        $(document).on('submit','#item_form',function(event){
            event.preventDefault();
            var itemName=$('#item_name').val();
            var category_id=$('#category_id').val();
            var item_code=$('#item_code').val();
            var item_desc=$('#item_desc').val();
            // var item_qty=$('#item_qty').val();
        if(itemName !='' && category_id !='' && item_code !='' && item_desc !=''){
                $.ajax({
                    url: "<?php echo base_url() ?>items_controller/add_item",
                    method:'POST',
                    data:{itemName:itemName,category_id:category_id,item_code:item_code,item_desc:item_desc},
                    //data:new FormData($this),
                    //contentType:false,
                    //processData:false,
                    success:function(data){
                        $('.msg').html(data);
                        alert('Successful insert');
                        $('#item_form')[0].reset();
                        $('#phoneModal').modal('hide');
                        dataTable.ajax.reload();
                    }
                });
        }else
        {
            alert('All fields are required');
        }
        });

        $(document).on('click','.edit',function(){
            var item_id=$(this).attr('id');
            $.ajax({
                url: "<?php echo base_url() ?>items_controller/fetch_item",
                method:"POST",
                data:{item_id:item_id},
                //datatype:"json",
                success:function(data)
                {
                    $('#phone_result').html(data);
                    $('#phoneModal').modal('show');
                     $('.modal-title').html("<i class='fa fa-plus w3-text-orange'></i> <span class='w3-text-orange'>Update Items</span> ");
                    
                }
            });
        });
        
       


             $(document).on('click', '.delete', function(){
            var item_id = $(this).attr("id");
            var status = $(this).data("status");
            var btn_action = "delete";
            if(confirm("Are you sure you want to change status?"))
            {
            $.ajax({
            url: "<?php echo base_url() ?>items_controller/item_status",
            method:"POST",
            data:{item_id:item_id, status:status, btn_action:btn_action},
            success:function(data)
            {
            alert(data);
            orderdataTable.ajax.reload();
            }
            })
            }
            else
            {
            return false;
            }
                    });


   
        $(document).on('submit','#editupdate',function(event){
        
            event.preventDefault();
            var item_id=$('#item_id').val();
            var category_id=$('#category_id').val();
            var item_name=$('#item_name').val();
            var item_code=$('#item_code').val();
            var item_description=$('#item_description').val();
            var item_status=$('#item_status').val();
            
            
        if(item_id !='' && category_id !='' && item_code !='' && item_description !=''&& item_name !=''&& item_status !=''){
                $.ajax({
                    url: "<?php echo base_url() ?>items_controller/update_item",
                    method:'POST',
                    data:{item_name:item_name,category_id:category_id,item_code:item_code,item_id:item_id,item_code:item_code,item_status:item_status,item_description:item_description},
                    //data:new FormData($this),
                    //contentType:false,
                    //processData:false,
                    success:function(data){
                        alert('Update successfull');
                        //$('.msg').html(data);
                        //alert(' Update Successfuly');
                        $('#update_item_form')[0].reset();
                        $('#phoneModal').modal('hide');
                        dataTable.ajax.reload();
                    }
                });
        }else
        {
            alert('All fields are required');
        }
        });
    </script>
<span class="msg"></span>
<?php include_once "login/footer.php"; ?>