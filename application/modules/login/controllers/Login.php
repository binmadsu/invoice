<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class login extends CI_Controller{
	public function __construct(){
	    parent::__construct();
	    $this->load->model('m_admin');
	}
	
	public function index(){
		$member_id = getMemberUserID();
		//ECHO 'member_id:'.$member_id;die;
		if(!empty($member_id)){
			if(!empty($referrer)){
			  redirect($referrer,'refresh');die();
			}else{
			  // If user logged in
			  redirect('/');die();
			}
		}
		/*
		$data=array();
		$data['settings'] = get_settings();
		$this->load->helper(array('form'));
		//pr($_COOKIE);exit;
		if(isset($_COOKIE['member_cook'])){
			$data['remember'] = $_COOKIE['cook_rem_member'];
			$data['username'] = $_COOKIE['cook_member_name'];
			$data['password'] = $_COOKIE['cook_member_pass'];
		}
		//pr($data);exit;
		$this->load->view('login',$data);
		*/
		redirect('/registration');die();
	}
	
	function check()
	{
		//This method will have the credentials validation
		$referrer= $this->input->post('referrer');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|callback_check_database');
		if($this->form_validation->run() == false)
		{
			//Field validation failed.User redirected to login page
			$this->session->set_flashdata('error_msg', 'Invalid Email Or Password');
			$data=array();
			$data['settings'] = get_settings();
			$this->load->view('login',$data);
			//redirect('/login');
		}
		else{
			$member_id = getMemberUserID();
			//ECHO 'member_id:'.$member_id;die;
			if(!empty($member_id)){
				if(!empty($referrer)){
					redirect($referrer,'refresh');die();
				}else{
					// If user logged in
			  		redirect('/');die();
				}
			}
		}
	}
	
	function check_database()
	{
		//query the database
		$result = $this->m_admin->login($this->input->post('username'), $this->input->post('password'));
		//echo'<pre> == ';print_r($result);die;
		if($result){
			$sess_array = array();
			foreach($result as $row){
				$sess_array = array(
					'id' => $row->id,
					'username' => $row->email,
					'status' => $row->status
					//'admin_type' => $row->user_type,
					//'admin_role' => $row->user_role
				);
				$this->session->set_userdata(frontendsession, $sess_array);
				//pr($this->session->all_userdata());exit;
			}
			/**Set cookie
			*/
			$this->load->helper('cookie');
			$cookie_time = time()+3600*24;
			$cookie_unset = time()-3600*24;
			if($this->input->post('remember') == "on"){
				   set_cookie('cook_member_name',$this->input->post('username'),$cookie_time);
				   set_cookie('cook_member_pass',$this->input->post('password'),$cookie_time);
				   set_cookie('cook_rem_member',$this->input->post('remember'),$cookie_time);
			}else{
				if(isset($_COOKIE['cook_member_name']) && !empty($_COOKIE['cook_member_pass']) ){
					set_cookie('cook_member_name','', $cookie_unset);
					set_cookie('cook_member_pass','', $cookie_unset);
					set_cookie('cook_rem_member','', $cookie_unset);
				}
			}
			return true;
	  }
	  else
	  {
		$this->form_validation->set_message('check_database', 'Invalid username or password');
		return false;
	  }
	}
	
	function myaccount(){
		$this->load->model('m_user');
		$data['user'] = $this->m_user->user_info(getMemberID());
		//pr($data);exit;
		$this->load->view('view_user',$data);
	}
	
	
	public function validate_pass($pass)
	{
		$result = $this->m_user->checkpass($pass);
		if ($result!=1)
		{
			$this->form_validation->set_message('validate_pass', 'Sorry password does not match with old password');
			return FALSE;
		}
		return TRUE;
	}
	
	
	public function varify_email($email)
	{
		$result = $this->m_user->varifyemail($email);
		if ($result==1)
		{
			$this->form_validation->set_message('varify_email', 'Account already exits with this email.');
			return FALSE;
		}
		return TRUE;
	}
	
	function updateprofile()
	{
		is_memberlogged_in();
		$data = array();
		$data['settings'] = get_settings();
		$member_id = getMemberID();
		$this->load->model('m_user');
		$this->load->library('form_validation');
		if(!empty($_POST)){
			$this->form_validation->set_rules('firstname', 'First Name', 'required');
			//$this->form_validation->set_rules('mobile', 'Mobile', 'required');
			$this->form_validation->set_rules('email', 'Email', 'trim|required|callback_check_email');
			//$this->form_validation->set_rules('address', 'Address', 'required');
			if($this->input->post('pwd')){
				$this->form_validation->set_rules('pwd', 'Password', 'required');
				$this->form_validation->set_rules('confirmpassword', 'Confirm Password', 'trim|required|matches[pwd]');
			}
			//pr($_POST);die;
		}
		if($this->form_validation->run() == true)
		{
			$msg = $this->m_user->update_profile($member_id);
			if(!empty($msg)){
			   $this->session->set_flashdata('msg', 'Your Profile Updated successfully');
			}
			redirect('/user/profile');
		}
		else{
			$this->load->helper(array('form'));
			$data['user'] = getMemberDetailsById($member_id);
			//$data['orders'] = getMemberOrdersById($member_id);
			//pr($data);exit;
			$this->load->view('view_updateprofile',$data);
		}
	}

	function check_email()
	{
		$member_id = getMemberID();
		$result = $this->m_user->isEmailExist($this->input->post('email'),$member_id);
		if ($result==1)
		{
			$this->form_validation->set_message('check_email', 'User already exits with this email.');
			return FALSE;
		}
		return true;
	}
}