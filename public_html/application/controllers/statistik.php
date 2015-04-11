<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Statistik extends CI_Controller {
		public function statistik_kerusakan()
		{
                  $Tanggal = date("d");
                  $TanggalAwal = 1;
                  $BulanAwal = 1;
                  $Bulan = date("m");
                  $Tahun = date("Y");
                  $data['page_loc'] = "Statistik Kerusakan";
                  $data['totalSpekunRusakHariIni'] = $this->kerusakan_spekun_model->getTotalSpekunRusakUsingDate($Tanggal,$Bulan,$Tahun);
                  $data['totalSpekunRusakBulanIni'] = $this->kerusakan_spekun_model->getTotalSpekunRusakUsingInterval($TanggalAwal,$Tanggal,$Bulan,$Bulan,$Tahun, $Tahun);
                  $data['totalSpekunRusakTahunIni'] = $this->kerusakan_spekun_model->getTotalSpekunRusakUsingInterval($TanggalAwal,$Tanggal,$BulanAwal,$Bulan,$Tahun,$Tahun);
                  
                  
			$this->load->view('statistikKerusakan_view',$data);
			$this->load->view('templates/footer');
		}

		public function statistik_peminjaman()
		{
                  $Tanggal = date("d");
                  $TanggalAwal = 1;
                  $BulanAwal = 1;
                  $Bulan = date("m");
                  $Tahun = date("Y");
                  $data['page_loc'] = "Statistik Peminjaman";
                  $data['totalPeminjamanSpekunHariIni'] = $this->peminjaman_model-> getCountPeminjamanUsingDate($Tanggal, $Bulan, $Tahun);
                  
                  $data['totalPeminjamanSpekunBulanIni'] = $this->peminjaman_model-> getCountPeminjamanUsingInterval($TanggalAwal,$Tanggal,$Bulan, $Bulan, $Tahun, $Tahun);
                  
                  $data['totalPeminjamanSpekunTahunIni'] = $this->peminjaman_model-> getCountPeminjamanUsingInterval($TanggalAwal,$Tanggal,$BulanAwal, $Bulan, $Tahun, $Tahun);
                  
                  //$data['totalPeminjamanPerShelter'] = $this->peminjaman_model-> get_all_peminjaman_from_shelter($Lokasi_Peminjaman);

			$this->load->view('templates/header');
			$this->load->view('templates/navigation',$data);
			$this->load->view('statistikPeminjaman_view',$data);
			$this->load->view('templates/footer');
		}

	}
?>