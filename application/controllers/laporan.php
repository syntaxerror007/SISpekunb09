<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Laporan extends CI_Controller {
		public function index()
		{
			if($this->session->userdata('logged_in')){
				$Tanggal = date("d");
				$TanggalAwal = 1;
				$BulanAwal = 1;
				$Bulan = date("m");
				$Tahun = date("Y");
				$data['daftarPeminjaman'] = $this->peminjaman_model-> getDaftarSpekunKembali();
				$data['page_loc'] = "Laporan Peminjaman";

				$this->load->view('templates/header');
				$this->load->view('templates/navigation', $data);
				$this->load->view('laporanPeminjaman_view', $data);
				$this->load->view('templates/footer');
			}
            else{
                    redirect('auth', 'refresh');
            }
		}
		public function Kerusakan()
		{
			if($this->session->userdata('logged_in')){
				$Tanggal = date("d");
				$TanggalAwal = 1;
				$BulanAwal = 1;
				$Bulan = date("m");
				$Tahun = date("Y");
				$data['daftarKerusakanSpekun'] = $this->kerusakan_spekun_model-> getAllKerusakanSpekun();
				$data['page_loc'] = "Laporan Kerusakan";
					
				$this->load->view('templates/header');
				$this->load->view('templates/navigation', $data);
				$this->load->view('laporanKerusakan_view', $data);
				$this->load->view('templates/footer');
			}
            else{
                    redirect('auth', 'refresh');
            }
		}
		
		public function kehilangan()
		{
			if($this->session->userdata('logged_in')){
				$Tanggal = date("d");
				$TanggalAwal = 1;
				$BulanAwal = 1;
				$Bulan = date("m");
				$Tahun = date("Y");
				$data['daftarKehilanganSpekun'] = $this->peminjaman_model-> getDaftarSpekunBelumKembali();
				$data['page_loc'] = "Laporan Kehilangan";

				$this->load->view('templates/header');
				$this->load->view('templates/navigation', $data);
				$this->load->view('laporanKehilangan_view', $data);
				$this->load->view('templates/footer');
			}
            else{
                    redirect('auth', 'refresh');
            }
		}
		/*	
		public function peminjaman()
		{
			$this->load->view('templates/header');
			$this->load->view('templates/navigation');
			$this->load->view('laporanPeminjaman_view');
			$this->load->view('templates/footer');
		}
		*/	
	}
?>
