<select required class="form-control" id="po_code" name="po_code" onchange="myfun(this.value)">
  <option></option>
  <?php
  foreach($po_code as $po_code){
  echo $each['item_code'];
  ?>
  <option
    id="<?php echo $po_code['po_code'];?>"  ><?php echo $po_code['po_code']?>
  </option>;
  <?php } ?>
</select>