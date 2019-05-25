<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

	class Vendors_controller extends CI_Controller{

		function vendors(){
            $id=$this->session->userdata('user_id');
				$user_id=$id->id;
			$this->load->model('vendors_model');
			$data=$this->vendors_model->vendors($user_id);
			$this->load->view('vendors_view',['data'=>$data]);
		}

		function add_vendors(){
            $id=$this->session->userdata('user_id');
				$user_id=$id->id;
			$this->load->model('vendors_model');
			$this->vendors_model->add_vendors($user_id);
		}



		function edit_vendor(){
            $id=$this->session->userdata('user_id');
				$user_id=$id->id;
			$this->load->helper('form');
                $vendor_id = $this->input->post('vendor_id');
                if(isset($vendor_id) && !empty($vendor_id)){
                $this->load->model('vendors_model');
                $records = $this->vendors_model->edit_vendor($vendor_id,$user_id);
              
                  $this->load->view('vendor_ajax/edit_vendor_ajax',['records'=>$records]);
				
		}
	}



		function update_vendor(){
			$id=$this->session->userdata('user_id');
				$user_id=$id->id;
			$this->load->model('vendors_model');
			$this->vendors_model->update_vendor($user_id);
		}

		function vendor_status(){
            $id=$this->session->userdata('user_id');
				$user_id=$id->id;
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
                            $this->vendors_model->vendor_status($status,$user_id);
                    }
                }

                 function __construct() {
        parent::__construct();
        if(!$this->session->userdata('user_id')){
            redirect('login');
        }
    }
}
 ?>