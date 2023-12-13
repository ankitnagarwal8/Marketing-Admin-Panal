<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HOME extends CI_Controller {

	public function index()
	{
		$this->load->view('website/index');
	}
	public function email_sent()
	{
		$this->load->database();
		$data = $this->db->query('select * from create_campaing');
		$res['results'] = $data->result_array();

		$this->load->view('website/email_massage',$res);
	}
}
