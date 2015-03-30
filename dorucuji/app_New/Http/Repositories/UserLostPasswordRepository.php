<?php namespace Dorucuji\Http\Repositories;

use Dorucuji\UserLostPassword;
use Carbon\Carbon;

class UserLostPasswordRepository {

	public function create($email, $token)
	{
		$newRecord = new UserLostPassword();
		$newRecord->email = $email;
		$newRecord->token = $token;
		$newRecord->save();

		return $newRecord;
	}

	public function deleteRecordsOlderThenInterval($minutes)
	{
		$date = Carbon::now()->subMinutes($minutes)->toDateTimeString();

		UserLostPassword::where('created_at', '<', $date)->delete();
	}

}