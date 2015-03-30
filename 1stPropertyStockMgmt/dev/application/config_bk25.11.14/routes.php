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
$route['default_controller'] = 'user/index';
$route['404_override'] = '';

/*admin*/
//$route['default_controller'] = 'home/index';
$route['admin'] = 'user/index';
$route['user/login'] = 'user/index';
$route['admin/signup'] = 'user/signup';
$route['admin/create_member'] = 'user/create_member';
$route['admin/login'] = 'user/admin';
$route['admin/logout'] = 'user/logout';
$route['admin/login/validate_credentials'] = 'user/validate_credentials';
//Code By Me Start
$route['admin/property'] = 'admin_property/index';
$route['admin/property/add'] = 'admin_property/add';
$route['admin/property/update'] = 'admin_property/update';
$route['admin/property/update/(:any)'] = 'admin_property/update/$1';
$route['admin/property/delete/(:any)'] = 'admin_property/delete/$1';
$route['admin/property/withdraw'] = 'admin_property/withdraw';
$route['admin/property/withdraw/(:any)'] = 'admin_property/withdraw/$1'; 
$route['admin/property/(:any)'] = 'admin_property/index/$1'; //$1 = page number
//Code By Me End

$route['admin/transactionfees'] = 'admin_transactionfees/index';
$route['admin/transactionfees/add'] = 'admin_transactionfees/add';
$route['admin/transactionfees/update'] = 'admin_transactionfees/update';
$route['admin/transactionfees/update/(:any)'] = 'admin_transactionfees/update/$1';
$route['admin/transactionfees/delete/(:any)'] = 'admin_transactionfees/delete/$1';
$route['admin/transactionfees/(:any)'] = 'admin_transactionfees/index/$1'; //$1 = page number

$route['admin/credit_price'] = 'admin_credit_price/index';
$route['admin/credit_price/add'] = 'admin_credit_price/add';
$route['admin/credit_price/update'] = 'admin_credit_price/update';
$route['admin/credit_price/update/(:any)'] = 'admin_credit_price/update/$1';
$route['admin/credit_price/delete/(:any)'] = 'admin_credit_price/delete/$1';
$route['admin/credit_price/(:any)'] = 'admin_credit_price/index/$1'; //$1 = page number

$route['admin/user_credit'] = 'admin_user_credit/index';
$route['admin/user_credit/add'] = 'admin_user_credit/add';
$route['admin/user_credit/detail'] = 'admin_user_credit/detail';
$route['admin/user_credit/detail/(:any)'] = 'admin_user_credit/detail/$1';
$route['admin/user_credit/update'] = 'admin_user_credit/update';
$route['admin/user_credit/update/(:any)'] = 'admin_user_credit/update/$1';
$route['admin/user_credit/delete/(:any)'] = 'admin_user_credit/delete/$1';
$route['admin/user_credit/(:any)'] = 'admin_credit_price/index/$1'; //$1 = page number

$route['admin/manufacturers'] = 'admin_manufacturers/index';
$route['admin/manufacturers/add'] = 'admin_manufacturers/add';
$route['admin/manufacturers/update'] = 'admin_manufacturers/update';
$route['admin/manufacturers/update/(:any)'] = 'admin_manufacturers/update/$1';
$route['admin/manufacturers/delete/(:any)'] = 'admin_manufacturers/delete/$1';
$route['admin/manufacturers/(:any)'] = 'admin_manufacturers/index/$1'; //$1 = page number


$route['admin/user'] = 'admin_user/index';
$route['admin/user/update'] = 'admin_user/update';
$route['admin/user/update/(:any)'] = 'admin_user/update/$1';

$route['admin/roles'] = 'admin_roles/index';
$route['admin/roles/update'] = 'admin_roles/update';
$route['admin/roles/update/(:any)'] = 'admin_roles /update/$1';


$route['admin/userinvestment'] = 'admin_userinvestment/index';
$route['admin/userinvestment/update'] = 'admin_userinvestment/update';
$route['admin/userinvestment/update/(:any)'] = 'admin_userinvestment/update/$1';


$route['admin/property_type'] = 'admin_property_type/index';
$route['admin/property_type/add'] = 'admin_property_type/add';
$route['admin/property_type/update'] = 'admin_property_type/update';
$route['admin/property_type/update/(:any)'] = 'admin_property_type/update/$1';
$route['admin/property_type/delete/(:any)'] = 'admin_property_type/delete/$1';
$route['admin/property_type/(:any)'] = 'admin_property_type/index/$1'; //$1 = page number


$route['admin/share_limit'] = 'admin_share_limit/index';
$route['admin/share_limit/add'] = 'admin_share_limit/add';
$route['admin/share_limit/update'] = 'admin_share_limit/update';
$route['admin/share_limit/update/(:any)'] = 'admin_share_limit/update/$1';
$route['admin/share_limit/delete/(:any)'] = 'admin_share_limit/delete/$1';
$route['admin/share_limit/(:any)'] = 'admin_share_limit/index/$1'; //$1 = page number

$route['about'] = 'home/about';
$route['contact'] = 'home/contact';
$route['property_listing'] = 'property_listing/index';
$route['property_listing/(:any)'] = 'property_listing/index/$1';
$route['register'] = 'user/register';
$route['user/register_member'] = 'user/register_member';
$route['user/validate_credentials_user'] = 'user/validate_credentials_user';
$route['dashboard'] = 'home/dashboard';
$route['my_profile'] = 'user/my_profile';
$route['my_profile/(:any)'] = 'user/my_profile/$1';
$route['my_profile_update/(:any)'] = 'user/my_profile_update/$1';


$route['success'] = 'user/success';
$route['tickets'] = 'index';
$route['paid'] = 'user/paid';
$route['account'] = 'user/account';
$route['normal'] = 'user/normal';
$route['property_details'] = 'property_listing/property_details';
$route['property_details/(:any)'] = 'property_listing/property_details/$1';

$route['logout'] = 'user/logout';
$route['credit'] = 'purchase_credit/index';
$route['credit_detail'] = 'purchase_credit/detail';
$route['purchase_credit/pay_credit'] = 'purchase_credit/pay_credit';
$route['paid_credit'] = 'purchase_credit/paid_credit';
$route['paid_credit/(:any)'] = 'purchase_credit/paid_credit/$1';

$route['success_credit'] = 'purchase_credit/success_credit';
$route['forget'] = 'user/forget';
$route['doforget'] = 'user/doforget';

$route['property_investment'] = 'home/property_investment';
$route['property_payment'] = 'home/property_payment';
$route['property_listing/sell_property'] = 'property_listing/sell_property';

$route['admin/withdraw'] = 'admin_withdraw/index';
$route['admin/withdraw/update'] = 'admin_withdraw/update';
$route['admin/withdraw/update/(:any)'] = 'admin_withdraw/update/$1';
//Code By Me Start
$route['admin/withdrawadmin'] = 'admin_withdraw/withdrawadmin';

//Code By Me End

$route['admin/share_limit/property'] = 'admin_share_limit/property';

$route['admin/profit_and_loss_logs'] = 'admin_profit_and_loss_logs/index';
$route['admin/profit_and_loss_logs/add'] = 'admin_profit_and_loss_logs/add';
$route['admin/profit_and_loss_logs/update'] = 'admin_profit_and_loss_logs/update';
$route['admin/profit_and_loss_logs/update/(:any)'] = 'admin_profit_and_loss_logs/update/$1';
$route['admin/profit_and_loss_logs/delete/(:any)'] = 'admin_profit_and_loss_logs/delete/$1';
$route['admin/profit_and_loss_logs/(:any)'] = 'admin_profit_and_loss_logs/index/$1'; //$1 = page number
$route['admin/profit_and_loss_logs/property'] = 'admin_profit_and_loss_logs/property';

/* End of file routes.php */
/* Location: ./application/config/routes.php */