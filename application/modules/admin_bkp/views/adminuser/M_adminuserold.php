<?php 


class m_adminuser extends CI_Model{


	private $tbl_name = 'tbl_users';


	function addpage()
	{
		$priority = $this->get_length();
		/////
		$slug = url_title($this->input->post('usermame'), 'dash', true);
		$serviceslug = $this->checkSlugExists($slug);
		$data = array(
			'slug' => $serviceslug,
			'username' => $this->input->post('username'),
			'password' => SHA1($this->input->post('password')),
			'company' => $this->input->post('company'),
			'depeartment' => $this->input->post('depeartment'),
			'email' => $this->input->post('email'),
			'first_name' => $this->input->post('first_name'),
			'last_name' => $this->input->post('last_name'),
			'mobile_no' => $this->input->post('mobile_no'),
			'address' => $this->input->post('address'),
			'city' => $this->input->post('city'),
			'state' => $this->input->post('state'),
			'pincode' => $this->input->post('pincode'),
			'country' => $this->input->post('country'),
			'is_active' => 1,
			'priority' => $priority,
		);
		//echo'<pre>';print_r($data);echo'</pre>';die;
		$msg = 0;
		$this->db->insert($this->tbl_name, $data);
		//echo $this->db->last_query();die;
		$msg = ($this->db->affected_rows() > 0) ? 1 : 0; //for insert
		return $msg;
	}

	function checkSlugExists($slug){
		$serviceslug = '';
		$query = $this->db->query("select * from ".$this->tbl_name." where slug='".$slug."'");
		$count = $query->num_rows();
		// if slug pre exists
		if ($count > 0) {
			$id=rand(10000,99999);  
			$shorturl=base_convert($id,20,36);
			$serviceslug = $slug.$shorturl;
			return $serviceslug;
		}else
		return $slug;
	}

	//function listing($limit,$start,$startdate,$enddate,$specificOption,$specificValue)
	function listing($limit,$start)
	{
		$this->db->select('*');
		$this->db->from($this->tbl_name);
		$this->db->limit($limit, $start);
		$this->db->order_by('priority','asc');
		$query = $this->db->get();
		//echo $this->db->last_query();die;
		return $query->result_array();
	}

	function index($id){
		$data = array(
			'username' => $this->input->post('username'),
			'password' => $this->input->post('password'),
			'email' => $this->input->post('email'),
			'first_name' => $this->input->post('first_name'),
			'last_name' => $this->input->post('last_name'),
			'mobile_no' => $this->input->post('mobile_no'),
			'address' => $this->input->post('address'),
			'city' => $this->input->post('city'),
			'state' => $this->input->post('state'),
			'pincode' => $this->input->post('pincode'),
			'country' => $this->input->post('country'),
		);
		// echo'<pre>';print_r($data);echo'</pre>';die;
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
		return $msg;
	}

	function delete($pageid){
		$this->db->delete($this->tbl_name, array('id' => $pageid));
		return ($this->db->affected_rows() != 1) ? false : true;
  	}

	function status($id,$status){
		$this->db->where('id',$id );
        $this->db->set("is_active", $status);
        $this->db->update($this->tbl_name);
		//$this->output->enable_profiler(TRUE);
		return ($this->db->affected_rows() > 0) ? 2 : 0;//for insert // for update
  	}

	//function count_all($startdate,$enddate,$specificOption,$specificValue){
  	function count_all(){
		$this->db->select('*');
		/*if(!isEmpty($specificOption) && !isEmpty($specificValue)){
		   $this->db->like($specificOption,$specificValue);
		}*/
		$query = $this->db->get($this->tbl_name);
		return ($query->num_rows());
	}

	function page_info($id=0){
		$this->db->select('*');
		$this->db->from($this->tbl_name);
		if(!empty($id)){
			$this->db->where('id',$id);
		}
		$query = $this->db->get();
		return $query->result_array();
	}

	function Updatepriority($id,$priority)
	{
		$this->db->where('id',$id );
        $this->db->set("priority", $priority);
        $this->db->update($this->tbl_name);
		//$this->output->enable_profiler(TRUE);
		//return ($this->db->affected_rows() > 0) ? 2 : 0;//for insert // for update
	}

	function get_length(){
		$this->db->select('*');
		$this->db->from($this->tbl_name);
		$query = $this->db->get();
		return count($query->result_array())+1;
	}
}
?>