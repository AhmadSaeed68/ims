

 <div class="well"><h2> Stock Detail</h2></div>
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
      	<td>Invoice Code</td>
      	<td>PO Code</td>
        <td>Item Code</td>
        <td>Item Qty</td>
        <td>Item Rate</td>
         <td>Date</td>
    
      </tr>
       <?php foreach($result as $data):?>
      <tr>
      	 <th><?=$data['invoice_code']?></th>
        <th><?=$data['po_code']?></th>
        <th><?=$data['item_code']?></th>
        <th><?=$data['item_qty']?></th>
        <th><?=$data['item_rate']?></th>
        <th><?=$data['date']?></th>
       
       
      </tr>
       <?php endforeach;?>
    </table>
  </div>
</div>