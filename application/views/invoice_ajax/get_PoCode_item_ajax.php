<?php foreach($result as $result):
?>
<div class="form-group col-md-3">
    <label for="pwd">Item Code</label>
    <input  id="item_code" class="form-control" value='<?= $result['item_code']?>' name="item_code[]"  class="show_data">
    <!-- <input type="number" class="form-control" required="" name="item_code[]" id="item_code"> -->
</div>
<div class="form-group col-md-3">
    <label for="email">Item Quantity</label>
    <input type="text" class="form-control" required value="<?=$result['item_qty']?>" name="item_quantity[]" id="item_quantity">
</div>
<div class="form-group col-md-3">
    <label for="pwd">Item Rate:</label>
    <div class="input-group">
        <span class="input-group-addon">$</span>
        <input type="number" value='<?=$result['item_rate']?>' class="form-control" required=""  name="item_rate[]" id="item_rate">
    </div>
</div>
<div class='form-group col-md-3'>
    <label for="pwd">Discount:</label>
    <div class="input-group">
        <input type="text" class="form-control" name="discount[]" aria-label="Amount (to the nearest dollar)">
        <span class="input-group-addon">%</span>
    </div>
</div>
</div>
<?php
endforeach;