<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Statistik extends CI_Controller {
		public function statistik_kerusakan()
		{
			if($this->session->userdata('logged_in')){
				$Tanggal = date("d");
				$TanggalAwal = 1;
				$BulanAwal = 1;
				$Bulan = date("m");
				$Tahun = date("Y");
				$data['page_loc'] = "Statistik Kerusakan";
				
				$data['statistikMingguan'] = $this->kerusakan_spekun_model-> getStatistikKerusakanMingguan();

				$data['statistikBulanan'] = $this->kerusakan_spekun_model-> getStatistikKerusakanBulanan();

				$data['statistikTahunan'] = $this->kerusakan_spekun_model-> getStatistikKerusakanTahunan();

	                  
				$this->load->view('templates/header');
				$this->load->view('templates/navigation',$data);
				$this->load->view('statistikKerusakan_view',$data);
				$this->load->view('templates/footer',$data);
			}
			else
			{
				redirect('auth','refresh');
			}
		}

		public function statistik_peminjaman()
		{
			if($this->session->userdata('logged_in')){
				$Tanggal = date("d");
				$TanggalAwal = 1;
				$BulanAwal = 1;
				$Bulan = date("m");
				$Tahun = date("Y");
				$data['page_loc'] = "Statistik Peminjaman";
				
				$data['statistikMingguan'] = $this->peminjaman_model-> getStatistikPeminjamanMingguan();

				$data['statistikBulanan'] = $this->peminjaman_model-> getStatistikPeminjamanBulanan();

				$data['statistikTahunan'] = $this->peminjaman_model-> getStatistikPeminjamanTahunan();

				$data['statistikPeminjamanPerShelter'] = $this->peminjaman_model-> getCountPeminjamanByShelter();

				$this->load->view('templates/header');
				$this->load->view('templates/navigation',$data);
				$this->load->view('statistikPeminjaman_view',$data);
				$this->load->view('templates/footer',$data);
			}
			else
			{
				redirect('auth','refresh');
			}
		}
		
		public function statistik_shelter()
		{
			if($this->session->userdata('logged_in')){
				$Tanggal = date("d");
				$TanggalAwal = 1;
				$BulanAwal = 1;
				$Bulan = date("m");
				$Tahun = date("Y");
				$data['page_loc'] = "Statistik Kerusakan";
				
				$data['statistikMingguan'] = $this->kerusakan_spekun_model-> getStatistikKerusakanMingguan();

				$data['statistikBulanan'] = $this->kerusakan_spekun_model-> getStatistikKerusakanBulanan();

				$data['statistikTahunan'] = $this->kerusakan_spekun_model-> getStatistikKerusakanTahunan();

	                  
				$this->load->view('templates/header');
				$this->load->view('templates/navigation',$data);
				$this->load->view('statistikShelter_view.php',$data);
				$this->load->view('templates/footer',$data);
			}
			else
			{
				redirect('auth','refresh');
			}
		}

	}
?>