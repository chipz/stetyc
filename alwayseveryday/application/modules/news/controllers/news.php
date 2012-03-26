<?php

class News extends CI_Controller {
	
	function __construct(){
	parent::__construct();
	$this->load->model('authetification/ion_auth_model');
	$this->load->library('ion_auth');
	$this->load->library('session');
	$this->load->model('newsmod');
	$this->load->helper('text');
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
        elseif(in_array($method, $this->newsmod->get_all_ids())) {
            //dikasih cek, apakah ada id tersebut
            //kalo gak ada di return 404
            //lakukan pengecekan juga untuk 'edit' :P
            //$params[1] = $params[0];
            //$params[0] = $method;
            array_unshift($params, $method);
            return call_user_func_array(array($this, 'viewnews'), $params);
        } else {
            show_404();
        }
    }

	
	function index(){
        $this->load->library('pagination');
        $config['base_url'] = site_url("/news/index/");
        $config['total_rows'] = $this->newsmod->count($this->_language());
        $config['per_page'] = '3'; 
        $this->pagination->initialize($config);

        $data['query'] = $this->newsmod->getData($this->_language(),$config['per_page'],$this->uri->segment(3));
        $this->template->set_theme('always');
        $this->template->set_layout('default')
        ->title($this->config->item('site_title').' - News')
        ->build('shownews',$data);

        //recreate the url based on titles
        //$new_url = str_replace(" ","-",$query['title']);
        //change directory before write
        chdir('statics');
        file_put_contents('News.html', $this->output->get_output());
	}


	function viewnews($id, $overwrite = NULL){
        $query = $this->newsmod->get($id, $this->_language());
        $data['fid'] = $query['id'];
        $data['fdate'] = $query['date'];
        $data['fauthor'] = $query['author'];
        $data['ftitle'] = $query['title'];
        $data['fposting']= $query['posting'];
        $data['url'] = str_replace(" ","-",$query['title']);
        $this->template->set_theme('always');
        $this->template->set_layout('default')
        ->title($this->config->item('site_title').' - '.$query['title'])
        ->build('showsingle',$data);

        if($overwrite == 'overwrite') {
            //recreate the url based on titles
            $new_url = str_replace(" ","-",$query['title']);
            //change directory before write
            chdir('statics');
            file_put_contents($new_url.'.html', $this->output->get_output());
        }
	}

	function newsinsert(){
	if (!$this->ion_auth->logged_in())
		{
			//redirect them to the login page
			redirect('/auth/login', 'refresh');
		}
		elseif (!$this->ion_auth->is_admin())
		{
			//redirect them to the home page because they must be an administrator to view this
			redirect($this->config->item('/news/newsinsert'), 'refresh');
		}
		else
		{
			//set the flash data error message if there is one
			$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

            $data['query'] = $this->newsmod->getIns($this->_language());
            $this->load->view('news_input',$data);
		}
	}
	
	function submit(){
	if ($this->input->post('submit')){
            if ($this->input->post('id')){
                $this->newsmod->update($this->_language());
                redirect('news/'.$this->input->post('id').'/overwrite','location');
            }else{
                $this->newsmod->save($this->_language());
                redirect('news','location');
            }
		}
	}

	function delete($id){
        $this->newsmod->delete($id,$this->_language());
        redirect('/news','refresh'); 
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
                    redirect($this->config->item('/news'), 'refresh');
                }
                else
                {
                    //set the flash data error message if there is one
                    $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

                    $data['query'] = $this->newsmod->getList($this->_language());
                    $this->load->view('news_edit',$data);
                }
        }
        else {
            if (!$this->ion_auth->logged_in())
                {
                    //redirect them to the login page
                    redirect('/auth/login', 'refresh');
                }
                elseif (!$this->ion_auth->is_admin())
                {
                    //redirect them to the home page because they must be an administrator to view this
                    redirect($this->config->item('/news/edit'), 'refresh');
                }
                else
                {
                    //set the flash data error message if there is one
                    $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

                    $query          = $this->newsmod->get($id, $this->_language());
                    $data['fid']    = $query['id'];
                    $data['fauthor'] = $query['author'];
                    $data['ftitle'] = $query['title'];
                    $data['fposting']= $query['posting'];
                    $this->load->view('news_ed',$data);
                }
            }
        }
}

?>
