<?php

class Homepage extends CI_Controller {
	
	function __construct(){
        parent::__construct();
        $this->load->model('homemod');
        $this->load->helper('text');
        $this->load->library('template');
	}
	
	function index(){
        $data['query'] = $this->homemod->getNews();
        $this->template->set_theme('always');
        $this->template->set_layout('home')
        ->title('AlwaysEveryday')
        ->build('showhome',$data);

        //recreate the url based on titles
        chdir('statics');
        file_put_contents('AlwaysEveryday.html', $this->output->get_output());
	}
}	
?>
