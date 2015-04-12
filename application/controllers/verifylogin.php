<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class VerifyLogin extends CI_Controller {
	function index()
	{
		//This method will have the credentials validation
		$this->load->library('form_validation');

		$this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');

		if($this->form_validation->run() == FALSE)
		{
			$this->load->view('login_view');
		}
		else
		{
			redirect('home', 'refresh');
		}
	}

	function check_database()
	{
		//Field validation succeeded.  Validate against database
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		
		//query the database
		$result = $this->administrator_model->validate($username, $password);
		
		if($result->num_rows() != 0)
		{
			$sess_array = array(
				'username' => $result->result_array()[0]);
			$this->session->set_userdata('logged_in', $sess_array);
			redirect('home','refresh');
		}
		else
		{
			$this->form_validation->set_message('check_database', 'Invalid username or password');
			redirect('auth','refresh');
		}
	}
}
?>
