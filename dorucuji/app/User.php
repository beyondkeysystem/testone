<?php namespace Dorucuji;

use Illuminate\Database\Eloquent\Model;

class User extends Model {

	protected $fillable = ['username', 'full_name', 'email', 'phone', 'password'];

}
