<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class PeminjamanKhusus_controller extends Controller{

  function Peminjaman_Khusus(){
	parent::Controller();
  }
	
  function main(){
	$this->load->model('PeminjamanKhusus_model');
	$data = $this->PeminjamanKhusus_model->peminjamanKhusus();
		
	$this->load->view('Peminjaman_khusus_main',$data);
  }
	
  function input(){
	$this->load->helper('form');  
	$this->load->model('PeminjamanKhusus_model');
	$data = $this->PeminjamanKhusus_model->addPeminjamanKhusus();
				
	$this->load->view('Peminjaman_khusus_input',$data);	
  }
}
?>	