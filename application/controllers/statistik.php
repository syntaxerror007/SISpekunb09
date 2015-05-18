<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Statistik extends CI_Controller {
		public function statistik_kerusakan($tanggalRequest = null)
		{
			if($this->session->userdata('logged_in')){
				$data['page_loc'] = "Statistik Kerusakan";
				
				if ($tanggalRequest != null)
				{

					$arr = explode('-',$tanggalRequest,4);
					$tanggal = $arr[0];
					$bulan = $arr[1];
					$tahun = $arr[2];

					if ($tahun > date("Y"))
					{
						$this->session->set_userdata('error_message','Tanggal tidak boleh lebih besar dari tanggal sekarang');
						redirect('statistik/kerusakan/','refresh');
					}
					else if ($bulan > date("m") && $tahun == date("Y"))
					 {
					 	$this->session->set_userdata('error_message','Tanggal tidak boleh lebih besar dari tanggal sekarang');
						redirect('statistik/kerusakan/','refresh');
					 }
					else if ($tanggal > date("d") && $bulan == date("m") && $tahun == date("Y"))
				 	{
				 		$this->session->set_userdata('error_message','Tanggal tidak boleh lebih besar dari tanggal sekarang');
						redirect('statistik/kerusakan/','refresh');
				 	}
					
					$data['isTanggal'] = true;
					$data['statistikKerusakan'] = $this->kerusakan_spekun_model->getSpekunRusakFromTanggal($tanggal, $bulan, $tahun);
				}
				else
				{
					$data['statistikMingguan'] = $this->kerusakan_spekun_model-> getStatistikKerusakanMingguan();

					$data['statistikBulanan'] = $this->kerusakan_spekun_model-> getStatistikKerusakanBulanan();

					$data['statistikTahunan'] = $this->kerusakan_spekun_model-> getStatistikKerusakanTahunan();
				}
	                  
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
				$startDate = $this->input->post("start-date");
				$startDate = date('d-m-Y', strtotime($startDate));
				
				if ($page == "peminjaman"){
					redirect('statistik/statistik_peminjaman/'.$startDate,'refresh');
				}
				else if ($page == "kerusakan"){
					redirect('statistik/statistik_kerusakan/'.$startDate,'refresh');
				}
				else if ($page == "statistik") {
					redirect('statistik/statistik_shelter/'.$startDate,'refresh');
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
		
		public function statistik_shelter($tanggalRequest = null)
		{
			if($this->session->userdata('logged_in')){
				$data['page_loc'] = "Statistik Shelter";
					
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
					$data['daftarPeminjaman'] = $this->peminjaman_model->getAllPeminjamanByShelterUsingDate($tanggal,$bulan,$tahun);
					$data['daftarPengembalian'] = $this->peminjaman_model->getAllPengembalianByShelterUsingDate($tanggal,$bulan,$tahun);
				}
				else
				{
					$tanggal = date("d");
					$bulan =  date("m");
					$tahun = date("Y");
					$data['page_loc'] = "Statistik Shelter";
					
					$data['daftarPeminjaman'] = $this->peminjaman_model->getAllPeminjamanByShelterUsingDate($tanggal,$bulan,$tahun);
					$data['daftarPengembalian'] = $this->peminjaman_model->getAllPengembalianByShelterUsingDate($tanggal,$bulan,$tahun);
				}
				
				$this->load->view('templates/header');
				$this->load->view('templates/navigation',$data);
				$this->load->view('statistikShelter_view',$data);
				$this->load->view('templates/footer',$data);
			}
			else
			{
				redirect('auth','refresh');
			}
		}

	}
?>