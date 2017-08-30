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
use App\User;
use App\Node;

class IoTSystem extends Controller
{
    function HandlePostRequest(Request $request)
    {
        $myfile = fopen("log.txt", "w") or die("Unable to open file!");
        $txt = "HandlePostRequest\n";
        fwrite($myfile, $txt);
        //$request = $request->all();//comment lai khi su dung form test
        $newNode = new Node();
        $node_id = $request['node_id'];
        $project_id = $request['project_id'];
        $txt = "CheckNodeExist\n";
        $statusError = $newNode->checkNodeExist($node_id, $project_id);
        fwrite($myfile, $txt);
        if ($statusError != ID_EXISTED) {
            $txt = "Node didn't Existed\n";
            $newNode->createNewNode($node_id, $project_id);
            fwrite($myfile, $txt);
        } else {
            $txt = "Node Existed\n";
            fwrite($myfile, $txt);
        }
        if ($project_id == AIRMAP) {
            $txt = "Project Airmap checked\n";
            fwrite($myfile, $txt);
            if ($newNode->insertStatusAirmap($request) == SUCCESS) {
                $txt = "Inserted to Database\n";
                fwrite($myfile, $txt);
                return '0';
            } else {
                $txt = "Can't insert to Database\n";
                fwrite($myfile, $txt);
                return '2';
            }
        //      }else if($project_id == DIENTIM){
        //          insertStatusDienTim($request);
        //      }else if($project_id == SMART_ALGAE){
        //          insertStatusAlgea;
        //      }
        }
        fclose($myfile);
        return '1';
    }
    function testPostRequest()
    {
        return view('pages.IoTSystem.testPostRequest');
    }
    function AirmapHandler(Request $request)
    {
    }
}
