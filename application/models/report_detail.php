<?php

	/**
	 * 
	 */
	class Report_detail extends CI_Model
	{
		
		  function estimate_profit(){
            $query=$this->db
                ->query('SELECT SUM(item_qty*item_rate) as actual_price,SUM(so_item_total) as profit_price FROM sale_order_detail');
             return  $query->result_array();
         
    }

      function total_stock_value(){
               $query=$this->db
                ->query('SELECT SUM(item_qty*item_rate) as actual_price FROM items_in_stock');
             return  $query->result_array();
             

            }

	}
?>