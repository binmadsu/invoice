<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class services extends CI_Controller{
	public function __construct(){
	    parent::__construct();
	    is_logged_in();
	    $this->load->model('m_services');
	}
	
	public function index(){
		
		$this->load->library('ckeditor');
		$this->load->library('ckfinder');
		$this->ckeditor->basePath = base_url().'assets/ckeditor/';
		$this->ckeditor->config['language']= 'eng';
		$this->ckeditor->config['width'] = '630px';
		$this->ckeditor->config['height'] = '300px'; 
		//$this->ckeditor->config['filebrowserUploadUrl'] = base_url().'testing.php';
		$this->ckeditor->config['filebrowserUploadUrl'] = base_url().'/admin/services/upload';
		
		$data = array();
		$data['packages'] = getPackages();
		$this->load->helper(array('form'));
	    $this->load->library('form_validation');
		if($_SERVER['REQUEST_METHOD'] == 'POST')
		{
			$this->form_validation->set_rules('hotel_name', 'Title', 'required');
			$this->form_validation->set_rules('location', 'Location', 'required');
			$this->form_validation->set_rules('price', 'Price', 'required');
			$this->form_validation->set_rules('day', 'Day', 'required');
			if($this->form_validation->run() == true)
	   		{	
				$this->m_services->addpage();
				$this->session->set_flashdata('msg', 'Record added successfully!');
				redirect('admin/services/listing', 'refresh');
			}
	 	}
	 	//pr($data);die;
	   	$this->load->view('services/add_view',$data);
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
		$data['datarows'] = $this->m_services->listing($limit,$offset);
		//echo"<pre>";print_r($data['datarows']);die;
		$config['total_rows'] = $this->m_services->count_all();
		/* pagination start */
		$this->load->library('pagination');
		//$search_parameter="/$startdate/$enddate/$specificOption/$specificValue";
		//$config['first_url'] = site_url("admin/banner/listing/0/".$search_parameter);
		//$config['suffix']= $search_parameter;
		$config['first_url'] = site_url("admin/services/listing/0/");
		$config['base_url'] = site_url("admin/services/listing/");
		$config['per_page'] = $limit; 
		$config['uri_segment'] = 4;
		$this->pagination->initialize($config); 
		$data["links"] = $this->pagination->create_links();
		$data['page'] = $offset;
		/*******/
		$this->load->view('services/view_list',$data);
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
		//$this->ckeditor->config['filebrowserUploadUrl'] = base_url().'testing.php'; 	
		$this->ckeditor->config['filebrowserUploadUrl'] = base_url().'/admin/services/upload';
		//add ckeditor tools
		
		$data = array();
		$data['packages'] = getPackages();
		$this->load->library('form_validation');
		if(!empty($_POST)){
			$this->form_validation->set_rules('hotel_name', 'Title', 'required');
			$this->form_validation->set_rules('location', 'Location', 'required');
			$this->form_validation->set_rules('price', 'Price', 'required');
			$this->form_validation->set_rules('day', 'Day', 'required');
		}
		if($this->form_validation->run() == true)
		{
			$msg = $this->m_services->index($id);
			if(!empty($msg)){
			   $this->session->set_flashdata('msg', 'Record Updated successfully');
			}
			redirect('/admin/services/listing'.$page.'/');
		}else{
			//$data['gallery'] = gethandoverCategories();
			$data['datarows'] = $this->m_services->page_info($id);
			$this->load->view('services/edit_view',$data);
		}
	}
	
	function delete($pageid){
		if($this->m_services->delete($pageid))
			$this->session->set_flashdata('msg', 'Record Deleted successfully');
		redirect('/admin/services/listing/','refresh');
	}
	
	function status($id,$status){
		if($this->m_services->status($id,$status))
			$this->session->set_flashdata('msg', 'Record Updated successfully');
		redirect('/admin/services/listing/','refresh');
	}

	function priority()
	{
		$id=$_GET['id'];
		$priority=$_GET['p'];
		$this->m_services->Updatepriority($id,$priority);
	}
}