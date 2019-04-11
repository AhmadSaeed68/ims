<?php 
/**
 * 
 */
class Sale_order_modal extends CI_Model
{

   function sales_order(){
           $data=$this->db
            ->query('SELECT sale_order_detail.id,sale_order_detail.date as date,sale_order.customer_name,sale_order.so_status, sale_order_detail.profit,sale_order_detail.so_code,sale_order_detail.item_code,sale_order_detail.item_qty,sale_order_detail.item_rate,sale_order_detail.so_item_total,sale_order_detail.invoice_code,sale_order.so_code,sale_order.customer_name FROM sale_order_detail LEFT JOIN sale_order ON sale_order.so_code=sale_order_detail.so_code ORDER BY sale_order.id desc');
return $data->result_array();

        }

	
	function get_item_code_in_so()
	{
  		 $asset=$this->db
          ->select(['item_code'])
          ->from('items_in_stock')
          ->where('item_qty >','0')
          ->get('');

      return $asset->result_array();
      }

      function get_invo_in_so($item_code)
      {
        	 $asset=$this->db
          ->select(['invoice_code'])
          ->from('items_in_stock')
          ->where('item_code',$item_code)
          ->get();

      return $asset->result_array();
      }

      function invoice_data($invoice_code)
      {
        	$asset=$this->db
          ->select(['item_qty','item_rate'])
          ->from('items_in_stock')
          ->where('invoice_code',$invoice_code)
          ->get();

      return $asset->result_array();
      }

      function get_users_in_so()
      {
        $data=$this->db
                        ->select('business_name')
                        ->select('id')
                        ->from('user_inform')
                        ->get('');
                        return $data->result_array();
      }

      function city_on_change($business_name_id){
        $data=$this->db
                        ->select('*')
                        ->from('user_inform')
                        ->where('id',$business_name_id)
                        ->get('');
                      return $data->result_array();
      }

      function make_so(){
       
       $so_code=$this->input->post('so_code');
        $business_name=$this->input->post('business_name');
          $city=$this->input->post('city');
        $ntn_no=$this->input->post('ntn');
        $email=$this->input->post('email');
        $contact=$this->input->post('contact');
        $address=$this->input->post('address');
        $user_inform_id=$this->input->post('id');

         $item_code=$this->input->post('item_code');
       $invoice_code=$this->input->post('invoice_code');
       $item_rate=$this->input->post('item_rate');
        $item_qty=$this->input->post('item_qty');
        $profit=$this->input->post('profit');
       $total=$this->input->post('total');
         $discount=$this->input->post('discount');


                                                //   **INsert Data into batch in Sale_order 
                                                // and Than get last inset ID
                          $tem=count($item_code);
                          for($i=0;$i<$tem;$i++)
                          {
                            $data[]=array
                                       (
                                          'so_code'=>$so_code,
                                          'customer_name'=>$business_name,
                                          //'invoice_code'=>$invoice_code[$i],
                                        );

                            $this->db->insert_batch('sale_order', $data);

           
                            }




 
                                                  // Get last insert id/*
                                                  $last_id=$this->db->insert_id();  



                                                // get_data_from_sale Order_by_last_insert Id
                                                  $result= $this->db
                                                          ->select('so_code')
                                                         // ->select('invoice_code')
                                                          ->where('id',$last_id)
                                                          ->get('sale_order')
                                                           ->result_array();



                              //Get so_code and invoice_code from last inst id                            

                                foreach($result as $data)
                              {
                                $inst_so_code=$data['so_code'];
                               // $last_invoice_code=$data['invoice_code'];
                              }
               
                

                                                        

        // count item_code for insert data into multiple coloumn with same so_code
          $temp=count($item_code);
          for($i=0;$i<$temp;$i++)
          {
            $data1[]=array
            (
                'so_code'=> $inst_so_code,
                //'invoice_code'=>$last_invoice_code,
                'item_code'=>$item_code[$i],
                'item_qty'=>$item_qty[$i],
                'item_rate'=>$item_rate[$i],
                'so_item_total'=>$total[$i],
                'profit'=>$profit[$i],
                'discount'=>$discount[$i]
              );

                $insert = count($data1);
              if($insert){
                $this->db->insert_batch('sale_order_detail',$data1);
             

                                            // INSERT CUSTOMER DETAIL IN SO_CUSTOMER_DETAIL WITH SO_CODE
                                                $data=array
                                                (
                                                    'so_code' =>$so_code,
                                                    'business_name' =>$business_name,
                                                    'ntn' =>$ntn_no,
                                                     'email'=>$email,
                                                      'contact' =>$contact,
                                                     'address'=> $address,
                                                     'city'=>$city,
                                                     'user_inform_id'=>$user_inform_id,
                                                  );

             $insert2= $this->db->insert('so_customer_detail',$data);
              if($insert2)
              {
                echo "Sale Order Successfully .SO CODE: ".$so_code;

                $temp2=count($item_code);
              for($i=0;$i<$temp2;$i++)
              {

                      //data2[] so_invoic insert
                      $data2[]=array
                      (
                      'so_code'=>$so_code,
                      //'invoice_code'=>$invoice_code[$i],
                      );


                          //data3[] so_invoic_detail
                          $data3[]=array
                          (
                           // 'invoice_code'=>$invoice_code[$i],
                            'item_code'=>$item_code[$i],
                            'item_qty'=>$item_qty[$i],
                            'item_rate'=>$item_rate[$i],
                            'item_total'=>$total[$i],
                            'profit'=>$profit[$i],
                          );

                         

                    $this->db->insert_batch('so_invoice',$data2);
                    $this->db->insert_batch('so_invoice_detail',$data3);
                 $this->db
                    ->where('item_code',$item_code[$i])
                    // ->where('invoice_code',$invoice_code[$i])
                    ->set('item_qty', 'item_qty-'.$item_qty[$i], FALSE)
                    ->update('items_in_stock');
    

              }
                }
              

               
              }

             }     

       }


       function view_so($so_code){

           $data=$this->db
            ->query('SELECT sale_order.so_code,sale_order.invoice_code,sale_order.customer_name,sale_order_detail.item_code,sale_order_detail.item_qty,sale_order_detail.item_rate,sale_order_detail.date,sale_order_detail.so_item_total,sale_order_detail.profit FROM sale_order_detail LEFT JOIN sale_order ON sale_order_detail.so_code=sale_order.so_code WHERE sale_order.so_code="'.$so_code.'"');
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

       function item_data($item_code)
       {
            //Select Sales Profile
          $data=$this->db
          ->select('sale_pattern')
          ->from('sales_profile')
          ->get('')->row();

             //Select_sum item qty
        $item=$this->db
        
        ->select_sum('item_qty')
        ->from('items_in_stock')
        ->where('item_code',$item_code)
        ->get()->row();

        $pattern = $data->sale_pattern;

          //Select Data According to sales_profile
          if($pattern === 'fifo')
          {
          $dat = $this->db->select('item_rate')
            ->from('items_in_stock')
            ->where('item_code',$item_code)
            ->order_by('date', 'desc')
            ->limit(1)
            ->get('')->row();
            $price= $dat->item_rate;
          }
          else
          {
            $dat = $this->db->select('item_rate')
            ->from('items_in_stock')
            ->where('item_code',$item_code)
            ->order_by('date', 'asc')
            ->limit(1)
            ->get('')->row();
            $price=$dat->item_rate;
          }
       
        
    return  $result = [
          'item_rate' => $price,
          'item_qty' => $item->item_qty,
        ];
    
       
       


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

            function export_csv()
            {
                $response = array();
 
                // Select record
                $this->db->select('id,so_code,invoice_code,item_code,item_qty,item_rate,profit,so_item_total,so_report,date');
                $q = $this->db->get('sale_order_detail');
                $data = $q->result_array();
             
                return $data;
            }
	}

 ?>