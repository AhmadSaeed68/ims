<?php
    class Invoice_controller extends CI_Controller{
         /**********  PO INVOICE  Function  **********/

         public function po_invoice_ajax(){
           $id=$this->session->userdata('user_id');
            $user_id=$id->id;
              $this->load->model('invoice_model');

              $list = $this->invoice_model->get_datatables($user_id);
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
                $row[] = timeAgo($po_invoice->invoice_date);
              
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
                               
                                                              </ul>
                                                          </div>
                ';
              }
                


                $data[] = $row;
              }

              $output = array(
                      "draw" => $_POST['draw'],
                      "recordsTotal" => $this->invoice_model->count_all($user_id),
                      "recordsFiltered" => $this->invoice_model->count_filtered($user_id),
                      "data" => $data,
                  );
              //output to json format
              echo json_encode($output);
  }

         function po_invoice()
         {
          $id=$this->session->userdata('user_id');
          $user_id=$id->id;
            $this->load->model('invoice_model'); //Load Model
           $po_invoice= $this->invoice_model->po_invoice();

           $this->load->view('po_invoice',['po_invoice'=>$po_invoice]); //Load View
      }


         /***************************EDIT INVOICE DATA************ */
         function edit_invoice()
         {
              $id=$this->session->userdata('user_id');
              $user_id=$id->id;
              $this->load->helper('form'); //Load Form Helper
              $id=$this->input->post('invoice_id');   // Get Input from Form fields
                if(isset($id) && !empty($id))
                {
                  $this->load->model('invoice_model');  //Load MOdel
                  $records = $this->invoice_model->edit_invoice($id,$user_id);
                  $this->load->view('invoice_ajax/edit_invoice_ajax',['records'=>$records]);  //Load View that is in seprate folder
                      
                }
     }



            //view Invoice on click **View INvoice** in seprate folder//

         function view_invoice()  
         {
            $id=$this->session->userdata('user_id');
            $user_id=$id->id;
             $id=$this->input->post('invoice_id');  //Get Input data from form fileds
             $this->load->model('invoice_model');   //Load MOdel

            $records= $this->invoice_model->view_invoice($id, $user_id);
            $this->load->view('invoice_ajax/view_invoice_ajax',['records'=>$records]);  //Load View ajax request that is in folder  


         }


          //Updare Invoice Data

         function update_invoice(){
          $id=$this->session->userdata('user_id');
          $user_id=$id->id;
              $data= $this->input->post();  // get input data in array

              $this->load->model('invoice_model');  //Load Model
              $this->invoice_model->update_invoice($data, $user_id);

     }



            //Report

          function report() 
          {
            $this->load->view('report');
          }




          function make_invoice() //Make Invoice 
          {
            $id=$this->session->userdata('user_id');
            $user_id=$id->id;
             $data=$this->input->post();  //get data into array
              $this->load->model('invoice_model');  //load model
             $this->invoice_model->make_invoice($user_id);

          }




          function get_PoCode_in_invoice()
          {
            $id=$this->session->userdata('user_id');
            $user_id=$id->id;
            $this->load->model('invoice_model');  //load model
            $po_code= $this->invoice_model->get_PoCode_in_invoice($user_id);
            $this->load->view('invoice_ajax/get_PoCode_in_invoice_ajax',['po_code'=>$po_code]); //load view
          
          }







          function date_wise_search()     //Just Practise
          {
              $this->load->model('invoice_model');
              $this->invoice_model->po_invoice();
          }





          function get_PoCode_item()
          {
            $id=$this->session->userdata('user_id');
            $user_id=$id->id;
            $po_code=$this->input->post('datapost');
               $this->load->model('invoice_model');
              $result=$this->invoice_model->get_PoCode_item($po_code,$user_id);
              $this->load->view('invoice_ajax/get_PoCode_item_ajax',['result'=>$result]);
              
    }




            //Auto Po_code Generate Auto Po Code

          function auto_po_invoice(){ 
            $id=$this->session->userdata('user_id');
            $user_id=$id->id;
            $row= $this->db->query('SELECT COALESCE(MAX(id), 0) as id FROM po_invoice where user_id = "'.$user_id.'"')->row();
              $id= $row->id;
              if($id==0)
              {
               $last_word=$id;
              }else
              {
                $row=$this->db->select('invoice_code')->where('user_id',$user_id)->where('id',$id)->get('po_invoice')->row();
                $invoice_code= $row->invoice_code;
                $pieces = explode(' ', $invoice_code);
                      $last_word = array_pop($pieces);
                      $last_word=(int)$last_word;
                      
              
              }
              ?>
              <input type="text" readonly required="" name="invoice_code" value="<?='INPO'.date("dny").' '.$last_word+=1?>" class="form-control"  id="invoice_code">
            
             <?php 
          }


          public function store_detail(){
            $id=$this->session->userdata('user_id');
            $user_id=$id->id;
            $this->load->model('invoice_model');
              $result=$this->invoice_model->store_detail($user_id);
              if(empty($result)){
                ?>
                <a href="<?php echo base_url("store_controller/index");?> ">Click!! Add Store First</a>
              <?php
                echo ' <div class="form-group">
                 <label required="true" for="store">Select Store:</label>
                 <select class="form-control" required="true" id="store" name="store">';
                 
              }else{
                ?>
               <div class="form-group">
                 <label required="true" for="store">Select Store:</label>
                 <select class="form-control" required="true" id="store" name="store">
                   <option></option>
                 <?php foreach($result as $data){
                   echo '<option id="'.$data["id"].'" value="'.$data["id"].'">'.$data["name"].'</opotion>';
                 }?>
                   
                 </select>
               </div>
                <?php
              }
           
          }


          function export_csv()
          {
            $id=$this->session->userdata('user_id');
            $user_id=$id->id;
            $filename = 'PO-Invoice_'.date('Ymd').'.csv'; 
            header("Content-Description: File Transfer");
            header("Content-Disposition: attachment;filename=$filename");
            header("Content-Type: application/csv; ");

                         
                              $this->load->model('invoice_model'); //Load MOdel
                              $userData=$this->invoice_model->export_csv($user_id);

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

              //Import CSV
          // function import_csv()
          //     {
          //       $this->load->library('csvimport');  //Load Library

          //       $file_data=$this->csvimport->get_array($_FILES["csv_file"]["tmp_name"]);
          //       foreach ($file_data as $row) {
                  
          //         $data[]=array(
          //           'user_id'=>$row['id'],
          //           'ip_address'=>$row['Invoice Code'],
          //           'last_login'=>$row['Item Code'],
                   
          //         );

          //       }
               
          //       $this->load->model('invoice_model');
          //       $this->invoice_model->insert_data($data);

          //     }

                 function import_csv(){
                        $id=$this->session->userdata('user_id');
                        $user_id=$id->id;
                        $this->load->model('invoice_model'); /// load it at beginning 
                        $this->load->library('csvimport');  //Load Library

                        $file_data=$this->csvimport->get_array($_FILES["csv_file"]["tmp_name"]);
                        foreach ($file_data as $row){

                          $total= $row['Item Qty']*$row['Item Rate'];
                          $invoice_total=$total-(($row['Discount']/100)*$total);
                            $data = array(
                              'id'=>$row['id'],
                              'invoice_code'=>$row['Invoice Code'],
                        
                              'item_code'=>$row['Item Code'],
                              'item_rate'=>$row['Item Rate'],
                              'item_qty'=>$row['Item Qty'],
                              'discount'=>$row['Discount'],
                              'item_total'=>$invoice_total,
                              'date'=>$row['Date'],
                        );

                        $data2  = array(
                          'invoice_total'   =>$invoice_total,
                        );
                      // in order to insert or update ... you cannot use insert batch ....  
                      // pass it one by one 
                      $this->invoice_model->insert_update_data($data,$data2,$user_id);
                      }
  
 
           //  $this->invoice_model->insert_data($data);

  }       

        //Check Session if Session else Redirect Login

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