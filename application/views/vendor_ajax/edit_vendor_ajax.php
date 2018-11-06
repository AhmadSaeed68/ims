
<div class="row">
<form id="update_vendor">
  <?php foreach($records as $data):endforeach;?>
  <input type="hidden" name="id" id="id" value="<?=$data['id']?>"  placeholder="Vendor Name">
  <div class="col-sm-6">
    <div class="row">
      <div class="form-group">
        <div class="col-sm-4">
          <label for="customer Name">Vendor Name</label>
          
          <input type="text" class="form-control" required id="vendor_name" name="vendor_name" value="<?=$data['vendor_name']?>"  placeholder="Vendor Name">
        </div>
        <div class="col-sm-4">
          <label for="customer Name">Manager Name</label>
          <input type="text" class="form-control" name="manager_name" id="manager_name" value="<?=$data['manager_name']?>"   placeholder="Exp:John Smith">
        </div>
        <div class="col-sm-4">
          <label for="customer Name">Contact</label>
          <input type="number" placeholder="0300000000" name="contact" id="contact" value="<?=$data['contact']?>" minlength="11" maxlength="11"  required class="form-control">
        </div>
        
        
      </div>
      
      
      
    </div>
    <div class="form-group">
      <label for="customer Name">Address</label>
      <?php echo form_textarea(['name'=>'address','rows'=>'4','placeholder'=>'47 North, Syz Road,Pakistan',
                'class'=>'form-control','type'=>'text','id'=>'address','value'=> set_value('title',$data['address'])])?>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="row">
      <div class="form-group">
        <div class="col-sm-6">
          <label for="customer Name">Email</label>
          <input type="email" class="form-control" name="email" id="email" value="<?=$data['email']?>" required  placeholder="Email@xyx.com">
        </div>
        <div class="col-sm-5">
          <label for="customer Name">City</label>
          <input type="text" class="form-control" name="city" id="city" value="<?=$data['city']?>" required  placeholder="City">
        </div>
      </div>
      
    </div>
  </div>
  <div class="row">
    <div class="col-sm-12">
      <div class="w3-center">
         <input type="submit" name="update" value='Update' id="update" class="w3-btn w3-black ">
      </div>
     
        </div>
    </div>
  
  
 



</form>
</div>