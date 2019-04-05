<?php $this->load->view('profile_header/prf_header.php'); ?>
<div class="panel panel-default w3-padding-32" >
	<div class="panel-heading  w3-padding-32 w3-card-4"><h4><span class="fa fa-money"></span> Profile</h4></div>
	<div class="panel-body w3-card-2 w3-padding-64" style="background-image: url(http://www.ubuntu-ast.org/largeimages/130/1301988_snow-leopard-wallpaper-mac.jpg);">
		<div class="w3-container">
			<div class="w3-card-4" style="width:50%; margin-left:20%">
				<header class="w3-container w3-blue">
					<h1> </h1>
				</header>
				<div class="w3-container w3-padding-32" ng>
					<form class="form-horizontal" name="form_data" id="form_data">
						<?php foreach($data as $data):?>
						<input type="text" hidden name="id" id="id" value="<?= $data['id'];?>">
						<div class="form-group">
							<label class="control-label col-sm-4" for="last_date">Last Update:</label>
							<div class="col-sm-8">
								<input type="text" readonly name="last_date" id="last_date" value="<?= $data['updated_at'];?>" class="form-control">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-4" for="name">Name:</label>
							<div class="col-sm-8">
								<input type="text" name="name" id="name" value="<?= $data['name'];?>" class="form-control">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-4" for="cnic">CNIC:</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" name="cnic" value="<?= $data['cnic'];?>"   id="cnic">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-4" for="email">Email:</label>
							<div class="col-sm-8">
								<input type="email" class="form-control" name="email" value="<?= $data['email'];?>"  id="email">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-4" for="contact">Contact NO:</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" value="<?= $data['contact'];?>"  name="contact" id="contact">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-4" for="address">Address:</label>
							<div class="col-sm-8">
								<textarea name="address" id="address" name="address"   class="form-control"><?= $data['address'];?></textarea>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-4" for="type">Access Type:</label>
							<div class="col-sm-4">
								<div class="form-group">
									
									<select class="form-control" value="32"  id="type" name="type">
										<option value="<?= $data['type'];?>"><?= $data['type'];?></option>
										
									</select>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-offset-2 col-sm-10">
								<button type="submit" name="submit" id="submit" class="w3-btn w3-black">Update</button>
							</div>
						</div>
						<?php endforeach;?>
					</form>
				</div>
				<footer class="w3-container w3-blue">
					<h5></h5>
				</footer>
			</div>
		<div class="col-sm-6">
				
			</div>
		</div>
		
	</div>
</div>

 
 <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
 <script src="<?php echo base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>
<script type="text/javascript">
  $(document).on('submit','#form_data', function(event){
                event.preventDefault();
               
                var form_data = $(this).serialize();

                        $.ajax({
                            url:"<?php echo base_url() ?>profile/update_detail",
                            method:"POST",
                            data:form_data,
                            success:function(data){
								// swal({
                                //     title: "Successfully Updated",
                                //     text: "Success",
                                //     icon: "success",
                                //     });
                              alert(data);
									window.location = "<?php echo base_url() ?>profile/index";
                               
                                
                             
                            }
                        });
        });
</script>
<?php //$this->load->view('profile_header/prf_footer.php')?>