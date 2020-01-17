<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['default_controller'] = 'main';

//  GLOBAL
$route['logout']            = 'auth/logout';
$route['daftar']            = 'auth/register';
$route['login']             = 'auth/login';
$route['(:any)/login']      = 'auth/login/$1';

//  SUPERADMIN
$route['as']                = 'main/as';
// ===
$route['superadmin/data-member/(:any)/(:any)']    = 'superadmin/CS_panel/$1/data_member/$2';
$route['superadmin/data-provider/(:any)/(:any)']  = 'superadmin/CS_panel/$1/data_provider/$2';
$route['superadmin/(:any)']                       = 'superadmin/CS_main/$1';
$route['superadmin']                              = 'superadmin/CS_main';

//  PROVIDER
$route['p/(:any)']          = 'provider/CP_main/$1';
$route['p']                 = 'provider/CP_main';

//  MEMBER
$route['u/(:any)']          = 'member/CM_main/$1';
$route['u']                 = 'member/CM_main';



$route['404_override']      = '';
$route['translate_uri_dashes'] = TRUE;
