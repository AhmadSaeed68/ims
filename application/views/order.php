<?php include_once "login/header.php";  ?>
<div class="container">
    
    <div class="w3-container">
            <h2>Panel Heading</h2>
        <div class="panel panel-default">
            <div class="panel-heading">Order Managment
            <span class="w3-right">
            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#order_modal">Open Modal</button>
               </span> <!-- Modal -->
                <div id="order_modal" class="modal fade" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Make Order</h4>
                    </div>
                    <div class="modal-body">
                    <form action="" class="order" id="add_order">
                                <div class="form-group">
                                    <label for="email">ID</label>
                                    <input type="text" disabled class="form-control" placeholder="ID"  id="id">
                                </div>
                                <div class="form-group">
                                    <label for="pwd">Po Code:</label>
                                    <input type="text" class="form-control"  id="po_code">
                                </div>
                                <div class="form-group">
                                    <label for="email">Po Vendor</label>
                                    <input type="text" class="form-control"  id="po_vendor">
                                </div>
                                <div class="form-group">
                                <label for="email">Po Description</label>
                            <textarea rows="4" cols="50"></textarea>
                            
                        </div>
                        <div class="form-group">
                        <label for="pwd">Status</label>
                            <select class="form-control"  name="category_status" id="status">
                                <option value="active" name="active">active</option>
                                <option value="inactive" name="inactive">inactive</option>
                            </select>
                        </div>
                                <div class="form-group">
                                    <label for="pwd">Item Code</label>
                                    <span id="user_resul" class="show_data"></span>
                                </div>
                                <div class="form-group">
                                    <label for="email">Item Quantity</label>
                                    <input type="text" class="form-control"  id="item_quantity">
                                </div>
                                <div class="form-group">
                                    <label for="pwd">Item Rate:</label>
                                    <input type="text" class="form-control"  id="item_rate">
                                </div>
                                <div class="form-group">
                                    <label for="pwd">PO Date:</label>
                                    <input type="text" class="form-control"  id="date">
                                </div>
                                
                                <?php //echo form_submit(['name'=>'update','id'=>'update_order','type'=>'submit','value'=>'Update','class'=>'btn btn-primary']);?>
                                <button type="submit" class="btn btn-default update" class="update" id="update">Add</button>
                            </form>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                    </div>

                </div>
                </div>
           
            </div>
            <div class="panel-body">
            <div class="w3-responsive">
            <table class="w3-table-all table-bordered" id="order_data">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Po Code</th>
                        <th>Po Vendor</th>
                        <th>Po Total</th>
                        <th>Po Desc</th>
                        <th>Po Status</th>
                        <th>Item Code</th>
                        <th>Item Qty</th>
                        <th>Item Rate</th>
                        <th>Date</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($order_data as $data):?>
                    <tr>
                        <td><?= $data['id'];?></td>
                        <td><?= $data['po_code']?></td>
                        <td><?= $data['po_vendor']?></td>
                        <td><?= $data['po_total']?></td>
                        <td><?= $data['po_description']?></td>
                        <td><?= $data['po_status']?></td>
                        <td><?= $data['item_code']?></td>
                        <td><?= $data['item_qty']?></td>
                        <td><?= $data['item_rate']?></td>
                        <td><?= $data['date']?></td>
                        <td><input type="button" class="btn btn-info btn-sm edit" value="Edit" id="<?php echo $data['id']; ?>"></td>
                        <td><input type="button" class="btn btn-danger btn-sm delete" value="Delete" id="<?php echo $data['id']; ?>"></td>
                    
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

            <!-- 

                MOdal that load after gettinng data -
                
                
                -->

     <div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true" style="margin-top: -20px;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        <div class="modal-header ">User Detail
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="myModalLabel"></h4>
        </div>
        <div class="modal-body">
        
            <!-- Place to print the fetched phone -->
            <div id="result">
            
            </div>
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
        var dataTable=$("#order_data").dataTable();
    });
        //                                                 //
        //
        // This is data that view after click on edit button//
        //                                                  //
        //                                                  //

        $(document).ready(function(){
        
            $('#dataTable').DataTable();
            
                $('.edit').click(function(){
                
                    var order_id = $(this).attr('id');
                    //alert(user_id);
                    //Start AJAX function
                    $.ajax({
                            url: "<?php echo base_url() ?>prd/edit_order",
                            method: "POST",
                            data: {order_id:order_id},
                            success: function(data)
                            {
                        // Print the fetched data of the selected order in the modal
                        // within the Bootstrap modal
                            $('#result').html(data);
                            // Display the Bootstrap modal
                            $('#Modal').modal('show');
                            }
                });
                //End AJAX function
            });
        });  

// 
// 
// 
        // Update order data
// 
// 
//
        $(document).on('submit','#order_form',function(event){
            event.preventDefault();
            var order_id=$('#id').val();
            var po_code=$('#po_code').val();
            var po_vendor=$('#po_vendor').val();
            var po_description=$('#po_description').val();
            var po_status=$('#status').val();
            var item_code=$('#item_code').val();
            var item_quantity=$('#item_quantity').val();
            var item_rate=$('#item_rate').val();
            var date=$('#date').val();
            
            $.ajax({
                url: "<?php echo base_url() ?>prd/update_order",
                method:"POST",
                data:{
                    id:order_id,po_code:po_code,po_vendor:po_vendor,po_description:po_description,po_status:po_status
                    ,item_code:item_code,item_quantity:item_quantity,item_rate:item_rate,date:date
                },
                datatype:"json",
                success:function(data)
                {
                    alert(data);
                    dataTable.ajax.reload();
                    $('#Modal').modal('hide');
                    
                }
            });


        });
// 
// 
// 
        // ADD order data
// 
// 
//


$(document).on('submit','#add_order',function(event){
            event.preventDefault();
            var order_id=$('#id').val();
            var po_code=$('#po_code').val();
            var po_vendor=$('#po_vendor').val();
            var po_description=$('#po_description').val();
            var po_status=$('#status').val();
            var item_code=$('#item_code').val();
            var item_quantity=$('#item_quantity').val();
            var item_rate=$('#item_rate').val();
            var date=$('#date').val();
            
            $.ajax({
                url: "<?php echo base_url() ?>prd/update_order",
                method:"POST",
                data:{
                    id:order_id,po_code:po_code,po_vendor:po_vendor,po_description:po_description,po_status:po_status
                    ,item_code:item_code,item_quantity:item_quantity,item_rate:item_rate,date:date
                },
                datatype:"json",
                success:function(data)
                {
                    alert(data);
                    dataTable.ajax.reload();
                    $('#Modal').modal('hide');
                    
                }
            });


        });


        $(document).ready(function(){
            
            
                    $.ajax({
                    
                    url: "<?php echo base_url() ?>prd/get_itemCode_in_order",
                    method: "POST",
                        
                        success: function(data){
                        // Print the fetched data of the selected phone in the section called #phone_result 
                        // within the Bootstrap modal
                            $('#user_resul').html(data);
                        
                            //$('#phoneModal').modal('show');
                        }
                });
                // End AJAX function
            
        });


</script>

<button class="btn"></button>