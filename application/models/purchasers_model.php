<?php 

/**
 * 
 */
class Purchasers_model extends CI_Model
{
	
	function purchasers_detail($user_id)
	{
		$data=$this->db
						->select('')
						->group_by('business_name')

						->from('so_customer_detail')
						->where('user_id',$user_id)
						->get();
		return $data->result_array();
	}


	function business_data($business_name,$user_id){

		$data=$this->db
						->query('SELECT sale_order_detail.id,sale_order.so_status, sale_order_detail.profit,sale_order_detail.so_code,sale_order_detail.item_code,sale_order_detail.item_qty,sale_order_detail.item_rate,sale_order_detail.so_item_total,sale_order_detail.invoice_code,sale_order.so_code,sale_order.customer_name FROM sale_order_detail LEFT JOIN sale_order ON sale_order.so_code=sale_order_detail.so_code WHERE sale_order.customer_name="'.$business_name.'" and sale_order_detail.user_id="'.$user_id.'" and sale_order.user_id= "'.$user_id.'"');
						return $data->result_array();
	}
}
 ?>