
<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class DRAFT_DATA extends CI_Model{

	public function getData($rowno,$rowperpage,$search="") {
 
    $this->db->select('*');
    $this->db->from('save_email');

    if($search != ''){
      $this->db->like('id', $search);
      $this->db->or_like('id', $search);
      $this->db->like('subject', $search);
      $this->db->or_like('subject', $search);
      
      $this->db->like('massage', $search);
      $this->db->or_like('massage', $search);
      $this->db->like('camaping', $search);
      $this->db->or_like('camaping', $search);
    }

    $this->db->limit($rowperpage, $rowno); 
    $query = $this->db->get();
 
    return $query->result_array();
  }

  // Select total records
  public function getrecordCount($search = '') {

    $this->db->select('count(*) as allcount');
    $this->db->from('save_email');
 
    if($search != ''){
      $this->db->like('subject', $search);
      $this->db->or_like('subject', $search);
    }

    $query = $this->db->get();
    $result = $query->result_array();
 
    return $result[0]['allcount'];
  }

  public function getuserList(){
     $this->db->select(array('id', 'subject', 'massage', 'camaping'));
        $this->db->from('save_email'); 
        if(!empty($this->_pageNumber)) {
            $this->db->limit($this->_pageNumber, $this->_offset);
        }
        $query = $this->db->get();
        return $query->result_array();
  }
}