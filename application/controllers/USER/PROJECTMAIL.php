

<?php

class PROJECTMAIL extends CI_Controller{

	public function index($compaint_id){
		
			
		$this->session->set_userdata("compaint_id", $compaint_id);

		$this->load->view('website/email_massage_section');
	}
	public function to_subject(){

		$this->load->view('website/editor/index');
	}
	/*public function to_email(){
		$this->load->database();
		$q = $this->db->query('select * from user_email');
		$catagary = $this->db->query('select * from user_email');

		$results['results'] = $q->result_array();

		// print_r($result['count_email']);
		$this->load->view('website/email_filter',$results);
	}*/
	public function add_subject($compaint_id){
		$sub = $this->input->post('subject');
		$this->session->set_userdata('subject', $sub);
		redirect(base_url('USER/PROJECTMAIL/index/'.$compaint_id));
	}
	public function to_massage(){

		$this->load->view('website/editor/email_massage');
	}
	public function email_massage(){

		$massage = $this->input->post('massage');

		$files_get = $_FILES["files"]["name"];
		// $this->session->set_userdata('massage', $massage);

		$config['upload_path'] = './assets/image/';
                
                $config['allowed_types'] = 'gif|jpg|png|jpeg|';
                $config['max_size'] = 2000;
                $config['max_width'] = 1500;
                $config['max_height'] = 1500;

                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                if (!$this->upload->do_upload('files')) {
                    $error = array('error' => $this->upload->display_errors()); 
                    print_r($error); 

                }
                else{
                    $data = array(
                       'image_metadata' => $this->upload->data()
                    );
                    $this->session->set_userdata('files_get', $data);
                    
                 }
          $compaint_id = $_SESSION['compaint_id'];
		$this->session->set_userdata('massage', $massage);
		redirect(base_url('USER/PROJECTMAIL/index/'.$compaint_id));
		
	}
	public function email_send_process(){
		// session_start();
		
		$to_emails = $_SESSION['multiple_emails'];
		 // $compaint_id = $_SESSION['compaint_id'];
		 $email_subject = $_SESSION['subject'];
		 $email_massage = $_SESSION['massage'];
     
     	$compaint_id = $_SESSION['compaint_id'];
		 			
		 $this->load->database();
		 $camp =  $this->db->query("select * from create_campaing where id = '$compaint_id'");
		 $cam = $camp->result_array();

		 foreach($cam as $c){
		 	$campaing = $c['title'];
		 }
		 
		 if(empty($_SESSION['files_get'])){
		 	$data = 'not';
		 }


		 // $data = $_SESSION['files_get'];
			$i = 0;
		  	// $to_email = 'ankitnagarwal0005@gmail.com';
		  foreach ($to_emails as $to_email):
		  	
         	$from_email = 'ankitnagarwal5@gmail.com';
         	$sender_name = 'ankit';
				$config['protocol'] = 'smtp';
				$config['smtp_host'] = 'ssl://smtp.gmail.com';
				$config['smtp_port'] = '465';
				$config['smtp_user'] = 'ankitnagarwal5@gmail.com';
				$config['smtp_pass'] = 'fdnojlihvgexyhvq';
				$config['mailtype'] = 'html';
				$config['charset'] = 'utf-8';
				$config['newline'] = "\r\n";

				$this->email->initialize($config);

				$this->email->from($from_email, $sender_name);
				$this->email->to($to_email);
				$this->email->subject($email_subject);
				$this->email->message($email_massage);

				if(!empty($data)){

				//Path to the photo file
				// $photo_path =  "./assets/image/".$data['image_metadata']['file_name'];

			

				//Attach the photo
				// $this->email->attach($photo_path);
				}

				if ($this->email->send()) {

					$this->load->database();
					$d = $this->db->query("select * from user_email where email = '$to_email'");
					$res = $d->result_array();



					$sendind_time = $this->db->query("select * from report_data where email = '$to_email'");
					$sendind_time_set = $sendind_time->result_array();
					if(empty($sendind_time_set)){
						$sendind_time_change = 1;
					}
					foreach ($sendind_time_set as $s_t_s) {
						$s_t = $s_t_s['sending_time'];
						$sendind_time_change = $s_t + 1;

					}
					

					foreach ($res as $r):
						$name = $r["frist_name"];
					$Arr = array(
						"name" => $name,  
						"email" => $to_email,
						"catagary" => $r["catagary"],
						"camaping" => $campaing,
						"sending_email" => $from_email,
						"subject" => $email_subject,
						"massage" => $email_massage,
						"sending_time" => $sendind_time_change,
						"sending_date" => date("y-m-d h:i:s"),
						"delivered" => 1,
						"delivered_date" => date('y-m-d h:i:s'), 
						"seen" => 1, 
						"opening_date" => date('y-m-d h:i:s')
					);

					$chack = $this->db->insert('report_data',$Arr);
					
					endforeach;

        		}else{
        			$this->load->database();
					$d = $this->db->query("select * from user_email where email = '$to_email'");
					$res = $d->result_array();

					$sendind_time = $this->db->query("select * from report_data where email = '$to_email'");
					$sendind_time_set = $sendind_time->result_array();
					if(empty($sendind_time_set)){
						$s_t = 0;
					}
					foreach($sendind_time_set as $s_t_s) {
						$s_t = $s_t_s['sending_time'];

						$sendind_time_change = $s_t + 1;
					}



					foreach ($res as $r):
						
					$Arr = array(
						"name" => $r["frist_name"],  
						"email" => $to_email,
						"catagary" => $r["catagary"],
						"sending_email" => $from_email,
						"subject" => $email_subject,
						"massage" => $email_massage,
						"sending_time" => $sendind_time_change,
						"camaping" => $campaing,
						"sending_date" => 0,
						"delivered" => 0,
						"delivered_date" => 0,
						"seen" => 0,  
						"opening_date" => 0
					);

					$chack = $this->db->insert('report_data',$Arr);
					if($chack){
						
					}
					endforeach;
        		}
        		$i++;
        	endforeach;
        	$email_subject = $_SESSION['subject'];
			$email_massage = $_SESSION['massage'];
			$Arr = array(
				"subject" => $email_subject,
				"massage" => $email_massage,
				"camaping" => $campaing
			);
			$this->load->database();
			$q = $this->db->insert('save_email',$Arr);
			if($q){
				redirect(base_url('HOME/email_sent'));
			}
        	redirect(base_url());
        	// redirect(base_url('Home'));


	}
	public function email_save_process(){
		$id = $_SESSION['compaint_id'];
		 			
		 $this->load->database();
		 $camp =  $this->db->query("select * from create_campaing where id = '$id'");
		 $cam = $camp->result_array();

		 foreach($cam as $c){
		 	$campaing = $c['title'];
		 }
		 
		 if(empty($_SESSION['files_get'])){
		 	$data = 'not';
		 }
		$email_subject = $_SESSION['subject'];
		$email_massage = $_SESSION['massage'];

		if(empty($email_subject)){
			$this->session->set_userdata('please_insert_save_mail_data', 'Please Enter Subject');
			redirect(base_url('USER/PROJECTMAIL/index/'.$id));
		}
		if(empty($email_massage)){
			$this->session->set_userdata('please_insert_save_mail_data', 'Please Enter Massage');
			redirect(base_url('USER/PROJECTMAIL/index/'.$id));
		}


		$Arr = array(
			"subject" => $email_subject,
			"massage" => $email_massage,
			"camaping" => $campaing
		);
		$this->load->database();
		$q = $this->db->insert('save_email',$Arr);
		if($q){
			redirect(base_url('HOME/email_sent'));
		}
	}
	



}




