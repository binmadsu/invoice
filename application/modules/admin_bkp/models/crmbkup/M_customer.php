<?php 
class m_customer extends CI_Model{
	private $tbl_members = 'tbl_members';

	function index($member_id){
		$is_logged_in = $this->session->userdata('logged_in');
		$logo = $this->uploadCustomerLogo();
		if($logo){
			$data = array(
					'title' => $this->input->post('title'),
					'logo' => $logo,
					'status'=>'1',
				);
		}else{
			$data = array(
					'title' => $this->input->post('title'),
					'status'=>'1',
				);
		}
		//echo'<pre>';print_r($data);echo'</pre>';die;
		$msg = 0;
		if( $member_id == 0 ){
			$this->db->insert('tbl_members', $data);
			$msg = ($this->db->affected_rows() > 0) ? 1 : 0;//for insert
		}else{
			$this->db->where('id',$member_id );
		    $this->db->update('tbl_members', $data); 
			//echo $this->db->last_query();die;
			$msg = ($this->db->affected_rows() > 0) ? 2 : 3;//for update : for nothing happened
			
		}	
		return $msg;
	}

	function listing($limit,$start,$startdate,$enddate,$specificOption,$specificValue){
		$this->db->select('tbl_members.*');
		$this->db->from('tbl_members');
		//$this->db->join('tbl_role','tbl_role.role_id = tbl_members.user_role','left');
		if(!isEmpty($specificOption) && !isEmpty($specificValue)){
		   $this->db->like($specificOption,$specificValue);
		}
		$this->db->limit($limit, $start);
		$this->db->order_by('id','DESC');
		$query = $this->db->get();
		//echo $this->db->last_query(); die;
		return $query->result_array();
	}
	function countUser(){
		return $this->db->count_all('tbl_members');
	}
	
	function delete( $member_id ){
		$this->db->delete('tbl_members', array('id' => $member_id));
		return ($this->db->affected_rows() != 1) ? false : true;
  	}
	function status( $member_id,$status ){
		$this->db->where('id',$member_id );
        $this->db->set("status", $status);
        $this->db->update("tbl_members");
		//$this->output->enable_profiler(TRUE);
		return ($this->db->affected_rows() > 0) ? 2 : 0;//for insert // for update 
  	}
	
	 function count_all($startdate,$enddate,$specificOption,$specificValue){
		$this->db->select('*');
		if(!isEmpty($specificOption) && !isEmpty($specificValue)){
		   $this->db->like($specificOption,$specificValue);
		}
		       $query =   $this->db->get($this->tbl_members);
			return ($query->num_rows());
	}
	
	function customer_info($id=0){
		$this->db->select('*');
		$this->db->from($this->tbl_members);
		if(!empty($id)){
		$this->db->where('id',$id);
		}
		$query = $this->db->get();
		return $query->result_array();
	}
	
	
	function userNameFromId($id){
	$row = $this->db->select('user_fname,user_lname')
					 ->get_where('tbl_members',array('user_id' => $id))->row();
	return is_object($row)?$row->user_fname.' '.$row->user_lname:false;
	}
	
	//user role
	function role(){
		$query = $this->db->get('tbl_role');
		$role[''] = "Select Role*"; 
		foreach($query->result() as $row){
			$role[$row->role_id] =  ucfirst($row->role_name);
		}
		return $role;
	}
	
	
	function varifyemail($email)
	{
		$query=$this->db->query("select * from tbl_members where email='$email'");
		return ($this->db->affected_rows() > 0) ? 1 : 0;
		//echo $this->db->last_query();die;
	}

	public function uploadCustomerLogo()
	{
		$time = time();
		$url = 'assets/customer-logo/'.$time."_".$_FILES['logo']['name'];

	 	//extensive suitability check before doing anything with the file...
	    if (($_FILES['logo'] == "none") || (empty($_FILES['logo']['name'])) )
	    {
	       $message = "No file uploaded.";
	       $url  = '';
	    }
	    else if ($_FILES['logo']["size"] == 0)
	    {
	       $message = "The file is of zero length.";$url  = '';
	    }
	    else if (!is_uploaded_file($_FILES['logo']["tmp_name"]))
	    {
	       $message = "You may be attempting to hack our server. We're on to you; expect a knock on the door sometime soon.";
	       $url  = '';
	    }
	    else {
	      $message = "";
	      $move = @ move_uploaded_file($_FILES['logo']['tmp_name'], $url);
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