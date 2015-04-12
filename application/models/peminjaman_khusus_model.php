<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class peminjaman_khusus_model extends CI_Model 
	{
		public $table = 'Peminjaman_Khusus';
		
		public function createNewPeminjamanKhusus($jumlahSpekun, $jamAwal, $jamAkhir, $pesan, $organisasi, $nama, $tahun, $tanggal, $bulan)
		{
			$data = array(
				   'Nama' => $nama ,
				   'organisasi' => $organisasi ,
				   'jumlah_spekun' => $jumlahSpekun,
				   'jam_awal' => $jamAwal,
				   'jam_akhir' => $jamAkhir,
				   'Keterangan' => $pesan,
				   'tahun' => $tahun,
				   'Tanggal' => $tanggal,
				   'bulan' => $bulan,
				   'ID_Admin'=>'01'
				);
			$this->db->insert($this->table,$data);
		}
		
		public function updatePeminjamanKhusus($id, $jumlahSpekun, $jamAwal, $jamAkhir, $pesan, $organisasi, $nama, $tahun, $tanggal, $bulan)
		{
			$data = array(
				   'Nama' => $nama ,
				   'organisasi' => $organisasi ,
				   'jumlah_spekun' => $jumlahSpekun,
				   'jam_awal' => $jamAwal,
				   'jam_akhir' => $jamAkhir,
				   'Keterangan' => $pesan,
				   'tahun' => $tahun,
				   'Tanggal' => $tanggal,
				   'bulan' => $bulan
				);
			$this->db->where('Id_Peminjaman_Khusus',$id);
			$this->db->update($this->table,$data);
		
		}
		public function getAllPeminjamanKhusus()
		{
			return $this->db->get($this->table);
		}
	}	
?>