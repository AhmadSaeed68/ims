<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class store_controller extends CI_Controller {

    public function index()
    {
        $id=$this->session->userdata('user_id');
			$user_id=$id->id; 
        $this->load->model('store_model');
       $data =  $this->store_model->index($user_id);
       $this->load->view('store_view',['data'=>$data]);
    }

    public function add_store()
    {
        $id=$this->session->userdata('user_id');
			$user_id=$id->id; 
        $this->load->model('store_model');
        $this->store_model->add_store($user_id);
    }

    public function delete()
    {
        $id=$this->session->userdata('user_id');
			$user_id=$id->id; 
        $this->load->model('store_model');
       $data =  $this->store_model->delete($user_id);
    }

    function store_detail()
    {
        $id=$this->session->userdata('user_id');
			$user_id=$id->id; 
        $this->load->model('store_model');
       $data = $this->store_model->store_detail($user_id);
     
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