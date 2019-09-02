<?php
class m_user extends CI_Model{
	private $tbl_users = 'tbl_users';

	function index($user_id){
		//echo '==='.$user_id;die;
		$is_logged_in = $this->session->userdata('logged_in');
		$data = array(				     'user_fname' => $this->input->post('user_fname'),
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
			'user_type' => $this->input->post('user_type'),
		    'user_role' => $this->input->post('user_type')
	);
	//echo'<pre>';print_r($data);echo'</pre>'; die;
	$msg = 0;
	if( $user_id == 0 ){
		$this->db->insert('tbl_users', $data);
		$msg = ($this->db->affected_rows() > 0) ? 1 : 0;//for insert
	}else{
		$this->db->where('user_id',$user_id );
	    $this->db->update('tbl_users', $data); 
		//echo $this->db->last_query();die;
		$msg = ($this->db->affected_rows() > 0) ? 2 : 3;//for update : for nothing happened
		
	}	
	return  $msg;
	
	}
	
	function update_profile($user_id){
		$is_logged_in = $this->session->userdata('logged_in');
		$data = array('first_name' => $this->input->post('user_fname'),
			'last_name' => $this->input->post('user_lname'),
			'email' => $this->input->post('user_email'),
			'username' => $this->input->post('username'),
			'password' => SHA1($this->input->post('user_password')),
		);
		//echo'<pre>';print_r($data);echo'</pre>'; die;
		$msg = 0;
		$this->db->where('id',$user_id );
		$this->db->update('tbl_users', $data); 
		//echo $this->db->last_query();die;
		$msg = ($this->db->affected_rows() > 0) ? 2 : 3;//for update : for nothing happened
		return $msg;
	}
	
	/*function role(){
		$query = $this->db->get('tbl_role');
		$role[''] = "Select Role*"; 
		foreach($query->result() as $row){
			$role[$row->role_id] =  ucfirst($row->role_name);
		}
		return $role;
	}*/
	
	function listing($limit,$start,$startdate,$enddate,$specificOption,$specificValue){
		$this->db->select('tbl_users.*,tbl_role.role_name');
		$this->db->from('tbl_users');
		$this->db->join('tbl_role','tbl_role.role_id = tbl_users.user_role','left');
		if(!isEmpty($specificOption) && !isEmpty($specificValue)){
		   $this->db->like($specificOption,$specificValue);
		}
		$this->db->limit($limit, $start);
		$this->db->order_by('user_id','Asc');
		$query = $this->db->get();
		//echo $this->db->last_query(); die;
		return $query->result_array();
	}
	function countUser(){
		return $this->db->count_all('tbl_users');
	}
	
	function delete( $user_id ){
		$this->db->delete('tbl_users', array('user_id' => $user_id));
		return ($this->db->affected_rows() != 1) ? false : true;
  	}
	function status( $user_id,$status ){
		$this->db->where('user_id',$user_id );
        $this->db->set("user_status", $status);
        $this->db->update("tbl_users");
		//$this->output->enable_profiler(TRUE);
		return ($this->db->affected_rows() > 0) ? 2 : 0;//for insert // for update 
  	}
	
	 function count_all($startdate,$enddate,$specificOption,$specificValue){
		$this->db->select('*');
		if(!isEmpty($specificOption) && !isEmpty($specificValue)){
		   $this->db->like($specificOption,$specificValue);
		}
		       $query =   $this->db->get($this->tbl_users);
			return ($query->num_rows());
	}
	
	function user_info($id=0){
		$this->db->select('*');
		$this->db->from($this->tbl_users);
		if(!empty($id)){
		$this->db->where('user_id',$id);
		}
		$query = $this->db->get();
		return $query->result_array();
	}
	
	
	function userNameFromId($id){
	$row = $this->db->select('user_fname,user_lname')
					 ->get_where('tbl_users',array('user_id' => $id))->row();
	return is_object($row)?$row->user_fname.' '.$row->user_lname:false;
	}


}
?>