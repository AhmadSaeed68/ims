

<?php include"login/header.php"; 
     $id=$this->session->userdata('user_id');
     //print_r($id->id); ?>
     <div class="container">
     
       <div class="w3-padding-64 w3-center">
         <h1 class=" fa-3x"><i class="fa fa-address-book w3-text-deep-orange"></i> Inventory Managment System</h1>
       </div>
       <div class="container w3-padding-48">
         <div class="row">
         <div class="w3-card-4" style="width:40%">
    <header class="w3-container w3-teal">
      <h4>Welcome back: <?php echo $id->email;?></h4>
    </header>
    <div class="w3-container w3-padding-24">
    <?php
//date_default_timezone_set('Asia/Calcutta'); - You can choose any timezone
 
//Calculate 60 days in the future
//seconds * minutes * hours * days + current time
date_default_timezone_set("Asia/Karachi");
$inTwoMonths = 60 * 60 * 24 * 60 + time();
setcookie('lastVisit', date("g:i:s:a - d/m/y"), $inTwoMonths);
if(isset($_COOKIE['lastVisit']))
 
{
$visit = $_COOKIE['lastVisit'];
?>
<span class="w3-text-black  w3-light-blue w3-codespan"><?php  echo "Your last Visit was  : ". $visit?> </span>
<?php

}
else
 echo "Welcome to System: Hope Fully you Enjoy YOur Work:)";
?>
    </div>
     </div>
         </div>
       </div>
      
  
        <?php if($feedback=$this->session->flashdata('feedback')) :
            $feedback_msg=$this->session->flashdata('feedback_msg');
            ?>
            <div class="container w3-padding-32">
            <div class="row">
                <div class="col-sm-8">
                    <div class="alert alert-dismissible <?= $feedback_msg; ?>">
                    <?php echo $feedback ;?>
                    
                    </div>
                    
                </div>
            </div>
            </div>
           
            <?php endif; 

?>


<div class="row">


<div class="col-md-4">
 <div class="panel panel-success ">
  <div class="panel-heading w3-light-green"><strong> <span class="fa fa-compass fa-2x w3-text-red"></span> Total Category</strong></div>
  <div class="panel-body" align="center">
   <h1 id="count_category"></h1>
  </div>
 </div>
</div>

<div class="col-md-4">
 <div class="panel panel-danger">
  <div class="panel-heading"><strong> <span class="fa fa-line-chart fa-2x w3-text-orange"></span> Total Item in Stock</strong></div>
  <div class="panel-body" align="center">
   <h1 id="count_items"></h1>
  </div>
 </div>
</div>
<div class="col-md-4">
 <div class="panel panel-warning">
  <div class="panel-heading"><strong> <span class="fa fa-thumb-tack fa-2x w3-text-blue"></span> Total Purchase Orders</strong></div>
  <div class="panel-body" align="center">
  <h1 id="count_order"></h1>
  </div>
 </div>
</div>
<div class="col-md-4">
 <div class="panel panel-info">
  <div class="panel-heading"><strong> <span class="fa fa-qrcode fa-2x w3-text-red"></span> Pending PO_invoices</strong></div>
  <div class="panel-body" align="center">
   <h1 id="count_pending_po_invoices"></h1>
  </div>
 </div>
</div>
<div class="col-md-4">
  <div class="panel panel-danger">
   <div class="panel-heading"><strong>  <span class="fa fa-qrcode fa-2x w3-text-red"></span>Total PO_Invoices</strong></div>
   <div class="panel-body" align="center">
    <h1 id="total_po_invoices"></h1>
   </div>
  </div>
 </div>
<div class="col-md-4">
  <div class="panel panel-danger">
   <div class="panel-heading"><strong>  <span class="fa fa-user fa-2x w3-text-red"></span>Total PO_Invoices</strong></div>
   <div class="panel-body" align="center">
    <h1 id="user_count"></h1>
   </div>
  </div>
 </div>

 <hr />
 <hr />
 

 <!-- <div class="col-md-12">
  <div class="panel panel-default">
   <div class="panel-heading"><strong>Total Order Value User wise</strong></div>
   <div class="panel-body" align="center">
   
   </div>
  </div>
 </div>

</div> -->
<div class="row">
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
</div>





<!-- <div class="container w3-padding-32">
<div class="row">
  <div class="col-md-12">
  <ol class="breadcrumb">
  <li class="breadcrumb-item"><a href="#">Home</a></li>
  <li class="breadcrumb-item"><a href="#">Library</a></li>
  <li class="breadcrumb-item active">Data</li>
</ol>
  </div>
</div>
<div> -->
  <hr />
<!-- <div class="card border-success mb-3" style="max-width: 200rem;">
  <div class="card-header"><i class="fa fa-2x fa-info-circle">Manage Orders $ Stock</i></div>
  <div class="card-body"> -->
    
    <!-- <div class="div-action pull pull-right">
     
     <?php //anchor('prd/load_prd_view',' Add Stock',['class'=>'btn btn-outline-success w3-red fa fa-plus-square',])?> <!-- 'data-toggle'=>'modal' -->
      <!-- </div> --> -->
   
      
    
    <!-- <div class="container w3-padding-64">
     <div class="row">
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-primary o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-5x w3-text-blue fa-fw fa-home"></i>
                
              </div>
              <div class="mr-5">Stock Detail</div>
            </div> -->
            <?php // anchor('prd/stock_list',' View Stock',['class'=>'w3-inverse fa fa-angle-right float-right card-footer text-white clearfix small z-1',])?> 

           <!-- </div>
        </div>

        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-warning o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-chart-bar"></i>
                <span class="glyphicon glyphicon-stats " style="font-size:80px;"></span>
              </div>
              <div class="mr-5">View Assets</div>
            </div> -->
            <?php // anchor('prd/assets',' View Assets',['class'=>'w3-inverse fa fa-angle-right float-right card-footer text-white clearfix small z-1',])?> 
          <!-- </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-success o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
              <i class="fab fa-5x w3-text-red fa-creative-commons-remix"></i>
              </div>
              <div class="mr-5">View Vendors</div>
            </div> -->
            <?php // anchor('prd/vendors','View Vendors',['class'=>'w3-inverse fa fa-angle-right float-right card-footer text-white clearfix small z-1',])?> 
          <!-- </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-danger o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
              <i class="fas fa-5x w3-text-green fa-briefcase-medical"></i>

               
              </div>
              <div class="mr-5">Add Sales</div>
            </div> -->
            <?php // anchor('prd/prd_sales','Add Sales',['class'=>'w3-inverse fa fa-angle-right float-right card-footer text-white clearfix small z-1',])?> 
          <!-- </div>
        </div>
      </div>
      </div>
  </div>
</div>
</div>
</div>



<div class="container">
<div class="row w3-padding-32">
<div class="col-sm-4"> -->
<?php //echo print_r($id->email);?>
<!-- </div>
</div>
</div> -->

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
   //Count total_po_invoices

                $.ajax({
                    
                    url: "<?php echo base_url() ?>report/total_po_invoices",
                    method: "POST",
                        
                        success: function(data){
                    
                            $('#total_po_invoices').html(data);
                  
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

                   //Count Pending PO_invoices


                 $.ajax({
                    
                    url: "<?php echo base_url() ?>report/count_pending_po_invoices",
                    method: "POST",
                        
                        success: function(data){
                    
                            $('#count_pending_po_invoices').html(data);
                  
                        }
                });

               

    });
 </script>

<?php include "login/footer.php";

?>

