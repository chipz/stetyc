<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

	private $data;

	function __construct()
	{
		parent::__construct();
		$this->load->model('gallery_m','gallery');
	}
	
	function index()
	{
		$this->data['images'] = $this->gallery->imagesAll();
		
		$this->load->view('admin_view');
	}
}