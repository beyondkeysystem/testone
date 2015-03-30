<?php namespace Dorucuji\Commands\User;

use Dorucuji\Commands\Command;

use Dorucuji\Http\Modules\User\UserModule;
use Illuminate\Contracts\Bus\SelfHandling;

class LogOutUserCommand extends Command implements SelfHandling {

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		//
	}

	/**
	 * Execute the command.
	 *
	 * @return void
	 */
	public function handle(UserModule $userModule)
	{
		$userModule->logout();
	}

}
