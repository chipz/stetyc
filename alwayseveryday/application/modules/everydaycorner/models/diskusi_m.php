<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Diskusi_m extends CI_Model {

	var $table = 'discuss';
    
    public function __construct(){
		//parent::Model();
	}
  
	function getcomments()
	{
		$query = $this->db->get($this->table);
		
		$i=0;
		$comments['totalquery'] = $query->num_rows();
		while($i < $comments['totalquery'])
		{
			$row = $query->row_array($i);
			$comments[$i]['id'] = $row['id'];
			$comments[$i]['user'] = $row['user'];
			$comments[$i]['comment'] = $row['comment'];
			$comments[$i]['inreply'] = $row['inreply'];
			$i++;
		}
		
		return $comments;
	}
	
	function getmessages()
	{
		$this->db->order_by('msg_id','desc');
		$query = $this->db->get('messages');
		
		//tobe selected msg_id 	message
		$i=0;
		$messages['totalquery'] = $query->num_rows();
		while($i < $messages['totalquery'])
		{
			$row = $query->row_array($i);
			$messages[$i]['msg_id'] = $row['msg_id'];
			$messages[$i]['messages'] = $row['message'];
			$messages[$i]['username'] = $row['username'];
			$i++;
		}
		return $messages;
	}
	
	function getnewcomments()
	{
		$query = $this->db->get('comments');
		
		//tobe selected com_id 	comment 	msg_id_fk
		$i=0;
		$comments['totalquery'] = $query->num_rows();
		while($i < $comments['totalquery'])
		{
			$row = $query->row_array($i);
			$comments[$i]['com_id'] = $row['com_id'];
			$comments[$i]['comment'] = $row['comment'];
			$comments[$i]['msg_id_fk'] = $row['msg_id_fk'];
			$comments[$i]['user'] = $row['user'];
			$i++;
		}
		
		return $comments;
	}
	
	function insert($me)
	{	
		$this->db->insert('discuss',$me);
	}
	
	function selectinreplyto($id)
	{
		$sql = "SELECT * FROM discuss WHERE id = ?";
		$inreplyto = $this->db->query($sql, array($id));
		
		return $inreplyto;
	}
}
?>