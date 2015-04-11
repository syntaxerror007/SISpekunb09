<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class shelter_model extends CI_Model 
{
    public $table = 'SHELTER';
	// + getID(): int
    public function getID()
	{
        $this->db->where('ID_Shelter',$ID_Shelter);
		return $this->db->get($this->table);
	}
    // + getNamaShelterUsingID(ID) : varchar
    public function getNamaShelterUsingID($ID_Shelter)
	{
        $this->db->select('$Nama');
        $this->db->where('ID_Shelter',$ID_Shelter);
		return $this->db->get($this->table);
	}
}
?>