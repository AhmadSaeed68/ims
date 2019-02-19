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
            $this->load->model('department_model');
            $list = $this->department_model->get_datatables();
            $data = array();
            $no = $_POST['start'];
            foreach ($list as $department) {
                $no++;
                $row = array();
                $row[] = $no;
                $row[] = $department->department;
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
                        <input type="button" class="w3-button w3-block w3-teal edit" value="Edit" id="'.$department->id.'">
                      </li>
                          <li>
                            <button class="w3-button w3-block w3-red delete" id="'.$department->id.'" data-status="'.$department->id.'">Status</button>
                          </li>
                                                                
                    </ul>
                </div>';
      }
                
               
                
                 // PO_ORDER::DATE
               
              
               
             
                
                
             
                
                
          
          
                $data[] = $row;
              }
              $output = array(
                "draw" => $_POST['draw'],
                "recordsTotal" => $this->department_model->count_all(),
                "recordsFiltered" => $this->department_model->count_filtered(),
                "data" => $data,
            );
        //output to json format
        echo json_encode($output);
        }

        public function add_department()
        {
            $this->load->model('department_model');
            $this->department_model->add_department();
             
        }


        function edit_department()
        {
                $this->load->helper('form');  //Load Helper
                $department_id = $this->input->post('department_id');
                if(isset($department_id) && !empty($department_id))
                {
                  $this->load->model('department_model');  //Load Model
                  $records = $this->department_model->edit_department($department_id);
                  $this->load->view('department_ajax/edit_department_ajax',['records'=>$records]);  //Load view 
                }
        }

        public function update_department()
        {
            
            $this->load->model('department_model');
            $this->department_model->update_department();
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