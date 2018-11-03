
    <?php
        require_once "login/header.php";
        ?>
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <!-- DataTables CSS CDN -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
    <!-- Font Awesome CSS CDN -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script>

    $(document).ready(function(){
        $("#mytable").dataTable();
    });

    </script>

<div class="container ">
  <div class="panel">
      <div class="panel-heading">
      <div class="card-header w3-center"> <h2 class="w3-center"> <i class="fa  fa-2x fa-user w3-text-yellow" ></i> Users Detail</h2> </div>
          <div class="panel-body w3-border">
          <table id="mytable" class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>
                <i class="glyphicon glyphicon-bookmark"></i>Id
            </th>
            <th>
                <i class="glyphicon glyphicon-user w3-text-blue"></i>Name
            </th>
            <th>
                <i class="glyphicon glyphicon-lock w3-text-red"></i>Password
            </th>
            <th>
                <i class="glyphicon glyphicon-envelope w3-teal"></i>Email
            </th>
            <th>
                <i class="glyphicon glyphicon-exclamation-sign w3-text-blue"></i>Edit
            </th>
            <th>
                <i class="glyphicon glyphicon-trash w3-text-red"></i>Delete
            </th>
            
            <th>
                <i class="glyphicon glyphicon-calendar w3-text-blue"></i>Date
            </th>
        </tr>

    </thead>
    <tbody>
    <?php foreach($user as $query):?>
        <tr>
        <td><?= $query->id?></td>
        <td><?= $query->name?></td>
        <td><?= $query->password?></td>
        <td><?= $query->email?></td>
        <td>
            <input type="button" class="btn btn-info btn-sm view_data" value="Edit" id="<?php echo $query->id; ?>">
        </td>
        <td>
            <input type="button" class="btn btn-info btn-sm delete" value="Delete" id="<?php echo $query->id; ?>">
        </td>
        <td><?= $query->reg_date?></td>
    </tr>

    <?php endforeach;?>
    </tbody>

    </table>
          </div>
      </div>
  </div>
        
           
       

    

    </div></div>
        <div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true" style="margin-top: -20px;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        <div class="modal-header ">User Detail
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="myModalLabel"></h4>
        </div>
        <div class="modal-body">
        
            <!-- Place to print the fetched phone -->
            <div id="user_result">
            
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
        </div>
    </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script> 
    <!-- jQuery DataTables JS CDN -->
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <!-- Bootstrap JS CDN -->
    <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
    <!-- Bootstrap JS CDN -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script> 
    
    <script type="text/javascript">
    
        // Start jQuery function after page is loaded
            $(document).ready(function(){
            // Initiate DataTable function comes with plugin
            $('#dataTable').DataTable();
            // Start jQuery click function to view Bootstrap modal when view info button is clicked
                $('.view_data').click(function(){
                // Get the id of selected phone and assign it in a variable called phoneData
                    var user_id = $(this).attr('id');
                    // Start AJAX function
                    $.ajax({
                            url: "<?php echo base_url() ?>user_controller/get_user_result",
                            method: "POST",
                            data: {user_id:user_id},
                            success: function(data)
                            {
                        // Print the fetched data of the selected phone in the section called #phone_result 
                        // within the Bootstrap modal
                            $('#user_result').html(data);
                            // Display the Bootstrap modal
                            $('#Modal').modal('show');
                            }
                });
                // End AJAX function
            });
        });  

        $(document).on('click','.delete',function(){
            var user_id=$(this).attr('id');
            if(confirm("Are You sure to delete this")){
            $.ajax({
                url: "<?php echo base_url() ?>user_controller/delete_user",
                method:"POST",
                data:{user_id:user_id},
               // datatype:"json",
                success:function(data)
                {
                    alert(data);
                    $('#mytable').dataTable().reload();
                    
                }
            });
            }else{
            return false;
            }
            
        });
    </script>

        
    <?php include"login/footer.php";
    $id=$this->session->userdata('user_id');
    echo $id->id;
    
    ?>
    <?php include_once "login/footer.php"; ?>


    