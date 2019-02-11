<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Department_model extends CI_Model {

    public function add_department()
    {
        $department=$this->input->post('department');
        
        $temp=count($department);
         for($i=0;$i<$temp;$i++){
        $data[]= array(
            'department'=>$department[$i],
         );

          }
            // print_r($data);
              $this->db->insert_batch('department', $data);
    }
}
?>