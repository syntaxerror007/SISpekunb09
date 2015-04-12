<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class Kerusakan_Spekun_Model extends CI_Model 
	{
		public $table = 'KERUSAKAN_SPEKUN';
		
		public function getCountSpekunRusak()
		{
			$query = $this->db->query("SELECT DISTINCT(no_spekun) FROM KERUSAKAN_SPEKUN where status = 'rusak'");
				
			//$res = $this->db->query('SELECT COUNT(*) FROM .$query.');
			return $query->num_rows();

		}
		
		public function getAllKerusakanSpekun()
		{
			return $this->db->get($this->table);
		}
		// + getTotalSpekunRusakUsingDate(Date) : int
		public function getTotalSpekunRusakUsingDate($Tanggal, $Bulan, $Tahun)
		{
			$this->db->where('Tanggal',$Tanggal);
			$this->db->where('Bulan',$Bulan);
			$this->db->where('Tahun',$Tahun);
			$result =  $this->db->get($this->table);
			return $result->num_rows();
		}
		// + getTotalSpekunRusakUsingInterval(Start,End) : int
		public function getTotalSpekunRusakUsingInterval($tanggalAwal, $tanggalAkhir, $bulanAwal, $bulanAkhir, $tahunAwal, $tahunAkhir)
		{
			$query = "SELECT * FROM KERUSAKAN_SPEKUN WHERE tahun <= ".$tahunAkhir." AND tahun >= ". $tahunAwal." AND bulan <= ".$bulanAkhir." AND bulan >= ".$bulanAwal." AND Tanggal <= ".$tanggalAkhir. " AND Tanggal >= ".$tanggalAwal."";
			$result = $this->db->query($query);
			return $result->num_rows();
		}
		// + createLaporanKerusakan(IDSpekun,detail):boolean
		public function createLaporanKerusakan($ID_Spekun_Rusak, $Detail, $Tanggal, $Bulan, $Tahun, $No_Spekun)
		{
			$query = "INSERT INTO KERUSAKAN_SPEKUN".
					 "(ID_Spekun_Rusak, Detail, Tanggal, Bulan, Tahun, No_Spekun)".
					 "VALUES".
					 "($ID_Spekun_Rusak, $Detail, $Tanggal, $Bulan, $Tahun, $No_Spekun)";
			return $this->db->query($query);
		}

		public function getStatistikKerusakanMingguan()
		{
			$query = "SELECT Hari, count(*) as count FROM Kerusakan_spekun group by Hari order by Hari";
			return $this->db->query($query);
		}
		
		public function getStatistikKerusakanBulanan()
		{
			$query = "SELECT Bulan, count(*) as count FROM Kerusakan_spekun group by bulan";
			return $this->db->query($query);
		}
		
		public function getStatistikKerusakanTahunan()
		{
			$query = "SELECT Tahun, count(*) as count FROM Kerusakan_spekun group by tahun";
			return $this->db->query($query);
		}
			
	}
?>

