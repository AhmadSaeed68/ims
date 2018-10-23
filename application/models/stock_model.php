<?php
    class Stock_model extends CI_Model{
        function stock(){
//             $query=$this->db
//             ->select()
//             ->get('items_in_stock');
// return $query->result();
$data=$this->db
->query('SELECT items.item_name,items.item_code,items.category_id,items.item_description,items_in_stock.po_code,items_in_stock.id,items_in_stock.invoice_code,sum(items_in_stock.item_qty) as item_qty,items_in_stock.entry_date,items_in_stock.item_rate FROM items_in_stock LEFT JOIN items ON items.item_code=items_in_stock.item_code group by item_code');
return $data->result();
        }
    }
?>