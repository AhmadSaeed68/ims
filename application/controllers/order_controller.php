<?php
    class Order_controller extends CI_Controller{
        function order_managment(){
            $this->load->model('order_model');
            $order_data=$this->order_model->order_managment();
            $this->load->view('order.php',['order_data'=>$order_data]);
        }

        function edit_order(){
            $this->load->helper('form');
                $order_id = $this->input->post('order_id');
                if(isset($order_id) && !empty($order_id)){
                $this->load->model('order_model');
                $records = $this->order_model->edit_order($order_id);
              
                  $this->load->view('order_ajax/edit_order_ajax',['records'=>$records]);
        }}

        function get_vendor(){
            $this->load->model('order_model');
           $data= $this->order_model->get_vendor();
            ?>
           <select class="form-control" id="vendor selectpicker" name="vendor"  data-live-search="true">
            <?php
          foreach($data as $each){
              echo $each['item_code'];
              ?>
              <option id="<?php echo $each['id']; ?>"
              value="<?php echo $each['vendor_name'] ?>"
            ><?php echo $each['vendor_name']?>
          </option>';
                  <?php } ?>
                  </select>
                  <?php

        }

        function update_order(){
            $this->load->model('order_model');
            $this->order_model->update_order();
      }

        function get_itemCode_in_order(){

            $this->load->model('order_model');
           $item_data= $this->order_model->get_itemCode_in_order();
           ?>
           <select class="form-control" id="category_id selectpicker" name="item_code[]"  onchange="myfun() "  data-live-search="true">
            <?php
          foreach($item_data as $each){
              echo $each['item_code'];
              ?>
              <option id="<?php echo $each['item_code']; ?>"
              value="<?php echo $each['item_code'] ?>"
              id="<?php echo $each['item_id'] ?>"><?php echo $each['item_name'].'/'.$each['item_code']?>
          </option>';
                  <?php } ?>
                  </select>
                  <?php


        }

        function chk_item_qty_in_order(){
            $item_qty= $this->input->post('item_qty');
            $item_code= $this->input->post('item_code');
            $result= $this->db->select('item_qty')
                        ->from('items')
                        ->where('item_code',$item_code)
                        ->get('')
                        ->result_array();
                        foreach($result as $result){
                            $qty= $result['item_qty'];
                            if($item_qty>$qty){
                                echo"**Available Quantity:".$qty."**";
                            }
                        }
        }


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
           function order_status(){
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
                function auto_po_code(){
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
    }
?>