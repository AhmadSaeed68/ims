<?php
    class purchase_request_model extends CI_Model{

        var $table = 'purchase_request';
    var $column_order = array(null, 'item_qty','date','department_name','review','item_code'); //set column field database for datatable orderable
    var $column_search = array('item_qty','department_name','status','review','item_qty','date'); //set column field database for datatable searchable 
    var $order = array('id' => 'desc'); // default order 

    private function _get_datatables_query()
    {
        
        //add custom filter here
        $to_date="";
        $from_date="";
        
        if($this->input->post('to_date'))
        {
            $to_date = $this->input->post('to_date');
        }
       
        if($this->input->post('from_date'))
        {
            $from_date = $this->input->post('from_date');
        }

        if($to_date != "" && $from_date != ""){
            $cond = "po_date` BETWEEN '$from_date' And '$to_date' ";
            $this->db->where($cond);

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


                //Ajax JSON END//
        //****************************************//
        //**Get department_model */
        function get_department_in_request(){
            $query=$this->db
            ->select(['department','id'])
            ->from('department')
            ->get();
    
        return $query->result_array();
          }

          function get_items(){
            $asset=$this->db
            ->select(['item_code','item_code','item_id'])
            ->from('items')
            ->get();
    
        return $asset->result_array();
          }

          public function make_request()
          {
            $department=$this->input->post('department');
            $temp = count($department);
            for($i=0; $i<$temp; $i++){
                $department=$this->input->post('department');
                $item_code=$this->input->post('item_code');
                $item_quantity=$this->input->post('item_quantity');
                $data[] = array(
                    'department_name'=>$department[$i],
                    'item_code'=>$item_code[$i],
                    'item_qty'=>$item_quantity[$i],
                    );
                     
            }
            $this->db->insert_batch('purchase_request', $data);
          }

          public function request_action()
          {
              $query=$this->db
                          ->select('*')
                          ->where('status','pending')
                          ->get('purchase_request');
                         
              return $query->result();
          }

          public function delete_request()
          {
             $id=$this->input->post('id');

              $query=$this->db
              ->where('id',$id)
                            ->delete('purchase_request');
                            
                            return $query;
          }
    }
        ?>