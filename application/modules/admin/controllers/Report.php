<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class report extends CI_Controller{

	public function __construct(){
	    parent::__construct();
	    is_logged_in();
		$this->load->model('m_report');
		$this->load->model('m_stock');
	}

	public function index(){
		
		$data = array();
		$data['companies'] = $this->m_report->GetCompanies();
		$data['warehousename'] = $this->m_report->Getwarehouse();		
		$data['countries'] = getCountries();
		$this->load->helper(array('form'));
	    $this->load->library('form_validation');
		if($_SERVER['REQUEST_METHOD'] == 'POST')
		{
			//$this->form_validation->set_rules('company_code', 'company_code', 'required');
			//$this->form_validation->set_rules('description', 'Description', 'required');
			if($this->form_validation->run() == true)
	   		{
				$this->m_report->addpage();
				$this->session->set_flashdata('msg', 'Record added successfully!');
				redirect('admin/report/listing', 'refresh');
			}
	 	}
	 	//pr($data);die;
	   	$this->load->view('report/add_view',$data);
	}
	
	
 
 
	
	function listing($offset=0){
		$this->load->helper('form');
		$limit = pagination_count;
		//echo $limit;
		$data['datarows'] = $this->m_stock->listing($limit,$offset);
		$config['total_rows'] = $this->m_stock->count_all();
		
		/* pagination start */
		$this->load->library('pagination');
		//$search_parameter="/$startdate/$enddate/$specificOption/$specificValue";
		//$config['first_url'] = site_url("admin/banner/listing/0/".$search_parameter);
		//$config['suffix']= $search_parameter;
		$config['first_url'] = site_url("admin/report/listing/0/");
		$config['base_url'] = site_url("admin/report/listing/");
		$config['per_page'] = $limit; 
		$config['uri_segment'] = 4;
		$this->pagination->initialize($config);
		$data["links"] = $this->pagination->create_links();
		$data['page'] = $offset;
		/*******/
		$this->load->view('report/view_list',$data);
	}

	function instock($offset=0){
		$this->load->helper('form');
		$limit = pagination_count;
		//echo $limit;
		$data['datarows'] = $this->m_stock->listing($limit,$offset);
		$config['total_rows'] = $this->m_stock->count_all();
		
		/* pagination start */
		$this->load->library('pagination');
		//$search_parameter="/$startdate/$enddate/$specificOption/$specificValue";
		//$config['first_url'] = site_url("admin/banner/listing/0/".$search_parameter);
		//$config['suffix']= $search_parameter;
		$config['first_url'] = site_url("admin/report/listing/0/");
		$config['base_url'] = site_url("admin/report/listing/");
		$config['per_page'] = $limit; 
		$config['uri_segment'] = 4;
		$this->pagination->initialize($config);
		$data["links"] = $this->pagination->create_links();
		$data['page'] = $offset;
		/*******/
		$this->load->view('report/view_list_instock',$data);
	}

	function total($offset=0){
		$this->load->helper('form');
		$limit = pagination_count;
		//echo $limit;
		$data['datarows'] = $this->m_stock->listing($limit,$offset);
		$config['total_rows'] = $this->m_stock->count_all();
		
		/* pagination start */
		$this->load->library('pagination');
		//$search_parameter="/$startdate/$enddate/$specificOption/$specificValue";
		//$config['first_url'] = site_url("admin/banner/listing/0/".$search_parameter);
		//$config['suffix']= $search_parameter;
		$config['first_url'] = site_url("admin/report/listing/0/");
		$config['base_url'] = site_url("admin/report/listing/");
		$config['per_page'] = $limit; 
		$config['uri_segment'] = 4;
		$this->pagination->initialize($config);
		$data["links"] = $this->pagination->create_links();
		$data['page'] = $offset;
		/*******/
		$this->load->view('report/view_list_total',$data);
	}

	
	
	//edit pages
	function edit($id)
	{
		$data_title=array();
		$data = array();
		$data['countries'] = getCountries();
		$this->load->library('form_validation');
		if(!empty($_POST)){
			$this->form_validation->set_rules('company_name', 'Company Name', 'required');
			
		}
		
		if($this->form_validation->run() == true)
		{
			$msg = $this->m_report->index($id,$data_title);
			if(!empty($msg)){
			   $this->session->set_flashdata('msg', 'Record Updated successfully');
			}
			redirect('/admin/report/listing/');
		}else{
			$data['datarows'] = $this->m_report->page_info($id);
			//echo "<pre>";print_r($data);die;
			$this->load->view('report/edit_view',$data);
		}
	}

	
	function item()
	{
		$data_title=array();
		$data = array();
		$data['itemname'] = $this->m_report->Getitem();
		$data['countries'] = getCountries();
		$this->load->library('form_validation');
		if(!empty($_POST)){
			//$this->form_validation->set_rules('company_name', 'Company Name', 'required');
		}
		
		if($this->form_validation->run() == true)
		{
			$msg = $this->m_report->index($id,$data_title);
			if(!empty($msg)){
			   $this->session->set_flashdata('msg', 'Record Updated successfully');
			}
			redirect('/admin/report/listing/');
		}else{
			$data['datarows'] = $this->m_report->page_info();
			//echo "<pre>";print_r($data);die;
			$this->load->view('report/search_item',$data);
		}
	}
	
	
	function delete($pageid){
		if($this->m_report->delete($pageid))
			$this->session->set_flashdata('msg', 'Record Deleted successfully');
		redirect('/admin/report/listing/','refresh');
	}

	
	
	function status($id,$status){
		if($this->m_report->status($id,$status))
			$this->session->set_flashdata('msg', 'Record Updated successfully');
		redirect('/admin/report/listing/','refresh');
	}

	
	
	function priority()
	{
		$id=$_GET['id'];
		$priority=$_GET['p'];
		$this->report->Updatepriority($id,$priority);
	}
}