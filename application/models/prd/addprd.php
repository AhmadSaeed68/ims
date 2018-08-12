<?php

    class Addprd extends CI_Model{


        function add_prd($post){
            
            return $this->db->insert('purchase',$post);
            
            
        }


        function stock_list(){
            $query=$this->db
                        
                        ->select()
                        ->  get('purchase');
                     
                    return $query->result();
                
    }

        function assets(){

            // $this->db->select_sum('prd_price');
            
            // $result = $this->db->get('purchase')->row();  
            
            // return $result->prd_price;
            $asset=$this->db->select([' sum(item_price) as price_sum, sum(item_qty) as qty_sum'])
                            ->from('purchase')
                            ->get();
                            
                            return $asset->result();

        }
        
        function sales(){
            $asset=$this->db->select(['item_name','item_code'])
            ->from('purchase')
            ->get();
            
            return $asset->result_array();
        }
        function upd_sales($upd_sales){
            $item_name=$upd_sales['item_name'];
            $item_qty=$upd_sales['item_qty'];
            $this->db
                    
                        ->update('purchase',$item_name = $item_name-$item_qty)
                        ->where('item_code', $item_name);
            //UPDATE `purchase` SET `item_qty` = `item_qty` - 8 WHERE `item_code` = 'xl1' 
 
            // return $this->db
            // ->set('`$item_name` = `$item_name` - `$item_qty`')
            // ->update('purchase',$item_name = $item_name-$item_qty);
        }
    }

?>