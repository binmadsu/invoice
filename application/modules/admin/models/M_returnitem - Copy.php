<?php 


class m_returnitem extends CI_Model{


	private $tbl_name = 'tbl_return';
	
	function index(){
		$this->db->select("purchase_order"); 
		$this->db->from('tbl_purchase');
		$query = $this->db->get();
		//return $this->db->get('autocomplete')->result_array();
		return $query->result_array();
	}
	
	function check_purchase_order($id){
		$result = '';
		$this->db->where('purchase_order',$id);
		$query = $this->db->get('tbl_purchase');
		if ($query->num_rows() > 0){
			$result['res'] = "yes";
		}
		else{
			$result['res'] = "no";
		}
		return $result;
	}
	
	function addpage()
	{
		//echo "nabaghayat";exit;
		$data = array(
			'purchase_order' => $this->input->post('po_number'),
			'return_type' => $this->input->post('return_type'),
			'qty' => $this->input->post('po_qty'),
			'reason' => $this->input->post('reason'),
			'created_on' => date("Y-m-d H:i:s"),
		);
		//echo'<pre>';print_r($data);echo'</pre>';die;
		$msg = 0;
		$this->db->insert($this->tbl_name, $data);
		//echo $this->db->last_query();die;
		$msg = ($this->db->affected_rows() > 0) ? 1 : 0; //for insert
		return $msg;
	}
	
	function getvalue($id){
		$result = '';
		$this->db->where('purchase_order',$id);
		$query = $this->db->get('tbl_purchase');
		//$query = $this->db->get();
		//echo $this->db->last_query();die;
		return $query->result_array();
	}
	
	function deductvalue($id){
		$this->db->where('purchase_id',$id);
		$query = $this->db->get('tbl_recivedstock');
		//echo $this->db->last_query();die;
		return $query->result_array();
	}
	
	function update_outstock($id,$value){
		$data = array(
			'quantity' => $value,
		);
		$this->db->where('purchase_id',$id);
		$this->db->update('tbl_recivedstock', $data);
		//echo $this->db->last_query();die;
	}
	
	function update_repair($id,$value){
		$data = array(
			'repair' => $value,
		);
		$this->db->where('id',$id);
		$this->db->update('tbl_purchase', $data);
		//echo $this->db->last_query();die;
	}
	
	function update_instock($id,$value){
		$data = array(
			'quinty' => $value,
		);
		$this->db->where('id',$id);
		$this->db->update('tbl_purchase', $data);
		//echo $this->db->last_query();die;
	}
	
	function listing(){
		$this->db->select("*"); 
		$this->db->from('tbl_return');
		$this->db->order_by("id", "desc");
		$query = $this->db->get();
		//return $this->db->get('autocomplete')->result_array();
		return $query->result_array();
	}
	
	function count_all(){
		$this->db->select('*');
		$this->db->from('tbl_return');
		$query = $this->db->get();
		return ($query->num_rows());
	}
}
?>