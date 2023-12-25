<?php

class FILTER extends CI_Controller{

	public function index(){
		$this->load->database();
		$q = $this->db->query('select * from user_email');
		$catagary = $this->db->query('select * from catagary');
		$create_campaing = $this->db->query('select * from create_campaing');
		$results['create_campaing'] = $create_campaing->result_array();
		$report_data = $this->db->query('select * from report_data');
		$results['reports'] = $report_data->result_array(); 
		$results['catagary'] = $catagary->result_array();
		$results['results'] = $q->result_array();
		
		$this->load->view('website/email_filter',$results);
	}

	/*public function ajax(){
		$catagary = $this->input->post('Catagary');
		$Date = $this->input->post('Date');
		$Campaing = $this->input->post('Campaing');
		$Delivered = $this->input->post('Delivered');
		$Seen = $this->input->post('Seen');
		$Sent = $this->input->post('Sent');
		$Sent_times = $this->input->post('Sent_times');

		// $this->load->database();
		// $cat = $this->db->query('select * from catagary');
		// $res = $cat->result_array();

		// foreach ($res as $result):
		// if($result['catagary'] = $catagary){
		// 	$catagary = $this->db->query('select * from catagary');
		// 	$create_campaing = $this->db->query('select * from create_campaing');
		// 	$data['create_campaing'] = $create_campaing->result_array();
		// 	$data['catagary'] = $catagary->result_array();
		// 	$q = $this->db->query('select * from user_email where catagary = "$catagary"');
		// 	$data['results'] = $q->result_array();
			
		// }
		// endforeach;
		// $this->load->view('website/email_filter',$data);
		if($catagary == 'Whatsapp'){

			$this->load->database();
			$q = $this->db->query('select * from user_email where catagary = "Whatsapp"');
			$results['results'] = $q->result_array();
			$catagary = $this->db->query('select * from catagary');
			$create_campaing = $this->db->query('select * from create_campaing');
			$results['create_campaing'] = $create_campaing->result_array();
			$results['catagary'] = $catagary->result_array();
			$this->load->view('website/email_filter',$results);

			if($Delivered == 'All'){
				$q = $this->db->query('select * from user_email where catagary = "Whatsapp"');
				$results['results'] = $q->result_array();
				$report_data = $this->db->query('select * from report_data');
				$results['report_data'] = $report_data->result_array();
				foreach($results as $result){

				}
				$this->load->view('website/email_filter',$results);
			}




		}else if($catagary == 'Facebook'){
			$this->load->database();
			$q = $this->db->query('select * from user_email where catagary = "Facebook"');
			$results['results'] = $q->result_array();
			$catagary = $this->db->query('select * from catagary');
			$create_campaing = $this->db->query('select * from create_campaing');
			$results['create_campaing'] = $create_campaing->result_array();
			$results['catagary'] = $catagary->result_array();

			$this->load->view('website/email_filter',$results);
		}else if($catagary == 'Linked'){
			$this->load->database();
			$q = $this->db->query('select * from user_email where catagary = "Linked"');
			$results['results'] = $q->result_array();
			$catagary = $this->db->query('select * from catagary');
			$create_campaing = $this->db->query('select * from create_campaing');
			$results['create_campaing'] = $create_campaing->result_array();
			$results['catagary'] = $catagary->result_array();

			$this->load->view('website/email_filter',$results);
		}else if($catagary == 'git'){
			$this->load->database();
			$q = $this->db->query('select * from user_email where catagary = "git"');
			$results['results'] = $q->result_array();
			$catagary = $this->db->query('select * from catagary');
			$create_campaing = $this->db->query('select * from create_campaing');
			$results['create_campaing'] = $create_campaing->result_array();
			$results['catagary'] = $catagary->result_array();

			$this->load->view('website/email_filter',$results);
		}else{
			redirect(base_url('USER/FILTER'));
		}
*/

	}
