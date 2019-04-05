<?php $this->load->view('profile_header/prf_header.php')?>
<div class="panel panel-default w3-padding " >
	<div class="panel-heading w3-padding-32 w3-card-4"><h4><span class="fa fa-key w3-text-black"></span> Password & Security</h4></div>
	<div class="panel-body w3-card-2 w3-padding-64" style="background-image: url(http://www.ubuntu-ast.org/largeimages/130/1301988_snow-leopard-wallpaper-mac.jpg);">
		<div class="w3-container" >
			<div class="col-sm-4">
				<form action="" id="form_data" class="form_data">
			<div class="form-group">
				<label for="name">Old Password:</label>
				<input type="password" name="old_password" id="old_password" class="form-control">
			</div>
			<div class="form-group">
				<label for="name">New Password:</label>
				<input type="password" name="new_password" id="new_password" class="form-control">
			</div>
			<div class="form-group">
				<label for="contact">Security Question</label>
				<select class="w3-select" name="option">
							<option value="" disabled selected>Choose your option</option>
							<option value="1">Question 1</option>
							<option value="2">Question 2</option>
							
						</select>
			</div>
			<div class="form-group">
				<label for="name">Security Ansewr:</label>
				<input type="password" name="security_answer" id="security_answer" class="form-control">
			</div>
			<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10 w3-center">
						<button type="submit" id="submit" class="submit" class="w3-btn w3-black">Update</button>
					</div>
				</div>
		</form>
			</div>
			<div class="col-sm-6">
				
			</div>
		</div>
		
	</div>
</div>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
 <script src="<?php echo base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>
<script>
$(document).on('submit','#form_data', function(event){
                event.preventDefault();
               
                var form_data = $(this).serialize();

                        $.ajax({
                            url:"<?php echo base_url() ?>profile/pwd_change",
                            method:"POST",
                            data:form_data,
                            success:function(data){
								swal({
                                    title: data,
                                    text: "🚧🚧🚧👀",
                                    icon: "success",
                                    });
                              
							  $('#form_data')[0].reset();
                               
                                
                             
                            }
                        });
        });
</script>
<?php //$this->load->view('profile_header/prf_footer.php')?>