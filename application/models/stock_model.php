<?php
    class Stock_model extends CI_Model{
        function stock($user_id){
//             $query=$this->db
//             ->select()
//             ->get('items_in_stock');
// return $query->result();
$data=$this->db
->query('SELECT items.item_name,items.item_code,items.category_id,items.item_description,items_in_stock.po_code,items_in_stock.id,items_in_stock.invoice_code,sum(items_in_stock.item_qty) as item_qty,items_in_stock.entry_date,items_in_stock.item_rate FROM items_in_stock LEFT JOIN items ON items.item_code=items_in_stock.item_code WHERE items.user_id = "'.$user_id.'" and items_in_stock.user_id="'.$user_id.'" group by item_code');
return $data->result();
        }



        										//get item_detail on click on ITEM QTY

        function item_detail($item_code,$user_id){
// 			$data=$this->db
// ->query('SELECT items_in_stock.invoice_code,items_in_stock.item_code,items_in_stock.po_code,items_in_stock.item_rate,items_in_stock.item_qty,items_in_stock.date,store.name AS store_name FROM items_in_stock  LEFT JOIN store ON store.id=items_in_stock.store_id')->where('item_code',$item_code);
// return $data->result_array();
$result= $this->db->select('')
                      ->from('items_in_stock')
                      ->join('store','store.id=items_in_stock.store_id','left')
                      ->where('store.user_id',$user_id)
                      ->where('items_in_stock.user_id',$user_id)
					  ->where('item_code',$item_code)
                                   
                                ->get('');
                            return $result->result_array();
        	// $data=$this->db
        	// 				->select('*')
        	// 				->from('items_in_stock')
        	// 				->where('item_code',$item_code)
        	// 				->get('');
        	// 				return $data->result_array();
        }
    }
?>