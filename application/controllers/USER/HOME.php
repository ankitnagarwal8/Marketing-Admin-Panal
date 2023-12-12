<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HOME extends CI_Controller {

	public function index()
	{
		$this->load->view('website/index');
	}
	public function email_sent()
	{
		$this->load->view('website/email_massage');
	}
}
