<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Kolkata');
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class IMPORT_CONTACT extends CI_Controller {

	
	public function index($rowno=0)
	{
		$rowintable = $this->input->post('rowintable');

		$this->load->model('Member');
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
 	
    $allcount = $this->Member->getrecordCount($search_text);

    $users_record = $this->Member->getData($rowno,$rowperpage,$search_text);
 
    $config['base_url'] = base_url().'USER/IMPORT_CONTACT/index/';
    $config['use_page_numbers'] = TRUE;
    $config['total_rows'] = $allcount;
    $config['per_page'] = $rowperpage;

    $this->pagination->initialize($config);
 
    $data['pagination'] = $this->pagination->create_links();
    $data['result'] = $users_record;
    $data['rowno'] = $rowno;
    $data['search'] = $search_text;

  
		$this->load->view('website/contacts',$data);
	}
	public function DATA()
	{
		$this->load->database();
		$qu = $this->db->query('select * from catagary');
		$result['results']  = $qu->result_array();
		$this->load->view('website/email_data_import',$result);
	}

	public function import($data = array()){
		$catagary = $this->input->post('shirts');

	 	$data = array();
        $memData = array();
        
        // If import request is submitted
        if($this->input->post('importSubmit')){
            
                $insertCount = $updateCount = $rowCount = $notAddCount = 0;
                
                if(is_uploaded_file($_FILES['file']['tmp_name'])){
                    $this->load->library('CSVReader');
                    
                    $csvData = $this->csvreader->parse_csv($_FILES['file']['tmp_name']);
                    
                    if(!empty($csvData)){
                        foreach($csvData as $row){ 
                        	$rowCount++;
                            
                            $memData = array(
                                'frist_name' => $row['frist_name'],
                                'last_name' => $row['last_name'],
                                'email' => $row['Email'],
                                'mobile' => $row['Phone'],
                                'catagary' => $catagary,
                                'date' => date("M,d,Y h:i:s")
                            );
                            
                            $con = array(
                                'where' => array(
                                    'email' => $row['Email']
                                ),
                                'returnType' => 'count'
                            );
                            $this->load->model('member');
                            $prevCount = $this->member->getRows($con);
                            
                            if($prevCount > 0){
                            	
                                $condition = array('email' => $row['Email']);
                                
                                    $updateCount++;
                               
                            }else{
                                $insert = $this->member->insert($memData);
                                
                                if($insert){
                                    $insertCount++;
                                }
                                echo "heloo";
                            }
                        }
                        
                        $notAddCount = ($rowCount - ($insertCount + $updateCount));
                        $successMsg = 'Members imported successfully. Total Rows ('.$rowCount.') | Inserted ('.$insertCount.') | Updated ('.$updateCount.') | Not Inserted ('.$notAddCount.')';
                        $this->session->set_userdata('success_msg', $successMsg);
                        redirect(base_url('USER/IMPORT_CONTACT/'));
                    }
                }else{
                    $this->session->set_userdata('error_msg', 'Error on file upload, please try again.');
                    echo "hello";
                }
            
        }
        
    }
    
   
    public function file_check($str){
        $allowed_mime_types = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain');
        if(isset($_FILES['file']['name']) && $_FILES['file']['name'] != ""){
            $mime = get_mime_by_extension($_FILES['file']['name']);
            $fileAr = explode('.', $_FILES['file']['name']);
            $ext = end($fileAr);
            if(($ext == 'csv') && in_array($mime, $allowed_mime_types)){
                return true;
            }else{
                $this->form_validation->set_message('file_check', 'Please select only CSV file to upload.');
                return false;
            }
        }else{
            $this->form_validation->set_message('file_check', 'Please select a CSV file to upload.');
            return false;
        }
    }

    public function EXPORT(){
    	$storData = array();
        $metaData[] = array('id' => 'id' ,'first_name' => 'FirstName', 'last_name' => 'LastName', 'email' => 'Email', 'mobile' => 'Mobile', 'catagary' => 'Catagary', 'date' => 'Date');       
        $this->load->model('Member');
        $customerInfo = $this->Member->getuserList();
        // echo "<pre>";
        // print_r($customerInfo);
        // die; 
        foreach($customerInfo as $element) {
            $storData[] = array(
            	'id' => $element['id'],
                'first_name' => $element['frist_name'],
                'last_name' => $element['last_name'],
                'email' => $element['email'],
                'mobile' => $element['mobile'],
                'catagary' => $element['catagary'],
                'date' => $element['date']

            );
            // print_r($storData);


        }
        $data = array_merge($metaData,$storData);
        header("Content-type: application/csv");
        header("Content-Disposition: attachment; filename=\"csv-sample-customer".".csv\"");
        header("Pragma: no-cache");
        header("Expires: 0");
        $handle = fopen('php://output', 'w');
        foreach ($data as $data) {
            fputcsv($handle, $data);
        }
            fclose($handle);
        exit;
    }
	
	}
	
