<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends CI_Controller {
	
	function index()
	{
		$this->load->helper(array('form'));
		$this->load->view('login_view');
	}
	
}

?>
