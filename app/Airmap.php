<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\TableProject;
use App\TableFolder;
use App\TableFile;
use App\TableFunction;
use App\TableFunctionCall;
use App\Api\DatabaseManager;
use PHPExcel;
use Carbon\Carbon;
use PHPExcel_IOFactory;
use PHPExcel_Style_Border;
use App\Model\GeneratePageModel;
use Illuminate\Support\Facades\DB;

class Airmap extends Model
{
	 /**************************************************
    Function Name   : page_file
    Description     : 
    Argument        : 
    Creation Date   : 
    Author          : lu van cuong
    Reviewer        : cuong
     ***************************************************/
    public static function page_file($req, $res, $next )
    {
    	$current_time = Carbon::now();
    	$counter=1;
        DB::table('theair')->insert
        ([
            'date' => $current_time,
            'counter' => $counter,
            'pm_10' => $req,
            'so2' => $res,
            'co' => $next,
        ]);
        
    }

     /**************************************************
    Function Name   : page_file
    Description     : 
    Argument        : 
    Creation Date   : 
    Author          : lu van cuong
    Reviewer        : cuong
     ***************************************************/
    public static function getUser($user )
    {
        $data =DB::table('user')->where('name',$user)->value('id');
        return $data;
    }

}