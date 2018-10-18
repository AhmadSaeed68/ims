<?php
    class Stock_model extends CI_Model{
        function stock(){
            $query=$this->db
            ->select()
            ->get('items_in_stock');
return $query->result();
        }
    }
?>