<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Penjaga_Shelter_Model extends CI_Model 
{
	public $table = 'PENJAGA_SHELTER';
	// getAllPeminjaman() : List<Peminjaman>
	
	// + getPenjagaShelterFromID(id) : Penjaga_Shelter
	public  function getPenjagaShelterFromID($ID_Penjaga, $Nama)
	{
		$this->db->select('$Nama');
		$this->db->where('ID_Penjaga', $ID_Penjaga);
		return $this->db->get($this->table);
	}
	
	// + getAllPenjagaShelter() : List<Penjaga_Shelter>
	public function getAllPenjagaShelter()
	{
		return $this->db->get($this->table);
	}
	
	// + updateStatusPenjagaShelter(Penjaga_Shelter, status) : boolean
	public function updateStatusPenjagaShelter($ID_Penjaga, $Status)
	{
		$query = "update PENJAGA_SHELTER set status =".$Status." where ID_Penjaga = ".$ID_Penjaga."";
		return $this->db->get($this->table);
	}
	// + createNewPenjagaShelter(Penjaga_Shelter)
	
	public function createNewPenjagaShelter($namaPenjaga,$NoKTP,$NoTelp,$Alamat,$Username,$Password)
	{
		$data = array(
				'Nama' => $namaPenjaga,
				'No_KTP' => $NoKTP,
				'No_Hp' => $NoTelp,
				'Alamat' => $Alamat,
				'Username' => $Username,
				'Password' => $Password);
		return $this->db->insert($this->table,$data);
	}
}
?>
