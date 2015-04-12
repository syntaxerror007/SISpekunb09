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

        public function login($username, $password) {
                $this->db->where('username', $username);
                $this->db->where('password', $password);
                $this->db->limit(1);
                $query = $this->db->get($this->table);
                return ($query->num_rows() > 0) ? $query->row() : false;
        }

        public function get_account($username)
        {
                $this->db->where('username',$username);
                return $this->db->get($this->table);
        }
}
?>

