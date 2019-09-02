<?php 
class m_services extends CI_Model{
	private $tbl_name = 'tbl_services';
	function addpage()
	{
		$data1 = array();$data2 = array();$data3 = array();$data4 = array();$data5 = array();
		/*if(isset($_POST['florida_special']) and $_POST['florida_special'] == 'yes'){$florida_special = '1';}else{$florida_special='0';}
		if(isset($_POST['feature_hotel']) and $_POST['feature_hotel'] == 'yes'){$feature_hotel = '1';}else{$feature_hotel='0';}
		if(isset($_POST['hot_deals']) and $_POST['hot_deals'] == 'yes'){$hot_deals = '1';}else{$hot_deals='0';}*/
		$priority = $this->get_length();
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
		$slug = url_title($this->input->post('hotel_name'), 'dash', true);
		$serviceslug = $this->checkSlugExists($slug);
		$data6 = array(
			'slug' => $serviceslug,
			'hotel_name' => $this->input->post('hotel_name'),
			'location' => $this->input->post('location'),
			'sub_cat' => $this->input->post('sub_cat'),
			//'googlemap' => $this->input->post('googlemap'),
			'description' => $this->input->post('fckdescription'),
			'price' => $this->input->post('price'),
			'day' => $this->input->post('day'),
			'summary' => $this->input->post('summary'),
			'pkgdescription' => $this->input->post('pkgdescription'),
			'is_active' => 1,
			'priority' => $priority,
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
		$this->db->select($this->tbl_name.'.*,tbl_categories.category_title');
		$this->db->from($this->tbl_name);
		$this->db->join('tbl_categories', $this->tbl_name.'.sub_cat  = tbl_categories.id');
		$this->db->limit($limit, $start);
		$this->db->order_by('priority','asc');
		$query = $this->db->get();
		//echo $this->db->last_query();die;
		return $query->result_array();
	}
	
	function index($id){
		$data1 = array();$data2 = array();$data3 = array();$data4 = array();$data5 = array();
		/*if(isset($_POST['florida_special']) and $_POST['florida_special'] == 'yes'){$florida_special = '1';}else{$florida_special='0';}
		if(isset($_POST['hot_deals']) and $_POST['hot_deals'] == 'yes'){$hot_deals = '1';}else{$hot_deals='0';}
		if(isset($_POST['feature_hotel']) and $_POST['feature_hotel'] == 'yes'){$feature_hotel = '1';}else{$feature_hotel='0';}*/
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
		$data6 = array(
			'hotel_name' => $this->input->post('hotel_name'),
			'location' => $this->input->post('location'),
			'sub_cat' => $this->input->post('sub_cat'),
			//'googlemap' => $this->input->post('googlemap'),
			'description' => $this->input->post('fckdescription'),
			'price' => $this->input->post('price'),
			'day' => $this->input->post('day'),
			'summary' => $this->input->post('summary'),
			'pkgdescription' => $this->input->post('pkgdescription'),
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