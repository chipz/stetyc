<?php

class Post extends CI_Controller {
	
	function __construct(){
	parent::__construct();
	$this->load->model('postmod');
	}
	
	function index(){
	$data['query'] = $this->postmod->getData();
	$this->load->view('showpost',$data);
	}
	
	function postinsert(){
	$data['query'] = $this->postmod->getData();
	$this->load->view('post_input',$data);
	}
	
	function look(){
	$data['query'] = $this->postmod->getData();
	$this->load->view('post_edit',$data);
	}
	
	function submit(){
	if ($this->input->post('submit')){
		if ($this->input->post('id')){
		$this->postmod->update();
		redirect('/post/look','refresh');
		}else{
		$this->postmod->save();
		redirect('/post/look','refresh');
		}
		}
	}

	function delete($id){
	$this->db->delete('content', array('id' => $id));
	redirect('/post/look','refresh'); 
	}
	
	function edit($id){
	$query          = $this->postmod->get($id);
	$data['fid']    = $query['id'];
	$data['fauthor'] = $query['author'];
	$data['ftitle'] = $query['title'];
	$data['fposting']= $query['posting'];
	$this->load->view('post_ed',$data);
	}
}

?>
