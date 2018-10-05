    <?php
        class Prd extends CI_Controller{

            function __construct()
            {
                parent::__construct();
                if(! $this->session->userdata('user_id')){
                    return redirect('login');
                }
            }

        function load_prd_view()
        {
            $this->load->helper('form');
            $this->load->view('add_prd');
        }

        function add_prd()
        {
                $post= $this->input->post();
                $this->load->library('form_validation');
                $this->form_validation->set_error_delimiters('<div class="text-danger" style="font-family:Bookman Old Style">', '</div>');
                if ($this->form_validation->run('add_prd') == TRUE)
                {

                $this->load->model('prd/addprd');
                $data=$this->addprd->add_prd($post);
                if($data)
                {
                    $this->session->set_flashdata('feedback','Article Added Successfully');
                    $this->session->set_flashdata('feedback_msg','alert-success');
                }

                else
                {
                    $this->session->set_flashdata('feedback','Failed add articles,"Try again Later ***SOme System Error***"');
                    $this->session->set_flashdata('feedback_msg','alert-danger');
                }
                return redirect('admin/dashboard');

                }
                else{
                    $this->load->view('add_prd');
                    }
        }
        function stock_list(){
                    $this->load->helper('form');
                    $this->load->model('prd/addprd');
                    $query= $this->addprd->stock_list();
                    $this->load->view('stock_list',['query'=>$query]);
                }

        function prd_sales(){
                    $this->load->helper('form');
                    $this->load->model('prd/addprd');
                    $items=$this->addprd->sales();
                    $prd_name = array_column($items, 'item_name');
                    $prd_code = array_column($items, 'item_code') ;
                    $combine= array_merge($prd_name,$prd_code);

                    $this->load->view("prdsales",['combine'=>$combine]);


                }


            function assets(){

                $this->load->model('prd/addprd');
                $assets=$this->addprd->assets();

                //   foreach($assets as $query){
                //     $SUM= $SUM + $query->prd_price;



                //   }
                //   $sumqty=$SUM + $query->prd_qty;
                //   echo $SUM."Product  ".$sumqty;



                $this->load->view('assets',['assets'=>$assets]);

                }

            function updatesale(){

                    $upd_sales= $this->input->post();

                    $this->load->model('prd/addprd');
                    if($this->addprd->upd_sales($upd_sales)){
                    $this->session->set_flashdata('feedback','*** Sales Added Successfully ***');
                    $this->session->set_flashdata('feedback_msg','alert-success');
                    }else{
                    $this->session->set_flashdata('feedback','*** SOme System Error*** ! Contact To Developer :(');
                    $this->session->set_flashdata('feedback_msg','alert-success');

                }
                return redirect('prd/prd_sales');


                }


                function vendors(){

                    $this->load->model('prd/addprd');
                    $vendors= $this->addprd->vendors();
                    $this->load->view('vendors',['vendors'=>$vendors]);

                    }

                function search_prd(){
                    $this->load->helper('form');
                    $query=$this->input->post('query');
                    $this->load->model('prd/addprd');
                    $prd_search=$this->addprd->prd_search($query);

                    $this->load->view('prd_search',['prd_search'=>$prd_search]);
                }

                function user(){
                    $this->load->helper('form');
                    $this->load->model('prd/addprd');
                    $user= $this->addprd->user();
                    $this->load->view('user',['user'=>$user]);

                }
                public function get_user_result()
                {
                    $this->load->helper('form');
                    $user_id = $this->input->post('user_id');
                    if(isset($user_id) and !empty($user_id)){
                    $this->load->model('prd/addprd');
                    $records = $this->addprd->user_fetch($user_id);
                    $output = '';
                        foreach($records->result_array() as $row){
                            ?>
                        <h4 class="text-center">'<?=$row["name"]?>'</h4><br>

                        </div>
                    </div>
                    <?php echo form_open("prd/update_user/{$row['id']}",['class'=>'form-vertical']);?>
                    <div class="form-group">
                    <label for="pwd">User Id:</label>
                            <?php echo form_input(['name'=>'id','placeholder'=>'User ID:',
            'class'=>'form-control','disabled'=>'true','value'=> set_value('title',$row['id'])])?>


                        </div>
                    <div class="form-group">
                            <label for="pwd">Name:</label>
                            <?php echo form_input(['name'=>'name','placeholder'=>'Name:',
            'class'=>'form-control','type'=>'text','value'=> set_value('title',$row['name'])])?>
                        </div>
                        <div class="form-group">
                            <label for="pwd">Email:</label>
                            <?php echo form_input(['name'=>'email','placeholder'=>'Email:',
            'class'=>'form-control','type'=>'email','value'=> set_value('title',$row['email'])])?>
                        </div>

                        <div class="form-group">
                            <label for="pwd">Password:</label>
                            <?php echo form_input(['name'=>'password','placeholder'=>'Password',
            'class'=>'form-control','type'=>'text','value'=> set_value('title',$row['password'])])?>

                        </div>

                        <?php echo form_submit(['name'=>'submit','type'=>'submit','value'=>'Update','class'=>'btn btn-primary']);?>
                    </form>
                    <?php
                        }
                        echo $output;
                    }
                    else {
                        echo '<center><ul class="list-group"><li class="list-group-item">'.'Select a Phone'.'</li></ul></center>';
                    }
                }


                function update_user($id){
                    $this->load->helper('form');
                    $post=$this->input->post();
                    unset($post['submit']);


                    $this->load->model('prd/addprd');
                    $this->addprd->update_user($id,$post);
                    $this->load->library('../controllers/prd');
                    $this->prd->user();
                }

                function category(){
                    $this->load->helper('form');
                    $this->load->model('prd/addprd');
                    $category=$this->addprd->category();

                    $this->load->view('category',['category'=>$category]);

                }

                function get_category_result(){

                    $this->load->helper('form');
                    $category_id = $this->input->post('item_id');
                    if(isset($category_id) and !empty($category_id)){
                    $this->load->model('prd/addprd');
                    $records = $this->addprd->category_search($category_id);

    foreach($records as $row){
?>
    <h4 class="text-center">'<?=$row["category_id"]?>'</h4><br>
    <?php echo form_open("prd/update_category/{$row['category_id']}",['class'=>'form-vertical']);?>
        <div class="form-group">
            <label for="pwd">User Id:</label>
        <?php
        echo form_input(['name'=>'user_id','placeholder'=>'User ID:',
        'class'=>'form-control','disabled'=>'true','value'=> set_value('title',$row['user_id'])])?>

        </div>
            <div class="form-group">
            <label for="pwd">Category Id:</label>
        <?php
        echo form_input(['name'=>'user_id','placeholder'=>'User ID:',
        'class'=>'form-control','disabled'=>'true','value'=> set_value('title',$row['category_id'])])?>

        </div>
                            <!-- Category Name:;;;;;;;;; -->
        <div class="form-group">
            <label for="pwd">Category Name:</label>
        <?php
        echo form_input(['name'=>'category_name','placeholder'=>'Category Name:',
        'class'=>'form-control','type'=>'text','value'=> set_value('title',$row['category_name'])])?>
        </div>
                        <!-- Category Status;;;;: -->

        <div class="form-group">
            <label for="pwd">Category_status</label>

        </div>

            <!-- Fetch data from data base and display select optionn -->
        <div class="form-group">
            <select class="form-control" name="category_status" value="<?php echo $row['category_status']?>">
                <option value="active" name="active">active</option>
                <option value="inactive" name="inactive">inactive</option>
            </select>
        </div>


    <?php
        echo form_submit(['name'=>'submit','type'=>'submit','value'=>'Update','class'=>'btn btn-primary']);?>
    </form>
        <?php
                }

            }
    else {
        echo '<center><ul class="list-group"><li class="list-group-item">'.'Select a Phone'.'</li></ul></center>';
        }


    }



            function update_category($category_id)
            {
                $post=$this->input->post();
                unset($post['submit']);
                $this->load->model('prd/addprd');
                $this->addprd->update_category($category_id,$post);
                $this->load->library('../controllers/prd');
                $this->prd->category();

            }


            function add_category()
            {

                echo "Success";
                $name=$_POST['category_name'];
                $status=$_POST['category_status'];
                $id=$_POST['id'];
                $post=['category_name'=>$name,'category_status'=>$status,'user_id',$id];
                $post=$this->input->post();
                $this->load->model('prd/addprd');
                $this->addprd->add_category($post);

            }


                function item()
                {
                    $this->load->model('prd/addprd');
                    $item=$this->addprd->item();
                    $this->load->view('items',['item'=>$item]);
                }

                function get_item()
                {
                $this->load->helper('form');
                $phoneData = $this->input->post('phoneData');
                if(isset($phoneData) and !empty($phoneData)){
                $this->load->model('prd/addprd');
                $records = $this->addprd->item_search($phoneData);
            ?>
        <div class="container">
        <h1 class='w3-padding-16'><span class='fa fa-plus-square-o w3-text-blue-gray'> </span> Add items</h1>
            <div class='row'>
                <div class="col-sm-8">
        <?=
            form_open('',['class'=>'form-horizontal','id'=>'item_form','method'=>'POST'])?>
                <div class="form-group">
                <label class="control-label col-sm-2" for="email">Categore</label>
                <div class="col-sm-10">
                <select class="form-control" id="category_id" name="category_id" >
        <?php
        foreach($records as $each) {
        ?>
            <option id="<?php echo $each['category_id']; ?>"
                value="<?php echo $each['category_id'] ?>"
                id="<?php echo $each['category_id'] ?>"><?php echo $each['category_name']?>
            </option>';
                    <?php } ?>
                    </select>
        </div>
    </div>
                    <!-- item Name -->
        <div class="form-group">
            <label class="control-label col-sm-2" for="pwd">Item Name:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="item_name" name="item_name" required>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="pwd">Item Quantity:</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" id="item_qty" name="item_qty" required>
            </div>
        </div>
                <!-- Item Code -->
        <div class="form-group">
            <label class="control-label col-sm-2" for="pwd">Item Code:</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" id="item_code" name="item_code" required>
        </div>
    </div>
                <!-- Text Area -->
        <div class="form-group">
            <label class="control-label col-sm-2" for="pwd">Description:</label>
            <div class="col-sm-10">
            <textarea name="description" id="item_desc" cols="87" rows="6"></textarea>
        </div>
    </div>


    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
        <?php
        echo form_submit(['name'=>'submit','type'=>'submit','value'=>'Add','class'=>'btn btn-primary']);?>
        </div>
    </div>
    </form>
            </div>
        </div
    </div>
            <?php
            }
                else {
                echo '<center><ul class="list-group"><li class="list-group-item">'.'Select a Phone'.'</li></ul></center>';

        }

        }


        function add_item(){
            //if($_POST["submit"]=="Add"){
            $insert_data=array(
                'category_id'=>$this->input->post('category_id'),
                'item_name'=>$this->input->post('itemName'),
                'item_code'=>$this->input->post('item_code'),
                'item_description'=>$this->input->post('item_desc'),
                'item_qty'=>$this->input->post('item_qty'),
            );
            //print_r($insert_data);
            $this->load->model('prd/addprd');
            $this->addprd->add_items($insert_data);
        //}
            }

            function fetch_item(){
                $output='';
                $this->load->helper('form');
                $prd_id=$_POST['item_id'];
                if(isset($prd_id) and !empty($prd_id)){
                $this->load->model('prd/addprd');
                $data= $this->addprd->fetch_item($prd_id);

                foreach($data as $row){
                    ?>

                       <div>
                       <h3 class="jumbotron w3-center"><span class='fa fa-soundcloud w3-text-blue fa-2x'></span> Items Detail Update</h3<br>

                        </div>


                  <?php echo form_open("",['class'=>'form-vertical update_item','id'=>'update_item_form']);?>

	 <div class="form-row">
                    <div class="form-group col-md-3">
                            <label for="pwd">item Id:</label>
                            <?php echo form_input(['name'=>'id','placeholder'=>'User ID:',
            'class'=>'form-control','disabled'=>'true','id'=>'item_id','value'=> set_value('title',$row['item_id'])])?>
             </div>
                    <div class="form-group col-md-3">
                       <label for="pwd">category Id:</label>
                            <?php echo form_input(['name'=>'id','placeholder'=>'Category ID:',
            'class'=>'form-control','disabled'=>'true','id'=>'category_id','value'=> set_value('title',$row['category_id'])])?>

                    </div>

                    <div class="form-group col-md-4">
                            <label for="pwd">Item Code:</label>
                            <?php echo form_input(['name'=>'password','placeholder'=>'Item Code',
            'class'=>'form-control','disabled'=>'true','type'=>'text','id'=>'item_code','value'=> set_value('title',$row['item_code'])])?>

                    </div>
                </div>
                <div class="form-row">
                <div class="form-group col-md-4">
                                <label for="pwd">Item Name:</label>
                            <?php echo form_input(['name'=>'name','placeholder'=>'Item Name:',
            'class'=>'form-control','type'=>'text','id'=>'item_name','id'=>'item_name','value'=> set_value('title',$row['item_name'])])?>

                    </div>

                    <div class="form-group col-md-4">
                    <label for="pwd">Status</label>
            <select class="form-control" id="item_status" name="category_status" value="<?php echo $row['item_status']?>">
                <option value="active" name="active">active</option>
                <option value="inactive" name="inactive">inactive</option>
            </select>
        </div>

                     </div>
                <div class="form-row">
                    	 <div class="form-group col-md-8">
                  <label for="item_description">Item Description:</label>
                            <?php echo form_textarea(['name'=>'item_description','placeholder'=>'item Description',
            'class'=>'form-control','type'=>'text','id'=>'item_description','value'=> set_value('title',$row['item_description'])])?>


                    </div>

                    </div>
                    <div class="form-row ">
                   	<div class="form-group col-md-8">
                     <input type="submit" name="update" value='Update' id="update" class="btn btn-success w3-hover-blue">
                    </div>

                    </div>
</form>
                <?php
                }
            }else{
                    echo"Some error";
                }
                echo $output."";

            }


            function stock_items(){
                $this->load->view('stock_items');
            }

            function delete_category()
            {
                $category_id=$_POST['category_id'];
                $this->load->model('prd/addprd');
                $this->addprd->delete_category($category_id);

            }
            function delete_user()
            {
                $delete_id=$_POST['delete_id'];
                $this->load->model('prd/addprd');
                $this->addprd->delete_user($category_id);

            }

            function delete_item(){
                $item_id=$_POST['item_id'];
                $this->load->model('prd/addprd');
                $this->addprd->delete_item($item_id);

            }

            function update_item(){

            $data=$this->input->post();

                //print_r($insert_data);
                $this->load->model('prd/addprd');
                $this->addprd->update_item($data);
            }

            function order_managment(){
                $this->load->model('prd/addprd');
                $order_data=$this->addprd->order_managment();

           $this->load->view('order.php',['order_data'=>$order_data]);
            }

            function edit_order(){
                $this->load->helper('form');
                    $order_id = $this->input->post('order_id');
                    if(isset($order_id) && !empty($order_id)){
                    $this->load->model('prd/addprd');
                    $records = $this->addprd->edit_order($order_id);
                        foreach($records as $data):?>

                        <div class="container">
                            <div class="col">
                            <div class="col-sm-8">
                            <form action="" class="order" id="order_form">
                                <div class="form-group">
                                    <label for="email">ID</label>
                                    <input type="text" disabled class="form-control" placeholder="ID" value="<?=$data['id']?>" id="id">
                                </div>

                                <div class="form-group">
                                    <label for="po_code">Po Code:</label>
                                    <input type="text" class="form-control" value="<?=$data['po_code']?>" id="po_code">
                                </div>
                                <div class="form-group">
                                    <label for="email">Po Vendor</label>
                                    <input type="text" class="form-control" value="<?=$data['po_vendor']?>" id="po_vendor">
                                </div>
                                <div class="form-group">
                            <label for="pwd">Item Description:</label>
                            <?php echo form_textarea(['name'=>'item_description','placeholder'=>'item Description',
            'class'=>'form-control','type'=>'text','id'=>'po_description','value'=> set_value('title',$data['po_description'])])?>

                        </div>
                        <div class="form-group">
                        <label for="pwd">Status</label>
                            <select class="form-control"  name="category_status" id="status" value="<?php echo $data['po_status']?>">
                                <option value="active" name="active">active</option>
                                <option value="inactive" name="inactive">inactive</option>
                            </select>
                        </div>
                                <div class="form-group">
                                    <label for="pwd">Item Code</label>
                                    <input type="text" class="form-control" value="<?=$data['item_code']?>"  id="item_code">
                                </div>
                                <div class="form-group">
                                    <label for="email">Item Quantity</label>
                                    <input type="text" class="form-control" value="<?=$data['item_qty']?>" id="item_quantity">
                                </div>
                                <div class="form-group">
                                    <label for="pwd">Item Rate:</label>
                                    <input type="text" class="form-control" name='item_rate' value="<?=$data['item_rate']?>" id="item_rate">
                                </div>
                                <div class="form-group">
                                    <label for="pwd">PO Date:</label>
                                    <input type="text" class="form-control" value="<?=$data['date']?>" id="date">
                                </div>

                                <?php //echo form_submit(['name'=>'update','id'=>'update_order','type'=>'submit','value'=>'Update','class'=>'btn btn-primary']);?>
                                <button type="submit" class="btn btn-default update" class="update" id="update">update</button>
                            </form>
                            </div>
                            </div>
                        </div>


                    <?php  endforeach;
                    $output = '';
                }else{
                    echo"Some error";
                }
            }

            function update_order(){

        $po_code=$_POST['po_code'];
        $po_vendor=$_POST['po_vendor'];
        $po_status=$_POST['po_status'];
        $item_code=$_POST['item_code'];
        $item_quantity=$_POST['item_quantity'];
        $item_rate=$_POST['item_rate'];
        $date=$_POST['date'];
        $po_code=$_POST['po_code'];
         $po_description=$_POST['po_description'];
         $data= $this->input->post();
         print_r($data);

            }

            function get_itemCode_in_order(){

                $this->load->model('prd/addprd');
               $item_data= $this->addprd->get_itemCode_in_order();
               ?>
               <select class="form-control" id="category_id" name="item_code[]" onchange="myfun()">
                <?php
              foreach($item_data as $each){
                  echo $each['item_code'];
                  ?>
                  <option id="<?php echo $each['item_code']; ?>"
                  value="<?php echo $each['item_code'] ?>"
                  id="<?php echo $each['item_id'] ?>"><?php echo $each['item_name'].'/'.$each['item_code']?>
              </option>';
                      <?php } ?>
                      </select>
                      <?php


            }

            function chk_item_qty_in_order(){
                $item_qty= $this->input->post('item_qty');
                $item_code= $this->input->post('item_code');
                $result= $this->db->select('item_qty')
                            ->from('items')
                            ->where('item_code',$item_code)
                            ->get('')
                            ->result_array();
                            foreach($result as $result){
                                $qty= $result['item_qty'];
                                if($item_qty>$qty){
                                    echo"**Available Quantity:".$qty."**";
                                }
                            }
            }


            function make_order(){

                $this->load->model('prd/addprd');
                $this->addprd->make_order();

                //$this->load->model('prd/addprd');
                //$this->addprd->make_order($data);
                //$this->addprd->make_order($data);
                // $data=implode(',',$this->input->post('po_desc'));
                // $data = json_encode($this->input->post('po_desc'));

                // $data=array(
                //     'po_vendor'=>$this->input->post('po_vendor'),
                //     'po_code'=>$this->input->post('po_code'),
                //     'po_date'=>$this->input->post('date'),
                //     'po_description'=>$this->input->post('po_desc'),
                //     'po_status'=>$this->input->post('status'),
                //     'item_code'=>$this->input->post('category_id'),
                //     'item_rate'=>$this->input->post('item_rate'),
                //     'item_quantity'=>$this->input->post('item_quantity')

                // );




            }


            /**********  PO INVOICE  Function  **********/

            function po_invoice(){

               $this->load->model('prd/addprd');
              $po_invoice= $this->addprd->po_invoice();
              $this->load->view('po_invoice',['po_invoice'=>$po_invoice]);
            }


            /***************************EDIT INVOICE DATA************ */
            function edit_invoice(){

               $this->load->helper('form');
               $id=$this->input->post('invoice_id');
                    if(isset($id) && !empty($id)){
                    $this->load->model('prd/addprd');
                    $records = $this->addprd->edit_invoice($id);

                        foreach($records as $data):endforeach;?>

                        <input type="hidden" required="" name="id" value='<?php echo $data['id'];?>' id="id">

                        <form action="" class="order" id="invoice_update">
                        <div class="col-sm-12 col-md-12">
                               <div class="form-row">
                                 <div class="form-group col-md-4">
                                 <label for="pwd">Po Code:</label>
                                  <input type="text" required="" name="po_code[]" value='<?php echo $data['po_code'];?>' required class="form-control"  id="po_code">
                                 </div>

                                 <div class="form-group col-md-4">
                                  <label for="pwd">Invoice Code:</label>
                                 <input type="text" class="form-control" value='<?php echo $data['invoice_code'];?>' required  name="invoice_code" id="invoice_code">
                                 </div>
                                 <div class="form-group col-md-4">
                                    <label for="pwd">Item Code</label>
                                 <input type="text" class="form-control" value='<?php echo $data["item_code"];?>' required name="item_code" id="item_code">
                                 </div>
                             </div>

                    <div class="form-row">
                    <div class="form-group col-md-4">
                    <label for="pwd">Item Rate:</label>
                    <input type="text" class="form-control" value='<?php echo $data['item_rate'];?>' required name="item_rate" id="item_rate">
                    </div>
                    <div class="form-group col-md-4">
                    <label for="email">Item Quantity</label>
                    <input type="text" class="form-control" value='<?php echo $data['item_qty'];?>' required name="item_qty" id="item_qty">

                    </div>
                    <div class="form-group col-md-4">
                     <label for="pwd">Invoice total:</label>
                    <input type="number" class="form-control" value='<?php echo $data['invoice_total'];?>' required name="invoice_total" id="invoice_total">
                    </div>
                </div>
                <div class="form-row">
                <div class="form-group col-md-4">
                     <label for="pwd">Date:</label>
                     <input type="date" class="form-control" value='<?php echo $data['date'];?>' required name="date" id="date">

                    </div>
                    <div class="form-group col-md-8">
                    <label for="pwd">Invoice Description</label>

                    <?php echo form_textarea(['name'=>'invoice_description','placeholder'=>'item Description',
            'class'=>'form-control','type'=>'text','id'=>'invoice_description','value'=> set_value('title',$data['invoice_description'])])?>

                    </div>


                </div>
                <div class="form-row">
                <div class="form-group col-md-4">
                           <input type="submit" name="update" value='Update' id="update" class="btn btn-success ">
                </div>

                </div>
                           </div>
                        </form>



                        <?php
                    }
            }
            function view_invoice(){
                $id=$this->input->post('invoice_id');
                $this->load->model('prd/addprd');
               $records= $this->addprd->view_invoice($id);
              
                  ?>
                  
                   
                    <div class="well"><h2> Invoice Detail</h2></div>
                    
                    <div class="col-sm-12 col-md-12">
                    <?php foreach($records as $data):?>
                    <span>Date: <?=$data['date']?></span>
                               <div class="form-row">
                                 <div class="form-group col-md-6">
                                 <span>Invoice Code:<b> <?=$data['invoice_code']?></b></span>
                                 </div>

                                 <div class="form-group col-md-6">
                                 <span>Po Code: <b><?=$data['po_code']?></b></span>
                                 </div>
                                
                             </div>
                             <div class="form-row">
                                 <div class="form-group col-md-4">
                                 <span>Invoice Description: </span>
                                 </div>

                                 <div class="form-group col-md-6">
                                 <span><?=$data['invoice_description']?></span>
                                 </div>
                                
                             </div>
                             <div class="form-row">
                                 <table class="table table-bordered">
                                 <tr class="warning">
                                 <td>Item Code</td>
                                 <td>Item Qty</td>
                                 <td>Item Rate</td>
                                 <td>Discount</td>
                                 <td>Total</td>
                                 </tr>
                            
                                 <tr>
                                 
                                     <th><?=$data['item_code']?></th>
                                     <th><?=$data['item_qty']?></th>
                                     <th><?=$data['item_rate']?></th>
                                     <th><?=$data['discount']?> %</th>
                                     <th><?=$data['item_total']?></th>
            <?php endforeach;?>
                                 </tr>
                                 </table>
                                
                             </div>
                             </div>

                  
                  <?php
               
               
            }
            function update_invoice(){

                $data= $this->input->post();
                $this->load->model('prd/addprd');
                $this->addprd->update_invoice($data);

             }

             function report(){

$this->load->view('report');
             }

             function make_invoice(){
                $data=$this->input->post();


                $this->load->model('prd/addprd');
                $this->addprd->make_invoice();

             }
             function get_PoCode_in_invoice(){
               $this->load->model('prd/addprd');
              $po_code= $this->addprd->get_PoCode_in_invoice();
              ?>
               <select required class="form-control" id="po_code" name="po_code" onchange="myfun(this.value)">
               <option></option>
                <?php
              foreach($po_code as $po_code){
                  echo $each['item_code'];
                  ?>

                  <option

                  id="<?php echo $po_code['po_code'];?>"  ><?php echo $po_code['po_code']?>
              </option>';
                      <?php } ?>
                      </select>
                      <?php
             }

             function get_PoCode_item(){
              $po_code=$this->input->post('datapost');
                 $this->load->model('prd/addprd');
                $result=$this->addprd->get_PoCode_item($po_code);
                foreach($result as $result):
                ?>

                  <div class="form-group col-md-3">
                    <label for="pwd">Item Code</label>
                    <input id="item_code" class="form-control" value='<?= $result['item_code']?>' name="item_code[]"  class="show_data">
                   <!-- <input type="number" class="form-control" required="" name="item_code[]" id="item_code"> -->
                    </div>
                    <div class="form-group col-md-3">
                    <label for="email">Item Quantity</label>
                    <input type="text" class="form-control" required value="<?=$result['item_qty']?>" name="item_quantity[]" id="item_quantity">

                    </div>
                    <div class="form-group col-md-3">
                        <label for="pwd">Item Rate:</label>
                            <div class="input-group">
                            <span class="input-group-addon">$</span>
                                <input type="number" value='<?=$result['item_rate']?>' class="form-control" required=""  name="item_rate[]" id="item_rate">
                            </div>
                   </div>

                    <div class='form-group col-md-3'>
                    <label for="pwd">Discount:</label>
                        <div class="input-group">

                            <input type="text" class="form-control" name="discount[]" aria-label="Amount (to the nearest dollar)">
                            <span class="input-group-addon">%</span>
                        </div>
                    </div>


                </div>
                <?php
                endforeach;
            }

            function stock(){
                $this->load->model('prd/addprd');
                $stock=$this->addprd->stock();
                $this->load->view('stock',['stock'=>$stock]);

            }


            function pdf(){
                $this->load->library('pdf');
                $this->load->model('prd/addprd');
                $pdf=$this->addprd->pdf();




                $html=$this->load->view('pdf/stock_pdf',['pdf'=>$pdf],true);
                $this->load->library('M_pdf');
                $this->m_pdf->pdf=new mPDF('c','A4','','',32,25,27,25,16,13);
                $this->m_pdf->pdf->defHTMLHeaderByName(
                    'myHeader2',
                    '<div style="text-align: center; font-weight: bold;">Chapter 2</div>'
                );
                $stylesheet = file_get_contents('../../assets/css/bootstrap.min.css');
                $this->m_pdf->pdf->SetDisplayMode('fullpage');
                $this->m_pdf->pdf->list_indent_first_level = 0;
                $this->m_pdf->pdf->WriteHTML($stylesheet,1);

                $this->m_pdf->pdf->WriteHTML($html,2);
                $this->m_pdf->pdf->Output('mpdf.pdf','D');



            }

            function my_mPDF(){

               $this->load->model('prd/addprd');
              $stock= $this->addprd->stock();

                $html='<h1>PDF</h1>';

                foreach($stock as $stock):endforeach;



                }

                function order_status(){
                    if($_POST['btn_action'] == 'delete')
                    {
                        $status= $this->input->post('status');
                        if($status == 'active')
                            {
                            $status = 'inactive';
                            }else{
                                $status='active';
                            }

                            $this->load->model('prd/addprd');
                            $this->addprd->order_status($status);
                    }
                }



        }




    ?>