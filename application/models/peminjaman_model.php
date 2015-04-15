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
		public function getDaftarPeminjamanUsingDate($Tanggal, $Bulan, $Tahun)
		{
			$this->db->where('Tanggal',$Tanggal);
			$this->db->where('Bulan',$Bulan);
			$this->db->where('Tahun',$Tahun);
			return $this->db->get($this->table);
		}
		
		public function getAllPeminjamUsingShelter($Lokasi_Peminjaman, $Lokasi_Kembali)
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
		
		public function getAllPengembalianFromShelterUsingDate($Tanggal, $Bulan, $Tahun, $Shelter)
		{
			$this->db->where('Tanggal',$Tanggal);
			$this->db->where('Bulan',$Bulan);
			$this->db->where('Tahun',$Tahun);
			$this->db->where('Shelter',$Shelter);
			return $this->db->get($this->table);
		}
		
		public function getAllPeminjamanFromShelterUsingDate($Tanggal, $Bulan, $Tahun, $Shelter)
		{
			$this->db->where('Tanggal',$Tanggal);
			$this->db->where('Bulan',$Bulan);
			$this->db->where('Tahun',$Tahun);
			$this->db->where('Shelter',$Shelter);
			return $this->db->get($this->table);
		}
		// + getDaftarPeminjamanUsingInterval(StartDate,EndDate) : List<Peminjaman>
		public function getDaftarPeminjamanMahasiswaUsingInterval($tanggalAwal, $tanggalAkhir, $bulanAwal, $bulanAkhir, $tahunAwal, $tahunAkhir)
		{
			$query = "SELECT * FROM PEMINJAMAN, MAHASISWA WHERE PEMINJAMAN.NPM_MAHASISWA =MAHASISWA.NPM and tahun <= ".$tahunAkhir." AND tahun >= ". $tahunAwal." AND bulan <= ".$bulanAkhir." AND bulan >= ".$bulanAwal." AND Tanggal <= ".$tanggalAkhir. " AND Tanggal >= ".$tanggalAwal;
			return $this->db->query($query);
		}

		public function getDaftarPeminjamanNonMahasiswaUsingInterval($tanggalAwal, $tanggalAkhir, $bulanAwal, $bulanAkhir, $tahunAwal, $tahunAkhir)
		{
			$query = "SELECT * FROM PEMINJAMAN, MAHASISWA WHERE PEMINJAMAN.NPM_MAHASISWA =MAHASISWA.NPM and tahun <= ".$tahunAkhir." AND tahun >= ". $tahunAwal." AND bulan <= ".$bulanAkhir." AND bulan >= ".$bulanAwal." AND Tanggal <= ".$tanggalAkhir. " AND Tanggal >= ".$tanggalAwal;
			return $this->db->query($query);
		}
		
		public function getCountPeminjamanUsingDate($Tanggal, $Bulan, $Tahun)
		{
			$result = $this->getDaftarPeminjamanUsingDate($Tanggal, $Bulan, $Tahun);
			return $result->num_rows();
		}
		
		public function getCountPeminjamanUsingInterval($tanggalAwal, $tanggalAkhir, $bulanAwal, $bulanAkhir, $tahunAwal, $tahunAkhir)
		{
			$result = $this->getDaftarPeminjamanUsingInterval($tanggalAwal, $tanggalAkhir, $bulanAwal, $bulanAkhir, $tahunAwal, $tahunAkhir);
			return $result->num_rows();
		}

		public function getStatistikPeminjamanMingguan()
		{
			$query = "SELECT Hari, count(*) as count FROM PEMINJAMAN group by Hari order by Hari";
			return $this->db->query($query);
		}
		
		public function getStatistikPeminjamanBulanan()
		{
			$query = "SELECT Bulan, count(*) as count FROM PEMINJAMAN group by bulan";
			return $this->db->query($query);
		}
		
		public function getStatistikPeminjamanTahunan()
		{
			$query = "SELECT Tahun, count(*) as count FROM PEMINJAMAN group by tahun";
			return $this->db->query($query);
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
		public function ubahStatusSpekun($No_Spekun, $Status, $Tanggal, $Bulan, $Tahun)
		{
			$query = "update PEMINJAMAN set Status = ".$Status." where Tanggal = '".$Tanggal."' and Bulan = '".$Bulan."' and Tahun = '".$Tahun."'";
			return $this->db->query($query);
		}
		
		public function getNomorSpekunUsingNPM($NPM_Mahasiswa)
		{
			$this->db->select('No_Spekun');
			$this->db->where('NPM_Mahasiswa',$NPM_Mahasiswa);
			return $this->db->get($this->table);
		}
		// + getDaftarSpekunBelumKembali() : List<Spekun>
		public function getDaftarSpekunBelumKembali()
		{
			$query = "SELECT * FROM PEMINJAMAN WHERE Status IS NULL";
			//$this->db->where('Status', NULL);			
			//return $this->db->get($this->table);	
			return $this->db->query($query);	
		}
		
		public function getDaftarSpekunBelumKembaliUsingInterval($tanggalAwal, $tanggalAkhir, $bulanAwal, $bulanAkhir, $tahunAwal, $tahunAkhir)
		{
			$query = "SELECT * FROM PEMINJAMAN WHERE (Status IS NULL OR Status = '0') AND Tanggal = '".$Tanggal."' and Bulan = '".$Bulan."' and Tahun = '".$Tahun."'";
			return $this->db->query($query);	
		}	
		
		public function getDaftarSpekunKembali()
		{
			$this->db->from("MAHASISWA");
			$this->db->where("MAHASISWA.NPM = PEMINJAMAN.NPM_MAHASISWA");
			return $this->db->get($this->table);
		}
		
		public function getDaftarSpekunKembaliNonMahasiswa()
		{
			$this->db->from("NON_MAHASISWA");
			$this->db->where("NON_MAHASISWA.NO_KTP = PEMINJAMAN.ID_NON_MAHASISWA");
			return $this->db->get($this->table);
		}
		
		// + getPeminjamanByKTP(varchar) : Peminjaman
		
		public function getPeminjamanByKTP($NoKTP)
		{
			$this->db->where('No_KTP',$NoKTP);
			return $this->db->get('NON_MAHASISWA');
		}
		// + getPeminjamByKTM(varchar) : Peminjam
		
		public function getPeminjamanByKTM($NoKTM)
		{
			$this->db->where('NPM',$NoKTM);
			return $this->db->get('MAHASISWA');
		}
		
		public function getCountPeminjamanByShelter()
		{
			$query = "SELECT Lokasi_Peminjaman, count(*) as count FROM PEMINJAMAN group by Lokasi_Peminjaman";
			return $this->db->query($query);
		}
		public function getCountPeminjamanByShelterUsingTanggal($tanggal, $bulan, $tahun)
		{
			$query = "SELECT Lokasi_Peminjaman, count(*) as count from PEMINJAMAN WHERE Tanggal='$tanggal' AND Bulan = '$bulan' AND Tahun = '$tahun' group by Lokasi_Peminjaman";
			return $this->db->query($query);
		}
	}
?>



