<?php
class Newsmod extends CI_Model{
	function __construct ()
	{
		parent::__construct();
	}
	
	function save($lang = 'id')
	{
		$author = $this->input->post('author');
		$title = $this->input->post('title');
		$posting = $this->input->post('posting');
		$date = time();
		$data = array(
			'author'=>$author,
			'title'=>$title,
			'posting'=>$posting,
			'date'=>$date
		);
		if ($lang == "id"){
		$this->db->insert('news',$data);
		} elseif ($lang == "en"){
		$this->db->insert('news_en',$data);
		}
	}

	function getData($lang = 'id',$num,$offset)
	{
		$this->db->order_by('id','DESC');
		//$this->db->limit(3);
		if ($lang == "id"){
			$query = $this->db->get('news', $num , $offset);
		} elseif ($lang == "en") {
			$query = $this->db->get('news_en', $num , $offset);
		}
		return $query->result();
	}
	
	function getIns($lang = 'id')
	{
		$this->db->order_by('id','DESC');
		if ($lang == "id"){
			$query = $this->db->get('news');
		} elseif ($lang == "en") {
			$query = $this->db->get('news_en');
		}
		return $query->result();
	}

	function getList($lang = 'id')
        {
            $this->db->order_by('id','DESC');
            if ($lang == "id"){
                $query = $this->db->get('news');
            } elseif ($lang == "en") {
                $query = $this->db->get('news_en');
            }
            return $query->result();
        }

	function get($id,$lang){
		$this->db->where('id', $id);
		$this->db->limit(1);
		if ($lang == "id"){
			$query = $this->db->get('news');
		} elseif ($lang == "en") {
			$query = $this->db->get('news_en');
		}
		return $query->row_array();
	}

	function update($lang = 'id')
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
        if ($lang == "id"){
            $this->db->update('news',$data);
        } elseif ($lang == "en"){
            $this->db->update('news_en',$data);
        }
	}
	
	function delete($id,$lang)
	{
	$this->db->where('id', $id);
	$this->db->limit(1);
	if ($lang == "id"){
		$this->db->delete('news', array('id' => $id));
	} elseif ($lang == "en") {
		$this->db->delete('news_en', array('id' => $id));
	}
	}
	
	function count($lang = 'id')
    {
		if ($lang == "id"){
		return $this->db->count_all_results('news');
		} elseif ($lang == "en"){
		return $this->db->count_all_results('news_en');
		}
    }

    function get_all_ids($lang = 'id')
    {
       // $this->db->select('id'); //select only id
        if ($lang == 'id'){ //define lang
            $query = $this->db->get('news');
        } elseif($lang == 'en') {
            $query = $this->db->get('news_en');
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
