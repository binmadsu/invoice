<?php 
class m_orders extends CI_Model{
	private $tbl_name = 'tbl_payments';
	
	function listing($limit,$start,$startdate,$enddate)
	{
		$this->db->select('*');
		$this->db->from($this->tbl_name);
		if(!isEmpty($startdate) && !isEmpty($enddate)){
			$startdate = date("Y/m/d", $startdate);
			$enddate = date("Y/m/d", $enddate);
			$this->db->where("payment_date >= '".$startdate."' and payment_date <= '".$enddate."'");
		}
		$this->db->limit($limit, $start);
		$query = $this->db->get();
		//echo $this->db->last_query();die;
		return $query->result_array();
	}

	function delete($pageid){
		$this->db->delete($this->tbl_name, array('id' => $pageid));
		return ($this->db->affected_rows() != 1) ? false : true;
  	}

	/*function status($id,$status){
		$this->db->where('id',$id );
        $this->db->set("is_active", $status);
        $this->db->update($this->tbl_name);
		//$this->output->enable_profiler(TRUE);
		return ($this->db->affected_rows() > 0) ? 2 : 0;//for insert // for update 
  	}*/

  	function count_all($startdate,$enddate){
		$this->db->select('*');
		if(!isEmpty($startdate) && !isEmpty($enddate)){
			$startdate = date("Y/m/d", $startdate);
			$enddate = date("Y/m/d", $enddate);
			$this->db->where("payment_date >= '".$startdate."' and payment_date <= '".$enddate."'");
		}
		/*if(!isEmpty($specificOption) && !isEmpty($specificValue)){

		   $this->db->like($specificOption,$specificValue);

		}*/
		$query = $this->db->get($this->tbl_name);
		return ($query->num_rows());
	}

	function page_info($id=0){
		$this->db->select('*');
		$this->db->from($this->tbl_name);
		if(!empty($id)){
			$this->db->where('payment_id',$id);
		}
		$query = $this->db->get();
		return $query->result_array();
	}

	function Updatepriority($id,$priority)
	{
		$this->db->where('id',$id );
        //$this->db->set("priority", $priority);
        $this->db->update($this->tbl_name);
		//$this->output->enable_profiler(TRUE);
		//return ($this->db->affected_rows() > 0) ? 2 : 0;//for insert // for update
	}

	//get length
	function get_length(){
		$this->db->select('*');
		$this->db->from($this->tbl_name);
		$query = $this->db->get();
		return count($query->result_array())+1;
	}

	public function uploadImageObject($objfile)
	{
		//echo '<pre>';print_r($objfile);die;
		$time = time();
		$url = 'assets/airlines/'.$time."_".$objfile['name'];
	 	
	 	//extensive suitability check before doing anything with the file...
	    if (($objfile == "none") || (empty($objfile['name'])) )
	    {
	       $message = "No file uploaded.";
	       $url  = '';
	    }
	    else if ($objfile["size"] == 0)
	    {
	       $message = "The file is of zero length.";$url  = '';
	    }
	    else if (!is_uploaded_file($objfile["tmp_name"]))
	    {
	       $message = "You may be attempting to hack our server. We're on to you; expect a knock on the door sometime soon.";
	       $url  = '';
	    }
	    else {
	      $message = "";
	      $move = @ move_uploaded_file($objfile['tmp_name'], $url);
	      if(!$move)
	      {
	         $message = "Error moving uploaded file. Check the script is granted Read/Write/Modify permissions.";
	         $url  = '';
	      }
	    }
	    return $url;
	}
}
?>