<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Penjaga_Shelter_Model extends CI_Model 
{
	public $table = 'PENJAGA_SHELTER';
	// getAllPeminjaman() : List<Peminjaman>
	
	// + getPenjagaShelterFromID(id) : Penjaga_Shelter
	public  function getPenjagaShelterFromID($ID_Penjaga)
	{
		$this->db->where('ID_Penjaga', $ID_Penjaga);
		return $this->db->get($this->table);
	}
	
	// + getAllPenjagaShelter() : List<Penjaga_Shelter>
	public function getAllPenjagaShelter()
	{
		return $this->db->get($this->table);
	}
	
	
	// + createNewPenjagaShelter(Penjaga_Shelter)
	
	public function createNewPenjagaShelter($namaPenjaga,$NoKTP,$NoTelp,$Alamat,$Username,$Password,$tanggal)
	{
		$data = array(
				'Nama' => $namaPenjaga,
				'No_KTP' => $NoKTP,
				'No_Hp' => $NoTelp,
				'Alamat' => $Alamat,
				'Username' => $Username,
				'Password' => $Password,
				'Mulai_Bekerja' => $tanggal,
				'Status' => 1);
		return $this->db->insert($this->table,$data);
	}
	
	// + updateStatusPenjagaShelter(Penjaga_Shelter, status) : boolean
	/*
	public function updateStatusPenjagaShelter($ID_Penjaga, $Status)
	{
		$query = "update PENJAGA_SHELTER set status =".$Status." where ID_Penjaga = ".$ID_Penjaga."";
		return $this->db->get($this->table);
	}
	*/
	
	public function updateStatusPenjagaShelter($id, $status)
	{
		$data = array(
			   'Status' => $status ,
			   'Selesai_Bekerja' => date("Y-m-d")
			   );
		$this->db->where('ID_Penjaga',$id);
		$this->db->update($this->table,$data);
	}
		
	public function getLastPeminjamanKhusus()
	{
		$query = "SELECT * FROM PENJAGA_SHELTER ORDER BY ID_Penjaga DESC LIMIT 1";
		return $this->db->query($query);
	}
	public function updatePenjagaShelter($id,$namaPenjaga,$NoKTP,$NoTelp,$Alamat,$Username)
	{
			$data = array(
				'Nama' => $namaPenjaga,
				'No_KTP' => $NoKTP,
				'No_Hp' => $NoTelp,
				'Alamat' => $Alamat,
				'Username' => $Username
				);
			$this->db->where('ID_Penjaga',$id);
			$this->db->update($this->table,$data);
	}
}
?>