<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class weddings extends CI_Controller{
	public function __construct(){
	    parent::__construct();
	    is_logged_in();
	    $this->load->model('m_weddings');
	}
	
	public function index(){
		
		$this->load->library('ckeditor');
		$this->load->library('ckfinder');
		$this->ckeditor->basePath = base_url().'assets/ckeditor/';
		$this->ckeditor->config['language']= 'eng';
		$this->ckeditor->config['width'] = '630px';
		$this->ckeditor->config['height'] = '300px'; 
		//$this->ckeditor->config['filebrowserUploadUrl'] = base_url().'testing.php';
		$this->ckeditor->config['filebrowserUploadUrl'] = base_url().'/admin/weddings/upload';
		
		$data = array();
		$data['tickettypes'] = getTicketType();
		$data['packages'] = getPackages();
		$this->load->helper(array('form'));
	    $this->load->library('form_validation');
		if($_SERVER['REQUEST_METHOD'] == 'POST')
		{
			//$this->form_validation->set_message('is_unique', 'This %s is already used');
			$this->form_validation->set_rules('wedding_title', 'Wedding Title', 'required');
			$this->form_validation->set_rules('wedding_startdate', 'Wedding Start Date', 'required');
			$this->form_validation->set_rules('wedding_enddate', 'Wedding End Date', 'required');
			$this->form_validation->set_rules('location', 'Wedding Location', 'required');
			$this->form_validation->set_rules('venue', 'Venue', 'required');
			if($this->form_validation->run() == true)
	   		{
				$this->m_weddings->addpage();
				$this->session->set_flashdata('msg', 'Record added successfully!');
				redirect('admin/weddings/listing', 'refresh');
			}
	 	}
	 	//pr($data);die;
	   	$this->load->view('weddings/add_view',$data);
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
		
	//function listing($offset=0,$startdate=0,$enddate=0,$specificOption=0,$specificValue=0){
	function listing($offset=0){
		$this->load->helper('form');
		$limit = 100; //pagination_count;
		//echo $limit;
		$data['datarows'] = $this->m_weddings->listing($limit,$offset);
		//echo"<pre>";print_r($data['datarows']);die;
		$config['total_rows'] = $this->m_weddings->count_all();
		/* pagination start */
		$this->load->library('pagination');
		//$search_parameter="/$startdate/$enddate/$specificOption/$specificValue";
		//$config['first_url'] = site_url("admin/banner/listing/0/".$search_parameter);
		//$config['suffix']= $search_parameter;
		$config['first_url'] = site_url("admin/weddings/listing/0/");
		$config['base_url'] = site_url("admin/weddings/listing/");
		$config['per_page'] = $limit; 
		$config['uri_segment'] = 4;
		$this->pagination->initialize($config); 
		$data["links"] = $this->pagination->create_links();
		$data['page'] = $offset;
		/*******/
		$this->load->view('weddings/view_list',$data);
	}
	
	// Edit Content
	function edit($id)
	{
		//add ckeditor tools
		$this->load->library('ckeditor');
		$this->load->library('ckfinder');
		$this->ckeditor->basePath = base_url().'assets/ckeditor/';
		$this->ckeditor->config['language']= 'eng';
		$this->ckeditor->config['width'] = '630px';
		$this->ckeditor->config['height'] = '300px'; 
		//$this->ckeditor->config['filebrowserUploadUrl'] = base_url().'testing.php'; 	
		$this->ckeditor->config['filebrowserUploadUrl'] = base_url().'/admin/weddings/upload';
		//add ckeditor tools
		
		$data = array();
		$data['tickettypes'] = getTicketType();
		$data['packages'] = getPackages();
		$this->load->library('form_validation');
		if(!empty($_POST)){
			//$this->form_validation->set_message('is_unique', 'This %s is already used');
			$this->form_validation->set_rules('wedding_title', 'Wedding Title', 'required');
			$this->form_validation->set_rules('wedding_startdate', 'Wedding Start Date', 'required');
			$this->form_validation->set_rules('wedding_enddate', 'Wedding End Date', 'required');
			$this->form_validation->set_rules('location', 'Wedding Location', 'required');
			$this->form_validation->set_rules('venue', 'Venue', 'required');
		}
		if($this->form_validation->run() == true)
		{
			$msg = $this->m_weddings->index($id);
			if(!empty($msg)){
			   $this->session->set_flashdata('msg', 'Record Updated successfully');
			}
			redirect('/admin/weddings/listing'.$page.'/');
		}else{
			//$data['gallery'] = gethandoverCategories();
			$data['datarows'] = $this->m_weddings->page_info($id);
			$this->load->view('weddings/edit_view',$data);
		}
	}
	
	function delete($pageid){
		if($this->m_weddings->delete($pageid))
			$this->session->set_flashdata('msg', 'Record Deleted successfully');
		redirect('/admin/weddings/listing/','refresh');
	}
	
	function status($id,$status){
		if($this->m_weddings->status($id,$status))
			$this->session->set_flashdata('msg', 'Record Updated successfully');
		redirect('/admin/weddings/listing/','refresh');
	}

	function priority()
	{
		$id=$_GET['id'];
		$priority=$_GET['p'];
		$this->m_weddings->Updatepriority($id,$priority);
	}

	function weddingstatus()
	{
		$id=$_GET['id'];
		$status=$_GET['p'];
		$this->m_weddings->status($id,$status);
	}
}