<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Laporan extends CI_Controller {
		public function formulir()
		{
			$this->load->view('templates/header');
			$this->load->view('templates/navigation');
			$this->load->view('formulir_view');
			$this->load->view('templates/footer');
		}
		

	}
?>