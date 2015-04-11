<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class administrator_Model extends CI_Model 
	{
		public $table = 'Administrator';
		
		public function validate($username,$password)
		{
			$this->db->where('username',$username);
			$this->db->where('password',$password);
			$this->db->from($this->table);
			return $this->db->count_all_results() != 0;
		}
	}	
?>