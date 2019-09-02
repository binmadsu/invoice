<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class airlines extends CI_Controller{
	public function __construct(){
	    parent::__construct();
	    is_logged_in();
	    $this->load->model('m_airlines');
	}
	
	public function index(){
		
		$this->load->library('ckeditor');
		$this->load->library('ckfinder');
		$this->ckeditor->basePath = base_url().'assets/ckeditor/';
		$this->ckeditor->config['language']= 'eng';
		$this->ckeditor->config['width'] = '630px';
		$this->ckeditor->config['height'] = '300px'; 
		//$this->ckeditor->config['filebrowserUploadUrl'] = base_url().'testing.php';
		$this->ckeditor->config['filebrowserUploadUrl'] = base_url().'/admin/airlines/upload';
		
		$data = array();
		$this->load->helper(array('form'));
	    $this->load->library('form_validation');
		if($_SERVER['REQUEST_METHOD'] == 'POST')
		{
				$this->m_airlines->addpage();
				$this->session->set_flashdata('msg', 'Record added successfully!');
				redirect('admin/airlines/listing', 'refresh');
	 	}
	 	//pr($data);die;
	   	$this->load->view('airlines/add_view',$data);
	}
	
	
		
	//function listing($offset=0,$startdate=0,$enddate=0,$specificOption=0,$specificValue=0){
	function listing($offset=0){
		$this->load->helper('form');
		$limit = pagination_count;
		//echo $limit;
		$data['datarows'] = $this->m_airlines->listing($limit,$offset);
		//echo"<pre>";print_r($data['datarows']);die;
		$config['total_rows'] = $this->m_airlines->count_all();
		/* pagination start */
		$this->load->library('pagination');
		//$search_parameter="/$startdate/$enddate/$specificOption/$specificValue";
		//$config['first_url'] = site_url("admin/banner/listing/0/".$search_parameter);
		//$config['suffix']= $search_parameter;
		$config['first_url'] = site_url("admin/airlines/listing/0/");
		$config['base_url'] = site_url("admin/airlines/listing/");
		$config['per_page'] = $limit; 
		$config['uri_segment'] = 4;
		$this->pagination->initialize($config); 
		$data["links"] = $this->pagination->create_links();
		$data['page'] = $offset;
		/*******/
		$this->load->view('airlines/view_list',$data);
	}
	
	//edit pages
	function edit($id)
	{
		$data = array();
		$this->load->library('form_validation');
		if(!empty($_POST)){
			$this->form_validation->set_rules('name', 'Airlines Name', 'required');
			
		}
		if($this->form_validation->run() == true)
		{
			$msg = $this->m_airlines->index($id);
			if(!empty($msg)){
			   $this->session->set_flashdata('msg', 'Record Updated successfully');
			}
			redirect('/admin/airlines/listing'.$page.'/');
		}else{
			//$data['gallery'] = gethandoverCategories();
			$data['datarows'] = $this->m_airlines->page_info($id);
			$this->load->view('airlines/edit_view',$data);
		}
	}
	
	function delete($pageid){
		if($this->m_airlines->delete($pageid))
			$this->session->set_flashdata('msg', 'Record Deleted successfully');
		redirect('/admin/airlines/listing/','refresh');
	}
	
	function status($id,$status){
		if($this->m_airlines->status($id,$status))
			$this->session->set_flashdata('msg', 'Record Updated successfully');
		redirect('/admin/airlines/listing/','refresh');
	}

	function priority()
	{
		$id=$_GET['id'];
		$priority=$_GET['p'];
		$this->m_airlines->Updatepriority($id,$priority);
	}
	
	public function airlinescms($id=0){
		
		$this->load->library('ckeditor');
		$this->load->library('ckfinder');
		$this->ckeditor->basePath = base_url().'assets/ckeditor/';
		$this->ckeditor->config['language']= 'eng';
		$this->ckeditor->config['width'] = '630px';
		$this->ckeditor->config['height'] = '300px'; 
		//$this->ckeditor->config['filebrowserUploadUrl'] = base_url().'testing.php';
		$this->ckeditor->config['filebrowserUploadUrl'] = base_url().'/admin/airlines/upload';
		
		$data = array();
		$this->load->library('form_validation');
		
		if($_SERVER['REQUEST_METHOD'] == 'POST')
		{
			$msg = $this->m_airlines->edit($id=1);
			if(!empty($msg)){
			   $this->session->set_flashdata('msg', 'Record Updated successfully');
			}
			redirect('/admin/airlines/airlinescms'.$page.'/');
		}else{
			//$data['gallery'] = gethandoverCategories();
			$data['datarows'] = $this->m_airlines->page_info_cms($id);
			$this->load->view('airlines/add_cms_view',$data);
		}
	   	//$this->load->view('airlines/add_cms_view',$data);
	}
}