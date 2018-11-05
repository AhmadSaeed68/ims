<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vendors_model extends CI_Model {
	
	function vendors()
		{
			$data=$this->db
						->select('*')
						->from('vendors')
						->get('');
						return $data->result_array();
		}

	function add_vendors(){
		
			$data=array(
				'vendor_name'=>$this->input->post('vendor_name'),
				'manager_name'=>$this->input->post('manager_name'),
				'city'=>$this->input->post('city'),
				
				'contact'=>$this->input->post('contact'),
				'address'=>$this->input->post('address'),
				'email'=>$this->input->post('email'),
			);


			$q=$this->db->insert('vendors',$data);
			if($q){
				echo"User Detail add Successfully";
			}else{
				echo"OOPS! Some Error Contact Developer:( Thanks";
			}
		
	}

}

/* End of file vendors_model.php */
/* Location: ./application/models/vendors_model.php */