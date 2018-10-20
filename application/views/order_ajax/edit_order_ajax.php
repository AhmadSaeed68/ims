<?php foreach($records as $data):?>
<form  class="order" id="order_form">
  <input type="hidden"  class="form-control" name="po_code"  value="<?=$data['po_code']?>" id="po_code">
  <input type="hidden"  class="form-control" value="<?=$data['item_code']?>" name="item_code"   id="item_code">
  <div class="row">
    <h3 class="w3-center">Purchase Order Edit</h3>
  </div>
  <hr>
  <div class="col-sm-12">
    <div class="row">
      <div class="col-sm-6">
        <span class=""><b>PO_CODE</b></span>: <?=$data['po_code']?>
      </div>
      <div class="col-sm-6">
        <span><b>ITEM_CODE: </b></span> <?=$data['item_code']?>
      </div>
    </div>
  </div>
  <div class="col-sm-6">
  </div>
  <hr>
  <hr>
  <div class="row w3-padding-24">
    <div class="col-sm-6">
      <div class="form-row">
        <div class="form-group col-sm-4">
          <label for="pwd">Status</label>
          <select class="form-control"  name="status" id="status" value="<?php echo $data['po_status']?>">
            <option value="active" name="active">active</option>
            <option value="inactive" name="inactive">inactive</option>
          </select>
        </div>
        <div class="form-group col-sm-4">
          <label for="email">Item Quantity</label>
          <input type="text" class="form-control" name="item_quantity"  value="<?=$data['item_qty']?>" id="item_quantity">
        </div>
        <div class="form-group col-sm-4">
          <label for="pwd">Item Rate:</label>
          <input type="text" class="form-control" name='item_rate' value="<?=$data['item_rate']?>" id="item_rate">
        </div>
      </div>
      <div class="form-row">
        <div class="form-group">
          <label for="pwd">Item Description:</label>
          <?php echo form_textarea(['name'=>'item_description','rows'=>'6','cols'=>'5','placeholder'=>'item Description',
          'class'=>'form-control','type'=>'text','id'=>'po_description','value'=> set_value('title',$data['po_description'])])?>
        </div>
      </div>
    </div>
    <div class="form-row col-sm-12">
      <div class="form-row">
        <div class="form-group">
          <button type="submit" class="btn btn-default update w3-teal" class="update" id="update">update</button>
        </div>
      </div>
    </div>
  </form>
</div>
<?php  endforeach;
$output = '';