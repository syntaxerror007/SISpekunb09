<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Spekun_rusak_model extends CI_Model {
		function __construct()
    		{
         		parent::__construct();
		}

		function getCountSpekunRusak()
		{

			$this->load->database();

			$query = $this->db->query('SELECT COUNT(*) FROM KERUSAKAN_SPEKUN');
			return $query;
			
			//return 12;
		}
		function getCountSpekunKembali()
		{
			return 124123;
		}
		function getAvgPinjam()
		{
			return 123;
		}
		function getSpekunPinjam()
		{
			return 23;
		}
	}


