<?php 
class m_weddings extends CI_Model{
	private $tbl_name = 'tbl_weddings';
	function addpage()
	{
		$userid = getCurUserID();
		$data1 = array();$data2 = array();$data3 = array();$data4 = array();$data5 = array();
		if(isset($_POST['is_featured']) and $_POST['is_featured'] == 'yes'){$is_featured = '1';}else{$is_featured='0';}
		
		//$priority = $this->get_length();
		$banner_image = $this->uploadImageObject($_FILES['banner_image']);
		/*$banner_image2 = $this->uploadImageObject($_FILES['banner_image2']);
		$banner_image3 = $this->uploadImageObject($_FILES['banner_image3']);
		$banner_image4 = $this->uploadImageObject($_FILES['banner_image4']);
		$banner_image5 = $this->uploadImageObject($_FILES['banner_image5']);*/
		if($banner_image){
			$data1 = array('banner_image' => $banner_image);
		}
		/*if($banner_image2){
			$data2 = array('banner_image2' => $banner_image2);
		}
		if($banner_image3){
			$data3 = array('banner_image3' => $banner_image3);
		}
		if($banner_image4){
			$data4 = array('banner_image4' => $banner_image4);
		}
		if($banner_image5){
			$data5 = array('banner_image5' => $banner_image5);
		}*/
		$wedding_startdate = date("Y-m-d H:i", strtotime($this->input->post('wedding_startdate')));
		$wedding_enddate = date("Y-m-d H:i", strtotime($this->input->post('wedding_enddate')));
		$wedding_title = $this->input->post('wedding_title');
		$wedding_description=str_replace("\'","'",$this->input->post('wedding_description'));
		//$wedding_description2=str_replace("\'","'",$this->input->post('wedding_description2'));
		$slug = url_title($wedding_title.'-'.uniqid('weds_',true), 'dash', true);
		$data6 = array(
			'slug' => $slug,
			'wedding_title' => $wedding_title,
			'wedding_startdate' => $wedding_startdate,
			'wedding_enddate' => $wedding_enddate,
			'location' => $this->input->post('location'),
			'venue' => $this->input->post('venue'),
			'wedding_events' => $this->input->post('wedding_events'),
			'wedding_description' => $wedding_description,
			//'wedding_description2' => $wedding_description2,
			'ticket_price1' => $this->input->post('ticket_price1'),
			'ticket_count1' => $this->input->post('ticket_count1'),
			'ticket_price2' => $this->input->post('ticket_price2'),
			'ticket_count2' => $this->input->post('ticket_count2'),
			'userid' => $userid,
			'is_featured' => $is_featured,
			'is_active' => 1,
			//'priority' => $priority,
		);
		$data = array_merge($data1,$data2,$data3,$data4,$data5,$data6);
		//echo'<pre>';print_r($data);echo'</pre>';die;
		$msg = 0;
		$this->db->insert($this->tbl_name, $data);
		$msg = ($this->db->affected_rows() > 0) ? 1 : 0; //for insert
		return  $msg;
	}
	
	function checkSlugExists($slug){
		$serviceslug = '';
		$query = $this->db->query("select * from ".$this->tbl_name." where slug='".$slug."'");
		$count = $query->num_rows();
		// if slug pre exists
		if ($count > 0) {
			$id=rand(10000,99999);  
			$shorturl=base_convert($id,20,36);
			$serviceslug = $slug.$shorturl;
			return $serviceslug;
		}else
			return $slug;
	}

	//function listing($limit,$start,$startdate,$enddate,$specificOption,$specificValue)
	function listing($limit,$start)
	{
		$this->db->select('*');
		$this->db->from($this->tbl_name);
		//$this->db->join('tbl_categories', $this->tbl_name.'.sub_cat  = tbl_categories.id');
		$this->db->where('is_active', 0);
		$this->db->or_where('is_active', 1);
		$this->db->limit($limit, $start);
		$this->db->order_by('id','desc');
		$query = $this->db->get();
		//echo $this->db->last_query();die;
		return $query->result_array();
	}
	
	function index($id){
		$userid = getCurUserID();
		$data1 = array();$data2 = array();$data3 = array();$data4 = array();$data5 = array();
		if(isset($_POST['is_featured']) and $_POST['is_featured'] == 'yes'){$is_featured = '1';}else{$is_featured='0';}
		$banner_image = $this->uploadImageObject($_FILES['banner_image']);
		/*$banner_image2 = $this->uploadImageObject($_FILES['banner_image2']);
		$banner_image3 = $this->uploadImageObject($_FILES['banner_image3']);
		$banner_image4 = $this->uploadImageObject($_FILES['banner_image4']);
		$banner_image5 = $this->uploadImageObject($_FILES['banner_image5']);*/
		//if($banner_image || $banner_image2 || $banner_image3 || $banner_image4 || $banner_image5){
		if($banner_image){
			$data1 = array('banner_image' => $banner_image);
		}
		/*if($banner_image2){
			$data2 = array('banner_image2' => $banner_image2);
		}
		if($banner_image3){
			$data3 = array('banner_image3' => $banner_image3);
		}
		if($banner_image4){
			$data4 = array('banner_image4' => $banner_image4);
		}
		if($banner_image5){
			$data5 = array('banner_image5' => $banner_image5);
		}*/
		$wedding_startdate = date("Y-m-d H:i", strtotime($this->input->post('wedding_startdate')));
		$wedding_enddate = date("Y-m-d H:i", strtotime($this->input->post('wedding_enddate')));
		$wedding_title = $this->input->post('wedding_title');
		$wedding_description=str_replace("\'","'",$this->input->post('wedding_description'));
		//$wedding_description2=str_replace("\'","'",$this->input->post('wedding_description2'));
		//$slug = url_title($wedding_title.'-'.uniqid('weds_',true), 'dash', true);
		$data6 = array(
			//'slug' => $slug,
			'wedding_title' => $wedding_title,
			'wedding_startdate' => $wedding_startdate,
			'wedding_enddate' => $wedding_enddate,
			'location' => $this->input->post('location'),
			'venue' => $this->input->post('venue'),
			'wedding_events' => $this->input->post('wedding_events'),
			'wedding_description' => $wedding_description,
			//'wedding_description2' => $wedding_description2,
			'ticket_price1' => $this->input->post('ticket_price1'),
			'ticket_count1' => $this->input->post('ticket_count1'),
			'ticket_price2' => $this->input->post('ticket_price2'),
			'ticket_count2' => $this->input->post('ticket_count2'),
			//'userid' => $userid,
			'is_featured' => $is_featured,
			//'is_active' => 1,
			//'priority' => $priority,
		);
		$data = array_merge($data1,$data2,$data3,$data4,$data5,$data6);
		//echo'<pre>';print_r($data);echo'</pre>';die;
		$msg = 0;
		if( $id == 0 ){
			$this->db->insert($this->tbl_name, $data);
			$msg = ($this->db->affected_rows() > 0) ? 1 : 0;//for insert
		}else{
			$this->db->where('id',$id );
		    $this->db->update($this->tbl_name, $data); 
			//echo $this->db->last_query();die;
			$msg = ($this->db->affected_rows() > 0) ? 2 : 3;//for update : for nothing happened
			
		}	
		return  $msg;
	}

	function delete($pageid){
		$this->db->delete($this->tbl_name, array('id' => $pageid));
		return ($this->db->affected_rows() != 1) ? false : true;
  	}
	function status($id,$status){
		$this->db->where('id',$id );
        $this->db->set("is_active", $status);
        $this->db->update($this->tbl_name);
		//$this->output->enable_profiler(TRUE);
		return ($this->db->affected_rows() > 0) ? 2 : 0;//for insert // for update 
  	}
	
	//function count_all($startdate,$enddate,$specificOption,$specificValue){
  	function count_all(){
		$this->db->select('*');
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
		$url = 'assets/category/'.$time."_".$objfile['name'];

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