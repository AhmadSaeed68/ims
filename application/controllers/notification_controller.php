<?php
     defined('BASEPATH') OR exit('No direct script access allowed');

     class notification_controller extends CI_Controller {

        function notify_purchse_req()
              {
                  $query=$this->db
                  ->select('status')
                  
                  ->where('status','pending')
                 ->get('purchase_request');
                 
                  $rowcount = $query->num_rows();
                  print_r($rowcount);
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