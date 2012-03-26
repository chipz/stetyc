<?php
class Postmod extends CI_Model{
	function __construct ()
	{
		parent::__construct();
	}
	
	function save()
	{
		$author = $this->input->post('author');
		$title = $this->input->post('title');
		$posting = $this->input->post('posting');
		$data = array(
			'author'=>$author,
			'title'=>$title,
			'posting'=>$posting
		);
		$this->db->insert('content',$data);
	}

	function getData()
	{
		$this->db->order_by('id','ASC');
		$query = $this->db->get('content');
		return $query->result();
	}

	function get($id){
		$this->db->where('id', $id);
		$this->db->limit(1);
		$query = $this->db->get('content');
		return $query->row_array();
	}

	function update()
	{
	$id  = $this->input->post('id');
	$author = $this->input->post('author');
	$title = $this->input->post('title');
	$posting = $this->input->post('posting');
	$data = array(
	'author'=>$author,
	'title'=>$title,
	'posting'=>$posting
	);
	$this->db->where('id', $id);
	$this->db->update('content',$data);
	}
 
} 

?>
