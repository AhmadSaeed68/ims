<?php 

	/**
	 * 
	 */
	class Report_detail extends CI_Controller
	{
		
		function total_purchase_items_detail()
		{
		$query=$this->db
                ->select('*')
                ->from('purchase_order_detail')
                  //->where('date BETWEEN DATE_SUB(NOW(), INTERVAL 30 DAY) AND NOW()')
                ->get();
             $data =$query->result_array();
             $this->load->view('report_detail/total_purchase_items_detail_view',['data'=>$data]);
			
		}
function total_sale_items_30_days()
		{
		$query=$this->db
                ->select('*')
                ->from('purchase_order_detail')
                  ->where('date BETWEEN DATE_SUB(NOW(), INTERVAL 30 DAY) AND NOW()')
                ->get();
             $data =$query->result_array();
             $this->load->view('report_detail/total_purchase_items_detail_view',['data'=>$data]);
			
		}
		function total_sale_items_detail(){
			$query=$this->db
                ->select('*')
                ->from('sale_order_detail')
                ->where('date BETWEEN DATE_SUB(NOW(), INTERVAL 30 DAY) AND NOW()')
                ->get();
             $data =$query->result_array();
             $this->load->view('report_detail/total_sale_items_detail_view',['data'=>$data]);
			

		}

		function total_item_remain_detail(){
			$query=$this->db
                ->select('*')
                ->from('items_in_stock')
                //->where('date BETWEEN DATE_SUB(NOW(), INTERVAL 30 DAY) AND NOW()')
                ->get();
             $data =$query->result_array();
             $this->load->view('report_detail/total_item_remain_detail_view',['data'=>$data]);
		}

		function total_recived_invoices_detail(){
			$query=$this->db
							->select('*')
							->from('purchase_order_detail')
							->where('order_report','recived')
							->where('date BETWEEN DATE_SUB(NOW(), INTERVAL 30 DAY) AND NOW()')
							->get();
							$data =$query->result_array();
             $this->load->view('report_detail/total_recived_invoices_detail_view',['data'=>$data]);

		}
		function total_category_you_deal_detail(){
			$query=$this->db
							->select('*')
							->from('category')
							->where('category_status','active')
							
							->get();
							$data =$query->result_array();
             $this->load->view('report_detail/total_category_you_deal_view',['data'=>$data]);

		}


	function total_items_you_deal_detail(){
			$query=$this->db
							->select('*')
							->from('items')
							->where('item_status','active')
							
							->get();
							$data =$query->result_array();
             $this->load->view('report_detail/total_items_you_deal_view',['data'=>$data]);

		}
   function total_pending_invoices_detail(){
			$query=$this->db
							->select('*')
							->from('purchase_order_detail')
							->where('order_report','pending')
							->where('date BETWEEN DATE_SUB(NOW(), INTERVAL 30 DAY) AND NOW()')
							->get();
							$data =$query->result_array();
             $this->load->view('report_detail/total_pending_invoices_detail_view',['data'=>$data]);

		}

		 function __construct() {
        parent::__construct();
        if(!$this->session->userdata('user_id')){
            redirect('login');
        }
    }


	}
 ?>