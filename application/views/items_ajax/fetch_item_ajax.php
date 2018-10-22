<?php foreach($data as $row){
?>
<div>
    <h3 class="jumbotron w3-center"><span class='fa fa-soundcloud w3-text-blue fa-2x'></span> Items Detail Update</h3<br>
    
</div>
<div class="row">
    <?php //echo form_open("",['class'=>'form-vertical update_item','id'=>'update_item_form']);?>
    <form class="update_item" id="update_item_form">
        <div class="col-sm-6">
            <div class="form-row">
                
                
                <?php echo form_hidden(['name'=>'id','placeholder'=>'User ID:',
                'class'=>'form-control','disabled'=>'true','id'=>'item_id','value'=> set_value('title',$row['item_id'])])?>
                
                <div class="form-group col-md-4">
                    <label for="pwd">category Id:</label>
                    <?php echo form_input(['name'=>'id','placeholder'=>'Category ID:',
                    'class'=>'form-control','disabled'=>'true','id'=>'category_id','value'=> set_value('title',$row['category_id'])])?>
                    
                </div>
                
                <div class="form-group col-md-4">
                    <label for="pwd">Item Code:</label>
                    <?php echo form_input(['name'=>'password','placeholder'=>'Item Code',
                    'class'=>'form-control','disabled'=>'true','type'=>'text','id'=>'item_code','value'=> set_value('title',$row['item_code'])])?>
                    
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-sm-12">
                    <label for="item_description">Item Description:</label>
                    <?php echo form_textarea(['name'=>'item_description','rows'=>'5','placeholder'=>'item Description',
                    'class'=>'form-control','type'=>'text','id'=>'item_description','value'=> set_value('title',$row['item_description'])])?>
                    
                    
                </div>
                
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="pwd">Item Name:</label>
                    <?php echo form_input(['name'=>'name','placeholder'=>'Item Name:',
                    'class'=>'form-control','type'=>'text','id'=>'item_name','id'=>'item_name','value'=> set_value('title',$row['item_name'])])?>
                    
                </div>
                
                <div class="form-group col-md-4">
                    <label for="pwd">Status</label>
                    <select class="form-control" id="item_status" name="category_status" value="<?php echo $row['item_status']?>">
                        <option value="active" name="active">active</option>
                        <option value="inactive" name="inactive">inactive</option>
                    </select>
                </div>
                
            </div>
        </div>
    </div>
    
    
    
    
    
    <div class="form-row ">
        <div class="form-group col-md-8">
            
            <input type="submit" name="update" value='Update' id="editupdate" class="btn btn-success updateitem"  >
        </div>
        
    </div>
</form>
<?php
}