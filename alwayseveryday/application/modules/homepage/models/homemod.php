<?php
class Homemod extends CI_Model{
	function __construct ()
	{
		parent::__construct();
	}
	
	function getNews()
	{
		$this->db->order_by('id','DESC');
		$this->db->limit(1);
		$this->db->select('id,posting');
		$query = $this->db->get('news');
		return $query->result();
	}
} 

?>