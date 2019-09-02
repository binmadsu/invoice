<?php 


class m_transferorder extends CI_Model{


	private $tbl_name = 'tbl_purchase';


	function addpage()
	{
		$priority = $this->get_length();
		/////
		$slug = url_title($this->input->post('warehouse_name'), 'dash', true);
		$uid = getCurUserID();
        $uDetails = getAdminUserDetailsById($uid);
        $usernameAdmin = isset($uDetails['full_name'])?$uDetails['full_name']:$uDetails['username'];
		$data = array(
		    'item_id' => $this->input->post('itemname'),
			'warehouse_id' => $this->input->post('warehousename'),
			'destination_whm_id' => $this->input->post('destination'),
			'supplier_id' => $this->input->post('suppliername'),
			'purchase_date' => $this->input->post('purchase_date'),
			'quinty' => $this->input->post('quinty'),
			'unit_price' => $this->input->post('unit_price'),
			'invoice_no' => $this->input->post('invoice_no'),
			'purchase_order' => $this->input->post('purchase_order'),
			'note' => $this->input->post('note'),
			'reason' => $this->input->post('reason'),
            'order_type' => "Transfer Order",			
			'is_active' => 1,
			'delete_status' => 1,
			'priority' => $priority,
		);
		//echo'<pre>';print_r($data);echo'</pre>';die;
		$msg = 0;
		$this->db->insert($this->tbl_name, $data);
		$lastId = $this->db->insert_id();
		//echo $this->db->last_query();die;
		SaveAuditLog('New Transfer create', 'tbl_purchase', $lastId , $usernameAdmin );
		$msg = ($this->db->affected_rows() > 0) ? $lastId : 0; //for insert //for insert
		return $msg;
	}

	

	
	function listing($limit,$start)
	{
		$this->db->select('*');
		$this->db->from($this->tbl_name);
		$this->db->where('delete_status', 1);
		$this->db->where('order_type','Transfer Order');
		$this->db->limit($limit, $start);
		$this->db->order_by('priority','desc');
		$query = $this->db->get();
		//echo $this->db->last_query();die;
		return $query->result_array();
	}

	function index($id){
		$uid = getCurUserID();
        $uDetails = getAdminUserDetailsById($uid);
        $usernameAdmin = isset($uDetails['full_name'])?$uDetails['full_name']:$uDetails['username'];
		$data = array(
			'item_id' => $this->input->post('itemname'),
			'warehouse_id' => $this->input->post('warehousename'),
			'destination_whm_id' => $this->input->post('destination'),
			'supplier_id' => $this->input->post('suppliername'),
			'purchase_date' => $this->input->post('purchase_date'),
			'quinty' => $this->input->post('quinty'),
			'unit_price' => $this->input->post('unit_price'),
			'invoice_no' => $this->input->post('invoice_no'),
			'purchase_order' => $this->input->post('purchase_order'),
			'note' => $this->input->post('note'),
			'reason' => $this->input->post('reason'),	
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
			SaveAuditLog('transfer Update', 'tbl_purchase', $id , $usernameAdmin );
			$msg = ($this->db->affected_rows() > 0) ? 2 : 3;//for update : for nothing happened
		}
		return $msg;
	}
	
	

	function delete($pageid){
		$this->db->delete($this->tbl_name, array('id' => $pageid));
		return ($this->db->affected_rows() != 1) ? false : true;
  	}

	function DeleteStatus($id,$DeleteStatus){
		$uid = getCurUserID();
        $uDetails = getAdminUserDetailsById($uid);
        $usernameAdmin = isset($uDetails['full_name'])?$uDetails['full_name']:$uDetails['username'];
		$this->db->where('id',$id );
        $this->db->set("delete_status", $DeleteStatus);
        $this->db->update($this->tbl_name);
		//echo $this->db->last_query();die;
		SaveAuditLog('Delete transfer', 'tbl_purchase', $id , $usernameAdmin );
		return ($this->db->affected_rows() > 0) ? 2 : 0;//for insert // for update
  	}
	

	function status($id,$status){
		$uid = getCurUserID();
        $uDetails = getAdminUserDetailsById($uid);
        $usernameAdmin = isset($uDetails['full_name'])?$uDetails['full_name']:$uDetails['username'];
		$this->db->where('id',$id );
        $this->db->set("is_active", $status);
        $this->db->update($this->tbl_name);
		//$this->output->enable_profiler(TRUE);
		SaveAuditLog('Status Change', 'tbl_purchase', $id , $usernameAdmin );
		return ($this->db->affected_rows() > 0) ? 2 : 0;//for insert // for update
  	}
	
	
  	function count_all(){
		$this->db->select('*');
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
		
	}

	
	function get_length(){
		$this->db->select('*');
		$this->db->from($this->tbl_name);
		$query = $this->db->get();
		return count($query->result_array())+1;
	}

	
	function Getitem(){
		$query = $this->db->get('tbl_item');
		$role[''] = "Select item*";
		foreach($query->result() as $row){
			$role[$row->id] =  ucfirst($row->item_name);
		}
		return $role;
	}

	
	function Getwarehouse(){
		$query = $this->db->get('tbl_warehouse');
		$role[''] = "Select Warehouse*";
		foreach($query->result() as $row){
			$role[$row->id] =  ucfirst($row->name);
		}
		return $role;
	}
	
	
	function Getsupplier(){
		$query = $this->db->get('tbl_supplier');
		$role[''] = "Select supplier*";
		foreach($query->result() as $row){
			$role[$row->id] =  ucfirst($row->supplier_name);
		}
		return $role;
	}
	

	function Getitem_warehouse($id){
		$this->db->where('item_id',$id);
		$query = $this->db->get('tbl_purchase');
		//echo $this->db->last_query();die;
		return $query->result_array(); 
	}
	
	
	function Get_warehouse_name($data){
		$id = array();
		foreach($data as $row){
			$id[] = $row;
		}
		$this->db->where_in('id', $id);
		$query = $this->db->get('tbl_warehouse');
		$data = array();
		if($query !== FALSE && $query->num_rows() > 0){
			$data = $query->result_array();
		}
		return $data; 
				 
	}
	
	
	function Get_purchase_order($item_id,$warehouse){
		$where = '(item_id='.$item_id.' AND warehouse_id  = '.$warehouse.')';
		$this->db->where($where);
		$query = $this->db->get('tbl_purchase');
		$data = array();
		if($query !== FALSE && $query->num_rows() > 0){
			$data = $query->result_array();
		}
		//echo "<pre>"; print_r($data);exit;
		return $data; 
				 
	}
	
	
	
	function get_instock_qty($purchase){
		$this->db->where('purchase_order',$purchase);
		$query = $this->db->get('tbl_recivedstock');
		//echo "<pre>"; print_r($query->result_array());exit;
		return $query->result_array();
	}
	
	
	
	function update_instock($purchase,$qty){
		$data = array(
			'quantity' => $qty,
		);
		$this->db->where('purchase_order',$purchase);
		$this->db->update('tbl_recivedstock', $data);
		//echo $this->db->last_query();die;
		
	}
	
	
	
	function get_outstock_qty($purchase){
		$this->db->where('purchase_order',$purchase);
		$query = $this->db->get('tbl_purchase');
		//echo "<pre>"; print_r($query->result_array());exit;
		return $query->result_array();
	}
	
	
	
	function update_outstock($purchase,$out_stock){
		$outstock = $this->get_outstock_qty($purchase);
		$outstock_qty = $outstock[0]['out_stock_qty'];
		
		if($outstock_qty != ''){
			$out_stock_qty = $outstock_qty + $out_stock;
		}else{
			$out_stock_qty = $out_stock;
		}
		$data = array(
			'out_stock_qty' => $out_stock_qty,
		);
		$this->db->where('purchase_order',$purchase);
		$this->db->update('tbl_purchase', $data);
		//echo $this->db->last_query();die;
	}
}
?>