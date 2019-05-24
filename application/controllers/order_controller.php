<?php

    class Order_controller extends CI_Controller
    {

     
      //Json Data//

               public function po_order_ajax()
               {
                $id=$this->session->userdata('user_id');
                 $user_id=$id->id; 
             
                 $this->load->model('order_model');
                  $list = $this->order_model->get_datatables($user_id);
                  $data = array();
                  $no = $_POST['start'];
                  foreach ($list as $po_order) {
                    $no++;
                    $row = array();
                    $row[] = $no;
                    $row[] = $po_order->po_code;
                    $row[] = $po_order->po_vendor;
                    $row[] = $po_order->po_description;
                    $row[] = $po_order->po_total;
                    
                  $row[] = timeAgo($po_order->po_date);   // PO_ORDER::DATE
                  if($po_order->po_status=="active") //CHECK STATUS :: AND DISPLAY
                  {
                    $row[]="<span class='w3-green'>Active</span>";
                                                                    
                    }
                    else
                    {
                    $row[]= "<span class='w3-red'>Dective</span>";
                    }
                  
                    if($po_order->order_report=="recived")
                    {
                      $row[]= "<span class='w3-text-teal fa fa-check-square-o fa-2x'></span><span class='w3-green'>Recived</span>";
                    }
                    else
                    {
                      $row[]= "<span class='w3-text-orange fa fa-truck fa-2x'></span><span class='w3-deep-orange'>Pending</span>";
                    }
                
                    
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
                                      <input type="button" class="w3-button w3-block w3-teal edit" value="Edit" id="'.$po_order->po_code.'">
                                    </li>
                                        <li>
                                          <button class="w3-button w3-block w3-red delete" id="'.$po_order->po_code.'" data-status="'.$po_order->po_status.'">Status</button>
                                        </li>
                                                                              
                                  </ul>
                              </div>';
                    }
                    


                    $data[] = $row;
                  }

                  $output = array(
                          "draw" => $_POST['draw'],
                          "recordsTotal" => $this->order_model->count_all($user_id),
                          "recordsFiltered" => $this->order_model->count_filtered($user_id),
                          "data" => $data,
                      );
                  //output to json format
                  echo json_encode($output);
  }



//*********************************************************//
        //Load Model View :: With Data
        function order_managment()
        {
            $this->load->model('order_model');
            $order_data=$this->order_model->order_managment();
            $this->load->view('order.php',['order_data'=>$order_data]);
        }



        function edit_order()
        {
          $id=$this->session->userdata('user_id');
          $user_id=$id->id; 
                $this->load->helper('form');  //Load Helper
                $order_id = $this->input->post('order_id');
                if(isset($order_id) && !empty($order_id))
                {
                  $this->load->model('order_model');  //Load Model
                  $records = $this->order_model->edit_order($order_id,$user_id);
                  $this->load->view('order_ajax/edit_order_ajax',['records'=>$records]);  //Load view 
                }
      }

        function get_vendor()
        {
          $id=$this->session->userdata('user_id');
          $user_id=$id->id; 
              $this->load->model('order_model');
              $data= $this->order_model->get_vendor($user_id);
                if(empty($data)){
                  ?>
                  <a class='w3-text-blue' href="<?php echo base_url("vendors_controller/vendors")?>">Click!! Add Vendor First</a>
                <?php
                }else{
                  ?>
                  <select class="form-control" required id="vendor selectpicker" name="vendor"  data-live-search="true">
                    <option></option>
                  <?php
                foreach($data as $each)
                    {
                      echo $each['item_code'];
                        ?>
                        <option id="<?php echo $each['id']; ?>"
                        value="<?php echo $each['vendor_name'] ?>"
                      ><?php echo $each['vendor_name']?>
                    </option>';
                            <?php 
                      } ?>
                        </select>
                        <?php
                }
              //::HTML Load 
           

        }


        //Update Order after click Update

        function update_order()
          {
            $id=$this->session->userdata('user_id');
            $user_id=$id->id; 
                $this->load->model('order_model');
                $this->order_model->update_order($user_id);
          }


          //Get Item Code :: order
        function get_itemCode_in_order()
        {
          $id=$this->session->userdata('user_id');
          $user_id=$id->id; 
            $this->load->model('order_model');  //Load Model
           $item_data= $this->order_model->get_itemCode_in_order($user_id);

           //Load ::HTML
           ?>
           <select class="form-control" id="category_id selectpicker" name="item_code[]"  onchange="myfun() "  data-live-search="true">
            <?php
          foreach($item_data as $each)
              {
                echo $each['item_code'];
                ?>
                <option id="<?php echo $each['item_code']; ?>"
                value="<?php echo $each['item_code'] ?>"
                id="<?php echo $each['item_id'] ?>"><?php echo $each['item_name'].'/'.$each['item_code']?>
            </option>';
                    <?php 
                } ?>
            </select>
                  <?php


        }

        function chk_item_qty_in_order()
        {
            $item_qty= $this->input->post('item_qty');
            $item_code= $this->input->post('item_code');
            $result= $this->db->select('item_qty')
                        ->from('items')
                        ->where('item_code',$item_code)
                        ->get('')
                        ->result_array();
                        foreach($result as $result)
                        {
                            $qty= $result['item_qty'];
                            if($item_qty>$qty)
                            {
                                echo"**Available Quantity:".$qty."**";
                            }
                        }
        }

          //Make Order 

        function make_order(){
          $id=$this->session->userdata('user_id');
          $user_id=$id->id; 
            $data=$this->input->post();
            $this->load->model('order_model');
            $this->order_model->make_order($user_id);

            //$this->load->model('order_model');
            //$this->order_model->make_order($data);
            //$this->order_model->make_order($data);
            // $data=implode(',',$this->input->post('po_desc'));
            // $data = json_encode($this->input->post('po_desc'));

            // $data=array(
            //     'po_vendor'=>$this->input->post('po_vendor'),
            //     'po_code'=>$this->input->post('po_code'),
            //     'po_date'=>$this->input->post('date'),
            //     'po_description'=>$this->input->post('po_desc'),
            //     'po_status'=>$this->input->post('status'),
            //     'item_code'=>$this->input->post('category_id'),
            //     'item_rate'=>$this->input->post('item_rate'),
            //     'item_quantity'=>$this->input->post('item_quantity')

            // );




        }

            //update Order Status :: After Click 
           function order_status(){
            $id=$this->session->userdata('user_id');
            $user_id=$id->id; 
                    if($_POST['btn_action'] == 'delete')
                    {
                        $status= $this->input->post('status');
                        if($status == 'active')
                            {
                            $status = 'inactive';
                            }else{
                                $status='active';
                            }

                            $this->load->model('order_model');
                            $this->order_model->order_status($status, $user_id);
                    }
    }



                //Auto PoCode

                function auto_po_code(){
                  $id=$this->session->userdata('user_id');
                  $user_id=$id->id; 
                    $row= $this->db->query('SELECT COALESCE(MAX(id),0) as id FROM purchase_order where user_id="'.$user_id.'" ')->row();
                    $id= $row->id;
                    if($id==0)
                    {
                    $last_word=$id;
                    }else
                    {
                      $row=$this->db->select('po_code')->where('id',$id)->where('user_id',$user_id)->get('purchase_order')->row();
                      $po_code= $row->po_code;
                      $pieces = explode(' ', $po_code);
                            $last_word = array_pop($pieces);
                            $last_word=(int)$last_word;
                            
                    } 
                    ?>
                  
                    <input type="text" readonly required="" name="po_code" value="<?='PO'.date("dny").' '.$last_word+=1;?>" class="form-control"  id="po_code">
                  
                      <?php 
                }


                // function data_search()
                // {
                //   $this->load->model('order_model');
                //   $order_data=$this->order_model->data_search();
                //    $this->load->view('order.php',['order_data'=>$order_data]);
                 
                // }


                function export_csv(){
                      $id=$this->session->userdata('user_id');
                      $user_id=$id->id;
                      $filename = 'PO-Order'.date('Ymd').'.csv'; 
                      header("Content-Description: File Transfer");
                      header("Content-Disposition: attachment;filename=$filename");
                      header("Content-Type: application/csv; ");

                    
                          $this->load->model('order_model'); //Load MOdel
                          $userData=$this->order_model->export_csv($user_id);

                          // File Creation
                        $file=fopen('php://output','w');
                        $array_data=array("id","Po Code","Po Vendor","Total","Desc","Report","Date");
                        fputcsv($file,$array_data);
                          foreach($userData as $value){
                            fputcsv($file,$value);
                          }
                          fclose($file);
                          exit;
                }



            function import_csv(){
                  $id=$this->session->userdata('user_id');
                  $user_id=$id->id;
                  $this->load->model('order_model'); /// load it at beginning 
                  $this->load->library('csvimport');  //Load Library

                  $file_data=$this->csvimport->get_array($_FILES["csv_file"]["tmp_name"]);
                  foreach ($file_data as $row) {

                    $data = array(
                      'id'=>$row['id'],
                     'po_code'=>$row['Po Code'],
                   
                     'po_vendor'=>$row['Po Vendor'],
                      'po_total'=>$row['Total'],
                       'po_description'=>$row['Desc'],
                       'order_report'=>$row['Report'],
                        
                         'po_date'=>$row['Date'],
                   
                    );
                 // in order to insert or update ... you cannot use insert batch ....  
                 // pass it one by one 
                $this->order_model->insert_update_data($data,$user_id);

                  }
        
       
                 //  $this->invoice_model->insert_data($data);

    }       


                  //Check If Session :: Else Redirect 
                 function __construct() {
                   
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
        if(!$this->session->userdata('user_id')){
            redirect('login');
        }
    }

    }
?>