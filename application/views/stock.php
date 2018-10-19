<?php include"login/header.php"; ?>
<!-- Header -->


<div class="container w3-padding-64">
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
    <table class="w3-table-all table-bordered w3-hoverable" id="order_data">
                <thead>
                    <tr class='w3-sand'>
                    <th>Id</th>
                    <th>Item Name</th>
                    <th>Item Code</th>
                    <th>Item Description</th>
                    <th>Invoice Code</th>
                    <th>PO Code</th>
                    <th>Category Id</th>
                    <th>Item Qty</th>
                    <th>Item Rate</th>
                    <th>Total</th>
                    <th>Date:</th>

                    </tr>
                </thead>
                <tbody>
                <?php foreach($stock as $data):?>
                    <tr>
                    <td><?= $data->id;?></td>
                    <td><?=$data->item_name;?></td>
                    <td><?=$data->item_code;?></td>
                    <td><?=$data->item_description;?></td>
                    <td><?=$data->invoice_code;?></td>
                    <td><?=$data->po_code;?></td>
                    <td><?=$data->category_id;?></td>
                    <td><?=$data->item_qty;?></td>
                    <td><?=$data->item_rate;?></td>
                    <td><?=$data->item_rate*$data->item_qty;?></td>
                    <td><?= $data->entry_date?></td>
                    </tr>
<?php endforeach;?>
                </tbody>
            </table>
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
        var dataTable=$("#order_data").dataTable();

    });
    </script>