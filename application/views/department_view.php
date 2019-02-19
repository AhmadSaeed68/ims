<?php include_once "login/header.php";
?>
<div class="row w3-paddinng-64">
    <div class="col-sm-6 w3-right">
        <div class="form-group input-group">
            <span class="input-group-addon"> <button type="button" class="btn btn-outline btn-primary btn-xs" id="add_dept" data-toggle="modal" data-target="#myModal">Add Department</button></span>
            <input type="text" class="form-control" placeholder="Search...." name="dept_search" id="dept_search">
            <span class="input-group-btn">
            <button type="button" id="btn-filter" class="btn btn-primary w3-hover-teal"><i class="fa fa-search-plus"></i></button>
            </span>
            <span class="input-group-btn">
            <button type="button" id="btn-reset" class="btn btn-default w3-hover-green">Reset</button>
            </span>
        </div>
    </div>
</div>
<!-- /.row -->
<div class="row w3-paddinng-64">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
               Department view
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <table width="100%" class="table table-striped table-bordered table-hover" id="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Department</th>
                            <th>Action(s)</th>
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
        <div class="modal-content">
            
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Modal Heading</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            
            <!-- Modal body -->
            <div class="modal-body">
                <form id="form_fields">
                    <div class="row">
                        <div class="col-sm-8">
                            <div class="form-group">
                                <label>Department</label>
                                <input class="form-control" required placeholder="Enter Department" name="department[]" id="department">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <button type="button" name="add" id="add" class="btn btn-success w3-right">+</button>
                            </div>
                        </div>
                    </div>
                    
                    
                    <div id="dynamic_field_row"></div>
                </div>
                
                <!-- Modal footer -->
                <div class="modal-footer">
                    <input type="submit" class="btn btn-success" name="submit" id="submit" value="submit">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </form>
            </div>
            
        </div>
    </div>
</div>
                        <!-- The Modal -->
<div class="modal" id="dept_modal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Department Update</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
      <span id="result"></span>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
<link href="<?php echo base_url(); ?>assets/vendor/select2.min.css" rel="stylesheet">
<script src="<?php echo base_url(); ?>assets/vendor/datatables/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendor/datatables-responsive/dataTables.responsive.js"></script>
      <!-- jQuery -->
      <script src="<?php echo base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>
      <script src="<?php echo base_url(); ?>assets/vendorselect2.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<!-- Bootstrap JS CDN -->
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
<!-- Bootstrap JS CDN -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
 <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" /> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script> -->
<script type="text/javascript">
var table;
$(document).ready(function(){
        table = $('#table').DataTable({
            "processing":true,
            "serverSide":true,
            "order":[],
            // Load Database for the table1s content from ajax source
                "ajax":{
                    "url":"<?php echo site_url('department_controller/department_by_json')?>",
                    "type":"POST",
                    "data":function(data){
                    data.dept_search=$('#dept_search').val();

                    }
                },
            "columnDefs":[
                    {
                    "targets":[0],
                    "orderable":false,
                    },
            ],
        });
                $('#btn-filter').click(function(){
                table.ajax.reload();
                 });
                 $('#btn-reset').click(function(){
                    $('#form-filter')[0].reset();
                    table.ajax.reload();  //just reload table
                 });
// add Department
$('#add_dept').click(function(){
    $('#dept_Modal').modal('show');
    $('#form_fields')[0].reset();
    $('.modal-title').html("<i class='fa fa-plus'></i> Add Department");
    $('#submit').val('Add');
//
//*
//| Write Function for Add random fields
//
//
    function add_data(count=''){
    var html='';
    html+='';
    html+='<div id="row'+count+'" class="row">';
        html+='<div class="col-sm-8">'
            html+='<div class="form-row">';
                html+='<div class="form-group">';
                    html+='<input type="text" class="form-control" required="" id="department" placeholder="Enter Department" name="department[]">';
                html+='</div></div></div><div class="col-sm-4"><div class="form-group">';
                html+='<button type="button" name="remove" id="'+count+'" class="btn btn-danger btn_remove">X</button>';
            html+='</div>';
        html+='</div></div>';
        
        html+='';
        $('#dynamic_field_row').append(html);
        }
        var count = 0;
    
                //
                //*
                //| After Clicking on + buttom ad random rows
                //
                //
    $('#add').click(function(){
    count=count+1;
    add_data(count)
    });
            //
            //*
            //| After Clicking on Remove buttom remove random data
            //
            //
    $(document).on('click', '.btn_remove', function(){
    var row_no = $(this).attr("id");
    $('#row'+row_no).remove();
    });
    });
                //
                //*
                //| Save Data After Click on Form button
                //
                //
    
    });

                //
                //*
                //| Save Data After Click on Edit
                //
                //

 $(document).on('click','.edit',function(event){

        var department_id = $(this).attr('id');
      
    $.ajax({
            url: "<?php echo base_url() ?>department_controller/edit_department",
            method: "POST",
            data: {department_id:department_id},
            success: function(data)
            {
            
            $('#result').html(data);
           
            $('#dept_modal').modal('show');
            }
        });
        //Start AJAX function
       
        //End AJAX function
});

    $(document).on('submit','#form_fields', function(event){
    event.preventDefault();
    $('#submit').attr('disabled', 'disabled');
    var form_data = $(this).serialize();
    $.ajax({
    url:"<?php echo base_url() ?>department_controller/add_department",
    method:"POST",
    data:form_data,
    success:function(data){
    $('#form_fields')[0].reset();
    $('#dept_Modal').modal('hide');
    
    $('#submit').attr('disabled', false);
    swal({
    title: "Good job!",
    text: "Department add Success",
    icon: "success",
    button: "OK",
    });
    table.ajax.reload();
    }
    });
    $(document).on('submit','#update_form',function(event){
                        event.preventDefault();
                    var form_data = $(this).serialize();
                   
                            $.ajax({
                                url: "<?php echo base_url() ?>department_controller/update_department",
                                method:"POST",
                                data:form_data,
                                success:function(data)
                                {
                               
                                $('#dept_Modal').modal('hide');
                                  table.ajax.reload();
                                }
                            });
                    });

    });

    
    </script>
    <?php include_once "login/footer.php";?>