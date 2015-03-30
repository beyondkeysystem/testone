<?php namespace Dorucuji\Http\Modules\UniqueString;

use DB;

class UniqueStringModule {

	public function randomString($stringLenght, $table, $column)
	{
		again:

		$string = str_random($stringLenght);

		if(DB::table($table)->where($column, '=', $string)->get())
		{
			goto again;
		}

		return $string;
	}

}