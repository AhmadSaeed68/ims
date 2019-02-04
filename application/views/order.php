<?php include_once "login/header.php";
$id=$this->session->userdata('user_id');
?>
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
<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-bar-block w3-white w3-animate-left w3-text-grey w3-collapse w3-top w3-center" style="z-index:3;width:300px;font-weight:bold" id="mySidebar"><br>
    <a href="largeModal" class="btn btn-primary w3-padding-64 w3-bar-item w3-button w3-border-bottom w3-large adddata w3-right" id="add_more" data-toggle="modal">Make Purchase Order <i class="w3-padding fa fa-pencil"></i></a>
    <a href="javascript:void(0)" onclick="w3_close()" title="Close Sidemenu"
    class="w3-bar-item w3-button w3-hide-large w3-large">Close <i class="fa fa-remove"></i></a>
    
    
    <a id="myBtn" onclick="myFunc('Demo1')" href="javascript:void(0)" class="w3-bar-item w3-button"><i class="fa fa-inbox w3-margin-right"></i>Search Records (3)<i class="fa fa-caret-down w3-margin-left"></i></a>
    <div id="Demo1" class="w3-hide w3-animate-left">
        <a href="javascript:void(0)" class="w3-bar-item w3-button w3-border-bottom test w3-hover-light-grey" onclick="openMail('Borge');w3_close();" id="firstTab">
            <div class="w3-container">
                <form id="form-filter">
                    <div class="input-daterange"> <p><label><i class="fa fa-calendar-check-o"></i> From</label></p>
                    <input class="form-control w3-border" type="text" placeholder="DD MM YYYY" name="from_date" id="from_date" required>
                    <p><label><i class="fa fa-calendar-o"></i> TO</label></p>
                <input class="form-control w3-border" type="text" placeholder="DD MM YYYY" id="to_date" name="to_date" required></div>
                
                <br>
                <hr>
                <div class="form-group">
                    
                    <button type="button" id="btn-filter" class="btn btn-primary w3-hover-teal">Filter</button>
                    <button type="button" id="btn-reset" class="btn btn-default w3-hover-green">Reset</button>
                    
                </div>
            </form>
            
        </div>
    </a>
    
    
    
    
    
</div>
<span  class="w3-bar-item w3-light-grey w3-button"><i class="fa fa-inbox w3-margin-right"></i>Downloads<i class="fa w3-margin-left"></i></span>
<div class="row">
    <div class="col-sm-6">
        <li><a href="<?php echo base_url()?>pdf/po_order_pdf" target="_blank"><span class="
        fa fa-file-pdf-o w3-text-red fa-2x"></span> PDF</a></li>
    </div>
    <div class="col-sm-6">
        <li><a href="<?php echo base_url("order_controller/export_csv")?>"><span class="
        fa fa-file-excel-o w3-text-green fa-2x"></span> CSV</a></li>
    </div>
</div>
<span   class="w3-bar-item w3-light-grey " style="margin-top: 30px;"><i class="fa fa-cloud-upload w3-margin-right"></i>Upload CSV<i class="fa w3-margin-left"></i></span>
<div class="row">
    <div class="col-sm-12">
        
        
        <form method="post" id="import_csv" enctype="multipart/form-data">
            <div class="form-group" style="margin-top: 20px;">
                <label class="w3-text-deep-orange">Select CSV File</label>
                <input type="file" name="csv_file" id="csv_file" required accept=".csv" />
            </div>
            <br />
            <button type="submit" name="import_csv" class="w3-btn w3-blue fa fa-cloud-upload w3-hover-teal" id="import_csv_btn"> Upload CSV</button>
        </form>
        <br />
        <div id="import_csv_data"></div>
        
    </div>
</div>
<!-- UPload File to csv -->
</nav>
<!-- Top menu on small screens -->
<header class="w3-container w3-top w3-hide-large w3-white w3-xlarge w3-padding-16">
<span class="w3-left w3-padding">SOME NAME</span>
<a href="javascript:void(0)" class="w3-right w3-button w3-white" onclick="w3_open()">☰</a>
</header>
<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>
<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px">
<div class="row w3-padding-64">
    
    <div class="col-sm-12">
        <div class="container-fluid">
            <!-- <div class='jumbotron'>
                <h1 class='w3-center'><span class='     fa fa-telegram w3-text-orange'> </span> Order Detail</h1>
            </div> -->
            
            <a id="add_more" data-toggle="modal" class="btn btn-primary w3-right">Make Purchase order</a>
            <!-- data-toggle="modal" href="#largeModal" -->
            <div class="panel panel-default">
                <!-- <button id="btn" class="w3-btn w3-black"><span class="fa fa-search w3-text-orange"></span> Filter</button>
                <form id="form-filter" class="form-inline ">
                    <div class="input-daterange">
                        <div class="form-group">
                            <label><i class="fa fa-calendar-check-o"></i> From</label>
                            <input class="form-control w3-border" type="text" placeholder="DD MM YYYY" name="from_date" id="from_date" required>
                        </div>
                        <div class="form-group">
                            <label><i class="fa fa-calendar-o"></i> TO</label>
                            <input class="form-control w3-border" type="text" placeholder="DD MM YYYY" id="to_date" name="to_date" required>
                        </div></div>
                        
                        <div class="form-group">
                            
                            <button type="button" id="btn-filter" class="btn btn-primary">Filter</button>
                            <button type="button" id="btn-reset" class="btn btn-default">Reset</button>
                            
                        </div>
                    </form> -->
                    <div class="panel-heading w3-center w3-padding-24">
                        <!--  <div class="w3-right">
                            
                            <div class="dropdown">
                                <button class="btn w3-orange dropdown-toggle" type="button" data-toggle="dropdown">Download
                                <span class="caret"></span></button>
                                <ul class="dropdown-menu">
                                    <li><a href="#"><span class="
                                    fa fa-file-pdf-o w3-text-red fa-2x"></span> PDF</a></li>
                                    <li><a href="<?php echo base_url("order_controller/export_csv")?>"><span class="
                                    fa fa-file-excel-o w3-text-green fa-2x"></span> CSV</a></li>
                                </ul>
                            </div>
                        </div> -->
                        <span class=" fa fa-thumb-tack fa-2x w3-text-blue">
                            Purchase Order
                        </span>
                    </div>
                    <div class="panel-body">
                        <div class="w3-responsive">
                            <!-- <table class="w3-table-all table-bordered w3-hoverable" id="order_data">
                                <thead>
                                    <tr class="w3-black">
                                        <th> <span class="fa fa-code-fork w3-text-teal"></span>Po Code</th>
                                        <th> <span class="fa fa-code-fork w3-text-teal"></span>PO Vendor</th>
                                        
                                        <th> <span class="fa fa-pencil-square-o w3-text-red"></span>Po Desc</th>
                                        <th>Po Total</th>
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
                                        <td><?= $data['po_vendor']?></td>
                                        
                                        <td><?= $data['po_description']?></td>
                                        <td><?php echo $data['po_total'];?></td>
                                        
                                        <td><?= $data['po_date']?></td>
                                        <td>
                                            <?php $status=$data['po_status']; if($status=="active"){
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
                                            <?php
                                            if ($id->type=='super_user' OR $id->type=='user') {
                                            echo "<span class='w3-text-red fa fa-warning '>  Access Forbidden</span>";
                                            }
                                            else{
                                            ?>
                                            
                                            <div class="dropdown">
                                                <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Action
                                                <span class="caret"></span></button>
                                                <ul class="dropdown-menu">
                                                    <li>
                                                        <input type="button" class="w3-button w3-block w3-teal edit" value="Edit" id="<?php echo $data['po_code']; ?>">
                                                    </li>
                                                    <li>
                                                        <button class="w3-button w3-block w3-red delete" id="<?php echo $data['po_code']; ?>" data-status="<?=$data['po_status']?>">Status</button>
                                                    </li>
                                                    
                                                </ul>
                                            </div>
                                            
                                            
                                            <?php } ?>
                                        </td>
                                        
                                    </tr>
                                    <?php endforeach;?>
                                </tbody>
                            </table> -->
                            
                            <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                    <tr class="w3-black">
                                        <th> <span class="glyphicon-facetime-video" w3-text-teal"></span>No</th>
                                        <th> <span class="fa fa-code-fork w3-text-teal"></span>Po Code</th>
                                        <th> <span class="fa fa-code-fork w3-text-teal"></span>PO Vendor</th>
                                        
                                        <th> <span class="fa fa-pencil-square-o w3-text-red"></span>Po Desc</th>
                                        <th>Po Total</th>
                                        <th><span class="fa fa-calendar w3-text-red"></span> Date</th>
                                        <th><span class="fa fa-cogs w3-text-orange"></span> Status</th>
                                        <th><span class="
                                        fa fa-newspaper-o w3-text-blue"></span> Order Report</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                                
                            </table>
                        </div>
                    </div>
                </div>
                
                
            </div>
        </div>
    </div>
    
    <?php include_once "login/footer.php"; ?>
    <!-- Push down content on small screens -->
    <div class="w3-hide-large" style="margin-top:83px"></div>
    
    
    
    
    <div class="w3-black w3-center w3-padding-24">Powered by <a href="https://www.w3schools.com/w3css/default.asp" title="W3.CSS" target="_blank" class="w3-hover-opacity">w3.css</a></div>
    <!-- End page content -->
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
<div id="largeModal" class="modal fade">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Large Modal</h4>
            </div>
            <div class="modal-body">
                <form id="dynamic_field">
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="row">
                                <div class="form-group col-sm-4">
                                    <label for="pwd" class="">Code:</label>
                                    <span id="auto_po_code"></span>
                                    
                                </div>
                                <div class="col-sm-6">
                                    <label for="pwd">Vendor:</label>
                                    
                                    <input type="hidden" value="<?php echo date("Y-m-d");?>" class="form-control" name="date[]" id="date">
                                    <span id="vendor"></span>
                                    
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="form-group">
                                    <label for="po_desc" class="col-md-2">Description:</label>
                                    <div class="col-md-10">
                                        <textarea class="form-control" rows="4" cols="30" name="po_desc" id="po_desc" required=""></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
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
                                        <input type="number" class="form-control" required="" name="item_quantity[]" id="item_quantity" onchange="myfun()">
                                        <span class="w3-text-red" id="return_msg"></span>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="pwd">Item Rate:</label>
                                        <input type="number" class="form-control" required="" name="item_rate[]" id="item_rate" >
                                    </div>
                                </div>
                            </div>
                            <div id="dynamic_field_row">
                                &nbsp;
                            </div>
                        </div>
                    </div>
                    
                    
                </div>
                <div class="modal-footer">
                    
                    <input type="submit" class="btn btn-success" name="submit" id="submit" value="submit">
                    <button type="button" class="btn btn-danger" id="close"  data-dismiss="modal">X</button>
                </div></form>
                <!-- jQuery JS CDN -->
                <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
                <!-- jQuery DataTables JS CDN -->
                <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
                <!-- Bootstrap JS CDN -->
                <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
                <!-- Bootstrap JS CDN -->
                <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css" />
                <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>
                <script type="text/javascript">
  // Script to open and close sidebar

            var table; 

            $(document).ready(function(){
                 table = $('#table').DataTable({

                     "processing":true,
                    "serverSide":true,
                    "order":[],

                                                                  // Load Database for the table1s content from ajax source

                    "ajax":{
                        "url":"<?php echo site_url('order_controller/po_order_ajax')?>",
                        "type":"POST",
                        "data":function(data){
                          
                            data.from_date=$('#from_date').val();
                            data.to_date=$('#to_date').val();
                        }
                    },

                    "columnDefs":[

                        {
                            "targets":[0],
                            "orderable":false,
                        },
                    ],
                 });


                 //::From_date ::to_date Clickable and action//


                  $('#btn-filter').click(function(){
                                       table.ajax.reload();
                 });
                 $('#btn-reset').click(function(){
                    $('#form-filter')[0].reset();
                    table.ajax.reload();  //just reload table
                 });

                                                                    //Generate ::PO_CODE AUTO

                 $.ajax({
                        url: "<?php echo base_url() ?>order_controller/auto_po_code",
                        method: "POST",
                        success: function(data)
                        {
                        $('#auto_po_code').html(data);
                        }
                    }); 



                                                                //::Open MOdal After Click on Edit Button :


                  $(document).on('click','.edit',function(event){

                    var order_id = $(this).attr('id');
       
                    //Start AJAX function
                    $.ajax({
                        url: "<?php echo base_url() ?>order_controller/edit_order",
                        method: "POST",
                        data: {order_id:order_id},
                        success: function(data)
                        {
                        
                        $('#result').html(data);
                        
                        $('#Modal').modal('show');
                        }
                    });
                //End AJAX function
                });


                                                    //::GET VENDOR
                    $.ajax({
                            url: "<?php echo base_url() ?>order_controller/get_vendor",
                            method: "POST",
                            success: function(data)
                            {
                            $('#vendor').html(data);
                            }
                        }); 

                                                        //Perform Action after ::UPDATE DATA

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
                                  table.ajax.reload();
                                }
                            });
                    });

                                        // ::ADD New Data into DATATABLE
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
                                table.ajax.reload();
                            }
                        });
        });


                                            //::GET ITEMS CODE in make order
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


                //Status change After Click on Change Sataus**************
    //**************************************
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
                     table.ajax.reload();
                }
                })
            }
            else
                {
                    return false;
                }
         });

                                                    //::Add more fields in ::Make Order
           $('#add_more').click(function(){
        $('#largeModal').modal('show');
        $('#dynamic_field')[0].reset();
        $('.modal-title').html("<i class='fa fa-plus'></i> Purchase Order");
        $('#submit').val('submit');
        $('#span_product_details').html('');

       function add_data(count=''){
  var html='';
        html+='';
        html+='<div id="row'+count+'" class="row">';
       
        html+='<div class="form-row">';
        html+='<div class="form-group col-md-4">';
        html+='<label for="pwd">Item Code</label>';
        html+='<span id="span_data" class="item_codes_dc"></span>\n\
                </div>';
        html+='<div class="form-group col-md-4">';
        html+='<label for="item_quantity">Item Quantity</label>';
        html+='<input type="number" class="form-control" required="" name="item_quantity[]" id="item_quantity" onchange="myfun(this.value)">';
        html+='</div>';
        html+='<div class="form-group col-md-3">';
        html+='<label for="item_rate">Item Rate:</label>';
        html+='<input type="number" class="form-control" required="" id="item_rate" name="item_rate[]">';
        html+='</div>';
         html+='<button type="button" name="remove" id="'+count+'" class="btn btn-danger btn_remove">X</button>';
        html+='</div>';
        html+='</div>';
     
        html+='';
   
          $('#dynamic_field_row').append(html);
         }
         var count = 0;
    $('#add').click(function(){
       
       // alert("eula");
        
        
        $.ajax({
            url: "<?php echo base_url() ?>order_controller/get_itemCode_in_order",
            method: "POST",
            success: function(data){
            // Print the fetched data of the selected phone in the section called #phone_result
            // within the Bootstrap modal
            $('.item_codes_dc').html(data);
            //$('#phoneModal').modal('show');
            }
        });
       count=count+1;
      add_data(count)
    });
                        //:: Remove Fields After click remove button       
    $(document).on('click', '.btn_remove', function(){
   var row_no = $(this).attr("id");
   
   $('#row'+row_no).remove();
  });

});

                $('#import_csv').on('submit', function(event){
            event.preventDefault();
                $.ajax({
                    url:"<?php echo base_url();?>order_controller/import_csv",
                    method:"POST",
                    data:new FormData(this),
                    contentType:false,
                    cache:false,
                    processData:false,
                    beforeSend:function(){
                        $('#import_csv_btn').html('Importing...');
                    },
                    success:function(data)
                    {
                        $('#import_csv')[0].reset();
                        $('#import_csv_btn').attr('disabled',false);
                        $('#import_csv_btn').html('Import Done');
                        table.ajax.reload();
                    }
                })
            });

             });

function w3_open() {
  document.getElementById("mySidebar").style.display = "block";
  document.getElementById("myOverlay").style.display = "block";
}
 
function w3_close() {
  document.getElementById("mySidebar").style.display = "none";
  document.getElementById("myOverlay").style.display = "none";
}

 var openInbox = document.getElementById("myBtn");
    openInbox.click();
    function w3_open() {
    document.getElementById("mySidebar").style.display = "block";
    document.getElementById("myOverlay").style.display = "block";
    }
    function w3_close() {
    document.getElementById("mySidebar").style.display = "none";
    document.getElementById("myOverlay").style.display = "none";
    }
    function myFunc(id) {
    var x = document.getElementById(id);
    if (x.className.indexOf("w3-show") == -1) {
    x.className += " w3-show";
    x.previousElementSibling.className += " w3-red";
    } else {
    x.className = x.className.replace(" w3-show", "");
    x.previousElementSibling.className =
    x.previousElementSibling.className.replace(" w3-red", "");
    }
    }

  //     $('#form-filter').hide();
  //        $(document).on('click','#btn',function(event){
  //   $("#form-filter").toggle('slow');
  // });
</script>

<script>
      

      
   //  $(document).ready(function(){
   // var orderdataTable = $('#order_data').dataTable({
   //          "order":[0,'desc'],
   //          "columnDefs":[
   //  {
      
   //   "targets":[0,1,2,6,7],
   //   "orderable":false,
   //  },
   // ],
   //        });
   //  });
    //                                                 //
    //
    // This is data that view after click on edit button//
    //                                                  //
    //
    // $.ajax({
    //     url: "<?php echo base_url() ?>order_controller/auto_po_code",
    //     method: "POST",
    //     success: function(data)
    //     {
    //     $('#auto_po_code').html(data);
    //     }
    // });      
//             //GET VENDOR
// $.ajax({
//         url: "<?php echo base_url() ?>order_controller/get_vendor",
//         method: "POST",
//         success: function(data)
//         {
//         $('#vendor').html(data);
//         }
//     }); 
                                           //
  //  $(document).ready(function(){
   //
    //     $('.edit').click(function(){
    //     var order_id = $(this).attr('id');
    //    ;
    //     //Start AJAX function
    //     $.ajax({
    //     url: "<?php echo base_url() ?>order_controller/edit_order",
    //     method: "POST",
    //     data: {order_id:order_id},
    //     success: function(data)
    //     {
    //     // Print the fetched data of the selected order in the modal
    //     // within the Bootstrap modal
    //     $('#result').html(data);
    //     // Display the Bootstrap modal
    //     $('#Modal').modal('show');
    //     }
    //     });
    // //End AJAX function
    // });
    //});
    //
    //
    //
    // Update order data
    //
    //
    //
    // $(document).on('submit','#order_form',function(event){
    // event.preventDefault();
    // // var order_id=$('#id').val();
    // // var po_code=$('#po_code').val();
    // // var po_description=$('#po_description').val();
    // // var po_status=$('#status').val();
    // // var item_code=$('#item_code').val();
    // // var item_quantity=$('#item_quantity').val();
    // // var item_rate=$('#item_rate').val();
    // // var date=$('#date').val();
    // var form_data = $(this).serialize();
    // $.ajax({
    // url: "<?php echo base_url() ?>order_controller/update_order",
    // method:"POST",
    // data:form_data,
    // success:function(data)
    // {
    // alert(data);
    // $('#Modal').modal('hide');
    // }
    // });
    // });
    //
    //
    //
    // ADD order data
    //
    //
    //
    // $(document).on('submit','#add_order',function(event){
    //         event.preventDefault();
    //         var order_id=$('#id').val();
    //         var po_code=$('#po_code').val();
    //         var po_vendor=$('#po_vendor').val();
    //         var po_description=$('#po_description').val();
    //         var po_status=$('#status').val();
    //         var item_code=$('#item_code').val();
    //         var item_quantity=$('#item_quantity').val();
    //         var item_rate=$('#item_rate').val();
    //         var date=$('#date').val();
    //         $.ajax({
    //         url: "<?php echo base_url() ?>order_controller/update_order",
    //         method:"POST",
    //         data:{
    //         id:order_id,po_code:po_code,po_vendor:po_vendor,po_description:po_description,po_status:po_status
    //         ,item_code:item_code,item_quantity:item_quantity,item_rate:item_rate,date:date
    //         },
    //         datatype:"json",
    //         success:function(data)
    //         {
    //         alert(data);
           
    //         $('#Modal').modal('hide');
    //         }
    // });
    // });
    // get_item();
    // function get_item(){
    // $.ajax({
    // url: "<?php echo base_url() ?>order_controller/get_itemCode_in_order",
    // method: "POST",
    // success: function(data){
    // // Print the fetched data of the selected phone in the section called #phone_result
    // // within the Bootstrap modal
    // $('#span_item_details').html(data);
    // //$('#phoneModal').modal('show');
    // }
    // });
    // }
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

         $('.input-daterange').datepicker({
    todayBtn:'linked',
    format: "yyyy-mm-dd",
    autoclose: true
    });
    var id = $(".order_report_span").attr("id");
    if(id=='recived'){
    $('.edit').attr('disabled', 'disabled');
    }else{
    $('.edit').attr('disabled',false);
    }
//     $('#add_more').click(function(){
//         $('#largeModal').modal('show');
//         $('#dynamic_field')[0].reset();
//         $('.modal-title').html("<i class='fa fa-plus'></i> Purchase Order");
//         $('#submit').val('submit');
//         $('#span_product_details').html('');

//        function add_data(count=''){
//   var html='';
//         html+='';
//         html+='<div id="row'+count+'" class="row">';
       
//         html+='<div class="form-row">';
//         html+='<div class="form-group col-md-4">';
//         html+='<label for="pwd">Item Code</label>';
//         html+='<span id="span_data" class="item_codes_dc"></span>\n\
//                 </div>';
//         html+='<div class="form-group col-md-4">';
//         html+='<label for="item_quantity">Item Quantity</label>';
//         html+='<input type="number" class="form-control" required="" name="item_quantity[]" id="item_quantity" onchange="myfun(this.value)">';
//         html+='</div>';
//         html+='<div class="form-group col-md-3">';
//         html+='<label for="item_rate">Item Rate:</label>';
//         html+='<input type="number" class="form-control" required="" id="item_rate" name="item_rate[]">';
//         html+='</div>';
//          html+='<button type="button" name="remove" id="'+count+'" class="btn btn-danger btn_remove">X</button>';
//         html+='</div>';
//         html+='</div>';
//         //html+='<div class="form-group col-sm-2">';
//        // html+='<button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button>';
//        // html+='<button type="button" name="add" id="'+i+'add" class="btn btn-success add w3-right">+</button>';
//        // html+='</div>';
//         //html+='</div>';
//       // html+='</div>';
//         html+='';
//    //        var html='';
//    //        html='<span id="row'+count+'"><input type="text"  name="quantity[]" class="form-control" required /> <span></span>';
//    //          html+='<span id="return_msg"></span></div>';
//    //        if(count == '')
//    // {
//    //  html += '<button type="button w3-button-round" name="add_more" id="add_more" class="btn btn-success btn-xs">+</button>';
//    // }
//    // else
//    // {
//    //  html += '<button type="button" name="remove" id="'+count+'" class="btn btn-danger btn-xs remove">-</button></span>';
//    // }
//           $('#dynamic_field_row').append(html);
//          }
//          var count = 0;
//     $('#add').click(function(){
       
//        // alert("eula");
        
        
//         $.ajax({
//             url: "<?php echo base_url() ?>order_controller/get_itemCode_in_order",
//             method: "POST",
//             success: function(data){
//             // Print the fetched data of the selected phone in the section called #phone_result
//             // within the Bootstrap modal
//             $('.item_codes_dc').html(data);
//             //$('#phoneModal').modal('show');
//             }
//         });
//        count=count+1;
//       add_data(count)
//     });
// });
    
    // $(document).on('click', '.add', function(){
    //     var button_id = $(this).attr("id");
    //     alert(button_id);
      
    // });
// $(document).on('click', '.btn_remove', function(){
//    var row_no = $(this).attr("id");
   
//    $('#row'+row_no).remove();
//   });

        // ***** Make PO ORDER**************
        //***********************************

        // $(document).on('submit','#dynamic_field', function(event){
        // event.preventDefault();
        // $('#submit').attr('disabled', 'disabled');
        // var form_data = $(this).serialize();
        //         $.ajax({
        //         url:"<?php echo base_url() ?>order_controller/make_order",
        //         method:"POST",
        //         data:form_data,
        //         success:function(data){
        //         $('#dynamic_field')[0].reset();
        //         $('#largeModal').modal('hide');
        //         alert(data);
        //         $('#submit').attr('disabled', false);
        //         //  orderdataTable.ajax.reload();
        //         }
        //         });
        // });
});

    // //Status change After Click on Change Sataus**************
    // //**************************************
    //     $(document).on('click', '.delete', function(){
    //     var order_code = $(this).attr("id");
    //     var status = $(this).data("status");
    //     var btn_action = "delete";
    //         if(confirm("Are you sure you want to change status?"))
    //             {
    //                 $.ajax({
    //                 url:"<?php echo base_url() ?>order_controller/order_status",
    //                 method:"POST",
    //                 data:{order_code:order_code, status:status, btn_action:btn_action},
    //                 success:function(data)
    //                 {
    //                 alert(data);
    //                 orderdataTable.ajax.reload();
    //             }
    //             })
    //         }
    //         else
    //             {
    //                 return false;
    //             }
    //     });

    // function myfun(){
    //     var item_code=$('#category_id').val();
    //     var item_qty=$('#item_quantity').val();
    //     $.ajax({
    //         async: false,
    //         url:'<?php echo base_url() ?>prd/chk_item_qty_in_order',
    //         type:'POST',
    //         data:{item_code:item_code,item_qty:item_qty},
    //         success:function(result){
    //         $('#return_msg').html(result);
    //         }
    //     });
    // }



    //Search Data in datatable

       //     $(document).on('submit','#data_search', function(event){
       //  event.preventDefault();
       // // $('#submit').attr('disabled', 'disabled');
       //  var form_data = $(this).serialize();
       //          $.ajax({
       //          url:"<?php echo base_url() ?>order_controller/data_search",
       //          method:"POST",
       //          data:form_data,
       //          success:function(data){
       //                      var table = $('#order_data').DataTable().destroy();
 

                                
       //                    }
       //          });
       //  });

</script>