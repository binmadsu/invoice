<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class recivedstock extends CI_Controller{

	public function __construct(){
	    parent::__construct();
	    is_logged_in();
	    $this->load->model('M_recivedstock');
		$this->load->model('M_returnitem');
	}

	public function index($purchase_id=0){
		$data = array();
		$qty = $this->input->post('quantity');
		$data['details_transfer'] = $this->M_recivedstock->getvalue($purchase_id);
		$data_result = $this->M_recivedstock->getvalue($purchase_id);
		//echo "<pre>"; print_r($data_pur_order);exit;
		if($purchase_id){
			$data['purchase_id'] = $purchase_id;			
		}
		//$data['supplier'] = $this->M_recivedstock->Getsupplier();
		//$data['itemname'] = $this->M_recivedstock->Getitem();
		$this->load->helper(array('form'));
	    $this->load->library('form_validation');
		if($_SERVER['REQUEST_METHOD'] == 'POST')
		{
			$this->form_validation->set_rules('Accepte_date', 'Accepte_date', 'required');
			$this->form_validation->set_rules('quantity', 'quantity', 'required');
				if($qty <= $data_result[0]['quinty']){	
					if($this->form_validation->run() == true)
					{
						$data_count_p_order = $this->M_recivedstock->pur_oredr_count($data_result[0]['purchase_order']);
						if(isset($data_count_p_order) && $data_count_p_order!=1){
							//echo "add";exit;
							$this->M_recivedstock->addpage();
							$this->session->set_flashdata('msg', 'Record added successfully!');
							redirect('admin/recivedstock/listing', 'refresh');
						}else {
							//echo "update";exit;
							$this->M_recivedstock->update($purchase_id);
							$this->session->set_flashdata('msg', 'Record added successfully!');
							redirect('admin/recivedstock/listing', 'refresh');
						}
						
					}
				}else {
						$this->session->set_flashdata('msg', 'Record not added successfully!');
						redirect('admin/recivedstock/listing?err_msg=1', 'refresh');
				}
	 	}
	 	//pr($data);die;
	   	$this->load->view('recivedstock/add_view',$data);
	}
	

	function listing($offset=0){
		$this->load->helper('form');
		$limit = pagination_count;
		//echo $limit;
		$data['datarows'] = $this->M_recivedstock->listing($limit,$offset);
		//echo "<pre>"; print_r($data['datarows']);exit;
		$config['total_rows'] = $this->M_recivedstock->count_all();
		//
		/* pagination start */
		$this->load->library('pagination');
		$config['first_url'] = site_url("admin/recivedstock/listing/0/");
		$config['base_url'] = site_url("admin/recivedstock/listing/");
		$config['per_page'] = $limit; 
		$config['uri_segment'] = 4;
		$this->pagination->initialize($config);
		$data["links"] = $this->pagination->create_links();
		$data['page'] = $offset;
		/*******/
		//pr($data);die;
		$this->load->view('recivedstock/view_list',$data);
	}

	
	
	
	//edit pages
	function edit($id)
	{
		$data_title=array();
		$data = array();
		$this->load->library('form_validation');
		if(!empty($_POST)){
			$this->form_validation->set_rules('quantity', 'Title', 'required');
		}
		
		if($this->form_validation->run() == true)
		{
			$msg = $this->M_recivedstock->index($id,$data_title);
			if(!empty($msg)){
			   $this->session->set_flashdata('msg', 'Record Updated successfully');
			}
			redirect('/admin/recivedstock/listing/'.$page.'/');
		}else{
			//$data['gallery'] = gethandoverCategories();
			$data['datarows'] = $this->M_recivedstock->page_info($id);
			/*echo "<pre>";print_r($data);die;*/
			$this->load->view('recivedstock/edit_view',$data);
		}
	}

	
	
	function delete($pageid){
		if($this->M_recivedstock->delete($pageid))
			$this->session->set_flashdata('msg', 'Record Deleted successfully');
		redirect('/admin/recivedstock/listing/','refresh');
	}

	
	
	function status($id,$status){
		if($this->M_recivedstock->status($id,$status))
			$this->session->set_flashdata('msg', 'Record Updated successfully');
		redirect('/admin/recivedstock/listing/','refresh');
	}

	
	
	function priority()
	{
		$id=$_GET['id'];
		$priority=$_GET['p'];
		$this->M_recivedstock->Updatepriority($id,$priority);
	}
	
	//for adding the value recived stock log
	
	function recive_log()
	{
		$data = array();
		
		$data['pur_id'] = $this->input->post('pur_id');
		$data['accceptdate'] = $this->input->post('accceptdate');
		$data['recv_qty'] = $this->input->post('recv_qty');
		$data['gate_no ']= $this->input->post('gate_no');
		$data['challan_no ']= $this->input->post('challan_no');
		$data['hand_over'] = $this->input->post('hand_over');
		$data['rec_no'] = $this->input->post('rec_no');
		
		$this->M_recivedstock->insert_data_reciv_log($data);
	}
	
	public function getqty()
	{
		$tr_qty = '';
		$tr_qty = $this->input->post('t_qty');

		$this->M_recivedstock->get_transqty($tr_qty);
	}
	
}