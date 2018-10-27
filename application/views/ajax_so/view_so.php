<div class="well"><h2> Sale Order Detail</h2></div>
<div class="col-sm-12 col-md-12">
  <?php foreach($data as $data):?>
  <span> <a href="<?php echo base_url() ?>pdf/single_invoice_pdf/<?=$data['so_code']?>" class="w3-right"> <span class="fa fa-file-pdf-o w3-text-red fa-2x"></span> Download</a></span>
  <span>Date: <?=$data['date']?></span>
  <div class="form-row">
    <div class="form-group col-md-6">
      <span>SO Code:<b> <?=$data['so_code']?></b></span>
    </div>
    <div class="form-group col-md-6">
      <span>invoice Code: <b> <?=$data['invoice_code']?></b></span>
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-4">
      <span><b>Customer Name:</b> <?=$data['customer_name']?></span>
    </div>
    <div class="form-group col-md-6">
   
    </div>
  </div>
  <div class="form-row">
    <table class="table table-bordered">
      <tr class="warning">
        <td>Item Code</td>
        <td>Item Qty</td>
        <td>Item Rate</td>
        <td>Profit</td>
        <td>Total</td>
      </tr>
      <tr>
        <th><?=$data['item_code']?></th>
        <th><?=$data['item_qty']?></th>
        <th><?=$data['item_rate']?></th>
        <th><?=$data['profit']?> %</th>
        <th><?=$data['so_item_total']?></th>
        <?php endforeach;?>
      </tr>
    </table>
  </div>
</div>

