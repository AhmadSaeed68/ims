<?php include_once "login/header.php";  ?>
<!-- <style type="text/css">
// .bs-example{
margin: 20px;
// }
@media screen and //(min-width: 992px) {
// .modal-lg {
width: 1200px; /* New width for large modal */
//  }
//}
</style> -->
<div class="container w3-padding-64">
    <!-- <div class='jumbotron'>
            <h1 class='w3-center'><span class='     fa fa-telegram w3-text-orange'> </span> Order Detail</h1>
    </div> -->
    <div class="w3-container">
        <a id="add_more" class="btn btn-primary w3-right" >Make Purchase order</a>
        <!-- data-toggle="modal" href="#largeModal" -->
        <div class="panel panel-default">
            <div class="panel-heading w3-center w3-padding-24">
                <span class=" fa fa-thumb-tack fa-2x w3-text-blue">
                    Purchase Order
                </span>
            </div>
            <div class="panel-body">
                > <!-- Modal -->
                <!-- Large Modal HTML -->
                <div id="largeModal" class="modal fade">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title">Large Modal</h4>
                            </div>
                            <div class="modal-body">
                                <form id="dynamic_field">
                                    <legend class="w3-center w3-padding">
                                        <h1 class="w3-text-green">Make Purchase Order</h1>
                                    </legend>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-row">
                                                <div class="form-group col-sm-5">
                                                    <label for="pwd">Po Code:</label>
                                                    <span id="auto_po_code"></span>
                                                    <!-- <input type="text" required="" name="po_code" class="form-control"  id="po_code auto_po_code"> -->
                                                </div>
                                                <div class="form-group col-sm-5">
                                                    <label for="pwd">PO Date:</label>
                                                    <input type="date" class="form-control" name="date[]" id="date">
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group">
                                                    <label for="po_desc">Po Description:</label>
                                                    <textarea rows="4" cols="30" name="po_desc" id="po_desc" required=""></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="row">
                                                <div class="form-row">
                                                    <div class="form-group">
                                                        <button type="button" name="add" id="add" class="btn btn-success w3-right">+</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-row">
                                                    <div class="form-group col-md-5">
                                                        <label for="pwd">Item Code</label>
                                                        <span  id="span_item_details" >
                                                        </span>
                                                        <!-- <span id="user_resul"  name="item_code[]" class="show_data"></span> -->
                                                        <!-- <input type="number" class="form-control" required="" name="item_code[]" id="item_code"> -->
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label for="email">Item Quantity</label>
                                                        <input type="text" class="form-control" required="" name="item_quantity[]" id="item_quantity" onchange="myfun()">
                                                        <span class="w3-text-red" id="return_msg"></span>
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label for="pwd">Item Rate:</label>
                                                        <input type="number" class="form-control" required="" name="item_rate[]" id="item_rate" >
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    
                                </div>
                                <div class="modal-footer">
                                    
                                    <input type="submit" class="btn btn-success" name="submit" id="submit" value="submit">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">X</button>
                                </div></form>
                                
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="w3-responsive">
                            <table class="w3-table-all table-bordered w3-hoverable" id="order_data">
                                <thead>
                                    <tr class="w3-black">
                                        <th> <span class="fa fa-code-fork w3-text-teal"></span>Po Code</th>
                                        <!-- <th>Po Total</th> -->
                                        <th> <span class="fa fa-pencil-square-o w3-text-red"></span>Po Desc</th>
                                        <th><span class="fa fa-barcode w3-text-blue"></span>Item Code</th>
                                        <th><span class="
                                        fa fa-puzzle-piece w3-text-brown"></span>Item Qty</th>
                                        <th><span class="
                                        fa fa-registered w3-text-green"></span> Item Rate</th>
                                        <th><span class="fa fa-calendar w3-text-red"></span> Date</th>
                                        <th><span class="fa fa-cogs w3-text-orange"></span> Status</th>
                                        <th><span class="
                                        fa fa-newspaper-o w3-text-blue"></span> Order Report</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($order_data as $data):?>
                                    <tr>
                                        <td><?= $data['po_code']?></td>
                                        <!-- <td><?php// $data['po_total']?></td> -->
                                        <td><?= $data['po_description']?></td>
                                        <td><?= $data['item_code']?></td>
                                        <td><?= $data['item_qty']?></td>
                                        <td><?= $data['item_rate']?></td>
                                        <td><?= $data['date']?></td>
                                        <td>
                                            <?php $status=$data['status']; if($status=="active"){
                                            echo "<span class='w3-green'>Active</span>";
                                            }else{
                                            echo "<span class='w3-red'>Dective</span>";
                                        }?></td>
                                        <td>
                                            <span class="order_report_span" id="<?php echo $report=$data['order_report'];?>"></span> <?php $report=$data['order_report']; if($report=="recived"){
                                            echo "<span class='w3-text-teal fa fa-check-square-o fa-2x'></span><span class='w3-green'>Recived</span>";
                                            }else{
                                            echo "<span class='w3-text-orange fa fa-truck fa-2x'></span><span class='w3-deep-orange'>Pending</span>";;
                                            }?>
                                        </td>
                                        <td>
                                            <div class="dropdown">
                                                <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Action
                                                <span class="caret"></span></button>
                                                <ul class="dropdown-menu">
                                                    <li>  
                                                    <input type="button" class="w3-button w3-block w3-teal edit" value="Edit" id="<?php echo $data['po_code']; ?>">
                                                    </li>
                                                    <li>
                                                    <button class="w3-button w3-block w3-red delete" id="<?php echo $data['po_code']; ?>" data-status="<?=$data['status']?>">Delete</button>
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
    //
    $.ajax({
        url: "<?php echo base_url() ?>order_controller/auto_po_code",
        method: "POST",
        success: function(data)
        {
        $('#auto_po_code').html(data);
        }
    });                                             //
    $(document).ready(function(){
   
        $('.edit').click(function(){
        var order_id = $(this).attr('id');
       ;
        //Start AJAX function
        $.ajax({
        url: "<?php echo base_url() ?>order_controller/edit_order",
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
    // var order_id=$('#id').val();
    // var po_code=$('#po_code').val();
    // var po_description=$('#po_description').val();
    // var po_status=$('#status').val();
    // var item_code=$('#item_code').val();
    // var item_quantity=$('#item_quantity').val();
    // var item_rate=$('#item_rate').val();
    // var date=$('#date').val();
    var form_data = $(this).serialize();
    $.ajax({
    url: "<?php echo base_url() ?>order_controller/update_order",
    method:"POST",
    data:form_data,
    success:function(data)
    {
    alert(data);
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
            url: "<?php echo base_url() ?>order_controller/update_order",
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
    get_item();
    function get_item(){
    $.ajax({
    url: "<?php echo base_url() ?>order_controller/get_itemCode_in_order",
    method: "POST",
    success: function(data){
    // Print the fetched data of the selected phone in the section called #phone_result
    // within the Bootstrap modal
    $('#span_item_details').html(data);
    //$('#phoneModal').modal('show');
    }
    });
    }
    // End AJAX function
    // Purchase order modal
    //         $(document).ready(function(){
    //       var i=1;
    //       $('#add').click(function(){
    //            i++;
    //            $('#dynamic_field').append('<tr id="row'+i+'"><td><h2 class="w3-wide">Add Orders Detail</h2><hr><div class="form-row"><div class="form-group col-md-4"><label for="status">Item Code</label><input type="number" class="form-control" required="" name="item_code[]" id="item_code"></div><div class="form-row"><span id="user_resul" class="show_data"></span><div class="form-group col-md-4"><label for="item_quantity">Item Quantity</label> <input type="text" class="form-control" required="" name="item_quantity[]" id="item_quantity"></div><div class="form-group col-md-4"><label for="item_rate">Item Rate:</label><input type="number" class="form-control" required="" id="item_rate" name="item_rate[]"></div></div></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');
    //       });
    //       $(document).on('click', '.btn_remove', function(){
    //            var button_id = $(this).attr("id");
    //            $('#row'+button_id+'').remove();
    //       });
    //       $('#submit').click(function(){
    //         // var item_rate = [];
    //         //         $('.item_rate').each(function(){
    //         //                 item_name.push($(this).text());
    //         //                 });
    //         //                 alert(item_rate);
    //            $.ajax({
    //                 url:"<?php //echo base_url() ?>prd/make_order",
    //                 method:"POST",
    //                 // Last time set
    //                 data:$('#dynamic_field').serialize(),
    //                 success:function(data)
    //                 {
    //                      alert(data);
    //                      //$('#dynamic_field')[0].reset();
    //                 }
    //            });
    //       });
    //  });
    $(document).ready(function(){
    var id = $(".order_report_span").attr("id");
    if(id=='recived'){
    $('.edit').attr('disabled', 'disabled');
    }else{
    $('.edit').attr('disabled',false);
    }
    $('#add_more').click(function(){
    $('#largeModal').modal('show');
    $('#dynamic_field')[0].reset();
    $('.modal-title').html("<i class='fa fa-plus'></i> Purchase Order");
    $('#submit').val('submit');
    $('#span_product_details').html('');
    $('#add').click(function(){
    i=1;
    i++;
    var html='';
    html+='<div class="col-sm-6"></div><div class="col-sm-6"><tr id="row'+i+'"><td><div class="row">';
    html += '<hr><div class="form-row"><div class="form-group col-md-4">';
        html+='<label for="status">Item Code</label>';
        html+='<span id="span_data"></span>';
    html+='</div>';
    html+='<div class="form-group col-md-4"><label for="item_quantity">Item Quantity</label> ';
    html+='<input type="text" class="form-control" required="" name="item_quantity[]" id="item_quantity" onchange="myfun(this.value)"></div>';
    html+='<div class="form-group col-md-4"><label for="item_rate">Item Rate:</label>';
    html+='<input type="number" class="form-control" required="" id="item_rate" name="item_rate[]"></div>';
html+='</div></td><div class="form-row"><div class="col-sm-4"><td>';
html+='<button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button>';
html+='<button type="button" name="add" id="'+i+' add" class="btn btn-success w3-right">+</button>';
html+='</td></div></div></tr>';
$('#dynamic_field').append(html);
$.ajax({
url: "<?php echo base_url() ?>order_controller/get_itemCode_in_order",
method: "POST",
success: function(data){
// Print the fetched data of the selected phone in the section called #phone_result
// within the Bootstrap modal
$('#span_data').html(data);
//$('#phoneModal').modal('show');
}
});
});
});
$(document).on('click', '.btn_remove', function(){
var button_id = $(this).attr("id");
$('#row'+button_id+'').remove();
});
$(document).on('submit','#dynamic_field', function(event){
event.preventDefault();
$('#submit').attr('disabled', 'disabled');
var form_data = $(this).serialize();
$.ajax({
url:"<?php echo base_url() ?>order_controller/make_order",
method:"POST",
data:form_data,
success:function(data){
$('#dynamic_field')[0].reset();
$('#largeModal').modal('hide');
alert(data);
$('#submit').attr('disabled', false);
//  orderdataTable.ajax.reload();
}
});
});
});
$(document).on('click', '.delete', function(){
var order_code = $(this).attr("id");
var status = $(this).data("status");
var btn_action = "delete";
if(confirm("Are you sure you want to change status?"))
{
$.ajax({
url:"<?php echo base_url() ?>order_controller/order_status",
method:"POST",
data:{order_code:order_code, status:status, btn_action:btn_action},
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
function myfun(){
var item_code=$('#category_id').val();
var item_qty=$('#item_quantity').val();
$.ajax({
async: false,
url:'<?php echo base_url() ?>prd/chk_item_qty_in_order',
type:'POST',
data:{item_code:item_code,item_qty:item_qty},
success:function(result){
$('#return_msg').html(result);
}
});
}
</script>
<span id="span_data"></span>
<button class="btn"></button>