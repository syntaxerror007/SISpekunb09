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
				$data['error_message'] = $this->session->userdata('error_message');
				$this->session->unset_userdata('error_message');
				$data['daftarPeminjaman'] = $this->peminjaman_model-> getDaftarSpekunKembali();
				$data['daftarPeminjamanNonMahasiswa'] = $this->peminjaman_model->getDaftarSpekunKembaliNonMahasiswa();
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
				$data['error_message'] = $this->session->userdata('error_message');
				$this->session->unset_userdata('error_message');
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
		
		public function PeminjamanPerTanggal($start = null,$end = null)
		{
			if($this->session->userdata('logged_in')){
				$tanggalAwal = "";
				$tanggalAkhir = "";
				$bulanAkhir = "";
				$bulanAwal = "";
				$tahunAkhir = "";
				$tahunAwal = "";
				if ($start != null)
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
		public function KehilanganPerTanggal($start = null,$end = null)
		{
			if($this->session->userdata('logged_in')){
				$tanggalAwal = "";
				$tanggalAkhir = "";
				$bulanAkhir = "";
				$bulanAwal = "";
				$tahunAkhir = "";
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
		public function getTanggal($page)
		{
			if($this->session->userdata('logged_in')){
					
				$tanggalAwal = $this->input->post("tanggalAwal");
				$bulanAwal = $this->input->post("bulanAwal");
				$tahunAwal = $this->input->post("tahunAwal");
				
				$tanggalAkhir = $this->input->post("tanggalAkhir");
				$bulanAkhir = $this->input->post("bulanAkhir");
				$tahunAkhir = $this->input->post("tahunAkhir");
				$isError = false;
				if ($tahunAwal > $tahunAkhir)
				{
					$this->session->set_userdata('error_message','Tanggal awal lebih besar dari tanggal akhir');
					$isError = true;
				}
				else if ($tahunAwal == $tahunAkhir)
				{
					if ($bulanAwal > $bulanAkhir)
					{
						$this->session->set_userdata('error_message','Tanggal awal lebih besar dari tanggal akhir');
						$isError = true;
					}
					else if ($bulanAwal == $bulanAkhir)
					{
						if ($tanggalAwal > $tanggalAkhir)
							$this->session->set_userdata('error_message','Tanggal awal lebih besar dari tanggal akhir');
							$isError = true;
					}
				}
				
				if ($isError)
				{
					if ($page == "peminjaman"){
						redirect('laporan','refresh');
					}
					else if ($page == "kerusakan"){
						redirect('laporan/kerusakan','refresh');
					}
					else
					{
						
					}
				}
				$params = "";
				$isAwal = true;
				if ($tanggalAwal == -1 || $bulanAwal == -1 || $tahunAwal == -1)
				{
					$isAwal = false;
				}
				else{
					$params = $params.$tanggalAwal."-".$bulanAwal."-".$tahunAwal.'/';
				}
				
				if ($tanggalAkhir == -1 || $bulanAkhir == -1 || $tahunAkhir == -1)
				{
				}
				else{
					if (!$isAwal)
					{
						$this->session->set_userdata('error_message','Harap masukkan tanggal awal');
					}
					$params = $params.$tanggalAkhir."-".$bulanAkhir."-".$tahunAkhir;
				}
				
				if ($page == "peminjaman"){
					redirect('laporan/PeminjamanPerTanggal/'.$params,'refresh');
				}
				else if ($page == "kerusakan"){
					redirect('laporan/KerusakanPerTanggal/'.$params,'refresh');
				} else if ($page == "kehilangan"){
					redirect('laporan/KehilanganPerTanggal/'.$params,'refresh');
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
				$data['error_message'] = $this->session->userdata('error_message');
				$this->session->unset_userdata('error_message');
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
