<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		$this->load->view('home_view');


	}

	function ajax(){
		$this->load->model('home_model');
		$this->home_model->test();
	}


	function view_invoice(){
		$this->load->model("home_model");
		$result=$this->home_model->view_invoice();
print_r($result);
	}

	function test()
	{
		$this->load->view('test_view');
	}
}

/* End of file home.php */
/* Location: ./application/controllers/home.php */