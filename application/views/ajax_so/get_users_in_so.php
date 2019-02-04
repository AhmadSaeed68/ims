
  <select class="form-control" required id="business selectpicker" name="business"  onchange="user_on_change(this.value)"  data-live-search="true">
			 	<option readonly>Select User</option>
			 
			 	
            <?php
          foreach($data as $each){
              echo $each['item_code'];
              ?>

              <option id="<?php echo $each['id']; ?>"
              value="<?php echo $each['id'] ?>">
             <?php echo $each['business_name']?>
          </option>';
                  <?php } ?>
                  </select>