<?php
        class Report extends CI_Controller{
            function index(){
                $this->load->view('report.php');
            }

            function user_count(){
                  $query=$this->db
                    ->select('email')
                    ->get('login');
                    $rowcount = $query->num_rows();
                    print_r($rowcount);
                    
            }
            function count_category(){
                $query=$this->db
                    ->select('category_name')
                    
                    ->where('category_status','active')
                   ->get('category');
                   
                    $rowcount = $query->num_rows();
                    print_r($rowcount);
            }
            function count_items(){
                $query=$this->db
                    ->select('item_name')
                    
                    ->where('item_status','active')
                   ->get('items');
                   
                    $rowcount = $query->num_rows();
                    print_r($rowcount);
            }

                function total_po_invoices(){
                $query=$this->db
                    ->select('po_code')
                    
                    ->where('order_report','recived')
                   ->get('purchase_order');
                   
                    $rowcount = $query->num_rows();
                    print_r($rowcount);
            }


            function count_order(){
                $query=$this->db
                ->select('po_code')
                
                ->where('po_status','active')
               ->get('purchase_order');
               
                $rowcount = $query->num_rows();
                print_r($rowcount);
            }

            function count_pending_po_invoices(){
                $query=$this->db
                ->select('po_code')
                
                ->where('order_report','pending')
               ->get('purchase_order');
               
                $rowcount = $query->num_rows();
                print_r($rowcount);
            
            
        }

            function order_value(){
               // $result= $this->db->select_sum('po_item_total')
               //  ->get('purchase_order_detail')
                $result=$this->db
                ->query('SELECT SUM(po_item_total) as po_item_total FROM purchase_order_detail WHERE date BETWEEN DATE_SUB(NOW(), INTERVAL 30 DAY)
AND NOW()')
                 ->result_array();  

               foreach($result as $result){
                echo '$ '. $result['po_item_total'];
               }



         }       
            function invoice_value(){
               // $result= $this->db->select_sum('item_total')
                //->get('po_invoice_detail')
                 $result=$this->db
                ->query('SELECT SUM(item_total) as item_total FROM po_invoice_detail WHERE date BETWEEN DATE_SUB(NOW(), INTERVAL 30 DAY)
AND NOW()')
                
                ->result_array();  
               foreach($result as $result){
                echo '$ '. $result['item_total'];
               }
            }



            function item_sale()
            {
                    $query=$this->db
                            ->select('item_code')
                            ->get('sale_order_detail');

                    $rowcount = $query->num_rows();
                    print_r($rowcount);   

            }
            function item_qty(){
                $query=$this->db
                    ->select_sum('item_qty')
                    
                    ->from('sale_order_detail')
                   ->get();
                   foreach($query->row_array() as $data){
                    echo $data;
                   }
                   
                  
            }
            function total_sales(){
                $query=$this->db
                    ->select_sum('so_item_total')
                    
                    ->from('sale_order_detail')
                   ->get();
                   foreach($query->row_array() as $data){
                    echo $data;
                   }
            }

                function no_customers(){
                 $query=$this->db
                            ->select('customer_name')
                            ->get('sale_order');

                    $rowcount = $query->num_rows();
                    print_r($rowcount);   
            }


            function customer_total_purchasing(){
                $query=$this->db
                ->select('po_code')
                
                ->where('po_status','active')
               ->get('purchase_order');
               
                $rowcount = $query->num_rows();
                print_r($rowcount);
            }

            function estimate_profit(){
                $this->load->model('Report_detail');
               $data= $this->Report_detail->estimate_profit();
               foreach($data as $data){

               echo $data['profit_price']-$data['actual_price'];
              
               }
    }

    // *********************************************************//
                // STOCK_REPORT//
    //*********************************************************//


            function item_types_stock()
            {
                    $query=$this->db
                            ->select('item_code')
                            ->get('items_in_stock');

                    $rowcount = $query->num_rows();
                    print_r($rowcount);   

            }

               function total_item_qty_in_stock(){
                $query=$this->db
                    ->select_sum('item_qty')
                    
                    ->from('items_in_stock')
                   ->get();
                   foreach($query->row_array() as $data){
                    echo $data;
                   }
                   
                  
            }


              function total_stock_value(){
               $this->load->model('report_detail');
               $data=$this->report_detail->total_stock_value();

                foreach($data as $data)
                                    {

                                    echo $data['actual_price'];
                      
                                    }
            }


    // *********************************************************//
                // PURCHASE_ORDER_REPORT//
    //*********************************************************//


            function po_item_types()
            {
                $query=$this->db
                            ->select('item_code')
                            ->get('items_in_stock');

                    $rowcount = $query->num_rows();
                    print_r($rowcount);  
            }

            function total_po_qty()
            {
                $query=$this->db
                    ->select_sum('item_qty')
                    
                    ->from('purchase_order_detail')
                   ->get();
                   foreach($query->row_array() as $data){
                    echo $data;
                   }
            }
  function total_purchase_items_30_days()
            {
                $query=$this->db
                    ->select_sum('item_qty')
                    
                    ->from('purchase_order_detail')
                    ->where('date BETWEEN DATE_SUB(NOW(), INTERVAL 30 DAY) AND NOW()')
                   ->get();
                   foreach($query->row_array() as $data){
                    echo $data;
                   }
            }
            function total_po_value()
            {
                $query=$this->db
                    ->select_sum('po_item_total')
                    
                    ->from('purchase_order_detail')
                   ->get();
                   foreach($query->row_array() as $data){
                    echo $data;
                   }
            }

            function recived_po()
            {
              $query=$this->db
                            ->select('po_code')
                            ->where('order_report','recived')
                            ->get('purchase_order');

                    $rowcount = $query->num_rows();
                    print_r($rowcount);  
            }

            function pending_po()
            {
                $query=$this->db
                            ->select('po_code')
                            ->where('order_report','pending')
                            ->get('purchase_order');

                    $rowcount = $query->num_rows();
                    print_r($rowcount);  
            }



            // *********************************************************//
                             // PO_INVOICES_REPORT//
            //*********************************************************//

            function total_invoice_qty()
            {
                $query=$this->db
                    ->select_sum('item_qty')
                    
                    ->from('po_invoice_detail')
                   ->get();
                   foreach($query->row_array() as $data){
                    echo $data;
                   }
            }

            function total_invoice_value()
            {

                $query=$this->db
                    ->select_sum('item_total')
                    
                    ->from('po_invoice_detail')
                   ->get();
                   foreach($query->row_array() as $data){
                    echo $data;
                   }

            }

            function recived_invoices()
            {
                    $query=$this->db
                            ->select('po_code')
                            ->where('order_report','recived')
                            ->get('purchase_order');

                    $rowcount = $query->num_rows();
                    print_r($rowcount);  
            }

            function pending_invoices()
            {
                $query=$this->db
                            ->select('po_code')
                            ->where('order_report','pending')
                            ->get('purchase_order');

                    $rowcount = $query->num_rows();
                    print_r($rowcount);  
            }

            function total_category_you_deal()
            {
                $query=$this->db
                            ->select('category_name')
                            ->where('category_status','active')
                            ->get('category');

                    $rowcount = $query->num_rows();
                    print_r($rowcount);  
            }

            function total_items_you_deal()
            {
                 $query=$this->db
                            ->select('item_name')
                            ->where('item_status','active')
                            ->get('items');

                    $rowcount = $query->num_rows();
                    print_r($rowcount);  
            }
             function __construct() {
        parent::__construct();
        if(!$this->session->userdata('user_id')){
            redirect('login');
        }
    }

        }
        ?>