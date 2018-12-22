<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_model extends CI_Model {

function test(){
	 $connect = $this->db->conn_id;
  $columns = array('id', 'invoice_code', 'item_code', 'item_qty', 'item_total','date');


  $query = "SELECT * FROM po_invoice_detail WHERE ";

  if($this->input->post("is_date_search") == "yes")
  {
   $query .= 'date BETWEEN "'.$this->input->post("start_date").'" AND "'.$this->input->post("end_date").'" AND ';
  }

  if(isset($_POST["search"]["value"]))
  {
   $query .= '
    (id LIKE "%'.$_POST["search"]["value"].'%" 
    OR invoice_code LIKE "%'.$_POST["search"]["value"].'%" 
    OR item_code LIKE "%'.$_POST["search"]["value"].'%" 
     OR item_total LIKE "%'.$_POST["search"]["value"].'%" 
    OR date LIKE "%'.$_POST["search"]["value"].'%")

   ';
  }
  if(isset($_POST["order"]))
  {
   $query .= 'ORDER BY '.$columns[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' 
   ';
  }
  else
  {
   $query .= 'ORDER BY id DESC ';
  }
  $query1 = '';

  if($_POST["length"] != -1)
  {
   $query1 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
  }


$number_filter_row = $this->db->query($query)->num_rows();

//$number_filter_row = mysqli_num_rows(mysqli_query($connect, $query));
//$result=$this->db->query($query);
$result = mysqli_query($connect, $query.$query1);

$data = array();

  while($row = mysqli_fetch_array($result))
  {
   $sub_array = array();
   $sub_array[] = $row["id"];
   $sub_array[] = $row["invoice_code"];
   $sub_array[] = $row["item_code"];
    $sub_array[] = $row["item_qty"];

   $sub_array[] = $row["item_rate"];
    $sub_array[] = $row["item_total"];
   $sub_array[] = $row["date"];
   $sub_array[] = '<span class="fa fa-eye w3-text-blue"><a class="view" id="'.$row['id'].'"> View</a></span>';
   // $sub_array[] = '<button type="button" name="view" id="'.$row["id"].'" class="btn btn-info btn-xs view">View</button>';
   $sub_array[]=  $id=$this->session->userdata('user_id') ;
     

                
            
   $data[] = $sub_array;
  }
$get_all_data=$this->db->query('SELECT * FROM po_invoice_detail')->num_rows();


  $output = array(
   "draw"    => intval($_POST["draw"]),
   "recordsTotal"  =>  $get_all_data,
   "recordsFiltered" => $number_filter_row,
   "data"    => $data
  );

echo json_encode($output);
}

function view_invoice(){
    $id= $this->input->post('invoice_id');

    $result= $this->db->select('')
                      ->from('po_invoice_detail')
                      // ->join('po_invoice','po_invoice_detail.invoice_code=po_invoice.invoice_code','inner')
                                    ->where('id',$id)
                                   
                                ->get('');
                                return $result->result_array();

  }
}
	


/* End of file home_model.php */
/* Location: ./application/models/home_model.php */