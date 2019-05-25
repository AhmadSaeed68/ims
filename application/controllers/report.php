<?php
        class Report extends CI_Controller{


            function index()
            {
                $this->load->view('report.php');
            }

            function user_count()
            {
                $id=$this->session->userdata('user_id');
				$user_id=$id->id;
                  $query=$this->db
                    ->select('email')
                    ->where('user_id',$user_id)
                    ->get('login');
                    $rowcount = $query->num_rows();
                    print_r($rowcount);
                    
            }


            function count_category()
            {
                $id=$this->session->userdata('user_id');
				$user_id=$id->id;
                $query=$this->db
                    ->select('category_name')
                    ->where('user_id',$user_id)
                    ->where('category_status','active')
                   ->get('category');
                   
                    $rowcount = $query->num_rows();
                    print_r($rowcount);
            }


            function count_items()
            {
                $id=$this->session->userdata('user_id');
				$user_id=$id->id;
                $query=$this->db
                    ->select('item_name')
                    ->where('user_id',$user_id)
                    ->where('item_status','active')
                   ->get('items');
                   
                    $rowcount = $query->num_rows();
                    print_r($rowcount);
            }


                function total_po_invoices()
                {
                    $id=$this->session->userdata('user_id');
				$user_id=$id->id;
                  $query=$this->db
                      ->select('po_code')
                      ->where('user_id',$user_id)
                      ->where('order_report','recived')
                     ->get('purchase_order');
                     
                      $rowcount = $query->num_rows();
                      print_r($rowcount);
                }




            function count_order()
              {
                $id=$this->session->userdata('user_id');
				$user_id=$id->id;
                  $query=$this->db
                  ->select('po_code')
                  ->where('user_id',$user_id)
                  ->where('po_status','active')
                 ->get('purchase_order');
                 
                  $rowcount = $query->num_rows();
                  print_r($rowcount);
              }

            function count_pending_po_invoices()
              {
                $id=$this->session->userdata('user_id');
				$user_id=$id->id;
                  $query=$this->db
                  ->select('po_code')
                  ->where('user_id',$user_id)
                  ->where('order_report','pending')
                 ->get('purchase_order');
                 
                  $rowcount = $query->num_rows();
                  print_r($rowcount);
              
              
              }

            function order_value()
            {
                $id=$this->session->userdata('user_id');
				$user_id=$id->id;
               // $result= $this->db->select_sum('po_item_total')
               //  ->get('purchase_order_detail')
                $result=$this->db
                ->query('SELECT SUM(po_item_total) as po_item_total FROM purchase_order_detail WHERE user_id="'.$user_id.'" and date BETWEEN DATE_SUB(NOW(), INTERVAL 30 DAY)
AND NOW()')
                 ->result_array();  

               foreach($result as $result){
                echo '$ '. $result['po_item_total'];
               }



         }       
            function invoice_value(){
                $id=$this->session->userdata('user_id');
				$user_id=$id->id;
               // $result= $this->db->select_sum('item_total')
                //->get('po_invoice_detail')
                 $result=$this->db
                ->query('SELECT SUM(item_total) as item_total FROM po_invoice_detail WHERE WHERE user_id="'.$user_id.'" and date BETWEEN DATE_SUB(NOW(), INTERVAL 30 DAY)
AND NOW()')
                
                ->result_array();  
               foreach($result as $result){
                echo '$ '. $result['item_total'];
               }
            }



            function item_sale()
            {
                $id=$this->session->userdata('user_id');
				$user_id=$id->id;
                $query=$this->db
                            ->select('item_code')
                            ->where('user_id',$user_id)
                            ->get('sale_order_detail');

                    $rowcount = $query->num_rows();
                    print_r($rowcount);   

            }


            function item_qty()
            {
                $id=$this->session->userdata('user_id');
				$user_id=$id->id;
                $query=$this->db
                    ->select_sum('item_qty')
                    
                    ->from('sale_order_detail')
                    ->where('user_id',$user_id)
                   ->get();
                   foreach($query->row_array() as $data){
                    echo $data;
                   }
                   
                  
            }

            function total_sales()
            {
                $id=$this->session->userdata('user_id');
				$user_id=$id->id;
                $query=$this->db
                    ->select_sum('so_item_total')
                    
                    ->from('sale_order_detail')
                    ->where('user_id',$user_id)
                   ->get();
                   foreach($query->row_array() as $data)
                   {
                    echo $data;
                   }
            }

                function no_customers()
                {
                    $id=$this->session->userdata('user_id');
				$user_id=$id->id;
                 $query=$this->db
                            ->select('customer_name')
                            ->where('user_id',$user_id)
                            ->get('sale_order');

                    $rowcount = $query->num_rows();
                    print_r($rowcount);   
            }


            function customer_total_purchasing()
            {
                $id=$this->session->userdata('user_id');
				$user_id=$id->id;
                $query=$this->db
                ->select('po_code')
                ->where('user_id',$user_id)
                ->where('po_status','active')
               ->get('purchase_order');
               
                $rowcount = $query->num_rows();
                print_r($rowcount);
            }

            function estimate_profit()
            {
                $id=$this->session->userdata('user_id');
				$user_id=$id->id;
                $this->load->model('Report_detail');
               $data= $this->Report_detail->estimate_profit($user_id);
               foreach($data as $data){

               echo $data['profit_price']-$data['actual_price'];
              
               }
    }

    // *********************************************************//
                // STOCK_REPORT//
    //*********************************************************//


            function item_types_stock()
            {
                $id=$this->session->userdata('user_id');
				$user_id=$id->id;
                    $query=$this->db
                            ->select('item_code')
                            ->where('user_id',$user_id)
                            ->get('items_in_stock');

                    $rowcount = $query->num_rows();
                    print_r($rowcount);   

            }

               function total_item_qty_in_stock()
               {
                $id=$this->session->userdata('user_id');
				$user_id=$id->id;
                $query=$this->db
                    ->select_sum('item_qty')
                    
                    ->from('items_in_stock')
                    ->where('user_id',$user_id)
                   ->get();
                   foreach($query->row_array() as $data)
                   {
                    echo $data;
                   }
                   
                  
            }


              function total_stock_value()
              {
                $id=$this->session->userdata('user_id');
				$user_id=$id->id;
               $this->load->model('report_detail');
               $data=$this->report_detail->total_stock_value($user_id);

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
                $id=$this->session->userdata('user_id');
				$user_id=$id->id;
                $query=$this->db
                            ->select('item_code')
                            ->where('user_id',$user_id)
                            ->get('items_in_stock');

                    $rowcount = $query->num_rows();
                    print_r($rowcount);  
            }

            function total_po_qty()
            {
                $id=$this->session->userdata('user_id');
				$user_id=$id->id;
                $query=$this->db
                    ->select_sum('item_qty')
                    
                    ->from('purchase_order_detail')
                    ->where('user_id',$user_id)
                   ->get();
                   foreach($query->row_array() as $data)
                   {
                    echo $data;
                   }
            }
            
  function total_purchase_items_30_days()
            {
                $id=$this->session->userdata('user_id');
				$user_id=$id->id;
                $query=$this->db
                    ->select_sum('item_qty')
                    ->where('user_id',$user_id)
                    ->from('purchase_order_detail')
                    
                    ->where('date BETWEEN DATE_SUB(NOW(), INTERVAL 30 DAY) AND NOW()')
                    
                   ->get();
                   foreach($query->row_array() as $data){
                    echo $data;
                   }
            }
            function total_po_value()
            {
                $id=$this->session->userdata('user_id');
				$user_id=$id->id;
                $query=$this->db
                    ->select_sum('po_item_total')
                    
                    ->from('purchase_order_detail')
                    ->where('user_id',$user_id)
                   ->get();
                   foreach($query->row_array() as $data){
                    echo $data;
                   }
            }

            function recived_po()
            {
                $id=$this->session->userdata('user_id');
				$user_id=$id->id;
              $query=$this->db
                            ->select('po_code')
                            ->where('user_id',$user_id)
                            ->where('order_report','recived')
                            ->get('purchase_order');

                    $rowcount = $query->num_rows();
                    print_r($rowcount);  
            }

            function pending_po()
            {
                $id=$this->session->userdata('user_id');
				$user_id=$id->id;
                $query=$this->db
                            ->select('po_code')
                            ->where('user_id',$user_id)
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
                $id=$this->session->userdata('user_id');
				$user_id=$id->id;
                $query=$this->db
                    ->select_sum('item_qty')
                    
                    ->from('po_invoice_detail')
                    ->where('user_id',$user_id)
                   ->get();
                   foreach($query->row_array() as $data){
                    echo $data;
                   }
            }

            function total_invoice_value()
            {
                $id=$this->session->userdata('user_id');
				$user_id=$id->id;

                $query=$this->db
                    ->select_sum('item_total')
                    
                    ->from('po_invoice_detail')
                    ->where('user_id',$user_id)
                   ->get();
                   foreach($query->row_array() as $data){
                    echo $data;
                   }

            }

            function recived_invoices()
            {
                $id=$this->session->userdata('user_id');
				$user_id=$id->id;
                    $query=$this->db
                            ->select('po_code')
                            ->where('user_id',$user_id)
                            ->where('order_report','recived')
                            ->get('purchase_order');

                    $rowcount = $query->num_rows();
                    print_r($rowcount);  
            }

            function pending_invoices()
            {
                $id=$this->session->userdata('user_id');
				$user_id=$id->id;
                $query=$this->db
                            ->select('po_code')
                            ->where('user_id',$user_id)
                            ->where('order_report','pending')
                            ->get('purchase_order');

                    $rowcount = $query->num_rows();
                    print_r($rowcount);  
            }

            function total_category_you_deal()
            {
                $id=$this->session->userdata('user_id');
				$user_id=$id->id;
                $query=$this->db
                            ->select('category_name')
                            ->where('user_id',$user_id)
                            ->where('category_status','active')
                            ->get('category');

                    $rowcount = $query->num_rows();
                    print_r($rowcount);  
            }

            function total_items_you_deal()
            {
                $id=$this->session->userdata('user_id');
				$user_id=$id->id;
                 $query=$this->db
                            ->select('item_name')
                            ->where('user_id',$user_id)
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