<?php

?>

<?php include_once "login/header.php";  ?>
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/css/bootstrap-select.min.css">
 <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/js/bootstrap-select.min.js"></script>

 <script>
 $(document).ready(function(){
  $('#inventory_order_date').datepicker({
   format: "yyyy-mm-dd",
   autoclose: true
  });
 });
 </script>

 <span id="alert_action"></span>
 <div class="row">
  <div class="col-lg-12">
   
   <div class="panel panel-default">
                <div class="panel-heading">
                 <div class="row">
                     <div class="col-lg-10 col-md-10 col-sm-8 col-xs-6">
                            <h3 class="panel-title">Order List</h3>
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-6" align="right">
                            <button type="button" name="add" id="add_button" class="btn btn-success btn-xs">Add</button>     
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                 <table id="order_data" class="table table-bordered table-striped">
                  <thead>
       <tr>
        <th>Order ID</th>
        <th>Customer Name</th>
        <th>Total Amount</th>
        <th>Payment Status</th>
        <th>Order Status</th>
        <th>Order Date</th>
        
        <th></th>
        <th></th>
        <th></th>
       </tr>
      </thead>
                 </table>
                </div>
            </div>
        </div>
    </div>

    <div id="orderModal" class="modal fade">

     <div class="modal-dialog">
      <form method="post" id="order_form">
       <div class="modal-content">
        <div class="modal-header">
         <buttypeon t="button" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title"><i class="fa fa-plus"></i> Create Order</h4>
        </div>
        <div class="modal-body">
         <div class="row">
       <div class="col-md-6">
        <div class="form-group">
         <label>Enter Receiver Name</label>
         <input type="text" name="inventory_order_name" id="inventory_order_name" class="form-control" required />
        </div>
       </div>
       <div class="col-md-6">
        <div class="form-group">
         <label>Date</label>
         <input type="text" name="inventory_order_date" id="inventory_order_date" class="form-control" required />
        </div>
       </div>
      </div>
      <div class="form-group">
       <label>Enter Receiver Address</label>
       <textarea name="inventory_order_address" id="inventory_order_address" class="form-control" required></textarea>
      </div>
      <div class="form-group">
       <label>Enter Product Details</label>
       <hr />
       <span id="span_product_details"></span>
       <hr />
      </div>
      <div class="form-group">
       <label>Select Payment Status</label>
       <select name="payment_status" id="payment_status" class="form-control">
        <option value="cash">Cash</option>
        <option value="credit">Credit</option>
       </select>
      </div>
        </div>
        <div class="modal-footer">
         <input type="hidden" name="inventory_order_id" id="inventory_order_id" />
         <input type="hidden" name="btn_action" id="btn_action" />
         <input type="submit" name="action" id="action" class="btn btn-info" value="Add" />
        </div>
       </div>
      </form>
     </div>

    </div>
 

<script type="text/javascript">
    $(document).ready(function(){

     var orderdataTable = $('#order_data').DataTable({
   "processing":true,
   "serverSide":true,
   "order":[],
   "ajax":{
    url:"order_fetch/fetch_data",
    type:"POST",
    success:function(data){
        $('#result').html(data);
    }
   },
 
   "columnDefs":[
    {
     "targets":[4, 5, 6, 7, 8, 9],
     "orderable":false,
    },
   ],
  
   "columnDefs":[
    {
     "targets":[4, 5, 6, 7, 8],
     "orderable":false,
    },
   ],
   
   "pageLength": 10
  });
    });
    </script>

    <div id="result"></div>
    <?php include_once "login/footer.php"; ?>