

 
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
      	<td>Date</td>
      	<td>PO COde</td>
       <td>Item Code</td>
        <td>Item Qty</td>
      <td>Status</td>
        
       
       
    
      </tr>
       <?php foreach($data as $data):?>
      <tr>
        <th></th>
      	  <th><?=$data['date']?></th>
        <th><?=$data['po_code']?></th>
        
        <th><?=$data['item_code']?></th>
        <th><?=$data['item_qty']?></th>
           <th class="w3-text-green"><?=$data['order_report']?></th>
        
       
       
        
       
       
      </tr>
       <?php endforeach;?>
    </table>
  </div>
</div>