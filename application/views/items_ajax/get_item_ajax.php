<h1 class='w3-padding-16'><span class='fa fa-plus-square-o w3-text-blue-gray'> </span> Add items</h1>
<?=
form_open('',['class'=>'form','id'=>'item_form','method'=>'POST'])?>
<div class="row">
    
    
    <div class="col-sm-6">
        <div class="form-row">
            <div class="form-group col-sm-4">
                <label for="email">Categore</label>
                
                <select class="form-control" id="category_id" name="category_id" >
                    <?php
                    foreach($records as $each) {
                    ?>
                    <option id="<?php echo $each['category_id']; ?>"
                        value="<?php echo $each['category_id'] ?>"
                        id="<?php echo $each['category_id'] ?>"><?php echo $each['category_name']?>
                    </option>';
                    <?php } ?>
                </select>
            </div>
            
        </div>
        <div class="form-row">
            <div class="form-group col-sm-8">
                <label for="pwd">Description:</label>
                
                <textarea name="description" id="item_desc" rows="4" cols="29"></textarea>
                
            </div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-row">
            <!-- <div class="form-group col-sm-4">
                <label for="pwd">Item Quantity:</label>
                <input type="number" class="form-control" id="item_qty" name="item_qty" required>
            </div> -->
            <!-- Item Code -->
            <div class="form-group col-sm-4">
                <label for="pwd">Item Code:</label>
                <input type="text" class="form-control" id="item_code" name="item_code" required>
            </div>
            <div class="form-group col-sm-4">
                <label  for="pwd">Item Name:</label>
                
                <input type="text" class="form-control" id="item_name" name="item_name" required>
                
            </div>
        </div>
    </div>
    <?php
    echo form_submit(['name'=>'submit','type'=>'submit','value'=>'Add','class'=>'w3-btn w3-black w3-hover-blue']);?>
</div>
</form>