
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CATAGORY extends CI_Controller {

	public function index()
	{
		/*$rowno=0;
		$rowintable = $this->input->post('rowintable');

		$this->load->model('CATAGORY_DATA');
		// Search text
    	$search_text = "";
    	if($this->input->post('submit') != NULL ){
      		$search_text = $this->input->post('search');
      		$this->session->set_userdata(array("search"=>$search_text));
    	}else{
      	if($this->session->userdata('search') != NULL){
        	$search_text = $this->session->userdata('search');
      	}
    	}

    	if(empty($rowintable)){
    		$rowintable = 10;
    	}
    	$rowperpage = $rowintable;

    if($rowno != 0){
      $rowno = ($rowno-1) * $rowperpage;
    }
 	
    $allcount = $this->CATAGORY_DATA->getrecordCount($search_text);

    $users_record = $this->CATAGORY_DATA->getData($rowno,$rowperpage,$search_text);
 
    $config['base_url'] = base_url().'ADMIN/CATAGORY/index/';
    $config['use_page_numbers'] = TRUE;
    $config['total_rows'] = $allcount;
    $config['per_page'] = $rowperpage;

    $this->pagination->initialize($config);
 
    $data['pagination'] = $this->pagination->create_links();
    $data['result'] = $users_record;
    $data['rowno'] = $rowno;
    $data['search'] = $search_text;*/

    	$this->load->database();
		$q = $this->db->query('select * from catagary');
		$data['result'] = $q->result_array();
		// $this->load->view('Admin/reports',$data); 
  	
		// $this->load->view('Admin/reports');
		$this->load->view('Admin/CATAGORY',$data);
	}
	public function delete($id){
		$this->load->database();
		$q = $this->db->query("DELETE FROM catagary WHERE id = '$id'");
		if($q){
			redirect(base_url('ADMIN/CATAGORY/'));
		}
	}
	public function create(){
		$CATAGORY = $this->input->post('catagary');
		$Arr = array(
			"catagary" => $CATAGORY
		);
		$this->load->database();
		if($this->db->insert('catagary',$Arr)){
			redirect(base_url('ADMIN/CATAGORY'));
		}

	}
	public function edit($id){
  		
  	}
}