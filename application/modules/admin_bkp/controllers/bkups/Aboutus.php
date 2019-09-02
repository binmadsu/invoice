<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class aboutus extends CI_Controller{
	public function __construct(){
	    parent::__construct();
	    is_logged_in();
	    $this->load->model('m_aboutus');
	}
	public function index(){
		$this->load->library('ckeditor');
		$this->load->library('ckfinder');
		$this->ckeditor->basePath = base_url().'assets/ckeditor/';
		$this->ckeditor->config['language']= 'eng';
		$this->ckeditor->config['width'] = '630px';
		$this->ckeditor->config['height'] = '300px'; 
		//$this->ckeditor->config['filebrowserUploadUrl'] = base_url().'testing.php';
		$this->ckeditor->config['filebrowserUploadUrl'] = base_url().'/admin/aboutus/upload';
		$data = array();
		$data['datarows'] = $this->m_aboutus->page_info();
		$id = isset($data['datarows']['id'])?$data['datarows']['id']:0;
		$this->load->helper(array('form'));
	    $this->load->library('form_validation');
		if($_SERVER['REQUEST_METHOD'] == 'POST')
		{
			$this->m_aboutus->index($id);
			$this->session->set_flashdata('msg', 'Record added successfully!');
			redirect('admin/aboutus', 'refresh');die;
	 	}
	 	//pr($data);die;
	   	$this->load->view('aboutus/add_view',$data);
	}
}