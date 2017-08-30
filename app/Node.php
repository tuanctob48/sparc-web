<?php

namespace App;

header("Connection: close");
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use DB;
use Carbon\Carbon;

define("ID_EXISTED", "1");
define("SUCCESS", "1");
define("AIRMAP", 1);
define("DIENTIM", 2);
define("SMART_ALGAE", 3);

class Node extends Model
{
    //
    public function checkNodeExist($node_id, $project_id)
    {
        $status_error = !ID_EXISTED;
        $checkId = DB::table('node_info')->where('node_id', $node_id)->where('project_id', $project_id)->value('created_at');
        if ($checkId != null) {
            $status_error = ID_EXISTED;
        }
        return $status_error;
    }
    public function createNewNode($node_id, $project_id)
    {
        DB::table('node_info')->insert([
          'node_id'        => $node_id,
          'project_id'=> $project_id,
          'created_at'=> Carbon::now(),
          'updated_at' => Carbon::now()
        ]);
    }
//    public function insertStatusNode(Request $request){
//      DB::table('node_status')->insert([
//			'node_id' => $request['id'],
//			'temperature' => $request['temperature'],
//			'water_temp' => $request['water_temp'],
//			'light_color' => $request['light_color'],
//			'light_intensity' => $request['light_intensity'],
//			'flow' => $request['flow'],
//      'humidity' => $request['humidity'],
//      'warning_code' => $request['warning_code'],
// 			'created_at'=> \Carbon\Carbon::now()
//			]);
//		}
    public function insertStatusAirmap($request)
    {
        $myfile = fopen("logdatabase.txt", "w") or die("Unable to open file!");
        $txt = "Insert Database\n";
        fwrite($myfile, $txt);
        DB::table('airmap')->insert([
          'created_at'  => Carbon::now(),
          'updated_at'  => Carbon::now(),
          'project_id'  => intval($request['project_id']),
          'node_id'     => intval($request['node_id']),
          'temp_air'    => floatval($request['temp_air']),
          'airHumidity' => floatval($request['airHumidity']),
          'luuLuong'    => floatval($request['luuLuong']),
          'tempWater'   => floatval($request['tempWater']),
          'anhSangKK'   => floatval($request['anhSangKK']),
          'red'         => floatval($request['red']),
          'blue'        => floatval($request['blue']),
          'green'       => floatval($request['green']),
          'anhSangWater'=> floatval($request['anhSangWater'])
        ]);
        $txt = "Insert Success\n";
        fwrite($myfile, $txt);
        return SUCCESS;
    }
}
