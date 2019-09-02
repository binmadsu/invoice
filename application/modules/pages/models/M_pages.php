<?php 
class m_pages extends CI_Model{
	private $tbl_users = 'tbl_pages';
	function get_pages($page_slug='')
	{
		if(empty($page_slug)){
			$page_slug ='home';
		}else{
			//check slug is exist or not
			$query = $this->db->select('page_slug');
			$this->db->from('tbl_pages');
			$this->db->where('page_slug',$page_slug);
			//$this->db->where('status','1');
			$this->db->limit(1,0);
			$query = $this->db->get();
			//echo $this->db->last_query(); die;
			$result = $query->row();
			if(empty($result)){
				$page_slug ='404';
			}
		}		
		$this->db->select('*');
		$this->db->from('tbl_pages');
		$this->db->where('page_slug',$page_slug);
		//$this->db->where('status','1');
		$this->db->limit(1,0);
		$query = $this->db->get();	
		$ret = $query->row();
		return $ret;
		//echo $this->db->last_query(); die;
		//return $query->result_array();
	}

	function get_banners()
	{
		$this->db->select('*');
		$this->db->from('tbl_banners');
		$this->db->where('is_active','1');
		$this->db->order_by('priority','Asc');
		$query = $this->db->get();
		//echo $this->db->last_query(); die;
		return $query->result_array();
	}

	function get_packages()
	{
		$this->db->select('*');
		$this->db->from('tbl_categories');
		$this->db->where('is_active','1');
		$this->db->order_by('priority','Asc');
		$query = $this->db->get();
		//echo $this->db->last_query(); die;
		return $query->result_array();
	}
	function get_about()
	{
		$this->db->select('*');
		$this->db->from('tbl_dynamic_contents');
		$query = $this->db->get();
		//echo $this->db->last_query(); die;
		$arrData = $query->result_array();
		return @$arrData[0];
	}

	function addQuery($tbl_name,$arrFields){
		$msg = 0;
		if($tbl_name == 'tbl_enquiry'){
			$data = array(
				'firstname' => @$arrFields['firstname'],
				'contact_no' => @$arrFields['mobile'],
				'email' => @$arrFields['email'],
				'subject' => @$arrFields['subject'],
				'message' => @$arrFields['message'],
			);
			//echo'<pre>';print_r($data);echo'</pre>';die;
			$this->db->insert($tbl_name, $data);
		}

		if($tbl_name == 'tbl_subcribers'){
			$data = array(
				'firstname' => @$arrFields['firstname'],
				'email' => @$arrFields['email'],
			);
			//echo'<pre>';print_r($data);echo'</pre>';die;
			$this->db->insert($tbl_name, $data);
		}

		$msg = ($this->db->affected_rows() > 0) ? 1 : 2;
		return $msg;
	}
}
?>