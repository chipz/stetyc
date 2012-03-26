<?php

class Profile extends CI_Controller {
	
	function __construct(){
	parent::__construct();
	$this->load->model('authetification/ion_auth_model');
	$this->load->library('ion_auth');
	$this->load->library('session');
	$this->load->model('profmod');
	$this->load->library('template');
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

	function index(){
	$data['query'] = $this->profmod->getData($this->_language());
	$this->template->set_theme('always');
	$this->template->set_layout('default')
	->title('AlwaysEveryday')
	->build('showprof',$data);

    //change directory before write
    chdir('statics');
    file_put_contents('profile.html', $this->output->get_output());
	}
	
	function profindex($id){
	$query = $this->profmod->get($id,$this->_language());
	$data['fname']    = $query['name'];
	$data['fcontent'] = $query['content'];
	$data['fpic_url'] = $query['pic_url'];
		$this->template->set_theme('always');
	$this->template->set_layout('default')
	->title('AlwaysEveryday')
	->build('showsingle',$data);
	}
	
	function profinsert(){
	if (!$this->ion_auth->logged_in())
		{
			//redirect them to the login page
			redirect('/auth/login', 'refresh');
		}
		elseif (!$this->ion_auth->is_admin())
		{
			//redirect them to the home page because they must be an administrator to view this
			redirect($this->config->item('/profile/profinsert'), 'refresh');
		}
		else
		{
			//set the flash data error message if there is one
			$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

			$data['query'] = $this->profmod->getData($this->_language());
			$this->load->view('prof_input',$data);
		}
	}
	
	function look(){
	if (!$this->ion_auth->logged_in())
		{
			//redirect them to the login page
			redirect('/auth/login', 'refresh');
		}
		elseif (!$this->ion_auth->is_admin())
		{
			//redirect them to the home page because they must be an administrator to view this
			redirect($this->config->item('/profile/look'), 'refresh');
		}
		else
		{
			//set the flash data error message if there is one
			$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

			$data['query'] = $this->profmod->getList($this->_language());
			$this->load->view('prof_edit',$data);
		}
	}
	
	function submit(){
	if ($this->input->post('submit')){
		if ($this->input->post('id')){
		$this->profmod->update($this->_language());
		redirect('/profile/look','refresh');
		}else{
		$this->profmod->save($this->_language());
		redirect('/profile/look','refresh');
		}
		}
	}

	function delete($id){
	$this->profmod->delete($id,$this->_language());
	redirect('/profile/look','refresh'); 
	}
	
	function edit($id){
	if (!$this->ion_auth->logged_in())
		{
			//redirect them to the login page
			redirect('/auth/login', 'refresh');
		}
		elseif (!$this->ion_auth->is_admin())
		{
			//redirect them to the home page because they must be an administrator to view this
			redirect($this->config->item('/profile/edit'), 'refresh');
		}
		else
		{
			//set the flash data error message if there is one
			$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

			$query          = $this->profmod->get($id,$this->_language());
			$data['fid']    = $query['id'];
			$data['fauthor'] = $query['author'];
			$data['fname'] = $query['name'];
			$data['fcontent'] = $query['content'];
			$data['fpic_url'] = $query['pic_url'];
			$this->load->view('prof_ed',$data);
		}
	}
}

?>
