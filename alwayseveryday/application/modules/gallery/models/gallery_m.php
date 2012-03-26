<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gallery_m extends CI_Model {

	var $table = 'discuss';
    
	function __construct ()
	{
		parent::__construct();
	}
	
	function imagesAll()
	{
		return 'fajr';
	}
}
?>