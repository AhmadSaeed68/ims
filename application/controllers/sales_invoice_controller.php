<?php 
	
	class sales_invoice_controller extends CI_Controller{

		function sales_invoice(){
			$this->load->view('sales_invoice_view');
		}

		 function __construct() {
        parent::__construct();
        if(!$this->session->userdata('user_id')){
            redirect('login');
        }
    }
	}
 ?>