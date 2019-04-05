<?php
    class Items_model extends CI_Model{

        function item()
        {
            // $data=$this->db->query('SELECT category.category_name,items.item_id,category.category_id,items.item_code,items.item_name,items.item_description,items.item_status FROM category INNER JOIN items ON category.category_id=items.category_id ORDER BY items.item_id');
            // return $data->result_array();
            $data=$this->db
                            ->query('SELECT * FROM items INNER JOIN category ON category.category_id=items.category_id');
                return $data->result_array();

        }
        function item_search($phoneData)
        {
            // $this->db->select('');
            // $this->db->where('category_id',$phoneData);
            // $res2 = $this->db->get('items_in_stock');
            // return $res2->result_array();
            $res= $this->db
                            ->query('SELECT category_name,category_id FROM category WHERE category_status="active"');
                return $res->result_array();
        }

        function add_items($insert_data){
            $this->db->insert('items',$insert_data);

        }

        function fetch_item($prd_id){

            $query=  $this->db
                        ->where('item_id',$prd_id)
                        ->get('items');
                    return $query->result_array();

            }

            function item_status($status){
              $item_id= $this->input->post('item_id');
                $status;
            $update_status= $this->db
                ->where('item_id', $item_id)
                ->set('item_status', $status)
                ->update('items');
                
                if($update_status){
                    echo "Status Changed";
                }
            }

            function update_item($data){
                $insert_data=array(
                    'category_id'=>$this->input->post('category_id'),
                    'item_name'=>$this->input->post('item_name'),

                    'item_code'=>$this->input->post('item_code'),
                    'item_description'=>$this->input->post('item_description'),
                    'item_status'=>$this->input->post('item_status'),

                );
                $item_id= $this->input->post('item_id');
             
                // $this->db

                // ->update('items',$insert_data)
                // ->where('item_id',$item_id);


               $this->db
                    ->where('item_id',$item_id)
                    ->update('items',$insert_data);
            }


            function get_category($searchTerm, $column){
    $this->db->select($column);
    $this->db->from('category');
    $this->db->like('category_name', $searchTerm);
    return $this->db->get()->result_array();
}

    function update_item_with_input()
    {
         $item_name=$this->input->post('item_name');
         $id=$this->input->post('id');
        $field_name=$this->input->post('field_name');
        $data=array(
            
            $field_name=>$item_name,
            
        );
        print_r($data);
         // $item_name=$this->input->post('item_name');
         // $id=$this->input->post('id');
         $data= $this->db
                ->where('item_id', $id)
                //->set('item_name', $item_name)
                ->update('items',$data);
    }

    }
?>