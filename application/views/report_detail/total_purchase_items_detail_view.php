

 <div class="well"><h2> Total Purchase Items</h2></div>
<div class="col-sm-12 col-md-12">
 
  <span> <a href="<?php echo base_url() ?>pdf/single_invoice_pdf/" class="w3-right"> <span class="fa fa-file-pdf-o w3-text-red fa-2x"></span> Download</a></span>
  <span></span>
  <div class="form-row">
    <div class="form-group col-md-6">
      <span><b> </b></span>
    </div>
    <div class="form-group col-md-6">
      <span><b></b></span>
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-4">
      <span></span>
    </div>
    <div class="form-group col-md-6">
      <span></span>
    </div>
  </div>
  <div class="form-row">
    <table class="table table-bordered">
      <tr class="warning">
        <td>No</td>
      	<td>PO Code</td>
      	<td>Item Code</td>
       
        <td>Item Qty</td>
        <td>Item Rate</td>
        <td>Total</td>
         <td>Date</td>
    
      </tr>
       <?php $i=1; foreach($data as $data):?>
      <tr>
        <th><?= $i++;?></th>
      	 <th><?=$data['po_code']?></th>
        <th><?=$data['item_code']?></th>
        
        <th><?=$data['item_qty']?></th>
        <th><?=$data['item_rate']?></th>
        <th><?=$data['po_item_total']?></th>
        <th><?=$data['date']?></th>
       
       
      </tr>
       <?php endforeach;?>
    </table>
  </div>
</div>