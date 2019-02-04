<?php foreach($records as $data):endforeach;?>
<form action="" class="order" id="so_update">
    <!-- Hidden INputs Fields Start -->
    <input type="hidden" required="" name="id" value='<?php echo $data['id'];?>' id="id">
    <input type="hidden"value='<?php echo $data['so_code'];?>' required  name="so_code" id="so_code">
    <input type="hidden" name="invoice_code[]" value='<?php echo $data['invoice_code'];?>' required  id="invoice_code">
    <input type="hidden"  value='<?php echo $data["item_code"];?>' required name="item_code" id="item_code">
    <div class="row">
        <h3 class="w3-center">Edit Sale Data</h3>
    </div>
    <div class="row">
        <div class="col-sm-8">
            <div class="col-sm-4">
                
                <span name="so_code[]" id="so_code">SO Code: <b><?= $data['so_code']?></b></span><br>
                <span name="invoice_code" id="invoice_code"> Invoice Code: <b><?= $data['invoice_code']?></b></span><br>
            </div>
            <div class="col-sm-4">
                <span >Item Code: <b><?= $data['item_code']?></b></span><br>
            </div>
            <div class="col-sm-4">
            </div>
        </div>
        <div class="col-sm-4">
            <span>Date: <b><?= $data['date']?></b></span><br>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-sm-6">
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="pwd">Item Rate:</label>
                    <input type="text" readonly class="form-control" value='<?php echo $data['item_rate'];?>' required name="item_rate" id="item_rate">
                </div>
                <div class="form-group col-md-4">
                    <label for="email">Item Quantity</label>
                    <input type="text" readonly class="form-control" value='<?php echo $data['item_qty'];?>' required name="item_qty" id="item_qty">
                </div>
                 <div class="form-group col-md-4">
                    <label for="email">Profit</label>
                    <input type="text" class="form-control" value='<?php echo $data['profit'];?>' required name="profit" id="profit">
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group col-md-5">
                <label for="pwd">Business/Owner Name</label>
                 <input type="text" class="form-control" value='<?php echo $data['customer_name'];?>' required name="customer_name" id="customer_name">
            </div>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-4">
            <input type="submit" name="update" value='Update' id="update" class="btn btn-success ">
        </div>
    </div>
</div>
</form>