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
$route['admin/login/validate_credentials_admin'] = 'user/validate_credentials_admin';
//Code By Me Start
$route['admin/property'] = 'admin_property/index';
$route['chart'] = 'home/chart';
$route['admin/property/add'] = 'admin_property/add';
$route['admin/property/update'] = 'admin_property/update';
$route['admin/property/block_selling_property/(:any)'] = 'admin_property/block_selling_property/$1';
$route['admin/property/update/(:any)'] = 'admin_property/update/$1';
$route['admin/property/delete/(:any)'] = 'admin_property/delete/$1';
$route['admin/property/revert/(:num)'] = 'admin_property/revert/$1';
$route['admin/property/view/(:any)'] = 'admin_property/view/$1'; //Mayank Pawar
$route['admin/property/share_list/(:any)'] = 'admin_property/share_list/$1'; //Mayank Pawar
$route['admin/property/withdraw'] = 'admin_property/withdraw';
$route['admin/property/withdraw/(:any)'] = 'admin_property/withdraw/$1'; 
$route['admin/property/(:any)'] = 'admin_property/index/$1'; //$1 = page number
//Code By Me End

$route['admin/transaction_fees'] = 'admin_transactionfees/index';
$route['admin/transaction_fees/add'] = 'admin_transactionfees/add';
$route['admin/transaction_fees/update'] = 'admin_transactionfees/update';
$route['admin/transaction_fees/update/(:any)'] = 'admin_transactionfees/update/$1';
$route['admin/transaction_fees/delete/(:any)'] = 'admin_transactionfees/delete/$1';
$route['admin/transaction_fees/(:any)'] = 'admin_transactionfees/index/$1'; //$1 = page number

$route['admin/credit_price'] = 'admin_credit_price/index';
$route['admin/credit_price/add'] = 'admin_credit_price/add';
$route['admin/credit_price/update'] = 'admin_credit_price/update';
$route['admin/credit_price/update/(:any)'] = 'admin_credit_price/update/$1';
$route['admin/credit_price/delete/(:any)'] = 'admin_credit_price/delete/$1';
$route['admin/credit_price/(:any)'] = 'admin_credit_price/index/$1'; //$1 = page number

$route['admin/user_credit'] = 'admin_user_credit/index';
$route['admin/user_credit/add'] = 'admin_user_credit/add';
$route['admin/user_credit/detail'] = 'admin_user_credit/detail';
$route['admin/user_credit/detail/(:num)'] = 'admin_user_credit/detail/$1';
$route['admin/user_credit/detail/(:num)/(:num)'] = 'admin_user_credit/detail/$1/$2';

$route['admin/user_credit/update'] = 'admin_user_credit/update';
$route['admin/user_credit/update/(:any)'] = 'admin_user_credit/update/$1';
$route['admin/user_credit/delete/(:any)'] = 'admin_user_credit/delete/$1';
$route['admin/user_credit/(:any)'] = 'admin_user_credit/index/$1'; //$1 = page number

$route['admin/manufacturers'] = 'admin_manufacturers/index';
$route['admin/manufacturers/add'] = 'admin_manufacturers/add';
$route['admin/manufacturers/update'] = 'admin_manufacturers/update';
$route['admin/manufacturers/update/(:any)'] = 'admin_manufacturers/update/$1';
$route['admin/manufacturers/delete/(:any)'] = 'admin_manufacturers/delete/$1';
$route['admin/manufacturers/(:any)'] = 'admin_manufacturers/index/$1'; //$1 = page number


$route['admin/user'] = 'admin_user/index';
$route['admin/user/(:num)'] = 'admin_user/index/$1';
$route['admin/user/update'] = 'admin_user/update';
$route['admin/user/update/(:any)'] = 'admin_user/update/$1';
$route['admin/user/delete'] = 'admin_user/delete';
$route['admin/user/delete/(:any)'] = 'admin_user/delete/$1';
$route['admin/user/add'] = 'admin_user/add';
$route['admin/user/view'] = 'admin_user/view';
$route['admin/user/view/(:any)'] = 'admin_user/view/$1';
$route['admin/user/deposit'] = 'admin_user/success_deposit';
$route['admin/user/deposit/(:any)'] = 'admin_user/success_deposit/$1';
$route['admin/pending_user'] = 'admin_user/pending_user';

$route['admin/user/withdraw'] = 'admin_user/success_withdraw';
$route['admin/user/withdraw/(:any)'] = 'admin_user/success_withdraw/$1';
$route['admin/user/transaction_log'] = 'admin_user/fundlog';
$route['admin/user/transaction_log/(:any)'] = 'admin_user/fundlog/$1';
$route['admin/user/shares'] = 'admin_user/shares';
$route['admin/user/freeze/(:any)'] = 'admin_user/freeze/$1';
$route['admin/user/shares'] = 'admin_user/shares';
$route['admin/user/shares/(:any)'] = 'admin_user/shares/$1';

$route['admin/roles'] = 'admin_roles/index';

$route['admin/roles/update'] = 'admin_roles/update';
$route['admin/roles/update/(:any)'] = 'admin_roles/update/$1';


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
$route['contact/(:any)'] = 'home/contact';
$route['contact'] = 'home/contact';
$route['property_listing'] = 'property_listing/index';
$route['property_listing/(:any)'] = 'property_listing/index/$1';
$route['register'] = 'user/register';
$route['user/register_member'] = 'user/register_member';
$route['user/validate_credentials_user'] = 'user/validate_credentials_user';
$route['dashboard'] = 'home/dashboard';
$route['dashboard/(:any)'] = 'home/dashboard/$1/$2';
$route['home/dashboard/(:any)'] = 'home/redirect';
$route['my_profile'] = 'user/my_profile';
$route['my_profile/(:any)'] = 'user/my_profile/$1';
$route['my_profile_update'] = 'user/my_profile_update';


$route['success'] = 'user/success';
$route['tickets'] = 'index';
$route['paid'] = 'user/paid';
$route['account'] = 'user/account';
$route['normal'] = 'user/normal';
// $route['property_details'] = 'property_listing/property_details';
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
$route['admin/profit_and_loss_logs/listproperty'] = 'admin_profit_and_loss_logs/list_by_property';
$route['admin/profit_and_loss_logs/listproperty/(:any)'] = 'admin_profit_and_loss_logs/list_by_property/$1';

/* End of file routes.php */
/* Location: ./application/config/routes.php */


$route['admin/user_property'] = 'admin_user_property/index';
$route['admin/user_property/add'] = 'admin_user_property/add';
$route['admin/user_property/update'] = 'admin_user_property/update';
$route['admin/user_property/update/(:any)'] = 'admin_user_property/update/$1';
$route['admin/user_property/delete/(:any)'] = 'admin_user_property/delete/$1';
$route['admin/user_property/(:any)'] = 'admin_user_property/index/$1'; //$1 = page number


//Code by Mayank
$route['admin/profit_and_loss_fund_manage'] = 'admin_profit_and_loss_fund_management/index';
$route['admin/profit_and_loss_fund_manage/(:any)'] = 'admin_profit_and_loss_fund_management/index/$1';
$route['admin/profit_and_loss_fund_manage/action'] = 'admin_profit_and_loss_fund_management/action';


$route['admin/news/viewmessage/(:any)'] = 'news/viewmessage/$1';
$route['admin/news'] = 'news/index';
$route['admin/news/(:any)'] = 'news/index/$1';
$route['admin/news/add'] = 'news/add';
$route['admin/news/edit/(:any)'] = 'news/edit/$1';
$route['admin/news/delete/(:any)'] = 'news/delete/$1';


$route['transaction/pending_deposit'] = 'transaction/pending_deposit';
$route['transaction/pending_withdraw'] = 'transaction/pending_withdraw';
$route['transaction/success_deposit'] = 'transaction/success_deposit';
$route['transaction/success_withdraw'] = 'transaction/success_withdraw';
$route['transaction/update'] = 'transaction/update';
$route['transaction/fundlog'] = 'transaction/fundlog';


$route['purchase_credit/success_payment/(:any)'] = 'purchase_credit/success_payment/$1';

$route['purchase_credit/success_payment'] = 'purchase_credit/success_payment';
$route['transaction/payment_approve/(:any)'] = 'transaction/payment_approve/$1';
$route['transaction/update_withdraw_pay/(:any)'] = 'transaction/update_withdraw_pay/$1';

$route['admin/property/finalize/(:num)'] = 'admin_property/finalize/$1'; //$1 = page number

$route['registration_success'] = 'user/registration_success';

//$route ['404_override'] = 'property_details';
$route['transaction/transaction_autotrack_log'] = 'transaction/transaction_autotrack_log';

$route['transaction/transaction_autotrack_log/(:any)'] = 'transaction/transaction_autotrack_log/$1';

/* End of file routes.php */
/* Location: ./application/config/routes.php */



