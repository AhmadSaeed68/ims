<?php

    class Profile extends CI_Controller{


        function index()
        {
            $id=$this->session->userdata('user_id');
            $user_id=$id->id; 
            $this->load->model('profile_model');
            $data=$this->profile_model->index($user_id);
            $this->load->view('profile/profile_view',compact('data'));
        }

        function profile_sales()
        {
            $id=$this->session->userdata('user_id');
            $user_id=$id->id; 
            $this->load->model('profile_model');
            $data=$this->profile_model->profile_sales($user_id);
            
        	$this->load->view('profile/profile_sales',['data'=>$data]);
        }

        function update_detail()
        {
            $id=$this->session->userdata('user_id');
            $user_id=$id->id; 
            $this->load->model('profile_model');
            $this->profile_model->update_detail($user_id);
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
            $id=$this->session->userdata('user_id');
            $user_id=$id->id; 
             $this->load->model('profile_model');
            $this->profile_model->update_sales($user_id);
        }

        function add_user_data()
        {
            $id=$this->session->userdata('user_id');
            $user_id=$id->id; 
            
            $this->load->model('profile_model');
            $this->profile_model->add_user_data($user_id);
        }

        public function pwd_change()
        {
            $id=$this->session->userdata('user_id');
            $user_id=$id->id; 
            $this->load->model('profile_model');
            $data=$this->profile_model->pwd_change($user_id);
            


        }
        public function add_subusers()
        {
            $id=$this->session->userdata('user_id');
            $user_id=$id->id; 
            $this->load->model('profile_model');
            $this->profile_model->add_subusers($user_id);
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