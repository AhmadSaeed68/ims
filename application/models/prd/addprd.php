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
                        ->where('item_code', $item_name)
                        ->set('item_qty', 'item_qty-'.$item_qty, FALSE)
                        ->update('purchase');
                        return $upd_sales;
                        
                        
                        
            //UPDATE `purchase` SET `item_qty` = `item_qty` - 8 WHERE `item_code` = 'xl1' 
 
            // return $this->db
            // ->set('`$item_name` = `$item_name` - `$item_qty`')
            // ->update('purchase',$item_name = $item_name-$item_qty);
        }


        function vendors(){

            //$vendors=$this->db->query("SELECT DISTINCT 'item_company' from 'purchase'");
            $vendors=$this->db->group_by('item_company')
            ->from('purchase')
            ->get();
           return $vendors->result_array();
        }


        function prd_search($query){
            
            $q= $this->db->from('purchase')
            ->like('item_name',$query)
            ->or_like('item_code',$query)
            ->or_like('item_company',$query)
            
            
            ->get();
                return $q->result();
        }

        function user(){
            $query=$this->db
                        
                        ->select()
                        ->  get('user');
                     
                    return $query->result();
        }
        public function get_search($phoneData)
            {
            $this->db->select('*');
            $this->db->where('id',$phoneData);
            $res2 = $this->db->get('user');
            return $res2;
            }

            function update_user($id,Array $post){
                
                
                // print_r($array);
                // echo $article_id;
                return $this->db
                ->where('id',$id)
                ->update('user',$post);
        }
        
        function category(){
            $query=$this->db
                        
                        ->select()
                        ->  get('category');
                     
                    return $query->result();
        }
        function category_search($category_id){
           $query= $this->db
                    ->select('')
                    ->where('category_id',$category_id)
                    ->get('category');
            return $query->result_array();
        }


        function update_category($category_id,Array $post){
            
            return $this->db
                ->where('category_id',$category_id)
                ->update('category',$post);
        }
        
        function add_category(Array $post){
           
           $name=$post['category_name'];
           $status=$post['category_status'];
            $id=$post['id'];
        
            return $this->db->insert('category',['category_name'=>$name,'category_status'=>$status,'user_id'=>$id]);
        }
                
    }

?>