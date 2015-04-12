<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
		public function index()
		{
			if($this->session->userdata('logged_in')){
				$session_data = $this->session->userdata('logged_in');
				$data['username'] = $session_data['username'];
		 
				$Tanggal = date("d");
				$Bulan = date("m");
				$Tahun = date("Y");
				$data['totalSpekunRusak'] = $this->kerusakan_spekun_model->getCountSpekunRusak();
				$data['totalSpekunKembali'] = $this->peminjaman_model->getCountSpekunKembali();
				$data['avgSpekunDipinjam'] = $this->peminjaman_model->getAvgSpekunDipinjam();
				$data['totalSpekunDipinjam'] = $this->peminjaman_model->getCountSpekunDipinjam();
				$data['penugasanHariIni'] = $this->penugasan_penjaga_shelter_model->getAllPenugasanAndPetugasUsingDate($Tanggal,$Bulan,$Tahun);
				
				//view
				$data['page_loc'] = "Dashboard";
				$this->load->view('templates/header');
				$this->load->view('templates/navigation',$data);
				$this->load->view('home_view',$data);
				$this->load->view('templates/footer');
			}
			else
			{
				redirect('auth','refresh');
			}
		}


		public function logout(){
				$this->session->unset_userdata('logged_in');
				session_destroy();
				redirect('home', 'refresh');
		}
	}
?>
