<div class="well"><h2> Sale Order Detail</h2></div>
<div class="col-sm-12 col-md-12">
  <?php foreach ($data as $uperdata):?><?php endforeach; ?>
    
 
  <span> <a href="<?php echo base_url() ?>pdf/single_invoice_pdf/" class="w3-right"> <span class="fa fa-file-pdf-o w3-text-red fa-2x"></span> Download</a></span>
  <span>Date: <?= $uperdata['date']?></span>
  <div class="form-row">
    <div class="form-group col-md-6">
      <span><b>SO Code:</b> <?= $uperdata['so_code']?></span>
    </div>
    <div class="form-group col-md-6">
      <span><b>invoice Code: </b> <?= $uperdata['invoice_code']?></span>
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-4">
      <span><b>Customer Name: </b><?= $uperdata['customer_name']?></span>
    </div>
    <div class="form-group col-md-6">
   
    </div>
  
  </div>
</div>
  <div class="form-row">
    <table class="table table-bordered">
      <tr class="warning">
        <th>Item Code</th>
        <th>Item Qty</th>
        <th>Item Rate</th>
        <th>Profit</th>
        <th>Total</th>
      </tr>
      <?php foreach($data as $data):  $customer_name=$data['customer_name'];?>
      <tr>
        <td><?=$data['item_code']?></td>
        <td><?=$data['item_qty']?></td>
        <td><?=$data['item_rate']?></td>
        <td><?=$data['profit']?> %</td>
        <td><?=$data['so_item_total']?></td>
        <?php endforeach;?>
      </tr>
    </table>
  </div>
</div>

