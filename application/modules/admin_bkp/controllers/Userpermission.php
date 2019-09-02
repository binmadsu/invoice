<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Userpermission extends CI_Controller {
	
	function __construct(){
         parent::__construct();
		 is_logged_in();
		 $this->load->model('m_permissions');
	}
	
	function addpermission()
	{
		$data=array();
		$this->load->library('form_validation');
		if(!empty($_POST))
		{
			$this->form_validation->set_rules('module_id', 'Select Module', 'required');
			
		}
		if($this->form_validation->run() == true)
		{
						
			$msg = $this->m_permissions->index();
			$data['module'] =  $this->m_permissions->modulelist();	
			$this->session->set_flashdata('msg', 'Permissions Added successfully');
			$this->load->view('userpermission/add_permission',$data);
			redirect('admin/userpermission/');
		
		}
		else
		{
			$data['module'] =  $this->m_permissions->modulelist();			
			$this->load->helper(array('form'));
			$this->load->view('userpermission/add_permission',$data);
		}
		
	}
	
	
	function editpermission($id='')
	{
		
		$data=array();
		$this->load->library('form_validation');
		if(!empty($_POST))
		{
			$this->form_validation->set_rules('module_id', 'Select Module', 'required');
			
		}
		if($this->form_validation->run() == true)
		{
			
			$msg = $this->m_permissions->edit($id);
			$data['module'] =  $this->m_permissions->modulelist();	
			$this->session->set_flashdata('msg', 'Permissions Added successfully');
			$this->load->view('userpermission/edit_permission',$data);
			redirect('admin/userpermission/listing/');
		
		}
		else
		{
			$data['module'] =  $this->m_permissions->modulelist();		
			$data['data'] = $this->m_permissions->permisstion_info($id);			
			$this->load->helper(array('form'));
			$this->load->view('userpermission/edit_permission',$data);
		}
		
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
		$data['capability'] = $this->m_permissions->listing($limit,$offset,$startdate,$enddate,$specificOption,$specificValue);
		$config['total_rows'] = $this->m_permissions->count_all($startdate,$enddate,$specificOption,$specificValue);
		/* pagination start */
		$this->load->library('pagination');
		$search_parameter="/$startdate/$enddate/$specificOption/$specificValue";
		$config['first_url'] = site_url("admin/userpermission/listing/0/".$search_parameter);
		$config['suffix']= $search_parameter;
		$config['base_url'] = site_url("admin/userpermission/listing/");
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
		
		$this->load->view('userpermission/view_listing',$data);
	}
		
	
	
	function index($user_id=0){
		//isUserPermission('add_user');
		$this->load->library('form_validation');
		
		if(!empty($_POST))
		{
			
			$this->form_validation->set_rules('user_role', 'User Role', 'required');
		
		}
		if($this->form_validation->run() == true)
		{
			
			if(isset($_POST['user_role']) && !isset($_POST['save']))
			{
				
				$data['databyrole'] =  $this->m_permissions->ContentByRole($this->input->post('user_role'));
				$data['role'] =  $this->m_permissions->role();
				$data['permissions'] = $this->m_permissions->getAllModulePermissions();
				$this->load->helper(array('form'));
				$this->load->view('userpermission/view_changepermission',$data);
			}
			else
			{
			$msg = $this->m_permissions->assignpermission();
			$this->session->set_flashdata('msg', 'Permissions Changed successfully');
			redirect('admin/userpermission/');
			//$this->load->view('view_changepermission',$data);
			//redirect('admin/user/listing/');
			}
		
		}
		else
		{
			$data['role'] =  $this->m_permissions->role();
			$data['permissions'] = $this->m_permissions->getAllModulePermissions();
			$this->load->helper(array('form'));
			$this->load->view('userpermission/view_changepermission',$data);
		}
	}
	
	function delete($member_id,$page=1)
	{
		isUserPermission('delete_user');
		if($this->m_permissions->delete($member_id))
			$this->session->set_flashdata('msg', 'module Deleted successfully');
			redirect('/admin/userpermission/listing/'.$page,'refresh');
	}
	

}