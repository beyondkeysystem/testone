<?php namespace Dorucuji\Http\Modules\User;

use Dorucuji\Http\Repositories\UserRepository;
use Dorucuji\Http\Requests\User\CreateRequest;

class UserModule {

	protected $user;

	public function __construct(UserRepository $user)
	{
		$this->user = $user;
	}

	public function createNewUser(CreateRequest $request)
	{
		$user = $this->user->create($request);

		return $user;
	}

}