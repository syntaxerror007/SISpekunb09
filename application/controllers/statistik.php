<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Statistik extends CI_Controller {
		public function statistik_kerusakan()
		{
			if($this->session->userdata('logged_in')){
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
		public function getTanggal($page)
		{
			if($this->session->userdata('logged_in')){
					
				$tanggalAwal = $this->input->post("tanggal");
				$bulanAwal = $this->input->post("bulan");
				$tahunAwal = $this->input->post("tahun");
				$params = "";
				if ($tanggalAwal == -1 || $bulanAwal == -1 || $tahunAwal == -1)
				{
					$params+="current/";
				}
				else{
					$params = $tanggalAwal."-".$bulanAwal."-".$tahunAwal.'/';
				}

				if ($page == "peminjaman"){
					redirect('statistik/statistik_peminjaman/'.$params,'refresh');
				}
				else if ($page == "kerusakan"){
					redirect('laporan/KerusakanPerTanggal/'.$params,'refresh');
				}
			}
			else{
                    redirect('auth', 'refresh');
            }
		}

		public function statistik_peminjaman($tanggalRequest = null)
		{
			if($this->session->userdata('logged_in')){
				$data['page_loc'] = "Statistik Peminjaman";

				if ($tanggalRequest != null)
				{

					$arr = explode('-',$tanggalRequest,4);
					$tanggal = $arr[0];
					$bulan = $arr[1];
					$tahun = $arr[2];

					if ($tahun > date("Y"))
					{
						$this->session->set_userdata('error_message','Tanggal tidak boleh lebih besar dari tanggal sekarang');
						redirect('statistik/peminjaman/','refresh');
					}
					else if ($bulan > date("m") && $tahun == date("Y"))
					 {
					 	$this->session->set_userdata('error_message','Tanggal tidak boleh lebih besar dari tanggal sekarang');
						redirect('statistik/peminjaman/','refresh');
					 }
					else if ($tanggal > date("d") && $bulan == date("m") && $tahun == date("Y"))
				 	{
				 		$this->session->set_userdata('error_message','Tanggal tidak boleh lebih besar dari tanggal sekarang');
						redirect('statistik/peminjaman/','refresh');
				 	}
					
					$data['isTanggal'] = true;
					$data['statistikPeminjamanPerShelter'] = $this->peminjaman_model->getCountPeminjamanByShelterUsingTanggal($tanggal, $bulan, $tahun);
				}
				else
				{
					$data['error_message'] = $this->session->userdata('error_message');
					$this->session->unset_userdata('error_message');

					$data['statistikMingguan'] = $this->peminjaman_model-> getStatistikPeminjamanMingguan();

					$data['statistikBulanan'] = $this->peminjaman_model-> getStatistikPeminjamanBulanan();

					$data['statistikTahunan'] = $this->peminjaman_model-> getStatistikPeminjamanTahunan();

					$data['statistikPeminjamanPerShelter'] = $this->peminjaman_model-> getCountPeminjamanByShelter();

				}
				
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