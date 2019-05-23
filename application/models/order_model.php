<?php
    class Order_model extends CI_Model{

    //********************//
    //Ajax JSON START//

 var $table = 'purchase_order';
    var $column_order = array(null, 'po_code','po_total','po_date'); //set column field database for datatable orderable
    var $column_search = array('po_code','po_vendor','po_total','po_description','order_report'); //set column field database for datatable searchable 
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
        $this->db->where('user_id',$user_id)->limit($_POST['length'], $_POST['start']);
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
        
        $this->db->from($this->table)->where('user_id',$user_id);
        return $this->db->where('user_id',$user_id)->count_all_results();
    }


                //Ajax JSON END//
        //****************************************//




        function order_managment(){
            $data=$this->db
            ->query('SELECT * FROM purchase_order '
                    // . ' LEFT JOIN purchase_order_detail '
                    // . ' ON purchase_order_detail.po_code = purchase_order.po_code'
                    . ' ');
return $data->result_array();

        }

        function edit_order($order_id,$user_id){
           //$result= $this->db->query('SELECT * FROM purchase_order inner JOIN purchase_order_detail ON purchase_order_detail.id=purchase_order.id');
          $result= $this->db->select('')
          ->from('purchase_order')
          ->join('purchase_order_detail','purchase_order_detail.po_code=purchase_order.po_code','inner')
                        ->where('purchase_order.po_code',$order_id)
                        ->where('purchase_order.user_id',$user_id)
                        ->where('purchase_order_detail.user_id',$user_id)

                    ->get('');
                return $result->result_array();

        }
        function get_vendor(){
            $asset=$this->db
                    ->select(['vendor_name','id'])
                    ->where('status','active')
                    
                    ->from('vendors')
                    ->get();
                    
                return $asset->result_array();
        }

        function update_order(){

            $id= $this->input->post('id');
            $po_code= $this->input->post('po_code');
            $item_code= $this->input->post('item_code');
            $item_quantity= $this->input->post('item_quantity');
            $item_rate= $this->input->post('item_rate');
            $item_description= $this->input->post('item_description');
            $status= $this->input->post('status');

           $data1=array(
             'po_code'=>$po_code,
             'item_code'=>$item_code,
             'item_qty'=>$item_quantity,
             'item_rate'=>$item_rate,
             'po_item_total'=>$item_rate*$item_quantity,
             'status'=>$status,

           );
           $data2=array(
               'po_description'=>$item_description,
               'po_status'=>$status,
           );
           $upd1=  $this->db->where('id', $id)
   ->update('purchase_order_detail', $data1);
    $upd2= $this->db->where('po_code', $po_code)
     ->update('purchase_order', $data2);
     if($upd1 AND $upd2){
         echo"Update Successfuly";
     }else{
         echo"Some errors";
     }
        }

      function get_itemCode_in_order(){
        $asset=$this->db
        ->select(['item_name','item_code','item_id'])
        ->from('items')
        ->group_by('item_name')
        ->get();

    return $asset->result_array();
      }

      function make_order($user_id){


        $po_code=$this->input->post('po_code');
        $po_desc=$this->input->post('po_desc');
         $vendor=$this->input->post('vendor');
        $data[]= array(
            'po_code'   =>  $po_code,
            'po_description'    =>  $po_desc,
            'po_vendor' =>  $vendor,
            'user_id'   =>  $user_id,

            );

            // print_r($data);
             $this->db->insert_batch('purchase_order', $data);








        $id=$this->db->insert_id();

    $this->db->select('po_code');
    $this->db->where('id',$id)->where('user_id',$user_id);
    $res2 = $this->db->get('purchase_order');
    $res2= $res2->result_array();
    foreach($res2 as $data){
    $last_in_Po_code= $data['po_code'];
    }




    //$last_in_Po_code = array_column($res2, 'po_code');



    //

    //          PO Code Get after  Insert into *Purchase order*
    //
    //
    $item_code=$this->input->post('item_code');
      $item_quantity=$this->input->post('item_quantity');
      $temp = count($item_code);
      for($i=0; $i<$temp; $i++){



        $item_code=$this->input->post('item_code');
        $item_quantity=$this->input->post('item_quantity');
        $item_rate=$this->input->post('item_rate');

        $data1[] = array(
            'po_code'=>$last_in_Po_code,
            'user_id'   =>  $user_id,
            'item_code'=>$item_code[$i],
            'item_qty'=>$item_quantity[$i],
            'item_rate'=>$item_rate[$i],
            'po_item_total'=>$item_rate[$i]*$item_quantity[$i],

            );

                  /**
         *
         * UPDATE ITEMS when after Make
         * ORDER Remove Item QTY
         * ACORDING TO PO _ORDER
         *
         *
         * */
    $this->db->query('UPDATE items
    SET item_qty = item_qty-"'.$item_quantity[$i].'"
    WHERE item_code = "'.$item_code[$i].'" and user_id= "'.$user_id.'"');


    }
    $insert = count($data1);

    if($insert)
    {
    $this->db->insert_batch('purchase_order_detail', $data1);

       //***********************************************************************//
                                    //GET LAST VALUE FROM LAST INSERT BATCH DATE AND GET SUM VALUES OF ALL LAST PO DATA//
                                            //PROCESSING START//
                            //GET PO_CODE FROM LAST INSERT ID
                                        //
                                        //
                                        //*******GET LAST insert 
                                        //                      FROM PURCHASE_ORDER_DETAIL****************************
    $id2=$this->db->insert_id();

    $this->db->select('po_code');
    $this->db->where('id',$id2)->where('user_id',$user_id);
    $res3 = $this->db->get('purchase_order_detail');
    $res3= $res3->result_array();
    foreach($res2 as $data)
    {
        $last_in_Po_code2= $data['po_code'];
    }

                                            // SUM ALL PURCHASE ORDER FROM LAST ID and get From foreach

       $test=$this->db->query('SELECT SUM(po_item_total) as sum_value
            FROM purchase_order_detail WHERE po_code="'.$last_in_Po_code2.'" and user_id = "'.$user_id.'"')->result_array();

           foreach($test as $data)
           {
            $sum_data=$data['sum_value'];
           }

        $this->db
                ->where('po_code', $last_in_Po_code2)
                ->where('user_id',$user_id)
                ->set('po_total', $sum_data)
                ->update('purchase_order');

                            //*******************************************************//

                                             // PROCESS FINISH SUM VALUE and UPDATE into po_ORDER//
                            //******************************************//
                echo"****Purchase Order Successfuly***";

    }
    $item_quantity=$this->input->post('item_quantity');
    $item_rate=$this->input->post('item_rate');


}
            function order_status($status,$user_id){
                $order_code= $this->input->post('order_code');
                $status;
            $update_status= $this->db
                ->where('po_code', $order_code)
                ->where('user_id',$user_id)
                ->set('status', $status)
                ->update('purchase_order_detail');
                $update_status_2= $this->db
                ->where('po_code', $order_code)
                ->where('user_id',$user_id)
                ->set('po_status', $status)
                ->update('purchase_order');
                if($update_status){
                    echo "Status Changed";
                }
            }


            function data_search(){

                  $from_date= $this->input->post('from_date');
                    $to_date= $this->input->post('to_date');
                    $result= $this->db->query("SELECT * FROM `po_invoice` 
where invoice_date >= date('$from_date') and invoice_date <= date('$to_date')");
           
               
                  return $result->result_array();
            }

            function export_csv($user_id)
            {
                 
    $response = array();
 
    // Select record
    $this->db->select('id,po_code,po_vendor,po_total,po_description,order_report,po_date');
    $q = $this->db->where('user_id',$user_id)->get('purchase_order');
    $data = $q->result_array();
 
    return $data;
            }



               function insert_update_data($data)          //Add & Update table with "CSV"
                        {
                        //$this->db->insert_batch('user_track',$data);
                           $this->db->where('id',$data['id']);
                            $this->db->where('po_code',$data['po_code'])->where('user_id',$user_id);
                            $q = $this->db->get('purchase_order');
                             if($q->num_rows() > 0){
                              $this->db->where('id',$data['id']);
                              $this->db->where('po_code',$data['po_code'])->where('user_id',$user_id);
                              $this->db->update('purchase_order',$data);
                             } else {
                              $this->db->insert('purchase_order',$data);
                             }
                       }

    }
?>