<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class m_admin extends CI_Model{
 
  private $tbl_member_log =  'tbl_member_log';
  private $tbl_members =  'tbl_members';
  function __construct(){
		parent::__construct();
  }
  
  function login($email, $password)
  {
     $this -> db -> select('*');
     $this -> db -> from('tbl_members');
     $this -> db -> where('email', $email);
     $this -> db -> where('password', SHA1($password));
     $this -> db -> where('status',1);
     $this -> db -> limit(1);

     $query = $this -> db -> get();
     //echo $this->db->last_query();die;
     $userResult = $query->result();
     if($query -> num_rows() == 1)
     {
       //$this->createLog($userResult[0]->id);
       return $query->result();
     }
     else
     {
       return false;
     }
 }
 
  function createLog($userId){
  	$data = array(
  		'log_userId' => $userId,
  		'log_in' => date('Y-m-d h:i:s a',time()),
  		'log_ip' => $_SERVER['REMOTE_ADDR']
  	);
  	$this->db->insert('tbl_member_log',$data);
  }
  
	function logoutTime($userId){
		$this->db->order_by('log_id','DESC');
		$this->db->limit(1);
		$this->db->update($this->tbl_member_log,array('log_out'=>date('Y-m-d h:i:s a',time())),array('log_userId'=>$userId));
	}
}
//End of class m_breakage