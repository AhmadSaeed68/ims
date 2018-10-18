<?php
    class Category_controller extends CI_Controller{

        function category(){
            $this->load->helper('form');
            $this->load->model('category_model');
            $category=$this->category_model->category();

            $this->load->view('category',['category'=>$category]);

        }

        function get_category_result(){

            $this->load->helper('form');
            $category_id = $this->input->post('item_id');
            if(isset($category_id) and !empty($category_id)){
            $this->load->model('category_model');
            $records = $this->category_model->category_search($category_id);
                $this->load->view('ajax_load/get_category_result',['records'=>$records]);


    }
else {
echo '<center><ul class="list-group"><li class="list-group-item">'.'Select a Phone'.'</li></ul></center>';
}


}



    function update_category($category_id)
    {
        $post=$this->input->post();
        unset($post['submit']);
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
        $post=$this->input->post();
        $this->load->model('category_model');
        $this->category_model->add_category($post);

    }

    function delete_category()
    {
        $category_id=$_POST['category_id'];
        $this->load->model('category_model');
        $this->category_model->delete_category($category_id);

    }
 
    }
?>