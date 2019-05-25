<?php 

	/**
	 * 
	 */
	class Users_inform_model extends CI_Model
	{
		
		function user_detail($user_id)
		{
			
			$data=$this->db
						->select('*')
						->from('user_inform')
						->where('user_id',$user_id)
						->get('');
						return $data->result_array();
		}

		function add_user_inform($user_id){
			$data=array(
				'user_name'=>$this->input->post('user_name'),
				'ntn'=>$this->input->post('ntn'),
				'contact'=>$this->input->post('contact'),
				'business_name'=>$this->input->post('business_name'),
				'city'=>$this->input->post('city'),
				'address'=>$this->input->post('address'),
				'email'=>$this->input->post('email'),
				'user_id'	=>	$user_id,
			);

			$q=$this->db->insert('user_inform',$data);
			if($q){
				echo"User Detail add Successfully";
			}else{
				echo"OOPS! Some Error Contact Developer:( Thanks";
			}
		}
	}
 ?>