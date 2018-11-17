

 
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
      	
      <td>Category Name</td>
        
       
       
    
      </tr>
       <?php foreach($data as $data):?>
      <tr>
        <th></th>
      	
        <th><?=$data['category_name']?></th>
          
        
       
       
        
       
       
      </tr>
       <?php endforeach;?>
    </table>
  </div>
</div>