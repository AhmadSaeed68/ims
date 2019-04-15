<?php

    class Profile extends CI_Controller{


        function index()
        {
            $this->load->model('profile_model');
            $data=$this->profile_model->index();
            $this->load->view('profile/profile_view',compact('data'));
        }

        function profile_sales()
        {
            $this->load->model('profile_model');
            $data=$this->profile_model->profile_sales();
            
        	$this->load->view('profile/profile_sales',['data'=>$data]);
        }

        function update_detail()
        {
            $this->load->model('profile_model');
            $this->profile_model->update_detail();
        }


        function profile_security()
        {
        	$this->load->view('profile/profile_security');
        }


        function profile_user_handle()
        {
            $this->load->helper('form');
        	$this->load->view('profile/profile_user_handle');
        }

        public function update_sales()
        {
             $this->load->model('profile_model');
            $this->profile_model->update_sales();
        }

        function add_user_data()
        {
            
            $this->load->model('profile_model');
            $this->profile_model->add_user_data();
        }

        public function pwd_change()
        {
            $this->load->model('profile_model');
            $data=$this->profile_model->pwd_change();
            


        }
        public function add_subusers()
        {
            $this->load->model('profile_model');
            $this->profile_model->add_subusers();
        }

        function __construct() // Construct Function check sessison else Redirect
    {
        parent::__construct();

        if(!$this->session->userdata('user_id'))
        {
            redirect('login');
        }
    }
    }
?>