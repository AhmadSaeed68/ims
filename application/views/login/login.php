<?php  include "header.php"; ?>
<style>
body,h1 {font-family: "Raleway", sans-serif}
body, html {height: 100%}
.bgimg {
  background-image: url('https://cdn.allwallpaper.in/wallpapers/2400x1350/1873/black-light-bulbs-minimalistic-2400x1350-wallpaper.jpg');
  min-height: 100%;
  background-position: center;
  background-size: cover;
}
</style>

<header class="w3-container w3-center w3-padding-48 w3-white">
      <h1 class="w3-jumbo w3-animate-zoom"><img src="http://localhost/ims/assets/web/owl.gif" height="10%" width="10%" alt="OWL-IMS"><b>OWL-IMS</b></h1>
      <h3 class="w3-animate-right w3-xlarge"><span class="w3-tag">Test Version</span></h3>

     
    </header>

    
<!-- <div class="bgimg">
    <div class="container  w3-padding-64" >
         <div class="row"> -->
        <div class="col-sm-8 w3-card-4 w3-white">
            <?php echo form_open('login/admin_login');?>
            <fieldset>
                <legend class="w3-center" style="font-variant: small-caps;"><h1>Ims Login</h1></legend>
                
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-2 col-form-label w3-text-red">Note:</label>
                    <div class="col-sm-10 w3-padding">
                        <span  class="form-control-plaintext w3-xlarge" id="staticEmail">If Login Failed, Please<i class="fa fa-fw fa-envelope w3-text-red"></i> <a href="mailto:pakjalihouse@gmail.com?subject=Why login fail" "email me">email us</a></span>
                    </div>
                </div>
                <?php
                if($error=$this->session->flashdata('login_failed')){?>
                <div class="row w3-center">
                    <div class="col-sm-8">
                        <div class="text-warning">
                            <h5 class="w3-code w3-red">
                            <?php echo $error; ?>
                            </h5>
                        </div>
                        
                    </div>
                </div>
                
                <?php
                }
                ?>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email" class="w3-input w3-animate-input w3-light-gray" style="width:70%" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="email">
                            <small id="emailHelp" class="form-text text-muted w3-text-deep-orange">We'll never share your Personal Data with anyone else.</small>
                        </div>
                    </div>
                    <div class="col-sm-6 w3-animate-zoom">
                    <span style="font-family:TIMES NEW ROMAN">  <?php echo form_error('email'); ?></span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" class="w3-input w3-animate-input w3-light-gray" style="width:70%" id="exampleInputPassword1" name="password" placeholder="Password">
                        </div>
                    </div>
                    <div class="col-sm-6 w3-animate-zoom">
                        <span style="font-family:TIMES NEW ROMAN"><?php echo form_error('password'); ?></span>
                    </div>
                </div>
                <div class="form-group w3-center">
                    
                    <input type="submit" name="login" class="w3-button w3-section w3-blue w3-ripple w3-padding" value="Login">
                </div>
            </fieldset>
            
            <?php echo form_close()?>
        </div>
    <!-- </div>
    </div></div> -->
   
