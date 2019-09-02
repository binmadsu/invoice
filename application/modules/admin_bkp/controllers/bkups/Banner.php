<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class banner extends CI_Controller{
	public function __construct(){
	    parent::__construct();
	    is_logged_in();
	    $this->load->model('m_banner');
	}
	
	public function index(){

	}

	function add(){
		$this->load->library('ckeditor');
		$this->load->library('ckfinder');
		$data=array();
		$this->ckeditor->basePath = base_url().'assets/ckeditor/';
		$this->ckeditor->config['language']= 'eng';
		$this->ckeditor->config['width'] = '630px';
		$this->ckeditor->config['height'] = '300px'; 
		//$this->ckeditor->config['filebrowserUploadUrl'] = base_url().'testing.php'; 	
		$this->ckeditor->config['filebrowserUploadUrl'] = base_url().'/admin/banner/upload';
		//$this->load->helper(array('form'));
	    $this->load->library('form_validation');
		if($_SERVER['REQUEST_METHOD'] == 'POST')
		{
			//$this->form_validation->set_rules('title', 'Banner Title', 'required');
			//$this->form_validation->set_rules('description', 'Banner Description', 'required');
			//if($this->form_validation->run() == true)
	   		//{	
			    //echo"<pre>";print_r($_POST);die;
				$this->m_banner->add();
				$this->session->set_flashdata('msg', 'Banner added successfully!');
				redirect('admin/banner/listing', 'refresh');
			//}
	 	}
	   	$this->load->view('banner/add_banner',$data);
	}
	
	
	function upload()
	{
	
		$time = time();

		$url = 'uploads/banners/'.$_FILES['upload']['name'];

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
		$url = base_url().'uploads/banners/'.$_FILES['upload']['name'];
		}
		 
		$CKEditorFuncNum = $_GET['CKEditorFuncNum'] ;
		echo "<script type='text/javascript'>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$message');</script>";
	}

	function listing($offset=0,$startdate=0,$enddate=0,$specificOption=0,$specificValue=0){			
		
		//Add new banner
		//$this->add();
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
		$data['banners'] = $this->m_banner->listing($limit,$offset,$startdate,$enddate,$specificOption,$specificValue);
		$config['total_rows'] = $this->m_banner->count_all($startdate,$enddate,$specificOption,$specificValue);
		/* pagination start */
		$this->load->library('pagination');
		$search_parameter="/$startdate/$enddate/$specificOption/$specificValue";
		$config['first_url'] = site_url("admin/banner/listing/0/".$search_parameter);
		$config['suffix']= $search_parameter;
		$config['base_url'] = site_url("admin/banner/listing/");
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
		//print_r($data);die;
		$this->load->view('banner/view_banner',$data);
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
		$data['banners'] = $this->m_banner->page_info($id);

		$this->ckeditor->basePath = base_url().'assets/ckeditor/';
		$this->ckeditor->config['language']= 'eng';
		$this->ckeditor->config['width'] = '630px';
		$this->ckeditor->config['height'] = '300px';  
		$this->ckeditor->config['filebrowserUploadUrl'] = base_url().'/admin/banner/upload'; 
		//add ckeditor tools
		//$this->load->library('form_validation');
		if($_SERVER['REQUEST_METHOD'] == 'POST')
		{
			$msg = $this->m_banner->editBanner($id);
			if(!empty($msg)){
			   $this->session->set_flashdata('msg', 'Banner Updated successfully');
			}
			redirect('/admin/banner/listing'.$page.'/');
		}
		$this->load->view('banner/edit_banner',$data);
		
	}

	/* Banner */
	function delete($pageid){
		if($this->m_banner->delete($pageid))
			$this->session->set_flashdata('msg', 'Banner Deleted successfully');
			redirect('/admin/banner/listing/','refresh');
	}

	function status($id,$status){
		//echo $status;die;
		if($this->m_banner->status($id,$status))
			$this->session->set_flashdata('msg', 'Banner Updated successfully');
		redirect('/admin/banner/listing/','refresh');
	}

	function priority()
	{
		$id=$_GET['id'];
		$priority=$_GET['p'];
		$this->m_banner->Updatepriority($id,$priority);
	}

	/* Partner */
	function pdelete($pageid){
		if($this->m_banner->pdelete($pageid))
			$this->session->set_flashdata('msg', 'Partner Deleted successfully');
		redirect('/admin/banner/tradePartners/','refresh');
	}

	function pstatus($id,$status){
		//echo $status;die;
		if($this->m_banner->pstatus($id,$status))
			$this->session->set_flashdata('msg', 'Partner Updated successfully');
		redirect('/admin/banner/tradePartners/','refresh');
	}

	function ppriority()
	{
		$id=$_GET['id'];
		$priority=$_GET['p'];
		$this->m_banner->pUpdatepriority($id,$priority);
	}
	/*********************************/
	function content(){
		$this->load->library('ckeditor');
		$this->load->library('ckfinder');
		$data=array();
		$this->ckeditor->basePath = base_url().'assets/ckeditor/';
		$this->ckeditor->config['language']= 'eng';
		$this->ckeditor->config['width'] = '630px';
		$this->ckeditor->config['height'] = '300px'; 
		//$this->ckeditor->config['filebrowserUploadUrl'] = base_url().'testing.php'; 	
		$this->ckeditor->config['filebrowserUploadUrl'] = base_url().'/admin/banner/upload';
		//$this->load->helper(array('form'));
	    $this->load->library('form_validation');
	    $data['row'] = getDynamicContent('home');
		if($_SERVER['REQUEST_METHOD'] == 'POST')
		{
			$this->form_validation->set_rules('content1', 'Description 1', 'required');
			$this->form_validation->set_rules('content2', 'Description 2', 'required');
			if($this->form_validation->run() == true)
	   		{
				$status = $this->m_banner->addhomecontent();
				if($status == 1)
					$this->session->set_flashdata('homemsg', 'Home content added successfully!');
				if($status == 2)
					$this->session->set_flashdata('homemsg', 'Home content updated successfully!');
				redirect('admin/banner/content', 'refresh');
			}
	 	}
	 	//pr($data);die;
	   	$this->load->view('banner/add_home_content',$data);
	}

	function usp()
	{
		$this->load->library('ckeditor');
		$this->load->library('ckfinder');
		
		$data = array();
		$this->load->helper(array('form'));
		$data['banners'] = $this->m_banner->page_usp();
         //echo"<pre>";print_r($data['banners']);die;
		$this->ckeditor->basePath = base_url().'assets/ckeditor/';
		$this->ckeditor->config['language']= 'eng';
		$this->ckeditor->config['width'] = '630px';
		$this->ckeditor->config['height'] = '300px';  
		$this->ckeditor->config['filebrowserUploadUrl'] = base_url().'/admin/banner/upload'; 
		//add ckeditor tools
		//$this->load->library('form_validation');
		if($_SERVER['REQUEST_METHOD'] == 'POST')
		{
			$msg = $this->m_banner->uspedit(1);
			if(!empty($msg)){
			   $this->session->set_flashdata('msg', 'Banner Updated successfully');
			}
			redirect('/admin/banner/usp/1');
		}
		//pr($data);die;
		$this->load->view('banner/edit_usp',$data);
	}
	
	function aboutus(){
		$this->load->library('ckeditor');
		$this->load->library('ckfinder');		
		$data=array();
		$this->load->helper(array('form'));
		$data['banners'] = $this->m_banner->page_aboutus('home');
        //echo"<pre>";print_r($data['banners']);die;
		$this->ckeditor->basePath = base_url().'assets/ckeditor/';
		$this->ckeditor->config['language']= 'eng';
		$this->ckeditor->config['width'] = '630px';
		$this->ckeditor->config['height'] = '300px';  
		$this->ckeditor->config['filebrowserUploadUrl'] = base_url().'/admin/banner/upload'; 
		//add ckeditor tools
		//$this->load->library('form_validation');
		if($_SERVER['REQUEST_METHOD'] == 'POST')
		{
			$msg = $this->m_banner->aboutus('home');
			if(!empty($msg)){
			   $this->session->set_flashdata('msg', 'Aboutus Updated successfully');
			}
			redirect('/admin/banner/aboutus');
		}
		$this->load->view('banner/aboutus',$data);
		
	}

	function tradePartners($offset=0,$startdate=0,$enddate=0,$specificOption=0,$specificValue=0){
		
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
		$data['tradepartners'] = $this->m_banner->partners_listing($limit,$offset,$startdate,$enddate,$specificOption,$specificValue);
		$config['total_rows'] = $this->m_banner->partners_count_all($startdate,$enddate,$specificOption,$specificValue);
		//print_r($data['tradepartners']);die;
		/* pagination start */
		$this->load->library('pagination');
		$search_parameter="/$startdate/$enddate/$specificOption/$specificValue";
		$config['first_url'] = site_url("admin/banner/tradePartners/0/".$search_parameter);
		$config['suffix']= $search_parameter;
		$config['base_url'] = site_url("admin/banner/tradePartners/");
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
		//print_r($data);die;
		$this->load->view('banner/view_trade_partner',$data);
	}

	function add_partners($pid=0){
		$data = array();
		if($pid){
			$data['pages'] = $this->m_banner->partner_info($pid);
		}
		//$this->load->helper(array('form'));
	    $this->load->library('form_validation');
		if($_SERVER['REQUEST_METHOD'] == 'POST')
		{
			//$this->form_validation->set_rules('title', 'Banner Title', 'required');
			//$this->form_validation->set_rules('description', 'Banner Description', 'required');
			//if($this->form_validation->run() == true)
			if(isset($_FILES['banner_image'])){
				//echo"<pre>";print_r($_POST);die;
				if($pid){
					$this->m_banner->addPartner($pid);
					$this->session->set_flashdata('msg', 'Partner updated successfully!');
				}else{
					$this->m_banner->addPartner();
					$this->session->set_flashdata('msg', 'Partner added successfully!');
				}
				redirect('admin/banner/tradePartners', 'refresh');
			}
	 	}
	 	//pr($data);die;
	   	$this->load->view('banner/add_trade_partner',$data);
	}
}