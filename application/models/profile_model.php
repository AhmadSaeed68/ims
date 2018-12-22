<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile_model extends CI_Model {

	
	function profile_sales(){
		$query=$this->db
				->select('*')
				->from('sales_profile')
				->get('');
				return $query->result_array();

	}
		function add_user_data(){
			$data=array(
				'email'=>$this->input->post('email'),
				'password'=>$this->input->post('password'),
				'cnic'=>$this->input->post('cnic'),
				'type'=>$this->input->post('type'),
				'contact'=>$this->input->post('contact'),
				'address'=>$this->input->post('address'),


				
			);
			$this->db->insert('login',$data);
		}
}

/* End of file profile_model.php */
/* Location: ./application/models/profile_model.php */