<?php 


class M_recivedstock extends CI_Model{


	private $tbl_name = 'tbl_recivedstock';


	function addpage()
	{
		$priority = $this->get_length();
		/////
		$purchase_id = $this->input->post('purchase_id');
		$purchase_order = $this->getvalue($purchase_id);
		$slug = url_title($this->input->post('handover_to'), 'dash', true);
		$serviceslug = $this->checkSlugExists($slug);
		$data = array(
			'slug' => $serviceslug,
			'Accepte_date' => $this->input->post('Accepte_date'),
			'quantity' => $this->input->post('quantity'),
			'purchase_order' => $purchase_order[0]['purchase_order'],
			'gate_no' => $this->input->post('gate_no'),
			'challan_no' => $this->input->post('challan_no'),
			'handover_to' => $this->input->post('handover_to'),
			'recipt_no' => $this->input->post('recipt_no'),
			'purchase_id' => $purchase_id,
			'is_active' => 1,
			'priority' => $priority,
		);
		//echo'<pre>';print_r($data);echo'</pre>';die;
		$msg = 0;
		$this->db->insert($this->tbl_name, $data);
		//echo $this->db->last_query();die;
		$arrQty = $this->db->select('quinty')->get_where('tbl_purchase','id='.$purchase_id)->row_array();
		//pr($arrQty);die;
		$orgQty = @$arrQty['quinty'];
		$qty = $orgQty - $this->input->post('quantity');
		$pdata = array('status' => 1,'quinty' => $qty);
		$this->db->where('id',$purchase_id );
		$this->db->update('tbl_purchase', $pdata);
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
		$this->db->from('tbl_purchase');
		//$this->db->where('order_type','Purchase Order');
		$this->db->limit($limit, $start);
		$this->db->order_by('priority','desc');
		$query = $this->db->get();
		//echo $this->db->last_query();die;
		return $query->result_array();
	}

	function index($id){
		$data = array(
			'Accepte_date' => $this->input->post('Accepte_date'),
			'quantity' => $this->input->post('quantity'),
			'gate_no' => $this->input->post('gate_no'),
			'challan_no' => $this->input->post('challan_no'),
			'handover_to' => $this->input->post('handover_to'),
			'recipt_no' => $this->input->post('recipt_no'),
			'purchase_id' => $this->input->post('purchase_id'),
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
		$query = $this->db->get('tbl_purchase');
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
	// for fetching the all record from purchase table
	function getvalue($id){
		$result = '';
		$this->db->where('id',$id);
		$query = $this->db->get('tbl_purchase');
		//$query = $this->db->get();
		//echo $this->db->last_query();die;
		return $query->result_array();
	}
	// for counting the records exist or not from recived stock
	function pur_oredr_count($pur_order){
		$this->db->select('*');
		$this->db->from('tbl_recivedstock');
		$this->db->where('purchase_order',$pur_order);
		$query = $this->db->get();
		return ($query->num_rows());
	}
	
	function update($id){
		$data_pending = $this->getvalue($id);
		//echo "<pre>"; print_r($data_pending);exit;
		$data_qty_val = $this->get_qty_value($id);
		if($data_qty_val[0]['quantity']!=0){
			$qty = $data_qty_val[0]['quantity'] + $this->input->post('quantity');
		} else {
			$qty = $this->input->post('quantity');
		}
		$data = array(
			'Accepte_date' => $this->input->post('Accepte_date'),
			'quantity' => $qty,
			'gate_no' => $this->input->post('gate_no'),
			'challan_no' => $this->input->post('challan_no'),
			'handover_to' => $this->input->post('handover_to'),
			'recipt_no' => $this->input->post('recipt_no'),
			'purchase_id' => $this->input->post('purchase_id'),
		);
		// echo'<pre>';print_r($data);echo'</pre>';die;
			$this->db->where('purchase_id',$id );
		    $this->db->update($this->tbl_name, $data);
			//echo $this->db->last_query();die;
			$pending_qty = $data_pending[0]['quinty'] - $this->input->post('quantity');
		$data = array(
			'quinty' => $pending_qty,
		);
			$this->db->where('id',$id );
		    $this->db->update('tbl_purchase', $data);
	}
	function get_qty_value($id){
		$result = '';
		$this->db->where('purchase_id',$id);
		$query = $this->db->get('tbl_recivedstock');
		//$query = $this->db->get();
		//echo $this->db->last_query();die;
		return $query->result_array();
	}
	
	function insert_data_reciv_log($data){
		
		$purchase_order = $this->getvalue($data['pur_id']);
		//echo "<pre>"; print_r($purchase_order);exit;
		$data = array(
			'accept_date' 		=> $data['accceptdate'],
			'qty' 				=> $data['recv_qty'],
			'purchase_order' 	=> $purchase_order[0]['purchase_order'],
			'purchase_id' 		=> $data['pur_id'],
			'challan_no' 		=> $data['challan_no '],
			'handover_to' 		=> $data['hand_over'],
			'recipt_no' 		=> $data['rec_no'],
			'gate_no' 			=> $data['gate_no '],
		);
		$this->db->insert('tbl_recived_log', $data);
	}
	
	/* function Getitem(){
		$query = $this->db->get('tbl_purchase');
		//$role[''] = "Select vendor*";
		foreach($query->result() as $row){
			$role[$row->id] =  ucfirst($row->item_id);
		}
		return $role;
	} */
	
	/* function Getitem(){
		$query = $this->db->get('tbl_item');
		$role[''] = "Select Item*";
		foreach($query->result() as $row){
			$role[$row->id] =  ucfirst($row->item_name);
		}
		return $role;
	} */
	function get_transqty($data){
		echo $data;
		$this->db->where('id',$data);
		$query = $this->db->get('tbl_purchase');
		//$query = $this->db->get();
		//echo $this->db->last_query();die;
		return $query->result_array();
	} 
}
?>