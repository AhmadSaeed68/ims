<?php
class Admin extends CI_Controller{


    function dashboard()
    {
       $this->load->view('dashboard');
   	}


    function __construct() // Construct Function check sessison else Redirect
    {
        parent::__construct();

        if(!$this->session->userdata('user_id'))
        {
            redirect('login');
        }
    }
    
}?>
