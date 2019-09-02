<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class members extends CI_Controller{
	public function __construct(){
	    parent::__construct();
	    is_logged_in();
	    $this->load->model('m_member');
	}
	
	public function index(){
		$this->load->library('ckeditor');
		$this->load->library('ckfinder');
		$data = array();
		//$data['userTypes'] = getUserTypes();
		$this->ckeditor->basePath = base_url().'assets/ckeditor/';
		$this->ckeditor->config['language']= 'eng';
		$this->ckeditor->config['width'] = '630px';
		$this->ckeditor->config['height'] = '300px';
		$this->ckeditor->config['filebrowserUploadUrl'] = base_url().'/admin/members/upload';
		$this->load->helper(array('form'));
	    $this->load->library('form_validation');
		if($_SERVER['REQUEST_METHOD'] == 'POST')
		{
			$this->form_validation->set_rules('firstname', 'First Name', 'required');
			if($this->form_validation->run() == true)
	   		{
				$this->m_member->add();
				$this->session->set_flashdata('msg', 'Member added successfully!');
				//redirect('admin/registerschool/listing', 'refresh');
				redirect('admin/members', 'refresh');
			}
	 	}
	   	$this->load->view('member/add_member',$data);
	}

	//edit pages
	function edit($id)
	{
		//add ckeditor tools
		$this->load->library('ckeditor');
		$this->load->library('ckfinder');
		$this->ckeditor->basePath = base_url().'assets/ckeditor/';
		$this->ckeditor->config['language']= 'eng';
		$this->ckeditor->config['width'] = '630px';
		$this->ckeditor->config['height'] = '300px';  
		$this->ckeditor->config['filebrowserUploadUrl'] = base_url().'/admin/members/upload';
		//add ckeditor tools
		
		$this->load->library('form_validation');
		if(!empty($_POST)){
			$this->form_validation->set_rules('firstname', 'First Name', 'required');
		}
		if($this->form_validation->run() == true)
		{
			//echo $user_id;die;
			$msg = $this->m_member->index($id);
			if(!empty($msg)){
			   $this->session->set_flashdata('msg', 'Member Updated successfully');
			}
			redirect('/admin/members/listing/'.$page.'/');
		}
		else{
			$this->load->helper(array('form'));
			$data['member'] = $this->m_member->get_info($id);
			//$data['userTypes'] = getUserTypes();
			$date_of_birth = isset($data['member'][0]['date_of_birth'])?date("d/m/Y",strtotime($data['member'][0]['date_of_birth'])):'';
			if($date_of_birth)
			  $data['member'][0]['date_of_birth'] = $date_of_birth;
			//echo '<pre>';print_r($data);die;
			$this->load->view('member/edit_member',$data);
		}
	}
	
	function upload()
	{
		$time = time();
		$url = 'uploads/members/'.$_FILES['upload']['name'];
		//extensive suitability check before doing anything with the file...
		if (($_FILES['upload'] == "none") OR (empty($_FILES['upload']['name'])) )
		{
			$message = "No file uploaded.";
		}
		else if ($_FILES['upload']["size"] == 0)
		{
			$message = "The file is of zero length.";
		}
		else if (!is_uploaded_file($_FILES['upload']["tmp_name"]))
		{
			$message = "You may be attempting to hack our server. We're on to you; expect a knock on the door sometime soon.";
		}
		else {
			$message = "";
			@move_uploaded_file($_FILES['upload']['tmp_name'], "uploads/members/".$_FILES['upload']['name']);
			$url = base_url().'uploads/members/'.$_FILES['upload']['name'];
		}
		$CKEditorFuncNum = $_GET['CKEditorFuncNum'];
		echo "<script type='text/javascript'>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$message');</script>";
	}
	
	function listing($offset=0,$firstname=0,$lastname=0,$usertype=0,$state=0,$city=0){
		
		$this->load->helper('form');
		$limit = pagination_count;
		if($this->input->post('firstname')!='')
		{
			$firstname=$this->input->post('firstname');
		}
		if($this->input->post('lastname')!='')
		{
			$lastname=$this->input->post('lastname');
		}
		if($this->input->post('usertype')!='')
		{
			$usertype=$this->input->post('usertype');
		}
		if($this->input->post('state')!='')
		{
			$state=$this->input->post('state');
		}
		if($this->input->post('city')!='')
		{
			$city=$this->input->post('city');
		}
		/*$utypes = getUserTypes('I am a');
		$data['userTypes'] = $utypes;
		$data['states'] = getStates('101');
		$cities[''] = "Select City";
		$data['cities'] = $cities;*/
		$data['results'] = $this->m_member->listing($limit,$offset,$firstname,$lastname,$usertype,$state,$city);
		$config['total_rows'] = $this->m_member->count_all($firstname,$lastname,$usertype,$state,$city);

		/* pagination start */
		$this->load->library('pagination');
		$search_parameter="/$firstname/$lastname/$usertype/$state/$city";
		$config['first_url'] = site_url("admin/members/listing/0/".$search_parameter);
		$config['suffix']= $search_parameter;
		$config['base_url'] = site_url("admin/members/listing/");
		$config['per_page'] = $limit; 
		$config['uri_segment'] = 4;
		$this->pagination->initialize($config); 
		$data["links"] = $this->pagination->create_links();
		$data['page'] = $offset;
		/*******/
		$data['firstname'] = $firstname;
		$data['lastname'] = $lastname;
		$data['usertype'] = $usertype;
		//$data['current_state'] = $state;
		$data['current_city'] = $city;
		$this->load->view('member/view_members',$data);
	}

	//view member
	function view($id)
	{
		$data['row'] = getMember($id);
		//$data['schools'] = getMemberSchools($id);
		//pr($data);die;
		$this->load->view('member/view_member',$data);
	}
	/*
	public function isuniqueslug($slug){
		$slug = url_title($slug, 'dash', true);
		$id = $this->input->post('id');
        $this->db->where_not_in('id',$id);
        $this->db->where('product_name',$slug);
        $query = $this->db->get('tbl_products');
        //echo $this->db->last_query();
        //echo 'count:'.$query->num_rows();die;
        if($query->num_rows() > 0){
            $this->form_validation->set_message('isuniqueslug', 'Sorry, This slug is already used.please select another one');
            return false;
        }else{
            return true;
        }
    }
	*/
	// delete payment entry
	function delete($id){
		//isUserPermission('delete_user');
		//if($this->m_member->delete($id))
		if($this->m_member->status($id, 2))
			$this->session->set_flashdata('msg', 'Member Deleted successfully');
		redirect('/admin/members/listing/','refresh');
	}

	function status($id,$status){
		//isUserPermission('status_user');
		if($this->m_member->status($id,$status))
			$this->session->set_flashdata('msg', 'Member Updated successfully');
		redirect('/admin/members/listing/','refresh');
	}

	public function getcountry()
	{
		$res = getCountries();
		echo json_encode($res);exit;
	}
	public function getstate()
	{
		$countryid=$_POST['id'];
		$res = getStates($countryid);
		echo json_encode($res);exit;
	}
	public function getcity()
	{
		$stateid=$_POST['id'];
		$res = getCities($stateid);
		echo json_encode($res);exit;
	}

	/*
	public function getsubcategories()
	{
		$catid=$_POST['id'];
		$res = $this->m_school->get_product_subcategories($catid);
		echo json_encode($res);exit;
	}
	
	public function logout()
	{
		$CI =& get_instance();
		$is_logged_in = $CI->session->userdata('shuttle_admin');
		//pr($CI->session->userdata); die;
		if(!empty($is_logged_in))
		{
			$this->m_admin->logoutTime($is_logged_in['id']);
			$this->session->sess_destroy();
			redirect('admin/login');  
			die();
		}
		redirect('admin/login');
	}
	*/
}