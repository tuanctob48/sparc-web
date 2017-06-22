<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Http\Requests;
use DB;
use App\Articles;
class PagesController extends Controller
{

    public function page_home()
    {

        return view('pages.home');
    }
    public function page_report()
    {

        return view('pages.report');
    }

    public function page_about()
    {
        return view('pages.about');
    }

    public function page_importdata()
    {
        return view('pages.importdata');
    }
    public function page_postdata(Request $request){
			$article = new Articles;
			$fileDirectory = $article->uploadFile($request);
			$article->insertArticles2Database($fileDirectory);
    }



    public function page_login()
    {
        $authen= null;
        return view('pages.login',compact('authen'));
    }
    public function login(Request $request){
        $username = $request['username'];
        $password = $request['password'];
        $result = DB::table('users')
            ->where('username',$username)
            ->where('password',$password)->value('typeAccount');
        $authen[0] = 0;
        if($result != NULL){
            $authen[1] = $username;
            $authen[0] = 1;
            $authen[2] = $result;
        }
        return view('pages.login',compact('authen'));

    }

    public function page_file($req, $res, $next )
    {
        $result=Watercommunity.page_file($req, $res, $next);

        return view('pages.getinfo',compact('result'));
    }
    public function page_logout(){
      return view('pages.logout');
    }
    public function page_register(){
        return view('auth.register');
    }
    public function getURL(Request $request){
    // return $request->url();
    // if($request->isMethod('post'))
    //     echo "Phuong thuc get";
    // else
    //     echo "Khong phai phuong thuc get";
    if($request->is('get'))
			echo "Co get";
		else
			echo 'Khong get';

 
    }
		public function postForm(Request $request){
			echo $request->HoTen;
		}
		public function setCookie(){
			$response = new Response;
			$response->withCookie(
				'KhoaHoc',
				'Laravel - Khoa Pham',
				0.1
			);
			echo "Da set Cookie";
			return $response;
		}
		public function getCookie(Request $request){
			return $request->cookie('KhoaHoc');
		}
    // public function showProfile($username){
    //     if($request->session()->has('username')){
    //         return view('user/{$username}/profile');
    //     }else{
    //         return view('pages.expiredSession');
    //     }
    // }
}
