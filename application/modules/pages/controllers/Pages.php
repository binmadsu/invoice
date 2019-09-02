<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Pages extends CI_Controller {

	private $limit = pagination_count;
	function __construct(){
	    parent::__construct();
		is_logged_in();
		$this->load->model('m_pages');
		//$this->output->cache(5);
	}
	
	function index($page_slug=''){

		//echo '===='.$page_slug;die;
		$data = array();
		$this->load->library('form_validation');
		$this->validateContactUs();
		$data['settings'] = get_settings();
		$curURL = current_url();
		$data['pageData'] = $this->m_pages->get_pages($page_slug);
		if(@$data['pageData']->page_slug == ''){
			redirect('admin/login');die;
		}
		//echo '<pre>';print_r($data);die;
		if(@$data['pageData']->page_slug=='home')
		{
			$data['banners'] = $this->m_pages->get_banners();
			$data['about'] = $this->m_pages->get_about('home');
			$data['packages'] = $this->m_pages->get_packages();
			$cond = " and is_active = '1' and is_featured= '1'";
			$data['weddings'] = getWeddingsByUID(0,'',$cond,true);
			//pr($data);die;
			$this->load->view('view_home',$data);
		}
		else
		{
			$this->load->view('view_page',$data);
		}
	}

	function validateContactUs(){
		if(@$_POST['btnContact'] == 'Contact Us'){
			if(!empty($_POST)){
				$this->form_validation->set_rules('firstname', 'Name', 'required');
				//$this->form_validation->set_rules('email', 'Email', 'required|is_unique[tbl_members.email]');
				$this->form_validation->set_rules('email', 'Email', 'required');
				$this->form_validation->set_rules('mobile', 'Mobile', 'required');
				$this->form_validation->set_rules('subject', 'Subject', 'required');
				$this->form_validation->set_rules('message', 'Message', 'required');
			}
			if($this->form_validation->run() == true)
			{
				//echo '<pre>';print_r($_POST);die;
				// Add to db
				$this->m_pages->addQuery('tbl_enquiry', $_POST);
				/////////////
				$title = 'Marriage Tickets';
				$subject = "$title - Contact Us";
				$firstname = isset($_POST['firstname'])?$_POST['firstname']:'';
				$mobile = isset($_POST['mobile'])?$_POST['mobile']:'';
				$email = isset($_POST['email'])?$_POST['email']:'';
				$msgsubject = isset($_POST['subject'])?$_POST['subject']:'';
				$message = isset($_POST['message'])?$_POST['message']:'';
				$replace_word = array(
				  '##SUBJECT##' => $subject,
				  '##USERNAME##' => $firstname,
				  '##USEREMAIL##' => $email,
				  '##PHONE##' => $mobile,
				  '##MSGSUBJECT##' => $msgsubject,
				  '##MESSAGE##' => $message,
				);
				//echo '<pre>';print_r($replace_word);die;
				if(base_url() != 'http://localhost/marriagetickets/'){
					$to = 'ashish@radiantwebtech.com';
					sendMail($to, $subject, 'contactus', $replace_word);
					$this->session->set_flashdata('contact_error_msg', 'Mail sent successfully');
					unset($_POST);
				}
				/////////////////////////////////
			}
			else
			{
				$errors = validation_errors();
				$this->session->set_flashdata('contact_error_msg', $errors);
			}
		}
	}

}