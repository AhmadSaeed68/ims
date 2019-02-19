<?php include "login/header.php"; ?>
<!-- Header -->


<div class=" w3-padding-64">
<!-- <div class='jumbotron'>
   <h1 class='w3-center'><span class='fa fa-wpforms w3-text-lime'> </span> Stock`s Detail</h1>
   
    </div> -->

<div class="panel-group">
   <a href="<?php echo base_url() ?>prd/pdf" class="w3-right" target="_blank"> <span class="fa fa-file-pdf-o w3-text-red fa-2x"></span> Download</a>
    <div class="panel panel-default">
    <div class="panel-heading w3-center w3-padding-24">

   <span class="fa fa-line-chart fa-2x w3-text-teal">
       Stock
   </span>

    </div>
    <div class="panel-body">
        <div class="w3-responsive">
    <table class="w3-table-all table-bordered w3-hoverable" id="order_data">
                <thead>
                    <tr class='w3-sand'>
                    <th>Id</th>
                    <th >Item Name</th>
                    <th>Item Code</th>
                    <th>Item Description</th>
                    <!-- <th>Invoice Code</th>
                    <th>PO Code</th> -->
                    <th>Category Id</th>
                    <th>Item Qty</th>
                    <!-- <th>Item Rate</th>
                    <th>Total</th -->
                    <th>Date:</th>

                    </tr>
                </thead>
                <tbody>
                <?php foreach($stock as $data):?>
                    <tr>
                    <td><?= $data->id;?></td>
                    <td class="w3-teal"><?=$data->item_name;?></td>
                    <td class="w3-light-blue"><?=$data->item_code;?></td>
                    <td><?=$data->item_description;?></td>
                    <!-- <td><?php //$data->invoice_code;?></td>
                    <td><?php //$data->po_code;?></td> -->
                    <td><?=$data->category_id;?></td>
                    <td class="w3-teal"><a id="<?=$data->item_code;?>" class="w3-text-red qty_detail"><?=$data->item_qty;?></a></td>
           <!--          <td><?=$data->item_rate;?></td>
                    <td><?=$data->item_rate*$data->item_qty;?></td> -->
                    <td><?= $data->entry_date?></td>
                    </tr>
<?php endforeach;?>
                </tbody>
            </table>
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
</div></div>

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
        var dataTable=$("#order_data").dataTable();

        $('.qty_detail').click(function(){
    var item_code = $(this).attr('id');

        $.ajax({
                url: "<?php echo base_url() ?>stock_controller/item_detail",
                method: "POST",
                data: {item_code:item_code},
                success: function(data)
                {
                
                $('#result').html(data);
                // Display the Bootstrap modal
                $('#Modal').modal('show');
                }
        });
    
    });

    });
    </script>
    <?php include_once "login/footer.php"; ?>