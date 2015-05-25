<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Laporan extends CI_Controller {
		public function Peminjaman()
		{
			if($this->session->userdata('logged_in')){
				$data['daftarPeminjaman'] = $this->peminjaman_model-> getDaftarSpekunKembali();
				$data['daftarPeminjamanNonMahasiswa'] = $this->peminjaman_model->getDaftarSpekunKembaliNonMahasiswa();
				$data['page_loc'] = "Laporan Peminjaman";

				$data['error_message'] = "";
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
				$data['daftarKerusakanSpekun'] = $this->kerusakan_spekun_model-> getAllKerusakanSpekun();
				$data['page_loc'] = "Laporan Kerusakan";
					
				$data['error_message'] = "";
				$this->load->view('templates/header');
				$this->load->view('templates/navigation', $data);
				$this->load->view('laporanKerusakan_view', $data);
				$this->load->view('templates/footer');
			}
            else{
                    redirect('auth', 'refresh');
            }
		}
		
		public function PeminjamanPerTanggal($start = null,$end = null)
		{
			if($this->session->userdata('logged_in')){
				$tanggalAwal = "";
				$tanggalAkhir = "";
				$bulanAkhir = "";
				$bulanAwal = "";
				$tahunAkhir = "";
				$tahunAwal = "";
				if ($start != null || $end != "")
				{
					$data = explode('-',$start,4);
					$tanggalAwal = $data[0];
					$bulanAwal = $data[1];
					$tahunAwal = $data[2];
				}
				else{
					$tanggalAwal = date("d");
					$bulanAwal = date("m");
					$tahunAwal = date("Y");
				}
				
				if ($end != null || $end != "")
				{
					$data = explode('-',$end,4);
					$tanggalAkhir = $data[0];
					$bulanAkhir = $data[1];
					$tahunAkhir = $data[2];
				}
				else{
					$tanggalAkhir = date("d");
					$bulanAkhir = date("m");
					$tahunAkhir = date("Y");
				}
				$data['error_message'] =  $this->session->userdata('ErrorTanggalLaporan');
				$this->session->unset_userdata("ErrorTanggalLaporan");
				if ($data['error_message'] != "")
				{
					$tanggalAwal = date("d");
					$bulanAwal = date("m");
					$tahunAwal = date("Y");
					$tanggalAkhir = date("d");
					$bulanAkhir = date("m");
					$tahunAkhir = date("Y");
				}
				
				$data['daftarPeminjaman'] = $this->peminjaman_model->getDaftarPeminjamanMahasiswaUsingInterval($tanggalAwal, $tanggalAkhir, $bulanAwal, $bulanAkhir, $tahunAwal, $tahunAkhir);
				$data['daftarPeminjamanNonMahasiswa'] = $this->peminjaman_model->getDaftarPeminjamanNonMahasiswaUsingInterval($tanggalAwal, $tanggalAkhir, $bulanAwal, $bulanAkhir, $tahunAwal, $tahunAkhir);
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
		public function KerusakanPerTanggal($start = null,$end = null)
		{
			if($this->session->userdata('logged_in')){
				$tanggalAwal = "";
				$tanggalAkhir = "";
				$bulanAkhir = "";
				$bulanAwal = "";
				$tahunAkhir = "";
				$tahunAwal = "";
				if ($start != null || $end != "")
				{
					$data = explode('-',$start,4);
					$tanggalAwal = $data[0];
					$bulanAwal = $data[1];
					$tahunAwal = $data[2];
				}
				else{
					$tanggalAwal = date("d");
					$bulanAwal = date("m");
					$tahunAwal = date("Y");
				}
				
				if ($end != null || $end != "")
				{
					$data = explode('-',$end,4);
					$tanggalAkhir = $data[0];
					$bulanAkhir = $data[1];
					$tahunAkhir = $data[2];
				}
				else{
					$tanggalAkhir = date("d");
					$bulanAkhir = date("m");
					$tahunAkhir = date("Y");
				}
				
				$data['error_message'] =  $this->session->userdata('ErrorTanggalLaporan');
				$this->session->unset_userdata("ErrorTanggalLaporan");

				$data['daftarKerusakanSpekun'] = $this->kerusakan_spekun_model-> getSpekunRusakUsingInterval($tanggalAwal, $tanggalAkhir, $bulanAwal, $bulanAkhir, $tahunAwal, $tahunAkhir);
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
		
		public function getTanggal($page)
		{
			if($this->session->userdata('logged_in')){
				$startDate = $this->input->post("start-date");
				if ($page == "kehilangan")
				{
					if ($startDate == "")
					{
						$startDate = date('d-m-Y');
						$params = $startDate;
						$endDate = date('d-m-Y');
						$params = $params . "/" . $endDate;
					}
					else {
						$startDate = date('d-m-Y', strtotime($startDate));
						if ($startDate > date('d-m-y')) {
							$this->session->set_userdata('ErrorTanggalLaporan',"Harap Input tanggal yang lebih kecil dari hari ini");
						}
						$params = $startDate;
					}
					redirect('laporan/KehilanganPerTanggal/'.$params,'refresh');
				}
				else {
					$endDate = $this->input->post("end-date");
					if ($startDate == "")
					{
						$startDate = date('d-m-Y');
						$params = $startDate;
						$endDate = date('d-m-Y');
						$params = $params . "/" . $endDate;
					} else if($endDate == "") {
						if ($startDate > date('d-m-y')) {
							$this->session->set_userdata('ErrorTanggalLaporan',"Harap Input tanggal yang lebih kecil dari hari ini");
						}
						else {
							$startDate = date('d-m-Y', strtotime($startDate));
							$params = $startDate;
							$endDate = date('d-m-Y');
							$params = $params . "/" . $endDate;
						}
					} else {
						$startDate = date('d-m-Y', strtotime($startDate));
						$endDate = date('d-m-Y', strtotime($endDate));
						
						if ($startDate > date('d-m-y')) {
							$this->session->set_userdata('ErrorTanggalLaporan',"Harap Input tanggal yang lebih kecil dari hari ini");
						}
						
						if ($startDate > $endDate) {
							$this->session->set_userdata('ErrorTanggalLaporan',"Tanggal akhir harap lebih besar dari tanggal awal");
						}
						$startDate = date('d-m-Y', strtotime($startDate));
						$params = $startDate;
						$endDate = date('d-m-Y', strtotime($endDate));
						$params = $params . "/" . $endDate;
					}
					if ($page == "peminjaman"){
						redirect('laporan/PeminjamanPerTanggal/'.$params,'refresh');
					}
					else if ($page == "kerusakan"){
						redirect('laporan/KerusakanPerTanggal/'.$params,'refresh');
					}
				}
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
		public function KehilanganPerTanggal($start = null,$end = null)
		{
			if($this->session->userdata('logged_in')){
				$tanggalAwal = "";
				$bulanAwal = "";
				$tahunAwal = "";
				if ($start != null || $start != "")
				{
					$data = explode('-',$start,4);
					$tanggalAwal = $data[0];
					$bulanAwal = $data[1];
					$tahunAwal = $data[2];
				}
				else{
					$tanggalAwal = date("d");
					$bulanAwal = date("m");
					$tahunAwal = date("Y");
				}
				
				
				$data['daftarKehilanganSpekun'] = $this->peminjaman_model->getDaftarSpekunBelumKembaliUsingInterval($tanggalAwal,$bulanAwal, $tahunAwal);
				$data['page_loc'] = "Laporan Kehilangan";

				$data['error_message'] =  $this->session->userdata('ErrorTanggalLaporan');
				$this->session->unset_userdata("ErrorTanggalLaporan");
				
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
