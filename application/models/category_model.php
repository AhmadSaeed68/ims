<?php
    class Category_model extends CI_Model{
        
        function category($user_id)
        {
          $query=$this->db
                            ->select()
                            ->where('user_id',$user_id)
                            ->order_by('category_id','DESC')
                            ->  get('category');
                          
                return $query->result();
        }


        function category_search($category_id,$user_id)
        {
           $query= $this->db
                            ->select('')
                            ->where('user_id',$user_id)
                            ->where('category_id',$category_id)
                            ->get('category');
            return $query->result_array();
        }


        function update_category()
        {
            
         $category_id = $this->input->post('category_id');
         $user_id =  $this->input->post('user_id');
       
           $data1=array(

             'category_name'=>$this->input->post('category_name'),
             'category_status'=>$this->input->post('category_status'),
             );

           

           $this->db->where('category_id', $category_id)
                    ->where('user_id',$user_id)
                    ->update('category', $data1);
        
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