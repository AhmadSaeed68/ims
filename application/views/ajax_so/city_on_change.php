<?php 
foreach ($data as $data) {
	
}
 ?>
<label>City</label>
<input type="text" readonly class="form-control" name="city" value="<?=$data['city']?>" >
<input type="hidden"   class="form-control" name="business_name" value="<?=$data['business_name']?>" >
<input type="hidden"   class="form-control" name="ntn" value="<?=$data['ntn']?>" >
<input type="hidden"  class="form-control" name="contact" value="<?=$data['contact']?>" >
<input type="hidden"   class="form-control" name="id" value="<?=$data['id']?>" >
<input type="hidden"   class="form-control" name="address" value="<?=$data['address']?>" >
<input type="hidden"   class="form-control" name="email" value="<?=$data['email']?>" >