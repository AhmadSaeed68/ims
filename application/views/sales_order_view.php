<?php
include_once "login/header.php";
$id=$this->session->userdata('user_id');
?>

<!-- Sidebar/menu -->
<!-- <nav class="w3-sidebar w3-bar-block w3-white w3-animate-left w3-text-grey w3-collapse w3-top w3-center" style="z-index:3;width:300px;font-weight:bold" id="mySidebar"><br>
    <a href="largeModal" class="btn btn-primary w3-padding-64 w3-bar-item w3-button w3-border-bottom w3-large adddata w3-right" id="add_more" data-toggle="modal">Make Sale Order <i class="w3-padding fa fa-pencil"></i></a>
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
        <li><a href="#"><span class="
        fa fa-file-pdf-o w3-text-red fa-2x"></span> PDF</a></li>
    </div>
    <div class="col-sm-6">
        <li><a href="<?php echo base_url("sale_order_controller/export_csv")?>"><span class="
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
 UPload File to csv 
</nav> -->

<!-- Top menu on small screens -->
<!-- <header class="w3-container w3-top w3-hide-large w3-white w3-xlarge w3-padding-16">
  <span class="w3-left w3-padding">SOME NAME</span>
  <a href="javascript:void(0)" class="w3-right w3-button w3-white" onclick="w3_open()">☰</a>
</header> -->

<!-- Overlay effect when opening sidebar on small screens -->
<!-- <div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div> -->

<!-- !PAGE CONTENT! -->
<div class="w3-main">
<div class="container-fluid w3-padding-64">
  <!-- <span class="w3-left"> <a href="<?php echo base_url()?>pdf/invoice_pdf" target="_blank" class="w3-right"> <span class="fa fa-file-pdf-o w3-text-red fa-2x"></span> Download</a></span> -->
  <div class="panel panel-default">
  <button type="button" href="largeModal" class="btn btn-outline adddata w3-right btn-primary w3-black w3-hover-green btn-xs"  data-toggle="modal" data-target="#myModal" style="margin-bottom:20px;"><span class="fa fa-plus-square w3-text-red"></span>Make Sale Order</button>
    <!-- <a href="largeModal" class="btn btn-primary adddata w3-right"  data-toggle="modal">Make Sale Order</a> -->
    <div class="panel-heading w3-center w3-padding-24">
      <span class="fa-2x">
      <i class="fa w3-text-cyan  fa-crop fa-fw"></i>  Sales Order
      </span>
      </div> <!-- Modal -->
      <!-- Large Modal HTML -->
      <div class="panel-body">
        <div class="w3-responsive">
          <table class="w3-table-all table-bordered w3-hoverable" id="order_data">
            <thead>
              <tr>
                <th>ID</th>
                <th>Customer</th>
                <th> <span class="fa fa-code-fork w3-text-teal"></span>SO Code</th>
                <th><span class="
                fa fa-shield w3-text-green"></span> Date</th>
                <th> <span class="
                fa fa-object-ungroup w3-text-blue"></span>item Code</th>
                <th> <span class="fa fa-pencil-square-o w3-text-red"></span>item Qty</th>
                <th><span class="fa fa-calendar w3-text-red"></span>Total</th>
                <th><span class="fa fa-eye w3-text-blue"></span>Profit</th>
                <th><span class="fa fa-eye w3-text-blue"></span>status</th>
                <th><span class="fa fa-eye w3-text-blue"></span>View</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach($data as $data):?>
              <tr>
                <td><?= $data['id'];?></td>
                <td class="w3-teal w3-opacity"><?= $data['customer_name'];?></td>
                <td><?= $data['so_code']?></td>
                <td><?= $data['date'];?></td>
                <td><?= $data['item_code']?></td>
                <td><?= $data['item_qty'];?></td>
                <td><?= $data['so_item_total']?></td>
                <td><?= $data['profit'];?>%</td>
                <td>
                  <?php $status=$data['so_status']; if($status=="active"){
                  echo "<span class='w3-green'>Active</span>";
                  }else{
                  echo "<span class='w3-red'>Dective</span>";
                }?></td>
                
                <td><span class="fa fa-eye w3-text-blue"><a class="view" id="<?=$data['so_code']?>"> View</a></span></td>
                <td>
                  <?php
                  if ($id->type=='super_user') {
                  echo "<span class='w3-text-red fa fa-warning '>  Access Forbidden</span>";
                  }
                  else{
                  ?>
                  <div class="dropdown">
                    <button class="btn w3-orange btn-default dropdown-toggle" type="button" data-toggle="dropdown">Action
                    <span class="caret"></span></button>
                    <ul class="dropdown-menu">
                      <li><input type="button" class="w3-button w3-block w3-teal edit" value="Edit" id="<?php echo $data['so_code']; ?>"></li>
                      <li>
                        <button type="button" class="w3-button w3-block w3-red  delete"  id="<?php echo $data['so_code']; ?> " data-status="<?=$data['so_status']?>">Delete</button>
                      </li>
                    </ul>
                  </div>
                  <?php } ?>
                </td>
                
                
                
                
              </tr>
              <?php endforeach;?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <!-- Push down content on small screens --> 
  <div class="w3-hide-large" style="margin-top:83px"></div>
  
 
 

<?php include_once "login/footer.php"; ?>
<!-- End page content -->
</div>

  <!-- The Modal -->
  <div class="modal w3-animate-zoom" id="modal_action">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title"></h4>
          
          <button type="button" class="close" data-dismiss="modal">&times;</button>
         <div class="w3-text-red w3-wide w3-right"><?= $date = date('d-M-Y');?></div> 
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          <span id="so_data"></span>
          <div class="row">
            <form  accept-charset="utf-8" id="make_so">
              
              
              <div class="col-sm-4">
                <div class="row">
                  <div class="form-group">
                    <div class="col-sm-6">
                      <label for="customer Name">SO_code</label>
                      <span id="auto_so_code"></span>
                      <!-- <input type="text" class="form-control" required name="so_code"  placeholder=""> -->
                    </div>
                    <!-- <div class="col-sm-6">
                      <label for="customer Name">Date</label>
                      <input type="date" class="form-control" name="date" required  placeholder="date">
                     
                    </div> -->
                  </div>
                  <div class="form-group">
                    <div class="col-sm-6">
                      <label for="">Buyer Name</label>
                      
                      <span id="so_user_detail"></span>
                    </div>
                    <div class="col-sm-6">
                      
                      <span id="user_city"></span>
                      
                    </div>
                    
                  </div>
                  
                  
                </div>
              </div>
              <div class="col-sm-8">
                <div class="row">
                  <button type="button" id="add_more_so" class="btn btn-success w3-right">+</button>
                </div>
                <div class="form-row">
                  <!-- ItmeCode -->
                  <div class="form-group col-md-3">
                    <label for="so_item_code">Item Code</label>
                    <span id="so_item_code"  name="so_item_code"></span>
                    
                  </div>
                  <!-- po_code -->
                  <div class="form-group col-md-8" id="po_code">
                    
                    
                  </div>
                  
                  <span id="invoice_data"></span>
                  
                </div>
                <!--    next Row in right site col-sm-6 -->
                <div class="form-row">
                  
                  <div class=" form-group col-sm-3">
                    <label for="profit">Profit</label>
                    
                    <div class="input-group">
                      
                      <input type="hidden" class="form-control profit" required id="profit" name="profit[]" >
                      <input type="number" class="form-control discount" required id="discount" name="discount[]" >
                      <span class="input-group-addon">%</span>
                      
                    </div>
                  </div>
                  <!-- total -->
                  <div class=" form-group col-sm-3">
                    <label for="profit">Total</label>
                    
                    <div class="input-group">
                      
                      <input type="text" required readonly class="form-control" id="total" name="total[]" >
                      
                      
                    </div>
                  </div>
                 
                  
                </div>
              </div>
              
            </div>
          </div>
          
          <!-- Modal footer -->
          <div class="modal-footer">
            
            <button type="submit" class="btn btn-success submit_so">➕ Add</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  
  <div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true" style="margin-top: -20px;">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header ">
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
          var orderdataTable = $('#order_data').DataTable({
            "order":[0,'desc'],
            "columnDefs":[
    {
      
     "targets":[0,4,,5,8,9,10],
     "orderable":false,
    },
   ],
          });
            // ******
            // Load MOdal After Click on MAKE_SALES_ORDER LINE NO 44
            // ******
           $('.adddata').click(function(){
               $('#modal_action').modal('show');
                $('.modal-title').html("<i class='fa fa-plus'></i> Create Sale Order");


               //User Detail in sale_order
                $.ajax({
                    url:'<?php echo base_url() ?>sale_order_controller/get_item_code_in_so',
                    method:'POST',
                    success:function(data){
                          $('#so_item_code').html(data);
                    }
               });


                //User Detail in sale_order
                $.ajax({
                    url:'<?php echo base_url() ?>sale_order_controller/get_users_in_so',
                    method:'POST',
                    success:function(data){
                          $('#so_user_detail').html(data);
                    }
               });
     
        });  
        });

        //Get Profit From Profit_profile
          $.ajax({
                    url:'<?php echo base_url() ?>sale_order_controller/get_default_profit',
                    method:'POST',
                    success:function(data){
                          $('.profit').val(data);
                    }
               });
        function user_on_change(datavalue){
           $.ajax({
     url:'<?php echo base_url() ?>sale_order_controller/city_on_change',
      type:'POST',
      data:{datapost:datavalue},
      success:function(result){
    
        $('#user_city').html(result);
      }
    });
         
        }
    $.ajax({
        url: "<?php echo base_url() ?>sale_order_controller/auto_so_code",
        method: "POST",
        success: function(data)
        {
        $('#auto_so_code').html(data);
        }
    }); 


        function item_on_change(datavalue){
          $.ajax({
          // url:'<?php echo base_url() ?>sale_order_controller/item_on_change',
          url:'<?php echo base_url() ?>sale_order_controller/item_data',
            type:'POST',
            data:{datapost:datavalue},
            success:function(result){
              console.log(result);
              $('#po_code').html(result);
            }
          });
        }
  //         function invoice_on_change(invoice_code){
  //   $.ajax({
  //    url:'<?php echo base_url() ?>sale_order_controller/invoice_on_change',
  //     type:'POST',
  //     data:{invoice_code:invoice_code},
  //     success:function(result){
        
  //       $('#invoice_data').html(result);
  //     }
  //   });
  // }

  
                                                              //   // SUM total Price
  $(function() {
    //$("#item_qty, #item_rate, #profit").on("keyup keydown keyup", total);
     $("#item_qty, #item_rate, #discount").on("click click keyup", total);
  function total() {
    var item_qty=$('#item_qty').val();
    var item_rate=$('#item_rate').val();
    var discount=$('#discount').val();
    var item_total=item_qty*item_rate;
//    var total=item_total+((profit/100)*item_total);total=item_total+((profit/100)*item_total);
    var total=item_total+((discount/100)*item_total);total=item_total-((discount/100)*item_total);
   
   
  $("#total").val(total);
 
  }
});
                                                      // Click On Edit and perform Action
  $('.edit').click(function(){
        var so_id = $(this).attr('id');
      
      
        $.ajax({
        url: "<?php echo base_url() ?>sale_order_controller/edit_so",
        method: "POST",
        data: {so_id:so_id},
        success: function(data)
        {
      
        $('#result').html(data);
     
      $('#Modal').modal('show');
       $('.modal-title').html("<i class='fa fa-plus'></i> <span class='w3-text-orange'> Update Sale Order</span>");
        }
        });
  
    });
  // add Dynamic values on click +
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
        //html+='<div class="form-group col-sm-2">';
       // html+='<button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button>';
       // html+='<button type="button" name="add" id="'+i+'add" class="btn btn-success add w3-right">+</button>';
       // html+='</div>';
        //html+='</div>';
      // html+='</div>';
        html+='';
   //        var html='';
   //        html='<span id="row'+count+'"><input type="text"  name="quantity[]" class="form-control" required /> <span></span>';
   //          html+='<span id="return_msg"></span></div>';
   //        if(count == '')
   // {
   //  html += '<button type="button w3-button-round" name="add_more" id="add_more" class="btn btn-success btn-xs">+</button>';
   // }
   // else
   // {
   //  html += '<button type="button" name="remove" id="'+count+'" class="btn btn-danger btn-xs remove">-</button></span>';
   // }
          $('#make_so').append(html);
         }
         var count = 0;
         //Add more rows on click
  $('#add').click(function(){
     $.ajax({
                    url:'<?php echo base_url() ?>sale_order_controller/test',
                    method:'POST',
                    success:function(data){
                          $('#return_msg').html(data);
                    }
               });
      count=count+1;
      add_data(count)
         
  });
  //remove item on click remove button
  $(document).on('click', '.btn_remove', function(){
   var row_no = $(this).attr("id");
   
   $('#row'+row_no).remove();
  });
      // data so_data on submit button 
$(document).on('submit','#so_update',function(event){
 event.preventDefault();
 var form_data=$(this).serialize();
 $.ajax({
    url: "<?php echo base_url() ?>sale_order_controller/update_so",
    method:"POST",
    data:form_data,
    success:function(data)
    {
    alert(data);
     $('#order_data').DataTable().ajax.reload(null, false);
    $('#Modal').modal('hide');
    }
    });
});
$(document).on('submit','#make_so', function(event){
event.preventDefault();
$('.submit_so').attr('disabled', 'disabled');
var form_data = $(this).serialize();
$.ajax({
url:"<?php echo base_url() ?>sale_order_controller/make_so",
method:"POST",
data:form_data,
success:function(data){
$('#make_so')[0].reset();
$('#modal_action').modal('hide');
alert(data);
$('.submit_so').attr('disabled', false);
 orderdataTable.table.reload();
 
}
});
});
       $('.view').click(function(){
    var so_code = $(this).attr('id');
  
    $.ajax({
    url: "<?php echo base_url() ?>sale_order_controller/view_so",
    method: "POST",
    data: {so_code:so_code},
    success: function(data)
    {
     $('#result').html(data);
   
    $('#Modal').modal('show');
     $('.modal-title').html("<i class='fa fa-eye w3-text-blue'></i> View Sale Order");
    }
    });
    });
       $(document).on('click','.delete',function(){
          var so_code=$(this).attr("id");
          var status = $(this).data("status");
          var btn_action = "delete";
        if(confirm("Are you sure you want to change status?"))
        {
            $.ajax({
              url:"<?php echo base_url() ?>sale_order_controller/so_status",
              method:"POST",
              data:{so_code:so_code, status:status, btn_action:btn_action},
              success:function(data)
              {
              alert(data);
              orderdataTable.ajax.reload();
              }
            })
        }else{
            alert('Ok Thank you');
          return false;
        
        }
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
    </script>
    <span id="return_msg"></span>
