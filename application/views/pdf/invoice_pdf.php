
<div class="container">
<div class='jumbotron'>
   <h1 class='w3-center'><span class='fa fa-wpforms w3-text-lime'> </span> Invoice Detail</h1>

    </div>

<div class="panel-group" style="background-color: lightblue;">
   <a href="<?php echo base_url() ?>prd/pdf" class="w3-right"> <span class="fa fa-file-pdf-o w3-text-red fa-2x"></span> Download</a>
    <div class="panel panel-default">
    <div class="panel-heading ">
    <h2>Invoices</h2>
    </div>
    <div class="panel-body">
    <table class="table" style="border-style: dotted;" id="order_data">
                <thead>
                    <tr class='w3-sand' style=" height: 500px;">
                    <th>Id</th>
                    <th>PO_COde</th>
                    <th>Invoice_Code</th>
                    <th>Invoice Description</th>
                    <th>Invoice Code</th>
                    <th>Item Code</th>
                    <th>Item Qty</th>
                    <th>Item Rate</th>
                    <th>Discount%</th>
                    <th>Total</th>
                    <th>Date:</th>

                    </tr>
                </thead>
                <tbody>
                <?php foreach($pdf as $data):?>
                    <tr>
                    <td><?= $data['id'];?></td>
                    <td><?=$data['po_code'];?></td>
                    <td><?=$data['invoice_code'];?></td>
                    <td><?=$data['invoice_description'];?></td>
                    <td><?=$data['invoice_code'];?></td>
                    <td><?=$data['item_code'];?></td>
                    <td><?=$data['item_qty'];?></td>
                    <td><?=$data['item_rate'];?></td>
                    <td><?=$data['discount'];?></td>
                    <td><?=$data['item_total']*$data['item_qty'];?></td>
                    <td><?= $data['date']?></td>
                    </tr>
<?php endforeach;?>
                </tbody>
            </table>
    </div>
    </div>



  