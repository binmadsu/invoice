<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class transferorder extends CI_Controller{

	public function __construct(){
	    parent::__construct();
	    is_logged_in();
	    $this->load->model('M_transferorder');
	}

	public function index(){
		
		$data = array();
		$po_num = $this->input->post('purchase_number');
		$qty = $this->input->post('quinty');
		$data['warehousename'] = $this->M_transferorder->Getwarehouse();
		$data['destination'] = $this->M_transferorder->Getwarehouse();
		$data['suppliername'] = $this->M_transferorder->Getsupplier();
		$data['itemname'] = $this->M_transferorder->Getitem();
		$data_instock_qty = $this->M_transferorder->get_instock_qty($po_num);
		//echo "<pre>"; print_r($data_instock_qty);exit;
		$this->load->helper(array('form'));
	    $this->load->library('form_validation');
		if($_SERVER['REQUEST_METHOD'] == 'POST')
		{
			$display_msg = '';
			$this->form_validation->set_rules('purchase_date', 'purchase_date', 'required');
			if($this->form_validation->run() == true)
	   		{
				if($qty < $data_instock_qty[0]['quantity']){
					$this->M_transferorder->addpage();
					$display_msg = 'Record added successfully!';
					$this->session->set_flashdata('msg', $display_msg);
					redirect('admin/transferorder/listing', 'refresh');
				}else{
					$display_msg = 'Enter valid Quantity!';
					$this->session->set_flashdata('msg', $display_msg);
					redirect('admin/transferorder/', 'refresh');
				}
				
				
			}
		 }
		 $data['trnsfer_number'] = $this->transfer_order_number();
	 	//pr($data);die;
	   	$this->load->view('transferorder/add_view',$data);
	}
	
	
	
	function listing($offset=0){
		$this->load->helper('form');
		$limit = pagination_count;
		//echo $limit;
		$data['datarows'] = $this->M_transferorder->listing($limit,$offset);
		$config['total_rows'] = $this->M_transferorder->count_all();
		
		/* pagination start */
		$this->load->library('pagination');
		$config['first_url'] = site_url("admin/transferorder/listing/0/");
		$config['base_url'] = site_url("admin/transferorder/listing/");
		$config['per_page'] = $limit; 
		$config['uri_segment'] = 4;
		$this->pagination->initialize($config);
		$data["links"] = $this->pagination->create_links();
		$data['page'] = $offset;
		/*******/
		$this->load->view('transferorder/view_list',$data);
	}

	
	
	//edit pages
	function edit($id)
	{
		$data_title=array();
		$data = array();
		$data['warehousename'] = $this->M_transferorder->Getwarehouse();
		$data['destination'] = $this->M_transferorder->Getwarehouse();
		$data['suppliername'] = $this->M_transferorder->Getsupplier();
		$data['itemname'] = $this->M_transferorder->Getitem();
		$this->load->library('form_validation');
		if(!empty($_POST)){
			$this->form_validation->set_rules('reason', 'Title', 'required');
		}
		
		if($this->form_validation->run() == true)
		{
			$msg = $this->M_transferorder->index($id,$data_title);
			if(!empty($msg)){
			   $this->session->set_flashdata('msg', 'Record Updated successfully');
			}
			redirect('/admin/transferorder/listing/'.$page.'/');
		}else{
			//$data['gallery'] = gethandoverCategories();
			$data['datarows'] = $this->M_transferorder->page_info($id);
			//echo "<pre>";print_r($data);die;
			$this->load->view('transferorder/edit_view',$data);
		}
	}

	
	
	function delete($pageid){
		if($this->M_transferorder->delete($pageid))
			$this->session->set_flashdata('msg', 'Record Deleted successfully');
		redirect('/admin/transferorder/listing/','refresh');
	}

	
	function ajaxDelete(){
		$id = @$_POST['id'];
		if($id){
			$this->M_transferorder->DeleteStatus($id,0);
		}
	}
	
	

	
	function status($id,$status){
		if($this->M_transferorder->status($id,$status))
			$this->session->set_flashdata('msg', 'Record Updated successfully');
		redirect('/admin/transferorder/listing/','refresh');
	}

	
	
	function priority()
	{
		$id=$_GET['id'];
		$priority=$_GET['p'];
		$this->M_transferorder->Updatepriority($id,$priority);
	}
	
	
	
	// fetching the warehouse accrding to the item
	function ware_house_item()
	{
		$warehouse = array();
		$warehouse_name = '';
		$data_ware = array();
		$item_id = $this->input->post('item_id');
		//echo $item_id;
		$data_warehouse = $this->M_transferorder->Getitem_warehouse($item_id);
		foreach($data_warehouse as $data){
			$data_ware[] = $data['warehouse_id'];
		}
		$warehouse_name = $this->M_transferorder->Get_warehouse_name($data_ware);
		//echo "<pre>"; print_r($warehouse_name);exit;
		$i = 0;
		if(!empty($warehouse_name)){
			foreach($warehouse_name as $row_warehouse){
				$warehouse[$i]['name'] = $row_warehouse['name'];
				$warehouse[$i]['value'] = $row_warehouse['id'];
				$i++;
			}
		}else{
			$warehouse[$i]['name'] = "No Warehouse";
		}
		header('Content-Type: application/x-json; charset=utf-8');
		echo json_encode($warehouse);
		//echo "<pre>"; print_r($warehouse_name);
		//return $warehouse;
	}
	

	
	// for fetching the purchase order
	function get_purchase_order() 
	{
		$item_id = $this->input->post('item_id');
		$warehouse_name = $this->input->post('warehouse_name');
		$getpurchase_order = $this->M_transferorder->Get_purchase_order($item_id,$warehouse_name);
		header('Content-Type: application/x-json; charset=utf-8');
		echo json_encode($getpurchase_order);
	}
	
	function stock_update()  // code for updating the record
	{
		$updated_qty = '';
		$purchase_order = $this->input->post('puror_num');
		$qty = $this->input->post('pur_qty');
		$get_instock_value = $this->M_transferorder->get_instock_qty($purchase_order);
		if($qty < $get_instock_value[0]['quantity']){
			$updated_qty = $get_instock_value[0]['quantity']-$qty;
			//echo $updated_qty;exit;
			//echo "<pre>"; print_r($get_instock_value);exit;
			$this->M_transferorder->update_instock($purchase_order,$updated_qty);
			$this->M_transferorder->update_outstock($purchase_order,$qty);
		}
		
		
	}
	
	
	
	
// autogenerate the Transfer order number
	function transfer_order_number()
	{
		$number = '';
		$query = $this->db->query('SELECT * FROM tbl_purchase where order_type="Transfer Order"');
			if($query->num_rows()>0){;
			$this->db->select("*");
			$this->db->from("tbl_purchase");
			$this->db->where('order_type','Transfer Order');
			$this->db->limit(1);
			$this->db->order_by('id',"DESC");
			$query = $this->db->get();
			$result = $query->result();
			//echo "<pre>"; print_r($result);
			if(count($result) > 0){
				$number = $result[0]->purchase_order;
				$number = explode('-',$number);
				$number = str_pad(++$number[1],4,'0',STR_PAD_LEFT);
				return $number;
			}
			
			
		} else {
			$number = '0001';
				return $number;
		}	
		
	}
}