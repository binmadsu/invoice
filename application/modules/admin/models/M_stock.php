<?php 


class m_stock extends CI_Model{


	private $tbl_name = 'tbl_stock';


	function addpage()
	{
		$priority = $this->get_length();
		/////
		$slug = url_title($this->input->post('vendor'), 'dash', true);
		$serviceslug = $this->checkSlugExists($slug);
		$data = array(
			'slug' => $serviceslug,
			'vendor_id' => $this->input->post('supplier'),
			'location' => $this->input->post('location'),
			'item_id' => $this->input->post('itemname'),
			'serial_no' => $this->input->post('serial_no'),
			'mac' => $this->input->post('mac'),
			'status' => $this->input->post('status'),
			'comments' => $this->input->post('comments'),
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
		$query = $this->db->query("SELECT * FROM tbl_purchase c join tbl_recivedstock g on c.id=g.purchase_id where c.status = '1'and c.order_type = 'Purchase Order' order by g.created_on DESC limit $start, $limit");
		//echo $this->db->last_query();die;
		return $query->result_array();
	}

	function index($id){
		$data = array(
			'vendor_id' => $this->input->post('supplier'),
			'location' => $this->input->post('location'),
			'item_id' => $this->input->post('itemname'),
			'serial_no' => $this->input->post('serial_no'),
			'mac' => $this->input->post('mac'),
			'status' => $this->input->post('status'),
			'comments' => $this->input->post('comments'),
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
		$query = $this->db->query("SELECT * FROM tbl_purchase c join tbl_recivedstock g on c.id=g.purchase_id where c.status = '1' order by g.created_on DESC");
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
	
	function Getsupplier(){
		$query = $this->db->get('tbl_supplier');
		$role[''] = "Select vendor*";
		foreach($query->result() as $row){
			$role[$row->id] =  ucfirst($row->supplier_name);
		}
		return $role;
	}
	
	function Getitem(){
		$query = $this->db->get('tbl_item');
		$role[''] = "Select Item*";
		foreach($query->result() as $row){
			$role[$row->id] =  ucfirst($row->item_name);
		}
		return $role;
	}
}
?>