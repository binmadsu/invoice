<?php
class m_page extends CI_Model{
	private $tbl_payment_criteria = 'tbl_pages';
	function addpage()
	{
		$text=str_replace("\'","'",$this->input->post('page_content'));
		$banner_image = $this->uploadBannerImage();
		$data = array('page_title' => $this->input->post('page_title'),
			'page_content' => $text,
			'page_slug' => url_title($this->input->post('page_title'), 'dash', true),
			'banner_text' => $this->input->post('banner_text'),
			'banner_image' => $banner_image,
		);
		//echo'<pre>';print_r($data);echo'</pre>';die;
		$msg = 0;
		$this->db->insert('tbl_pages', $data);
		$msg = ($this->db->affected_rows() > 0) ? 1 : 0;//for insert
	
		return  $msg;
	
	}
	
	function listing($limit,$start,$startdate,$enddate,$specificOption,$specificValue)
	{
		$this->db->select('tbl_pages.*');
		$this->db->from('tbl_pages');
		$this->db->where('status', '1');
		//$this->db->join('tbl_role','tbl_role.role_id = tbl_users.user_role','left');
		if(!isEmpty($specificOption) && !isEmpty($specificValue)){
		   $this->db->like($specificOption,$specificValue);
		}
		$this->db->limit($limit, $start);
		$this->db->order_by('created_on','Asc');
		$query = $this->db->get();
		//echo $this->db->last_query(); 
		return $query->result_array();
	}

	function count_all($startdate,$enddate,$specificOption,$specificValue){
		$this->db->select('*');
		$this->db->where('status', '1');
		if(!isEmpty($specificOption) && !isEmpty($specificValue)){
		   $this->db->like($specificOption,$specificValue);
		}
		$query =   $this->db->get($this->tbl_payment_criteria);
		return ($query->num_rows());
	}
	
	function index($id){
		//echo '==='.$user_id;die;
		$data1 = array();$arr1 = array();
		$text=str_replace("\'","'",$this->input->post('page_content'));
		$banner_image = $this->uploadBannerImage();
		if($banner_image){
			$data1 = array(
				//'page_slug' => url_title($this->input->post('page_title'), 'dash', true),
				'page_title' => $this->input->post('page_title'),
				'subtitle2' => $this->input->post('subtitle2'),
				'subtitle3' => $this->input->post('subtitle3'),
				'gmapurl' => $this->input->post('gmapurl'),
				'mobile' => $this->input->post('mobile'),
				'page_content' => $text,
				//'banner_text' => $this->input->post('banner_text'),
				'banner_image' => $banner_image,
			);
		}else{
			$data1 = array(
				//'page_slug' => url_title($this->input->post('page_title'), 'dash', true),
				'page_title' => $this->input->post('page_title'),
				'subtitle2' => $this->input->post('subtitle2'),
				'subtitle3' => $this->input->post('subtitle3'),
				'gmapurl' => $this->input->post('gmapurl'),
				'mobile' => $this->input->post('mobile'),
				'page_content' => $text,
				//'banner_text' => $this->input->post('banner_text'),
			);
		}
		//echo'<pre>';print_r($data);echo'</pre>';die;
		$msg = 0;
		if( $id == 0 ){
			$arr1 = array('page_slug' => url_title($this->input->post('page_title'), 'dash', true));
			$data = array_merge($arr1,$data1);
			$this->db->insert('tbl_pages', $data);
			$msg = ($this->db->affected_rows() > 0) ? 1 : 0;//for insert
		}else{
			$this->db->where('id',$id );
		    $this->db->update('tbl_pages', $data1);
			//echo $this->db->last_query();die;
			$msg = ($this->db->affected_rows() > 0) ? 2 : 3;//for update : for nothing happened
		}
		return $msg;
	}

	function countUser(){
		return $this->db->count_all('tbl_users');
	}
	
	function delete($pageid){
		$this->db->delete('tbl_pages', array('id' => $pageid));
		return ($this->db->affected_rows() != 1) ? false : true;
  	}
	function status($id,$status){
		$this->db->where('id',$id );
        $this->db->set("status", $status);
        $this->db->update("tbl_pages");
		//$this->output->enable_profiler(TRUE);
		return ($this->db->affected_rows() > 0) ? 2 : 0;//for insert // for update 
  	}
	
	function page_info($id=0){
		$this->db->select('*');
		$this->db->from('tbl_pages');
		if(!empty($id)){
			$this->db->where('id',$id);
		}
		$query = $this->db->get();
		return $query->result_array();
	}

	function userNameFromId($id){
		$row = $this->db->select('user_fname,user_lname')->get_where('tbl_users',array('user_id' => $id))->row();
		return is_object($row)?$row->user_fname.' '.$row->user_lname:false;
	}

	public function uploadBannerImage()
	{
		$time = time();
		$url = 'assets/page-banner/'.$time."_".$_FILES['banner_image']['name'];

		//$furl = 'http'.'://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
		//$fdata = explode('ckeditor/ckupload.php',$furl);

	 	//extensive suitability check before doing anything with the file...
	    if (($_FILES['banner_image'] == "none") || (empty($_FILES['banner_image']['name'])) )
	    {
	       $message = "No file uploaded.";
	       $url  = '';
	    }
	    else if ($_FILES['banner_image']["size"] == 0)
	    {
	       $message = "The file is of zero length.";$url  = '';
	    }
	    else if (!is_uploaded_file($_FILES['banner_image']["tmp_name"]))
	    {
	       $message = "You may be attempting to hack our server. We're on to you; expect a knock on the door sometime soon.";
	       $url  = '';
	    }
	    else {
	      $message = "";
	      $move = @ move_uploaded_file($_FILES['banner_image']['tmp_name'], $url);
	      if(!$move)
	      {
	         $message = "Error moving uploaded file. Check the script is granted Read/Write/Modify permissions.";
	         $url  = '';
	      }
	    }
	    return $url;
	}

	public function uploadImage()
	{
		//$time = time();
		//$url = 'assets/uploadimg/'.$time."_".$_FILES['upload']['name'];

		//$furl = 'http'.'://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
		//$fdata = explode('ckeditor/ckupload.php',$furl);

	 	//extensive suitability check before doing anything with the file...
	    if (($_FILES['upload'] == "none") || (empty($_FILES['upload']['name'])) )
	    {
	       $message = "No file uploaded.";
	    }
	    else if ($_FILES['upload']["size"] == 0)
	    {
	       $message = "The file is of zero length.";
	    }
	    else if (($_FILES['upload']["type"] != "image/pjpeg") AND ($_FILES['upload']["type"] != "image/jpeg") AND ($_FILES['upload']["type"] != "image/png"))
	    {
	       $message = "The image must be in either JPG or PNG format. Please upload a JPG or PNG instead.";
	    }
	    else if (!is_uploaded_file($_FILES['upload']["tmp_name"]))
	    {
	       $message = "You may be attempting to hack our server. We're on to you; expect a knock on the door sometime soon.";
	    }
	    else {
	      $message = "";
	      $move = @ move_uploaded_file($_FILES['upload']['tmp_name'], $url);
	      if(!$move)
	      {
	         $message = "Error moving uploaded file. Check the script is granted Read/Write/Modify permissions.";
	      }
	      $url = $fdata[0]."uploads/" . $time."_".$_FILES['upload']['name'];
	    }
		 
		$CKEditorFuncNum = $_GET['CKEditorFuncNum'] ;
		echo "<script type='text/javascript'>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$message');</script>";
	}
	
	
}
?>