<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
     class Department_controller extends CI_Controller
     {
        public function index()
        {
            $this->load->view('department_view');
        }


        public function department_by_json()
        {
            
        }

        public function add_department()
        {
            $this->load->model('department_model');
            $this->department_model->add_department();
             
        }

        function __construct() 
        {
       parent::__construct();
       if(!$this->session->userdata('user_id'))
       {
           redirect('login');
       }
   }
     }
?>