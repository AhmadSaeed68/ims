<?php
    class Report extends CI_Model{

        function user_count(){
            $db=$this->db->conn_id();
            print_r($db);
        }
    }
?>