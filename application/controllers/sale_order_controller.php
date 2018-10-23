<?php 

	/**
	 * 
	 */
	class Sale_order_controller extends CI_Controller
	{
		
		function get_item_code_in_so(){
			$this->load->model('sale_order_modal');
			$item_data=$this->sale_order_modal->get_item_code_in_so();

			

			?>
		

			 <select class="form-control" id="so_item_id selectpicker" name="item_code[]"  onchange="item_on_change(this.value)"  data-live-search="true">
            <?php
          foreach($item_data as $each){
              echo $each['item_code'];
              ?>
              <option id="<?php echo $each['item_code']; ?>"
              value="<?php echo $each['item_code'] ?>"
             ><?php echo $each['item_code']?>
          </option>';
                  <?php } ?>
                  </select>

                  <?php
		}

		function item_on_change(){
			$item_code= $this->input->post('datapost');
			$this->load->model('sale_order_modal');
			 $invoice=$this->sale_order_modal->get_invo_in_so($item_code);

			
			?>
		
			<label for="so_item_id">Select PO_code</label>
			 <select class="form-control" id="so_item_id selectpicker" name="item_code[]"  onchange="invoice_on_change(this.value)"  data-live-search="true">
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

                  <?php
		}

		function invoice_on_change(){
			$invoice_code= $this->input->post('invoice_code');
			$this->load->model('sale_order_modal');
			$invoice_data=$this->sale_order_modal->invoice_data($invoice_code);
			foreach ($invoice_data as $data) {
				
			}
			?>
			<label for="">Quantity</label>

			<input type="number" class="form-control"name="item_qty" min="1" max="<?= $data['item_qty']?>" placeholder="In Stock: <?= $data['item_qty']?>">
			<?php
		}
	}
 ?>