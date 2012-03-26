<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gallery extends CI_Controller {

	private $data;

	function __construct()
	{
		parent::__construct();
		$this->load->model('gallery_m','gallery');
		$this->load->library('template');
		$this->load->library('firephp');
	}
	
	function index()
	{
		$this->data['images'] = $this->gallery->imagesAll();
	
		$this->template->set_theme('always');
		$this->template->set_layout('default')
						->set_partial('metadata','partials/metadata')
						->title('AlwaysEveryday - Gallery')
						->build('gallery_view',$this->data); 
	}
	
	function testing()
	{
		$data['ip'] = $this->input->ip_address();
		$this->template->set_theme('always');
           $this->template->set_layout('default')
                           ->title('alohaaaaa')
                           ->build('gal',$data);
		$this->firephp->log($this->template);
	}
}
