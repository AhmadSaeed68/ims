<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile_model extends CI_Model {

	function index($user_id)
	{
		$session=$this->session->userdata('user_id');
		 $email=$session->email;
		 $id=$session->id;
		 $query=$this->db
				->select('*')
				->from('login')
				->where('email',$email)
				->where('id',$id)
				
				->get('');
				return $query->result_array();
		
	}

	public function update_detail($user_id)
	{
		$id = $this->input->post('id');
		$email = $this->input->post('email');
		$cnic = $this->input->post('cnic');
		$contact = $this->input->post('contact');
		$address = $this->input->post('address');
		$name = $this->input->post('name');

		$data = array(
		 'email' => $email,
		 'cnic' => $cnic,
		 'contact' => $contact,
		 'address'=> $address,
		 'name'=>	 $name,
		);

 
	$q= $this->db
	->where('id', $id)
	
	 ->update('login', $data);
	 if($q){
		 echo "Update Successful";
	 }
	 }

	function profile_sales($user_id)
	{
		$query=$this->db
				->select('*')
				->from('sales_profile')
				->where('user_id',$user_id)
				->get('');
				return $query->result_array();

	}

	public function update_sales($user_id)
	{
		$id = $this->input->post('id');
		$sale_pattern = $this->input->post('sale_pattern');
		$profit = $this->input->post('profit');
		$data = array(
			'profit' => $profit,
			'sale_pattern' => $sale_pattern,
			
		   
	);
	$data1=$this->db
	->where('id', $id)
	->where('user_id',$user_id)
	->update('sales_profile', $data);
	if($data1){
		echo "Update Successfully";
	}

	}

	public function add_subusers($user_id)
	{
		$id = $this->input->post('id');
		$name = $this->input->post('name');
		$contact = $this->input->post('contact');
		$cnic = $this->input->post('cnic');
		$password = $this->input->post('password');
		$email = $this->input->post('email');
		$type = $this->input->post('type');
		
		$data=array(
			'login_id' => $id,
			'name' => $name,
			'contact' => $contact,
			'password' => $password,
			'email' => $email,
			'role' => $type,
			'user_id'	=>	$user_id
			
		);
		$q1 = $this->db->insert('sub_users', $data);
		
			if($q1)
			{
				echo "✅ New UserName: ".$email. "password: " .$password;
			}else
			{
				echo "❌Some Internal error❌";
			}
	}
		function add_user_data($user_id){
			$data=array(
				'email'=>$this->input->post('email'),
				'password'=>$this->input->post('password'),
				'cnic'=>$this->input->post('cnic'),
				'type'=>$this->input->post('type'),
				'contact'=>$this->input->post('contact'),
				'address'=>$this->input->post('address'),
				'user_id' =>	$user_id,


				
			);
			$this->db->insert('login',$data);
		}

		public function pwd_change($user_id)
		{
			$session=$this->session->userdata('user_id');
		 $id=$session->id;
			$old_pwd=$this->input->post('old_password');
			$new_pwd=$this->input->post('new_password');
			$query=$this->db
				->select('password')
				->from('login')
				->where('id',$id)
				
				->get('')
				 ->row();
			$pwd=$query->password;
			if($pwd==$old_pwd)
			{
				$q1=$this->db->where('id', $id)
				->update('login',['password'=>$new_pwd]);
				if($q1)
				{
					echo "✅ Password Updated Successful";
					
				}
			}else
			{
				echo "❌Password Not Matched❌ Old Password is: ( ".$pwd."  )";
			}
		}
}

/* End of file profile_model.php */
/* Location: ./application/models/profile_model.php */