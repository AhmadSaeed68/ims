<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   
    <meta name="Musawer" content="">
    <link rel="icon" href="http://localhost/ims/assets/web/owl.gif" type="image/x-icon"/>
  <title>OWL-IMS</title>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
                 
                      
    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url(); ?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="<?php echo base_url(); ?>assets/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">
            <!-- W3.css -->
    <link rel = "stylesheet" type = "text/css" href = "<?php echo base_url(); ?>assets/css/w3.css">
    <!-- DataTables CSS -->
    <link href="<?php echo base_url(); ?>assets/vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">
    <script src='https://code.responsivevoice.org/responsivevoice.js'></script>
    <!-- DataTables Responsive CSS -->
    <link href="<?php echo base_url(); ?>assets/vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?php echo base_url(); ?>assets/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="<?php echo base_url(); ?>assets/vendor/morrisjs/morris.css" rel="stylesheet">
    
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!-- Custom Fonts -->
    <link href="<?php echo base_url(); ?>assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">
    
    <link href="<?php echo base_url(); ?>assets/vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

<!-- DataTables Responsive CSS -->
<link href="<?php echo base_url(); ?>assets/vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">

<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Karma">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">

  
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!-- [if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif] -->

</head>

<body style="font-family:Karma;font-size:16px" >
<?php   $id=$this->session->userdata('user_id'); 
			
            if($id){
					?>

 <div id="wrapper">

 
        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top w3-black" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand w3-wide fa-2x" href="<?php echo base_url("admin/dashboard")?>">Inventory Managment System</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <!-- <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-envelope fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-messages">
                        
                        
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <strong>John Smith</strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                                </div>
                                <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>Read All Messages</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                   
                </li> -->
                 <!-- /.dropdown-messages -->
                <!-- /.dropdown -->
                <!-- <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-tasks fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-tasks">
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 1</strong>
                                        <span class="pull-right text-muted">40% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                            <span class="sr-only">40% Complete (success)</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 2</strong>
                                        <span class="pull-right text-muted">20% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
                                            <span class="sr-only">20% Complete</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 3</strong>
                                        <span class="pull-right text-muted">60% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                            <span class="sr-only">60% Complete (warning)</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 4</strong>
                                        <span class="pull-right text-muted">80% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                                            <span class="sr-only">80% Complete (danger)</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>See All Tasks</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    
                </li> -->
                <!-- /.dropdown-tasks -->
                <!-- /.dropdown -->
                <?php
                    if($id->promo =='pro'):
                    ?>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-bell fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                   
                    <ul class="dropdown-menu dropdown-alerts">
                   
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-comment fa-fw"></i> Purchase Requests
                                    <span class="pull-right badge badge-dark text-muted small"><span id="notify_purchse_req"></span></span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                       
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>See All Alerts</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-alerts -->
                </li>
                    <?php endif;?>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i><?= $id->email?></a>
                        </li>
                        <li><a href="<?php echo base_url('profile')?>"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="<?php echo base_url("login/logout")?>"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->


            <div class="navbar-default sidebar w3-snow"  role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav w3-text-white" id="side-menu">
                        <!-- <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                            
                        </li> -->
                        <?php $sid = "admin"; if($sid!="dept"){?>
                        <li>
                            <a href="<?php echo base_url("admin/dashboard")?>"><i class="fa w3-text-green fa-2x fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        
                        <li>
                            <a href="#"><i class="fa fa-first-order fa-2x w3-text-green fa-fw"></i> Category & items<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                            <li>
                            <a href="<?php echo base_url("category_controller/category")?>"><i class="fa fa-2x w3-text-lime fa-crosshairs fa-fw"></i> Category</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url("items_controller/item");?> "><i class="fa fa-2x w3-text-light-green fa-briefcase fa-fw"></i>Items</a>
                        </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-shopping-basket fa-2x w3-text-indigo fa-fw"></i>Purchase & Sales Orders<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                <a href="<?php echo base_url("order_controller/order_managment");?>"><i class="fa w3-text-light-blue  fa-edit fa-fw"></i> Purchase Order</a>
                                   
                                </li>
                                <li>
                                <a href="<?php echo base_url("sale_order_controller/sales_order");?> "><i class="fa w3-text-cyan  fa-crop fa-fw"></i> Sales Order</a>
                                   
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-braille fa-2x w3-text-deep-orange fa-fw"></i>  Order Confirmations<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                <a href="<?php echo base_url("invoice_controller/po_invoice");?> "><i class="fa w3-text-orange  fa-object-ungroup fa-fw"></i> confirm PO Order</a>
                                   
                                </li>
                                
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="<?php echo base_url("stock_controller/stock");?> "><i class="fa fa-database w3-text-teal fa-2x fa-fw"></i> Stock</a>
                        </li>
                        <?php if($id->promo=='pro'):?>
                        <li>
                            <a href="#"><i class="fa fa-hdd-o fa-2x w3-text-pink fa-fw"></i>Dept. & Requests<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                            <li>
                            <a href="<?php echo base_url("department_controller/index");?> "><i class="fa fa-university fa-2x w3-text-purple fa-fw"></i> Department</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url("purchase_request_controller/index");?> "><i class="fa fa-sticky-note fa-2x w3-text-pink fa-fw"></i> Requests</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url("purchase_request_controller/request_action");?> "><i class="fa fa-flask fa-2x w3-text-blue-gray fa-fw"></i> Requests Action</a>
                        </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <?php endif;?>
                        <li>
                            <a href="#"><i class="fa fa-server fa-2x w3-text-red fa-fw"></i> Store Detail<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                
                                
                                <li>
                                <a href="<?php echo base_url("store_controller/index");?> "><i class="fa fa-fire  w3-text-orange fa-fw"></i> Add Stores</a>
                                   
                                </li>
                                <li>
                                <a href="<?php echo base_url("store_controller/store_detail")?>"><i class="fa fa-deaf  w3-text-orange fa-fw"></i> Store Detail</a>
                                    
                                </li>
                               
                               
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-shekel fa-2x w3-text-yellow fa-fw"></i> More<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                <a href="<?php echo base_url("report")?>"><i class="fa fa-file-text  w3-text-orange  fa-fw"></i> Report</a>
                                    
                                </li>
                                <li>
                                <a href="<?php echo base_url("users_inform_controller/user_detail")?>"><i class="fa fa-blind w3-text-blue  fa-fw"></i> Buyers</a>
                                   
                                </li>
                                <li>
                                <a href="<?php echo base_url("purchasers_controller/purchasers_detail");?> "><i class="fa fa-users w3-text-brown  fa-fw"></i> Buyers Purchasing Detail</a>
                                   
                                </li>
                                <li>
                                <a href="<?php echo base_url("vendors_controller/vendors")?>"><i class="fa fa-universal-access w3-text-deep-purple  fa-fw"></i>  Vendors</a>
                                   
                                </li>
                                <li>
                                <a href="<?php echo base_url('profile')?>"><i class="fa fa-gear w3-text-black  fa-fw"></i> Setting</a>
                                   
                                </li>
                                
                            </ul>
                            <!-- /.nav-second-level -->
                       </li> 
                        <?php }
                        else{

                        
                        ?>
                        <li>
                            <a href="<?php echo base_url("purchase_request_controller/index");?> "><i class="fa fa-edit fa-fw"></i> Requests</a>
                        </li>
                                 <li>
                                    <a href="<?php echo base_url('profile')?>">Setting</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url("purchasers_controller/purchasers_detail");?> ">Purchasers</a>
                                </li>
                                <li>
                            <a href="<?php echo base_url("category_controller/category")?>"><i class="fa fa-dashboard fa-fw"></i> Category</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url("items_controller/item");?> "><i class="fa fa-dashboard fa-fw"></i>Items</a>
                        </li>
                        <?php }?>
                        <!-- <li>
                            <a href="#"><i class="fa fa-sitemap fa-fw"></i> Multi-Level Dropdown<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="#">Second Level Item</a>
                                </li>
                                <li>
                                    <a href="#">Second Level Item</a>
                                </li>
                                <li>
                                    <a href="#">Third Level <span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">
                                        <li>
                                            <a href="#">Third Level Item</a>
                                        </li>
                                        <li>
                                            <a href="#">Third Level Item</a>
                                        </li>
                                        <li>
                                            <a href="#">Third Level Item</a>
                                        </li>
                                        <li>
                                            <a href="#">Third Level Item</a>
                                        </li>
                                    </ul>
                                   
                                </li>
                            </ul>
                            
                        </li> -->
                        <!-- <li>
                            <a href="#"><i class="fa fa-files-o fa-fw"></i> Sample Pages<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="blank.html">Blank Page</a>
                                </li>
                                <li>
                                    <a href="login.html">Login Page</a>
                                </li>
                            </ul>
                           
                        </li> -->
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper" class="w3-padding-32">
            <?php
        } else {
            
        }
            ?>