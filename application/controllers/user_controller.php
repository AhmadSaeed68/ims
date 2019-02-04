<?php
    class User_controller extends CI_Controller{

        //Load All user in user_view
        function user()
        {
            $this->load->helper('form');
            $this->load->model('user_model');
            $user= $this->user_model->user();
            $this->load->view('user',['user'=>$user]);

        }


        public function get_user_result()
        {
            $this->load->helper('form');
            $user_id = $this->input->post('user_id');
            if(isset($user_id) and !empty($user_id)){
            $this->load->model('user_model');
            $records = $this->user_model->user_fetch($user_id);
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

        
        function update_user($id)
        {
            $this->load->helper('form');
            $post=$this->input->post();
            unset($post['submit']);


            $this->load->model('user_model');
            $this->user_model->update_user($id,$post);
            $this->load->library('controllers/user_controller');
            $this->prd->user();
        }

        function delete_user()
        {
            $delete_id=$_POST['user_id'];
            $this->load->model('user_model');
            $this->user_model->delete_user($delete_id);

        }


         function __construct() 
         {
        parent::__construct();
        if(!$this->session->userdata('user_id')){
            redirect('login');
        }
    }


    }
?>