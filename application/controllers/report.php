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
                
            function count_order(){
                $query=$this->db
                ->select('po_code')
                
                ->where('po_status','active')
               ->get('purchase_order');
               
                $rowcount = $query->num_rows();
                print_r($rowcount);
            }
            function order_value(){
               $result= $this->db->select_sum('po_item_total')
                ->get('purchase_order_detail')
                ->result_array();  
               foreach($result as $result){
                echo '$ '. $result['po_item_total'];
               }
         }       
            function invoice_value(){
                $result= $this->db->select_sum('item_total')
                ->get('po_invoice_detail')
                ->result_array();  
               foreach($result as $result){
                echo '$ '. $result['item_total'];
               }
            }
        }
        
        ?>