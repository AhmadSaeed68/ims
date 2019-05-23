<?php
    class Pdf_model extends CI_Model{
        function invoice_pdf($user_id){
            $query=$this->db
            ->query('SELECT * FROM po_invoice inner JOIN po_invoice_detail ON po_invoice_detail.invoice_code=po_invoice.invoice_code where po_invoice_detail.user_id="'.$user_id.'" and po_invoice.user_id=="'.$user_id.'"');
return $query->result_array();
        }

        function single_invoice_pdf($invoice_code,$user_id){
            $query=$this->db
            ->query('SELECT * FROM po_invoice inner JOIN po_invoice_detail ON po_invoice_detail.invoice_code=po_invoice.invoice_code WHERE po_invoice.invoice_code ="'.$invoice_code.'" AND po_invoice_detail.user_id="'.$user_id.'" and po_invoice_detail.user_id="'.$user_id.'"');
return $query->result_array();
        }
        function po_order_pdf($user_id){
            $query=$this->db
            ->query('SELECT * FROM purchase_order inner JOIN purchase_order_detail ON purchase_order_detail.po_code=purchase_order.po_code where purchase_order_detail.user_id="'.$user_id.'" and purchase_order.user_id="'.$user_id.'"');
return $query->result_array();
        }
    }    

?>