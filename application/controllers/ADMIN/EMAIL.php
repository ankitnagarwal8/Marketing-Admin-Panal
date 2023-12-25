<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EMAIL extends CI_Controller {

	public function index()
	{
		$rowno=0;
		$rowintable = $this->input->post('rowintable');

		$this->load->model('EMAIL_DATA');
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
 	
    $allcount = $this->EMAIL_DATA->getrecordCount($search_text);

    $users_record = $this->EMAIL_DATA->getData($rowno,$rowperpage,$search_text);
 
    $config['base_url'] = base_url().'USER/ADMIN/ADMIN/index/';
    $config['use_page_numbers'] = TRUE;
    $config['total_rows'] = $allcount;
    $config['per_page'] = $rowperpage;

    $this->pagination->initialize($config);
 
    $data['pagination'] = $this->pagination->create_links();
    $data['result'] = $users_record;
    $data['rowno'] = $rowno;
    $data['search'] = $search_text;

  	
		$this->load->view('Admin/emails',$data);
	}
}