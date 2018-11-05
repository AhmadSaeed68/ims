<?php
    class Order_model extends CI_Model{
        function order_managment(){
            $data=$this->db
            ->query('SELECT * FROM purchase_order '
                    // . ' LEFT JOIN purchase_order_detail '
                    // . ' ON purchase_order_detail.po_code = purchase_order.po_code'
                    . ' ');
return $data->result_array();

        }

        function edit_order($order_id){
           //$result= $this->db->query('SELECT * FROM purchase_order inner JOIN purchase_order_detail ON purchase_order_detail.id=purchase_order.id');
          $result= $this->db->select('')
          ->from('purchase_order')
          ->join('purchase_order_detail','purchase_order_detail.po_code=purchase_order.po_code','inner')
                        ->where('purchase_order.po_code',$order_id)

                    ->get('');
                return $result->result_array();

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
        ->get();

    return $asset->result_array();
      }

      function make_order(){


        $po_code=$this->input->post('po_code');
        $po_desc=$this->input->post('po_desc');
        $data[]= array(
            'po_code'=>$po_code,
            'po_description'=>$po_desc,

            );

            // print_r($data);
             $this->db->insert_batch('purchase_order', $data);








        $id=$this->db->insert_id();

    $this->db->select('po_code');
    $this->db->where('id',$id);
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
    WHERE item_code = "'.$item_code[$i].'"');


    }
    $insert = count($data1);

    if($insert)
    {
    $this->db->insert_batch('purchase_order_detail', $data1);

    }
    $item_quantity=$this->input->post('item_quantity');
    $item_rate=$this->input->post('item_rate');


}
            function order_status($status){
                $order_code= $this->input->post('order_code');
                $status;
            $update_status= $this->db
                ->where('po_code', $order_code)
                ->set('status', $status)
                ->update('purchase_order_detail');
                $update_status_2= $this->db
                ->where('po_code', $order_code)
                ->set('po_status', $status)
                ->update('purchase_order');
                if($update_status){
                    echo "Status Changed";
                }
            }

    }
?>