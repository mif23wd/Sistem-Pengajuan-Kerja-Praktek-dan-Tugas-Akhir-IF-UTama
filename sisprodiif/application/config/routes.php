<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'c_front';
$route['login'] = 'c_front/login';
$route['logout'] = 'c_front/logout';
$route['proseslogin'] = 'c_front/proses_login';
$route['formta'] = 'c_front/formta';
$route['formkp'] = 'c_front/formkp';
$route['cekform'] = 'c_front/cekform';
$route['prodi'] = 'c_prodi';
$route['prodi/tambahakun'] = 'c_prodi/tambahakun';
$route['prodi/tambahdosen'] = 'c_prodi/tambahdosen';
$route['prodi/aformkp'] = 'c_prodi/aformkp';
$route['prodi/aformta'] = 'c_prodi/aformta';
$route['prodi/manajemenakun'] = 'c_prodi/manajemenakun';
$route['prodi/datadosen'] = 'c_prodi/datadosen';
$route['prodi/editakun'] = 'c_prodi/editakun';
$route['prodi/listpengajuankp'] = 'c_prodi/listpengajuankp';
$route['prodi/listpengajuanta'] = 'c_prodi/listpengajuanta';
$route['prodi/listkp'] = 'c_prodi/listkp';
$route['prodi/listta'] = 'c_prodi/listta';
$route['prodi/tambahkp'] = 'c_prodi/tambahkp';
$route['prodi/tambahta'] = 'c_prodi/tambahta';
$route['prodi/setting'] = 'c_prodi/setting';
$route['admin'] = 'c_admin';
$route['admin/tambahakun'] = 'c_admin/tambahakun';
$route['admin/tambahdosen'] = 'c_admin/tambahdosen';
$route['admin/aformkp'] = 'c_admin/aformkp';
$route['admin/aformta'] = 'c_admin/aformta';
$route['admin/manajemenakun'] = 'c_admin/manajemenakun';
$route['admin/datadosen'] = 'c_admin/datadosen';
$route['admin/listpengajuankp'] = 'c_admin/listpengajuankp';
$route['admin/listpengajuanta'] = 'c_admin/listpengajuanta';
$route['admin/listkp'] = 'c_admin/listkp';
$route['admin/listta'] = 'c_admin/listta';
$route['admin/tambahkp'] = 'c_admin/tambahkp';
$route['admin/tambahta'] = 'c_admin/tambahta';
$route['admin/setting'] = 'c_admin/setting';
$route['dosen/tugasakhir'] = 'c_dosen/tugasakhir';
$route['dosen/kerjapraktek'] = 'c_dosen/kerjapraktek';
$route['dosen/konsentrasi'] = 'c_dosen/konsentrasi';
$route['dosen/setting'] = 'c_dosen/setting';
$route['404_override'] = 'c_front/error';
$route['translate_uri_dashes'] = FALSE;
