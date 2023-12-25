
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CAMPAING extends CI_Controller {

	public function index()
	{
		$this->load->database();
		$q = $this->db->query('select * from create_campaing');
		$data['result'] = $q->result_array();

		$this->load->view('Admin/CAMPAING',$data);
	}
	public function delete($id){
		$this->load->database();
		$this->db->query("DELETE FROM create_campaing WHERE id = '$id'");
		redirect(base_url('ADMIN/CAMPAING'));
	}
}