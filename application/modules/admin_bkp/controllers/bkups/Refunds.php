<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class refunds extends CI_Controller{
	public function __construct(){
	    parent::__construct();
	    is_logged_in();
	    $this->load->model('m_refunds');
	    /*if(isset($_POST['siteadminlang']) and !empty($_POST['siteadminlang'])){
		    $langid = @$_POST['siteadminlang'];
		    setCurrentLanguage($langid, true);
	    }*/
	}
	
	public function index(){
		//Add new refunds
		$this->addrefunds();
	}

	function addrefunds(){
		$this->load->library('ckeditor');
		$this->load->library('ckfinder');
		$data=array();
		$this->ckeditor->basePath = base_url().'assets/ckeditor/';
		$this->ckeditor->config['language']= 'eng';
		$this->ckeditor->config['width'] = '630px';
		$this->ckeditor->config['height'] = '300px';
		$this->ckeditor->config['filebrowserUploadUrl'] = base_url().'/admin/refunds/upload';
		$this->ckeditor->config['fillEmptyBlocks'] = false;
		$this->ckeditor->config['allowedContent'] = true;
		$this->ckeditor->config['extraAllowedContent'] = 'span section class ul ol li';
		$this->ckeditor->config['autoParagraph'] = false;
		$this->ckeditor->config['enterMode'] = 'CKEDITOR.ENTER_BR';
		//$this->load->helper(array('form'));
	    $this->load->library('form_validation');
		/*$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('banner_description', 'Description', 'required');*/
		if($_SERVER['REQUEST_METHOD'] == 'POST' && !isset($_POST['siteadminlang']))
   		{	
			$this->m_refunds->addpage();
			$this->session->set_flashdata('msg', 'Data added successfully!');
			redirect('admin/refunds/listing', 'refresh');
		}
	   	$this->load->view('refunds/add_refunds',$data);
	}
	
	function upload()
	{
		$time = time();
		$url = 'uploads/refundss/'.$_FILES['upload']['name'];

		//extensive suitability check before doing anything with the file...
		if (($_FILES['upload'] == "none") OR (empty($_FILES['upload']['name'])))
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
			$url = base_url().'uploads/refundss/'.$_FILES['upload']['name'];
		}
		
		$CKEditorFuncNum = $_GET['CKEditorFuncNum'];
		echo "<script type='text/javascript'>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$message');</script>";
	}

	function listing($offset=0,$startdate=0,$enddate=0,$specificOption=0,$specificValue=0){
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
		$data['refunds'] = $this->m_refunds->listing($limit,$offset,$startdate,$enddate,$specificOption,$specificValue);
		$config['total_rows'] = $this->m_refunds->count_all($startdate,$enddate,$specificOption,$specificValue);
		/* pagination start */
		$this->load->library('pagination');
		$search_parameter="/$startdate/$enddate/$specificOption/$specificValue";
		$config['first_url'] = site_url("admin/refunds/listing/0/".$search_parameter);
		$config['suffix']= $search_parameter;
		$config['base_url'] = site_url("admin/refunds/listing/");
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
		
		$this->load->view('refunds/view_refunds',$data);
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
		$data['refunds'] = $this->m_refunds->page_info($id);

		$this->ckeditor->basePath = base_url().'assets/ckeditor/';
		$this->ckeditor->config['language']= 'eng';
		$this->ckeditor->config['width'] = '630px';
		$this->ckeditor->config['height'] = '300px';  
		$this->ckeditor->config['filebrowserUploadUrl'] = base_url().'/admin/refunds/upload'; 
		$this->ckeditor->config['fillEmptyBlocks'] = false;
		$this->ckeditor->config['allowedContent'] = true;
		$this->ckeditor->config['extraAllowedContent'] = 'span section class ul ol li';
		$this->ckeditor->config['autoParagraph'] = false;
		$this->ckeditor->config['enterMode'] = 'CKEDITOR.ENTER_BR';
		//add ckeditor tools
		$this->load->library('form_validation');
		/*$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('banner_description', 'Description', 'required');*/
		if($_SERVER['REQUEST_METHOD'] == 'POST' && !isset($_POST['siteadminlang'])){
			$msg = $this->m_refunds->index($id);
			if(!empty($msg)){
				$this->session->set_flashdata('msg', 'Data Updated successfully');
				redirect('/admin/refunds/listing/');
			}
		}
		$this->load->view('refunds/edit_refunds',$data);
	}
	
	// delete payment entry
	function delete($pageid){
		if($this->m_refunds->delete($pageid))
			$this->session->set_flashdata('msg', 'Data deleted successfully');
		redirect('/admin/refunds/listing/','refresh');
	}

	function status($id,$status){
		//echo $status;die;
		if($this->m_refunds->status($id,$status))
			$this->session->set_flashdata('msg', 'Data updated successfully');
		redirect('/admin/refunds/listing/','refresh');
	}

	function priority()
	{
		$id=$_GET['id'];
		$priority=$_GET['p'];
		$this->m_refunds->Updatepriority($id,$priority);
	}

	function content(){
		$this->load->library('ckeditor');
		$this->load->library('ckfinder');
		$data = array();
		$this->ckeditor->basePath = base_url().'assets/ckeditor/';
		$this->ckeditor->config['language']= 'eng';
		$this->ckeditor->config['width'] = '630px';
		$this->ckeditor->config['height'] = '300px';
		$this->ckeditor->config['filebrowserUploadUrl'] = base_url().'/admin/refunds/upload';
		//$this->load->helper(array('form'));
	    $this->load->library('form_validation');
	    //$langid = getCurrentLanguage(true);
	    //echo " == ".$langid;die;
	    //$data['row'] = getDynamicData('refundss', $langid);
		if($_SERVER['REQUEST_METHOD'] == 'POST' && !isset($_POST['siteadminlang']))
		{
			$this->form_validation->set_rules('description', 'Description', 'required');
			if($this->form_validation->run() == true)
	   		{
				$status = $this->m_refunds->addcontent();
				if($status == 1)
					$this->session->set_flashdata('homemsg', 'Content added successfully!');
				if($status == 2)
					$this->session->set_flashdata('homemsg', 'Content updated successfully!');
				redirect('admin/refunds/content', 'refresh');
			}
	 	}
	 	//pr($data);die;
	   	$this->load->view('refunds/add_content',$data);
	}
}