<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

	class Vendors_controller extends CI_Controller{

		function vendors(){
			$this->load->model('vendors_model');
			$data=$this->vendors_model->vendors();
			$this->load->view('vendors_view',['data'=>$data]);
		}

		function add_vendors(){
			$this->load->model('vendors_model');
			$this->vendors_model->add_vendors();
		}



		function edit_vendor(){
			$this->load->helper('form');
                $vendor_id = $this->input->post('vendor_id');
                if(isset($vendor_id) && !empty($vendor_id)){
                $this->load->model('vendors_model');
                $records = $this->vendors_model->edit_vendor($vendor_id);
              
                  $this->load->view('vendor_ajax/edit_vendor_ajax',['records'=>$records]);
				
		}
	}



		function update_vendor(){
			
			$this->load->model('vendors_model');
			$this->vendors_model->update_vendor();
		}

		function vendor_status(){
                    if($_POST['btn_action'] == 'delete')
                    {
                        $status= $this->input->post('status');
                        if($status == 'active')
                            {
                            $status = 'inactive';
                            }else{
                                $status='active';
                            }

                            $this->load->model('vendors_model');
                            $this->vendors_model->vendor_status($status);
                    }
                }
}
 ?>