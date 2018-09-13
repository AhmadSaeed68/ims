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
            <div class='row'>
                <div class="col-sm-8">
        <?= 
            form_open('',['class'=>'form-horizontal','id'=>'item_form','method'=>'POST'])?>
                <div class="form-group">
                <label class="control-label col-sm-2" for="email">Categore</label>
                <div class="col-sm-10">
                <select class="form-control" id="category_id" name="category_id">
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
                   <div class="container">
                       <div>
                       <h4 class="text-center">Items Detail</h4><br>
                        
                        </div>
                    </div>
                    <?php echo form_open("",['class'=>'form-vertical update_item','id'=>'update_item_form']);?>
                    <div class="form-group">
                    <label for="pwd">item Id:</label>
                            <?php echo form_input(['name'=>'id','placeholder'=>'User ID:',
            'class'=>'form-control','disabled'=>'true','id'=>'item_id','value'=> set_value('title',$row['item_id'])])?>
                            
                            
                        </div>
                        <div class="form-group">
                    <label for="pwd">category Id:</label>
                            <?php echo form_input(['name'=>'id','placeholder'=>'Category ID:',
            'class'=>'form-control','disabled'=>'true','id'=>'category_id','value'=> set_value('title',$row['category_id'])])?>
                            
                            
                        </div>
                    <div class="form-group">
                            <label for="pwd">Item Name:</label>
                            <?php echo form_input(['name'=>'name','placeholder'=>'Item Name:',
            'class'=>'form-control','type'=>'text','id'=>'item_name','id'=>'item_name','value'=> set_value('title',$row['item_name'])])?>
                        </div>
                        
                        
                        <div class="form-group">
                            <label for="pwd">Item Code:</label>
                            <?php echo form_input(['name'=>'password','placeholder'=>'Item Code',
            'class'=>'form-control','type'=>'text','id'=>'item_code','value'=> set_value('title',$row['item_code'])])?>
                            
                        </div>
                        <div class="form-group">
                            <label for="pwd">Item Description:</label>
                            <?php echo form_textarea(['name'=>'item_description','placeholder'=>'item Description',
            'class'=>'form-control','type'=>'text','id'=>'item_description','value'=> set_value('title',$row['item_description'])])?>
                            
                        </div>

                        <div class="form-group">
            <label for="pwd">Item status</label>
   
        </div>

            <!-- Fetch data from data base and display select optionn -->
        <div class="form-group">
            <select class="form-control" id="item_status" name="category_status" value="<?php echo $row['item_status']?>">
                <option value="active" name="active">active</option>
                <option value="inactive" name="inactive">inactive</option>
            </select>
        </div>
                        
                        <?php echo form_submit(['name'=>'update','id'=>'update_item','type'=>'submit','value'=>'Update','class'=>'btn btn-primary']);?>
                    </form>
                    </div>
                </div>
                <?php
                }}else{
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
            $item_id= $this->input->post('item_id');
                $insert_data=array(
                    'category_id'=>$this->input->post('category_id'),
                    'item_name'=>$this->input->post('itemName'),
                    
                    'item_code'=>$this->input->post('item_code'),
                    'item_description'=>$this->input->post('item_description'),
                    'item_status'=>$this->input->post('item_status'),
                    
                );
                //print_r($insert_data);
                $this->load->model('prd/addprd');
                $this->addprd->update_item($insert_data);
            }

            function order_managment(){
                $this->load->model('prd/addprd');
                $order_data=$this->addprd->order_managment();
                
            $this->load->view('order.php',['order_data'=>$order_data]);
            }

            function edit_order(){
                $this->load->helper('form');
                    $order_id = $this->input->post('order_id');
                    if(isset($order_id) and !empty($order_id)){
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
                                    <label for="pwd">Po Code:</label>
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
                                    <input type="text" class="form-control" value="<?=$data['item_rate']?>" id="item_rate">
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
       echo $id=$_POST['id'];
        $po_code=$_POST['po_code'];
        $po_vendor=$_POST['po_vendor'];
        $po_status=$_POST['po_status'];
        $item_code=$_POST['item_code'];
        $item_quantity=$_POST['item_quantity'];
        $item_rate=$_POST['item_rate'];
        $date=$_POST['date'];
        $po_code=$_POST['po_code'];
         $po_description=$_POST['po_description'];
            
            }

            function get_itemCode_in_order(){
               
                $this->load->model('prd/addprd');
               $item_data= $this->addprd->get_itemCode_in_order();
               ?>
               <select class="form-control" id="category_id" name="category_id[]">
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


            function make_order(){
                $data=$this->input->post();
                
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
                
                
                  $this->load->model('prd/addprd');
                  $this->addprd->make_order($data);
                
            }

            /**********  PO INVOICE  Function  **********/

            function po_invoice(){

               $this->load->model('prd/addprd');
              $po_invoice= $this->addprd->po_invoice();
              $this->load->view('po_invoice',['po_invoice'=>$po_invoice]);
            }
        } 
        
        


    ?>