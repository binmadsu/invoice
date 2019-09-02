<?php 
class m_refunds extends CI_Model{
	private $tbl_banners = 'tbl_refunds';
	function addpage()
	{
		$text=str_replace("\'","'",$this->input->post('banner_description'));
		$priority=$this->get_length();
		//$banner_image = $this->uploadBannerImage();
		$data = array(
			'title' => $this->input->post('title'),
			'banner_description' => $text,
			'priority' => $priority,
			'is_active' => 1,
		);
		//echo'<pre>';print_r($data);echo'</pre>';die;
		$msg = 0;
	
		$this->db->insert($this->tbl_banners, $data);
		$msg = ($this->db->affected_rows() > 0) ? 1 : 0;//for insert
	
		return  $msg;
	}

	function Updatepriority($id,$priority)
	{
		$this->db->where('id',$id );
        $this->db->set("priority", $priority);
        $this->db->update($this->tbl_banners);
		//$this->output->enable_profiler(TRUE);
		//return ($this->db->affected_rows() > 0) ? 2 : 0;//for insert // for update
	}

	//get length
	function get_length(){
		$this->db->select('*');
		$this->db->from($this->tbl_banners);
		$query = $this->db->get();
		return count($query->result_array())+1;
	}
	
	function listing($limit,$start,$startdate,$enddate,$specificOption,$specificValue)
	{
		$this->db->select('*');
		$this->db->from($this->tbl_banners);
		if(!isEmpty($specificOption) && !isEmpty($specificValue)){
		   $this->db->like($specificOption,$specificValue);
		}
		$this->db->limit($limit, $start);
		$this->db->order_by('date','Asc');
		$query = $this->db->get();
		//echo $this->db->last_query(); 
		return $query->result_array();
	}
	
	
	function index($id){
		//echo '==='.$user_id;die;
		//$is_logged_in = $this->session->userdata('logged_in');
		$text=str_replace("\'","'",$this->input->post('banner_description'));
		/*$banner_image = $this->uploadBannerImage();
		if($banner_image){
			$data = array(
				'title' => $this->input->post('title'),
				'subtitle' => $this->input->post('subtitle'),
				'banner_description' => $text,
				'banner_image' => $banner_image,
				//'banner_url' => $this->input->post('banner_url'),
			);
		}else{*/
			$data = array(
				'title' => $this->input->post('title'),
				'banner_description' => $text,
			);
		//}
		//echo'<pre>';print_r($data);echo'</pre>'; die;
		$msg = 0;
		if( $id == 0 ){
			$this->db->insert($this->tbl_banners, $data);
			$msg = ($this->db->affected_rows() > 0) ? 1 : 0;//for insert
		}else{
			$this->db->where('id',$id );
		    $this->db->update($this->tbl_banners, $data);
			//echo $this->db->last_query();die;
			$msg = ($this->db->affected_rows() > 0) ? 2 : 3;//for update : for nothing happened
			
		}	
		return  $msg;
	}
	
	function delete($pageid){
		$this->db->delete($this->tbl_banners, array('id' => $pageid));
		return ($this->db->affected_rows() != 1) ? false : true;
  	}
	function status($id,$status){
		$this->db->where('id',$id );
        $this->db->set("is_active", $status);
        $this->db->update($this->tbl_banners);
		//$this->output->enable_profiler(TRUE);
		return ($this->db->affected_rows() > 0) ? 2 : 0;//for insert // for update 
  	}
	
	function count_all($startdate,$enddate,$specificOption,$specificValue){
		$this->db->select('*');
		if(!isEmpty($specificOption) && !isEmpty($specificValue)){
		   $this->db->like($specificOption,$specificValue);
		}
		$query =   $this->db->get($this->tbl_banners);
		return ($query->num_rows());
	}
	
	function page_info($id=0){
		$this->db->select('*');
		$this->db->from($this->tbl_banners);
		if(!empty($id)){
			$this->db->where('id',$id);
		}
		$query = $this->db->get();
		return $query->result_array();
	}
	
	public function uploadBannerImage()
	{
		$time = time();
		$url = 'assets/faqs/'.$time."_".$_FILES['banner_image']['name'];

	 	//extensive suitability check before doing anything with the file...
	    if (($_FILES['banner_image'] == "none") || (empty($_FILES['banner_image']['name'])) )
	    {
	       $message = "No file uploaded.";
	       $url  = '';
	    }
	    else if ($_FILES['banner_image']["size"] == 0)
	    {
	       $message = "The file is of zero length.";$url  = '';
	    }
	    else if (!is_uploaded_file($_FILES['banner_image']["tmp_name"]))
	    {
	       $message = "You may be attempting to hack our server. We're on to you; expect a knock on the door sometime soon.";
	       $url  = '';
	    }
	    else {
	      $message = "";
	      $move = @ move_uploaded_file($_FILES['banner_image']['tmp_name'], $url);
	      if(!$move)
	      {
	         $message = "Error moving uploaded file. Check the script is granted Read/Write/Modify permissions.";
	         $url  = '';
	      }
	    }
	    return $url;
	}

	function addcontent(){
		$this->db->select('*');
		$this->db->from('tbl_dynamic_contents');
		$this->db->where('ctype', 'refunds');
		$query1 = $this->db->get();
		$rowCount = count($query1->result_array());
		$msg = 0;
		$data = array(
			'content' => $this->input->post('description'),
			'ctype' => 'refunds',
		);
		if($rowCount <= 0){
			//echo'<pre>';print_r($data);echo'</pre>';die;
			$this->db->insert('tbl_dynamic_contents', $data);
		}
		else{
			$this->db->where('ctype', 'refunds');
			$this->db->update('tbl_dynamic_contents', $data);
		}
		$msg = ($this->db->affected_rows() > 0) ? 1 : 2;
		return $msg;
	}
}
?>