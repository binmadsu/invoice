<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class thankyou extends CI_Controller {

	function index()
	{
		$data = array();
		//$data['settings'] = get_settings();
		$data['title']='Thank You';
		$this->load->view('thank_you',$data);
	}
}