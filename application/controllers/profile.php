<?php

    class Profile extends CI_Controller{


        function index()
        {
            $this->load->view('profile/profile_view');
        }

        function profile_sales()
        {
            $this->load->model('profile_model');
            $data=$this->profile_model->profile_sales();
            
        	$this->load->view('profile/profile_sales',['data'=>$data]);
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



        function add_user_data()
        {
            
            $this->load->model('profile_model');
            $this->profile_model->add_user_data();
        }
    }
?>