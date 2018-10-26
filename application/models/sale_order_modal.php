<?php 
/**
 * 
 */
class Sale_order_modal extends CI_Model
{

   function sales_order(){
           $data=$this->db
            ->query('SELECT sale_order_detail.id,sale_order.so_status, sale_order_detail.profit,sale_order_detail.so_code,sale_order_detail.item_code,sale_order_detail.item_qty,sale_order_detail.item_rate,sale_order_detail.so_item_total,sale_order_detail.invoice_code,sale_order.so_code,sale_order.customer_name FROM sale_order_detail LEFT JOIN sale_order ON sale_order.so_code=sale_order_detail.so_code');
return $data->result_array();

        }

	
	function get_item_code_in_so()
	{
		 $asset=$this->db
        ->select(['item_code'])
        ->from('items_in_stock')
        ->get();

    return $asset->result_array();
      }

      function get_invo_in_so($item_code){
      	 $asset=$this->db
        ->select(['invoice_code'])
        ->from('items_in_stock')
        ->where('item_code',$item_code)
        ->get();

    return $asset->result_array();
      }

      function invoice_data($invoice_code){
      	$asset=$this->db
        ->select(['item_qty','item_rate'])
        ->from('items_in_stock')
        ->where('invoice_code',$invoice_code)
        ->get();

    return $asset->result_array();
      }

      function make_so(){
       $so_code=$this->input->post('so_code');
        $business_name=$this->input->post('cstr_name');
        $ntn_no=$this->input->post('ntn_no');
        $email=$this->input->post('email');
        $contact=$this->input->post('contact');
        $address=$this->input->post('address');


         $item_code=$this->input->post('item_code');
       $invoice_code=$this->input->post('invoice_code');
       $item_rate=$this->input->post('item_rate');
        $item_qty=$this->input->post('item_qty');
        $profit=$this->input->post('profit');
       $total=$this->input->post('total');
         $date=$this->input->post('date');
     //     print_r($item_code);

     //                                              // **INsert Data into batch in Sale_order 
     //                                            // and Than get last inset ID

        $data[]=array(
          'so_code'=>$so_code,
          'customer_name'=>$business_name,
          
          
        );
          $this->db->insert_batch('sale_order', $data);

                                                            // Get last insert id/*


      $last_id=$this->db->insert_id();   

                                                            // get_data_from_sale Order_by_last_insert Id


     $result= $this->db->select('so_code')
                ->where('id',$last_id)
                ->get('sale_order')
                ->result_array();

                foreach($result as $data){
                  $inst_so_code=$data['so_code'];
                }
                

                                                        

                                                              // count item_code for insert data into multiple coloumn with same so_code
  
          $temp=count($item_code);
     
                                            
             for($i=0;$i<$temp;$i++){

              $data1[]=array(
               
                'so_code'=> $inst_so_code,
                
                'item_code'=>$item_code[$i],
                'item_qty'=>$item_qty[$i],
                'item_rate'=>$item_rate[$i],
                'so_item_total'=>$total[$i],
                'profit'=>$profit[$i],
              );

                                                                       // INSERT DATA THROUGH BATCH 

              $insert = count($data1);
              if($insert){
                $this->db->insert_batch('sale_order_detail',$data1);

                                                                   // INSERT CUSTOMER DETAIL IN SO_CUSTOMER_DETAIL WITH SO_CODE

                  $data=array(
                'so_code' =>$so_code,
                  'business_name' =>$business_name,
                  'ntn_no' =>$ntn_no,
                   'email'=>$email,
                  'contact' =>$contact,
                   'address'=> $address,
                );

                 $this->db->insert('so_customer_detail',$data);
              

               
              }

             }     
       }


       function view_so($so_code){

           $data=$this->db
            ->query('SELECT sale_order.so_code,sale_order.customer_name,sale_order_detail.item_code,sale_order_detail.item_qty,sale_order_detail.item_rate,sale_order_detail.date,sale_order_detail.so_item_total,sale_order_detail.profit FROM sale_order_detail LEFT JOIN sale_order ON sale_order_detail.so_code=sale_order.so_code WHERE sale_order.so_code="'.$so_code.'"');
      return $data->result_array();
       }

       function edit_so($so_id){
           $data=$this->db
            ->query('SELECT sale_order_detail.id,sale_order_detail.date,sale_order.so_status, sale_order_detail.profit,sale_order_detail.so_code,sale_order_detail.item_code,sale_order_detail.item_qty,sale_order_detail.item_rate,sale_order_detail.so_item_total,sale_order_detail.invoice_code,sale_order.so_code,sale_order.customer_name FROM sale_order_detail LEFT JOIN sale_order ON sale_order.so_code=sale_order_detail.so_code');
        return $data->result_array();
       }





       function update_so(){ 
        $item_code=$this->input->post('item_code');
          $item_rate=$this->input->post('item_rate');
           $item_qty=$this->input->post('item_qty');
            $profit=$this->input->post('profit');
             $customer_name=$this->input->post('customer_name');
              $so_code=$this->input->post('so_code');
                            // Calculate Profit and Item Total

              $total=($item_qty*$item_rate);
             $so_item_total=$total+(($profit/100)*$total);

                          // Calculate Total
             $data=array(
              'customer_name'=>$customer_name,
             );

             $data1=array(
              'item_code'=>$item_code,
              'item_qty'=>$item_qty,
              'profit'=>$profit,
              'so_item_total'=>$so_item_total,
             );

             $q1=$this->db
                          ->where('so_code',$so_code)
                          ->update('sale_order',$data);

              $q2=$this->db
                          ->where('so_code',$so_code)
                          ->where('item_code',$item_code)
                          ->update('sale_order_detail',$data1);

                          if($q1 and $q2){
                            echo"Update Successfuly";
                          }else{
                            echo"Some Error in Database line no 170";
                          }


              
           
       }

       function so_status($status){
               $so_code= $this->input->post('so_code');
              $status;
            $update_status= $this->db
                ->where('so_code', $so_code)
                ->set('so_status', $status)
                ->update('sale_order');
                $update_status_2= $this->db
                ->where('so_code', $so_code)
                ->set('status', $status)
                ->update('sale_order_detail');
                if($update_status){
                    echo "Status Changed";
                    
                }  
            }
	}

 ?>