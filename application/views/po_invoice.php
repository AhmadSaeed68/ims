<?php
print_r($po_invoice);
?>
<?php include_once "login/header.php";  ?>
<style type="text/css">
    .bs-example{
      margin: 20px;
    }
  
    @media screen and (min-width: 992px) {
        .modal-lg {
          width: 1200px; /* New width for large modal */
        }
    }
</style>
<div class="container">
    
    <div class="w3-container">
            <h1>PO Invoice</h1>
        <div class="panel panel-default">
            <div class="panel-heading">Order Managment
            <span class="w3-right">
            <a href="#largeModal" class="btn btn-primary" data-toggle="modal">Make Purchase order</a>
            </span> <!-- Modal -->
              <!-- Large Modal HTML -->
  
            <div class="panel-body">
            <div class="w3-responsive">
            <table class="w3-table-all table-bordered" id="order_data">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Po Code</th>
                        <th>Invoice Code</th>
                        <th>Item Code</th>
                        <th>Item Qty</th>
                        <th>Item Rate</th>
                        
                        <th>Invoice Total</th>
                        <th>Invoice Desc</th>
                        <th>Inv Date</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($po_invoice as $data):?>
                    <tr>
                        <td><?= $data['id'];?></td>
                        <td><?= $data['po_code']?></td>
                        <td><?= $data['invoice_code']?></td>
                        <td><?= $data['item_code']?></td>
                        <td><?= $data['item_qty']?></td>
                        <td><?= $data['item_rate']?></td>
                        <td><?= $data['invoice_total']?></td>
                        <td><?= $data['invoice_description']?></td>
                        <td><?= $data['invoice_date']?></td>
                       
                        <td><input type="button" class="btn btn-info btn-sm edit" value="Edit" id="<?php echo $data['id']; ?>"></td>
                        <td><input type="button" class="btn btn-danger btn-sm delete" value="Delete" id="<?php echo $data['id']; ?>"></td>
                    
                    </tr>
<?php endforeach;?>
                </tbody>
            </table>
            </div>
        </div>
</div>
    </div>
    </div>
</div>