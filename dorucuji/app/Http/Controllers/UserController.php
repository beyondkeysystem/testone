<?php namespace Dorucuji\Http\Controllers;

use Dorucuji\Commands\User\SendLostPasswordToUsersEmailCommand;
use Dorucuji\Http\Controllers\Controller;
use Dorucuji\Commands\User\CreateNewUserCommand;
use Dorucuji\Commands\User\LoginUserByCredentialsCommand;
use Dorucuji\Commands\User\LogOutUserCommand;
use Dorucuji\Http\Requests\User\LostPasswordRequest;
use Illuminate\Http\Request;
use Dorucuji\Http\Requests\User\CreateRequest;

use Auth;
use Redirect;
use Flash;

class UsersController extends Controller {

	public function getLogin()
	{
		$this->dispatch(new LogOutUserCommand());

		return view('pages.frontend.login');
	}

	public function postLogin(Request $request)
	{
		$this->dispatch(new LoginUserByCredentialsCommand($request->username, $request->password));

		if(Auth::guest())
		{
			Flash::error('Neplatné p?ihla?ovací údaje.');

			return back()->with('error-login-effect', 'shake-box')->withInput();
		}

		return route('app.dashboard');
	}

	public function getCreate()
	{
		return view('pages.frontend.registration');
	}

	public function postCreate(CreateRequest $request)
	{
		$this->dispatch(new CreateNewUserCommand(
			$request->username,
			$request->full_name,
			$request->email,
			$request->phone,
			$request->password
		));

		return route('app.welcome-message');
	}

	public function getLogout()
	{
		$this->dispatch(new LogOutUserCommand());

		return Redirect::route('user.get.login');
	}

	public function postLostPassword(LostPasswordRequest $request)
	{
		$userExists = $this->dispatch(new SendLostPasswordToUsersEmailCommand($request->email));

		if($userExists === false)
		{
			Flash::error('U?ivatel s touto emailovou adresou nebyl nalezen.');

			return back();
		}

		return view('pages.frontend.password-sent');
	}

	public function getResetPassword($token)
	{
		dd($token);
	}

}
