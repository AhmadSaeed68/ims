<?php $this->load->view('profile_header/prf_header.php')?>
<div class="panel panel-default w3-padding-32" >
	<div class="panel-heading  w3-padding-32 w3-card-4"><h4><span class="fa fa-money"></span> Profile</h4></div>
	<div class="panel-body w3-card-2 w3-padding-64" style="background-image: url(http://www.ubuntu-ast.org/largeimages/130/1301988_snow-leopard-wallpaper-mac.jpg);">
		<div class="w3-container">
			<div class="col-sm-4">
				<form action="/action_page.php">
			<div class="form-group">
				<label for="name">Name:</label>
				<input type="text" name="name" id="name" class="form-control">
			</div>
			<div class="form-group">
				<label for="email">Email:</label>
				<input type="email" class="form-control" id="email">
			</div>
			<div class="form-group">
				<label for="contact">Contact:</label>
				<input type="number" class="form-control" name="contact" id="contact">
			</div>
			<div class="form-group">
				<label for="pwd">Address:</label>
				<textarea name="address" id="address" class="form-control"></textarea>
			</div>

			<button type="submit" class="w3-btn w3-black">Update</button>
		</form>
			</div>
			<div class="col-sm-6">
				
			</div>
		</div>
		
	</div>
</div>
<?php $this->load->view('profile_header/prf_footer.php')?>

