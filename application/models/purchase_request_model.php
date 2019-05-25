<?php
    class purchase_request_model extends CI_Model{

        var $table = 'purchase_request';
    var $column_order = array(null, 'item_qty','date','department_name','review','item_code'); //set column field database for datatable orderable
    var $column_search = array('item_qty','department_name','status','review','item_qty','date'); //set column field database for datatable searchable 
    var $order = array('id' => 'desc'); // default order 

    private function _get_datatables_query()
    {
        
        //add custom filter here
        $to_date="";
        $from_date="";
        
        if($this->input->post('to_date'))
        {
            $to_date = $this->input->post('to_date');
        }
       
        if($this->input->post('from_date'))
        {
            $from_date = $this->input->post('from_date');
        }

        if($to_date != "" && $from_date != ""){
            $cond = "po_date` BETWEEN '$from_date' And '$to_date' ";
            $this->db->where($cond);

        }
        $this->db->from($this->table);
        $i = 0;
    
        foreach ($this->column_search as $item) // loop column 
        {
            if($_POST['search']['value']) // if datatable send POST for search
            {
                
                if($i===0) // first loop
                {
                    //$this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                }
                else
                {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if(count($this->column_search) - 1 == $i); //last loop
                    //$this->db->group_end(); //close bracket
            }
            $i++;
        }
        
        if(isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } 
        else if(isset($this->order))
        {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }


    public function get_datatables($user_id)
    {
        $this->_get_datatables_query();
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->where('user_id',$user_id)->get();
        return $query->result();
    }

    public function count_filtered($user_id)
    {
        $this->_get_datatables_query();
        $query = $this->db->where('user_id',$user_id)->get();
        return $query->num_rows();
    }

    public function count_all($user_id)
    {
        $this->db->where('user_id',$user_id)->from($this->table);
        return $this->db->where('user_id',$user_id)->count_all_results();
    }


                //Ajax JSON END//
        //****************************************//
        //**Get department_model */
        function get_department_in_request($user_id){
            $query=$this->db
            ->select(['department','id'])
            ->from('department')
            ->where('user_id',$user_id)
            ->get();
    
        return $query->result_array();
          }

          function get_items($user_id){
            $asset=$this->db
            ->select(['item_code','item_code','item_id'])
            ->group_by('item_code')
            ->from('items')
            ->where('user_id',$user_id)
            ->get();
    
        return $asset->result_array();
          }

          public function make_request($user_id)
          {
            $department=$this->input->post('department');
            $temp = count($department);
            for($i=0; $i<$temp; $i++){
                $department=$this->input->post('department');
                $item_code=$this->input->post('item_code');
                $item_quantity=$this->input->post('item_quantity');
                $data[] = array(
                    'department_name'   =>  $department[$i],
                    'item_code'         =>  $item_code[$i],
                    'item_qty'          =>  $item_quantity[$i],
                    'user_id'           => $user_id,
                    );
                     
            }
            $this->db->insert_batch('purchase_request', $data);
          }

          public function request_action($user_id)
          {
              $query=$this->db
                          ->select('*')
                          //->from('purchase_request')
                          ->where('user_id',$user_id)
                          ->where('status','pending')
                          ->or_where('status','processing')
                         
                          ->get('purchase_request');
                         
              return $query->result();
          }

          public function action_on_request($user_id)
          {
            
               $id = $this->input->post('id');
               $item_code = $this->input->post('item_code');
               $item_qty = $this->input->post('item_qty');
               $review = $this->input->post('review');

               $data = array(
                'review' => $review,
                'status' => 'success',
                'item_qty' => $item_qty
               
                );
        
            $q1 = $this->db->where('user_id',$user_id)->where('id', $id)
           ->update('purchase_request', $data);
           if($q1)
           {
           $q2= $this->db
                    ->where('user_id',$user_id)
                    ->where('item_code',$item_code)
                     
                    ->set('item_qty', 'item_qty-'.$item_qty, FALSE)
                    ->update('items_in_stock');
           }

           if(!$q1 and $q2)
           {
               echo "Some Error in QuerySystem";
           }


          }
           public function delete_request_1()
          {
        
             $id=$this->input->post('id');
            
            //   $query=$this->db
            //   ->where('id',$id)
            //   ->delete('purchase_request');
            //                 ->delete('purchase_request');
                            
            //                 return $query;
          }

          public function rqst_po($user_id)
          {
            $data = array(
                'review' => 'In Processing',
                'status' => 'processing',
                
               
                );
             $id1=$this->input->post('id');
                //Generate POCode
             $row= $this->db->query('SELECT COALESCE(MAX(id),0) as id FROM purchase_order where user_id="'.$user_id.'"')->row();


                        $id= $row->id;
              if($id==0)
              {
               $last_word=$id;
              }else

              {
                $row=$this->db->select('po_code')->where('user_id',$user_id)->where('id',$id)->get('purchase_order')->row();
                $po_code= $row->po_code;
                $pieces = explode(' ', $po_code);
                      $last_word = array_pop($pieces);
                      $last_word=(int)$last_word;
              }



              
             $q1= $this->db->select(['item_code','department_name','item_qty'])
                             ->where('user_id',$user_id)
                           ->where('id',$id1)
                            ->from('purchase_request')
                            ->get()->row();
                            $item_code = $q1->item_code;
                            $dep_name = $q1->department_name;
                            $item_qty = $q1->item_qty;
                       
              
                            $data2 = array(
                                'po_vendor' => 'dept '.$dep_name,
                                'po_code'   => 'PO'.date("dny").' '.$last_word+=1,
                                'po_description' => 'This generated from '.$dep_name.' Dept',);
                            $data3 = array(
                                'item_code' =>  $item_code,
                                'po_code'   => 'PO'.date("dny").' '.$last_word+=1,
                                'item_qty' => $item_qty,);
                          $q1= $this->db->insert('purchase_order',$data2);
                          if($q1){
                            $q2= $this->db->insert('purchase_order_detail',$data3);

                            if($q2){
                                $q3 = $this->db->where('user_id',$user_id)->where('id', $id1)
                                ->update('purchase_request',['status'=>'processing']);
                                if($q3){
                                    echo "PO Requested Successfully";
                                }
                            }

                          }
          }
          public function delete_request($user_id)
          {
            

            $id=$this->input->post('id');
              $query=$this->db
                ->where('user_id',$user_id)
                ->where('id',$id)
                ->delete('purchase_request');
                            
            //                 return $query;
          }

          function get_Item_Qty($user_id){

            $dept=$this->db
                            ->select('item_code')
                            ->from('purchase_request')
                            ->where('user_id',$user_id)
                            ->get('')
                          ->result_array();
                          if(empty($dept)){
                            return "No Request Available";
                        }else{
                            foreach($dept as $da)
                            {
                            
                             $d[]= $da['item_code'];
                            
                       
                            } 
                      $result = array_unique($d);
     
                      $da=$this->db
                                 ->select_sum('item_qty')
                                 ->select('item_code')
                                 ->from('items_in_stock')
                                 ->where('user_id',$user_id)
                                 ->where_in('item_code',$result)
                                 ->get();
                                 return $da->result_array();
                        }
                      
                       
                  
                   
          
            
               
                    
                      
                    
                        
       
        

                    //     $query=$this->db
                    // ->select('item_code')
                    // ->  get('purchase_request');
                    
                    // $data= $query->result_array();
                    // foreach($data as $data)
                    // {
                    //  $dat=$data['item_code']; 
                    //  $query=$this->db
                    // ->select('item_qty')
                    
                    // ->where('item_code',$dat[2])
                    // ->get('items_in_stock');
                    // return $query->result_array();
                    
                    // }
                    
                    // $temp = count($data);
                    // for($i=0; $i<$temp; $i++)
                    // {
                        
                    // }

          }
          function item_code_value($item_code, $user_id)
          {
            $data=$this->db
        					->select('item_qty,item_code')
                            ->from('items_in_stock')
                            ->where('user_id',$user_id)
        					->where('item_code',$item_code)
                            ->get('');
                            if($data->num_rows() > 0){
                                $data =  $data->row();
                                return array("item_qty"=>$data->item_qty,"item_code"=>$data->item_code);
                            }else{
                                return array("item_qty"=>"0","item_code"=>"$item_code");
                            }
                            
                            
          }
    }
        ?>