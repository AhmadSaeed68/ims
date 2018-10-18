<?php
    class Stock_controller extends CI_Controller{
        function stock(){
            $this->load->model('stock_model');
            $stock=$this->stock_model->stock();
            $this->load->view('stock',['stock'=>$stock]);

        }
    }
?>