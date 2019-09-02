<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class module extends CI_Controller{
	public function __construct(){
	     parent::__construct();
	     is_logged_in();
	     $this->load->model('m_module');
	}
	
	public function index(){
		$this->load->helper(array('form'));
	    $this->load->library('form_validation');
		if($_SERVER['REQUEST_METHOD'] == 'POST')
		{
			$this->form_validation->set_rules('module_name', 'Module', 'required|is_unique[tbl_module.m_name]');
			//$this->form_validation->set_rules('city', 'City', 'required');

			if($this->form_validation->run() == true)
			{	
				$this->m_module->addmodule();
				$this->session->set_flashdata('msg', 'Module added successfully!');
				redirect('admin/module/listing', 'refresh');
			}
		}

		$this->load->view('module/add_module');
	}
	

	function listing($offset=0,$startdate=0,$enddate=0,$specificOption=0,$specificValue=0)
	{			
		
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
		$data['module'] = $this->m_module->listing();
		$config['total_rows'] = $this->m_module->count_all($startdate,$enddate,$specificOption,$specificValue);
		/* pagination start */
		$this->load->library('pagination');
		$search_parameter="/$startdate/$enddate/$specificOption/$specificValue";
		$config['first_url'] = site_url("admin/module/listing/0/".$search_parameter);
		$config['suffix']= $search_parameter;
		$config['base_url'] = site_url("admin/module/listing/");
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
		
		$this->load->view('module/view_module',$data);
	}
		
		
	//edit pages
	function edit($id)
	{
				
	$this->load->library('form_validation');
	
	 if(!empty($_POST)){
			$this->form_validation->set_rules('module_name', 'Module', 'required');
			//$this->form_validation->set_rules('city', 'City', 'required');		
	 }
	 
	 if($this->form_validation->run() == true)
	   {
		        //echo $user_id;die;
		        $msg = $this->m_module->index($id);
			if(!empty($msg)){
			   $this->session->set_flashdata('msg', 'Module Updated successfully');
			}
			redirect('/admin/module/listing/'.$page.'/');
	 }
	 else{
			$data['role'] =  $this->m_module->role();
			$this->load->helper(array('form'));
			$data['pages'] = $this->m_module->module_info($id);
			$this->load->view('module/edit_module',$data);
		}	
	}
	
	
	
	// delete payment entry
	function delete($pageid){
		isUserPermission('delete_user');
		if($this->m_module->delete($pageid))
			$this->session->set_flashdata('msg', 'Module Deleted successfully');
			redirect('/admin/module/listing/','refresh');
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


}