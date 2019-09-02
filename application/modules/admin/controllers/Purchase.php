<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class purchase extends CI_Controller{

	public function __construct(){
	    parent::__construct();
	    is_logged_in();
	    $this->load->model('M_purchase');
	}

	public function index(){
		
		$data = array();
		$data['companies'] = $this->M_purchase->GetCompanies();
		$data['warehousename'] = $this->M_purchase->Getwarehouse();
		$data['suppliername'] = $this->M_purchase->Getsupplier();
		$data['itemname'] = $this->M_purchase->Getitem();
		$this->load->helper(array('form'));
	    $this->load->library('form_validation');
		if($_SERVER['REQUEST_METHOD'] == 'POST')
		{

			$this->form_validation->set_rules('purchase_date', 'purchase_date', 'required');
			if($this->form_validation->run() == true)
	   		{
				$this->M_purchase->addpage();
				$this->session->set_flashdata('msg', 'Record added successfully!');
				redirect('admin/purchase/listing', 'refresh');
			}
	 	}
		
		$data['po_number'] = $this->purchase_order_number();
	 	//pr($data);die;
	   	$this->load->view('purchase/add_view',$data);
	}
	
	
	function listing($offset=0){
		$this->load->helper('form');
		$limit = pagination_count;
		//echo $limit;
		$data['datarows'] = $this->M_purchase->listing($limit,$offset);
		//echo "<pre>"; print_r($data['datarows']);
		$config['total_rows'] = $this->M_purchase->count_all();
		
		/* pagination start */
		$this->load->library('pagination');
		$config['first_url'] = site_url("admin/purchase/listing/0/");
		$config['base_url'] = site_url("admin/purchase/listing/");
		$config['per_page'] = $limit; 
		$config['uri_segment'] = 4;
		$this->pagination->initialize($config);
		$data["links"] = $this->pagination->create_links();
		$data['page'] = $offset;
		/*******/
		//pr($data);die;
		$this->load->view('purchase/view_list',$data);
	}

	
	
	//edit pages
	function edit($id)
	{
		$data_title=array();
		$data = array();
		$data['companies'] = $this->M_purchase->GetCompanies();	
		$data['warehousename'] = $this->M_purchase->Getwarehouse();
		$data['suppliername'] = $this->M_purchase->Getsupplier();
		$data['itemname'] = $this->M_purchase->Getitem();
		$this->load->library('form_validation');
		if(!empty($_POST)){
			$this->form_validation->set_rules('purchase_date', 'purchase date', 'required');
		}
		
		if($this->form_validation->run() == true)
		{
			$msg = $this->M_purchase->index($id,$data_title);
			if(!empty($msg)){
			   $this->session->set_flashdata('msg', 'Record Updated successfully');
			}
			redirect('/admin/purchase/listing/'.$page.'/');
		}else{
			//$data['gallery'] = gethandoverCategories();
			$data['datarows'] = $this->M_purchase->page_info($id);
			/*echo "<pre>";print_r($data);die;*/
			$this->load->view('purchase/edit_view',$data);
		}
	}

	function ajaxDelete(){
		$id = @$_POST['id'];
		if($id){
			$this->M_purchase->DeleteStatus($id,0);
		}
	}
	
	
	function delete($pageid){
		if($this->M_purchase->delete($pageid))
			$this->session->set_flashdata('msg', 'Record Deleted successfully');
		redirect('/admin/purchase/listing/','refresh');
	}

	
	
	function status($id,$status){
		if($this->M_purchase->status($id,$status))
			$this->session->set_flashdata('msg', 'Record Updated successfully');
		redirect('/admin/purchase/listing/','refresh');
	}

	function priority()
	{
		$id=$_GET['id'];
		$priority=$_GET['p'];
		$this->M_purchase->Updatepriority($id,$priority);
	}
	
	function purchase_order_number()
	{
		$number = '';
		$query = $this->db->query('SELECT * FROM tbl_purchase where order_type="Purchase Order"');
			if($query->num_rows()>0){;
			$this->db->select("*");
			$this->db->from("tbl_purchase");
			$this->db->where('order_type','Purchase Order');
			$this->db->limit(1);
			$this->db->order_by('id',"DESC");
			$query = $this->db->get();
			$result = $query->result();
			$number = $result[0]->purchase_order;
			$number = explode('-',$number);
			$number = str_pad(++$number[1],5,'0',STR_PAD_LEFT);
				return $number;
		} else {
			$number = '00001';
				return $number;
		}	
		
	}
}