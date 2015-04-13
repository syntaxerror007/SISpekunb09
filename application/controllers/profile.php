<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Profile extends CI_Controller {
	
		public function Mahasiswa($NoKTM)
		{
			if($this->session->userdata('logged_in')){
	            $data['profilePeminjam'] = $this->peminjaman_model-> getPeminjamanByKTM($NoKTM);
	            $data['page_loc'] = "Mahasiswa";

				$this->load->view('templates/header');
				$this->load->view('templates/navigation',$data);
				$this->load->view('profilePeminjam_view',$data);
				$this->load->view('templates/footer');
			}
			else
			{
				redirect('auth','refresh');
			}
		}
        
		public function NonMahasiswa($NoKTP)
		{
			if($this->session->userdata('logged_in')){
	            $data['profilePeminjam'] = $this->peminjaman_model-> getPeminjamanByKTP($NoKTP);
	            $data['page_loc'] = "NonMahasiswa";

				$this->load->view('templates/header');
				$this->load->view('templates/navigation',$data);
				$this->load->view('profilePeminjam_view',$data);
				$this->load->view('templates/footer');
			}
			else
			{
				redirect('auth','refresh');
			}
		}
        
	}
?>
