
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FROMMAIL extends CI_Controller {

	public function index()
	{
		$this->load->database();
		$q = $this->db->query('select * from email_from');
		$data['result'] = $q->result_array();
		$this->load->view('Admin/FROMMAIL',$data); 
	}
	public function delete($id){
		$this->load->database();
		$q = $this->db->query("DELETE FROM email_from WHERE id = '$id'");
		if($q){
			redirect(base_url('ADMIN/FROMMAIL/'));
		}
	}
}