<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class admin extends CI_Controller{
	public function __construct(){
	     parent::__construct();
	     //$this->load->model('m_admin');
	}

	public function index(){
		is_logged_in();
		$this->load->helper(array('form'));
		$data = array();
		$this->load->view('view_home',$data);
	}

	public function nopermission(){
		//echo '===='.$this->router->fetch_method();
		//$this->load->helper(array('form'));
		$this->load->view('view_nopermission');
	}

	public function logout()
	{
		$CI =& get_instance();
		$is_logged_in = $CI->session->userdata(backendsession);
		//pr($CI->session->userdata); die;
		if(!empty($is_logged_in))
		{
			//$this->m_admin->logoutTime($is_logged_in['id']);
			$this->session->unset_userdata(backendsession);
			//$this->session->sess_destroy();
			redirect('admin/login');  
			die();
		}
		redirect('admin/login');
	}

	public function profile()
	{
		is_logged_in();
		$this->load->view('view_user',$data);
	}

	function setting(){
		is_logged_in();
		$this->load->library('ckeditor');
		$this->load->library('ckfinder');
		$this->ckeditor->basePath = base_url().'assets/ckeditor/';
		$this->ckeditor->config['language']= 'eng';
		$this->ckeditor->config['width'] = '630px';
		$this->ckeditor->config['height'] = '300px'; 
		//$this->ckeditor->config['filebrowserUploadUrl'] = base_url().'testing.php';
		$this->ckeditor->config['filebrowserUploadUrl'] = base_url().'/admin/page/upload';
		$this->ckeditor->config['extraAllowedContent'] = 'ul ol li span time';
		$this->load->helper(array('form'));
		$this->load->library('form_validation');
		$this->load->model('m_setting');
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			//echo '<pre>';print_r($_POST);die;
			//$this->form_validation->set_rules('admin_email', 'required');
			$seg = '';
			//if($this->form_validation->run() == true)
			//{
			$data['sucmsg'] = $this->m_setting->loadSettings(1);
			if($data['sucmsg']){
				$seg = 1;
			}
			redirect('admin/setting/'.$seg, 'refresh');
			//}
		}
		$data['setting'] = $this->m_setting->loadSettings(1);
		//$data['representatives'] = $this->m_setting->getRepresentatives();
		//echo'<pre>';print_r($data);die;
		$this->load->view('view_setting',$data);
	}

   /* email template */
   function email_template($id=0)
   {
		is_logged_in();
		//ckeditor
		$this->load->library('ckeditor');
		$this->load->library('ckfinder');
		$this->ckeditor->basePath = base_url().'assets/ckeditor/';
		$this->ckeditor->config['language'] = 'eng';
		$this->ckeditor->config['width'] = '630px';
		$this->ckeditor->editor ='applyStyle';
		$this->ckeditor->config['height'] = '300px';            
		//end ckeditor
		isUserPermission('email_template');
		$this->load->helper(array('form'));
		$this->load->library('form_validation');
		$this->load->model('m_setting');
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			$this->form_validation->set_rules('from', 'From', 'required');
			$this->form_validation->set_rules('subject', 'Subject', 'required');
			$this->form_validation->set_rules('content', 'Content', 'required');
			$seg = '';
			if($this->form_validation->run() == true)
				{
				$data['sucmsg'] = $this->m_setting->edit_email();
				if($data['sucmsg']){
				  $this->session->set_flashdata('msg', 'Template updated successfully..');
				}
				redirect('admin/email_template/', 'refresh');
			}
		}
		if(!empty($id)){
			$data['template_detail'] =  $this->m_setting->email_templates_detail($id);
			$this->load->view('mailer/view_email_ajax',$data);
		} else {
		   $data['templates'] =  $this->m_setting->email_templates();
		   $this->load->view('mailer/view_email_template',$data);
		}
   }
}