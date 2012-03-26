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