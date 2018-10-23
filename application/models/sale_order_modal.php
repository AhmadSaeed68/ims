<?php 
/**
 * 
 */
class Sale_order_modal extends CI_Model
{
	
	function get_item_code_in_so()
	{
		 $asset=$this->db
        ->select(['item_code'])
        ->from('items_in_stock')
        ->get();

    return $asset->result_array();
      }

      function get_invo_in_so($item_code){
      	 $asset=$this->db
        ->select(['invoice_code'])
        ->from('items_in_stock')
        ->where('item_code',$item_code)
        ->get();

    return $asset->result_array();
      }

      function invoice_data($invoice_code){
      	$asset=$this->db
        ->select(['item_qty','item_rate'])
        ->from('items_in_stock')
        ->where('invoice_code',$invoice_code)
        ->get();

    return $asset->result_array();
      }
	}

 ?>