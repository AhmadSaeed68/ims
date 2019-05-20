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
               $row[]= "<span class='w3-text-green fa fa-check-circle fa-2x'> Assign </span>";
               } elseif($query->status == "processing")
               {
               $row[]= "<span class='w3-text-orange fa fa-exchange fa-2x'> In Processing </span>";
               }else
               {
                $row[]= "<span class='w3-text-deep-orange fa-2x fa fa-remove'> Deleted by: Admin</span>";
               }
             
               if($query->review=="")
               {
                  $row[]= '<div class="tenor-gif-embed" data-postid="6177880" data-share-method="host" data-width="50%" data-aspect-ratio="1.6490066225165563"><a href="https://tenor.com/view/patrick-star-gif-6177880">Patrick Star Spongebob GIF</a> from <a href="https://tenor.com/search/patrickstar-gifs">Patrickstar GIFs</a></div><script type="text/javascript" async src="https://tenor.com/embed.js"></script></span>'."<span class='w3-text-orange fa-2x'>***In Processing***";
               }
               else
               {
                 $row[]= "<span class='w3-text-green' style='font-size:20px;font-family:Times New Roman;'>".$query->review."</span>";
               }
               $row[] = timeAgo($query->date);
               
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

        public function delete_request()
        {
           $this->load->model('purchase_request_model');
           $this->purchase_request_model->delete_request(); 
        }

   public function rqst_po()
        {
           $this->load->model('purchase_request_model');
           $this->purchase_request_model->rqst_po(); 
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