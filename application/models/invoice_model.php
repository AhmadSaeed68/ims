<?php
    class Invoice_model extends CI_Model{

        function po_invoice(){
            //         $data=$this->db
            //         ->query('SELECT * FROM po_invoice inner JOIN po_invoice_detail ON po_invoice.invoice_code=po_invoice_detail.invoice_code ');
            // return $data->result_array();
            
            $result= $this->db->select('')
            ->from('po_invoice')
            //->join('po_invoice_detail','po_invoice.invoice_code=po_invoice_detail.invoice_code','inner')
                       //->order_by('po_invoice.id','desc')   
                         
                      ->get('');
                  return $result->result_array();
            
            
                }
                function view_invoice($id){
                    $result= $this->db->select('')
                      ->from('po_invoice_detail')
                      ->join('po_invoice','po_invoice_detail.invoice_code=po_invoice.invoice_code','inner')
                                    ->where('po_invoice.id',$id)
                                   
                                ->get('');
                            return $result->result_array();
                            
                }
            
                function edit_invoice($id){
                    $result= $this->db->select('')
                      ->from('po_invoice_detail')
                      ->join('po_invoice','po_invoice_detail.invoice_code=po_invoice.invoice_code','inner')
                                    ->where('po_invoice.id',$id)
                                   
                                ->get('');
                            return $result->result_array();
                }
            
                function update_invoice($data){
                    $id=$this->input->post('id');
                    $po_code=$this->input->post('po_code');
                    $invoice_code=$this->input->post('invoice_code');
                   $invoice_total=$this->input->post('item_qty')*$this->input->post('item_rate');
                   $invoice_description=$this->input->post('invoice_description');
                  $item_code= $this->input->post('item_code');
            
                    $item_qty=$this->input->post('item_qty');
                    $item_rate=$this->input->post('item_rate');
                    $data1 = array(
                   
                        'item_rate' => $item_rate,
                        'item_qty'=>$item_qty,
                        'item_code'=>$item_code
                      
                        
                        
                    );
                    
                    
                    $data2 = array(
                        'invoice_description' => $invoice_description,
                        'po_code'=>$po_code,
                        'invoice_total'=>$item_rate*$item_qty
                     );
            
              $q2=$this->db->where('id', $id)
                                ->update('po_invoice', $data2);
                                $q1= $this->db->where('invoice_code',$invoice_code)
                                                ->where('item_code',$item_code)
                                 ->update('po_invoice_detail',$data1) ;
            // if($q1&$q2){
            // echo 'success';
            // }else{
            //   echo 'some errror';  
            // }
                }
            
                function get_PoCode_in_invoice(){
                    $asset=$this->db
                    ->select(['po_code','id'])
                    ->where('po_status','active')
                    ->where('order_report','pending')
                    ->from('purchase_order')
                    ->get();
                    
                return $asset->result_array();
                }
            
                function get_PoCode_item($po_code){
                    $result= $this->db->select('')
                    ->from('purchase_order')
                    ->join('purchase_order_detail','purchase_order_detail.po_code=purchase_order.po_code','inner')
                                  ->where('purchase_order_detail.po_code',$po_code)
                                 
                              ->get('');
                          return $result->result_array();
            
                        }
            
                        function make_invoice(){
                    $po_code=$this->input->post('po_code');
                    $invoice_code=$this->input->post('invoice_code');
                    $invoice_description=$this->input->post('invoice_description');
                    $item_quantity=$this->input->post('item_quantity');
                    $item_rate=$this->input->post('item_rate');
                    $item_code=$this->input->post('item_code');
                    $discount=$this->input->post('discount');
                    // if($discount>0){
                    //   // print_r($discount);
                    //   $invoice_total= $item_quantity*$item_rate;
                    //    $invoice_total=$invoice_total-(($discount/100)*$invoice_total);
                    // }else{
                    // $invoice_total= $item_quantity*$item_rate;
                    // }
                
                    $data1[]=array(
                        'po_code'=>$po_code,
                        'invoice_code'=>$invoice_code,
                        
                        'invoice_description'=>$invoice_description
                        
                    );
            
                  
                    
            
                    $q1= $this->db->insert_batch('po_invoice',$data1);
            
                    //************Get Last 
                    //                   Insert ID*********
            
                    $id= $this->db->insert_id();
            
                    //************GEt Data from 
                    //                         po_invoice Table  
                    //                                          by last Insert ID*********
                    $this->db->select('invoice_code');
                    $this->db->where('id',$id);
                    $res2 = $this->db->get('po_invoice');
                    $res2= $res2->result_array();
                    foreach($res2 as $data){
                    $last_insert_invoice_code= $data['invoice_code'];
                    }
                    /**GEt Last PO_CODE AND UPDATE ORDER TO BLOCKED */
                    $this->db->select('po_code');
                    $this->db->where('id',$id);
                    $res2 = $this->db->get('po_invoice');
                    $res2= $res2->result_array();
                    foreach($res2 as $data){
                    $last_poCode= $data['po_code'];
                    }
                    $this->db->where('po_code', $last_poCode);
            $this->db->update('purchase_order', ['order_report'=>"recived"]);
            $this->db->where('po_code', $last_poCode);
            $this->db->update('purchase_order_detail', ['order_report'=>"recived"]);  
                     $last_insert_invoice_code;
            
            
                    //**********Insert Data into 
                    //                            another table  by getting 
                            //                                 last insert id and  and invoice_code ***********
                            $item_code=$this->input->post('item_code');
                            
                            //******Count data from  item_code in INVOICE*****
                            $temp = count($item_code);
                            for($i=0; $i<$temp; $i++){
                              
                                $discount=$this->input->post('discount');
                                $item_quantity=$this->input->post('item_quantity');
                                $item_rate=$this->input->post('item_rate');
                                $item_code=$this->input->post('item_code');
            
                                //****Calculate IF Discount */
                                if($discount[$i]>0){
                                     
                                       $item_total= $item_quantity[$i]*$item_rate[$i];
                                        $item_total=$item_total-(($discount[$i]/100)*$item_total);
                                     }else{
                                     $item_total= $item_quantity[$i]*$item_rate[$i];
                                     }
            
                                     //**End CALCULATE DISCOUNT */
            
                                        $data2[]=array(
                                    'invoice_code'=>$last_insert_invoice_code,
                                    'item_code'=>$item_code[$i],
                                    'item_qty'=>$item_quantity[$i],
                                    'item_rate'=>$item_rate[$i],
                                    'discount'=>$discount[$i],
                                    'item_total'=>$item_total,
                        
                    );
                                    $update_data[]=array(
                                        'item_code'=>$item_code[$i],
                                        'item_qty'=>$item_quantity[$i],
                                    );

                                    $stock_data[]=array(
                                        'invoice_code'=>$last_insert_invoice_code,
                                        'po_code'=>$po_code,
                                        'item_code'=>$item_code[$i],
                                        'item_qty'=>$item_quantity[$i],
                                        'item_rate'=>$item_rate[$i],
                                    );
                  
                    
                                  
                            }
            
                            //**Check IF process Successful RUN  */
                            $insert = count($data2);
                      
                            if($insert)
                            {
                                //** INSERT BATCH DATA INTO DATABASE */
                            $this->db->insert_batch('po_invoice_detail', $data2);
                          
                      
                            echo"Invoice Make Successful";
                            }else{
                                       echo'Error in database MOdal->: line no:499 get_PoCode_item';
                                    }
                                    $stock=count($stock_data);
                                    if($stock){
                                        $this->db->insert_batch('items_in_stock', $stock_data);
                                        $id=$this->db->insert_id();
                                    }
            
            
            
            
                            
                           
                        }
    }
?>