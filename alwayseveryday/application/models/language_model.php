<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Language_model extends CI_Model{

    public function __construct(){
		//parent::Model();
	}
	
	function select_lang($lang) {
		$data = array(
			'lang' => $lang
		);
		$this->db->update('config',$data);
	}
}