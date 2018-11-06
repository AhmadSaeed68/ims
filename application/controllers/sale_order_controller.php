<?php 

	/**
	 * 
	 */
	class Sale_order_controller extends CI_Controller
	{

		function sales_order(){
			$this->load->model('sale_order_modal');
			$data=$this->sale_order_modal->sales_order();
            $this->load->view('sales_order_view',['data'=>$data]);
        }

		function get_item_code_in_so(){
			$this->load->model('sale_order_modal');
			$item_data=$this->sale_order_modal->get_item_code_in_so();

			

			?>
		

			 <select class="form-control" required id="so_item_id selectpicker" name="item_code[]"  onchange="item_on_change(this.value)"  data-live-search="true">
			 	<option readonly>Select item_code</option>
			 }
			 
			 	
            <?php
          foreach($item_data as $each){
              echo $each['item_code'];
              ?>

              <option id="<?php echo $each['item_code']; ?>"
              value="<?php echo $each['item_code'] ?>">
             <?php echo $each['item_code']?>
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
		
			<label for="so_item_id">Select Invoice</label>
			 <select class="form-control" id="so_item_id selectpicker" required name="invoice_code[]"  onchange="invoice_on_change(this.value)"  data-live-search="true">
			 	 <option selected="">Select Invoice</option>
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

		function city_on_change(){
	 $business_name_id= $this->input->post('datapost');
	 $this->load->model('sale_order_modal');
	$data= $this->sale_order_modal->city_on_change($business_name_id);
	$this->load->view('ajax_so/city_on_change',['data'=>$data]);
		}

		function invoice_on_change(){
			$invoice_code= $this->input->post('invoice_code');
			$this->load->model('sale_order_modal');
			$invoice_data=$this->sale_order_modal->invoice_data($invoice_code);
			foreach ($invoice_data as $data) {
				
			}
			?>
			<div class="form-group col-sm-4" >
			<label for="">Quantity</label>
		
			<input type="number" class="form-control" required name="item_qty[]" id="item_qty" min="1" max="<?= $data['item_qty']?>" placeholder="In Stock: <?= $data['item_qty']?>">
		</div>
		<div class="form-group col-sm-3">
			<label for="">Price</label>
			<input type="number" class="form-control" required name="item_rate[]" id="item_rate" readonly name="" value="<?= $data['item_rate']?>">
		</div>
			
		
			<?php
			
		}

													// view_sale_order
			function view_so(){
				 $so_code=$this->input->post('so_code');
				$this->load->model('sale_order_modal');
			$data=$this->sale_order_modal->view_so($so_code);
			$records= $this->load->view('ajax_so/view_so',['data'=>$data]);
	
			}

																	//EDIT_SO
			function edit_so(){
				$so_id= $this->input->post('so_id');
				$this->load->model('sale_order_modal');
				$records=$this->sale_order_modal->edit_so($so_id);
				 $this->load->view('ajax_so/edit_so',['records'=>$records]);
						 

							}

							function update_so(){
								$this->load->model('sale_order_modal');
								$this->sale_order_modal->update_so();
							}

							function get_users_in_so(){
								$this->load->model('sale_order_modal');
								$data=$this->sale_order_modal->get_users_in_so();
								$this->load->view('ajax_so/get_users_in_so',['data'=>$data]);

							}


							function so_status(){
								 if($_POST['btn_action'] == 'delete')
                    {
                        $status= $this->input->post('status');
                        if($status == 'active')
                            {
                            $status = 'inactive';
                            }else{
                                $status='active';
                            }

                            $this->load->model('sale_order_modal');
                            $this->sale_order_modal->so_status($status);
                    }
							}

		function make_so(){

			 $this->load->model('sale_order_modal');
			 $this->sale_order_modal->make_so();
		}

														//Auto SO_code
		function auto_so_code(){
                $this->db->select_max('so_code');
                $result = $this->db->get('sale_order')->result_array();
                $row=$this->db->select('*')->order_by('id',"desc")->limit(1)->get('sale_order')->row();
                
                $so_code=$row->so_code;
                $so_code=substr($so_code,9,3);
                
                ?>
                <input type="text" readonly required="" name="so_code" value="<?='SO'.date("dny").'-'.$so_code+=1?>" class="form-control"  id="so_code">
               <?php 
                    ?>
                    
                    <?php
					//$this->output->enable_profiler(TRUE);
                }

                function test(){
                	echo"dddd";
                }

	}
 ?>