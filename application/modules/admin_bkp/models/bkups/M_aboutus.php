<?php 
class m_aboutus extends CI_Model{
	private $tbl_name = 'tbl_aboutus';
	/*function addpage()
	{
		$priority = $this->get_length();
		$image = $this->uploadImageObject($_FILES['image']);
		$data = array(
			'name' => $this->input->post('name'),
			'image' => $image,
			'price1' => $this->input->post('price1'),
			'price2' => $this->input->post('price2'),
			'price3' => $this->input->post('price3'),
			'price4' => $this->input->post('price4'),
			'price5' => $this->input->post('price5'),
			'price6' => $this->input->post('price6'),
			'price7' => $this->input->post('price7'),
			'price8' => $this->input->post('price8'),
			'price9' => $this->input->post('price9'),
			'price10' => $this->input->post('price10'),
			'price11' => $this->input->post('price11'),
			'price12' => $this->input->post('price12'),
			'is_active' => 1,
			'priority' => $priority,
		);
		
		//echo'<pre>';print_r($data);echo'</pre>';die;
		$msg = 0;
		$this->db->insert($this->tbl_name, $data);
		//echo $this->db->last_query();die;
		$msg = ($this->db->affected_rows() > 0) ? 1 : 0; //for insert
		return  $msg;
	}
	
	function edit()
	{
		$data1 = array();$data2 = array();$data3 = array();$data4 = array();
		$banner1 = $this->uploadImageObject($_FILES['banner1']);
		$banner2 = $this->uploadImageObject($_FILES['banner2']);
		$image   = $this->uploadImageObject($_FILES['image']);
		if($banner1){
			$data1 = array('banner1' => $banner1);
		}
		if($banner2){
			$data2 = array('banner2' => $banner2);
		}
		if($image){
			$data3 = array('image' => $image);
		}
		$data4 = array(
			'title' => $this->input->post('title'),
			'page_desc' => $this->input->post('page_desc'),
			'is_active' => 1,
			
		);
		$data = array_merge($data1,$data2,$data3,$data4);
		//echo'<pre>';print_r($data);echo'</pre>';die;
		$msg = 0;
		$this->db->where('id','1' );
		 $this->db->update('tbl_flydrive', $data);
		//echo $this->db->last_query();die;
		$msg = ($this->db->affected_rows() > 0) ? 1 : 0; //for insert
		return  $msg;
	}
	
	//function listing($limit,$start,$startdate,$enddate,$specificOption,$specificValue)
	function listing($limit,$start)
	{
		$this->db->select('*');
		$this->db->from('tbl_airlines');
		$this->db->limit($limit, $start);
		$this->db->order_by('priority','asc');
		$query = $this->db->get();
		//echo $this->db->last_query();die;
		return $query->result_array();
	}*/
	function index($id){
		$banner_image = $this->uploadImageObject($_FILES['banner_image']);
		if($banner_image){
			$data = array(
				'page_title' => $this->input->post('page_title'),
				'banner_image' => $banner_image,
				'subtitle1' => $this->input->post('subtitle1'),
				'subtitle2' => $this->input->post('subtitle2'),
				'page_content' => $this->input->post('page_content'),
				'video_title' => $this->input->post('video_title'),
				'video_content' => $this->input->post('video_content'),
				'video_url' => $this->input->post('video_url'),
				'video_frame' => $this->input->post('video_frame'),
				'status' => '1',
			);
		}else{
			$data = array(
				'page_title' => $this->input->post('page_title'),
				'subtitle1' => $this->input->post('subtitle1'),
				'subtitle2' => $this->input->post('subtitle2'),
				'page_content' => $this->input->post('page_content'),
				'video_title' => $this->input->post('video_title'),
				'video_content' => $this->input->post('video_content'),
				'video_url' => $this->input->post('video_url'),
				'video_frame' => $this->input->post('video_frame'),
				'status' => '1',
			);
		}
		//echo'<pre>';print_r($data);echo'</pre>';die;
		$msg = 0;
		if( $id == 0 ){
			$this->db->insert($this->tbl_name, $data);
			//echo $this->db->last_query();die;
			$msg = ($this->db->affected_rows() > 0) ? 1 : 0;//for insert
		}else{
			$this->db->where('id',$id );
		    $this->db->update($this->tbl_name, $data); 
			//echo $this->db->last_query();die;
			$msg = ($this->db->affected_rows() > 0) ? 2 : 3;//for update : for nothing happened
			
		}	
		return $msg;
	}
	
	function page_info($id=0){
		$this->db->select('*');
		$this->db->from($this->tbl_name);
		$query = $this->db->get();
		return $query->row_array();
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