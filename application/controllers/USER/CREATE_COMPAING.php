<?php

class CREATE_COMPAING extends CI_Controller {

	
	public function index()
	{
		$this->load->view('website/create_compaing');
	}
	public function create(){

		$title = $this->input->post('title');
		$contant = $this->input->post('contant');
		$Arr = array(
			'title' => $title,
			'contant' => $contant
		);
		// echo "hello";
		$this->load->database();
		$res = $this->db->insert('create_campaing',$Arr);
		// $res = $this-->insert('create_campaing',$Arr);

		if($res){
			redirect(base_url('Home/email_sent'));
		}else{
			echo "campaing not created";
		}
	}
	public function edit($id){
		$this->load->database();
		$q = $this->db->query("select * from create_campaing where id = '$id'");
		$res['results'] = $q->result_array();
		$this->load->view('website/veiw_camping_details',$res);
	}
	public function edit_process($id){
		$title = $this->input->post('title');
		$contant = $this->input->post('contant');
		$Arr = array(
			'title' => $title,
			'contant' => $contant
		);
		$this->load->database();
		$this->db->where('id',$id);
		$res = $this->db->update('create_campaing',$Arr);
		if($res){
			redirect(base_url('Home/email_sent'));

		}else{
			echo "data not updated";
		}
	}
	public function delete($id){
		$this->load->database();
		$this->db->where('id',$id);
		$this->db->delete('create_campaing');
		redirect(base_url('Home/email_sent'));
	}
}