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

    function store_detail()
    {
        $result= $this->db->select('items_in_stock.id,items_in_stock.item_code,items_in_stock.item_qty,items_in_stock.item_rate,store.name')
                      ->from('items_in_stock')
                      ->join('store','store.id=items_in_stock.store_id','left')
					  
                                   
                                ->get('');
                            return $result->result_array();
    }
}

?>