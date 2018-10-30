


<div class="well"><h2> Business/Owner purchasing Detail</h2></div>
<div class="col-sm-12 col-md-12">
  
  <span> <a href="<?php echo base_url() ?>pdf/single_invoice_pdf/" class="w3-right"> <span class="fa fa-file-pdf-o w3-text-red fa-2x"></span> Download</a></span>
  <span></span>
  <div class="form-row">
    <div class="form-group col-md-6">
      <span><b></b></span>
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
      	<th>ID</th>
        <th>Customer Name</th>
        <th>So Code</th>
        <th>Invoice Code</th>
        <th>Item Code</th>
        <th>Qty</th>
        <th>rate</th>
        <th>Profit%</th>
        <th>Total</th>
        <th>Calculation</th>
      </tr>
      <?php $sum=0; foreach($data as $data):?>
      <tr>
      	<td><?=$data['id']?></td>
        <td><?=$data['customer_name']?></td>
        <td><?=$data['so_code']?></td>
        <td><?=$data['invoice_code']?></td>
        <td><?=$data['item_qty']?></td>
        <td><?=$data['item_code']?></td>
        <td><?=$data['item_rate']?></td>
        <td><?=$data['profit']?>%</td>
          <td ><?=$data['so_item_total']?></td>
          <td class="w3-border-red w3-light-blue">

          	<?php 
          
          	$sum+=$data['so_item_total'];
          	echo $sum;
          ?>
          		

          	</td>
        
        <?php endforeach;?>
      </tr>
    </table>
  </div>
</div>


