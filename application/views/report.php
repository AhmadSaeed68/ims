
<?php include_once "login/header.php"; ?>
<div class="row">

 <div class="col-md-3">
  <div class="panel panel-default">
   <div class="panel-heading"><strong>Total User</strong></div>
   <div class="panel-body" align="center">
    <h1 id="user_count"></h1>
   </div>
  </div>
 </div>
 <div class="col-md-3">
  <div class="panel panel-default">
   <div class="panel-heading"><strong>Total Category</strong></div>
   <div class="panel-body" align="center">
    <h1 id="count_category"></h1>
   </div>
  </div>
 </div>
 
 <div class="col-md-3">
  <div class="panel panel-default">
   <div class="panel-heading"><strong>Total Item in Stock</strong></div>
   <div class="panel-body" align="center">
    <h1 id="count_items"></h1>
   </div>
  </div>
 </div>
 <div class="col-md-3">
  <div class="panel panel-default">
   <div class="panel-heading"><strong>Total Orders</strong></div>
   <div class="panel-body" align="center">
   <h1 id="count_order"></h1>
   </div>
  </div>
 </div>
  <div class="col-md-4">
   <div class="panel panel-default">
    <div class="panel-heading"><strong>Total Order Value</strong></div>
    <div class="panel-body" align="center">
     <h1 id="order_value">$</h1>
    </div>
   </div>
  </div>
  <div class="col-md-4">
   <div class="panel panel-default">
    <div class="panel-heading"><strong>Total Invoice Value</strong></div>
    <div class="panel-body" align="center">
     <h1 id="invoice_value">$</h1>
    </div>
   </div>
  </div>
  
  <hr />

  <div class="col-md-12">
   <div class="panel panel-default">
    <div class="panel-heading"><strong>Total Order Value User wise</strong></div>
    <div class="panel-body" align="center">
    
    </div>
   </div>
  </div>

 </div>

 <script>
    $(document).ready(function(){

        //Count All users

       $.ajax({
                    
                    url: "<?php echo base_url() ?>report/user_count",
                    method: "POST",
                        
                        success: function(data){
                    
                            $('#user_count').html(data);
                  
                        }
                });


                //Count All Categoryes


                 $.ajax({
                    
                    url: "<?php echo base_url() ?>report/count_category",
                    method: "POST",
                        
                        success: function(data){
                    
                            $('#count_category').html(data);
                  
                        }
                });

                //Count ITems

                $.ajax({
                    
                    url: "<?php echo base_url() ?>report/count_items",
                    method: "POST",
                        
                        success: function(data){
                    
                            $('#count_items').html(data);
                  
                        }
                });

                     //count order

                $.ajax({
                    
                    url: "<?php echo base_url() ?>report/count_order",
                    method: "POST",
                        
                        success: function(data){
                    
                            $('#count_order').html(data);
                  
                        }
                });

                //Order Value

                $.ajax({
                    
                    url: "<?php echo base_url() ?>report/order_value",
                    method: "POST",
                        
                        success: function(data){
                    
                            $('#order_value').html(data);
                  
                        }
                });

                //Invoice Value

                 $.ajax({
                    
                    url: "<?php echo base_url() ?>report/invoice_value",
                    method: "POST",
                        
                        success: function(data){
                    
                            $('#invoice_value').html(data);
                  
                        }
                });

               

    });
 </script>