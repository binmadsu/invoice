<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
$route['default_controller'] = 'admin';
$route['pages/(:any)'] = 'pages/index/$1';
$route['admin/recivedstock/(:num)'] = 'admin/recivedstock/index/$1';
$route['user/profile'] = "login/updateprofile";
$route['user/logout'] = "logout/index";
/*$route['user/post-wedding'] = "postmarriage/index";
$route['user/hosted-weddings'] = "postmarriage/hostedweddings";
$route['user/hosted-weddings/(:num)'] = "postmarriage/hostedweddings/$1";
$route['wedding/detail/(:any)'] = "postmarriage/detail/$1";
$route['wedding/edit/(:num)'] = "postmarriage/edit/$1";

$route['upcoming-weddings'] = "postmarriage/upcomingweddings";
$route['upcoming-weddings/(:num)'] = "postmarriage/upcomingweddings/$1";
$route['upcoming-weddings/(:num)/(:any)'] = "postmarriage/upcomingweddings/$1/$2";
$route['upcoming-weddings/(:num)/(:any)/(:num)'] = "postmarriage/upcomingweddings/$1/$2/$3";

$route['confirmmember/(:any)'] = "registration/confirmmember/$1";

$route['refunds-cancellation'] = "refunds/index";*/
/*$route['admin/(:any)'] = 'admin/$1';
$route['package/(:any)'] = 'package/index/$1';
$route['package/(:any)/(:num)/(:any)/(:any)/(:any)/(:any)'] = "package/index/$1/$2/$3/$4/$5/$6";
$route['package/(:any)/(:num)'] = "package/index/$1/$2";*/
$route['404_override'] = 'notfound';
$route['translate_uri_dashes'] = FALSE;