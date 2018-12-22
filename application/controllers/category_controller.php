<?php
    class Category_controller extends CI_Controller{

        function category() //Load Category and send to view
        {
            $this->load->helper('form');
            $this->load->model('category_model');
            $category=$this->category_model->category();

            $this->load->view('category',['category'=>$category]); // Load Into View  

        }

        function get_category_result()
        {
            $this->load->helper('form');
            $category_id = $this->input->post('item_id');
            
            if(isset($category_id) and !empty($category_id))
            {
                $this->load->model('category_model');       //Load Model
                $records = $this->category_model->category_search($category_id);
                $this->load->view('ajax_load/get_category_result',['records'=>$records]); //Load View


            }
            else 
            {
                echo '<center><ul class="list-group"><li class="list-group-item">'.'Select a Phone'.'</li></ul></center>';
            }


}



    function update_category($category_id) // update category
    {
        $post=$this->input->post();
        unset($post['submit']); //Remover "submit" From input fields
        $this->load->model('category_model');

        $this->category_model->update_category($category_id,$post);
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

        $post=$this->input->post(); //Get Input Value
        $this->load->model('category_model');
        $this->category_model->add_category($post);

    }

    function delete_category()
    {
        $category_id=$_POST['category_id'];
        $this->load->model('category_model'); //Load Model
        $this->category_model->delete_category($category_id); 

    }



     function __construct() 
     {
        parent::__construct();
        if(!$this->session->userdata('user_id'))
        {
            redirect('login');
        }
    }
 
    }
?>