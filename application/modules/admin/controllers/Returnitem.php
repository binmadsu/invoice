<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class returnitem extends CI_Controller{

	public function __construct(){
	    parent::__construct();
	    is_logged_in();
	    $this->load->model('M_returnitem');
	}

	public function index(){
		
		$data = array();
		$ponum = $this->input->post('po_number');
		$poqty = $this->input->post('po_qty');
		
		//echo "<pre>"; print_r($data_result);exit;
		$display_error_message = '';$faulty_instock = '';
		$this->load->helper(array('form'));
	    $this->load->library('form_validation');
		if($_SERVER['REQUEST_METHOD'] == 'POST')
		{
			
			$data_check_purchase_order = $this->M_returnitem->check_purchase_order($ponum);
			//echo "<pre>"; print_r($data_check_purchase_order);exit;
			
			$display_error_message = "";
			if(isset($data_check_purchase_order['res']) && $data_check_purchase_order['res']!="yes"){
				$display_error_message = "Enter a valid Purchase Order!";
			} else {
				$data_result = $this->M_returnitem->getvalue($ponum);
				//echo "<pre>"; print_r($data_result);
				$deduct_data = $this->M_returnitem->deductvalue($data_result[0]['id']);
				//echo "hello yes";exit;
				$faulty_instock = $deduct_data[0]['quantity'] - $data_result[0]['repair']; // Instock - reapir for faulty
				if( $poqty > $data_result[0]['out_stock_qty']){ // condition for out stock
					$display_error_message = "Enter out stock a valid Quantity!";
				}elseif($poqty > $deduct_data[0]['quantity']){ // condition for instock
					$display_error_message = "Enter instock a valid Quantity!";
				}elseif($poqty > $faulty_instock){
					$display_error_message = "Enter faulty a valid Quantity!";
				} else {
						$po_re_type = $this->input->post('return_type');
					if($po_re_type == "repair"){
						$display_message = "Repair update successfully!";
					}elseif($po_re_type == "return"){
						$display_message = "Return update successfully!";
					} else{
						$display_message = "Faulty update successfully!";
					}
				}
			}
//echo $display_error_message; exit;
			if($display_error_message!=""){
				$this->session->set_flashdata('msg', $display_error_message);
				redirect('admin/returnitem/index?err_msg=1', 'refresh');
							
			}else{
				$this->M_returnitem->addpage();
				$this->session->set_flashdata('msg', $display_message);
				redirect('admin/stock/listing', 'refresh');
				
			}
				
		} else {
				$this->load->view('return_item/add_view',$data);
		}
		
	   	
	}

	function deduct(){
		$data = array();
		$po_num = $this->input->post('puror_num');
		$po_type = $this->input->post('pur_type');
		$po_qty = $this->input->post('pur_qty');
		$falt_instock ='';
		
		$data_result = $this->M_returnitem->getvalue($po_num);
		//echo "<pre>"; print_r($data_result);exit;
		$deduct_data = $this->M_returnitem->deductvalue($data_result[0]['id']);
		
		if($po_type=="repair"){
			//echo "repair";exit;
			if($po_qty > $deduct_data[0]['quantity']){
				$po_qty = $data_result[0]['repair'];
			}else{
				if($data_result[0]['repair']!=0){
					if($data_result[0]['repair'] != $deduct_data[0]['quantity']){
						$po_qty = $data_result[0]['repair']+$po_qty;
					}else{
						$po_qty = $data_result[0]['repair'];
					}
				} else {
					$po_qty = $po_qty;
				}
			}
			$this->M_returnitem->update_repair($data_result[0]['id'],$po_qty);//update repair item
		} elseif($po_type=="return"){
			//echo "return";exit;
			if($po_qty > $data_result[0]['out_stock_qty']){
				$deductqty = $data_result[0]['out_stock_qty'];
			} else {
				$deductqty = $data_result[0]['out_stock_qty']-$po_qty;

				if($deduct_data[0]['quantity'] > 0){
					$po_qty = $po_qty+$deduct_data[0]['quantity'];
				}else{
					$po_qty = $po_qty;
				}
				$this->M_returnitem->update_instock($data_result[0]['id'],$po_qty);//update instock 
			}
			$this->M_returnitem->update_outstock($data_result[0]['id'],$deductqty);//update outstock 
		} else {
			//echo "faulty";exit;
			$falt_instock = 0;
			$falt_instock = $deduct_data[0]['quantity'] - $data_result[0]['repair']; // Instock - reapir for faulty
			if($po_qty > $falt_instock){
				$faulty = $data_result[0]['faulty'];				
			} else {
				//$faulty = $po_qty;
				if($data_result[0]['faulty'] > 0){
					$faulty = $data_result[0]['faulty']+$po_qty;
				}else{
					$faulty = $po_qty;
				}
				
				$faulty_deduct_instock =  $deduct_data[0]['quantity'] - $po_qty;
				$this->M_returnitem->update_instock($data_result[0]['id'],$faulty_deduct_instock);//update instock
			}
			//echo $faulty;exit;
			$this->M_returnitem->update_faulty($data_result[0]['id'],$faulty);//update instock 
		}
		//echo "<pre>"; print_r($deduct_data);
		exit;	
	 	
	}
	
	function check_po(){
		$data = array();
		$data_po = $this->M_returnitem->index();
		foreach($data_po as $val){
			$data[] = $val['purchase_order'];
		}
		echo json_encode($data);
	}
	
	function check_order(){
		$data = array();
		$po_num = $this->input->post('ponum');
		if($po_num!=''){
			$data_po = $this->M_returnitem->index($po_num);
			echo json_encode(array('result' => $data_po['res']));	
		}		
	 	//pr($data);die;
	   	//$this->load->view('return_item/add_view',$data);
	}
	

	function listing($offset=0){
		$this->load->helper('form');
		$limit = pagination_count;
		$data['datarows'] = $this->M_returnitem->listing($limit,$offset);
		$config['total_rows'] = $this->M_returnitem->count_all();
		/* pagination start */
		$this->load->library('pagination');
		
		$config['first_url'] = site_url("admin/returnitem/listing/0/");
		$config['base_url'] = site_url("admin/returnitem/listing/");
		$config['per_page'] = $limit; 
		$config['uri_segment'] = 4;
		$this->pagination->initialize($config);
		$data["links"] = $this->pagination->create_links();
		$data['page'] = $offset;
		/*******/
		//pr($data);die;
		$this->load->view('return_item/view_list',$data);
	}
	

}