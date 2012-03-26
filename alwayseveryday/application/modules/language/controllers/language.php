<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Language extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->helper('url');
	}
	
	function select($lang){
		$session = array(
			'lang' => $lang
		);
		
		$this->session->set_userdata($session);
		
		if (isset($_SERVER['HTTP_REFERER']))
		{
			redirect($_SERVER['HTTP_REFERER']);
		}
		else
		{
			redirect(base_url());
		}
	}
}