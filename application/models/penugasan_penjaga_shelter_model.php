	<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class penugasan_penjaga_shelter_model extends CI_Model 
	{
		public $table = 'PENUGASAN_PENJAGA_SHELTER';

	    // + getAllPenugasan() : List<Penugasan>
	    public function getAllPenugasan()
		{
			return $this->db->get($this->table);
		}

	    // + createNewPenugasan(Penugasan) : boolean
	    public function createNewPenugasan($ID_Shelter, $ID_Penjaga, $Tanggal, $Bulan, $Tahun, $No_Device)
		{
			$query = "INSERT INTO PENUGASAN_PENJAGA_SHELTER".
	                 "(ID_Shelter, ID_Penjaga, Tanggal, Bulan, Tahun, No_Device)".
	                 "VALUES".
	                 "$ID_Shelter, $ID_Penjaga, $Tanggal, $Bulan, $Tahun, $No_Device";
			return $this->db->query($query);
		}
	    
	    // + getAllPenugasanUsingDate(date) : List<Penugasan>
	    public function getAllPenugasanUsingDate($Tanggal, $Bulan, $Tahun)
		{
			$this->db->where('Tanggal',$Tanggal);
			$this->db->where('Bulan',$Bulan);
			$this->db->where('Tahun',$Tahun);
			$this->db->where('Shelter',$Shelter);
			return $this->db->get($this->table);
		}
	    
	    public function getAllPenugasanAndPetugasUsingDate($Tanggal,$Bulan,$Tahun)
	    {
	    	$query = "Select SHELTER.Nama as NamaShelter, PENJAGA_SHELTER.Nama as NamaPenjaga, No_Device, PENJAGA_SHELTER.ID_PENJAGA as IDPenjaga, SHELTER.ID_Shelter from SHELTER, PENJAGA_SHELTER, PENUGASAN_PENJAGA_SHELTER WHERE SHELTER.ID_Shelter = PENUGASAN_PENJAGA_SHELTER.ID_Shelter AND PENUGASAN_PENJAGA_SHELTER.ID_PENJAGA = PENJAGA_SHELTER.ID_PENJAGA AND Tanggal = $Tanggal AND Bulan = $Bulan AND Tahun = $Tahun";
			return $this->db->query($query);
	    }
	    public function getAllPenugasanAndPetugas()
	    {
	    	$query = "Select SHELTER.Nama as NamaShelter, PENJAGA_SHELTER.Nama as NamaPenjaga, No_Device, PENJAGA_SHELTER.ID_PENJAGA as IDPenjaga, SHELTER.ID_Shelter from SHELTER, PENJAGA_SHELTER, PENUGASAN_PENJAGA_SHELTER WHERE SHELTER.ID_Shelter = PENUGASAN_PENJAGA_SHELTER.ID_Shelter AND PENUGASAN_PENJAGA_SHELTER.ID_PENJAGA = PENJAGA_SHELTER.ID_PENJAGA";
			return $this->db->query($query);
	    }
	    // + getAllPenjagaShelter() : List<Penjaga_Shelter>
	    public function getAllPenjagaShelter()
		{
	        return $this->db->get('PENJAGA_SHELTER');
	    }    
	}
?>
