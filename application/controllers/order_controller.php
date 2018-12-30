<?php

    class Order_controller extends CI_Controller
    {

      //Json Data//

               public function po_order_ajax()
               {
                 $this->load->model('order_model');
    $list = $this->order_model->get_datatables();
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
      
     $row[] = $po_order->po_date;   // PO_ORDER::DATE
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
            "recordsTotal" => $this->order_model->count_all(),
            "recordsFiltered" => $this->order_model->count_filtered(),
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
                $this->load->helper('form');  //Load Helper
                $order_id = $this->input->post('order_id');
                if(isset($order_id) && !empty($order_id))
                {
                  $this->load->model('order_model');  //Load Model
                  $records = $this->order_model->edit_order($order_id);
                  $this->load->view('order_ajax/edit_order_ajax',['records'=>$records]);  //Load view 
                }
      }

        function get_vendor()
        {
              $this->load->model('order_model');
              $data= $this->order_model->get_vendor();
              //::HTML Load 
            ?>
           <select class="form-control" required id="vendor selectpicker" name="vendor"  data-live-search="true">
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


        //Update Order after click Update

        function update_order()
          {
                $this->load->model('order_model');
                $this->order_model->update_order();
          }


          //Get Item Code :: order
        function get_itemCode_in_order()
        {

            $this->load->model('order_model');  //Load Model
           $item_data= $this->order_model->get_itemCode_in_order();

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
            $data=$this->input->post();
            $this->load->model('order_model');
            $this->order_model->make_order();

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
           function order_status()
           {
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
                            $this->order_model->order_status($status);
                    }
                }



                //Auto PoCode

                function auto_po_code()
                {
                    $this->db->select_max('po_code');
                $result = $this->db->get('purchase_order')->result_array();
                $row=$this->db->select('*')->order_by('id',"desc")->limit(1)->get('purchase_order')->row();
                $po_code=$row->po_code;
                $po_code=substr($po_code,9,3);
                // foreach($result as $result){
                //     $po_code=$result['po_code'];
                //     $data_code_array = explode("-", $po_code); 
                //     $po_code=$data_code_array[1]+1;
                // }
                ?>

                <input type="text" readonly required="" name="po_code" value="<?='PO'.date("dny").'-'.$po_code+=1;?>" class="form-control"  id="po_code">
               <?php 
                    ?>
                    
                    <?php
                }


                // function data_search()
                // {
                //   $this->load->model('order_model');
                //   $order_data=$this->order_model->data_search();
                //    $this->load->view('order.php',['order_data'=>$order_data]);
                 
                // }


                function export_csv(){
                   $filename = 'users_'.date('Ymd').'.csv'; 
                  header("Content-Description: File Transfer");
                  header("Content-Disposition: attachment;filename=$filename");
                  header("Content-Type: application/csv; ");

                 
                      $this->load->model('order_model'); //Load MOdel
                      $userData=$this->order_model->export_csv();

                      // File Creation
                    $file=fopen('php://output','w');
                    $array_data=array("id","Po Code","Item Code","Item Qty","Item Rate","Total","Report","Date");
                    fputcsv($file,$array_data);
foreach($userData as $value){
  fputcsv($file,$value);
}
fclose($file);
exit;
                }

                  //Check If Session :: Else Redirect 
                 function __construct() {
        parent::__construct();
        if(!$this->session->userdata('user_id')){
            redirect('login');
        }
    }

    }
?>