<?php

    class Addprd extends CI_Model{

function db(){
    $conn = new mysqli("localhost", "root", "","ims");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else{
   return $conn;
}
}
        function add_prd($post)
        {
        return $this->db->insert('purchase',$post);
        }


        function stock_list(){
            $query=$this->db
                        ->select()
                        ->get('purchase');
            return $query->result();
                
    }

        function assets()
        {

            // $this->db->select_sum('prd_price');
            // $result = $this->db->get('purchase')->row();  
            // return $result->prd_price;
            $asset=$this->db
                            ->select([' sum(item_price) as price_sum, sum(item_qty) as qty_sum'])
                            ->from('purchase')
                            ->get();
                            
                return $asset->result();

        }
        
        function sales()
        {
            $asset=$this->db
                ->select(['item_name','item_code'])
                ->from('purchase')
                ->get();
            return $asset->result_array();
        }


        function upd_sales($upd_sales)
        {

            $item_name=$upd_sales['item_name'];
            $item_qty=$upd_sales['item_qty'];

            $this->db
                    ->where('item_code', $item_name)
                    ->set('item_qty', 'item_qty-'.$item_qty, FALSE)
                    ->update('purchase');
            return $upd_sales;
                        
                        
                        
            //UPDATE `purchase` SET `item_qty` = `item_qty` - 8 WHERE `item_code` = 'xl1' 
            // return $this->db
            // ->set('`$item_name` = `$item_name` - `$item_qty`')
            // ->update('purchase',$item_name = $item_name-$item_qty);
        }


        function vendors()
        {

            //$vendors=$this->db->query("SELECT DISTINCT 'item_company' from 'purchase'");
            $vendors=$this
                            ->db->group_by('item_company')
                            ->from('purchase')
                            ->get();
        return $vendors->result_array();
        }


        function prd_search($query)
        {
            
            $q= $this->db
                            ->from('purchase')
                            ->like('item_name',$query)
                            ->or_like('item_code',$query)
                            ->or_like('item_company',$query)
                            ->get();
            return $q->result();
        }

        function user()
        {
            $query=$this->db
                        
                            ->select()
                            ->  get('user');
                     
            return $query->result();
        }

        public function user_fetch($user_id)
            {
                    $this->db->select('*');
                    $this->db->where('id',$user_id);
                    $res2 = $this->db->get('user');
                return $res2;
            }

            function update_user($id,Array $post)
            {
                
                
                // print_r($array);
                // echo $article_id;

                return $this->db
                ->where('id',$id)
                ->update('user',$post);
            }
        
        function category()
        {
            $query=$this->db
                            ->select()
                            ->order_by('category_id','DESC')
                            ->  get('category');
                           
                return $query->result();
        }
        function category_search($category_id)
        {
           $query= $this->db
                            ->select('')
                            ->where('category_id',$category_id)
                            ->get('category');
            return $query->result_array();
        }


        function update_category($category_id,Array $post)
        {
            
            return $this->db
                            ->where('category_id',$category_id)
                            ->update('category',$post);
        }
        
        function add_category(Array $post)
        {
        $name=$post['category_name'];
        $status=$post['category_status'];
        $id=$post['id'];
        
        return $this->db
        ->insert('category',['category_name'=>$name,'category_status'=>$status,'user_id'=>$id]);
        }

        function item()
        {
            // $data=$this->db->query('SELECT category.category_name,items.item_id,category.category_id,items.item_code,items.item_name,items.item_description,items.item_status FROM category INNER JOIN items ON category.category_id=items.category_id ORDER BY items.item_id');
            // return $data->result_array();
            $data=$this->db
                            ->query('SELECT * FROM items INNER JOIN category ON category.category_id=items.category_id');
                return $data->result_array();
            
        }

        function item_search($phoneData)
        {
            // $this->db->select('');
            // $this->db->where('category_id',$phoneData);
            // $res2 = $this->db->get('items_in_stock');
            // return $res2->result_array();
            $res= $this->db
                            ->query('SELECT category_name,category_id FROM category WHERE category_status="active"');
                return $res->result_array();
        }

        function add_items($insert_data){
            $this->db->insert('items',$insert_data);

        }

        function fetch_item($prd_id){

        $query=  $this->db
                    ->where('item_id',$prd_id)
                    ->get('items');
                return $query->result_array();

        }

        function delete_category($category_id){
            $this->db
                    ->where('category_id',$category_id)
                    ->delete("category");
        }

        function delete_item($item_id){
            $this->db
            ->where('item_id',$item_id)
            ->delete("items");
        }

        function update_item($data){
            $insert_data=array(
                'category_id'=>$this->input->post('category_id'),
                'item_name'=>$this->input->post('item_name'),
                
                'item_code'=>$this->input->post('item_code'),
                'item_description'=>$this->input->post('item_description'),
                'item_status'=>$this->input->post('item_status'),
                
            );
           $item_id= $this->input->post('item_id');
            // return $this->db
            
            // ->update('items',$insert_data)
            // ->where('item_id',$item_id);
           

            return $this->db
                ->where('item_id',$item_id)
                ->update('items',$insert_data);
        }

        function order_managment(){
            $data=$this->db
            ->query('SELECT * FROM purchase_order inner JOIN purchase_order_detail ON purchase_order_detail.po_code=purchase_order.po_code');
return $data->result_array();

        }

        function edit_order($order_id){
           //$result= $this->db->query('SELECT * FROM purchase_order inner JOIN purchase_order_detail ON purchase_order_detail.id=purchase_order.id');
          $result= $this->db->select('')
          ->from('purchase_order')
          ->join('purchase_order_detail','purchase_order_detail.id=purchase_order.id','inner')
                        ->where('purchase_order.id',$order_id)
                       
                    ->get('');
                return $result->result_array();

        }

        function update_order(){
            
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
            
      }
      $insert = count($data1);

      if($insert)
      {
      $this->db->insert_batch('purchase_order_detail', $data1);
      }
      $item_quantity=$this->input->post('item_quantity');
      $item_rate=$this->input->post('item_rate');
      


        //   if(!empty($_POST['item_rate'])){
             
        //   }
         
        //  $records = count($_POST['item_rate']);
        //   $count=count($data);
        //   print_r($count);

// for($i=0; $i<$records; $i++) {
    //*******This data use for insert into PURCHASE_ORDER_DETAIL****** */
    // $data = array(
    //     'item_rate' => $this->input->post('item_rate')[$i],
    //     'item_qty' => $_POST['item_quantity'][$i],
    //     'item_code' => $_POST['category_id'][$i],
    //     'po_code' => $_POST['po_code'][$i],
        
        
    // );
    // //*******This data use for insert into PURCHASE_ORDER****** */
    // $data1 = array(
       
    //     'po_description' => $_POST['po_desc'][$i],
    //     'po_total'=>$this->input->post('item_rate')[$i]*$_POST['item_quantity'][$i],
    //     'po_code' => $_POST['po_code'][$i],
        
        
    // );
    // $data = array(
    //     'item_rate' => $this->input->post('item_rate'),
    //     'item_qty' => $this->input->post('item_quantity'),
    //     'item_code' => $this->input->post('item_code'),
    //     'po_code' => $this->input->post('po_code')
        
        
    // );
    //*******This data use for insert into PURCHASE_ORDER****** */
//     $data1 = array(
       
//         'po_description' => $this->input->post('po_desc'),
//         //'po_total'=>$this->input->post('item_rate')*$this->input->post('item_quantity'),
//         'po_code' => $this->input->post('po_code')
        
        
//     );
//    $data_count = count($data['item_rate']);
//    $params = str_repeat("(?,?),", $data_count);
//    $binds = str_repeat("ss", $data_count);
//    $merged_data = [];
// foreach ( $data['item_rate']  as $key => $name )    {
//     $merged_data[] = $name;
//     $merged_data[] = $data['item_code'][$key];
//      $merged_data[] = $data['item_qty'][$key];
//      //$merged_data[] = $data['po_code'];
//      $sql=$this->db->query= "INSERT INTO purchase_order_detail (item_rate,item_code)
//                  VALUES ".rtrim($params, ",");
            
           
                 
//   $insert = $this->db->conn_id->prepare( $sql );
// // // Bind the parameters, using ... is the argument unpacking operator
//   $bind=  $insert->bind_param($binds, ...$merged_data);
//      print_r($binds);
// // // Execute the SQL
// //$insert->execute();
//}

    

    
    

   //$q1= $this->db->insert('purchase_order_detail',$data);
   //$q2= $this->db->insert('purchase_order',$data1);
   //if($q1 && $q2){
    //   echo'Ordered Successfully:';
   //}
    
    
//}
/************************************************************************* */
/**************************Previous Working Code with Procedural********* */
/*********************************************************************** */

        
//         $db=$this->db();
//         $item_rate=$this->input->post('item_rate');
             
//               $po_code=$this->input->post('po_code');
//             $po_date=$this->input->post('date');
//               $po_description=$this->input->post('po_desc');
//           $po_status=$this->input->post('status');
//          $item_code=$this->input->post('item_code');
//           $item_rate=$this->input->post('item_rate');
//              $item_quantity=$this->input->post('item_quantity');
//              $query='';
//  for($count=0;$count<count($item_quantity);$count++) { 
	
// 	$po_code_clean=mysqli_real_escape_string($db,$po_code[$count]);
// 	$po_description_clean=mysqli_real_escape_string($db,$po_description[$count]);
// 	$item_rate_clean=mysqli_real_escape_string($db,$item_rate[$count]);
	
	
// 	$item_quantity_clean=mysqli_real_escape_string($db,$item_quantity[$count]);
// 	$item_code_clean=mysqli_real_escape_string($db,$item_code[$count]);
	
//     if($po_code_clean !='' && $po_description_clean !='' && $item_rate_clean !=''
//      && $item_quantity_clean!='' && $item_code_clean !=''){

//         $this->db
//             ->insert('purchase_order_detail',['po_code'=>$po_code_clean]);
//         // $query.='

// 		// INSERT INTO purchase_order(po_code,po_date,po_total,po_description) VALUES("'.$po_code_clean.'","'.$date_clean.'","'.$item_rate_clean*$item_quantity_clean.'","'.$po_description_clean.'");
// 		// INSERT INTO purchase_order_detail(po_code,item_code,item_qty,ite_rate) VALUES("'.$po_code_clean.'","'.$item_code_clean.'","'.$item_quantity_clean.'","'.
// 		// $item_rate_clean.'");

//         // ';
//         // print_r($query);
//     }else{
//         echo"required";
//     }
/************************************************************************************ */
/****************************************End Working CODE PHP PROCEDURAL************ */
/********************************************************************************** */
}
        function order_status($status){
            $id= $this->input->post('order_id');
            $status;
          $update_status= $this->db
            ->where('id', $id)
            ->set('status', $status)
            ->update('purchase_order_detail');
            if($update_status){
                echo "Status Changed";
            }
        }


    function test(){
        
      $item_code=$this->input->post('item_code');
      $item_quantity=$this->input->post('item_quantity');
      $temp = count($item_code);
      for($i=0; $i<$temp; $i++){
        $item_code=$this->input->post('item_code');
        $item_quantity=$this->input->post('item_quantity');
        $data[] = array(
            'msg'=>$item_code[$i], 
            'name'=>$item_quantity[$i],
            
            );
      }
      $insert = count($data);

      if($insert)
      {
      $this->db->insert_batch('chat', $data);
      }
      echo $insert_id = $this->db->insert_id();
      $update = array(
        'brand_id' => 1
        
     );
      $this->db->where('item_id',16);
      $this->db->update('items',$update ); 
      return $insert;
    
        //******************************************************************* */

        //*************** accurate Code******************************************

        //******************************************************************** */
//       $records = count($_POST['item_rate']);
     

// for($i=0; $i<$records; $i++) {
//     $data = array(
//         'item_rate' => $this->input->post('item_rate')[$i],
//         'item_qty' => $_POST['item_quantity'][$i],
//         'item_code' => $_POST['category_id'][$i],
//         'po_code' => $_POST['po_code'][$i],
        
        
//     );
//     $data1 = array(
       
//         'po_description' => $_POST['po_desc'][$i],
//         'po_total'=>$this->input->post('item_rate')[$i]*$_POST['item_quantity'][$i],
//         'po_code' => $_POST['po_code'][$i],
        
        
//     );

//    $q1= $this->db->insert('purchase_order_detail',$data);
//    $q2= $this->db->insert('purchase_order',$data1);
//    if($q1 && $q2){
//        echo'Insert Success fully';
//    }
    
    
// }
//***************************************************************************** */
    /************************FInal end accurate Code**************************************** */
// **************************Just For TEST Make_ORDER into database**************************/
/*********************************************************************************** */


    }
   
    function po_invoice(){
//         $data=$this->db
//         ->query('SELECT * FROM po_invoice inner JOIN po_invoice_detail ON po_invoice.invoice_code=po_invoice_detail.invoice_code ');
// return $data->result_array();

$result= $this->db->select('')
->from('po_invoice')
->join('po_invoice_detail','po_invoice.invoice_code=po_invoice_detail.invoice_code','inner')
           ->order_by('po_invoice.id','desc')   
             
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
                   $q1= $this->db->where('id', $id)
                    ->update('po_invoice_detail',$data1) ;
if($q1&$q2){
echo 'success';
}else{
  echo 'some errror';  
}
    }

    function get_PoCode_in_invoice(){
        $asset=$this->db
        ->select(['po_code','id'])
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
        if($discount>0){
          // print_r($discount);
          $invoice_total= $item_quantity*$item_rate;
           $invoice_total=$invoice_total-(($discount/100)*$invoice_total);
        }else{
          echo $invoice_total= $item_quantity*$item_rate;
        }
    
        $data1=array(
            'po_code'=>$po_code,
            'invoice_code'=>$invoice_code,
            'invoice_total'=>$invoice_total,
            'invoice_description'=>$invoice_description
            
        );

        $data2=array(
            'invoice_code'=>$invoice_code,
            'item_code'=>$item_code,
            'item_qty'=>$item_quantity,
            'item_rate'=>$item_rate
            
        );
        //print_r($data2);

        $q1= $this->db->insert('po_invoice',$data1);
   $q2= $this->db->insert('po_invoice_detail',$data2);
   if($q1 && $q2){
       echo'Insert Success fully';
   }else{
       echo'Error in database MOdal->: line no:499 get_PoCode_item';
   }

                
               
            }

            function stock(){
                $query=$this->db
                ->select()
                ->get('items_in_stock');
    return $query->result();
            }

            function pdf(){
                $query=$this->db
                ->select()
                ->get('items_in_stock');
    return $query->result_array();
            }
            
        
} 
    

?>