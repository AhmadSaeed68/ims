<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vendors_model extends CI_Model {
	
	function vendors($user_id)
		{
			$data=$this->db
						->select('*')
						->from('vendors')
						->where('user_id',$user_id)
						->get('');
						return $data->result_array();
		}

	function add_vendors($user_id){
		
			$data=array(
				'vendor_name'=>$this->input->post('vendor_name'),
				'manager_name'=>$this->input->post('manager_name'),
				'city'=>$this->input->post('city'),
				
				'contact'=>$this->input->post('contact'),
				'address'=>$this->input->post('address'),
				'email'=>$this->input->post('email'),
				'user_id'	=>	$user_id,
			);


			$q=$this->db->insert('vendors',$data);
			if($q){
				echo"User Detail add Successfully";
			}else{
				echo"OOPS! Some Error Contact Developer:( Thanks";
			}
		
	}

	//*********************//
	//Get EDIT DATA
	//********************//

		function edit_vendor($vendor_id,$user_id){

			
                    $result= $this->db->select('')
                      	->from('vendors')
					  	->where('user_id',$user_id)
                    	->where('id',$vendor_id)
        		        ->get('');
                            return $result->result_array();
               
		}



		function update_vendor($user_id){
			$id=$this->input->post('id');
			$data=array(
				'vendor_name'=>$this->input->post('vendor_name'),
				'manager_name'=>$this->input->post('manager_name'),
				'city'=>$this->input->post('city'),
				
				'contact'=>$this->input->post('contact'),
				'address'=>$this->input->post('address'),
				'email'=>$this->input->post('email'),
			);

			 $q1=$this->db
			 	->where('user_id',$user_id)		 
			 	->where('id', $id)
			 	->update('vendors', $data);
			 
			 if($q1){
			 	echo "Update Successfully";
			 }else{
			 	echo "Failed Due to Some Technical **Error**  @@@ Please! Contact Developer";
			 }
                                
		}


		function vendor_status($status,$user_id){
                $id= $this->input->post('id');
                $status;
			$update_status= 
				$this->db
							->where('user_id',$user_id)
                			->where('id', $id)
                			->set('status', $status)
                			->update('vendors');
                
                if($update_status){
                    echo "Status Changed";
                }
            }
}

/* End of file vendors_model.php */
/* Location: ./application/models/vendors_model.php */