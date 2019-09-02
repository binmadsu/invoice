<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
ob_start();
class import extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		$this->load->helper(array('form'));
	    $this->load->library('form_validation');
		$this->load->model('m_import');
	}

	public function export_orders(){

		$data = $this->m_import->getOrders();
		header("Content-type: application/csv");
		header("Content-Disposition: attachment; filename=\"orders".".csv\"");
		header("Pragma: no-cache");
		header("Expires: 0");

		$handle = fopen('php://output', 'w');
		fputcsv($handle, array('Name','Email','Phone','Address','TransactionId','Amount','Currency','Status','Gateway','Paid On'));
		foreach ($data as $data) {
		    fputcsv($handle, $data);
		}
		fclose($handle);exit;
	}

	public function export_enquiry(){

		$data = $this->m_import->getEnquiries();
		header("Content-type: application/csv");
		header("Content-Disposition: attachment; filename=\"enquiries".".csv\"");
		header("Pragma: no-cache");
		header("Expires: 0");

		$handle = fopen('php://output', 'w');
		fputcsv($handle, array('Name','Email','Contact','Subject','Message','Enquired For','Source URL','Enquired On'));
		foreach ($data as $data) { 
		    fputcsv($handle, $data);
		}
		fclose($handle);exit;
	}

	public function export_newsletter(){

		$data = $this->m_import->getNewsletters();
		header("Content-type: application/csv");
		header("Content-Disposition: attachment; filename=\"newsletters".".csv\"");
		header("Pragma: no-cache");
		header("Expires: 0");

		$handle = fopen('php://output', 'w');
		fputcsv($handle, array('Subscriber Email','Enquired On'));
		foreach ($data as $data) { 
		    fputcsv($handle, $data);
		}
		fclose($handle);exit;
	}

	/*public function upload(){

		$data=array();
		$data['error'] = '';    //initialize image upload error array to empty
		//$data['schools'] = $this->m_import->getSchools();
		//if ($this->input->server('REQUEST_METHOD') == 'POST'){
	 		$csvfilepath = 'uploads/imports/nirvikar_price.csv';
	        $config['upload_path'] = $csvfilepath;
	        $config['allowed_types'] = 'csv';
	        $config['max_size'] = 1024 * 10;

	        $this->load->library('upload', $config);

	        // If upload failed, display error
	        if (!$this->upload->do_upload('filepath')) {
	            //$data['error'] = $this->upload->display_errors();
	        //} else {
	        	$msg = '';
		        $file_data = $this->upload->data();
		        //pr($file_data);die;
		        $file_path =  $csvfilepath.$file_data['file_name'];
		        //$status = $this->m_import->uploadFileData($file_path);
		        //pr($status);die;
		        $handle = fopen($file_path, "r");
				$c = 0;
				while(($filesop = fgetcsv($handle, 1000, ",")) !== false)
				{
					//pr($filesop);continue;
					//if($c==0)continue;
					$c = $c + 1;
					// Insert data here.
					$data = array(
						'price' => isset($filesop[2])?$filesop[2]:0,
						'discounted_price' =>isset($filesop[3])?$filesop[3]:0,
						
					);
					if($c!=0){
					$msg = $this->m_import->edit_Price($data,$filesop[0],$filesop[1]);
					}
					
				}
				die;
				//pr($data);die;
				if($msg){
					$this->session->set_flashdata('success', "You database has imported successfully. You have inserted ". $c ." records");
					$this->session->set_flashdata('error','');
				}else{
					$this->session->set_flashdata('error',"Sorry! There is some problem.");
					$this->session->set_flashdata('success','');
				}
	        //}
		}
		$this->load->view('import/view_import',$data);
	}*/
}