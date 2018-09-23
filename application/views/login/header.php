<?php
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Login</title>

        <!-- 
          
          css files  
        
        -->
        <link rel = "stylesheet" type = "text/css" 
         href = "<?php echo base_url(); ?>assets/css/bootstrap.min.css"> 
         <link rel = "stylesheet" type = "text/css" 
         href = "<?php echo base_url(); ?>assets/css/dataTables.bootstrap.min.css"> 
         <link rel = "stylesheet" type = "text/css" 
         href = "<?php echo base_url(); ?>assets/css/w3.css"> 

         <link rel = "stylesheet" type = "text/css" 
         href = "<?php echo base_url(); ?>assets/css/font-awesome.min.css"> 

         <link rel = "stylesheet" type = "text/css" 
         href = "<?php echo base_url(); ?>assets/css/bootstrap-glyphicons.css"> 

         <link rel = "stylesheet" type = "text/css" 
         href = "<?php echo base_url(); ?>assets/css/jquery-ui.css"> 

         <link rel = "stylesheet" type = "text/css" 
         href = "<?php echo base_url(); ?>assets/css/font-awesome.min.css"> 

         <link rel = "stylesheet" type = "text/css" 
         href = "<?php echo base_url(); ?>assets/css/dataTables.bootstrap4.css"> 
         <link rel = "stylesheet" type = "text/css" 
         href = "<?php echo base_url(); ?>assets/css/all.css"> 


       


        <!--

          js files
          
           -->
           <script type = 'text/javascript' src = "<?php echo base_url(); 
         ?>assets/js/jquery.min.js"></script> 
         <script type = 'text/javascript' src = "<?php echo base_url(); 
         ?>assets/js/jquery.dataTables.min.js"></script> 

         <script type = 'text/javascript' src = "<?php echo base_url(); 
         ?>assets/js/dataTables.bootstrap.min.js"></script> 


          <script type = 'text/javascript' src = "<?php echo base_url(); 
         ?>assets/js/jquery-1.12.4.js"></script> 

          <script type = 'text/javascript' src = "<?php echo base_url(); 
         ?>assets/js/popper.min.js"></script> 

          <script type = 'text/javascript' src = "<?php echo base_url(); 
         ?>assets/js/jquery-ui.js"></script> 

          <script type = 'text/javascript' src = "<?php echo base_url(); 
         ?>assets/js/jquery-3.3.1.slim.min.js"></script>

          <script type = 'text/javascript' src = "<?php echo base_url(); 
         ?>assets/js/bootstrap.min.js"></script> 

        



        <!-- 
          
          CDN FILES
        
         -->
        
         <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script> 
    <!-- jQuery DataTables JS CDN -->
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <!-- Bootstrap JS CDN -->
    <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
    <!-- Bootstrap JS CDN -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script> 
    

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
       <link href="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">
        <script src="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"></script>
		<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script> -->
    
       <link href="http://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
  <!-- DataTables CSS CDN -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
  <!-- Font Awesome CSS CDN -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
  <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css">
  
<style>

body {font-family: "Open Sans"}
</style>
    <?php $id=$this->session->userdata('user_id');
      if($id){
    ?>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">WebSiteName</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active">
      <?= anchor('admin/dashboard',' Dashboard',['class'=>'nav-link fa fa-dashboard w3-text-red'])?>
      </li>
      <li class="dropdown">
        <a class="dropdown-toggle glyphicon glyphicon-list-alt" data-toggle="dropdown" href="#">Category
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li>
          <?= anchor('prd/stock_list',' view Stock',['class'=>'fa fa-1x fa-home w3-text-blue dropdown-item'])?>
          </li>
          <li>
          <?= anchor('prd/assets',' view Assets',['class'=>'fa fa-chart-bar w3-text-orange dropdown-item'])?>
          </li>
          <li>
          <?= anchor('prd/vendors',' view vendors',['class'=>'fab fa-1x w3-text-red fa-creative-commons-remix dropdown-item'])?>
          </li>
          <li>
      <?= anchor('prd/prd_sales',' Add Sales',['class'=>'fas fa fa-briefcase-medical w3-text-green dropdown-item'])?>
      </li>
        </ul>
      </li>
      <li>
      <?= anchor('prd/user','User',['class'=>'nav-link  glyphicon glyphicon-user'])?>
      </li>
      <li class="nav-item">
      <?= anchor('prd/category',' Category',['class'=>'nav-link  fa fa-address-card-o'])?>
      </li>
      <li class="nav-item">
          <?= anchor('prd/item',' Items',['class'=>'nav-link fa fa-columns'])?>
        </li>
      <li class="nav-item">
          <?= anchor('prd/order_managment','Order',['class'=>'nav-link  glyphicon glyphicon-tree-conifer'])?>
        </li>
        <li class="nav-item">
          <?= anchor('prd/stock','stock_item',['class'=>'nav-link  glyphicon glyphicon-tree-conifer'])?>
        </li>
                      <li class="nav-item">
                      <?= anchor('prd/po_invoice','Invoice',['class'=>'nav-link  glyphicon glyphicon-tree-conifer'])?>
                      </li>
                      <li class="nav-item">
                      <?= anchor('','PurchaseOrder',['class'=>'nav-link  glyphicon glyphicon-tree-conifer'])?>
                      </li>
                      
</ul>

    

<?= anchor('login/logout','LogOut',['class'=>'nav-link  glyphicon glyphicon-log-out'])?> <!--,'data-toggle'=>'modal'-->
      
       
  </div>
</nav>
 <?php }?> 
    <body>
        

        
       
                            
                          
                            