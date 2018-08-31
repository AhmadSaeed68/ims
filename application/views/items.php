    <?php include_once"login/header.php";
     $id=$this->session->userdata('user_id');
     echo $id->id;
    ?>
    
<div class="container">
    <div class="w3-right"><input type="button" class="btn btn-info btn-sm view_data" value="Add Item" id="<?php echo $id->id; ?>"></div>
    <div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Items Detail</h3>
        </div>
        <!-- Pannel tag -->
            <div class="panel-body">
            <table id="brand_data" class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>
                <i class="glyphicon glyphicon-bookmark"></i>item Id
            </th>
            <th>
                <i class="glyphicon glyphicon-user w3-text-blue"></i>category ID
            </th>
            <th>
                <i class="glyphicon glyphicon-open-file w3-text-red"></i>Category Name
            </th>
            <th>
                <i class="glyphicon glyphicon-open-file w3-text-red"></i>Item Name
            </th>
            <th>
                <i class="glyphicon glyphicon-open-file w3-text-red"></i>item Code
            </th>
            <th>
                <i class="glyphicon glyphicon-open-file w3-text-green"></i>Item Description
            </th>

            <th>
                <i class="glyphicon glyphicon-open-file w3-text-red"></i>Item Status
            </th>
            <th>
                <i class="glyphicon glyphicon-open-file w3-text-red"></i>Edit
            </th>
            <th>
                <i class="glyphicon glyphicon-open-file w3-text-red"></i>Delete
            </th>
        
        
        </tr>

    </thead>
        <tbody>
            <?php 
            foreach($item as $item):
            ?>
        <tr>
            <td>
                <?= $item['item_id']?>
            </td>
            <td>
                <?= $item['category_id']?>
            </td>
            <td>
                <?= $item['category_name']?>
            </td>
            <td>
                <?=$item['item_name']?>
            </td>
            <td>
                <?=$item['item_code']?>
            </td>
            <td>
                <?=$item['item_description']?>
            </td>
            
            <td>
                <?=$item['item_status']?>
            </td>
            <td>
                <input type="button" class="btn btn-info btn-sm view_data" value="Edit" id="edit">
            </td>
            <td>
                <input type="button" class="btn btn-info btn-sm view_data" value="Edit" id="edit">
            </td>
        </tr>
            <?php endforeach;?>
        </tbody>
            </table>
        </div>
    </div>
</div>

<!-- view Modal -->
        <div class="modal fade" id="phoneModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true" style="margin-top: -20px;">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Phone Details</h4>
            </div>
            <div class="modal-body">
                <!-- Place to print the fetched phone -->
                <div id="phone_result"></div>
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
            $("#brand_data").dataTable();
        });

    $(document).ready(function(){
            // Initiate DataTable function comes with plugin
            $('#dataTable').DataTable();
            // Start jQuery click function to view Bootstrap modal when view info button is clicked
                $('.view_data').click(function(){
                // Get the id of selected phone and assign it in a variable called phoneData
                    var phoneData = $(this).attr('id');
                    // Start AJAX function
                    $.ajax({
                    
                    url: "<?php echo base_url() ?>prd/get_item",
                    method: "POST",
                        data: {phoneData:phoneData},
                        success: function(data){
                        // Print the fetched data of the selected phone in the section called #phone_result 
                        // within the Bootstrap modal
                            $('#phone_result').html(data);
                        
                            $('#phoneModal').modal('show');
                        }
                });
                // End AJAX function
            });
        });  


    </script>
