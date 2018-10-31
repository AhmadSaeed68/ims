<?php
    class Stock_controller extends CI_Controller{
        function stock(){
            $this->load->model('stock_model');
            $stock=$this->stock_model->stock();
            $this->load->view('stock',['stock'=>$stock]);

        }

        function item_detail(){
        	$item_code=$this->input->post('item_code');
        	
        	$this->load->model('stock_model');
        	$result=$this->stock_model->item_detail($item_code);
        	$this->load->view('ajax_stock/item_detail_view',['result'=>$result]);
        	
        }
    }
?>