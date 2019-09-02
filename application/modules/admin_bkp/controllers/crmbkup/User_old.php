				<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
				class User extends CI_Controller {					
				private $limit = 10;
				//private $limit = pagination_count;
				//empty array for search items
				var $terms = array();
				function __construct(){
				parent::__construct();
				is_logged_in();
				$this->load->model('m_user');
				}
				function index($user_id=0){
				//isUserPermission('add_user');				$this->load->helper(array('form'));
				$this->load->library('form_validation');
				if(!empty($_POST)){
				$this->form_validation->set_rules('user_fname', 'First name', 'required');
				$this->form_validation->set_rules('user_email', 'Email', 'required|is_unique[tbl_users.user_email]');
				$this->form_validation->set_rules('username', 'Username','required|min_length[5]|max_length[40]|is_unique[tbl_users.username]');
				$this->form_validation->set_rules('user_password', 'Password', 'required');
				}
				if($this->form_validation->run() == true)
				{
				$msg = $this->m_user->index($user_id);
				$this->session->set_flashdata('msg', 'User Added successfully');
				//redirect('admin/user/listing/');								redirect('admin/user/listing/');				
				}
				else				{
				$data['role'] =  $this->role();
				$this->load->view('view_adduser',$data);
				}
				}
				 function role()				{
				//return $this->m_user->role();
				} 

				function listing($offset=0,$startdate=0,$enddate=0,$specificOption=0,$specificValue=0){			

				$this->load->helper('form');
				$limit = pagination_count;		
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
				$data['user'] = $this->m_user->listing($limit,$offset,$startdate,$enddate,$specificOption,$specificValue);
				$config['total_rows'] = $this->m_user->count_all($startdate,$enddate,$specificOption,$specificValue);

				/* pagination start */
				$this->load->library('pagination');
				$search_parameter="/$startdate/$enddate/$specificOption/$specificValue";
				$config['first_url'] = site_url("admin/user/listing/0/".$search_parameter);
				$config['suffix']= $search_parameter;
				$config['base_url'] = site_url("admin/user/listing/");
				$config['per_page'] = $this->limit; 
				$config['uri_segment'] = 4;
				$this->pagination->initialize($config); 
				$data["links"] = $this->pagination->create_links();
				$data['page'] = $offset;
				/*******/
				$data['startdate'] = $startdate;
				$data['enddate'] = $enddate;
				$data['specificOption'] = $specificOption;
				$data['specificValue'] = $specificValue;

				$this->load->view('view_user',$data);
				}

				function edit($user_id=0,$page=0)								{
				//isUserPermission('edit_user');

				$this->load->library('form_validation');
				if(!empty($_POST)){
				$this->form_validation->set_rules('user_fname', 'First name', 'required');
				$this->form_validation->set_rules('user_email', 'Email', 'required');
				$this->form_validation->set_rules('username', 'Username','required|min_length[5]|max_length[40]');
				$this->form_validation->set_rules('user_password', 'Password', 'required');
				}

				if($this->form_validation->run() == true)
				{
				//echo $user_id;die;
				$msg = $this->m_user->index($user_id);
				if(!empty($msg)){
				$this->session->set_flashdata('msg', 'User Updated successfully');
				}
				redirect('/admin/user/listing/'.$page.'/');
				}
				else{
				$data['role'] =  $this->role();
				$this->load->helper(array('form'));
				$data['user'] = $this->m_user->user_info($user_id);
				$data['page'] = $page;
				$this->load->view('view_edituser',$data);
				}	
				}

				function update_profile(){
				$this->load->library('form_validation');
				if(!empty($_POST)){
				$this->form_validation->set_rules('user_fname', 'First name', 'required');
				$this->form_validation->set_rules('user_email', 'Email', 'required');
				$this->form_validation->set_rules('username', 'Username','required|min_length[5]|max_length[40]');
				$this->form_validation->set_rules('user_password', 'Password', 'required');
				}

				if($this->form_validation->run() == true)
				{
				//echo $user_id;die;
				$msg = $this->m_user->update_profile(getCurUserID());
				if(!empty($msg)){
				$this->session->set_flashdata('msg', 'Profile Updated successfully');
				}
				redirect('/admin/user/update_profile/');
				}
				else{
				$data['role'] =  $this->role();
				$this->load->helper(array('form'));
				$data['user'] = $this->m_user->user_info(getCurUserID());
				//$data['page'] = $page;
				$this->load->view('view_update_profile',$data);
				}
				}

				function delete($user_id,$page=1){
				//isUserPermission('delete_user');
				if($this->m_user->delete($user_id))
				$this->session->set_flashdata('msg', 'User Deleted successfully');
				redirect('/admin/user/listing/'.$page,'refresh');
				}
				function status($user_id,$status,$page=1){
				//isUserPermission('status_user');
				//echo $status;die;
				if($this->m_user->status($user_id,$status))
				$this->session->set_flashdata('msg', 'User Updated successfully');
				redirect('/admin/user/listing/'.$page,'refresh');
				}
				}