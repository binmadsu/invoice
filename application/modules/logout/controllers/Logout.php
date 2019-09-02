<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class logout extends CI_Controller{
	public function __construct(){
	     parent::__construct();
	     $this->load->model('login/m_admin');
	}
	
	public function index()
	{
		$CI =& get_instance();
		$is_logged_in = $CI->session->userdata(frontendsession);
		//pr($this->session->all_userdata());exit;
		//pr($CI->session->userdata); die;
		if(!empty($is_logged_in))
		{
			//$this->m_admin->logoutTime($is_logged_in['id']);
			$this->session->unset_userdata(frontendsession);
			//$this->session->sess_destroy();
			redirect('registration');
			die();
		}
		redirect('registration');
		//redirect('login');
	}
}