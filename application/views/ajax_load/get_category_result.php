<?php foreach($records as $row){
?>
<h4 class="text-center">'<?=$row["category_id"]?>'</h4><br>
<?php echo form_open("prd/update_category/{$row['category_id']}",['class'=>'form-vertical']);?>
<div class="form-group">
    <label for="pwd">User Id:</label>
    <?php
    echo form_input(['name'=>'user_id','placeholder'=>'User ID:',
    'class'=>'form-control','disabled'=>'true','value'=> set_value('title',$row['user_id'])])?>
</div>
<div class="form-group">
    <label for="pwd">Category Id:</label>
    <?php
    echo form_input(['name'=>'user_id','placeholder'=>'User ID:',
    'class'=>'form-control','disabled'=>'true','value'=> set_value('title',$row['category_id'])])?>
</div>
<!-- Category Name:;;;;;;;;; -->
<div class="form-group">
    <label for="pwd">Category Name:</label>
    <?php
    echo form_input(['name'=>'category_name','placeholder'=>'Category Name:',
    'class'=>'form-control','type'=>'text','value'=> set_value('title',$row['category_name'])])?>
</div>
<!-- Category Status;;;;: -->
<div class="form-group">
    <label for="pwd">Category_status</label>
</div>
<!-- Fetch data from data base and display select optionn -->
<div class="form-group">
    <select class="form-control" name="category_status" value="<?php echo $row['category_status']?>">
        <option value="active" name="active">active</option>
        <option value="inactive" name="inactive">inactive</option>
    </select>
</div>
<?php
echo form_submit(['name'=>'submit','type'=>'submit','value'=>'Update','class'=>'btn btn-primary']);?>
</form>
<?php
}