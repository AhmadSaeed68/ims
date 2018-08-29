<?php
    class Prd extends CI_Controller{

       
        function load_prd_view(){
            $this->load->helper('form');
            $this->load->view('add_prd');
        }
        function add_prd(){
           $post= $this->input->post();
            $this->load->library('form_validation');
            $this->form_validation->set_error_delimiters('<div class="text-danger" style="font-family:Bookman Old Style">', '</div>');
            if ($this->form_validation->run('add_prd') == TRUE)
		{

           $this->load->model('prd/addprd');
            $data=$this->addprd->add_prd($post);
            if($data){
                $this->session->set_flashdata('feedback','Article Added Successfully');
                $this->session->set_flashdata('feedback_msg','alert-success');
            }
            else{
                $this->session->set_flashdata('feedback','Failed add articles,"Try again Later ***SOme System Error***"');
                $this->session->set_flashdata('feedback_msg','alert-danger');
           }
           return redirect('admin/dashboard');
         
        }else{
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
            public function get_phone_result()
            {
                $this->load->helper('form');
                   $phoneData = $this->input->post('phoneData');
                   if(isset($phoneData) and !empty($phoneData)){
                       $this->load->model('prd/addprd');
                       $records = $this->addprd->get_search($phoneData);
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
                $category_id = $this->input->post('phoneData');
                if(isset($category_id) and !empty($category_id)){
                    $this->load->model('prd/addprd');
                    $records = $this->addprd->category_search($category_id);
                    
                    
                    
                    foreach($records as $row){
                     ?>    
                 <h4 class="text-center">'<?=$row["category_id"]?>'</h4><br>
                 
                   </div>
              </div>
              <?php echo form_open("prd/update_category/{$row['category_id']}",['class'=>'form-vertical']);?>
              <div class="form-group">
              <label for="pwd">User Id:</label>
                     <?php echo form_input(['name'=>'user_id','placeholder'=>'User ID:',
       'class'=>'form-control','disabled'=>'true','value'=> set_value('title',$row['user_id'])])?>
                     
                     
                 </div>
                 <div class="form-group">
              <label for="pwd">Category Id:</label>
                     <?php echo form_input(['name'=>'user_id','placeholder'=>'User ID:',
       'class'=>'form-control','disabled'=>'true','value'=> set_value('title',$row['category_id'])])?>
                     
                     
                 </div>
              <div class="form-group">
                     <label for="pwd">Category Name:</label>
                     <?php echo form_input(['name'=>'category_name','placeholder'=>'Category Name:',
       'class'=>'form-control','type'=>'text','value'=> set_value('title',$row['category_name'])])?>
                 </div>
                 <div class="form-group">
                     <label for="pwd">Category_status</label>
                     <?php echo form_input(['name'=>'category_status','placeholder'=>'Category Status',
       'class'=>'form-control','type'=>'text','value'=> set_value('title',$row['category_status'])])?>
                 </div>
                 <div class="form-group">
                 <select class="form-control" value="<?php echo $row['category_status']?>">
                        <option value="active" name="active">active</option>
                        <option value="inactive" name="inactive">inactive</option>
                </select>
                </div>
                 
                 
                 <?php echo form_submit(['name'=>'submit','type'=>'submit','value'=>'Update','class'=>'btn btn-primary']);?>
             </form>
              <?php
                    }    
                    
                }
                else {
                 echo '<center><ul class="list-group"><li class="list-group-item">'.'Select a Phone'.'</li></ul></center>';
                }


            }

            function update_category($category_id){
                
                $post=$this->input->post();
                unset($post['submit']);
                $this->load->model('prd/addprd');
                $this->addprd->update_category($category_id,$post);
                $this->load->library('../controllers/prd');
                $this->prd->category();
                
            }
            
    }  
    
    


?>