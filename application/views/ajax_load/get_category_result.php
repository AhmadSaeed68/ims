<?php foreach($records as $row){
?>

<form id="update_category">
    <div class="form-group">
        <!-- <label for="pwd">User Id:</label> -->
        <input type="hidden" name="category_id" value="<?=$row["category_id"]?>">
        <input type="hidden" name="user_id" value="<?=$row["user_id"]?>">
        <?php
        // echo form_hidden(['name'=>'user_id','placeholder'=>'User ID:',
        // 'class'=>'form-control','disabled'=>'true','value'=> set_value('title',$row['user_id'])])?>
    </div>
    <div class="form-group">
        <!-- <label for="pwd">Category Id:</label> -->
        <?php
        echo form_hidden(['name'=>'category_id','placeholder'=>'User ID:',
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
    echo form_submit(['name'=>'submit','type'=>'submit','id'=>'submit','value'=>'Update','class'=>'btn btn-primary']);?>
</form>
<?php
}