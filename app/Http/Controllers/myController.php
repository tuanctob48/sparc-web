<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Http\Requests;
use App\model_mongo\ConnectionTest;

class myController extends Controller
{
    public function myFunction($ten){
        echo "day la function dau tay cua ".$ten;
    }
    public function myUrl(Request $request){
        // return $request->isMethod('post');
        if($request->isMethod('get'))
            echo "true";
        else
            echo "fall";
    }
    public function postForm(Request $request){
        echo $request->hoTen;
        if($request->has('tuoi'))
            echo "<br>".$request->tuoi." tuoi";
    }

    public function setCookie(){
        $response = new Response();
        $response->withCookie(
            'thangkt',
            'day la cookie dc tao do thangkt',
            1
        );
        return $response;
    }

    public function getCookie(Request $request){
        return $request->cookie('thangkt');
    }

    public function uploadFile(){
        return view('pages.postForm');
    }

    public function postFile(Request $request){
        if($request->hasFile('myFile'))
        {
            echo 'Da co file';
            $file = $request->file('myFile');
            $fileName = $file->getClientOriginalName('myFile');
            $fileExtension = $file->getClientOriginalExtension('myFile');
            $file->move('img',$fileName);
        }
        else
            echo 'ko co file up nha';
    }

    public function view(){
        return view('pages.lab.Study');
    }

}

// class UserController extends Controller 
// {
//         public function all()
//         {
//              return User::all();
//         }
// }
