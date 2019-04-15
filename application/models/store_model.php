<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 
 */
class store_model extends CI_Model
{
    public function index()
    {
        $data=$this->db
        ->select('*')
        ->from('store')
        ->get('');
        return $data->result_array();
    }
    
    public function add_store(){
       $name =  $this->input->post('name');
       $description =  $this->input->post('description');
       $user_id =  $this->input->post('user_id');

       $data = array(
        array(
           'name' => $name,
           'description' => $description ,
           'user_id' => $user_id,
        )
       
     );
     
     $this->db->insert_batch('store', $data); 

    }

    public function delete(){
        $id = $this->input->post('id');

        $this->db->where('id', $id);
   $this->db->delete('store'); 
    }
}

?>