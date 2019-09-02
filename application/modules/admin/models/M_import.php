<?php 
class m_import extends CI_Model{
	private $tbl_name = 'tbl_schools';
	
	
	/*
	function uploadFileData($filepath){
		$status = $this->db->query("
				LOAD DATA LOCAL INFILE  '".$filepath."'
				INTO TABLE tbl_schools
				FIELDS TERMINATED BY ',' 
				ENCLOSED BY "."'".'"'."'".
				"LINES TERMINATED BY '\n'
				IGNORE 1 ROWS;
			");
		return $status;
	}
	*/

	function getOrders(){
		$this->db->select('firstname as Name,email as Email,phone as Phone,address as Address,txn_id as TransactionId,payment_gross as Amount,currency_code as Currency, payment_status as Status, payment_gateway as Gateway, payment_date as Paid On');
		$this->db->from('tbl_payments');
		$query = $this->db->get();
		return $query->result_array();
	}

	function getEnquiries(){
		$this->db->select('firstname,email,contact_no,subject,message,title,sourceurl,createdon');
		$this->db->from('tbl_enquiry');
		$query = $this->db->get();
		return $query->result_array();
	}

	function getNewsletters(){
		$this->db->select('newsletteremail,createdon');
		$this->db->from('tbl_newsletters');
		$query = $this->db->get();
		return $query->result_array();
	}

	function edit_Price($data,$hid=0,$pkgid=0){
		//$this->db->where('hotel_name',$hid);
		//$this->db->where('pkgid',$pkgid);
		//$this->db->update('tbl_hotels', $data);
		//print_r($data);echo $hid; echo $pkgid;
	    //echo $this->db->last_query();die;
	    $msg = ($this->db->affected_rows() > 0) ? 2 : 3;//for update : for nothing happened
	}
}
?>