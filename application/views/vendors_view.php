<?php
include_once "login/header.php";
?>
<div class=" w3-padding-64">
	
	<!-- <span class="w3-left"> <a href="<?php echo base_url()?>pdf/invoice_pdf" target="_blank" class="w3-right"> <span class="fa fa-file-pdf-o w3-text-red fa-2x"></span> Download</a></span> -->
	<div class="panel panel-default">
  <button href="largeModal" type="button" class="btn btn-outline adddata w3-right btn-primary w3-black w3-hover-green btn-xs" id="add_dept" data-toggle="modal" data-target="#myModal" style="margin-bottom:20px;"><span class="fa fa-plus-square w3-text-red"></span> Add Vendors</button>
		<!-- <a href="largeModal" class="btn btn-primary adddata w3-right"  data-toggle="modal">Add Vendors</a> -->
		<div class="panel-heading w3-center w3-padding-24">
			<span class=" fa-2x">
			<i class="fa fa-universal-access w3-text-deep-purple  fa-fw"></i>	Vendors Detail
			</span>
			</div> <!-- Modal -->
			<!-- Large Modal HTML -->
			<div class="panel-body">
				<div class="w3-responsive">
					<table class="w3-table-all table-bordered w3-hoverable" id="order_data">
						<thead>
							<tr>
								<th>ID</th>
							<th> <span class="fa fa-code-fork w3-text-teal"></span>Vendor Name</th>
								<th> <span class="fa fa-code-fork w3-text-teal"></span>Manager Name</th>
								<th> <span class="fa fa-code-fork w3-text-teal"></span>City</th>
								<th> <span class="fa fa-code-fork w3-text-teal"></span>Address</th>
								<th><span class="
								fa fa-shield w3-text-green"></span>Email</th>
								<th><span class="
								fa fa-shield w3-text-green"></span>Contact</th>
								
							
								<th><span class="fa fa-eye w3-text-blue"></span>status</th>
								<!-- <th><span class="fa fa-eye w3-text-blue"></span>View</th> -->
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach($data as $data):?>
                             	<tr>
                             		<td><?=$data['id']?></td>
                             		<td><?=$data['vendor_name']?></td>
                             		<td><?=$data['manager_name']?></td>
                             		<td><?=$data['city']?></td>
                             		<td><?=$data['address']?></td>
                             		<td><?=$data['email']?></td>
                             		<td><?=$data['contact']?></td>
                             		<td> <?php $status=$data['status']; if($status=="active"){
                                            echo "<span class='w3-green'>Active</span>";
                                            }else{
                                            echo "<span class='w3-red'>Dective</span>";
                                        }?></td>
                             		<!-- <td><span class="fa fa-eye w3-text-blue"><a class="view" id="<?=$data['id']?>"> View</a></span></td> -->
                             		
                             		
                             		
                             		
                             		  <td> <div class="dropdown">
                                        <button class="btn w3-orange btn-default dropdown-toggle" type="button" data-toggle="dropdown">Action
                                        <span class="caret"></span></button>
                                        <ul class="dropdown-menu">

                                            <li><input type="button" class="w3-button w3-block w3-teal edit" value="Edit" id="<?php echo $data['id']; ?>"></li>
                                            <li><button class="w3-button w3-block w3-red delete" id="<?php echo $data['id']; ?>" data-status="<?=$data['status']?>">Delete</button></li>
                                        </ul>
                                    </div>
                                </td>
                                    
                             	</tr>
                             <?php endforeach; ?>
						
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true" style="margin-top: -20px;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header ">
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
	 <!-- The Modal -->
  <div class="modal fade" id="modal_action">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title"></h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
        
            <div class="row">
                 <form  accept-charset="utf-8" id="vendor_detail">
                  
                 
                    <div class="col-sm-6">
                     <div class="row">
                      <div class="form-group">
                         <div class="col-sm-4">
                           <label for="customer Name">Vendor Name</label>
                            
                           <input type="text" class="form-control" required name="vendor_name"  placeholder="Vendor Name">
                         </div>
                         <div class="col-sm-4">
                           <label for="customer Name">Manager Name</label>
                           <input type="text" class="form-control" name="manager_name"   placeholder="Exp:John Smith">
                         </div>
                          <div class="col-sm-4">
                           <label for="customer Name">Contact</label>
                           <input type="number" placeholder="0300000000" name="contact"    class="form-control">
                         </div>
                        
                           
                       </div>
                      
                       

                       

                     </div>
                     <div class="form-group">
                     	<label for="customer Name">Address</label>
                       	 <textarea name="address" class="form-control col-sm-6"></textarea>
                       </div>
                    </div>
                    <div class="col-sm-6">
                    	<div class="row">
                    		<div class="form-group">
                         <div class="col-sm-6">
                           <label for="customer Name">Email</label>
                           <input type="email" class="form-control" name="email"  placeholder="Email@xyx.com">
                         </div>
                         <div class="col-sm-5">
                           <label for="customer Name">City</label>
                           <input type="text" class="form-control" name="city" required  placeholder="City">
                         </div>
                       </div>


                       
                    	</div>
                    </div>
                
                
            </div>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          
            <button type="submit" class="btn btn-success submit_so">Submit</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        </form>
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
<script>
	
	 $(document).ready(function(){
	 	  		  var orderdataTable = $('#order_data').DataTable({
    		  	  "order":[0,'desc'],
            "columnDefs":[
    {
      
     "targets":[0,1,2],
     "orderable":false,
    },
   ],
            	
          });

	  	
	 });
	 $('.adddata').click(function(){

		$('#modal_action').modal('show');
		 $('.modal-title').html("<i class='fa fa-plus'></i> Add Vendors");
   
		                $(document).on('submit','#vendor_detail',function(event){
              
              	event.preventDefault();
              	var form_data=$(this).serialize();
		              $.ajax({
		              	url: "<?php echo base_url() ?>vendors_controller/add_vendors",
		              	method:"POST",
		              	data:form_data,
		              	success:function(data){
		              		 swal({
                                    title: "✅ New Vendor Added",
                                    text: data,
                                    icon: "success",
                                    });
                                
                                 window.location = "<?php echo base_url() ?>vendors_controller/vendors";
		              	}
		              });
              });

            
             
           		});

	 	//*******************************
	 		// GET DATA AFTER GETTING on 
	 		// EDIT BUTTON
	 		//********************************
	 		$('.edit').click(function(){
    var vendor_id = $(this).attr('id');

    $.ajax({
    url: "<?php echo base_url() ?>vendors_controller/edit_vendor",
    method: "POST",
    data: {vendor_id:vendor_id},
    success: function(data)
    {
  
    $('#result').html(data);
   
    $('#Modal').modal('show');
     $('.modal-title').html("<i class='fa fa-plus'></i> Update Vendor");
    }
    });
    });

	 		 $(document).on('submit','#update_vendor',function(event){
			    event.preventDefault();
			  	var id=$('#id').val();
			    var vendor_name=$('#vendor_name').val();
			    var manager_name=$('#manager_name').val();
			    var contact=$('#contact').val();
			    var email=$('#email').val();
			    var city=$('#city').val();
			     var address=$('#address').val();
            $.ajax({
            url: "<?php echo base_url() ?>vendors_controller/update_vendor",
            method:"POST",
                data:{ id:id,vendor_name:vendor_name,manager_name:manager_name
                    ,contact:contact,email:email,city:city,address:address,},
            
                success:function(data)
                {
                swal({
                                    title: "✅ Updated Successful",
                                    text: data,
                                    icon: "success",
                                    });
                                
                                 window.location = "<?php echo base_url() ?>vendors_controller/vendors";
                // $('#Modal').modal('hide');
                
                }
            });
    });

	 		 $(document).on('click', '.delete', function(){
			var id = $(this).attr("id");
			var status = $(this).data("status");
			var btn_action = "delete";
			if(confirm("Are you sure you want to change status?"))
			{
			$.ajax({
			url:"<?php echo base_url() ?>vendors_controller/vendor_status",
			method:"POST",
			data:{id:id, status:status, btn_action:btn_action},
			success:function(data)
			{
			swal({
                                    title: "🛑 Status Changed",
                                    text: data,
                                    icon: "success",
                                    });
                                
                                 window.location = "<?php echo base_url() ?>vendors_controller/vendors";
			}
			})
			}
			else
			{
			return false;
			}
					});

</script>