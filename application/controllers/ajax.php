<?php
class Ajax extends CI_Controller
{

    function ajax_load()
    {
       $this->load->model('prd/addprd');
       $data= $this->addprd->ajax();
       
        //$this->load->view('',['data'=>$data]);
   }
}
?>