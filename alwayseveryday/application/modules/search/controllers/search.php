<?php

class Search extends CI_Controller {
	
	function __construct(){
	parent::__construct();

	$this->load->helper('form');
	$this->load->helper('text');
	$this->load->model('searchmod');
	$this->load->library('template');
	$this->load->library('session');
	}

	function _language(){
		$lang = $this->session->userdata('lang');
		if($lang) {
			return $lang;
		} else {
			$language = array(
                   'lang' => 'id'
               );
			$this->session->set_userdata($language);
			return $language['lang'];
		}
	}

	function find()
	{
	$data['query'] = $this->searchmod->find($this->_language());
	$this->template->set_theme('always');
	$this->template->set_layout('default')
	->title('AlwaysEveryday')
	->build('search_view',$data);
	}

}

?>