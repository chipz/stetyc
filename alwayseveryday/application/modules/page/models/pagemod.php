<?php
class Pagemod extends CI_Model{
	function __construct ()
	{
		parent::__construct();
	}
	
	function save($lang = id)
	{
		$page_title = $this->input->post('page_title');
		$author = $this->input->post('author');
		$title = $this->input->post('title');
		$page_content = $this->input->post('page_content');
		$data = array(
			'page_title'=>$page_title,
			'author'=>$author,
			'title'=>$title,
			'page_content'=>$page_content
		);
		if ($lang == "id"){
		$this->db->insert('page',$data);
		} elseif ($lang == "en"){
		$this->db->insert('page_en',$data);
		}
	}

	function getData($lang = id)
	{
		$this->db->order_by('id','ASC');
		if ($lang == "id"){
			$query = $this->db->get('page');
		} elseif ($lang == "en") {
			$query = $this->db->get('page_en');
		}
		return $query->result();
	}

	function get($id,$lang){
		$this->db->where('id', $id);
		$this->db->limit(1);
		if ($lang == "id"){
			$query = $this->db->get('page');
		} elseif ($lang == "en") {
			$query = $this->db->get('page_en');
		}
		return $query->row_array();
	}

	function update($lang = id)
	{
	$id  = $this->input->post('id');
	$page_title = $this->input->post('page_title');
	$author = $this->input->post('author');
	$title = $this->input->post('title');
	$page_content = $this->input->post('page_content');
	$data = array(
	'page_title'=>$page_title,
	'author'=>$author,
	'title'=>$title,
	'page_content'=>$page_content
	);
	$this->db->where('id', $id);
	if ($lang == "id"){
	  $this->db->update('page',$data);
	  } elseif ($lang == "en"){
	  $this->db->update('page_en',$data);
	  }
	}
	
	function delete($id,$lang)
	{
	$this->db->where('id', $id);
	$this->db->limit(1);
	if ($lang == "id"){
		$this->db->delete('page', array('id' => $id));
	} elseif ($lang == "en") {
		$this->db->delete('page_en', array('id' => $id));
	}
	}

    function get_all_ids($lang = 'id')
    {
       // $this->db->select('id'); //select only id
        if ($lang == 'id'){ //define lang
            $query = $this->db->get('page');
        } elseif($lang == 'en') {
            $query = $this->db->get('page_en');
        }

        $ids = array();
        foreach($query->result() as $row)
        {
            $ids[] = $row->id;
        }

        $query->free_result();

        return $ids;

    }
} 

?>
