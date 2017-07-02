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
define("VALUE_EQUAL", 0);
define("RETRY_LOGIN", 0);
define("GUEST_STATUS","11");
define("USER_STATUS","10");
define("LEADER_STATUS","01");
define("ADMIN_STATUS","00");
define("AUTHEN_SUCCESS",1);
define("AUTHEN_FAILED",0);
define("NULL_USERNAME","");
class PagesController extends Controller
{

    public function page_home()
    {

        return view('pages.home');
    }
    public function page_report()
    {
			$articles = DB::table('articles')->orderBy('created_at','desc')->take(10)->get();
      return view('pages.report',compact('articles'));
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
			$uploadedFile = $article->uploadFile($request);
			$article->insertArticles2Database($uploadedFile);
    }
    public function page_login()
    {
				$authen[0] = AUTHEN_FAILED;
				$authen[1] = NULL_USERNAME;
				$authen[2] = GUEST_STATUS;
        return view('pages.login',compact('authen'));
    }
    public function login(Request $request){
        $username = $request['username'];
        $password = $request['password'];
        $typeAccount= DB::table('users')
            ->where('username',$username)
            ->where('password',$password)->value('typeAccount');
        $authen[0] = AUTHEN_FAILED;
        if($typeAccount != NULL){
            $authen[0] = AUTHEN_SUCCESS;
            $authen[1] = $username;
            $authen[2] = $typeAccount;
        }
        return view('pages.login',compact('authen'));

    }

    public function post_status(Request $request){
      $status_error = Node::checkNodeExist($request['id']);
      if($status_error == null){
        Node::insertStatusNode($request);
      }
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
    public function page_testView(){
      return view('pages.testView');
    }
    public function page_study(){
      return view('pages.study');
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
        public function page_viewpost($id){
            $fileDirectory= DB::table('articles')
            ->where('id',$id)->value('fileUrl');
            $content = file_get_contents($fileDirectory);
            return view('pages.viewpost')->with('content',$content);
        }
    // public function showProfile($username){
    //     if($request->session()->has('username')){
    //         return view('user/{$username}/profile');
    //     }else{
    //         return view('pages.expiredSession');
    //     }
    // }
}
