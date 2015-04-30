<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class PeminjamanKhusus extends CI_Controller {
	
		
		public function formulir()
		{
		
			if($this->session->userdata('logged_in')){
				$data['page_loc'] = "formulir peminjaman";
				$this->form_validation->set_rules('NamaKegiatan', 'Nama Kegiatan', 'trim|required|xss_clean');
				$this->form_validation->set_rules('Organisasi', 'Organisasi', 'trim|required|xss_clean');
				$this->form_validation->set_rules('Jumlah', 'Jumlah', 'trim|required|xss_clean');
				$this->form_validation->set_rules('JamAwal', 'JamAwal', 'trim|required|xss_clean');
				$this->form_validation->set_rules('JamAkhir', 'JamAkhir', 'trim|required|xss_clean');
				$this->form_validation->set_rules('Keterangan', 'Keterangan', 'trim|required|xss_clean');
	
				if ($this->form_validation->run() == FALSE)
				{
					$this->load->view('templates/header');
					$this->load->view('templates/navigation',$data);
					$this->load->view('Peminjaman_khusus',$data);	
					$this->load->view('templates/footer');
				}
			}
			else
			{
				redirect('auth','refresh');
			}
		}
	
		function doInsert()
		{
			$namaKegiatan = $this->input->post("NamaKegiatan");
			$organisasi = $this->input->post("Organisasi");
			$jumlah = $this->input->post("Jumlah");
			$awal = $this->input->post("JamAwal");
			$akhir = $this->input->post("JamAkhir");
			$keterangan = $this->input->post("Keterangan");
			
			$result = $this->peminjaman_khusus_model->createNewPeminjamanKhusus($jumlah,$awal,$akhir,$keterangan,$organisasi,$namaKegiatan,date("Y"),date("d"),date("m"));
			if ($result)
			{
				redirect('peminjamanKhusus/formulir');
			}
			else
			{
				redirect('peminjamanKhusus/formulir');
				
			}
		}
			
		
		public function listPeminjamanKhusus()
		{
			if($this->session->userdata('logged_in')){
			
				$data['daftarPeminjamanKhusus'] = $this->peminjaman_khusus_model-> getAllPeminjamanKhusus();
				$data['page_loc'] = "List Peminjaman Khusus";

				$this->load->view('templates/header');
				$this->load->view('templates/navigation', $data);
				$this->load->view('listPeminjamanKhusus_view', $data);
				$this->load->view('templates/footer');
			
			}
            else{
                    redirect('auth', 'refresh');
            }
		}

	}
?>