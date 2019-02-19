<?php 
	include_once "login/header.php";

 ?>

 <div class=" w3-padding-64">

        <span class="w3-left"> <a href="<?php echo base_url()?>pdf/invoice_pdf" target="_blank" class="w3-right"> <span class="fa fa-file-pdf-o w3-text-red fa-2x"></span> Download</a></span>


        <div class="panel panel-default">
            <a href="largeModal" class="btn btn-primary adddata w3-right" id="adddata"  data-toggle="modal">Add Users</a>
            <div class="panel-heading w3-center w3-padding-24">
                <span class=" fa fa-user fa-2x w3-text-red">
                    USERS DETAIL
                </span>
                </div> <!-- Modal -->
                <!-- Large Modal HTML -->

                <div class="panel-body">
                    <div class="w3-responsive">
                        <table class="w3-table-all table-bordered w3-hoverable" id="order_data">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Customer Name</th>
                                    <th> <span class="fa fa-code-fork w3-text-teal"></span>NTN no</th>
                                    <th><span class="
                                    fa fa-shield w3-text-green"></span>Business Name</th>


                                    <th> <span class="
                                    fa fa-object-ungroup w3-text-blue"></span>Contact</th>
                                    <th> <span class="fa fa-pencil-square-o w3-text-red"></span>City</th>
                                    <th><span class="fa fa-calendar w3-text-red"></span>Address</th>
                                    <th><span class="fa fa-eye w3-text-blue"></span>email</th>
                                        <th><span class="fa fa-eye w3-text-blue"></span>date</th>
                                  

                                    <th>Action</th>
                                </tr>
                            </thead>
                             <tbody>
                             <?php foreach($data as $data):?>
                             	<tr>
                             		<td><?=$data['id']?></td>
                             		<td><?=$data['user_name']?></td>
                             		<td><?=$data['ntn']?></td>
                             		<td><?=$data['business_name']?></td>
                             		<td><?=$data['contact']?></td>
                             		<td><?=$data['city']?></td>
                             		<td><?=$data['address']?></td>
                             		<td><?=$data['email']?></td>
                             		<td><?=$data['date']?></td>
                             		  <td> <div class="dropdown">
                                        <button class="btn w3-orange btn-default dropdown-toggle" type="button" data-toggle="dropdown">Action
                                        <span class="caret"></span></button>
                                        <ul class="dropdown-menu">

                                            <li><input type="button" class="w3-button w3-block w3-teal edit" value="Edit" id="<?php echo $data['id']; ?>"></li>
                                            
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
          <span id="so_data"></span>
            <div class="row">
                 <form  accept-charset="utf-8" id="user_detail">
                  
                 
                    <div class="col-sm-6">
                     <div class="row">
                      <div class="form-group">
                         <div class="col-sm-4">
                           <label for="customer Name">Owner Name</label>
                            
                           <input type="text" class="form-control" required name="user_name"  placeholder="User/Owner Name">
                         </div>
                         <div class="col-sm-4">
                           <label for="customer Name">NTN no</label>
                           <input type="text" class="form-control" name="ntn"   placeholder="12N542-0">
                         </div>
                           <div class="col-sm-4">
                           <label for="customer Name">Business Name</label>
                           <input type="text" class="form-control" name="business_name" required placeholder="@X trade Corp.">
                         </div>
                       </div>
                      
                       <div class="form-group">
                       	 <div class="col-sm-12">
                           <label for="customer Name">Address</label>
                           <textarea type="text" class="form-control" name="address" required  placeholder="120N,XYZ Road,Pakistan PO-BOX:1233"></textarea>
                         </div>
                       </div>

                       

                     </div>
                    </div>
                    <div class="col-sm-6">
                    	<div class="row">
                    		<div class="form-group">
                         <div class="col-sm-6">
                           <label for="customer Name">Email</label>
                           <input type="email" class="form-control" name="email" required  placeholder="Email@xyx.com">
                         </div>
                         <div class="col-sm-5">
                           <label for="customer Name">City</label>
                           <input type="text" class="form-control" name="city" required  placeholder="City">
                         </div>
                       </div>


                       <div class="form-group">
                         <div class="col-sm-4">
                           <label for="customer Name">Contact</label>
                           <input type="number" placeholder="0300000000" name="contact" minlength="11" maxlength="11"  required class="form-control">
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


    <script>
    	$(document).ready(function(){
    		  var orderdataTable = $('#order_data').DataTable({
    		  	  "order":[0,'desc'],
            "columnDefs":[
    {
      
     "targets":[0,1,2,3,4,5,6,7,9],
     "orderable":false,
    },
   ],
            	
          });

    		  	$('.adddata').click(function(){

              $('#modal_action').modal('show');

               $(document).on('submit','#user_detail',function(event){
              
              	event.preventDefault();
              	var form_data=$(this).serialize();
		              $.ajax({
		              	url: "<?php echo base_url() ?>users_inform_controller/add_user_inform",
		              	method:"POST",
		              	data:form_data,
		              	success:function(data){
		              		alert(data);
		              		$('#modal_action').modal('hide');
		              	}
		              });
              });

             
           		});
    		  
    	});


    </script>
  
    
    