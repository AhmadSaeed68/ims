<?php include_once "login/header.php";?>


    <!-- /.row -->
<div class="row ">
 <button type="button" class="btn btn-outline w3-right btn-primary w3-black w3-hover-green btn-xs" id="add_dept" data-toggle="modal" data-target="#myModal" style="margin-bottom:20px;"><span class="fa fa-plus-square w3-text-red"></span> Add Department</button>
    <div class="col-lg-12">
    
        <div class="panel panel-default">
            <div class="panel-heading">
               Department view
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <table width="100%" class="table table-striped table-bordered table-hover " id="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>ID</th>
                            <th>Item Name</th>
                            <th>Dept</th>
                            <th>Qty</th>
                            <th>status</th>
                            <th>review</th>
                            <th>date</th>
                            <th>Actions</th>
                            <
                        </tr>
                    </thead>
                    <tbody>
                    
                        <!-- <tr class="odd gradeX">
                            <td>Trident</td>
                            <td>Internet Explorer 4.0</td>
                            <td>Win 95+</td>
                            
                        </tr>
                        <tr class="even gradeC">
                            <td>Trident</td>
                            <td>Internet Explorer 5.0</td>
                            <td>Win 95+</td>
                            
                        </tr>
                        <tr class="odd gradeA">
                            <td>Trident</td>
                            <td>Internet Explorer 5.5</td>
                            <td>Win 95+</td>
                            
                        </tr> -->
                        
                    </tbody>
                </table>
                <!-- /.table-responsive -->
                
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->

<!-- MOdal -->
<!-- The Modal -->
<div class="modal fade" id="dept_Modal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content modal-lg">
            
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title"></h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            
            <!-- Modal body -->
            <div class="modal-body">
            <form id="dynamic_field">
                    
                    <div class="row">
                       
                        <div class="col-md-8">
                           
                            <div class="row">
                                <div class="form-row">
                                    <div class="form-group col-md-5">
                                        <label for="pwd">Department</label>
                                        <span  id="span_department_details" >
                                        </span>
                                        
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="email">Item Name</label>
                                       
                                        <span id="span_item_details"></span>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="email">Qty</label>
                                        <input type="number" class="form-control" required="" name="item_quantity[]" id="item_quantity" onchange="myfun()">
                                        <span class="w3-text-red" id="return_msg"></span>
                                    </div>
                                   
                                </div>
                            </div>
                            <div id="dynamic_field_row">
                                &nbsp;
                            </div>
                        </div>
                        <div class="col-sm-2">
                        <div class="form-group">
                             <button type="button" name="add" id="add" class="btn btn-success w3-right">+</button>
                        </div>
                        </div>
                    </div>
                    
                    
                </div>
                <div class="modal-footer">
                    
                    <input type="submit" class="btn btn-success" name="submit" id="submit" value="submit">
                    <button type="button" class="btn btn-danger" id="close"  data-dismiss="modal">X</button>
                </div></form>
            
        </div>
    </div>
</div>


<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<!-- Bootstrap JS CDN -->
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
<!-- Bootstrap JS CDN -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script> -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

	<link href="<?php echo base_url(); ?>assets/vendor/select2.min.css" rel="stylesheet">
<script src="<?php echo base_url(); ?>assets/vendor/datatables/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendor/datatables-responsive/dataTables.responsive.js"></script>
      <!-- jQuery -->
      <script src="<?php echo base_url(); ?>assets/css/chosen.jquery.js"></script>
      <script src="<?php echo base_url(); ?>assets/vendorselect2.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/vendor/datatables/js/jquery.dataTables.min.js"></script>
        <link href="<?php echo base_url(); ?>assets/css/chosen.css" rel="stylesheet">
<script type="text/javascript">
var table;
$(document).ready(function(){
    //datatable
    table = $('#table').DataTable({
            "processing":true,
            "serverSide":true,
            "order":[],
            // Load Database for the table1s content from ajax source
                "ajax":{
                    "url":"<?php echo site_url('purchase_request_controller/purchase_request_by_json')?>",
                    "type":"POST",
                    "data":function(data){
                   

                    }
                },
            "columnDefs":[
                    {
                    "targets":[0,7],
                    "orderable":false,
                    },
            ],
        });

        $('#add_dept').click(function(){
        $('#dept_Modal').modal('show');
        $('#form_fields')[0].reset();
        $('.modal-title').html("<i class='fa fa-plus'></i> Purchase Request");
        $('#submit').val('Add');

    
    });
                        //**Add dynamic fields on add buton */
         function add_data(count=''){
  var html='';
        html+='';
        html+='<div id="row'+count+'" class="row">';
       
        html+='<div class="form-row">';
        html+='<div class="form-group col-md-4">';
        html+='<label for="pwd">Department</label>';
        html+='<span  class="item_dept_dc"></span>\n\
                </div>';
        html+='<div class="form-group col-md-4">';
        html+='<label for="item_quantity">Item Name</label>';
        html+='<span  class="item_dc"></span>\n\
                </div>';
        html+='<div class="form-group col-md-3">';
        html+='<label for="item_rate">Qty</label>';
        html+=' <input type="number" class="form-control" required="" name="item_quantity[]" id="item_quantity">';
        html+='</div>';
         html+='<button type="button" name="remove" id="'+count+'" class="btn btn-danger btn_remove">X</button>';
        html+='</div>';
        html+='</div>';
     
        html+='';
   
          $('#dynamic_field_row').append(html);
         }
         var count = 0;
    $('#add').click(function(){
       
       // alert("eula");
        
        //Department 
        $.ajax({
            url: "<?php echo base_url() ?>purchase_request_controller/get_department_in_request",
            method: "POST",
            success: function(data){
            // Print the fetched data of the selected phone in the section called #phone_result
            // within the Bootstrap modal
            $('.item_dept_dc').html(data);
            //$('#phoneModal').modal('show');
            }
        });
         //Item 
          $.ajax({
            url: "<?php echo base_url() ?>purchase_request_controller/get_items",
            method: "POST",
            success: function(data){
            // Print the fetched data of the selected phone in the section called #phone_result
            // within the Bootstrap modal
            $('.item_dc').html(data);
            //$('#phoneModal').modal('show');
            }
        });
       count=count+1;
      add_data(count);
    });
                        //:: Remove Fields After click remove button       
    $(document).on('click', '.btn_remove', function(){
   var row_no = $(this).attr("id");
   
   $('#row'+row_no).remove();
  });

                                    //::get_department CODE in make order
                                    get_department();
                function get_department(){
                    $.ajax({
                        url: "<?php echo base_url() ?>purchase_request_controller/get_department_in_request",
                        method: "POST",
                            success: function(data){
                            // Print the fetched data of the selected phone in the section called #phone_result
                            // within the Bootstrap modal
                            $('#span_department_details').html(data);
                            //$('#phoneModal').modal('show');
                            }
                    });
                }

                 get_item();
                function get_item(){
                    $.ajax({
                        url: "<?php echo base_url() ?>purchase_request_controller/get_items",
                        method: "POST",
                            success: function(data){
                            // Print the fetched data of the selected phone in the section called #phone_result
                            // within the Bootstrap modal
                            $('#span_item_details').html(data);
                            //$('#phoneModal').modal('show');
                            }
                    });
                }
                
                $(document).on('submit','#dynamic_field', function(event){
                event.preventDefault();
                $('#submit').attr('disabled', 'disabled');
                var form_data = $(this).serialize();

                        $.ajax({
                            url:"<?php echo base_url() ?>purchase_request_controller/make_request",
                            method:"POST",
                            data:form_data,
                            success:function(data){
                                $('#dynamic_field')[0].reset();
                                swal({
                                    title: "Requested forwarded!",
                                    text: "Admin responed soon",
                                    icon: "success",
                                    });
                                $('#dept_Modal').modal('hide');
                                
                                $('#submit').attr('disabled', false);
                                table.ajax.reload();
                            }
                        });
        });

               $(document).on('click', '.delete', function(){
                    var id = $(this).attr("id");
                                            swal({
                        title: "Are you sure?",
                        text: "Once deleted, you will not be able to recover this imaginary file!",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                        })
                        .then((willDelete) => {
                        if (willDelete) {
                            
                           
                            
                            $.ajax({
                    url:"<?php echo base_url() ?>purchase_request_controller/delete_request",
                    method:"POST",
                    data:{id:id},
                    success:function(data)
                    {
                    
                     table.ajax.reload();
                }
                })
                            swal("Poof! Your imaginary file has been deleted!", {
                            icon: "success",
                            });
                        } else {
                            swal("Your imaginary file is safe!");
                        }
                        });
            
        
                  
          
           
         });

});
 jQuery(document).ready(function () {
        jQuery(".chosen").chosen();
    });
</script>
<?php include_once "login/footer.php";?>