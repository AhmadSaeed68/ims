
<div class="col-sm-12 col-md-12">
   <?php foreach($records as $data1):endforeach;?>
  <!-- <span> <a href="<?php echo base_url() ?>pdf/single_invoice_pdf/<?=$data1['invoice_code']?>" class="w3-right"> <span class="fa fa-file-pdf-o w3-text-red fa-2x"></span> Download</a></span> -->
  <span>Date: <?=$data1['date']?></span>
  <div class="form-row">
    <div class="form-group col-md-6">
      <span>Invoice Code:<b> <?=$data1['invoice_code']?></b></span>
    </div>
    <div class="form-group col-md-6">
      <span>Po Code: <b><?=$data1['po_code']?></b></span>
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-4">
      <span>Invoice Description: </span>
    </div>
    <div class="form-group col-md-6">
      <span><?=$data1['invoice_description']?></span>
    </div>
  </div>
  <div class="form-row">
    <table class="table table-bordered">
      <tr class="warning">
        <td>Item Code</td>
        <td>Item Qty</td>
        <td>Item Rate</td>
        <td>Discount</td>
        <td>Total</td>
      </tr>
      <?php foreach($records as $data):?>
      <tr>
        <th><?=$data['item_code']?></th>
        <th><?=$data['item_qty']?></th>
        <th><?=$data['item_rate']?></th>
        <th><?=$data['discount']?> %</th>
        <th><?=$data['item_total']?></th>
      
      </tr>
        <?php endforeach;?>
    </table>
  </div>
</div>