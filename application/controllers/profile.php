<?php
    class Profile extends CI_Controller{
        function index(){
            $this->load->view('profile/profile_view');
        }

        function profile_sales(){
        	$this->load->view('profile/profile_sales');
        }
        function profile_security(){
        	$this->load->view('profile/profile_security');
        }

        function profile_user_handle(){
        	$this->load->view('profile/profile_user_handle');
        }
    }
?>