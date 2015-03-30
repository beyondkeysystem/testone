<?php namespace Dorucuji\Http\Repositories;

use Dorucuji\User;

class UserRepository {

	public function create($input)
	{
		$user = User::create($input);

		return $user;
	}

}