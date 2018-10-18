<?php
    class User_model extends CI_Model{

        function user()
        {
           
            $query = $this->db->from('user')
            ->order_by("id","desc")
            ->get();
            return $query->result();
        }
        function update_user($id,Array $post)
        {
            
            
            // print_r($array);
            // echo $article_id;

            return $this->db
            ->where('id',$id)
            ->update('user',$post);
        }

        public function user_fetch($user_id)
            {
                    $this->db->select('*');
                    $this->db->where('id',$user_id);
                    $res2 = $this->db->get('user');
                return $res2;
            }

            function delete_user($user_id){
                echo $user_id;
            }
    }
?>