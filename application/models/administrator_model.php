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

        
}
?>

