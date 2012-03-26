<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Diskusi extends CI_Controller {
	
	private $data;

	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form','url'));
		$this->load->model('diskusi_m');
	}

	function index()
	{
		$comments = $this->diskusi_m->getcomments();
			
		$this->data['comments'] = $comments;
		$this->load->view('diskusitemp',$this->data);
	}
	
	function proses()
	{
		$this->load->helper('date');
		
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