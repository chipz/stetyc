<?php

class Admin extends CI_Controller{
	
	function __construct()
	{
		parent::__construct();
		
		$this->load->helper(array('url','form'));
	}
	
	function index()
	{
		$this->load->view('welcome_message');
	}
	
	public function item()
	{
		if(isset($_POST['new_upload'])){
				$table = $this->uri->segment(3);
				$parent_id = $this->uri->segment(4);
				$company_id = $this->project_model->get_company_id($parent_id);
				$data['user_id'] = $this->session->userdata['user_id'];
				
				
				$upload_results = $this->do_upload();
				if (isset($upload_results['error'])){
						echo $upload_results['error'];
				} else {
					$data['name'] = $_POST['name'] != "" ? $_POST['name'] : $upload_results['upload_data']['file_name'];
					$data['file_name'] = $upload_results['upload_data']['file_name'];
					$data['file_size'] = $upload_results['upload_data']['file_size'];
					$data['file_ext'] = $upload_results['upload_data']['file_ext'];
					$data['item_type_id'] = 2; //upload = 2

					$email = array($data['item_type_id'],$data['name'],$data['file_name'],$data['file_size'],$data['file_ext']);
				}
		}
	}
	
	private function do_upload()
	{
		$config['upload_path'] = './public/uploads/';
		$config['allowed_types'] = 'ppt|gif|jpg|png|csv|doc|pdf|zip|gzip|xls|txt';
		$config['max_size'] = 0;
		$config['max_width'] = 0;
		$config['max_height'] = 0;

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload())
		{
			$data = array('error' => $this->upload->display_errors());
		}	
		else
		{
			$data = array('upload_data' => $this->upload->data());
		}
		return $data;
	}
}
?>