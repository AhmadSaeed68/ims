<?php
    class Pdf_model extends CI_Model{
        function invoice_pdf(){
            $query=$this->db
            ->query('SELECT * FROM po_invoice inner JOIN po_invoice_detail ON po_invoice_detail.invoice_code=po_invoice.invoice_code');
return $query->result_array();
        }

        function single_invoice_pdf($invoice_code){
            $query=$this->db
            ->query('SELECT * FROM po_invoice inner JOIN po_invoice_detail ON po_invoice_detail.invoice_code=po_invoice.invoice_code WHERE po_invoice.invoice_code AND po_invoice_detail.invoice_code='.$invoice_code.'');
return $query->result_array();
        }
        function po_order_pdf(){
            $query=$this->db
            ->query('SELECT * FROM purchase_order inner JOIN purchase_order_detail ON purchase_order_detail.po_code=purchase_order.po_code');
return $query->result_array();
        }
    }    

?>