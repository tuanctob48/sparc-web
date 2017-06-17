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

class Watercommunity extends Model
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
    	$counter=10;
    	$r_color=10;
    	$g_color=10;
    	$b_color=10;
    	$temp=$req;
    	$speed_of_water=$res;
    	$ph=$next;
    	DB::table('infodata_biotechnology')->insert
        ([
            'date' => $current_time,
            'counter' => $counter,
            'r_color' => $r_color,
            'g_color' => $g_color,
            'b_color' => $b_color,
            'temp' => $temp,
            'speed_of_water' => $speed_of_water,
            'ph' => $ph,
        ]);

    }
}