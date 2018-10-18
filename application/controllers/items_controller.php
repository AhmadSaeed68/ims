<?php
    class Items_controller extends CI_Controller{

        function item()
        {
            $this->load->model('items_model');
            $item=$this->items_model->item();
            $this->load->view('items',['item'=>$item]);
        }
        function get_item()
                    {
                    $this->load->helper('form');
                    $phoneData = $this->input->post('phoneData');
                    if(isset($phoneData) and !empty($phoneData)){
                    $this->load->model('items_model');
                    $records = $this->items_model->item_search($phoneData);
                        
                    $this->load->view('items_ajax/get_item_ajax',['records'=>$records]);

            }
        }

            function add_item(){
                //if($_POST["submit"]=="Add"){
                $insert_data=array(
                    'category_id'=>$this->input->post('category_id'),
                    'item_name'=>$this->input->post('itemName'),
                    'item_code'=>$this->input->post('item_code'),
                    'item_description'=>$this->input->post('item_desc'),
                    // 'item_qty'=>$this->input->post('item_qty'),
                );
                //print_r($insert_data);
                $this->load->model('items_model');
                $this->items_model->add_items($insert_data);
            //}
                }

                function fetch_item(){
                   
                    $this->load->helper('form');
                    $prd_id=$_POST['item_id'];
                    if(isset($prd_id) and !empty($prd_id)){
                    $this->load->model('items_model');
                    $data= $this->items_model->fetch_item($prd_id);
                    $this->load->view('items_ajax/fetch_item_ajax',['data'=>$data]);
                    }
    
                }

                function delete_item(){
                    $item_id=$_POST['item_id'];
                    $this->load->model('items_model');
                    $this->items_model->delete_item($item_id);
    
                }

                function update_item(){

                    $data=$this->input->post();
        
                        //print_r($insert_data);
                        $this->load->model('items_model');
                        $this->items_model->update_item($data);
                    }

                  
    }
?>