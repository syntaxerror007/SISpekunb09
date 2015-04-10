<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class peminjaman_model extends CI_Model 
	{
		
		public $table = 'PEMINJAMAN';
		// getAllPeminjaman() : List<Peminjaman>
		public function getAllPeminjaman()
		{
			return $this->db->get($this->table);
		}
		
		public function getCountAllPeminjaman()
		{
			$query = $this->db->query('SELECT * FROM PEMINJAMAN');
			return $query->num_rows();
		}
		

		// getDaftarPeminjamanUsingDate (Date) : List<Peminjaman>
		public function get_daftar_peminjaman_using_date($Tanggal, $Bulan, $Tahun)
		{
			$this->db->where('Tanggal',$Tanggal);
			$this->db->where('Bulan',$Bulan);
			$this->db->where('Tahun',$Tahun);
			return $this->db->get($this->table);
		}
		
		/* getAllPeminjamanFromShelter(IDShelter) : List<Peminjaman>*/
		public function get_all_peminjaman_from_shelter($Lokasi_Peminjaman, $Lokasi_Kembali)
		{
			$this->db->where('Lokasi_Peminjaman',$Lokasi_Peminjaman);
			$this->db->where('Lokasi_Kembali',$Lokasi_Kembali);
			return $this->db->get($this->table);
		}
		//+ getAllPengembalianFromShelter(IDShelter) : List<Peminjaman>
		public function getAllPengembalianFromShelter($IDShelter)
		{
			$this->db->where('Shelter',$Shelter);
			return $this->db->get($this->table);
		}
		
		//getAllPengembalianFromShelterUsingDate(date) : List<Peminjaman>
		public function get_all_pengembalian_from_shelter_using_date($Tanggal, $Bulan, $Tahun, $Shelter)
		{
			$this->db->where('Tanggal',$Tanggal);
			$this->db->where('Bulan',$Bulan);
			$this->db->where('Tahun',$Tahun);
			$this->db->where('Shelter',$Shelter);
			return $this->db->get($this->table);
		}
		// + getAllPeminjamanFromShelterUsingDate(date) : List<Peminjaman>
		public function get_all_peminjaman_from_shelter_using_date($Tanggal, $Bulan, $Tahun, $Shelter)
		{
			$this->db->where('Tanggal',$Tanggal);
			$this->db->where('Bulan',$Bulan);
			$this->db->where('Tahun',$Tahun);
			$this->db->where('Shelter',$Shelter);
			return $this->db->get($this->table);
		}
		// + getDaftarPeminjamanUsingInterval(StartDate,EndDate) : List<Peminjaman>
		public function getDaftarPeminjamanUsingInterval($tanggalAwal, $tanggalAkhir, $bulanAwal, $bulanAkhir, $tahunAwal, $tahunAkhir)
		{
			$query = "SELECT * FROM PEMINJAMAN WHERE tahun <= ".$tahunAkhir." AND tahun >= ". $tahunAwal." AND bulan <= ".$bulanAkhir." AND bulan >= ".$bulanAwal." AND Tanggal <= ".$tanggalAkhir. " AND Tanggal >= ".$tanggalAwal;
			return $this->db->query($query);
		}

		public function getCountPeminjamanUsingDate($Tanggal, $Bulan, $Tahun)
		{
			$result = $this->get_daftar_peminjaman_using_date($Tanggal, $Bulan, $Tahun);
			return $result->num_rows();
		}
		public function getCountPeminjamanUsingInterval($tanggalAwal, $tanggalAkhir, $bulanAwal, $bulanAkhir, $tahunAwal, $tahunAkhir)
		{
			$result = $this->getDaftarPeminjamanUsingInterval($tanggalAwal, $tanggalAkhir, $bulanAwal, $bulanAkhir, $tahunAwal, $tahunAkhir);
			return $result->num_rows();
		}

		// + getCountSpekunDipinjam() : int
		public function getCountSpekunDipinjam()
		{
			$query = $this->db->query('SELECT * FROM PEMINJAMAN WHERE Status IS NULL');
			return $query->num_rows();
		}

		public function getCountSpekunKembali()
		{
			$query = $this->db->query('SELECT * FROM PEMINJAMAN WHERE Status = "1"');
			return $query->num_rows();
		}
		
		public function getAvgSpekunDipinjam()
		{
			$totalPeminjaman = $this->getCountAllPeminjaman();
			$query = "SELECT DISTINCT Tanggal,Bulan,Tahun FROM PEMINJAMAN";
			$totalHari = $this->db->query($query)->num_rows();
			return round($totalPeminjaman/$totalHari);
		}
		// + ubahStatusSpekun(nomor) : boolean
		public function ubah_status_spekun($No_Spekun, $Status, $Tanggal, $Bulan, $Tahun)
		{
			$query = "update PEMINJAMAN set Status = ".$Status." where Tanggal = '".$Tanggal."' and Bulan = '".$Bulan."' and Tahun = '".$Tahun."'";
			return $this->db->query($query);
		}
		
		
		// + getNomorSpekunUsingNPM : int
		public function get_nomor_spekun_using_npm($NPM_Mahasiswa)
		{
			$this->db->select('No_Spekun');
			$this->db->where('NPM_Mahasiswa',$NPM_Mahasiswa);
			return $this->db->get($this->table);
		}
		// + getDaftarSpekunBelumKembali() : List<Spekun>
		
		public function getDaftarSpekunKembali()
		{
			$this->db->where('Status',1);
			return $this->db->get($this->table);
		}
		
		// + getPeminjamanByKTP(varchar) : Peminjaman
		
		public function getPeminjamanByKTP($NoKTP)
		{
			$this->db->where('ID_Non_Mahasiswa',$NoKTP);
			return $this->db->get($this->table);
		}
		// + getPeminjamByKTM(varchar) : Peminjam
		
		public function getPeminjamanByKTM($NoKTM)
		{
			$this->db->where('NPM_Mahasiswa',$NoKTM);
			return $this->db->get($this->table);
		}
	}
?>



