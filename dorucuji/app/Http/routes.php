<?php

Route::get('/', [
	'as' => 'login', function() {return view('pages.frontend.login'); }
]);

Route::get('prihlasit-se', [
	'as' => 'login', function() {return view('pages.frontend.login'); }
]);

Route::get('registrace', [
	'as' => 'registration', function() {return view('pages.frontend.registration'); }
]);

Route::get('email', [
	function() {return view('pages.frontend.password-sent'); }
]);