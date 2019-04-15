<?php $this->load->view('profile_header/prf_header.php')?>
<div class="panel panel-default w3-padding " >
	<div class="panel-heading  w3-padding-32 w3-card-4 "><h4> <span class="fa fa-money"></span> Sales Setting</h4></div>
	<div class="panel-body w3-card-2 w3-padding-64" style="background-image: url(http://www.ubuntu-ast.org/largeimages/130/1301988_snow-leopard-wallpaper-mac.jpg);">
		<div class="w3-container">

			<div class="col-sm-4">
				<form class="form-horizontal" id="form_data">
					<?php foreach ($data as $row): ?>
				<div class="form-group">
				<input type="hidden" value="<?=$row['id']?>" name="id" id="id"> 
					<label class="control-label col-sm-4" for="profit">Profit%:</label>
					<div class="col-sm-6">
						<input type="number" class="form-control" id="profit" value="<?= $row['profit'];?>" placeholder="Profit" name="profit">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-4" for="pwd">Sales Pattern:</label>
					<div class="col-sm-6">
						<select class="w3-select"  name="sale_pattern">
						
							<option value="fifo">(FIFO)First In First-Out</option>
							<option value="lifo">(LIFO)Last In First-Out</option>
							
						</select>
					</div>
				</div>
			<?php endforeach; ?>
				
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10 w3-center">
						<button type="submit" class="w3-btn w3-black">Update</button>
					</div>
				</div>
			</form>
			</div>
			<div class="col-sm-6">
				
			</div>
		</div>
		
	</div>
</div>

	<script>
	 $(document).on('submit','#form_data', function(event){
                event.preventDefault();
               
                var form_data = $(this).serialize();

                        $.ajax({
                            url:"<?php echo base_url() ?>profile/update_sales",
                            method:"POST",
                            data:form_data,
                            success:function(data){
								// swal({
                                //     title: "Successfully Updated",
                                //     text: "Success",
                                //     icon: "success",
                                //     });
                              alert(data);
									window.location = "<?php echo base_url() ?>profile/profile_sales";
                               
                                
                             
                            }
                        });
        });
	</script>

<?php //$this->load->view('profile_header/prf_footer.php')?>

