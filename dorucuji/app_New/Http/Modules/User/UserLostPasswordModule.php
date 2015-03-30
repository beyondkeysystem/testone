<?php namespace Dorucuji\Http\Modules\User;

use Carbon\Carbon;
use Dorucuji\Http\Modules\UniqueString\UniqueStringModule;
Use Dorucuji\Http\Repositories\UserLostPasswordRepository;
use Mail;

class UserLostPasswordModule {

	private $uniqueStringModule;
	private $userLostPasswordRepository;

	function __construct(UniqueStringModule $uniqueStringModule, UserLostPasswordRepository $userLostPasswordRepository)
	{
		$this->uniqueStringModule = $uniqueStringModule;
		$this->userLostPasswordRepository = $userLostPasswordRepository;
	}


	public function createNewRecord($email)
	{
		$uniqueString = $this->uniqueStringModule->randomString(25, 'users_lost_password', 'email');

		$this->userLostPasswordRepository->create($email, $uniqueString);

		return $uniqueString;
	}

	public function removeExpiredRecords()
	{
		$this->userLostPasswordRepository->deleteRecordsOlderThenInterval(15);
	}

	public function sendLinkToResetPassword($toEmail, $toName = null, $token)
	{
		$sendData = [
			'email' => $toEmail,
			'name' => $toName
		];

		Mail::queue('emails.user.lost-password-reminder', array('reset_token' => $token), function($message) use($sendData)
		{
			$message->to($sendData['email'], $sendData['name'])->subject('Obnova hesla k účtu');
		});
	}

}