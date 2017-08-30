<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use DB;
use App\Articles;

define("VALUE_EQUAL", 0);
define("RETRY_LOGIN", 0);
define("GUEST_STATUS", "11");
define("USER_STATUS", "10");
define("LEADER_STATUS", "01");
define("ADMIN_STATUS", "00");
define("AUTHEN_SUCCESS", 1);
define("AUTHEN_FAILED", 0);
define("NULL_USERNAME", "");

class InfomationController extends Controller
{

    public function page_infomation(){
    	return view('pages.information.information');
    }          
}
