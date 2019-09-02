<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class login extends CI_Controller{
		public function __construct(){
			 parent::__construct();
			 $this->load->model('m_admin');
		}

		public function index(){
			$this->load->helper(array('form'));
			$data=array();
			if(isset($_COOKIE['cook'])){
				 $data['remember'] = $_COOKIE['cook'];
				 $data['username'] = $_COOKIE['cook_user'];
				 $data['password'] = $_COOKIE['cook_pass'];
			}
			$this->load->view('login',$data);
		}

		function check()
		{
			//This method will have the credentials validation
			$this->load->library('form_validation');
			$this->form_validation->set_rules('username', 'Username', 'trim|required');
			$this->form_validation->set_rules('password', 'Password', 'trim|required|callback_check_database');
			if($this->form_validation->run() == FALSE)
			{
			   //Field validation failed.User redirected to login page
			   $this->session->set_flashdata('error_msg', 'Invalid Username Or Password');
			   redirect('/admin/login');
			}
			else{
			  /*$type=getCurUserType();
			  if(isEmpty($type)){
					redirect('/staff','refresh');
			  } else {
					redirect('/admin','refresh');
			  }*/
			  redirect('/admin','refresh');
			}
		}

		function check_database()
		{
		  //query the database
		  $result = $this->m_admin->login($this->input->post('username'), $this->input->post('password'));
		  //print_r($result);die;
		  if($result){
		    $sess_array = array();
		    foreach($result as $row){
				$sess_array = array(
					'id' => $row->id,
					'username' => $row->username,
					'admin_type' => $row->is_admin,
					'admin_role' => $row->role_id
				);
		      	$this->session->set_userdata(backendsession, $sess_array);
			  	//pr($this->session->all_userdata());exit;
			}

			/**Set cookie*/
			$this->load->helper('cookie');
			$cookie_time = time()+3600*24*7;
			$cookie_unset = time()-3600*24*7;
			if($this->input->post('remember') == "on")
			{
				   set_cookie('cook_user',$this->input->post('username'),$cookie_time);
			       set_cookie('cook_pass',$this->input->post('password'),$cookie_time);
			       set_cookie('cook',$this->input->post('remember'),$cookie_time);
			}
			else
			{
			       if(isset($_COOKIE['cook_user']) && !empty($_COOKIE['cook_user']) )
				   {
						set_cookie('cook_user','', $cookie_unset);
						set_cookie('cook_pass','', $cookie_unset);
						set_cookie('cook','', $cookie_unset);
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
}