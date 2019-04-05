<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Purchase_request_controller extends CI_Controller {

        public function index()
        {
         
            $this->load->view('purchase_request_view');
        }

        public function purchase_request_by_json()
        {
            $this->load->model('purchase_request_model');
            $list = $this->purchase_request_model->get_datatables();
            $data = array();
            $no = $_POST['start'];
            foreach ($list as $query) {
              $no++;
              $row = array();
              $row[] = $no;
              $row[] = $query->id;
              $row[] = $query->item_code;
              $row[] = $query->department_name;
              $row[] = $query->item_qty;
             
              
              // query::DATE
              if($query->status == "pending") //CHECK STATUS :: AND DISPLAY
              {
               $row[]="<span class='w3-text-deep-orange'>Pending</span>";
                                                               
               }
               elseif($query->status == "success")
               {
               $row[]= "<span class='w3-text-green fa fa-check-circle fa-2x'> Success </span>";
               }else
               {
                $row[]= "<span class='w3-text-orange fa fa-remove'> Not Available in Stock </span>";
               }
             
               if($query->review=="")
               {
                  $row[]= "<span class='w3-text-orange'>***In Waiting***</span>";
               }
               else
               {
                 $row[]= "<span class='w3-green'>".$query->review."</span>";
               }
               $row[] = $query->date;
               
               $id=$this->session->userdata('user_id');
             if ($id->type=='super_user' OR $id->type=='user') 
             {
               $row[]="<span class='w3-text-red fa fa-warning '>  Access Forbidden</span>";
             }
               else{
                 $row[]='<div class="dropdown">
                           <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Action
                             <span class="caret"></span></button>
                             <ul class="dropdown-menu">
                               
                                   <li>
                                     <button type="submit" class="w3-button w3-block w3-red delete" id="'.$query->id.'">Delete</button>
                                   </li>
                                                                         
                             </ul>
                         </div>';
               }
          
              
        
        
              $data[] = $row;
            }
        
            $output = array(
                    "draw" => $_POST['draw'],
                    "recordsTotal" => $this->purchase_request_model->count_all(),
                    "recordsFiltered" => $this->purchase_request_model->count_filtered(),
                    "data" => $data,
                );
            //output to json format
            echo json_encode($output);
        }

        function get_department_in_request()
        {

            $this->load->model('purchase_request_model');  //Load Model
           $department= $this->purchase_request_model->get_department_in_request();

           //Load ::HTML
           ?>
           <select class="form-control chosen" id="department" name="department[]">
            <?php
          foreach($department as $each)
              {
              
                ?>
            <option id="<?php echo $each['id']; ?>" value="<?php echo $each['department'] ?>">
                <?php echo $each['department']?>
            </option>';
                    <?php 
                } ?>
            </select>
                  <?php


        }

        function get_items()
        {

            $this->load->model('purchase_request_model');  //Load Model
           $item_data= $this->purchase_request_model->get_items();

           //Load ::HTML
           ?>
           <select class="form-control" id="item_code" name="item_code[]">
            <?php
          foreach($item_data as $each)
              {
                
                ?>
                <option id="<?php echo $each['item_code']; ?>"
                value="<?php echo $each['item_code'] ?>"
                id="<?php echo $each['item_id'] ?>"><?php echo $each['item_code']?>
            </option>';
                    <?php 
                } ?>
            </select>
                  <?php


        }

        public function make_request()
        {
            $this->load->model('purchase_request_model');
            $this->purchase_request_model->make_request();
        }

        public function request_action()
        {
            $this->load->model('purchase_request_model');
            $data=$this->purchase_request_model->request_action();
            $data1=$this->purchase_request_model->get_Item_Qty();
        //    print_r($data1);
            $this->load->view('request_action_view',compact('data','data1'));
        }

        public function action_on_request()
        {
            $this->load->model('purchase_request_model');
            $this->purchase_request_model->action_on_request();
        }

        public function delete_request_1()
        {
           $this->load->model('purchase_request_model');
           $this->purchase_request_model->delete_request_1(); 
        }


            //GEt Item_qty from Stock

            function item_from_stock()
            {
                
               $item_code= $this->input->post('item_code');
              
               $data=$this->db
        					->select('item_qty')
        					->from('items_in_stock')
        					->where('item_code',$item_code)
        					->get('');
        					return $data->result_array();
              
            }

            function item_code_value()
            {
                $this->load->model('purchase_request_model');
                $item_code=$this->input->post('item_code_value');
                for($count = 0; $count < count($item_code); $count++)
                {
                    
                    $data = $this->purchase_request_model->item_code_value($item_code[$count]); 
                    $out[] = $data;
            
                }
                echo json_encode($out);
               
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