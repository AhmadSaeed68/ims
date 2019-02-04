<label for="so_item_id">Select PO_code</label>
			 <select class="form-control" id="so_item_id selectpicker" required name="invoice_code[]"  onchange="invoice_on_change(this.value)"  data-live-search="true">
			 	<option></option>
            <?php
          foreach($invoice as $each){
              echo $each['item_code'];
              ?>
              
              <option id="<?php echo $each['invoice_code']; ?>"
              value="<?php echo $each['invoice_code'] ?>"
             ><?php echo $each['invoice_code']?>
          </option>';
                  <?php } ?>
                  </select>