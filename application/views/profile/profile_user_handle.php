<?php $this->load->view('profile_header/prf_header.php')?>
<div class="panel panel-default w3-padding ">
	<div class="panel-heading  w3-padding-32 w3-card-4"><h4><span class="fa fa-group w3-text-black"></span> Users Handle</h4></div>
	<div class="panel-body w3-card-2 w3-padding-64" style="background-image: url(http://www.ubuntu-ast.org/largeimages/130/1301988_snow-leopard-wallpaper-mac.jpg);">
		<div class="w3-container">
			<div class="row">
				<?php echo form_open('profile/add_user_data'); ?>
			<div class="col-sm-4">
				
			<div class="form-group">
				<label for="name">Name:</label>
				<input type="text" name="name" id="name" class="form-control">
			</div>

			<div class="form-group">
				<label for="name">CNIC:</label>
				<input type="number" name="cnic" id="cnic" name="cnic" class="form-control">
			</div>
			<div class="form-group">
				<label for="email">Email:</label>
				<input type="email" class="form-control" name="email" id="email">
			</div>
			
			
		
			</div>
			<div class="col-sm-4">
				<div class="form-group">
				<label for="contact">Contact:</label>
				<input type="number" class="form-control" name="contact" id="contact">
			</div>
			
			<div class="form-group">
				<label for="name">Password:</label>
				<input type="password" name="password" id="name" class="form-control">
			</div>
			<div class="form-group">
				<label for="contact">User Type:</label>
				<select class="w3-select" name="type">
							<option value="" disabled selected>Choose Type</option>
							<option value="master">Master</option>
							<option value="user">User</option>
							<option value="super_user">Super User</option>
							
						</select>
			</div>
			</div>
			<div class="col-sm-4">
				<div class="form-group">
				<label for="pwd">Address:</label>
				<textarea name="address" id="address" class="form-control"></textarea>
			</div>

			</div>

			
			<div class="form-group">
					<div class="col-sm-offset-2 col-sm-3 w3-center">
						<button type="submit" class="w3-btn w3-black w3-block">Send</button>
					</div>
				</div>
				<?php echo form_close(); ?>
		</div>


		</div>
	</div>
</div>

<?php $this->load->view('profile_header/prf_footer.php')?>

<script type="text/javascript">
	
	 $(document).ready(function(){
	 	var user_id="<?php   $id=$this->session->userdata('user_id'); 
			echo $user_id= $id->id;
		?>";
		
	  $.ajax({
	    url: "<?php echo base_url() ?>profile/get_id_data",
	    method: "POST",
	    data: {invoice_id:invoice_id},
	    success: function(data)
	    {
		    // Print the fetched data of the selected order in the modal
		    // within the Bootstrap modal
		    $('#result').html(data);
		    // Display the Bootstrap modal
		    $('#Modal').modal('show');
		     $('.modal-title').html("<i class='fa fa-plus'></i> <span class='w3-text-orange'>Update Invocie</span> ");
	    }
    });
    });

</script>
