<?php 

	/**
	 * 
	 */
	class Users_inform_controller extends CI_Controller
	{
		
			function user_detail()
			{
				$id=$this->session->userdata('user_id');
				$user_id=$id->id;
				$this->load->model('users_inform_model');
				$data=$this->users_inform_model->user_detail($user_id);
				$this->load->view('users_inform_view',['data'=>$data]);
			}

										// Add_USER_DETAIL
			function add_user_inform(){
				$id=$this->session->userdata('user_id');
				$user_id=$id->id;
				$data=$this->input->post('');
				$this->load->model('users_inform_model');
				$this->users_inform_model->add_user_inform($user_id);

			}

			public function delete()
			{
				$id=$this->session->userdata('user_id');
				$user_id=$id->id;
				 $id= $this->input->post('id');
       

      $this->db->where('user_id',$user_id)->where('id',$id)->delete('user_inform');
			}

			 function __construct() {
        parent::__construct();
        if(!$this->session->userdata('user_id')){
            redirect('login');
        }
    }
	}
 ?>