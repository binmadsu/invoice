<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class enquiries extends CI_Controller{
	public function __construct(){
	    parent::__construct();
	    is_logged_in();
	    $this->load->model('m_enquiries');
	}
	
	public function index(){
		
		$this->load->library('ckeditor');
		$this->load->library('ckfinder');
		$this->ckeditor->basePath = base_url().'assets/ckeditor/';
		$this->ckeditor->config['language']= 'eng';
		$this->ckeditor->config['width'] = '630px';
		$this->ckeditor->config['height'] = '300px'; 
		//$this->ckeditor->config['filebrowserUploadUrl'] = base_url().'testing.php';
		$this->ckeditor->config['filebrowserUploadUrl'] = base_url().'/admin/enquiries/upload';
		
		$data = array();
		$this->load->helper(array('form'));
	    $this->load->library('form_validation');
		if($_SERVER['REQUEST_METHOD'] == 'POST')
		{
				$this->m_enquiries->addpage();
				$this->session->set_flashdata('msg', 'Record added successfully!');
				redirect('admin/enquiries/listing', 'refresh');
	 	}
	 	//pr($data);die;
	   	$this->load->view('enquiries/add_view',$data);
	}
	
	
		
	//function listing($offset=0,$startdate=0,$enddate=0,$specificOption=0,$specificValue=0){
	function listing($offset=0,$startdate=0,$enddate=0){
		$this->load->helper('form');
		$limit = pagination_count;
		if($this->input->post('startdate')!='')
		{
			$startdate = strtotime($this->input->post('startdate'));
		}
		if($this->input->post('enddate')!='')
		{
			$enddate = strtotime($this->input->post('enddate'));
		}
		//echo $limit;
		$data['datarows'] = $this->m_enquiries->listing($limit,$offset,$startdate,$enddate);
		//echo"<pre>";print_r($data['datarows']);die;
		$config['total_rows'] = $this->m_enquiries->count_all($startdate,$enddate);
		/* pagination start */
		$this->load->library('pagination');
		$search_parameter="/$startdate/$enddate";
		$config['first_url'] = site_url("admin/enquiries/listing/0/".$search_parameter);
		$config['suffix']= $search_parameter;
		//$config['first_url'] = site_url("admin/enquiries/listing/0/");
		$config['base_url'] = site_url("admin/enquiries/listing/");
		$config['per_page'] = $limit; 
		$config['uri_segment'] = 4;
		$this->pagination->initialize($config); 
		$data["links"] = $this->pagination->create_links();
		$data['page'] = $offset;
		$data['startdate'] = $startdate;
		$data['enddate'] = $enddate;
		/*******/
		$this->load->view('enquiries/view_list',$data);
	}

	function view($id=0){
		$data['datarows'] = $this->m_enquiries->page_info($id);
		//pr($data);die;
		$this->load->view('enquiries/view_inquiry',$data);
	}
	
	//edit pages
	function edit($id)
	{
		$data = array();
		$this->load->library('form_validation');
		if(!empty($_POST)){
			$this->form_validation->set_rules('name', 'Name', 'required');
			
		}
		if($this->form_validation->run() == true)
		{
			$msg = $this->m_enquiries->index($id);
			if(!empty($msg)){
			   $this->session->set_flashdata('msg', 'Record Updated successfully');
			}
			redirect('/admin/enquiries/listing'.$page.'/');
		}else{
			//$data['gallery'] = gethandoverCategories();
			$data['datarows'] = $this->m_enquiries->page_info($id);
			$this->load->view('enquiries/edit_view',$data);
		}
	}
	
	function delete($pageid){
		if($this->m_enquiries->delete($pageid))
			$this->session->set_flashdata('msg', 'Record Deleted successfully');
		redirect('/admin/enquiries/listing/','refresh');
	}
	
	function status($id,$status){
		if($this->m_enquiries->status($id,$status))
			$this->session->set_flashdata('msg', 'Record Updated successfully');
		redirect('/admin/enquiries/listing/','refresh');
	}

	function priority()
	{
		$id=$_GET['id'];
		$priority=$_GET['p'];
		$this->m_enquiries->Updatepriority($id,$priority);
	}
}