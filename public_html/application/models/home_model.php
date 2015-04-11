<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Home_model extends CI_Model {
		function __construct()
    		{
         		parent::__construct();
		}

		function getCountSpekunRusak()
		{
			
			$query = $this->db->query('SELECT * FROM KERUSAKAN_SPEKUN');
			
			//$res = $this->db->query('SELECT COUNT(*) FROM .$query.');
			return $query->num_rows();
			//return 56;
			
		}
		function getCountSpekunKembali()
		{
			$query = $this->db->query('SELECT * FROM PEMINJAMAN WHERE Status = "1"'); 			
			return $query->num_rows();
			//return 124123;
		}
		function getAvgPinjam()
		{
			return 123;
		}
		function getSpekunPinjam()
		{
			$query = $this->db->query('SELECT * FROM PEMINJAMAN WHERE Status IS NULL');
			return $query->num_rows();			
//return 23;
		}
	}


