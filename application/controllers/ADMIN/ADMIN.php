<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ADMIN extends CI_Controller {

	public function index()
	{
		$this->load->database();
		$results['total_email'] = $this->db->count_all('report_data');
		$this->load->view('Admin/index',$results);
	}
	
}