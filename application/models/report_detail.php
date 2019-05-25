<?php

	/**
	 * 
	 */
	class Report_detail extends CI_Model
	{
		
		  function estimate_profit($user_id){
            $query=$this->db
                ->query('SELECT SUM(item_qty*item_rate) as actual_price,SUM(so_item_total) as profit_price FROM sale_order_detail where user_id="'.$user_id.'"');
             return  $query->result_array();
         
    }

      function total_stock_value($user_id){
               $query=$this->db
                ->query('SELECT SUM(item_qty*item_rate) as actual_price FROM items_in_stock where user_id="'.$user_id.'"');
             return  $query->result_array();
             

            }

            function test(){
              $query=$this->db
                ->query('SELECT SUM(item_qty*item_rate) as actual_price FROM items_in_stock');
             return  $query->result_array();
            }

	}
?>