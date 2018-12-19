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
                      <script src='https://code.responsivevoice.org/responsivevoice.js'></script>
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
                      <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
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
                      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
                      <?php $id=$this->session->userdata('user_id');
                      
                      if($id){
                      ?>
                      <style>
                      
                      .navbar {
                      font-family: Montserrat, sans-serif;
                      margin-bottom: 0;
                      background-color: #2d2d30;
                      border: 0;
                      font-size: 11px !important;
                      letter-spacing: 4px;
                      /* opacity: 0.9; */
                      }
                      .navbar li a, .navbar .navbar-brand {
                      color: #d5d5d5 !important;
                      }
                      .navbar-nav li a:hover {
                      color: #fff !important;
                      }
                      .navbar-nav li.active a {
                      color: #fff !important;
                      background-color: #29292c !important;
                      }
                      .navbar-default .navbar-toggle {
                      border-color: red;
                      }
                      .open .dropdown-toggle {
                      color: #fff;
                      background-color: #555 !important;
                      }
                      .dropdown-menu li a {
                      color: #000 !important;
                      }
                      .dropdown-menu li a:hover {
                      background-color: teal !important;
                      }
                      </style>
                      <nav class="navbar navbar-inverse navbar-fixed-top">
                        <div class="container-fluid">
                          <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            </button>
                            <a class="navbar-brand w3-red" href="<?php echo base_url("admin/dashboard")?>"><span class="
                            fa fa-dashboard w3-text-snow"></span> Dashboard</a>
                          </div>
                          <div class="collapse navbar-collapse" id="myNavbar">
                            <ul class="nav navbar-nav active">
                              <li>
                              
                              </li>
                              <li class="w3-hover-blue"><a href="<?php echo base_url("category_controller/category");?> " ><span class="fa fa-compass fa-2x w3-text-red"></span>Category</a></li>
                              <li class="w3-hover-light-blue"><a href="<?php echo base_url("items_controller/item");?> "><span class="
                              fa fa-sitemap w3-text-green fa-2x"></span>Items</a></li>
                                 <li class="dropdown w3-hover-orange">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#"> <span class="
fa fa-file-zip-o fa-2x w3-text-deep-orange"></span>Orders
                                  <span class="caret"></span></a>
                                  <ul class="dropdown-menu">
                                     <li class=""><a href="<?php echo base_url("order_controller/order_managment");?> "><span class="
                              fa fa-thumb-tack fa-2x w3-text-blue" w3-hover-teal></span>Purchase Order</a></li>
                              <li class="w3-hover-light-green"><a href="<?php echo base_url("sale_order_controller/sales_order");?> "><span class="
                             
fa fa-file-text fa-2x w3-text-pink"></span>Sales Order</a></li>
                                    
                                    
                                  </ul>
                                </li>



                                <li class="dropdown w3-hover-light-green">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#"> <span class="
fa fa-file-code-o fa-2x w3-text-pink"></span>Invoices
                                  <span class="caret"></span></a>
                                  <ul class="dropdown-menu">
                                   <li class="w3-hover-light-green"><a href="<?php echo base_url("invoice_controller/po_invoice");?> "><span class="
                              fa fa-qrcode fa-2x w3-text-red"></span>PO_Invoice</a></li>
                              <li class="w3-hover-light-green"><a href="<?php echo base_url("sales_invoice_controller/sales_invoice");?> "><span class="
                              fa fa-file-o fa-2x w3-text-red"></span>Sales Invoice</a></li>
                                    
                                  </ul>
                                </li>
                             
                              
                              <li class="w3-hover-teal"><a href="<?php echo base_url("stock_controller/stock");?> "><span class="
                              fa fa-line-chart fa-2x w3-text-sand"></span>Stock</a></li>
                              <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">MORE
                                  <span class="caret"></span></a>
                                  <ul class="dropdown-menu">
                                    <li><a href="<?php echo base_url("report")?>"><span class="
                                    fa fa-file-pdf-o  w3-text-red"></span>Report</a></li>
                                    <li><a href="<?php echo base_url("users_inform_controller/user_detail")?>"><span class="
                                    fa fa-user-secret  w3-text-blue"></span>Users</a></li>
                                    <li><a href="<?php echo base_url("purchasers_controller/purchasers_detail");?> "><span class="
                                    fa fa-group  w3-text-blue"></span>Purchasers</a></li>
                                     <li><a href="<?php echo base_url("vendors_controller/vendors")?>"><span class="
                                      fa fa-globe w3-text-light-blue"></span>Vendors</a></li>
                                       <li><a href="<?php echo base_url("vendors_controller/vendors")?>"><span class="
                                      fa fa-gear w3-text-light-blue"></span>Setting</a></li>
                                   
                                    
                                  </ul>
                                </li>

                                
                              </ul>
                              <ul class="nav navbar-nav navbar-right">
                                <li class="dropdown">
                                  <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="
                                  fa fa-user-circle-o fa-2x w3-text-blue"></span><?php echo substr($id->email,0,6).'...';?>
                                  <span class="caret"></span></a>
                                  <ul class="dropdown-menu">
                                    <li><a href="<?php echo base_url('profile')?>"><span class="
                                    fa fa-gear fa-2x"></span> Profile</a></li>
                                    <li><a href="<?php echo base_url("login/logout")?>"><span class="
                                    fa fa-sign-out fa-2x w3-text-red"></span> LogOut</a></li>
                                    <li><button type="button" class="w3-btn" style="background-color: #7D4119" onclick="changeBodyBg('#7D4119');">Theme1</button>
      </li>
      <li>  <button type="button" class="w3-btn" style="background-color: #5F6F20" onclick="changeBodyBg('#5F6F20');">Theme 2</button></li>
                                    
                                  </ul>
                                </li>
                              </ul>
                            </div>
                          </div>
                        </nav>
                        <?php }?>
                        <body style="font-family:TIMES NEW ROMAN;background-color: #F2F2F2" >