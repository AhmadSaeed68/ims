<?php
    class Items_controller extends CI_Controller{

        function item()
        {
            $id=$this->session->userdata('user_id');
            $user_id=$id->id; 
            $this->load->model('items_model');
            $item=$this->items_model->item($user_id);
            $this->load->view('items',['item'=>$item]);
        }


        //Load Modal of items::Add All items into Database

        function get_item()
            {
                $id=$this->session->userdata('user_id');
                $user_id=$id->id; 
                    $this->load->helper('form');
                    $phoneData = $this->input->post('phoneData');
                    if(isset($phoneData) and !empty($phoneData))

                    {
                        $this->load->model('items_model');
                        $records = $this->items_model->item_search($user_id);
                            
                        $this->load->view('items_ajax/get_item_ajax',['records'=>$records]);

                    }
        }


                    //Get items data into array and :: send to controller
            function add_item()
            {
                $id=$this->session->userdata('user_id');
                $user_id=$id->id; 
                //if($_POST["submit"]=="Add"){
                $insert_data=array(
                    'category_id'=>$this->input->post('category_id'),
                    'item_name'=>$this->input->post('itemName'),
                    'item_code'=>$this->input->post('item_code'),
                    'item_description'=>$this->input->post('item_desc'),
                    'user_id'       =>  $user_id
                    // 'item_qty'=>$this->input->post('item_qty'),
                );
                //print_r($insert_data);
                $this->load->model('items_model');
                $this->items_model->add_items($insert_data);
            //}
                }


                //load all data into modal :: After click on edit butto

                function fetch_item()
                {
                    $id=$this->session->userdata('user_id');
            $user_id=$id->id; 
                    $this->load->helper('form');
                    $prd_id=$_POST['item_id'];

                    if(isset($prd_id) and !empty($prd_id))
                    {
                        $this->load->model('items_model');  //load Model
                        $data= $this->items_model->fetch_item($prd_id,$user_id); 

                        $this->load->view('items_ajax/fetch_item_ajax',['data'=>$data]);    //Load View after 
                    }
    
                }


                    //Change Status after click click on :: Delete button

                function item_status()
                {
                    $id=$this->session->userdata('user_id');
            $user_id=$id->id; 
                    if($_POST['btn_action'] == 'delete')
                    {
                        $status= $this->input->post('status');
                        if($status == 'active')
                            {
                                $status = 'inactive';
                            }else
                            {
                                $status='active';
                            }

                            $this->load->model('items_model');
                            $this->items_model->item_status($status, $user_id);
                    }
    
                }


                    //Update items after  click on :: Udate

                function update_item()
                {
                    $id=$this->session->userdata('user_id');
            $user_id=$id->id; 
                    $data=$this->input->post();
        
                        //print_r($insert_data);
                        $this->load->model('items_model');  //Load Model
                        $this->items_model->update_item($data, $user_id); 
                    }


                    function search_category()
                    {
                        $searchTerm = $this->input->post('searchTerm');
                        $this->load->model('items_model');
                         $data_book = $this->items_model->get_category($searchTerm, 'category_name');
                        echo json_encode($data_book);
                    }

                        //Check if Session else :: Redirect Login Page

                    public function select2($booksClue, $column)
                    {
                              $booksClue = $this->input->get('booksClue');
                              $this->load->model('items_model');
                    $data_book = $this->items_model->select2($booksClue, 'category_name');
                    echo json_encode($data_book);
                    }


                    function update_item_with_input()
                    {
                        $id=$this->session->userdata('user_id');
                        $user_id=$id->id; 
                        $this->load->model('items_model');
                        $this->items_model->update_item_with_input($user_id);
                      
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