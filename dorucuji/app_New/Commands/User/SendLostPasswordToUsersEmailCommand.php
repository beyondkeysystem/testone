<?php namespace Dorucuji\Commands\User;

use Dorucuji\Commands\Command;

use Dorucuji\Http\Modules\User\UserLostPasswordModule;
use Dorucuji\Http\Modules\User\UserModule;
use Illuminate\Contracts\Bus\SelfHandling;

class SendLostPasswordToUsersEmailCommand extends Command implements SelfHandling {

	private $email;

	public function __construct($email)
	{
		$this->email = $email;
	}

	/**
	 * Execute the command.
	 *
	 * @return void
	 */
	public function handle(UserModule $userModule, UserLostPasswordModule $userLostPasswordModule)
	{
		$user = $userModule->doesUserExists('email', $this->email);

		if( ! $user)
		{
			return false;
		}

		$userLostPasswordModule->removeExpiredRecords();

		$resetToken = $userLostPasswordModule->createNewRecord($this->email);

		$userLostPasswordModule->sendLinkToResetPassword($user->email, $user->full_name, $resetToken);

		return true;
	}

}
