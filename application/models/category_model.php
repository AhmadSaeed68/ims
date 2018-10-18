<?php
    class Category_model extends CI_Model{
        function category()
        {
            $query=$this->db
                            ->select()
                            ->order_by('category_id','DESC')
                            ->  get('category');
                           
                return $query->result();
        }
        function category_search($category_id)
        {
           $query= $this->db
                            ->select('')
                            ->where('category_id',$category_id)
                            ->get('category');
            return $query->result_array();
        }


        function update_category($category_id,Array $post)
        {
            
            return $this->db
                            ->where('category_id',$category_id)
                            ->update('category',$post);
        }
        
        function add_category(Array $post)
        {
        $name=$post['category_name'];
        $status=$post['category_status'];
        $id=$post['id'];
        
        return $this->db
        ->insert('category',['category_name'=>$name,'category_status'=>$status,'user_id'=>$id]);
        }

       

      

        

       

        function delete_category($category_id){
            $this->db
                    ->where('category_id',$category_id)
                    ->delete("category");
        }
    }
?>