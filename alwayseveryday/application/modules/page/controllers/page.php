<?php

class Page extends CI_Controller {
	
	function __construct(){
	parent::__construct();
	$this->load->model('authetification/ion_auth_model');
	$this->load->library('ion_auth');
	$this->load->library('session');
	$this->load->model('pagemod');
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

    public function _remap($method, $params = array())
    {
        if(method_exists($this, $method))
        {
            return call_user_func_array(array($this, $method), $params);
        }
        elseif(in_array($method, $this->pagemod->get_all_ids())) {
            //dikasih cek, apakah ada id tersebut
            //kalo gak ada di return 404
            //lakukan pengecekan juga untuk 'edit' :P
            //$params[1] = $params[0];
            //$params[0] = $method;
            array_unshift($params, $method);
            return call_user_func_array(array($this, 'viewpage'), $params);
        } else {
            show_404();
        }
    }
	function index(){
        $data['query'] = $this->pagemod->getData($this->_language());
        $this->load->view('showpage',$data);
	}
	
	function viewpage($id, $overwrite = NULL){
        $query = $this->pagemod->get($id,$this->_language());
        $data['fpage_title']    = $query['page_title'];
        $data['fauthor'] = $query['author'];
        $data['ftitle'] = $query['title'];
        $data['fpage_content']= $query['page_content'];
        $this->template->set_theme('always');
        $this->template->set_layout('default')
        ->title('AlwaysEveryday')
        ->build('showpage',$data);

        if($overwrite == 'overwrite') {
            //recreate the url based on titles
            $new_url = str_replace(" ","-",$query['title']);
            //change directory before write
            chdir('statics');
            file_put_contents($new_url.'.html', $this->output->get_output());
        }
	}

	function pageinsert(){
	if (!$this->ion_auth->logged_in())
		{
			//redirect them to the login page
			redirect('/auth/login', 'refresh');
		}
		elseif (!$this->ion_auth->is_admin())
		{
			//redirect them to the home page because they must be an administrator to view this
			redirect($this->config->item('/page/pageinsert'), 'location');
		}
		else
		{
			//set the flash data error message if there is one
			$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

			$data['query'] = $this->pagemod->getData($this->_language());
			$this->load->view('page_input',$data);
		}
	}
	
	function submit(){
	if ($this->input->post('submit')){
		if ($this->input->post('id')){
            $this->pagemod->update($this->_language());
            redirect('/page/'.$this->input->post('id').'/overwrite','location');
		}else{
            $this->pagemod->save($this->_language());
            redirect('/page/','location');
		}
		}
	}

	function delete($id){
        $this->pagemod->delete($id,$this->_language());
        redirect('/page/look','refresh'); 
	}
	
	function edit($id = NULL){
        if($id == NULL) {
            if (!$this->ion_auth->logged_in())
                {
                    //redirect them to the login page
                    redirect('/auth/login', 'refresh');
                }
                elseif (!$this->ion_auth->is_admin())
                {
                    //redirect them to the home page because they must be an administrator to view this
                    redirect($this->config->item('/page/look'), 'refresh');
                }
                else
                {
                    //set the flash data error message if there is one
                    $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

                    $data['query'] = $this->pagemod->getData($this->_language());
                    $this->load->view('page_edit',$data);
                }
        } else {
            if (!$this->ion_auth->logged_in())
                {
                    //redirect them to the login page
                    redirect('/auth/login', 'refresh');
                }
                elseif (!$this->ion_auth->is_admin())
                {
                    //redirect them to the home page because they must be an administrator to view this
                    redirect($this->config->item('/page/edit'), 'refresh');
                }
                else
                {
                    //set the flash data error message if there is one
                    $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

                    $query          = $this->pagemod->get($id, $this->_language());
                    $data['fid']    = $query['id'];
                    $data['fpage_title']    = $query['page_title'];
                    $data['fauthor'] = $query['author'];
                    $data['ftitle'] = $query['title'];
                    $data['fpage_content']= $query['page_content'];
                    $this->load->view('page_ed',$data);
                }
        }
	}
}

?>
