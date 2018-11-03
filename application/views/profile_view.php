<?php include_once"login/header.php";?>

<div class="container w3-padding-64">
   <div class="col-sm-6">
   <form action="/action_page.php" target="_blank">
        <div class="w3-row-padding" style="margin:0 -16px;">
          <div class="w3-half w3-margin-bottom">
            <label><i class="fa fa-user"></i>Name</label>
            <input class="w3-input w3-border" type="text" placeholder="Name"  name="name" required>
          </div>
          <div class="w3-half">
            <label><i class="fa fa-lock"></i> Password</label>
            <input class="w3-input w3-border" type="text" placeholder="password" name="password" required>
          </div>
        </div>
        <div class="w3-row-padding" style="margin:8px -16px;">
          <div class="w3-half w3-margin-bottom">
            <label><i class="fa fa-envelope"></i> Email</label>
            <input class="w3-input w3-border" type="email"  value="<?php echo $id->email;?>" name="email">
          </div>
          <div class="w3-half">
            <label><i class="fa fa-calendar"></i> Reg. Date</label>
          <input class="w3-input w3-border" type="text"  name="date" >
          </div>
        </div>
        <!-- <button class="w3-button w3-dark-grey" type="submit"><i class="fa fa-search w3-margin-right"></i> Search availability</button> -->
      </form>
   </div>
</div>
<?php include_once "login/footer.php"; ?>