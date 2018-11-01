<?php
	
	include_once"login/header.php";
?>
<div class="container w3-padding-64">
	<span class="w3-left"> <a href="<?php echo base_url()?>pdf/invoice_pdf" target="_blank" class="w3-right"> <span class="fa fa-file-pdf-o w3-text-red fa-2x"></span> Downloada</a></span>
	<div class="panel panel-default">
		<a href="largeModal" class="btn btn-primary adddata w3-right"  data-toggle="modal"></a>
		<div class="panel-heading w3-center w3-padding-24">
			<span class="  fa fa-grav fa-2x w3-text-orange">
				Buyers Order Details 
			</span>
			</div> <!-- Modal -->
			<!-- Large Modal HTML -->
			<div class="panel-body">
				<div class="w3-responsive">
					<table class="w3-table-all table-bordered w3-hoverable" id="order_data">
						<thead>
							<tr>
								<th>ID</th>
								
								<th> <span class=" 	fa fa-bank w3-text-teal"></span>Busniness/Owner Name</th>
								<th><span class="
								fa fa-shield w3-text-green"></span> NTN no</th>
								<th> <span class="
								fa fa-object-ungroup w3-text-blue"></span>Email</th>
								<th> <span class="fa fa-pencil-square-o w3-text-red"></span>Contact</th>
								<th><span class="fa fa-calendar w3-text-red"></span>Address</th>
								<th><span class="fa fa-calendar w3-text-blue"></span>Date</th>
								
								<th><span class="fa fa-eye w3-text-blue"></span>View</th>
								
							</tr>
						</thead>
						<tbody>
							<?php
							foreach ($data as $data):?>
							<tr>
								
								<td><?=$data['id'];?></td>
								
								<td><?=$data['business_name'];?></td>
								<td><?=$data['ntn'];?></td>
								<td><?=$data['email'];?></td>
								<td><?=$data['contact'];?></td>
								<td><?=$data['address'];?></td>
								<td><?=$data['date'];?></td>
								<td>
									<span class="fa fa-eye w3-text-blue"><a class="view" id="<?=$data['business_name']?>"> View</a></span></td>
									<?php endforeach; ?>
								</tr>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	<div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true" style="margin-top: -20px;">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header ">User Detail
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title" id="myModalLabel"></h4>
				</div>
				<div class="modal-body">
					<!-- Place to print the fetched phone -->
					<div id="result">
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
	<!-- jQuery JS CDN -->
	<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
	<!-- jQuery DataTables JS CDN -->
	<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
	<!-- Bootstrap JS CDN -->
	<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
	<!-- Bootstrap JS CDN -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<script >
		
		$(document).ready(function(){
				var orderdataTable = $('#order_data').DataTable({
				"columnDefs":[],
			});


				 $('.view').click(function(){
    			var business_name = $(this).attr('id');
    			$('#Modal').modal('show');
    			  $.ajax({
						    url: "<?php echo base_url() ?>purchasers_controller/business_data",
						    method: "POST",
						    data: {business_name:business_name},
						    success: function(data)
						    {
						     $('#result').html(data);
						   
						    $('#Modal').modal('show');
						    }
   						 });

});

	});
	</script>