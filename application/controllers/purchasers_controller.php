<?php 
	
	class Purchasers_controller extends CI_Controller{

		function purchasers_detail()
		{
			$id=$this->session->userdata('user_id');
				$user_id=$id->id;
			$this->load->model('purchasers_model');
			$data=$this->purchasers_model->purchasers_detail($user_id);
			$this->load->view('purchasers_view',['data'=>$data]);
		}



					//GET BUSINESS DATA
					function business_data()
					{
						$id=$this->session->userdata('user_id');
						$user_id=$id->id;
						 $business_name=$this->input->post('business_name');
						 $this->load->model('purchasers_model');
						 $data=$this->purchasers_model->business_data($business_name,$user_id);
						 $this->load->view('purchasers/business_data',['data'=>$data]);
					}



					 function __construct() 
					{
				        parent::__construct();
				        if(!$this->session->userdata('user_id'))
				        {
				            redirect('login');
				        }
    				}
	}
 ?>