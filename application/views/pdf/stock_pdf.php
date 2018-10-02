
        <link rel = "stylesheet" type = "text/css" 
         href = "<?php echo base_url("assets/css/bootstrap.min.css"); ?>">
       
        
  <div class="container">
<div class='jumbotron'>
   <h1 class='w3-center'><span class='fa fa-wpforms w3-text-lime'> </span> Stock`s Detail</h1>
   
    </div>

<div class="panel-group">
   <a href="<?php echo base_url() ?>prd/pdf" class="w3-right"> <span class="fa fa-file-pdf-o w3-text-red fa-2x"></span> Download</a>
    <div class="panel panel-default">
    <div class="panel-heading ">
    <h2>Available Stocks</h2>
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
                <?php foreach($pdf as $data):?>
                    <tr>
                    <td><?= $data['id'];?></td>
                    <td><?=$data['item_name'];?></td>
                    <td><?=$data['item_code'];?></td>
                    <td><?=$data['item_description'];?></td>
                    <td><?=$data['invoice_code'];?></td>
                    <td><?=$data['po_code'];?></td>
                    <td><?=$data['category_id'];?></td>
                    <td><?=$data['item_qty'];?></td>
                    <td><?=$data['item_rate'];?></td>
                    <td><?=$data['item_rate']*$data['item_qty'];?></td>
                    <td><?= $data['entry_date']?></td>
                    </tr>
<?php endforeach;?>
                </tbody>
            </table>
    </div>
    </div>
  