<?php 

	/**
	 * 
	 */
	class Users_inform_controller extends CI_Controller
	{
		
			function user_detail()
			{
				$this->load->model('users_inform_model');
				$data=$this->users_inform_model->user_detail();
				$this->load->view('users_inform_view',['data'=>$data]);
			}

										// Add_USER_DETAIL
			function add_user_inform(){
				
				$data=$this->input->post('');
				$this->load->model('users_inform_model');
				$this->users_inform_model->add_user_inform();

			}
	}
 ?>