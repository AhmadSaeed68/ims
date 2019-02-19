<?php include_once "login/header.php";?>
<div class=" box">
    <h3 align="center"><?php echo $category_id?></h3><br />
    <div class="table-responsive">
    <br />
    <table id="user_data" class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>Item Name</th>
            <th>Item Code</th>
            <th>item_qty</th>
        </tr>
    </thead>
    </table>
    </div>
</div>

<script type="text/javascript" language="javascript">
    $(document).ready(function(){
        var dataTable=$('#user_data').DataTable({
            "processing":true,
            "serverSide":true,
            "order":[],
            "ajax":{
                url:"<?php echo base_url().'prd/get_items'?>>"
            }
        });
    });
</script>
<?php include_once "login/footer.php"; ?>