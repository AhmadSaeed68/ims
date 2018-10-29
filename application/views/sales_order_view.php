<?php
    include_once"login/header.php";

?>
 <div class="container w3-padding-64">

        <span class="w3-left"> <a href="<?php echo base_url()?>pdf/invoice_pdf" target="_blank" class="w3-right"> <span class="fa fa-file-pdf-o w3-text-red fa-2x"></span> Download</a></span>


        <div class="panel panel-default">
            <a href="largeModal" class="btn btn-primary adddata w3-right"  data-toggle="modal">Make Sale Order</a>
            <div class="panel-heading w3-center w3-padding-24">
                <span class=" fa fa-qrcode fa-2x w3-text-red">
                    Sales Order
                </span>
                </div> <!-- Modal -->
                <!-- Large Modal HTML -->

                <div class="panel-body">
                    <div class="w3-responsive">
                        <table class="w3-table-all table-bordered w3-hoverable" id="order_data">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th> <span class="fa fa-code-fork w3-text-teal"></span>SO Code</th>
                                    <th><span class="
                                    fa fa-shield w3-text-green"></span> Invoice Code</th>


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
                                    <td><?= $data['so_code']?></td>
                                     <td><?= $data['invoice_code'];?></td>
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
                                     <td> <div class="dropdown">
                                        <button class="btn w3-orange btn-default dropdown-toggle" type="button" data-toggle="dropdown">Action
                                        <span class="caret"></span></button>
                                        <ul class="dropdown-menu">

                                            <li><input type="button" class="w3-button w3-block w3-teal edit" value="Edit" id="<?php echo $data['so_code']; ?>"></li>
                                            <li>
                                            <button type="button" class="w3-button w3-block w3-red  delete"  id="<?php echo $data['so_code']; ?> " data-status="<?=$data['so_status']?>">Delete</button>
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
     <!-- The Modal -->
  <div class="modal fade" id="modal_action">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title"></h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
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
                         <div class="col-sm-6">
                           <label for="customer Name">Date</label>
                           <input type="date" class="form-control" name="date" required  placeholder="date">
                         </div>
                       </div>
                       <div class="form-group">
                         <div class="col-sm-6">
                           <label for="customer Name">Business Name</label>
                           <input type="text" class="form-control" name="cstr_name" required placeholder="Business/name">
                         </div>
                         <div class="col-sm-6">
                           <label for="customer Name">NTN no:</label>
                           <input type="text" class="form-control" name="ntn_no" value="OPTIONAl"  placeholder="NTN Optional">
                         </div>
                       </div>

                       <div class="form-group">
                         <div class="col-sm-6">
                           <label for="customer Name">Email</label>
                           <input type="email" class="form-control" name="email" required  placeholder="Email">
                         </div>
                         <div class="col-sm-6">
                           <label for="customer Name">Contact No</label>
                           <input type="number" class="form-control" name="contact" required  placeholder="Contact#">
                         </div>
                       </div>


                       <div class="form-group">
                         <div class="col-sm-12">
                           <label for="customer Name">Address</label>
                           <textarea name="address" placeholder="Business Address" required class="form-control"></textarea>
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
                                 <div class="form-group col-md-3" id="po_code">
                                    
                                   
                                </div>

                                    
                                   <span id="invoice_data"></span>
                                



                        </div>


                     <!--    next Row in right site col-sm-6 -->

                        <div class="form-row">
                          
                          <div class=" form-group col-sm-3">
                            <label for="profit">Profit</label>
                           
                            <div class="input-group">
                            
                                <input type="number" class="form-control" required id="profit" name="profit[]" >
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
                          <div class="form-group col-sm-2">
                            <button type="button" class="btn btn-default w3-green col-sm-3 add" id="add">+</button>
                            <button type="button" class="btn btn-default w3-red col-sm-3 remove" >-</button>
                          </div>


                          
                        </div>

                    </div>
                
            </div>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <input type="submit" name="" class="btn btn-success submit_so" value="sss">
            <button type="submit" class="btn btn-success submit_so">Submit</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        </form>
      </div>
    </div>
  </div>
    
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
          var orderdataTable = $('#order_data').DataTable({
            "columnDefs":[
    {
      
     "targets":[0,7,8,9],
     "orderable":false,
    },
   ],
          });
            // ******
            // Load MOdal After Click on MAKE_SALES_ORDER LINE NO 44
            // ******

           $('.adddata').click(function(){
               $('#modal_action').modal('show');


 $.ajax({
                    url:'<?php echo base_url() ?>sale_order_controller/get_item_code_in_so',
                    method:'POST',
                    success:function(data){
                          $('#so_item_code').html(data);

                    }

               });

     

        });  


        });

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
     url:'<?php echo base_url() ?>sale_order_controller/item_on_change',
      type:'POST',
      data:{datapost:datavalue},
      success:function(result){
    
        $('#po_code').html(result);
      }
    });
  }

          function invoice_on_change(invoice_code){

    $.ajax({
     url:'<?php echo base_url() ?>sale_order_controller/invoice_on_change',
      type:'POST',
      data:{invoice_code:invoice_code},
      success:function(result){
        
        $('#invoice_data').html(result);
      }
    });
  }


                                                              //   // SUM total Price


  $(function() {
    $("#item_qty, #item_rate, #profit").on("keyup keydown keyup", total);
  function total() {
    var item_qty=$('#item_qty').val();
    var item_rate=$('#item_rate').val();
    var profit=$('#profit').val();
    var item_total=item_qty*item_rate;
    var total=item_total+((profit/100)*item_total);
   
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
        }
        });
  
    });



  // add Dynamic values on click +
 function add_data(count=''){
          var html='';
          html='<span id="row'+count+'"><input type="text"  name="quantity[]" class="form-control" required /> <span></span>';
            html+='<span id="return_msg"></span></div>';
          if(count == '')
   {
    html += '<button type="button w3-button-round" name="add_more" id="add_more" class="btn btn-success btn-xs">+</button>';
   }
   else
   {
    html += '<button type="button" name="remove" id="'+count+'" class="btn btn-danger btn-xs remove">-</button></span>';
   }
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
  $(document).on('click', '.remove', function(){
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
 orderdataTable.ajax.reload();
 
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





  
    </script>
    <span id="return_msg"></span>