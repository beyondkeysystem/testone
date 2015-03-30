<?php

Route::get('prihlasit-se', [
	'uses' => 'UsersController@getLogin',
	'as' => 'user.get.login'
]);

Route::post('prihlasit-se', [
	'uses' => 'UsersController@postLogin',
	'as' => 'user.post.login'
]);

Route::get('registrace', [
	'uses' => 'UsersController@getCreate',
	'as' => 'user.get.registration'
]);

Route::post('registrace', [
	'uses' => 'UsersController@postCreate',
	'as' => 'user.post.registration'
]);

Route::get('odhlasit-se', [
	'uses' => 'UsersController@getLogout',
	'as' => 'user.get.logout'
]);

Route::post('zapomenute-heslo', [
	'uses' => 'UsersController@postLostPassword',
	'as' => 'user.post.lost-password'
]);

Route::get('obnova-hesla/{any}', [
	'uses' => 'UsersController@getResetPassword',
	'as' => 'user.get.reset-password'
]);

/* Delete only for coding */

Route::get('/', function(){
	return Redirect::route('user.get.login');
});