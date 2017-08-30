<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use DB;
class User extends Model
{
    public function getTypeAccount(Request $request){
      	return DB::table('users')
        	->where('username', $request['username'])
           	->where('password', $request['password'])
           	->value('typeAccount');
	}
}
