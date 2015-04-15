<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends CI_Controller {
	
	function index()
	{
		//$data['msg'] = $msg;
		if($this->session->userdata('logged_in')){
			redirect('home','refresh');
		}
		else
		{
			$data['error_message'] = $this->session->userdata('error_message');
			$this->session->unset_userdata('error_message');
			$this->load->helper(array('form'));
			$this->load->view('login_view',$data);
		}
	}
	function logout()
	{
		$this->session->unset_userdata('logged_in');
		redirect('auth','refresh');
	}
}

?>
