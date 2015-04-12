<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Penugasan extends CI_Controller {
		public function index()
		{
			if($this->session->userdata('logged_in')){
	            $Tanggal = date("d");
	            //$TanggalAwal = 1;
	            //$BulanAwal = 1;
	            $Bulan = date("m");
	            $Tahun = date("Y");
	            $data['page_loc'] = "Shelter";
	            $data['daftar_Shelter'] = $this->penugasan_penjaga_shelter_model->getAllPenugasanAndPetugas();

	            $this->load->view('templates/header');
	            $this->load->view('templates/navigation',$data);
				$this->load->view('penugasanShelter_view',$data);
				$this->load->view('templates/footer');
			}
			else
			{
				redirect('auth','refresh');
			}
		}
		public function daftar_penjaga()
		{
			if($this->session->userdata('logged_in')){
	            $Tanggal = date("d");
	            $TanggalAwal = 1;
	            $BulanAwal = 1;
	            $Bulan = date("m");
	            $Tahun = date("Y");
				
	            $data['daftarPenjagaShelter'] = $this->penjaga_shelter_model-> getAllPenjagaShelter();
	            $data['page_loc'] = "Daftar Penjaga";

				$this->load->view('templates/header');
				$this->load->view('templates/navigation',$data);
				$this->load->view('penugasanDaftarPenjaga_view',$data);
				$this->load->view('templates/footer');
			}
			else
			{
				redirect('auth','refresh');
			}
		}
        
		public function getProfilePetugas($idPetugas)
		{
			if($this->session->userdata('logged_in')){
				$data['page_loc'] = "Daftar Penjaga";
				$data['profilePenjagaShelter'] = $this->penjaga_shelter_model->getPenjagaShelterFromID($idPetugas);
				
				$this->load->view('templates/header');
				$this->load->view('templates/navigation',$data);
				$this->load->view('profilePenjagaShelter_view',$data);
				$this->load->view('templates/footer');
			}
			else
			{
				redirect('auth','refresh');
			}
		}
		
		public function doInsert()
		{
			$nama = $this->input->post("NamaPenjaga");
			$noKTP = $this->input->post("NoKTP");
			$noTelp = $this->input->post("NoTelp");
			$Alamat = $this->input->post("Alamat");
			$Password = $this->input->post("Password");
			$Username = $this->input->post("Username");
			$result = $this->penjaga_shelter_model->createNewPenjagaShelter($nama,$noKTP,$noTelp,$Alamat,$Username, $Password);
			if ($result)
			{
				redirect('penugasan/tambah');
			}
			else
			{
				$this->form_validation->set_message('Test');
			}
		}
		
        public function tambah_penjaga()
		{	
			if($this->session->userdata('logged_in')){
	            $data['page_loc'] = "Tambah Penjaga";
	            $this->form_validation->set_rules('NamaPenjaga', 'Nama Penjaga', 'trim|required|xss_clean');
				$this->form_validation->set_rules('NoKTP', 'No KTP', 'trim|required|xss_clean');
				$this->form_validation->set_rules('NoTelp', 'No Telp', 'trim|required|xss_clean');
				$this->form_validation->set_rules('Alamat', 'Alamat', 'trim|required|xss_clean');
				$this->form_validation->set_rules('Password', 'Password', 'trim|required|xss_clean');
				$this->form_validation->set_rules('Username', 'Username', 'trim|required|xss_clean');
				
				if ($this->form_validation->run() == FALSE)
				{
					$this->load->view('templates/header');
					$this->load->view('templates/navigation',$data);
					$this->load->view('penugasanTambahPenjaga_view',$data);
					$this->load->view('templates/footer');
				}
				else
				{
					
				}
			}
			else
			{
				redirect('auth','refresh');
			}
		}
	}
?>
