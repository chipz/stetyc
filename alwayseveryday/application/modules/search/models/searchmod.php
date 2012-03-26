<?php
class Searchmod extends CI_Model{
	function __construct ()
	{
		parent::__construct();
	}
  
	function find($lang = id)
	{
	$match = $this->input->post('search');
	$this->db->like('posting',$match);
	if ($lang == "id"){
	$query = $this->db->get('news');
	} elseif ($lang == "en") {
	$query = $this->db->get('news_en');
	}
	return $query->result();
	}
}
?>