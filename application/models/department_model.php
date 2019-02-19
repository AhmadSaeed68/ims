<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Department_model extends CI_Model {

    
    var $table = 'department'; //table name in database
    var $column_order = array(null,'department'); //set column field database for datatable orderable
    var $column_search = array('department'); //set column field database for datatable searchable 
    var $order = array('id' => 'desc'); // default order 

    private function _get_datatables_query()
    {
        
        //add custom filter here
        $dept_search="";
       
        
        if($this->input->post('dept_search'))
        {
            $dept_search = $this->input->post('dept_search');
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

    public function get_datatables()
    {
        $this->_get_datatables_query();
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    public function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }


        //|
        //|
        //|
         //| Add Department In ::DB
        //|
        //|

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

        //|
        //|
        //|
         //| Edit Department with #ID
        //|
        //|

    function edit_department($department_id){
        //$result= $this->db->query('SELECT * FROM purchase_order inner JOIN purchase_order_detail ON purchase_order_detail.id=purchase_order.id');
       $result= $this->db->select('')
       ->from('department')
       
        ->where('id',$department_id)
        ->get('');
             return $result->result_array();

     }

     function update_department(){

        $id= $this->input->post('id');
        $department= $this->input->post('department');

      $this->db->where('id',$id)->update('department', $department);


    }
}
?>