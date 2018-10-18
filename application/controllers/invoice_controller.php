<?php
    class Invoice_controller extends CI_Controller{
         /**********  PO INVOICE  Function  **********/

         function po_invoice(){

            $this->load->model('invoice_model');
           $po_invoice= $this->invoice_model->po_invoice();
           $this->load->view('po_invoice',['po_invoice'=>$po_invoice]);
         }


         /***************************EDIT INVOICE DATA************ */
         function edit_invoice(){

            $this->load->helper('form');
            $id=$this->input->post('invoice_id');
                 if(isset($id) && !empty($id)){
                 $this->load->model('invoice_model');
                 $records = $this->invoice_model->edit_invoice($id);
                    $this->load->view('invoice_ajax/edit_invoice_ajax',['records'=>$records]);
                    
         }}
         function view_invoice(){
             $id=$this->input->post('invoice_id');
             $this->load->model('invoice_model');
            $records= $this->invoice_model->view_invoice($id);
            $this->load->view('invoice_ajax/view_invoice_ajax',['records'=>$records]);


         }
         function update_invoice(){

             $data= $this->input->post();
             $this->load->model('invoice_model');
             $this->invoice_model->update_invoice($data);

          }

          function report(){

$this->load->view('report');
          }

          function make_invoice(){
             $data=$this->input->post();


             $this->load->model('invoice_model');
             $this->invoice_model->make_invoice();

          }
          function get_PoCode_in_invoice(){
            $this->load->model('invoice_model');
           $po_code= $this->invoice_model->get_PoCode_in_invoice();
           $this->load->view('invoice_ajax/get_PoCode_in_invoice_ajax',['po_code'=>$po_code]);
          
          }

          function get_PoCode_item(){
            $po_code=$this->input->post('datapost');
               $this->load->model('invoice_model');
              $result=$this->invoice_model->get_PoCode_item($po_code);
              $this->load->view('invoice_ajax/get_PoCode_item_ajax',['result'=>$result]);
              
          }

          function auto_po_invoice(){
            $this->db->select_max('invoice_code');
        $result = $this->db->get('po_invoice')->row();?>
        <input type="text" readonly required="" name="invoice_code" id="invoice_code" value="<?=$result->invoice_code+1;?>" class="form-control">
       <?php 
            ?>
            
            <?php
        }

    }
?>