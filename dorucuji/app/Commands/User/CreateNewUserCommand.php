<?php namespace Dorucuji\Commands\User;

use Dorucuji\Commands\Command;

use Dorucuji\Http\Modules\User\UserModule;
use Illuminate\Contracts\Bus\SelfHandling;

use App;
use Auth;
use Hash;

class CreateNewUserCommand extends Command implements SelfHandling {

	private $username;
	private $full_name;
	private $email;
	private $phone;
	private $password;

	function __construct($username, $full_name, $email, $phone, $password)
	{
		$this->username = $username;
		$this->full_name = $full_name;
		$this->email = $email;
		$this->phone = $phone;
		$this->password = $password;
	}


	/**
	 * Execute the command.
	 *
	 * @return void
	 */
	public function handle(UserModule $userModule)
	{
		$user = $userModule->createNew($this->username, $this->full_name, $this->email, $this->phone, $this->password);

		$userModule->loginById($user->id);

		if(Auth::guest())
		{
			App:abort(404, 'User has to be logined but he isn\'t');
		}

		return $user;
	}

}