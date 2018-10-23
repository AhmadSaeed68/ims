<?php
    include_once"login/header.php";
?>
 <div class="w3-container w3-padding-64">
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
                                    fa fa-object-ungroup w3-text-blue"></span>Invoice Total</th>
                                    <th> <span class="fa fa-pencil-square-o w3-text-red"></span>Invoice Desc</th>
                                    <th><span class="fa fa-calendar w3-text-red"></span>Inv Date</th>
                                    <th><span class="fa fa-eye w3-text-blue"></span>View</th>

                                    <th>Action</th>
                                </tr>
                            </thead>

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
          <h4 class="modal-title">Modal Heading</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
            <div class="row">
                 <form id="make_invoice">
                    <div class="col-sm-6 w3-teal">
                     
                    </div>
                    <div class="col-sm-6 w3-light-blue">
                           <div class="form-row">
                            <!-- ItmeCode -->
                             <div class="form-group col-md-4">
                                    <label for="so_item_code">Item Code</label>
                                    <span id="so_item_code"  name="so_item_code"></span>
                                </div>

                                <!-- po_code -->
                                 <div class="form-group col-md-4" id="po_code">
                                    
                                   
                                </div>
                                 <div class="form-group col-md-4" >
                                    
                                   <span id="invoice_data"></span>
                                </div>



                        </div>
                    </div>
                
            </div>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        </form>
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

  
    </script>
    <span id="return_msg"></span>