<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Everydaycorner extends CI_Controller {
	
	private $data;

	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form','url'));
		$this->load->model('diskusi_m');
		$this->load->model('authetification/ion_auth_model');
		$this->load->library('session');
		$this->load->library('template');
		$this->load->library('ion_auth');
	}
	
	function index(){
		$this->data['messages'] = $this->diskusi_m->getmessages();
		$this->data['comments'] = $this->diskusi_m->getnewcomments();
		
		$this->template->set_theme('always');
		$this->template->set_layout('default')
						->set_partial('metadata','partials/metadata')
						->title('AlwaysEveryday - Pojok')
						->build('everydaycorner_view',$this->data); 
	}
	
	function proses()
	{
		$this->load->helper('date');
		
		$this->session->set_userdata('username', $this->input->post('username'));
		
		$datestring = "%Y-%m-%d";
		$time = time();

		$now = mdate($datestring, $time);
		$username = $this->input->post('username');
		$comment = $this->input->post('comment');
		$inreply = $this->input->post('inreply');
		
		$me = array(
			'date' => $now,
			'user' => $username,
			'comment' => $comment,
			'inreply' => $inreply
		);
		
		$this->diskusi_m->insert($me);
		redirect('/pojoked/diskusi/','refresh');
	}
	
	function reply($id)
	{
		$this->data['comments'] = $this->diskusi_m->getcomments();
		$this->data['idtoreply'] = $id;
		
		$this->load->view('diskusitemp',$this->data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */