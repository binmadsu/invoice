<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class faq extends CI_Controller{
	public function __construct(){
	    parent::__construct();
	    is_logged_in();
	    $this->load->model('m_faq');
	    /*if(isset($_POST['siteadminlang']) and !empty($_POST['siteadminlang'])){
		    $langid = @$_POST['siteadminlang'];
		    setCurrentLanguage($langid, true);
	    }*/
	}
	
	public function index(){
		//Add new faq
		$this->addfaq();
	}

	function addfaq(){
		$this->load->library('ckeditor');
		$this->load->library('ckfinder');
		$data=array();
		$this->ckeditor->basePath = base_url().'assets/ckeditor/';
		$this->ckeditor->config['language']= 'eng';
		$this->ckeditor->config['width'] = '630px';
		$this->ckeditor->config['height'] = '300px';
		$this->ckeditor->config['filebrowserUploadUrl'] = base_url().'/admin/faq/upload';
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
			$this->m_faq->addpage();
			$this->session->set_flashdata('msg', 'Faq added successfully!');
			redirect('admin/faq/listing', 'refresh');
		}
	   	$this->load->view('faq/add_faq',$data);
	}
	
	function upload()
	{
		$time = time();
		$url = 'uploads/faqs/'.$_FILES['upload']['name'];

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
			$url = base_url().'uploads/faqs/'.$_FILES['upload']['name'];
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
		$data['faqs'] = $this->m_faq->listing($limit,$offset,$startdate,$enddate,$specificOption,$specificValue);
		$config['total_rows'] = $this->m_faq->count_all($startdate,$enddate,$specificOption,$specificValue);
		/* pagination start */
		$this->load->library('pagination');
		$search_parameter="/$startdate/$enddate/$specificOption/$specificValue";
		$config['first_url'] = site_url("admin/faq/listing/0/".$search_parameter);
		$config['suffix']= $search_parameter;
		$config['base_url'] = site_url("admin/faq/listing/");
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
		
		$this->load->view('faq/view_faq',$data);
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
		$data['faqs'] = $this->m_faq->page_info($id);

		$this->ckeditor->basePath = base_url().'assets/ckeditor/';
		$this->ckeditor->config['language']= 'eng';
		$this->ckeditor->config['width'] = '630px';
		$this->ckeditor->config['height'] = '300px';  
		$this->ckeditor->config['filebrowserUploadUrl'] = base_url().'/admin/faq/upload'; 
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
			$msg = $this->m_faq->index($id);
			if(!empty($msg)){
				$this->session->set_flashdata('msg', 'Faq Updated successfully');
				redirect('/admin/faq/listing/');
			}
		}
		$this->load->view('faq/edit_faq',$data);
	}
	
	// delete payment entry
	function delete($pageid){
		if($this->m_faq->delete($pageid))
			$this->session->set_flashdata('msg', 'Faq deleted successfully');
		redirect('/admin/faq/listing/','refresh');
	}

	function status($id,$status){
		//echo $status;die;
		if($this->m_faq->status($id,$status))
			$this->session->set_flashdata('msg', 'Faq updated successfully');
		redirect('/admin/faq/listing/','refresh');
	}

	function priority()
	{
		$id=$_GET['id'];
		$priority=$_GET['p'];
		$this->m_faq->Updatepriority($id,$priority);
	}

	function content(){
		$this->load->library('ckeditor');
		$this->load->library('ckfinder');
		$data = array();
		$this->ckeditor->basePath = base_url().'assets/ckeditor/';
		$this->ckeditor->config['language']= 'eng';
		$this->ckeditor->config['width'] = '630px';
		$this->ckeditor->config['height'] = '300px';
		$this->ckeditor->config['filebrowserUploadUrl'] = base_url().'/admin/faq/upload';
		//$this->load->helper(array('form'));
	    $this->load->library('form_validation');
	    //$langid = getCurrentLanguage(true);
	    //echo " == ".$langid;die;
	    //$data['row'] = getDynamicData('faqs', $langid);
		if($_SERVER['REQUEST_METHOD'] == 'POST' && !isset($_POST['siteadminlang']))
		{
			$this->form_validation->set_rules('description', 'Description', 'required');
			if($this->form_validation->run() == true)
	   		{
				$status = $this->m_faq->addcontent();
				if($status == 1)
					$this->session->set_flashdata('homemsg', 'Faq content added successfully!');
				if($status == 2)
					$this->session->set_flashdata('homemsg', 'Faq content updated successfully!');
				redirect('admin/faq/content', 'refresh');
			}
	 	}
	 	//pr($data);die;
	   	$this->load->view('faq/add_content',$data);
	}
}