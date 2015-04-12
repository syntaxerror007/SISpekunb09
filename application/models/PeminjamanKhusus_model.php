<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class PeminjamanKhusus_model extends Model{
	
  function books_model(){
	parent::Model();
	$this->load->helper('url');				
  }
	
  function peminjamanKhusus($Nama, $Organisasi, $Jumlah_Spekun, $Jam_Awal, $Jam_Akhir, $Keterangaan, $Tanggal, $Bulan, $Tahun, $ID_Admin)
    {                       
        $data['Nama']	 	= 'Nama';
        $data['Organisasi']	 	= 'Organisasi';
        $data['Jumlah_Spekun']	= 'Jumlah_Spekun';				
        $data['Jam_Awal']	 	= 'Jam_Awal';
        $data['Jam_Akhir']	 	= 'Jam_Akhir';
        $data['Keterangan']	= 'Keterangan';	
        $data['Tanggal']	 	= array('1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5','6'=>'6','7'=>'7','8'=>'8','9'=>'9','10'=>'10','11'=>'11','12'=>'12','13'=>'13','14'=>'14','15'=>'15','16'=>'16','17'=>'17','18'=>'18','19'=>'19','20'=>'20','21'=>'21','22'=>'22','23'=>'23','24'=>'24','25'=>'25','26'=>'26','27'=>'27','28'=>'28','29'=>'29','30'=>'30','31'=>'31');
        data['Bulan']	 	= array('1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5','6'=>'6','7'=>'7','8'=>'8','9'=>'9','10'=>'10','11'=>'11','12'=>'12');
        $data['Tahun']	 	= array('2014'=>'2014',
                                    '2015'=>'2015');
        $data['ID_Admin']	= 'ID_Admin';	                            
            
        $this->db->insert($this->table,$data);
    }
    	public function addPeminjamanKhusus($Id_Peminjaman_Khusus, $Nama, $Organisasi, $Jumlah_Spekun, $Jam_Awal, $Jam_Akhir, $Keterangaan, $Tanggal, $Bulan, $Tahun, $ID_Admin)
		{
			$data = array(
				   'Nama' => $Nama ,
				   'Organisasi' => $Organisasi ,
				   'Jumlah_spekun' => $Jumlah_Spekun,
				   'Jam_Awal' => $Jam_Awal,
				   'Jam_Akhir' => $Jam_Akhir,
				   'Keterangan' => $Keterangan,
				   'Tahun' => $Tahun,
				   'Tanggal' => $Tanggal,
				   'Bulan' => $Bulan,
                   'ID_Admin' => $ID_Admin
                   
				);
			$this->db->where('Id_Peminjaman_Khusus',$Id_Peminjaman_Khusus);
			$this->db->update($this->table,$data);
		
		}
		public function getAllPeminjamanKhusus()
		{
			return $this->db->get($this->table);
		}
	}	
}
?>
