<?php 
class m_member extends CI_Model{
	private $tbl_name = 'tbl_members';
	function add()
	{
		//echo '<pre>';print_r($_POST);die;
		$text=str_replace("\'","'",$this->input->post('aboutme'));
		$profile_image = $this->uploadImageObject($_FILES['profile_image']);
		$date_of_birth = date("Y-m-d",strtotime($this->input->post('date_of_birth')));
		$userId = uniqid();
		$memberslug = $this->input->post('firstname').$this->input->post('lastname').$userId;
		$data = array(
			'username' => url_title($memberslug, 'dash', true),
			'firstname' => $this->input->post('firstname'),
			'lastname' => $this->input->post('lastname'),
			'mobile' => $this->input->post('mobile'),
			'gender' => $this->input->post('gender'),
			'email' => $this->input->post('email'),
			'date_of_birth' => $date_of_birth,
			'city' => $this->input->post('city'),
			'hometown' => $this->input->post('hometown'),
			'aboutme' => $text,
			'profile_image' => $profile_image,
			'comanyname' => $this->input->post('comanyname'),
			'userTypeId' => $this->input->post('userTypeId'),
			'status' => '1',
			'createdon' => date("Y-m-d h:i:s",time()),
		);
		//echo'<pre>';print_r($data);echo'</pre>';die;
		$msg = 0;
		$this->db->insert($this->tbl_name, $data);
		$lastrecordid = $this->db->insert_id();
		$msg = ($this->db->affected_rows() > 0) ? 1 : 0;//for insert
		return  $msg;
	}
	
	function listing($limit,$start,$firstname,$lastname,$usertype,$stateid,$city){
		$query = "SELECT * FROM $this->tbl_name where 1=1 and status !=2 ";
		//
		if(!isEmpty($firstname)){
			$query .= " and firstname LIKE '%".$firstname."%' ESCAPE '!' ";
		}
		if(!isEmpty($lastname)){
			$query .= " and lastname LIKE '%".$lastname."%' ESCAPE '!' ";
		}
		if(!isEmpty($city)){
			$query .= " and city LIKE '%".$city."%' ESCAPE '!' ";
		}
		if(!isEmpty($usertype)){
			$query .= " and userTypeId = '".$usertype."'";
		}
		/*
		if(!isEmpty($stateid)){
			$query .= " and state = '".$stateid."'";
		}*/
		//
		// Default
		$query .= " ORDER BY id limit $start,$limit";
		$result = $this->db->query($query)->result_array();
		//echo 'query:'.$query;die;
		return $result;
	}

	function count_all($firstname,$lastname,$usertype,$stateid,$city){
		$query = "SELECT * FROM $this->tbl_name where 1=1 and status !=2 ";
		//
		if(!isEmpty($firstname)){
			$query .= " and firstname LIKE '%".$firstname."%' ESCAPE '!' ";
		}
		if(!isEmpty($lastname)){
			$query .= " and lastname LIKE '%".$lastname."%' ESCAPE '!' ";
		}
		if(!isEmpty($city)){
			$query .= " and city LIKE '%".$city."%' ESCAPE '!' ";
		}
		if(!isEmpty($usertype)){
			$query .= " and userTypeId = '".$usertype."'";
		}
		/*
		if(!isEmpty($stateid)){
			$query .= " and state = '".$stateid."'";
		}*/
		//
		$result = $this->db->query($query)->num_rows();
		//echo 'query:'.$query;die;
		return $result;
	}
	
	function index($id){
		//echo '<pre>';print_r($_POST);die;
		$text=str_replace("\'","'",$this->input->post('aboutme'));
		$profile_image = $this->uploadImageObject($_FILES['profile_image']);
		$date_of_birth = date("Y-m-d",strtotime($this->input->post('date_of_birth')));
		if($profile_image)
		{
			$data = array(
				'firstname' => $this->input->post('firstname'),
				'lastname' => $this->input->post('lastname'),
				'mobile' => $this->input->post('mobile'),
				'gender' => $this->input->post('gender'),
				'email' => $this->input->post('email'),
				'date_of_birth' => $date_of_birth,
				'city' => $this->input->post('city'),
				'hometown' => $this->input->post('hometown'),
				'aboutme' => $text,
				'profile_image' => $profile_image,
				'comanyname' => $this->input->post('comanyname'),
				'userTypeId' => $this->input->post('userTypeId'),
				'status' => '1',
				'createdon' => date("Y-m-d h:i:s",time()),
			);
		}else{
			$data = array(
				'firstname' => $this->input->post('firstname'),
				'lastname' => $this->input->post('lastname'),
				'mobile' => $this->input->post('mobile'),
				'gender' => $this->input->post('gender'),
				'email' => $this->input->post('email'),
				'date_of_birth' => $date_of_birth,
				'city' => $this->input->post('city'),
				'hometown' => $this->input->post('hometown'),
				'aboutme' => $text,
				'comanyname' => $this->input->post('comanyname'),
				'userTypeId' => $this->input->post('userTypeId'),
				'status' => '1',
				'createdon' => date("Y-m-d h:i:s",time()),
			);
		}
		//echo'<pre>';print_r($data);echo'</pre>';die;
		$msg = 0;
		if( $id == 0 ){
			$this->db->insert($this->tbl_name, $data);
			$msg = ($this->db->affected_rows() > 0) ? 1 : 0;//for insert
		}else{
			$this->db->where('id',$id );
		    $this->db->update($this->tbl_name, $data);
			//echo $this->db->last_query();die;
			$msg = ($this->db->affected_rows() > 0) ? 2 : 3;//for update : for nothing happened
		}
		/////
		return $msg;
	}
	
	function delete($id){
		$this->db->delete($this->tbl_name, array('id' => $id));
		return ($this->db->affected_rows() != 1) ? false : true;
  	}

	function status($id,$status){
		$this->db->where('id',$id );
        $this->db->set("status", $status);
        $this->db->update($this->tbl_name);
		//$this->output->enable_profiler(TRUE);
		return ($this->db->affected_rows() > 0) ? 2 : 0;//for insert // for update
  	}

	function get_info($id=0){
		$this->db->select('*');
		$this->db->from($this->tbl_name);
		if(!empty($id)){
			$this->db->where('id',$id);
		}
		$query = $this->db->get();
		return $query->result_array();
	}

	public function uploadImageObject($objfile)
	{
		//echo '<pre>';print_r($objfile);die;
		$time = time();
		$url = 'assets/memberimage/'.$time."_".$objfile['name'];

	 	//extensive suitability check before doing anything with the file...
	    if (($objfile == "none") || (empty($objfile['name'])) )
	    {
	       $message = "No file uploaded.";
	       $url  = '';
	    }
	    else if ($objfile["size"] == 0)
	    {
	       $message = "The file is of zero length.";$url  = '';
	    }
	    else if (!is_uploaded_file($objfile["tmp_name"]))
	    {
	       $message = "You may be attempting to hack our server. We're on to you; expect a knock on the door sometime soon.";
	       $url  = '';
	    }
	    else {
	      $message = "";
	      $move = @ move_uploaded_file($objfile['tmp_name'], $url);
	      if(!$move)
	      {
	         $message = "Error moving uploaded file. Check the script is granted Read/Write/Modify permissions.";
	         $url  = '';
	      }
	    }
	    return $url;
	}

}
?>