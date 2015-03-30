<?php namespace Dorucuji\Commands\User;

use Dorucuji\Commands\Command;

use Dorucuji\Http\Modules\User\UserModule;
use Illuminate\Contracts\Bus\SelfHandling;
use Auth;

class LoginUserByCredentialsCommand extends Command implements SelfHandling {

	private $username;
	private $password;

	public function __construct($username, $password)
	{
		$this->username = $username;
		$this->password = $password;
	}

	/**
	 * Execute the command.
	 *
	 * @return void
	 */
	public function handle(UserModule $user)
	{
		$user->loginByCredentials($this->username, $this->password);
	}

}
