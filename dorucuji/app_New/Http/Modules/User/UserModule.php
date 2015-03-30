<?php namespace Dorucuji\Http\Modules\User;

use Dorucuji\Http\Repositories\UserRepository;
use Auth;

class UserModule {

	private $userRepository;

	public function __construct(UserRepository $userRepository)
	{
		$this->userRepository = $userRepository;
	}

	public function createNew($username, $full_name, $email, $phone, $password)
	{
		$user = $this->userRepository->create([
			'username' => $username,
			'full_name' => $full_name,
			'email' => $email,
			'phone' => $phone,
			'password' => $password
		]);

		return $user;
	}

	public function loginByCredentials($username, $password)
	{
		$user = Auth::attempt(array('username' => $username, 'password' => $password));

		return $user;
	}

	public function loginById($id)
	{
		$user = Auth::loginUsingId($id);

		return $user;
	}

	public function logout()
	{
		Auth::logout();
	}

	public function doesUserExists($column, $value)
	{
		$user = $this->userRepository->getUserByColumnValue($column, $value);

		return $user;
	}

}