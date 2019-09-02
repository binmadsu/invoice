<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class adminuser extends CI_Controller{

	public function __construct(){
	    parent::__construct();
	    is_logged_in();
	    $this->load->model('m_adminuser');
	}

	public function index(){
		
		$data = array();
		$data['rolename'] = $this->m_adminuser->Getrole();
		$this->load->helper(array('form'));
	    $this->load->library('form_validation');
		if($_SERVER['REQUEST_METHOD'] == 'POST')
		{
			//$this->form_validation->set_rules('company_code', 'company_code', 'required');
			$this->form_validation->set_rules('username', 'username', 'required');
			$this->form_validation->set_rules('email', 'Email', 'required');
			$this->form_validation->set_rules('city', 'City', 'required');
			$this->form_validation->set_rules('state', 'State', 'required');
			$this->form_validation->set_rules('pincode', 'Pincode', 'required');	
			$this->form_validation->set_rules('country', 'Country', 'required');
			//$this->form_validation->set_rules('description', 'Description', 'required');
			if($this->form_validation->run() == true)
	   		{
				$this->m_adminuser->addpage();
				$this->session->set_flashdata('msg', 'Record added successfully!');
				redirect('admin/adminuser/listing', 'refresh');
			}
	 	}
		$data['countries'] = getCountries();
	 	//pr($data);die;
	   	$this->load->view('adminuser/add_view',$data);
	}
	
 
	
	function listing($offset=0){
		$this->load->helper('form');
		$limit = pagination_count;
		//echo $limit;
		$data['datarows'] = $this->m_adminuser->listing($limit,$offset);
		//echo "<pre>";print_r($data['datarows']);
		$config['total_rows'] = $this->m_adminuser->count_all();
		
		/* pagination start */
		$this->load->library('pagination');
		$config['first_url'] = site_url("admin/adminuser/listing/0/");
		$config['base_url'] = site_url("admin/adminuser/listing/");
		$config['per_page'] = $limit; 
		$config['uri_segment'] = 4;
		$this->pagination->initialize($config);
		$data["links"] = $this->pagination->create_links();
		$data['page'] = $offset;
		/*******/
		$this->load->view('adminuser/view_list',$data);
	}

	
	
	//edit pages
	function edit($id)
	{
		$data_title=array();
		$data = array();
		$data['rolename'] = $this->m_adminuser->Getrole();
		$this->load->library('form_validation');
		if(!empty($_POST)){
			$this->form_validation->set_rules('username', 'username', 'required');
			$this->form_validation->set_rules('city', 'City', 'required');
			$this->form_validation->set_rules('state', 'State', 'required');
			$this->form_validation->set_rules('pincode', 'Pincode', 'required');	
			$this->form_validation->set_rules('country', 'Country', 'required');
		}
		
		if($this->form_validation->run() == true)
		{
			$msg = $this->m_adminuser->index($id,$data_title);
			if(!empty($msg)){
			   $this->session->set_flashdata('msg', 'Record Updated successfully');
			}
			redirect('/admin/adminuser/listing/');
		}else{
			$data['datarows'] = $this->m_adminuser->page_info($id);
			$country_id = isset($data['datarows'][0]['country'])?$data['datarows'][0]['country']:0;
			$state_id = isset($data['datarows'][0]['state'])?$data['datarows'][0]['state']:0;
			$city_id = isset($data['datarows'][0]['city'])?$data['datarows'][0]['city']:0;
			$data['countries'] = getCountries();
			$data['states'] = getStates($country_id);
			$data['cities'] = getCities($state_id);
			//echo "<pre>";print_r($data);die;
			$this->load->view('adminuser/edit_view',$data);
		}
	}

	
	
	function delete($pageid){
		if($this->m_adminuser->delete($pageid))
			$this->session->set_flashdata('msg', 'Record Deleted successfully');
		redirect('/admin/adminuser/listing/','refresh');
	}

	
	
	function status($id,$status){
		if($this->m_adminuser->status($id,$status))
			$this->session->set_flashdata('msg', 'Record Updated successfully');
		redirect('/admin/adminuser/listing/','refresh');
	}

	
	
	function priority()
	{
		$id=$_GET['id'];
		$priority=$_GET['p'];
		$this->m_adminuser->Updatepriority($id,$priority);
	}
}