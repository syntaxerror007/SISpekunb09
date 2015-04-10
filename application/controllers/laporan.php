<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Laporan extends CI_Controller {
		public function kerusakan()
		{
			$this->load->view('templates/header');
			$this->load->view('templates/navigation');
			$this->load->view('laporanKerusakan_view');
			$this->load->view('templates/footer');
		}
		public function peminjaman()
		{
			$this->load->view('templates/header');
			$this->load->view('templates/navigation');
			$this->load->view('laporanPeminjaman_view');
			$this->load->view('templates/footer');
		}

	}
?>