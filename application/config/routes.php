<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['default_controller'] = 'Home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// $route['contact'] = 'Home/contact';
$route['profile'] = 'Home/profile';
$route['view_institution'] = 'Home/view_institution';
$route['add_institution'] = 'Home/add_institution';
$route['update_users/(:any)'] = 'Home/update_users/$1';
$route['deactive_users'] = 'Home/deactive_users';
$route['view_agent'] = 'Home/view_agent';
$route['view_deactive_agent'] = 'Home/deactive_agent';
$route['view_plan'] = 'Home/view_plan';
$route['add_plan'] = 'Home/add_plan';







// $route['project'] = 'Home/project';
// $route['product/(:any)'] = 'Home/product/$1';
// $route['contact'] = 'Home/contact';
// $route['blog'] = 'Home/blog';
// $route['blogdetails/(:any)'] = 'Home/blogdetails/$1';












// $route['lms'] = 'Lms/lms';



