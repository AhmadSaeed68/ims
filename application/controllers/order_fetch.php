<?php

class Order_fetch extends CI_Controller{
    function index(){
        $this->load->view('order');
    }

    function fetch_data(){
        $query = '';

    $output = array();

    $query .= "
    SELECT * FROM inventory_order WHERE 
    ";
    }


     function __construct() {
        parent::__construct();
        if(!$this->session->userdata('user_id')){
            redirect('login');
        }
    }
}
?>