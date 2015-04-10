<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Penugasan extends CI_Controller {
		public function index()
		{
            $Tanggal = date("d");
            //$TanggalAwal = 1;
            //$BulanAwal = 1;
            $Bulan = date("m");
            $Tahun = date("Y");
            $data['daftar_Shelter'] = $this->penugasan_penjaga_shelter_model->getAllPenugasanAndPetugas();
            $data['page_loc'] = "Shelter";

            $this->load->view('templates/header');
            $this->load->view('templates/navigation',$data);
			$this->load->view('penugasanShelter_view',$data);
			$this->load->view('templates/footer');
		}
		public function daftar_penjaga()
		{
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
        
        public function tambah_penjaga($ID_Shelter, $ID_Penjaga, $Tanggal, $Bulan, $Tahun,$No_Device)
		{
            $data['TambahPenjagaShelter'] = $this->peminjaman_model-> createNewPenugasan($ID_Shelter, $ID_Penjaga, $Tanggal, $Bulan, $Tahun,$No_Device);
            $data['page_loc'] = "Tambah Penjaga";
            
			$this->load->view('templates/header');
			$this->load->view('templates/navigation',$data);
			$this->load->view('penugasanTambahPenjaga_view',$data);
			$this->load->view('templates/footer');
		}
	}
?>
