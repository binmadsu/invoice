<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class tradepartner extends CI_Controller{
	public function __construct(){
	    parent::__construct();
	    is_logged_in();
	    $this->load->model('m_tradepartner');
	}
	
	public function index(){
	}

	function addBanner(){
		$this->load->library('ckeditor');
		$this->load->library('ckfinder');
		$data=array();
		$this->ckeditor->basePath = base_url().'assets/ckeditor/';
		$this->ckeditor->config['language']= 'eng';
		$this->ckeditor->config['width'] = '630px';
		$this->ckeditor->config['height'] = '300px'; 
		//$this->ckeditor->config['filebrowserUploadUrl'] = base_url().'testing.php'; 	
		$this->ckeditor->config['filebrowserUploadUrl'] = base_url().'/admin/tradepartner/upload';
		//$this->load->helper(array('form'));
	    $this->load->library('form_validation');
		if($_SERVER['REQUEST_METHOD'] == 'POST')
		{
			//$this->form_validation->set_rules('title', 'Banner Title', 'required');
			//$this->form_validation->set_rules('description', 'Banner Description', 'required');
			
			//if($this->form_validation->run() == true)
	   		//{	
				$this->m_tradepartner->addpage();
				$this->session->set_flashdata('msg', 'Banner added successfully!');
				redirect('admin/tradepartner/listing', 'refresh');
			//}
	 	}
	   	//$this->load->view('tradepartner/add_tradepartner',$data);
	}
	
	function upload()
	{
	
		$time = time();

		$url = 'uploads/tradepartners/'.$_FILES['upload']['name'];

		//extensive suitability check before doing anything with the file...
		if (($_FILES['upload'] == "none") OR (empty($_FILES['upload']['name'])) )
		{
		$message = "No file uploaded.";
		}
		else if ($_FILES['upload']["size"] == 0)
		{
		$message = "The file is of zero length.";
		}
		else if (($_FILES['upload']["type"] != "image/pjpeg") AND ($_FILES['upload']["type"] != "image/jpeg") AND ($_FILES['upload']["type"] != "image/png"))
		{
		$message = "The image must be in either JPG or PNG format. Please upload a JPG or PNG instead.";
		}
		else if (!is_uploaded_file($_FILES['upload']["tmp_name"]))
		{
		$message = "You may be attempting to hack our server. We're on to you; expect a knock on the door sometime soon.";
		}
		else {
		$message = "";
		@move_uploaded_file($_FILES['upload']['tmp_name'], "uploads/".$_FILES['upload']['name']);
		//$move = @ move_uploaded_file($_FILES['upload']['tmp_name'], $url);
		$url = base_url().'uploads/tradepartners/'.$_FILES['upload']['name'];
		}
		 
		$CKEditorFuncNum = $_GET['CKEditorFuncNum'] ;
		echo "<script type='text/javascript'>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$message');</script>";
	}

	function listing($offset=0,$startdate=0,$enddate=0,$specificOption=0,$specificValue=0){			
		
		//Add new tradepartner
		$this->addBanner();
		////////////////		
		//$this->load->helper('form');

		$limit = pagination_count;
		//echo $limit;
		if($this->input->post('startdate')!='')
		{
			$startdate=$this->input->post('startdate');
		}
		if($this->input->post('enddate')!='')
		{
			$enddate=$this->input->post('enddate');
		}
		if($this->input->post('specificOption')!='')
		{
			$specificOption=$this->input->post('specificOption');
		}
		if($this->input->post('specificValue')!='')
		{
			$specificValue=$this->input->post('specificValue');
		}
		$data['tradepartners'] = $this->m_tradepartner->listing($limit,$offset,$startdate,$enddate,$specificOption,$specificValue);
		$config['total_rows'] = $this->m_tradepartner->count_all($startdate,$enddate,$specificOption,$specificValue);
		/* pagination start */
		$this->load->library('pagination');
		$search_parameter="/$startdate/$enddate/$specificOption/$specificValue";
		$config['first_url'] = site_url("admin/tradepartner/listing/0/".$search_parameter);
		$config['suffix']= $search_parameter;
		$config['base_url'] = site_url("admin/tradepartner/listing/");
		$config['per_page'] = $limit; 
		$config['uri_segment'] = 4;
		$this->pagination->initialize($config); 
		$data["links"] = $this->pagination->create_links();
		$data['page'] = $offset;
		/*******/
		$data['startdate'] = $startdate;
		$data['enddate'] = $enddate;
		$data['specificOption'] = $specificOption;
		$data['specificValue'] = $specificValue;
		
		$this->load->view('tradepartner/view_tradepartner',$data);
	}

	//edit pages
	function edit($id)
	{
		//echo '<pre>';print_r($_FILES);die;
		//add ckeditor tools
		$this->load->library('ckeditor');
		$this->load->library('ckfinder');
		
		$data=array();
		$this->load->helper(array('form'));
		$data['tradepartners'] = $this->m_tradepartner->page_info($id);

		$this->ckeditor->basePath = base_url().'assets/ckeditor/';
		$this->ckeditor->config['language']= 'eng';
		$this->ckeditor->config['width'] = '630px';
		$this->ckeditor->config['height'] = '300px';  
		$this->ckeditor->config['filebrowserUploadUrl'] = base_url().'/admin/tradepartner/upload'; 
		//add ckeditor tools
		//$this->load->library('form_validation');
		if(isset($_FILES['tradepartner_image']['error']) and $_FILES['tradepartner_image']['error'] == 0){
			$msg = $this->m_tradepartner->index($id);
			if(!empty($msg)){
			   $this->session->set_flashdata('msg', 'Banner Updated successfully');
			}
			redirect('/admin/tradepartner/listing/'.$page.'/');
		}elseif(isset($_FILES['tradepartner_image']['error']) and $_FILES['tradepartner_image']['error'] != 0){
			redirect('/admin/tradepartner/listing/'.$page.'/');
		}
		$this->load->view('tradepartner/edit_tradepartner',$data);
		/*
		$this->load->library('form_validation');
		 if(!empty($_POST)){
			$this->form_validation->set_rules('title', 'Banner Title', 'required');
			$this->form_validation->set_rules('description', 'Banner Description', 'required');
		 }
	 
		if($this->form_validation->run() == true)
		{
			//echo $user_id;die;
			$msg = $this->m_tradepartner->index($id);
			if(!empty($msg)){
			   $this->session->set_flashdata('msg', 'Page Updated successfully');
			}
			redirect('/admin/tradepartner/listing/'.$page.'/');
		}
		else{
			$this->load->helper(array('form'));
			$data['tradepartners'] = $this->m_tradepartner->page_info($id);
			$this->load->view('tradepartner/edit_tradepartner',$data);
		}
		*/
	}
	
	// delete payment entry
	function delete($pageid){
		//isUserPermission('delete_user');
		if($this->m_tradepartner->delete($pageid))
			$this->session->set_flashdata('msg', 'Banner Deleted successfully');
			redirect('/admin/tradepartner/listing/','refresh');
	}
	
	public function logout()
	{
		$CI =& get_instance();
		$is_logged_in = $CI->session->userdata('shuttle_admin');
		//pr($CI->session->userdata); die;
		if(!empty($is_logged_in))
		{
			$this->m_admin->logoutTime($is_logged_in['id']);
			$this->session->sess_destroy();
			redirect('admin/login');  
			die();
		}
		redirect('admin/login');
	}

	function status($id,$status){
		//isUserPermission('status_user');
		//echo $status;die;
		if($this->m_tradepartner->status($id,$status))
			$this->session->set_flashdata('msg', 'Banner Updated successfully');
			redirect('/admin/tradepartner/listing/','refresh');
	}

	function priority()
	{
		$id=$_GET['id'];
		$priority=$_GET['p'];
		$this->m_tradepartner->Updatepriority($id,$priority);
	}

	function content(){
		$this->load->library('ckeditor');
		$this->load->library('ckfinder');
		$data=array();
		$this->ckeditor->basePath = base_url().'assets/ckeditor/';
		$this->ckeditor->config['language']= 'eng';
		$this->ckeditor->config['width'] = '630px';
		$this->ckeditor->config['height'] = '300px'; 
		//$this->ckeditor->config['filebrowserUploadUrl'] = base_url().'testing.php'; 	
		$this->ckeditor->config['filebrowserUploadUrl'] = base_url().'/admin/tradepartner/upload';
		//$this->load->helper(array('form'));
	    $this->load->library('form_validation');
	    $data['row'] = getDynamicContent('home');
		if($_SERVER['REQUEST_METHOD'] == 'POST')
		{
			$this->form_validation->set_rules('content1', 'Description 1', 'required');
			$this->form_validation->set_rules('content2', 'Description 2', 'required');
			if($this->form_validation->run() == true)
	   		{
				$status = $this->m_tradepartner->addhomecontent();
				if($status == 1)
					$this->session->set_flashdata('homemsg', 'Home content added successfully!');
				if($status == 2)
					$this->session->set_flashdata('homemsg', 'Home content updated successfully!');
				redirect('admin/tradepartner/content', 'refresh');
			}
	 	}
	 	//pr($data);die;
	   	$this->load->view('tradepartner/add_home_content',$data);
	}
}