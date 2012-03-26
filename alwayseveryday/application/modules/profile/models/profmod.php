<?php
class Profmod extends CI_Model{
	function __construct ()
	{
		parent::__construct();
	}
	
	function save($lang = id)
	{
		$author = $this->input->post('author');
		$name = $this->input->post('name');
		$content = $this->input->post('content');
		$pic_url = $this->input->post('pic_url');
		$data = array(
			'author'=>$author,
			'name'=>$name,
			'content'=>$content,
			'pic_url'=>$pic_url
		);
		if ($lang == "id"){
		$this->db->insert('profile',$data);
		} elseif ($lang == "en"){
		$this->db->insert('profile_en',$data);
		}
	}

	function getData($lang = id)
	{
		$this->db->order_by('id','DESC');
		$this->db->limit(1);
		if ($lang == "id"){
			$query = $this->db->get('profile');
		} elseif ($lang == "en") {
			$query = $this->db->get('profile_en');
		}
		return $query->result();
	}

	function get($id,$lang){
		$this->db->where('id', $id);
		$this->db->limit(1);
		if ($lang == "id"){
			$query = $this->db->get('profile');
		} elseif ($lang == "en") {
			$query = $this->db->get('profile_en');
		}
		return $query->row_array();
	}
	
	function getList($lang = id)
        {
                $this->db->order_by('id','DESC');
                if ($lang == "id"){
					$query = $this->db->get('profile');
				} elseif ($lang == "en") {
					$query = $this->db->get('profile_en');
				}
                return $query->result();
        }

	function update($lang = id)
	{
	$id  = $this->input->post('id');
	$author = $this->input->post('author');
	$name = $this->input->post('name');
	$content = $this->input->post('content');
	$pic_url = $this->input->post('pic_url');
	$data = array(
	'author'=>$author,
	'name'=>$name,
	'content'=>$content,
	'pic_url'=>$pic_url
	);
	$this->db->where('id', $id);
	if ($lang == "id"){
		$this->db->update('profile',$data);
	} elseif ($lang == "en"){
		$this->db->update('profile_en',$data);
	}

	}
	
	function delete($id,$lang)
	{
	$this->db->where('id', $id);
	$this->db->limit(1);
	if ($lang == "id"){
		$this->db->delete('profile', array('id' => $id));
	} elseif ($lang == "en") {
		$this->db->delete('profile_en', array('id' => $id));
	}
	}
 
} 

?>
