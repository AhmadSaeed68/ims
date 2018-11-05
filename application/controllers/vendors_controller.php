<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

	class Vendors_controller extends CI_Controller{

		function vendors(){
			$this->load->model('vendors_model');
			$data=$this->vendors_model->vendors();
			$this->load->view('vendors_view',['data'=>$data]);
		}

		function add_vendors(){
			$this->load->model('vendors_model');
			$this->vendors_model->add_vendors();
		}
	}
 ?>