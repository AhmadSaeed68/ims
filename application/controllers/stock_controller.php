<?php

    class Stock_controller extends CI_Controller{

        //Load Stock 
        function stock(){
            $id=$this->session->userdata('user_id');
			$user_id=$id->id; 
            $this->load->model('stock_model');
            $stock=$this->stock_model->stock($user_id);
            $this->load->view('stock',['stock'=>$stock]);

        }

        //Items ::
        function item_detail()
        {
            $id=$this->session->userdata('user_id');
			$user_id=$id->id; 
        	$item_code=$this->input->post('item_code');
        	
        	$this->load->model('stock_model');
        	$result=$this->stock_model->item_detail($item_code,$user_id);
        	$this->load->view('ajax_stock/item_detail_view',['result'=>$result]);
        	
        }


         function __construct() 
         {
        parent::__construct();
        function timeAgo($timestamp){
            $datetime1=new DateTime("now");
            $datetime2=date_create($timestamp);
            $diff=date_diff($datetime1, $datetime2);
            $timemsg='';
            if($diff->y > 0){
                $timemsg = $diff->y .' year'. ($diff->y > 1?"'s":'');
        
            }
            else if($diff->m > 0){
             $timemsg = $diff->m . ' month'. ($diff->m > 1?"'s":'');
            }
            else if($diff->d > 0){
             $timemsg = $diff->d .' day'. ($diff->d > 1?"'s":'');
            }
            else if($diff->h > 0){
             $timemsg = $diff->h .' hour'.($diff->h > 1 ? "'s":'');
            }
            else if($diff->i > 0){
             $timemsg = $diff->i .' minute'. ($diff->i > 1?"'s":'');
            }
            else if($diff->s > 0){
             $timemsg = $diff->s .' second'. ($diff->s > 1?"'s":'');
            }
        
        $timemsg = $timemsg.' ago';
        return $timemsg;
        
        }
        if(!$this->session->userdata('user_id'))
        {
            redirect('login');
        }
    }
    }
?>