
<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class CATAGORY_DATA extends CI_Model{
    
    /*function __construct() {
        // Set table name
        $this->table = 'user_email';
    }
    
    
    function getRows($params = array()){
        $this->db->select('*');
        $this->db->from($this->table);
        
        if(array_key_exists("where", $params)){
            foreach($params['where'] as $key => $val){
                $this->db->where($key, $val);
            }
        }
        
        if(array_key_exists("returnType",$params) && $params['returnType'] == 'count'){
            $result = $this->db->count_all_results();
        }else{
            if(array_key_exists("id", $params)){
                $this->db->where('id', $params['id']);
                $query = $this->db->get();
                $result = $query->row_array();
            }else{
                $this->db->order_by('id', 'desc');
                if(array_key_exists("start",$params) && array_key_exists("limit",$params)){
                    $this->db->limit($params['limit'],$params['start']);
                }elseif(!array_key_exists("start",$params) && array_key_exists("limit",$params)){
                    $this->db->limit($params['limit']);
                }
                
                $query = $this->db->get();
                $result = ($query->num_rows() > 0)?$query->result_array():FALSE;
            }
        }
        
        // Return fetched data
        return $result;
    }
    
    
    public function insert($data = array()) {
        if(!empty($data)){
            //Add created and modified date if not included
            if(!array_key_exists("created", $data)){
                $data['date'] = date("Y-m-d H:i:s");
            }
            if(!array_key_exists("modified", $data)){
                $data['date'] = date("Y-m-d H:i:s");
            }
            
            // Insert member data
            $insert = $this->db->insert($this->table, $data);
            
            // Return the status
            return $insert?$this->db->insert_id():false;
        }
        return false;
    }
    
    
    public function update($data, $condition = array()) {
        if(!empty($data)){
            //Add modified date if not included
            // if(!array_key_exists("date", $data)){
            //     $data['date'] = date("Y-m-d H:i:s");
            // }
            
            // Update member data
            $update = $this->db->update($this->table, $data, $condition);
            
            // Return the status
            return $update?true:false;
        }
        return false;
    }*/

  public function getData($rowno,$rowperpage,$search="") {
 
    $this->db->select('*');
    $this->db->from('catagary');

    if($search != ''){
      $this->db->like('email', $search);
      $this->db->or_like('frist_name', $search);
    }

    $this->db->limit($rowperpage, $rowno); 
    $query = $this->db->get();
 
    return $query->result_array();
  }

  // Select total records
  public function getrecordCount($search = '') {

    $this->db->select('count(*) as allcount');
    $this->db->from('catagary');
 
    if($search != ''){
      $this->db->like('email', $search);
      $this->db->or_like('frist_name', $search);
    }

    $query = $this->db->get();
    $result = $query->result_array();
 
    return $result[0]['allcount'];
  }

  public function getuserList(){
     $this->db->select(array('id','catagary'));
        $this->db->from('catagary'); 
        if(!empty($this->_pageNumber)) {
            $this->db->limit($this->_pageNumber, $this->_offset);
        }
        $query = $this->db->get();
        return $query->result_array();
  }
}