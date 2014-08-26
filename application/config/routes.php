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

$route['default_controller'] = "c_home";
$route['404_override'] = '';
$route['home'] = "c_home";
$route['experiences'] = "c_experience/index/0";
$route['experiences/(:num)'] = "c_experience/index/$1";
$route['experience/(:num)'] = "c_experience/experience/$1";
$route['experience_ajax/(:num)'] = "c_experience/experience_ajax/$1";
$route['experience/dixExperienceAjax'] = "c_experience/dixExperienceAjax";
$route['jeu'] = "c_home/jeu";
$route['meilleur_eco_acteur'] = "c_experience/best_actor";
$route['projet'] = "c_home/projet";
$route['jeparticipe'] = "c_jeparticipe";
$route['application_mobile'] = "c_home/appli";
$route['actualite/(:num)'] = "c_actualite/actualite/$1";
$route['mentions_legales'] = "c_home/mentions";
$route['contact'] = "c_contact";


/* Routes pour l'administration */
$route['admin'] = "admin/index";
$route['admin/logout'] = "admin/index/logout";
$route['admin/messages'] = "admin/message/index/0";
$route['admin/messages/(:num)'] = "admin/message/index/$1";
$route['admin/message/supprimer/(:num)'] = "admin/message/supprimer/$1";
$route['admin/message/update/(:num)'] = "admin/message/update/$1";
$route['admin/message/(:num)'] = "admin/message/read/$1";
$route['admin/experiences'] = "admin/experience/index/0";
$route['admin/experiences/(:num)'] = "admin/experience/index/$1";
$route['admin/experience/publish/(:num)'] = "admin/experience/publish/$1";
$route['admin/experience/update/(:num)'] = "admin/experience/update/$1";
$route['admin/actualites'] = "admin/actualite/index/0";
$route['admin/actualites/(:num)'] = "admin/actualite/index/$1";
$route['admin/actualite'] = "admin/actualite/create";
$route['admin/actualite/supprimer/(:num)'] = "admin/actualite/supprimer/$1";
$route['admin/actualite/update/(:num)'] = "admin/actualite/update/$1";
$route['admin/commentaires'] = "admin/commentaire/index/0";
$route['admin/commentaires/(:num)'] = "admin/commentaire/index/$1";
$route['admin/commentaire/update/(:num)'] = "admin/commentaire/update/$1";
$route['admin/erreur'] = "admin/index/erreur";

/* End of file routes.php */
/* Location: ./application/config/routes.php */