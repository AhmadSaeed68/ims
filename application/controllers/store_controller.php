<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class store_controller extends CI_Controller {

    public function index()
    {
        $this->load->model('store_model');
       $data =  $this->store_model->index();
       $this->load->view('store_view',['data'=>$data]);
    }

    public function add_store()
    {
        $this->load->model('store_model');
        $this->store_model->add_store();
    }

    public function delete()
    {
        $this->load->model('store_model');
       $data =  $this->store_model->delete();
    }

    function store_detail()
    {
        $this->load->model('store_model');
       $data = $this->store_model->store_detail();
     
      $this->load->view('store_detail',['data'=>$data]);
    }


     function __construct() {
       
        parent::__construct();
            if(!$this->session->userdata('user_id'))
            {
                redirect('login');
            }
     }
}
?>