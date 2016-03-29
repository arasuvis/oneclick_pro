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

$route['default_controller'] = "user";
$route['404_override'] = '';

/*** User Registartion & login ***/

$route['reg'] = "user/reg_details";
$route['registration'] = "user/register";
$route['user_login'] = "user/login";
$route['credentials'] = "user/credentials";
$route['logout'] = "user/logout";
$route['dashboard'] = "user/dashboard";

/*** End User Registration  & Login ***/

/*** Property routes ***/

$route['property'] = "users/property";
$route['add_immov'] = "users/property/add_immov_property";
$route['display_immov'] = "users/property/display_immov_prop";

$route['mov_form'] = "users/property/movable_form";
$route['add_mov'] = "users/property/add_movable_property";
$route['display_mov'] = "users/property/display_mov_prop";

$route['property_list'] = "users/property/get_all_property_details";


/*** End Property ***/


/*** Family routes ***/

$route['family'] = "users/family";

/*** End Property ***/
/* End of file routes.php */
/* Location: ./application/config/routes.php */