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
$route['admin'] = "admin/user";
$route['default_controller'] = "home";
$route['comprar'] = "home/promo_landing";
$route['404_override'] = '';
$route['pronosticos'] = "home/prognostics";
$route['mi-pronostico'] = "home/prognostics/initial/1";
$route['badges'] = "home/badges";
$route['como-jugar'] = "home/how_to_play";
$route['premios'] = "home/prizes";
$route['comprar'] = "home/comprar";
$route['pronostico-fase-inicial'] = "home/prognostics/initial/";
$route['pronostico-fase-final'] = "home/prognostics/final/";
$route['usuario/editar-perfil'] = "usuario/editar_perfil";
$route['muro'] = "home/wall";
$route['muro/(:num)'] = "home/wall/$1";
$route['mi-cuenta'] = "home/profile/";
$route['perfil/(:num)/(:any)'] = "home/profile/$1/$2";
$route['editar-cuenta'] = "home/edit_profile/";
//$route['empresa/(:any)'] = "home/company/$1";
$route['completar-registro'] = "home/complete_register/";
$route['editar-grupo'] = "home/edit_company/";
$route['mi-grupo'] = "home/view_company/";
$route['log-in'] = "home/login/";
$route['log-out'] = "home/logout/";
$route['olvide-mi-clave'] = "front_user/forgot_password/";
$route['generame-la-clave/(:any)'] = "front_user/recover_password/$1";
$route['reglamento'] = "home/how_to_play/text";
$route['confirmar-cuenta/(:any)'] = "home/confirm_account/$1";
$route['cambiar-idioma/(:any)'] = "home/language/$1";
$route['check-company-availability'] = "home/check_company_availability";
$route['check-code'] = "home/validate_code";


$route['posiciones'] = "home/scores/0";
$route['posiciones/(:num)'] = "home/scores/0/0/0/$1";
$route['posiciones/(:any)/(:num)'] = "home/scores/$1/0/0/$2";
$route['posiciones/(:any)/(:any)/(:any)/(:num)'] = "home/scores/$1/$2/$3/$4";

$route['posiciones/(:num)/(:any)/'] = "home/scores/$1/$2";



$route['admin/olvide-la-clave'] = "admin/user/forgot_password/";
$route['admin/generame-la-clave/(:any)'] = "admin/user/recover_password/$1";

/* End of file routes.php */
/* Location: ./application/config/routes.php */