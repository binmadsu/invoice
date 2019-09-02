<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class categories extends CI_Controller{
	public function __construct(){
	    parent::__construct();
	    is_logged_in();
	    $this->load->model('m_category');
	}
	
	public function index($gallerytype=''){
	
		$this->load->library('ckeditor');
		$this->load->library('ckfinder');
		$data=array();
		$this->ckeditor->basePath = base_url().'assets/ckeditor/';
		$this->ckeditor->config['language']= 'eng';
		$this->ckeditor->config['width'] = '630px';
		$this->ckeditor->config['height'] = '300px';
		$this->ckeditor->config['filebrowserUploadUrl'] = base_url().'/admin/categories/upload';
		$this->ckeditor->config['fillEmptyBlocks'] = false;
		$this->ckeditor->config['allowedContent'] = true;
		//$this->ckeditor->config['extraAllowedContent'] = 'span section class ul ol li';
		$this->load->helper(array('form'));
	    $this->load->library('form_validation');
		if($_SERVER['REQUEST_METHOD'] == 'POST')
		{
			$this->form_validation->set_rules('title', 'Title', 'required');
			$this->form_validation->set_rules('category_description', 'Description', 'required');
			if($this->form_validation->run() == true)
	   		{
	   			if($gallerytype){
					$this->m_category->addpage($gallerytype);
					$this->session->set_flashdata('msg', 'Category added successfully!');
					redirect('admin/categories/listing/0/'.$gallerytype, 'refresh');
				}
			}
	 	}
	 	/*$data['categories'] = array(
			array('id'=>'','title'=>'None'),
	 		array('id'=>'residence','title'=>'Residence'),
	 		array('id'=>'corporate','title'=>'Corporate'));*/
	   	$this->load->view('category/add_view',$data);
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
	function listing($offset=0,$gallerytype=0){
		
		$this->load->helper('form');
		$limit = pagination_count;
		//echo $limit;
		/*
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
		*/
		$data['datarows'] = $this->m_category->listing($limit,$offset,$gallerytype);
		$config['total_rows'] = $this->m_category->count_all($gallerytype);
		/* pagination start */
		$this->load->library('pagination');
		//$search_parameter="/$startdate/$enddate/$specificOption/$specificValue";
		$search_parameter="/$gallerytype";
		$config['first_url'] = site_url("admin/categories/listing/0/".$search_parameter);
		$config['suffix']= $search_parameter;
		//$config['first_url'] = site_url("admin/categories/listing/0/");
		$config['base_url'] = site_url("admin/categories/listing/");
		$config['per_page'] = $limit; 
		$config['uri_segment'] = 4;
		$this->pagination->initialize($config);
		$data["links"] = $this->pagination->create_links();
		$data['page'] = $offset;
		/*******/
		/*
		$data['startdate'] = $startdate;
		$data['enddate'] = $enddate;
		$data['specificOption'] = $specificOption;
		$data['specificValue'] = $specificValue;
		*/
		$this->load->view('category/view_list',$data);
	}

	//edit pages
	function edit($id,$gallerytype)
	{
		//add ckeditor tools
		$this->load->library('ckeditor');
		$this->load->library('ckfinder');
		
		$data=array();
		$this->load->helper(array('form'));
		$data['datarows'] = $this->m_category->page_info($id);
		/*$data['categories'] = array(
			array('id'=>'','title'=>'None'),
	 		array('id'=>'residence','title'=>'Residence'),
	 		array('id'=>'corporate','title'=>'Corporate'));*/
		$this->load->view('category/edit_view',$data);

		$this->ckeditor->basePath = base_url().'assets/ckeditor/';
		$this->ckeditor->config['language']= 'eng';
		$this->ckeditor->config['width'] = '630px';
		$this->ckeditor->config['height'] = '300px';  
		$this->ckeditor->config['filebrowserUploadUrl'] = base_url().'/admin/categories/upload';
		$this->ckeditor->config['fillEmptyBlocks'] = false;
		$this->ckeditor->config['allowedContent'] = true;
		//$this->ckeditor->config['extraAllowedContent'] = 'span section class ul ol li';
		//add ckeditor tools
		$this->load->library('form_validation');
		if(!empty($_POST)){
			$this->form_validation->set_rules('title', 'Title', 'required');
			$this->form_validation->set_rules('category_description', 'Description', 'required');
		}
		if($this->form_validation->run() == true)
		{
			//echo $user_id;die;
			$msg = $this->m_category->index($id,$gallerytype);
			if(!empty($msg)){
			   $this->session->set_flashdata('msg', 'Category Updated Successfully');
			}
			redirect('/admin/categories/listing/0/'.$gallerytype);
		}
	}
	
	function delete($pageid,$gallerytype){
		if($this->m_category->delete($pageid))
			$this->session->set_flashdata('msg', 'Category Deleted Successfully');
		redirect('/admin/categories/listing/0/'.$gallerytype,'refresh');
	}
	
	function status($id,$status){
		if($this->m_category->status($id,$status))
			$this->session->set_flashdata('msg', 'Category Updated Successfully');
		redirect('/admin/categories/listing/','refresh');
	}

	function priority()
	{
		$id=$_GET['id'];
		$priority=$_GET['p'];
		$this->m_category->Updatepriority($id,$priority);
	}
}