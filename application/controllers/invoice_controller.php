<?php
    class Invoice_controller extends CI_Controller{
         /**********  PO INVOICE  Function  **********/

         public function po_invoice_ajax()
  {
    $this->load->model('invoice_model');

    $list = $this->invoice_model->get_datatables();
    $data = array();
    $no = $_POST['start'];
    foreach ($list as $po_invoice) {
      $no++;
      $row = array();
      $row[] = $no;
      $row[] = $po_invoice->po_code;
      $row[] = $po_invoice->invoice_code;
      $row[] = $po_invoice->invoice_total;
      $row[] = $po_invoice->invoice_description;
      $row[] = $po_invoice->invoice_date;
     
      $row[]='<span class="fa fa-eye w3-text-blue"><a class="view" id="'.$po_invoice->id.'"> View</a></span>';
      $id=$this->session->userdata('user_id');
     if ($id->type=='super_user' OR $id->type=='user') 
     {
        $row[] = "<span class='w3-text-red fa fa-warning '>  Access Forbidden</span>";
     }else{
      $row[] = '
      <div class="dropdown">
        <button class="btn w3-orange btn-default dropdown-toggle" type="button" data-toggle="dropdown">Action
            <span class="caret"></span>
          </button>
                    <ul class="dropdown-menu">
                      <li>
                        <input type="button" class="w3-button w3-block w3-teal edit" value="Edit" id="'.$po_invoice->id.'">
                      </li>
                      <li>
                        <input type="button" class="w3-button w3-block w3-red  delete" value="Delete" id="'.$po_invoice->id.'">
                      </li>
                                                    </ul>
                                                </div>
      ';
     }
      


      $data[] = $row;
    }

    $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->invoice_model->count_all(),
            "recordsFiltered" => $this->invoice_model->count_filtered(),
            "data" => $data,
        );
    //output to json format
    echo json_encode($output);
  }

         function po_invoice()
         {

            $this->load->model('invoice_model'); //Load Model
           $po_invoice= $this->invoice_model->po_invoice();

           $this->load->view('po_invoice',['po_invoice'=>$po_invoice]); //Load View
         }


         /***************************EDIT INVOICE DATA************ */
         function edit_invoice()
         {
            $this->load->helper('form'); //Load Form Helper
            $id=$this->input->post('invoice_id');   // Get Input from Form fields
              if(isset($id) && !empty($id))
              {
                $this->load->model('invoice_model');  //Load MOdel
                $records = $this->invoice_model->edit_invoice($id);
                $this->load->view('invoice_ajax/edit_invoice_ajax',['records'=>$records]);  //Load View that is in seprate folder
                    
              }
          }



            //view Invoice on click **View INvoice** in seprate folder//

         function view_invoice()  
         {
             $id=$this->input->post('invoice_id');  //Get Input data from form fileds
             $this->load->model('invoice_model');   //Load MOdel

            $records= $this->invoice_model->view_invoice($id);
            $this->load->view('invoice_ajax/view_invoice_ajax',['records'=>$records]);  //Load View ajax request that is in folder  


         }


          //Updare Invoice Data

         function update_invoice()  
         {
              $data= $this->input->post();  // get input data in array

              $this->load->model('invoice_model');  //Load Model
              $this->invoice_model->update_invoice($data);

          }



            //Report

          function report() 
          {
            $this->load->view('report');
          }




          function make_invoice() //Make Invoice 
          {
             $data=$this->input->post();  //get data into array
              $this->load->model('invoice_model');  //load model
             $this->invoice_model->make_invoice();

          }




          function get_PoCode_in_invoice()
          {
            $this->load->model('invoice_model');  //load model
            $po_code= $this->invoice_model->get_PoCode_in_invoice();
            $this->load->view('invoice_ajax/get_PoCode_in_invoice_ajax',['po_code'=>$po_code]); //load view
          
          }







          function date_wise_search()     //Just Practise
          {
              $this->load->model('invoice_model');
              $this->invoice_model->po_invoice();
          }





          function get_PoCode_item()
          {
            $po_code=$this->input->post('datapost');
               $this->load->model('invoice_model');
              $result=$this->invoice_model->get_PoCode_item($po_code);
              $this->load->view('invoice_ajax/get_PoCode_item_ajax',['result'=>$result]);
              
          }




            //Auto Po_code Generate Auto Po Code

          function auto_po_invoice()    
          { 

            $this->db->select_max('invoice_code');  //Select Max value From invoice 
            $result = $this->db->get('po_invoice')->result_array(); 

            $row=$this->db->select('*')->order_by('id',"desc")->limit(1)->get('po_invoice')->row();
        // foreach($result as $result){
        //     $invoice_code=$result['invoice_code'];
        //     } 
            $invoice_code=$row->invoice_code;
            $invoice_code=substr($invoice_code,11,3);
        ?>
        <input type="text" readonly required="" name="invoice_code" value="<?='INPO'.date("dny").'-'.$invoice_code+=1?>" class="form-control"  id="invoice_code">
      
       <?php 
            ?>
            
            <?php
        }

          function export_csv()
          {
            $filename = 'PO-Invoice_'.date('Ymd').'.csv'; 
            header("Content-Description: File Transfer");
            header("Content-Disposition: attachment;filename=$filename");
            header("Content-Type: application/csv; ");

                         
                              $this->load->model('invoice_model'); //Load MOdel
                              $userData=$this->invoice_model->export_csv();

                              // File Creation
                            $file=fopen('php://output','w');
                            $array_data=array("id","Invoice Code","Item Code","Item Qty","Item Rate","Discount","Total","Date");
                            fputcsv($file,$array_data);
        foreach($userData as $value){
          fputcsv($file,$value);
        }
        fclose($file);
        exit;
                        }



        //Check Session if Session else Redirect Login

         function __construct() {
        parent::__construct();
        if(!$this->session->userdata('user_id')){
            redirect('login');
        }
    }

    }
?>