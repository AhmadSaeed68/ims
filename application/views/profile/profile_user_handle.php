<?php $this->load->view('profile_header/prf_header.php')?>
<div class="panel panel-default w3-padding ">
	<div class="panel-heading  w3-padding-32 w3-card-4"><h4><span class="fa fa-group w3-text-black"></span> Users Handle</h4></div>
	<div class="panel-body w3-card-2 w3-padding-64" style="background-image: url(http://www.ubuntu-ast.org/largeimages/130/1301988_snow-leopard-wallpaper-mac.jpg);">
		<div class="w3-container">
			<div class="row">
				<?php //echo form_open('profile/add_user_data'); ?>
				<form id="form_data" name="form_data">
			<div class="col-sm-4">
			<?php   $id=$this->session->userdata('user_id'); 
			
					?>
			<input type="hidden" name="id" id="id" value="<?= $id->id;?>" class="form-control">
			<div class="form-group">
				<label for="name">Name:</label>
				<input type="text" name="name" id="name" class="form-control">
			</div>

			<div class="form-group">
				<label for="cnic">CNIC:</label>
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
				<input type="password" name="password" id="password" class="form-control">
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
		

			
			<div class="form-group">
					<div class="col-sm-offset-2 col-sm-3 w3-center">
						<button type="submit" class="w3-btn w3-black w3-block">Send</button>
					</div>
				</div>
				</form>
				<?php //echo form_close(); ?>
		</div>


		</div>
	</div>
</div>

<?php //$this->load->view('profile_header/prf_footer.php')?>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
 <script src="<?php echo base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>
<script type="text/javascript">
	
$(document).on('submit','#form_data', function(event){
                event.preventDefault();
               
                var form_data = $(this).serialize();

                        $.ajax({
                            url:"<?php echo base_url() ?>profile/add_subusers",
                            method:"POST",
                            data:form_data,
                            success:function(data){
								swal({
                                    title: data,
                                    text: "Success",
                                    icon: "success",
                                    });
									$('#form_data')[0].reset();
									//window.location = "<?php //echo base_url() ?>profile/index";
                               
                                
                             
                            }
                        });
        });

</script>
