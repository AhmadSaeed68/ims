<?php 

	/**
	 * 
	 */
	class Sale_order_controller extends CI_Controller
	{

			//Sale Order:: Load View 
		function sales_order()
		{
			$this->load->model('sale_order_modal');
			$data=$this->sale_order_modal->sales_order();
            $this->load->view('sales_order_view',['data'=>$data]);
        }


        	//Get SO Code in Sale_order
		function get_item_code_in_so()
			{
				$this->load->model('sale_order_modal');
				$item_data=$this->sale_order_modal->get_item_code_in_so();
				//::HTML Load
				?>
			

				 <select class="form-control" required id="so_item_id selectpicker" name="item_code[]"  onchange="item_on_change(this.value)"  data-live-search="true">
				 	<option readonly>Select item_code</option>
			}
			 
			 	
            <?php
          foreach($item_data as $each)
          {
              echo $each['item_code'];
              //::HTML LOAD
              ?>

              <option id="<?php echo $each['item_code']; ?>"
              value="<?php echo $each['item_code'] ?>">
             <?php echo $each['item_code']?>
          </option>';
                  <?php 
              } ?>
                  </select>

                  <?php
		}

		function item_on_change()
		{
			$item_code= $this->input->post('datapost');
			$this->load->model('sale_order_modal');
			$invoice=$this->sale_order_modal->get_invo_in_so($item_code);
			?>
		
			<label for="so_item_id">Select Invoice</label>
			 <select class="form-control" id="so_item_id selectpicker" required name="invoice_code[]"  onchange="invoice_on_change(this.value)"  data-live-search="true">
			 	 <option selected="">Select Invoice</option>
            <?php
          foreach($invoice as $each)
          	{
              echo $each['item_code'];
              ?>
              
              <option id="<?php echo $each['invoice_code']; ?>"
              value="<?php echo $each['invoice_code'] ?>"
             ><?php echo $each['invoice_code']?>
          </option>';
                  <?php 
              } ?>
                  </select>

                  <?php
		}

		function city_on_change()
		{
		 $business_name_id= $this->input->post('datapost');
		 $this->load->model('sale_order_modal');
		$data= $this->sale_order_modal->city_on_change($business_name_id);
		$this->load->view('ajax_so/city_on_change',['data'=>$data]);
		}


		function invoice_on_change()
		{
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
			function view_so()
			{
				 $so_code=$this->input->post('so_code');
				$this->load->model('sale_order_modal');
				$data=$this->sale_order_modal->view_so($so_code);
				$records= $this->load->view('ajax_so/view_so',['data'=>$data]);
	
			}

																	//EDIT_SO
			function edit_so()
				{
					$so_id= $this->input->post('so_id');
					$this->load->model('sale_order_modal');
					$records=$this->sale_order_modal->edit_so($so_id);
					 $this->load->view('ajax_so/edit_so',['records'=>$records]);
							 

				}


							function update_so()
							{
								$this->load->model('sale_order_modal');
								$this->sale_order_modal->update_so();
							}



							function get_users_in_so()
								{
									$this->load->model('sale_order_modal');
									$data=$this->sale_order_modal->get_users_in_so();
									$this->load->view('ajax_so/get_users_in_so',['data'=>$data]);

								}



							function get_default_profit()
							{
								 $data=$this->db->select('profit')
											->from('sales_profile')
											->get()->result_array();

								foreach($data as $data)
								{
									echo $data['profit'];
								}			

							}



							function so_status()
							{
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
		function auto_so_code()
		{
			$row= $this->db->query('SELECT COALESCE(MAX(id), 0) as id FROM sale_order')->row();
              $id= $row->id;
              if($id==0)
              {
               $last_word=$id;
              }else
              {
				$row=$this->db->select('so_code')->where('id',$id)->get('sale_order')->row();
				$so_code= $row->so_code;
				$pieces = explode(' ', $so_code);
                $last_word = array_pop($pieces);
                $last_word=(int)$last_word;
			  }
			  ?>
			  <input type="text" readonly required="" name="so_code" value="<?='SO'.date("dny").' '.$last_word+=1?>" class="form-control"  id="so_code">
			 <?php 
        }

              function export_csv(){
                   $filename = 'Sale-Order'.date('Ymd').'.csv'; 
                  header("Content-Description: File Transfer");
                  header("Content-Disposition: attachment;filename=$filename");
                  header("Content-Type: application/csv; ");

                 
                      $this->load->model('sale_order_modal'); //Load MOdel
                      $userData=$this->sale_order_modal->export_csv();

                      // File Creation
                    $file=fopen('php://output','w');
                    $array_data=array("id","So Code","Invoice Code","Item Code","Item Qty","Item Rate","Profit","Total","Report","Date");
                    fputcsv($file,$array_data);
foreach($userData as $value){
  fputcsv($file,$value);
}
fclose($file);
exit;
                }
                 function __construct() {
        parent::__construct();
        if(!$this->session->userdata('user_id')){
            redirect('login');
        }
    }

	}
 ?>
