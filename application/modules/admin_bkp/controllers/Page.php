<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class page extends CI_Controller{
	public function __construct(){
	    parent::__construct();
	    is_logged_in();
	    $this->load->model('m_page');
	}
	
	public function index(){
		$this->load->library('ckeditor');
		$this->load->library('ckfinder');
		$data=array();
		$this->ckeditor->basePath = base_url().'assets/ckeditor/';
		$this->ckeditor->config['language']= 'eng';
		$this->ckeditor->config['width'] = '630px';
		$this->ckeditor->config['height'] = '300px'; 
		//$this->ckeditor->config['filebrowserUploadUrl'] = base_url().'testing.php';
		$this->ckeditor->config['filebrowserUploadUrl'] = base_url().'/admin/page/upload';
		$this->ckeditor->config['fillEmptyBlocks'] = false;
		$this->ckeditor->config['allowedContent'] = true;
		$this->ckeditor->config['extraAllowedContent'] = 'span section class ul ol li';
		$this->load->helper(array('form'));
	    $this->load->library('form_validation');
		if($_SERVER['REQUEST_METHOD'] == 'POST')
		{
			$this->form_validation->set_rules('page_title', 'Page Title', 'required');
			//$this->form_validation->set_rules('page_content', 'Content', 'required');
			$this->form_validation->set_rules('page_slug', 'Page Slug', 'required|is_unique[tbl_pages.page_slug]');
			if($this->form_validation->run() == true)
	   		{	
				$this->m_page->addpage();
				$this->session->set_flashdata('msg', 'Page added successfully!');
				redirect('admin/page/listing', 'refresh');
			}
	 	}
	   	$this->load->view('page/add_page',$data);
	}
	
	function upload()
	{
		$time = time();
		$url = 'uploads/'.$_FILES['upload']['name'];

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
		  

			$url = base_url().'uploads/'.$_FILES['upload']['name'];
			}
			 
			$CKEditorFuncNum = $_GET['CKEditorFuncNum'] ;
			echo "<script type='text/javascript'>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$message');</script>";	
	}
		
	function listing($offset=0,$startdate=0,$enddate=0,$specificOption=0,$specificValue=0){			
		
		$this->load->helper('form');
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
		$data['pages'] = $this->m_page->listing($limit,$offset,$startdate,$enddate,$specificOption,$specificValue);
		$config['total_rows'] = $this->m_page->count_all($startdate,$enddate,$specificOption,$specificValue);
		/* pagination start */
		$this->load->library('pagination');
		$search_parameter="/$startdate/$enddate/$specificOption/$specificValue";
		$config['first_url'] = site_url("admin/page/listing/0/".$search_parameter);
		$config['suffix']= $search_parameter;
		$config['base_url'] = site_url("admin/page/listing/");
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
		
		$this->load->view('page/view_page',$data);
	}

	//edit pages
	function edit($id)
	{
		//add ckeditor tools
		$this->load->library('ckeditor');
		$this->load->library('ckfinder');
		$data=array();
		$this->ckeditor->basePath = base_url().'assets/ckeditor/';
		$this->ckeditor->config['language']= 'eng';
		$this->ckeditor->config['width'] = '630px';
		$this->ckeditor->config['height'] = '300px';  
		$this->ckeditor->config['filebrowserUploadUrl'] = base_url().'/admin/page/upload'; 
		$this->ckeditor->config['fillEmptyBlocks'] = false;
		$this->ckeditor->config['allowedContent'] = true;
		$this->ckeditor->config['extraAllowedContent'] = 'span section class ul ol li';
		//add ckeditor tools
	
		$this->load->library('form_validation');
		 if(!empty($_POST)){
			$this->form_validation->set_rules('page_title', 'Page Title', 'required');
			//$this->form_validation->set_rules('page_content', 'Content', 'required');
			//$this->form_validation->set_rules('page_slug', 'Page Slug', 'required');
		 }
	 
		if($this->form_validation->run() == true)
		{
			//echo $user_id;die;
			$msg = $this->m_page->index($id);
			if(!empty($msg)){
			   $this->session->set_flashdata('msg', 'Page Updated successfully');
			}
			redirect('/admin/page/listing/'.$page.'/');
		}
		else{
			//$data['role'] =  $this->m_page->role();
			$this->load->helper(array('form'));
			$data['pages'] = $this->m_page->page_info($id);
			//pr($data);die;
			$this->load->view('page/edit_page',$data);
		}
	}
	
	// delete payment entry
	function delete($pageid){
		//isUserPermission('delete_user');
		if($this->m_page->delete($pageid))
			$this->session->set_flashdata('msg', 'Page Deleted successfully');
			redirect('/admin/page/listing/','refresh');
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
		if($this->m_page->status($id,$status))
			$this->session->set_flashdata('msg', 'Page Updated successfully');
			redirect('/admin/page/listing/','refresh');
	}
}