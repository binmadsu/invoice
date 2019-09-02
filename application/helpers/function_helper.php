<?php 
define('frontendsession','frontuser');
define('backendsession','backendadmin');
if ( ! function_exists('pr'))
{
	function pr($data){
		echo '<pre>';
		print_r($data);
		echo '</pre>';
	}
}

  function randomUsername(){
	  
	    $CI =& get_instance();
		$CI->db->select('username');
		$CI->db->from('userinfo');
		$CI->db->order_by('id','desc');
		$CI->db->limit(1,0);
		$row = $CI->db->get()->row();
	    //echo $CI->db->last_query();die;
		$autousername = intval($row->username);
		$autousername += 1;
		return $autousername;
	}



if(!function_exists('is_logged_in'))
{
    function is_logged_in()
    {
		$CI =& get_instance();
		$is_logged_in = $CI->session->userdata(backendsession);
		//print_r($is_logged_in);die;
		if(!isset($is_logged_in) || $is_logged_in != true)
		{
			redirect('admin/login');
			die();
		}
		/* Check Is Role is Authorized? */
		can_role_access($is_logged_in);
	}
}

if(!function_exists('can_role_access'))
{
    function can_role_access($is_logged_in)
    {
		$CI =& get_instance();
		//print_r($is_logged_in);die;
		$roleid = isset($is_logged_in['admin_role'])?$is_logged_in['admin_role']:0;
		// Role Id 1 is for Super Admin
		if($roleid != 1)
		{
			$query =  $CI->db->select('permissionid')->from('tbl_role_permissions')->where('roleid', $roleid)->get();
			//echo $CI->db->last_query(); die;
			$permissions = $query->result_array();
			//pr($permissions);die;
			$isAuthorized = false;
			foreach($permissions as $k=>$arrPermission)
			{
				$permissionid = @$arrPermission['permissionid'];
				$isAuthorized = matchRolePermissions($permissionid);
				//echo " == $isAuthorized == ";die;
				if($isAuthorized){break;}
			}
			//echo "== $isAuthorized ";die;
			if(!$isAuthorized){
				redirect('admin/nopermission');die();
			}

		}
	}
}

if(!function_exists('matchRolePermissions'))
{
    function matchRolePermissions($permissionid)
    {
		$CI =& get_instance();
		$query =  $CI->db->select('*')->from('tbl_permissions')->where('id', $permissionid)->get();
		$permissions = $query->result_array();
		//pr($permissions);die;
		$isAuthorized = false;
		foreach($permissions as $k=>$arrPerm)
		{
			$permission = @$arrPerm['permission'];
			/* Map URL with role permission */
			$url1 = $CI->uri->segment(1);
			$url2 = $CI->router->fetch_class();
			$url3 = $CI->router->fetch_method();
			$currentRoute = $url1.'_'.$url2.'_'.$url3;
			//echo ' 1. '.$currentRoute.' :2.'.$permission.'<br>';die;
			// Dashboard is for everyone : admin_admin_index
			if(trim($currentRoute) == trim($permission) || trim($currentRoute) == 'admin_admin_index')
			{
				$isAuthorized = true;break;
			}else{
				//echo " == nopermission == ";
				$isAuthorized = false;break;
			}
			/* Map URL with role permission */
		}
		return $isAuthorized;
	}
}

if(!function_exists('getAdminUserRole'))
{
    function getAdminUserRole()
    {
	   $CI =& get_instance();
	   $is_logged_in = $CI->session->userdata(backendsession);
	   //pr($is_logged_in);
	   if(isset($is_logged_in) || $is_logged_in == true)
	   {
	   		return $is_logged_in['admin_role'];
	   }else
	   		return '';
    }
}

if(!function_exists('getCurUserID'))
{
    function getCurUserID()
    {
	   $CI =& get_instance();
	   $is_logged_in = $CI->session->userdata(backendsession);
	   //print_r($is_logged_in);
       if(isset($is_logged_in) || $is_logged_in == true)
       {
			return $is_logged_in['id'];
       } else 
			return '';
    }
}


if(!function_exists('is_memberlogged_in'))
{
    function is_memberlogged_in()
    {
		$CI =& get_instance();
		$is_logged_in = $CI->session->userdata(frontendsession);
		//print_r($is_logged_in);
		if(!isset($is_logged_in) || $is_logged_in != true)
		{
			$curURL = current_url();
			redirect('login/?referrer='.$curURL);
			die();
		}
	}
}

if(!function_exists('getMemberUserID'))
{
    function getMemberUserID()
    {
	   $CI =& get_instance();
	   $is_logged_in = $CI->session->userdata(frontendsession);
       if(isset($is_logged_in) || $is_logged_in == true)
       {
			return $is_logged_in['id'];
       }else
			return '';
    }
}

if(!function_exists('getMemberDetailsById')){

	function getMemberDetailsById($memberid){
		$CI = &get_instance();
		$query = $CI->db->select('*')->from('tbl_members')
					->where('id',$memberid)
					->where('status','1')
					->get();
		//echo $CI->db->last_query(); die;
		$items = array();
		foreach($query->result() as $row){
			$items['id'] =  $row->id;
			$items['username'] =  $row->username;
			$items['firstname'] =  ucfirst($row->firstname);
			$items['lastname'] =  ucfirst($row->lastname);
			$items['mobile'] =  $row->mobile;
			$items['gender'] =  $row->gender;
			$items['email'] =  $row->email;
			$items['password'] =  $row->password;
			$items['date_of_birth'] =  $row->date_of_birth;
			$items['city'] =  $row->city;
			$items['hometown'] =  $row->hometown;
			$items['aboutme'] =  $row->aboutme;
			$items['profile_image'] =  $row->profile_image;
			$items['comanyname'] =  $row->comanyname;
			$items['userTypeId'] =  $row->userTypeId;
			$items['verification_code'] =  $row->verification_code;
			$items['status'] =  $row->status;
			$items['createdon'] =  $row->createdon;
		}
		return $items;
	}
}



if(!function_exists('getAdminUserDetailsById')){
	function getAdminUserDetailsById($adminid){
		$CI =  & get_instance();
		$query =  $CI->db->select('*')->from('tbl_users')
					->where('id',$adminid)
					->where('status','1')
					->get();
		//echo $CI->db->last_query(); die;
		$items = array();
		foreach($query->result() as $row){
			$items['id'] =  $row->id;
			$items['username'] =  $row->username;
			$items['email'] =  $row->email;
			$items['mobile_no'] =  $row->mobile_no;
			$items['depeartment'] =  $row->depeartment;
			$items['company'] =  $row->company;
			$items['is_active'] =  $row->is_active;
			$items['password'] =  $row->password;
			$items['full_name'] =  ucfirst($row->first_name).' '.ucfirst($row->last_name);
			//$items['status'] =  $row->status;
		}
		return $items;
	}
}

/****************	code to fetch only for admin record	*****************************/

if(!function_exists('getAllAdmin')) // 
{
    function getAllAdmin()
    {
		$CI =  & get_instance();
		$query =  $CI->db->select('*')->from('tbl_users')
		->where('role_id ',2)
		->where('status','1')
		->get();

//echo $CI->db->last_query(); die;

$items = $query->result_array();
return $items;
    }
}

/****************	code to fetch item record	*****************************/

if(!function_exists('getAllItem')) // 
{
    function getAllItem()
    {
		$CI =  & get_instance();
		$query =  $CI->db->select('*')->from('tbl_item')
		->get();

//echo $CI->db->last_query(); die;

$items = $query->result_array();
return $items;
    }
}

/****************	fetch all purchase record	*****************************/

if(!function_exists('getAllPurchaseOrder')) // 
{
    function getAllPurchaseOrder()
    {
		$CI =  & get_instance();
		$query =  $CI->db->select('*')->from('tbl_purchase')
		->where('order_type','Purchase Order')
		->order_by('priority','desc')
		->get();

//echo $CI->db->last_query(); die;

$purchase_order = $query->result_array();
return $purchase_order;
    }
}

/****************	fetch all instock product record	*****************************/

if(!function_exists('getAllInstock')) // 
{
    function getAllInstock()
    {
		$CI =  & get_instance();
		
		$query =  $CI->db->select('SUM(quantity) AS quantity',FALSE)
		->from('tbl_recivedstock')
		->where("(`purchase_order` LIKE '%PO%')")
		->get();

		//echo $CI->db->last_query(); die;

$purchase_order = $query->result_array();
return $purchase_order;
    }
}

/****************	fetch stock record for graph	*****************************/

if(!function_exists('getAllstock')) // 
{
    function getAllstock()
    {

		$CI =  & get_instance();
		$query = $CI->db->select('*')
		->from('tbl_purchase')
		->join('tbl_recivedstock', 'tbl_purchase.id = tbl_recivedstock.purchase_id')
		->where('tbl_purchase.status','1')
		->where('tbl_purchase.order_type','Purchase Order')
		->order_by('tbl_recivedstock.created_on','desc')
		//$query = $CI->db->query("SELECT * FROM tbl_purchase c join tbl_recivedstock g on c.id=g.purchase_id where c.status = '1'and c.order_type = 'Purchase Order' order by g.created_on DESC ");
		//echo $this->db->last_query();die;
		
		->get();

		// $CI->db->last_query(); die;

$stock_result = $query->result_array();
return $stock_result;
    }
}

/**********************for date format **************************************************/

if ( ! function_exists('dateFormat'))
{
	function dateFormat($date){
	      if(!empty($date)){
		return date('M d, Y',strtotime($date));
	      } else {
		  return '';
	      }
		}
}

if ( ! function_exists('secToDate'))
{
	function secToDate($sec){
	      if(!empty($sec)){
				return date('M d, Y',$sec);
	      } else {
		  return '';
	      }
		}
}

if ( ! function_exists('formdate'))
{ // it is for show date in forms dd/mm/yy
	function formdate($date){
	      if(!empty($date)){
				return date('d-m-Y',strtotime($date));
	      } else {
		  return '';
	      }
		}
}

if ( ! function_exists('secToformdate'))
{ // it is for show date in forms dd/mm/yy
	function secToformdate($sec){
	      if(!empty($sec)){
		return date('d-m-Y',$sec);
	      } else {
		  return '';
	      }
		}
}

/*************End Date ***********************/



/************* Encryption Data ***********************/

function encryptString($str=''){
	if ($str) {
		$converter = new Encryption;
		$encoded = $converter->encode($str );
		return $encoded;
	}
	return '';
}



function decryptString($encoded=''){
	if ($encoded) {
		$converter = new Encryption;
		$decoded = $converter->decode($encoded);
		return $decoded;
	}
	return '';
}

/*************Encryption ***********************/



if (! function_exists('showmsg'))
{
	function showmsg($msg){
	      if(!empty($msg)){
			  $html='';
			  $html .='<div class="alert alert-success custom_green_alert">'.$msg.'</div>';
			  return $html;
	      } else {
		  return '';
	      }
		}
}



if ( ! function_exists('showerrormsg'))
{
	function showerrormsg($msg){
	      if(!empty($msg)){
			  $html='';
			  $html .='<div class="alert alert-danger custom_red_alert">'.$msg.'</div>';
			  return $html;
	      } else {
			return '';
	      }
		}
}

if (! function_exists('sholockmsg'))
{
function sholockmsg($msg){
	      if(!empty($msg)){
		  return $msg;
	      } else {
		  return '';
	      }
		}

}

function getFieldValue($tblname,$field,$where){
	$CI =  & get_instance();
	$row = $CI->db->select($field)->get_where($tblname,$where)->row_array();
	//pr($row);die;
	//echo ' ======== '.$CI->db->last_query();die;
	return $row;
}

if(!function_exists('get_settings')){
	function get_settings(){
		$CI =  & get_instance();
		$output =  $CI->db->select('*')
				  ->from('tbl_setting')
				  ->get();
		$settings = array();
		foreach($output->result_array() as $k=>$v){
			$settings[$k] =  $v;
		}
		return $settings;
	}
}



if(!function_exists('customers_list')){
	function customers_list(){
		$CI =  & get_instance();
		$output =  $CI->db->select('name,id')
								  ->from('tbl_customer t1')
								  ->get();
		$customer[''] = "Select Customer*";
		foreach($output->result() as $row){
			$customer[$row->id] =  ucfirst($row->name);
		}
		return $customer;
	}
}



if(!function_exists('cutString')){
	function cutString($str='',$char=100){
		if(!isEmpty($str)){
		if(strlen($str)>$char)
			{
			   return substr($str,1,$char).'...';
			}else
			{
			   return $str;
			}
		}else 
		return false;
	}
}



if(!function_exists('clientNameFromId')){
	function clientNameFromId($id=''){
		if(!isEmpty($id)){
			$CI = & get_instance();
			$CI->load->model('customer/m_customer');
			return $CI->m_customer->clientNameFromId($id);
		}else 
			return false;
	}
}



if ( ! function_exists('isEmpty'))
{
	function isEmpty($var){
	if(empty($var) || trim($var) == "" || $var == NULL) return true;
		else return false;
	}
}



if ( ! function_exists('isVarEmpty'))
{
	function isVarEmpty($var){
		if(empty($var) || trim($var) == "" || $var == NULL) return $var;
		else return '';
	}
}



if(!function_exists('userNameFromId')){
	function userNameFromId($id=''){
		if(!isEmpty($id)){
			$CI = & get_instance();
			$CI->load->model('user/m_user');
			return $CI->m_user->userNameFromId($id);
		}else 
			return false;
	}
}



if(!function_exists('memberNameFromId')){
	function memberNameFromId($id=''){
		if(!isEmpty($id)){
		$CI = & get_instance();
			$output =  $CI->db->select('full_name')
				  ->from('tbl_members m')
				  ->where('m.id',$id)
				  ->get();
			foreach($output->result() as $row){
				$member = ucfirst($row->full_name);
			}
			return $member;
		}else 
			return false;
	}
}



function GetNumberOfMonths($date1, $date2)
{
	$ts1 = strtotime($date1);
	$ts2 = strtotime($date2);

	$year1 = date('Y', $ts1);
	$year2 = date('Y', $ts2);

	$month1 = date('m', $ts1);
	$month2 = date('m', $ts2);

	$diff = (($year2 - $year1) * 12) + ($month2 - $month1);
	return $diff;

}



if(!function_exists('role')){
	function role(){
		$CI = & get_instance();
		$query = $CI->db->get('tbl_role');
		$role[''] = "Select Role*"; 
		foreach($query->result() as $row){
			$role[$row->role_id] =  ucfirst($row->role_name);
		}
		return $role;
	}
}



if(!function_exists('getDateFormat')){
	function getDateFormat($date,$format = "M j Y")
	{
		//echo date($format,strtotime($date));
		return date($format,strtotime($date));
	}
}



if(!function_exists('getSettingbyField')){
	function getSettingbyField($id=1,$field='admin_email'){ 
		if(!isEmpty($id)){
			$CI = & get_instance();
			$CI->load->model('admin/m_setting');
			return $CI->m_setting->getSettingbyField($id,$field);
		}else
			return false;
	}
}



if(!function_exists('selectEmailTemplate')){
	function selectEmailTemplate($template=''){
		if(!isEmpty($template)){
			$CI = & get_instance();
			$query = $CI->db->get_where('tbl_email_templates',array('alias'=>$template))->row();
			return $query;
		}else 
			return false;
	}
}



function Title($title='')
{
	$getTitle=(!empty($title))?'Marriage Tickets - '.ucwords($title):'Marriage Tickets';
	echo $getTitle;
}



function MetaDescription($desc='')
{
	$getTitle=(!empty($desc))?$desc:'';
	echo $getTitle;
}



function MetaKeywords($keywords='')
{
	$getTitle=(!empty($keywords))?$keywords:'';
	echo $getTitle;
}



function mailerTemplate($message)
{

	$mailertmp='<table width="100%" border="0" cellspacing="0" cellpadding="0" style="background:#FFFFFF; border:3px solid #86352c; width:600px; margin:0 auto; font-family:Arial, Helvetica, sans-serif; font-size:16px; color:#141414;">
	<thead><tr><th style="background:#74241b;"><p><img src="'.base_url().'assets/frontend/images/logo.png" width="180" alt="" border="0" /></p></th></tr></thead><tbody><tr><td style="padding:0 20px;">';
	$mailertmp .=$message;
	$mailertmp .='</td></tr></tbody><tfoot><tr><td style="padding:0 20px; font-size:14px;"><p><strong>Regards</strong><br /><img src="'.base_url().'assets/frontend/images/small_logo.png" width="143" height="30" alt="" border="0" /></p></td></tr></tfoot></table>';
	return $mailertmp;

}



if(!function_exists('setdateformat'))
{
	function setdateformat()
	{
		echo date('m/d/Y', time());
	}
}





if(!function_exists('setdateformatbyfield'))
{
	function setdateformatbyfield($date)
	{
		echo date('m/d/Y', $date);
	}
}



function getSettingbyField($id=1,$field='admin_email'){
	$CI =& get_instance();
	$query = $CI->db->query("SELECT $field FROM `tbl_setting` WHERE id =$id");
	if ($query->num_rows() > 0)
	{
		$row = $query->row()->$field;
		//pr($row);
		return $row;
	}
}



function isSchoolExistForUser($memberId=0,$schoolId=0){
	$CI =& get_instance();
	$query = $CI->db->query("SELECT * FROM tbl_member_schools WHERE memberId='$memberId' and schoolId='$schoolId'");
	if ($query->num_rows() > 0)
	{
		return true;
	}
	return false;
}



function sendMail($to,$subject='',$email_template_name='default',$replace_word){
	$CI =& get_instance();
	$email_template = selectEmailTemplate($email_template_name);
	$default_content = array(
	  '##SITE_NAME##' => 'Marriage Tickets',
	  '##SITE_URL##' => base_url(),
	  '##BASE_URL##' => base_url(),
	);
	$emailFindReplace = array_merge($default_content, $replace_word);
	//pr($emailFindReplace);die;
	$message = strtr($email_template->body, $emailFindReplace);
	//echo $message;die;
	// Mail
	$from = getSettingbyField();
	$CI->load->library('email');
	$config['charset'] = 'iso-8859-1';
	$config['wordwrap'] = TRUE;
	$config['mailtype'] = 'html';
	$CI->email->initialize($config);
	$CI->email->from($from, $title);
    $CI->email->to($to);
	$CI->email->subject($subject);
	$CI->email->message($message);
	$CI->email->send();
	$CI->email->clear(TRUE);
}



function generateVerificationCode()
{
	return md5(rand(0,1000));
}



function getPageInfo($slug=''){
	$CI =& get_instance();
	$CI->db->select('*');
	$CI->db->from('tbl_pages');
	if(!empty($slug)){
		$CI->db->where('page_slug',$slug);
	}
	$query = $CI->db->get();
	return $query->result();

}



function getSchoolAddress($addressid){
	$CI =& get_instance();
	$CI->db->select('*');
	$CI->db->from('tbl_school_address');
	$CI->db->where('id',$addressid);
	$arrAddress = $CI->db->get()->row_array();
	return $arrAddress;

}



function generateRandomId(){

	$digits = 11;
	$randomnumber = rand(pow(10, $digits-1), pow(10, $digits)-1);
	return 'INS'.$randomnumber;

}



function getMember($id=0)

{

	$arrResults = array();
	$rowcount = 0;
	if($id){
		$CI =& get_instance();
		$query =  $CI->db->query("
			SELECT m.* FROM tbl_members m 
			where m.id = '".$id."'");
		//echo $CI->db->last_query();
		$rowcount = $query->num_rows();
		foreach($query->result() as $row){
		    $arrResults['id'] =  $row->id;
			$arrResults['firstname'] =  $row->firstname;
			$arrResults['lastname'] =  $row->lastname;
			$arrResults['mobile'] =  $row->mobile;
			$arrResults['gender'] =  $row->gender;
			$arrResults['email'] =  $row->email;
			$arrResults['password'] =  $row->password;
			$arrResults['date_of_birth'] =  $row->date_of_birth;
			$arrResults['city'] =  $row->city;
			$arrResults['hometown'] =  $row->hometown;
			$arrResults['aboutme'] =  $row->aboutme;
			$arrResults['profile_image'] =  $row->profile_image;
			$arrResults['comanyname'] =  $row->comanyname;
			$arrResults['userTypeId'] =  $row->userTypeId;
			$arrResults['verification_code'] =  $row->verification_code;
			$arrResults['status'] =  $row->status;
			$arrResults['createdon'] =  $row->createdon;
		}
	}
	$arrResults['rowcount'] = $rowcount;
	//pr($arrResults);die;
	return $arrResults;
}



function getAllMembers()
{
	$arrRows = array();
	$CI =& get_instance();
	$query =  $CI->db->query("SELECT * FROM tbl_members");
	foreach($query->result() as $row){
		$arrResults['id'] =  $row->id;
		$arrResults['firstname'] =  $row->firstname;
		$arrResults['lastname'] =  $row->lastname;
		$arrResults['mobile'] =  $row->mobile;
		$arrResults['gender'] =  $row->gender;
		$arrResults['email'] =  $row->email;
		$arrResults['password'] =  $row->password;
		$arrResults['date_of_birth'] =  $row->date_of_birth;
		$arrResults['city'] =  $row->city;
		$arrResults['hometown'] =  $row->hometown;
		$arrResults['aboutme'] =  $row->aboutme;
		$arrResults['profile_image'] =  $row->profile_image;
		$arrResults['comanyname'] =  $row->comanyname;
		$arrResults['userTypeId'] =  $row->userTypeId;
		$arrResults['verification_code'] =  $row->verification_code;
		$arrResults['status'] =  $row->status;
		$arrResults['createdon'] =  $row->createdon;
		$arrRows[] = $arrResults;
	}
	//pr($arrRows);die;
	return $arrRows;
}



function getFieldFromId($id, $field='*', $table=''){
	$CI =& get_instance();
	$row = $CI->db->select($field)
	->get_where($table,array('id' => $id))->row();
	//echo $CI->db->last_query();die;
	return is_object($row)?$row->page_title:false;

}

function getFieldFromUserId($id, $field='*', $table=''){
	$CI =& get_instance();
	$row = $CI->db->select($field)->get_where($table,array('id' => $id))->row();
	//echo $CI->db->last_query();die;	
	return is_object($row)?$row->username:false;
}




function getFieldByName($id,$field='*',$table='',$returnfield=''){
	$CI =& get_instance();
	$row = $CI->db->select($field)
		->get_where($table,array('id' => $id))->row();
	//echo $CI->db->last_query();die;
	return is_object($row)?$row->{$returnfield}:false;
}



function getCategoryData($id=0){
	$CI =& get_instance();
	$CI->db->select('*');
	$CI->db->from('tbl_categories');
	$CI->db->where('id',$id);
	$CI->db->where('is_active', '1');
	$rows = $CI->db->get()->result_array();
	return $rows;
}



function getGalleryImages($galleryid='',$gallery_type=''){
	$rows='';
	if($galleryid){
		$CI =& get_instance();
		$query = $CI->db->query("SELECT g.* FROM tbl_resi_corp_categories c
								join tbl_gallery g on c.id=g.categoryid
								where g.is_active = 1 and g.gallery_type='".$gallery_type."' and c.id = '".$galleryid."'
								order by g.priority ASC");
		$rows = $query->result_array();
	}
	return $rows;
}



function getFeaturesGallery($id=''){
	$rows='';
	if($id){
		$CI =& get_instance();
		$query = $CI->db->query("SELECT g.id,g.category_image FROM tbl_features f
								join tbl_gallery g on f.id=g.categoryid
								where g.is_active = 1 and g.gallery_type='feature' and f.id = '".$id."'
								order by g.id DESC");
		$rows = $query->result_array();
	}
	return $rows;

}



function handoversGallery($catid=0)

{

	$CI =& get_instance();
	$query = "SELECT g.id,g.banner_image,c.page_title FROM tbl_handover_categories c 
			join tbl_gallery g on c.id=g.categoryid 
				where g.is_active = 1 and g.gallery_type='home_gallery4' and c.id = '".$catid."'";
	$query .= " ORDER BY g.priority ASC";
	$result = $CI->db->query($query)->result_array();
	//echo 'query:'.$query;
	return $result;

}

function getIdBySlugName($slug,$table){
	$CI =& get_instance();
	$query = "SELECT id FROM $table where slug='".$slug."'";
	$result = $CI->db->query($query);
	$row = $result->row();
	return is_object($row)?$row->id:false;
}

function getSlugById($id,$table){
	$CI =& get_instance();
	$query = "SELECT slug FROM $table where id='".$id."'";
	$result = $CI->db->query($query);
	$row = $result->row();
	return is_object($row)?$row->slug:false;
}

function getCountries(){
	$CI =& get_instance();
	$CI->db->select('*');
	$CI->db->from('tbl_countries');
	$CI->db->where('id', 101);
	$query = $CI->db->get();
	//echo $CI->db->last_query();die;
	$cats = array();
	$cats[''] = "Select Country";
	foreach($query->result() as $row){
	  $cats[$row->id] =  ucfirst($row->name);
	}
	//pr($cats);die;
	return $cats;
}

function getStates($country_id=0){
	$CI =& get_instance();
	$CI->db->select('*');
	$CI->db->from('tbl_states');
	if($country_id){
		$CI->db->where('country_id', $country_id);
	}
	$query = $CI->db->get();
	//echo $CI->db->last_query();die;
	$cats = array();
	$cats[''] = "Select State";
	foreach($query->result() as $row){
	  $cats[$row->id] =  ucfirst($row->name);
	}
	return $cats;
}

function getCities($state_id=0){
	$CI =& get_instance();
	$CI->db->select('*');
	$CI->db->from('tbl_cities');
	if($state_id){
		$CI->db->where('state_id', $state_id);
	}
	$query = $CI->db->get();
	//echo $CI->db->last_query();die;
	$cats = array();
	$cats[''] = "Select City";
	foreach($query->result() as $row){
	  $cats[$row->id] =  ucfirst($row->name);
	}
	return $cats;
}


function GetTotalAdminuserDasboard()
   {
       {
		    $CI =& get_instance();
			$query = $CI->db->select('count(*) as TotalAdminuser');
			$CI->db->from('tbl_users');
			$CI->db->where('is_active','1');
			$query = $CI->db->get();
			//echo $CI->db->last_query();die;
			$arrCount = $query->result_array();
			$Active = isset($arrCount[0]['TotalAdminuser'])?$arrCount[0]['TotalAdminuser']:0; 
			return $Active;
		}
		return '';
		}	
		
function GetTotalcompanyDasboard()
   {
       {
		    $CI =& get_instance();
			$query = $CI->db->select('count(*) as TotalComapny');
			$CI->db->from('tbl_company');
			$CI->db->where('is_active','1');
			$query = $CI->db->get();
			//echo $CI->db->last_query();die;
			$arrCount = $query->result_array();
			$Active = isset($arrCount[0]['TotalComapny'])?$arrCount[0]['TotalComapny']:0; 
			return $Active;
		}
		return '';

		}	

function GetTotalwarehouseDasboard()
   {
       {
		    $CI =& get_instance();
			$query = $CI->db->select('count(*) as TotalWarehouse');
			$CI->db->from('tbl_warehouse');
			$CI->db->where('is_active','1');
			$query = $CI->db->get();
			//echo $CI->db->last_query();die;
			$arrCount = $query->result_array();
			$Active = isset($arrCount[0]['TotalWarehouse'])?$arrCount[0]['TotalWarehouse']:0; 
			return $Active;
		}
		return '';

		}				
 function SaveAuditLog($action='',$table='', $uname=0, $userAdmin=0){
		$CI =& get_instance();
		//echo ' ========== ';pr($arrLoginData);die;
		$data = array(
			'ip_address' => $_SERVER['REMOTE_ADDR'],
			'source' => $table,
			'sourceId' => $uname,
			'action' => $action,
			'log_userId'=>$userAdmin
		);
		$CI->db->insert('tbl_auditlog', $data);
		//echo $CI->db->last_query();die;
	}
	
	function GetAuditLog(){
	$CI =& get_instance();
	$query = "SELECT id , ip_address, log_userId,  ip_address, source, 
		sourceId, source_name, action, created_on 
		FROM tbl_auditlog order by id DESC limit 5";
	$result = $CI->db->query($query)->result_array();
	//echo 'query:'.$query;
	return $result;
	}	