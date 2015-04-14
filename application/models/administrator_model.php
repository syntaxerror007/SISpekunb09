<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class administrator_Model extends CI_Model
{
        public $table = 'ADMINISTRATOR';

        public function validate($username,$password)
        {
			$this->db->select('username');
			$this->db->where('username',$username);
			$this->db->where('password',$password);
			return $this->db->get($this->table);
        }

        public function login($username, $password) {
			$this->db->where('username', $username);
			$this->db->where('password', $password);
			$this->db->limit(1);
			$query = $this->db->get($this->table);
			return ($query->num_rows() == 1) ? $query->result() : false;
        }
		
		public function validate(){
			// grab user input
			$username = $this->security->xss_clean($this->input->post('username'));
			$password = $this->security->xss_clean($this->input->post('password'));
			
			// Prep the query
			$this->db->where('username', $username);
			$this->db->where('password', $password);
			
			// Run the query
			$query = $this->db->get($this->table);
			// Let's check if there are any results
			if($query->num_rows == 1)
			{
				// If there is a user, then create session data
				$row = $query->row();
				$data = array(
						'username' => $row->username,
						'password' => $row->password,
						'logged_in' => true
						);
				$this->session->set_userdata($data);
				return true;
			}
			// If the previous process did not validate
			// then return false.
			return false;
		
		}

        
}
?>

