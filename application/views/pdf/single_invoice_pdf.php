<div class="well"><h2> Invoice Detail</h2></div>
                
                <div class="col-sm-12 col-md-12">
                <?php foreach($pdf as $data):?>
               
                <span>Date: <?=$data['date']?></span>
                           <div class="form-row">
                             <div class="form-group col-md-6">
                             <span>Invoice Code:<b> <?=$data['invoice_code']?></b></span>
                             </div>

                             <div class="form-group col-md-6">
                             <span>Po Code: <b><?=$data['po_code']?></b></span>
                             </div>

                         </div>
                         <div class="form-row">
                             <div class="form-group col-md-4">
                             <span>Invoice Description: </span>
                             </div>

                             <div class="form-group col-md-6">
                             <span><?=$data['invoice_description']?></span>
                             </div>

                         </div>
                         <div class="form-row">
                             <table class="table table-bordered">
                             <tr class="warning">
                             <td>Item Code</td>
                             <td>Item Qty</td>
                             <td>Item Rate</td>
                             <td>Discount</td>
                             <td>Total</td>
                             </tr>

                             <tr>

                                 <th><?=$data['item_code']?></th>
                                 <th><?=$data['item_qty']?></th>
                                 <th><?=$data['item_rate']?></th>
                                 <th><?=$data['discount']?> %</th>
                                 <th><?=$data['item_total']?></th>
        <?php endforeach;?>
                             </tr>
                             </table>

                         </div>
                         </div>