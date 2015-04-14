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
				
				if ($end != null || $end == "")
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
				
				$data['daftarPeminjaman'] = $this->peminjaman_model->getDaftarPeminjamanUsingInterval($tanggalAwal, $tanggalAkhir, $bulanAwal, $bulanAkhir, $tahunAwal, $tahunAkhir);
				$data['daftarPeminjamanNonMahasiswa'] = $this->peminjaman_model->getDaftarPeminjamanUsingInterval($tanggalAwal, $tanggalAkhir, $bulanAwal, $bulanAkhir, $tahunAwal, $tahunAkhir);
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
		
		public function getTanggal()
		{
			if($this->session->userdata('logged_in')){
					
				$tanggalAwal = $this->input->post("tanggalAwal");
				$bulanAwal = $this->input->post("bulanAwal");
				$tahunAwal = $this->input->post("tahunAwal");
				$params = "";
				if ($tanggalAwal == -1 || $bulanAwal == -1 || $tahunAwal == -1)
				{
					$params+="current/";
				}
				else{
					$params = $params.$tanggalAwal."-".$bulanAwal."-".$tahunAwal.'/';
				}
				
				$tanggalAkhir = $this->input->post("tanggalAkhir");
				$bulanAkhir = $this->input->post("bulanAkhir");
				$tahunAkhir = $this->input->post("tahunAkhir");
				if ($tanggalAkhir == -1 || $bulanAkhir == -1 || $tahunAkhir == -1)
				{
				}
				else{
					$params = $params.$tanggalAkhir."-".$bulanAkhir."-".$tahunAkhir;
				
				}
				redirect('laporan/PeminjamanPerTanggal/'.$params,'refresh');
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
