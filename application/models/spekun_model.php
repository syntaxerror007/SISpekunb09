<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class spekun_model extends CI_Model 
{
    public $table = 'SPEKUN';
	// getNoSpekun() int
	public function getNoSpekun($No_Spekun)
	{
        $this->db->where('No_Spekun',$No_Spekun);
		return $this->db->get($this->table);
	}
}
?>
