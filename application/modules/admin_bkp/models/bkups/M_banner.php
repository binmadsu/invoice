<?php 
class m_banner extends CI_Model{
	private $tbl_banners = 'tbl_banners';
	function add()
	{
		//$is_logged_in = $this->session->userdata('logged_in');
		//$text=str_replace("\'","'",$this->input->post('banner_description'));
		//if(isset($_POST['show_home']) and $_POST['show_home'] == 'yes'){$show_home = '1';}else{$show_home='0';}
		$priority=$this->get_length();
		$banner_image = $this->uploadBannerImage();
		$data = array(
			'heading1' => $this->input->post('heading1'),
			'heading2' => $this->input->post('heading2'),
			'description' => $this->input->post('description'),
			'banner_image' => $banner_image,
			'priority' => $priority,
			/*'show_home' => $show_home,
			'banner_url' => $this->input->post('banner_url'),*/
			'is_active' => 1,
		);
		//echo'<pre>';print_r($data);echo'</pre>';die;
		$msg = 0;
	
		$this->db->insert('tbl_banners', $data);
		//echo $this->db->last_query();die;
		$msg = ($this->db->affected_rows() > 0) ? 1 : 0;//for insert
	
		return  $msg;
	}
	
	function aboutus($type)
	{
		$about_description=str_replace("\'","'",$this->input->post('about_description'));
		$data = array(
			'about_heading' => $this->input->post('about_heading'),
			'about_description' => $about_description,
			'about_heading2' => $this->input->post('about_heading2'),
			'weddings' => $this->input->post('weddings'),
			'location' => $this->input->post('location'),
			'guests' => $this->input->post('guests'),
		);
		$msg = 0;
		$this->db->where('type', $type);
		$this->db->update('tbl_dynamic_contents', $data);
		//echo $this->db->last_query();die;
		$msg = ($this->db->affected_rows() > 0) ? 2 : 3;//for update : for nothing happened
		return  $msg;
	}

	function Updatepriority($id,$priority)
	{
		$this->db->where('id',$id );
        $this->db->set("priority", $priority);
        $this->db->update($this->tbl_banners);
		//$this->output->enable_profiler(TRUE);
		//return ($this->db->affected_rows() > 0) ? 2 : 0;//for insert // for update
	}

	//get length
	function get_length(){
		$this->db->select('*');
		$this->db->from($this->tbl_banners);
		$query = $this->db->get();
		return count($query->result_array())+1;
	}
	
	function listing($limit,$start,$startdate,$enddate,$specificOption,$specificValue)
	{
		$this->db->select('*');
		$this->db->from('tbl_banners');
		if(!isEmpty($specificOption) && !isEmpty($specificValue)){
		   $this->db->like($specificOption,$specificValue);
		}
		$this->db->limit($limit, $start);
		$this->db->order_by('priority','Asc');
		$query = $this->db->get();
		//echo $this->db->last_query(); 
		return $query->result_array();
	}

	/* PArtner*/
	function partner_info($id=0){
		$this->db->select('*');
		$this->db->from('tbl_trade_partners');
		if(!empty($id)){
			$this->db->where('id',$id);
		}
		$query = $this->db->get();
		return $query->result_array();
	}
	function get_plength(){
		$this->db->select('*');
		$this->db->from('tbl_trade_partners');
		$query = $this->db->get();
		return count($query->result_array())+1;
	}

	function pUpdatepriority($id,$priority)
	{
		$this->db->where('id',$id );
        $this->db->set("priority", $priority);
        $this->db->update('tbl_trade_partners');
	}
	function pdelete($pageid){
		$this->db->delete('tbl_trade_partners', array('id' => $pageid));
		return ($this->db->affected_rows() != 1) ? false : true;
  	}
	function pstatus($id,$status){
		$this->db->where('id',$id );
        $this->db->set("is_active", $status);
        $this->db->update("tbl_trade_partners");
		return ($this->db->affected_rows() > 0) ? 2 : 0;
  	}
	function addPartner($id=0){
		$data = array();
		$priority=$this->get_plength();
		$banner_image = $this->uploadBannerImage();
		if($banner_image){
			$data = array(
				'banner_image' => $banner_image,
				'priority' => $priority,
				'is_active' => 1,
			);
		}
		//echo'<pre>';print_r($data);echo'</pre>'; die;
		$msg = 0;
		if( $id == 0 ){
			$this->db->insert('tbl_trade_partners', $data);
			$msg = ($this->db->affected_rows() > 0) ? 1 : 0;//for insert
		}else{
			$this->db->where('id',$id );
		    $this->db->update('tbl_trade_partners', $data);
			//echo $this->db->last_query();die;
			$msg = ($this->db->affected_rows() > 0) ? 2 : 3;//for update : for nothing happened
		}	
		return  $msg;
	}
	/**ParTner**/

	function uspedit($id=1){
		$data = array(
			'heading11' => $this->input->post('heading11'),
			'heading12' => $this->input->post('heading12'),
			'text11' => $this->input->post('text11'),
			'text12' => $this->input->post('text12'),
			'text13' => $this->input->post('text13'),
			'text14' => $this->input->post('text14'),
			'heading21' => $this->input->post('heading21'),
			'heading22' => $this->input->post('heading22'),
			'text21' => $this->input->post('text21'),
			'text22' => $this->input->post('text22'),
			'text23' => $this->input->post('text23'),
			'text24' => $this->input->post('text24'),
			'heading31' => $this->input->post('heading31'),
			'heading32' => $this->input->post('heading32'),
			'text31' => $this->input->post('text31'),
			'text32' => $this->input->post('text32'),
			'text33' => $this->input->post('text33'),
			'text34' => $this->input->post('text34'),
		);
		//echo'<pre>';print_r($data);echo'</pre>';die;
		$msg = 0;
		if( $id == 0 ){
			$this->db->insert('tbl_usp', $data);
			$msg = ($this->db->affected_rows() > 0) ? 1 : 0;//for insert
		}else{
			$this->db->where('id',$id );
		    $this->db->update('tbl_usp', $data); 
			//echo $this->db->last_query();die;
			$msg = ($this->db->affected_rows() > 0) ? 2 : 3;//for update : for nothing happened
		}	
		return  $msg;
	}
	
	function update_profile($user_id){
		$is_logged_in = $this->session->userdata('logged_in');
		$data = array('user_fname' => $this->input->post('user_fname'),
			'user_lname' => $this->input->post('user_lname'),
			'user_email' => $this->input->post('user_email'),
			'username' => $this->input->post('username'),
			'user_password' => SHA1($this->input->post('user_password')),
			'org_password' => $this->input->post('user_password'),
			'house_no' => $this->input->post('house_no'),
			'street' => $this->input->post('street'),
			'state' => $this->input->post('state'),
			'city' => $this->input->post('city'),
			'zip' => $this->input->post('zip'),
			'user_phone' => $this->input->post('user_phone'),
		);
		//echo'<pre>';print_r($data);echo'</pre>'; die;
		$msg = 0;
		$this->db->where('user_id',$user_id );
		$this->db->update('tbl_users', $data); 
		//echo $this->db->last_query();die;
		$msg = ($this->db->affected_rows() > 0) ? 2 : 3;//for update : for nothing happened
		return  $msg;
	}
	
	function countUser(){
		return $this->db->count_all('tbl_users');
	}
	
	function delete($pageid){
		$this->db->delete('tbl_banners', array('id' => $pageid));
		return ($this->db->affected_rows() != 1) ? false : true;
  	}
	function status($id,$status){
		$this->db->where('id',$id );
        $this->db->set("is_active", $status);
        $this->db->update("tbl_banners");
		//$this->output->enable_profiler(TRUE);
		return ($this->db->affected_rows() > 0) ? 2 : 0;//for insert // for update 
  	}
	
	 function count_all($startdate,$enddate,$specificOption,$specificValue){
		$this->db->select('*');
		if(!isEmpty($specificOption) && !isEmpty($specificValue)){
		   $this->db->like($specificOption,$specificValue);
		}
		$query =   $this->db->get($this->tbl_banners);
		return ($query->num_rows());
	}
	
	function partners_count_all($startdate,$enddate,$specificOption,$specificValue){
		$this->db->select('*');
		if(!isEmpty($specificOption) && !isEmpty($specificValue)){
		   $this->db->like($specificOption,$specificValue);
		}
		$query =   $this->db->get('tbl_trade_partners');
		return ($query->num_rows());
	}
	
	function page_info($id=0){
		$this->db->select('*');
		$this->db->from('tbl_banners');
		if(!empty($id)){
			$this->db->where('id',$id);
		}
		$query = $this->db->get();
		return $query->result_array();
	}
	function page_usp($id=1){
		$this->db->select('*');
		$this->db->from('tbl_usp');
		if(!empty($id)){
			$this->db->where('id',$id);
		}
		$query = $this->db->get();
		//echo $this->db->last_query();die;
		return $query->result_array();
	}
	function page_aboutus($type){
		$this->db->select('*');
		$this->db->from('tbl_dynamic_contents');
		if(!empty($id)){
			$this->db->where('id',$id);
		}
		if(!empty($type)){
			$this->db->where('type', $type);
		}
		$query = $this->db->get();
		//echo $this->db->last_query();die;
		return $query->result_array();
	}
	
	function userNameFromId($id){
		$row = $this->db->select('user_fname,user_lname')
			 ->get_where('tbl_users',array('user_id' => $id))->row();
		return is_object($row)?$row->user_fname.' '.$row->user_lname:false;
	}

	
	public function uploadBannerImage()
	{
		$time = time();
		$url = 'assets/banners/'.$time."_".$_FILES['banner_image']['name'];
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
	      $url = $fdata[0]."uploads/banners/" . $time."_".$_FILES['upload']['name'];
	    }
		 
		$CKEditorFuncNum = $_GET['CKEditorFuncNum'] ;
		echo "<script type='text/javascript'>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$message');</script>";
	}
	
	function partners_listing($limit,$start,$startdate,$enddate,$specificOption,$specificValue)
	{
		$this->db->select('*');
		$this->db->from('tbl_trade_partners');
		if(!isEmpty($specificOption) && !isEmpty($specificValue)){
		   $this->db->like($specificOption,$specificValue);
		}
		$this->db->limit($limit, $start);
		$this->db->order_by('priority','Asc');
		$query = $this->db->get();
		//echo $this->db->last_query(); 
		return $query->result_array();
	}
	function editBanner($id){
		//if(isset($_POST['show_home']) and $_POST['show_home'] == 'yes'){$show_home = '1';}else{$show_home='0';}
		$banner_image = $this->uploadBannerImage();
		if($banner_image){
			$data = array(
			'heading1' => $this->input->post('heading1'),
			'heading2' => $this->input->post('heading2'),
			'description' => $this->input->post('description'),
			'banner_image' => $banner_image,
			/*'show_home' => $show_home,
			'banner_url' => $this->input->post('banner_url'),*/
			'is_active' => 1,
			);
		}else{
			$data = array(
			'heading1' => $this->input->post('heading1'),
			'heading2' => $this->input->post('heading2'),
			'description' => $this->input->post('description'),
			/*'banner_url' => $this->input->post('banner_url'),
			'show_home' => $show_home,*/
			'is_active' => 1,
			);
		}
		//echo'<pre>';print_r($data);echo'</pre>'; die;
		$msg = 0;
		if( $id == 0 ){
			$this->db->insert('tbl_banners', $data);
			$msg = ($this->db->affected_rows() > 0) ? 1 : 0;//for insert
		}else{
			$this->db->where('id',$id );
		    $this->db->update('tbl_banners', $data); 
			//echo $this->db->last_query();die;
			$msg = ($this->db->affected_rows() > 0) ? 2 : 3;//for update : for nothing happened
			
		}	
		return  $msg;
	}
}
?>