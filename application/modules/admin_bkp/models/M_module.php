<?php
class m_module extends CI_Model{
	private $tbl_module = 'tbl_module';

	
	function addmodule()
	{
		$is_logged_in = $this->session->userdata('logged_in');
				
		$data = array('m_name' => strtolower($this->input->post('module_name')));
		
		$msg = 0;
	
		$this->db->insert('tbl_module', $data);
		$msg = ($this->db->affected_rows() > 0) ? 1 : 0;//for insert
	
		return  $msg;
	
	}
	
	function listing()
	{
		$this->db->select('tbl_module.*');
		$this->db->from('tbl_module');
		//$this->db->join('tbl_role','tbl_role.role_id = tbl_users.user_role','left');
		//$this->db->limit($limit, $start);
		//$this->db->order_by('created_on','Asc');
		$query = $this->db->get();
		//echo $this->db->last_query(); 
		return $query->result_array();
	}
	
	
	function index($id){
		//echo '==='.$user_id;die;
		$is_logged_in = $this->session->userdata('logged_in');
		$data = array('m_name' => $this->input->post('module_name'),
				);

	$msg = 0;
	if( $id == 0 ){
		$this->db->insert('tbl_module', $data);
		$msg = ($this->db->affected_rows() > 0) ? 1 : 0;//for insert
	}else{
		$this->db->where('m_id',$id );
	    $this->db->update('tbl_module', $data); 
		//echo $this->db->last_query();die;
		$msg = ($this->db->affected_rows() > 0) ? 2 : 3;//for update : for nothing happened		
	}	
	return  $msg;
	
	}
	
	
	function role(){
		$query = $this->db->get('tbl_role');
		$role[''] = "Select Role*"; 
		foreach($query->result() as $row){
			$role[$row->role_id] =  ucfirst($row->role_name);
		}
		return $role;
	}
	
	
	
	function countUser(){
		return $this->db->count_all('tbl_region');
	}
	
	function delete($pageid){
		$this->db->delete('tbl_module', array('m_id' => $pageid));
		return ($this->db->affected_rows() != 1) ? false : true;
  	}

	
	 function count_all($startdate,$enddate,$specificOption,$specificValue){
		$this->db->select('*');
		if(!isEmpty($specificOption) && !isEmpty($specificValue)){
		   $this->db->like($specificOption,$specificValue);
		}
		       $query =   $this->db->get($this->tbl_module);
			return ($query->num_rows());
	}
	
	function module_info($id=0){
		$this->db->select('*');
		$this->db->from('tbl_module');
		if(!empty($id)){
		$this->db->where('m_id',$id);
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