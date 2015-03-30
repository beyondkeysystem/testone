<?php namespace Dorucuji\Http\Requests\User;

use Dorucuji\Http\Requests\Request as Request;
use Illuminate\Http\Request as FormRequest;

class CreateRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules(FormRequest $request)
	{
		return [
			'username' => 'required|min:5|max:85|alpha_dash|unique:users,username,' . $request->input('username'),
			'full_name' => 'required|min:5|max:85',
			'email' => 'required|email|unique:users,email,' . $request->input('email'),
			'phone' => 'required|integer|digits:9|unique:users,phone,' . $request->input('phone'),
			'password' => 'required|min:5|max:85'
		];
	}

}
