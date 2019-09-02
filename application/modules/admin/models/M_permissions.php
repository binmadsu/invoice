<?php
class m_permissions extends CI_Model{
	private $tbl_capabilities = 'tbl_capabilities';
	
	function index()
	{
	
		//echo '==='.$user_id;die;
		$is_logged_in = $this->session->userdata('logged_in');
		
		$data = array('m_id' => $this->input->post('module_id'),
					'c_name' => $this->input->post('module_name'),
					'c_controller_name' =>$this->input->post('controller_name'),
					'c_function' => $this->input->post('method_name'),
					'c_description' => $this->input->post('desc'),
					);
		//echo'<pre>';print_r($data);echo'</pre>'; die;
		$msg = 0;
		
		$this->db->insert('tbl_capabilities', $data);
		$msg = ($this->db->affected_rows() > 0) ? 1 : 0;//for insert
		
		return  $msg;
		
	}
	
	//assign role and permissions
	
	function assignpermission()
		{
			
			
			$is_logged_in = $this->session->userdata('logged_in');
			//echo getCurUserID();
			$permission='';
			//pr($_POST);
			
			foreach($_POST as $module=>$controller)
			{
				if(is_array($controller))
				{
					$i=1;
					foreach($controller as $key=>$controllers)
					{
					
						$permission .= strtolower($controllers).',';
					
					}
					
				}
			}
		
		
		
			$permission=(!empty($permission))?substr($permission,0,-1):'';
				
						
			$data = array('permission' => $permission,
					);
	
	
		$msg = 0;
		$this->db->where('role_id',$this->input->post('user_role') );
	    $this->db->update('tbl_role', $data); 
	
		//$this->db->update('tbl_role', $this->input->post('user_role')); 
		//echo $this->db->last_query();die;
		$msg = ($this->db->affected_rows() > 0) ? 2 : 3;//for update : for nothing happened
		
		return  $msg;
		
		}
	
	
	function module_info($id=0)
	{
		$this->db->select('m_name');
		$this->db->from('tbl_module');
		$this->db->where('m_id',$id);		
		$query = $this->db->get();
		return $query->result_array();
	}
	
	
	
	
	function edit($id)
	{
	
	
		$is_logged_in = $this->session->userdata('logged_in');
		
		$data = array('m_id' => $this->input->post('module_id'),
					'c_name' => $this->input->post('module_name'),
					'c_controller_name' =>$this->input->post('controller_name'),
					'c_function' => $this->input->post('method_name'),
					'c_description' => $this->input->post('desc'),
					);
		//echo'<pre>';print_r($data);echo'</pre>'; die;
		
		$msg = 0;
		$this->db->where('c_id',$id );
	    $this->db->update('tbl_capabilities', $data); 
		//echo $this->db->last_query();die;
		$msg = ($this->db->affected_rows() > 0) ? 2 : 3;//for update : for nothing happened
		
		
		return  $msg;
		
	}
	
	
	
	function getAllModulePermissions()
	{
		$this->db->select('module.m_id,module.m_name AS moduleName,cap.c_name AS Label,cap.c_controller_name AS controllerName,cap.c_function AS actionName');
		$this->db->from('tbl_module module');
		$this->db->join('tbl_capabilities cap','module.m_id = cap.m_id','inner');
		$this->db->order_by('moduleName','ASC');
		$query = $this->db->get();
		//echo $this->db->last_query();
		//get all modules
		$this->db->select('module.m_id,module.m_name AS moduleName,');
		$this->db->from('tbl_module module');
		$this->db->order_by('moduleName','ASC');
		$result=$this->db->get();
		
		$permissions = array();
		
		$counter = 0;
		$last_mid = 0;
		
				
		foreach($result->result() as $output)
		{
			$mid=$output->m_id;
			$i=0;
			$counter2 = 0;
			foreach($query->result() as $row)
			{
			$cmid = $row->m_id;
			
			if($mid==$cmid)
			{
				if($i<1)
				{
				$counter++;
				$permissions[$counter]['m_id'] = $row->m_id;
				$permissions[$counter]['moduleName'] =  $row->moduleName;
				$i++;
				}
				
				$permissions[$counter]['arr'][$counter2]['m_id'] = $row->m_id;
				$permissions[$counter]['arr'][$counter2]['moduleName'] =  $row->moduleName;
				$permissions[$counter]['arr'][$counter2]['Label'] =  $row->Label;
				$permissions[$counter]['arr'][$counter2]['controllerName'] =  $row->controllerName;
				$permissions[$counter]['arr'][$counter2]['actionName'] =  $row->actionName;
				$counter2++;
				
			
			}
		
		}
		
		}
		return $permissions;
	}
	
	function modulelist()
	{
		$query = $this->db->get('tbl_module');
		$module[''] = "Select Role*"; 
		foreach($query->result() as $row){
			$module[$row->m_id] =  ucfirst($row->m_name);
		}
		return $module;	
	}
	
	function ContentByRole($roleid=0)
	{
		
		$this->db->select('tbl_role.*');
		$this->db->from('tbl_role');
		$this->db->where('role_id',$roleid);
		$query = $this->db->get();
		//echo $this->db->last_query(); 
		return $query->result_array();
	}
	
	
	function role(){
		$query = $this->db->get('tbl_role');
		$role[''] = "Select Role*"; 
		foreach($query->result() as $row){
			$role[$row->role_id] =  ucfirst($row->role_name);
		}
		return $role;
	}
	
	
	function listing($limit,$start,$startdate,$enddate,$specificOption,$specificValue)
	{
		$this->db->select('tbl_capabilities.*');
		$this->db->from('tbl_capabilities');
		$this->db->order_by('c_controller_name');
		//$this->db->join('tbl_role','tbl_role.role_id = tbl_users.user_role','left');
		if(!isEmpty($specificOption) && !isEmpty($specificValue)){
		   $this->db->like($specificOption,$specificValue);
		}
		//$this->db->limit($limit, $start);
		$query = $this->db->get();
		//echo $this->db->last_query(); 
		return $query->result_array();
	}
	
	 function count_all($startdate,$enddate,$specificOption,$specificValue){
		$this->db->select('*');
		if(!isEmpty($specificOption) && !isEmpty($specificValue)){
		   $this->db->like($specificOption,$specificValue);
		}
		       $query =   $this->db->get($this->tbl_capabilities);
			return ($query->num_rows());
	}
	
	
	function order_info($order_id=0){
		
		$this->db->select('o.order_id AS order_id,o.order_number AS order_number, o.number_of_bins AS number_of_bins, o.number_of_bike AS number_of_bike, o.item_details AS item_details, o.delivery_date AS delivery_date, addr.address1 AS address1, addr.address1 AS address2, addr.city AS city, addr.state AS state, addr.landmark AS landmark, addr.apt_suite AS apt_suite, pay.transaction_id AS transaction_id, pay.pay_amount AS pay_amount,o.pay_status AS pay_status, o.doorman AS doorman, o.doorman_left AS doorman_left, o.notes AS notes, o.timings AS timings ');
		$this->db->from('tbl_orders o');
		$this->db->join('tbl_address addr','addr.id = o.addr_id','left');
		$this->db->join('tbl_payment_details pay','pay.order_id = o.order_id','left');
		$this->db->where('o.order_id =', $order_id);
		$this->db->where('pay.payment_step =', 1);
		$this->db->limit(1);
		$query = $this->db->get()->row();
		//pr($query);
		return $query;
	}
	
	
	
	function getOrderDetails($order_id=0){
		$this->db->select('o.`order_id`,o.`order_number`,o.`delivery_date` o_delivery_date,addr.address1,addr.address2,addr.apt_suite,addr.city,addr.state,addr.landmark,
o.timings,o.doorman,p.transaction_id,p.pay_amount,p.payment_date');
		$this->db->from('tbl_orders o');
		$this->db->join('tbl_address addr','addr.id = o.addr_id');
		$this->db->join('tbl_payment_details p','p.order_id = o.order_id');
		$this->db->where('o.order_id =', $order_id);
		$query = $this->db->get();
		//echo $this->db->last_query(); //die;
		$new_row = '';
		if($query->num_rows > 0){
			foreach ($query->result() as $row){
				$new_row['order_number'] = $row->order_number;
				$new_row['o_delivery_date'] = $row->o_delivery_date;
				$new_row['address1'] = $row->address1;
				$new_row['address2'] = $row->address2;
				$new_row['apt_suite'] = $row->apt_suite;
				$new_row['city'] = $row->city;
				$new_row['state'] = $row->state;
				$new_row['landmark'] = $row->landmark;
				$new_row['timings'] = $row->timings;
				$new_row['doorman'] = $row->doorman;
				$new_row['transaction_id'] = $row->transaction_id;
				$new_row['pay_amount'] = $row->pay_amount;
				$new_row['payment_date'] = $row->payment_date;
			}
		}
		return $new_row;
		//return $query->result_array();
	}
	
	
	
	function countUser(){
		return $this->db->count_all('tbl_capabilities');
	}
	
	function delete( $member_id ){
		$this->db->delete('tbl_capabilities', array('c_id' => $member_id));
		return ($this->db->affected_rows() != 1) ? false : true;
  	}
	
	function status( $member_id,$status ){
		$this->db->where('id',$member_id );
        $this->db->set("status", $status);
        $this->db->update("tbl_orders");
		//$this->output->enable_profiler(TRUE);
		return ($this->db->affected_rows() > 0) ? 2 : 0;//for insert // for update 
  	}
	
	function userNameFromId($id){
		$row = $this->db->select('user_fname,user_lname')
						 ->get_where('tbl_orders',array('user_id' => $id))->row();
		return is_object($row)?$row->user_fname.' '.$row->user_lname:false;
	}
	
	function permisstion_info($id=0)
	{
		$this->db->select('*');
		$this->db->from('tbl_capabilities');
		$this->db->where('c_id',$id);
		
		$query = $this->db->get();
		return $query->result_array();
	}
	
}
?>