<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/
$route['formulir/doInsert'] = 'PeminjamanKhusus_controller/doInsert';
$route['formulir'] = 'PeminjamanKhusus_controller';
$route['penugasan/profile/(:any)'] = 'penugasan/getProfilePetugas/$1';
$route['laporan/peminjaman']='laporan/Peminjaman';
$route['laporan/kerusakan']='laporan/Kerusakan';
$route['laporan/kehilangan']='laporan/kehilangan';
$route['penugasan/shelter'] = 'penugasan/laporan_penugasan';
$route['penugasan/tambah'] = 'penugasan/tambah_penjaga';
$route['penugasan/penjaga'] = 'penugasan/daftar_penjaga';
$route['statistik/kerusakan'] = "statistik/statistik_kerusakan";
$route['statistik/peminjaman'] = "statistik/statistik_peminjaman";
$route['statistik/shelter'] = "statistik/statistik_shelter";
$route['peminjamanKhusus/reviewFormulir'] = 'peminjamanKhusus/reviewFormulir';
$route['peminjamanKhusus/formulir'] = "peminjamanKhusus/formulir";
$route['peminjamanKhusus/list'] = "peminjamanKhusus/listPeminjamanKhusus";
$route['default_controller'] = "home";
$route['404_override'] = '';


/* End of file routes.php */
/* Location: ./application/config/routes.php */
