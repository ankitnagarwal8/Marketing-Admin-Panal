<?php




if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class REPORTS_DATA extends CI_Model{

public function getData($rowno,$rowperpage,$search="") {
 
    $this->db->select('*');
    $this->db->from('report_data');

    if($search != ''){
       $this->db->or_like('name', $search);
        $this->db->or_like('email', $search);
    }
   
    $this->db->limit($rowperpage, $rowno); 
    $query = $this->db->get();

    return $query->result_array();
       
  }

  // Select total records
  public function getrecordCount($search = '') {

    $this->db->select('count(*) as allcount');
    $this->db->from('report_data');

    $this->db->like('name', $search);
    $this->db->or_like('name', $search);

    $query = $this->db->get();
    $result = $query->result_array();
 
    return $result[0]['allcount'];
  }

  public function getuserList(){
     $this->db->select(array('id', 'name', 'email', 'catagary', 'camaping', 'sending_email', 'subject', 'massage', 'sending_date', 'delivered', 'delivered_date', 'opening_date'));
        $this->db->from('report_data');

        if(!empty($this->_pageNumber)) {
            $this->db->limit($this->_pageNumber, $this->_offset);
        }
        $query = $this->db->get();
        return $query->result_array();
  }
}
