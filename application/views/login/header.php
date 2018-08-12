<?php
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
 
<html>
    <head>
        <meta charset="UTF-8">
        <title>Login</title>
        <?= link_tag('assets/css/bootstrap.min.css');?>
        <?= link_tag('assets/css/w3.css');?>
        <?= link_tag('assets/css/font-awesome.css');?>
        <?= link_tag('assets/css/dataTables.bootstrap4.css');?>
        <?= link_tag('assets/js/jquery.min.js');?>
        <?= link_tag('assets/js/bootstrap.min.js');?>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">
        <script src="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"></script>
		<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="http://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
    <?php $id=$this->session->userdata('user_id');
      if($id){
    ?>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                  <a class="navbar-brand" href="#">DashBoard</a>
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>
                
                  <div class="collapse navbar-collapse" id="navbarColor01">
                    <ul class="navbar-nav mr-auto">
                      <li class="nav-item active">
                        
                        <?= anchor('admin/dashboard',' Dashboard',['class'=>'nav-link fa fa-dashboard w3-text-red'])?>
                      </li>
                      <li class="nav-item dropdown">
                          <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><i class="glyphicon glyphicon-list-alt" style="font-size:15px"></i> Category</a>
                          <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 38px, 0px);">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <a class="dropdown-item" href="#">Something else here</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Separated link</a>
                          </div>
                        </li>

                

                      <li class="nav-item">
                        <a class="nav-link " href="#" ><i class="glyphicon glyphicon-calendar" style="font-size:15px"></i>Report</a>
                      </li>
                    </ul>
                    <form class="form-inline my-2 my-lg-0">

                   <?= anchor('login/logout','LogOut',['class'=>'nav-link  glyphicon glyphicon-log-out','data-toggle'=>'modal'])?>
                         
                          </form>
                    
                  </div>
                </nav>
      <?php }?> 
    <body>
        
    