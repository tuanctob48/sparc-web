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
class PagesController extends Controller
{

    public function page_home()
    {

        return view('pages.home');
    }
    // public function page_report2()
    // {
        // 	$articles = DB::table('articles')->orderBy('created_at','desc')->paginate(2);
    //   return view('pages.report',compact('articles'));
    // }
    public function page_report()
    {
        $articles = Articles::latest()->paginate(1);
        // return View::make('pages.report', array('articles' => $articles));
        return view('pages.report', compact('articles'));
    }

    public function page_about()
    {
        return view('pages.about');
    }

    public function page_importdata()
    {
        return view('pages.importdata');
    }
    public function page_importfile()
    {
        return view('pages.importfile');
    }
    public function get_filedta(Request $request)
    {
        $data[0]="hehhe";
        $data[1]="mINH XIN CHIA KHOA";
        $data[2]=$request->name;
        return $data;
    }
    public function page_uploadfile(Request $request)
    {
        $article = new Articles;
      // echo $request;
            $uploadedFile = $article->uploadFileCustom($request);
        return view('pages.uploadFileSuccess')->with('uploadFile', $uploadedFile);
    }
    public function page_postdata(Request $request)
    {
            $article = new Articles;
            $uploadedFile = $article->uploadFile($request);
            $article->insertArticles2Database($uploadedFile);
    }
    public function page_login()
    {
                $authen[0] = AUTHEN_FAILED;
                $authen[1] = NULL_USERNAME;
                $authen[2] = GUEST_STATUS;
        return view('pages.login', compact('authen'));
    }
    public function login(Request $request)
    {
        $username = $request['username'];
        $password = $request['password'];
        $typeAccount= DB::table('users')
            ->where('username', $username)
            ->where('password', $password)->value('typeAccount');
        $authen[0] = AUTHEN_FAILED;
        if ($typeAccount != null) {
            $authen[0] = AUTHEN_SUCCESS;
            $authen[1] = $username;
            $authen[2] = $typeAccount;
        }
        return view('pages.login', compact('authen'));
    }

    public function post_status(Request $request)
    {
        $status_error = Node::checkNodeExist($request['id']);
        if ($status_error == null) {
            Node::insertStatusNode($request);
        }
    }
    public function page_file($req, $res, $next)
    {
        $result=Watercommunity.page_file($req, $res, $next);

        return view('pages.getinfo', compact('result'));
    }
    public function page_logout()
    {
        return view('pages.logout');
    }
    public function page_register()
    {
        return view('auth.register');
    }
    public function page_testView()
    {
        return view('pages.testView');
    }
    public function page_study()
    {
        return view('pages.study');
    }
    public function getURL(Request $request)
    {
    // return $request->url();
    // if($request->isMethod('Article'))
    //     echo "Phuong thuc get";
    // else
    //     echo "Khong phai phuong thuc get";
        if ($request->is('get')) {
            echo "Co get";
        } else {
            echo 'Khong get';
        }
    }

    public function setCookie()
    {
        $response = new Response;
        $response->withCookie(
        'KhoaHoc',
        'Laravel - Khoa Pham',
        0.1
        );
        echo "Da set Cookie";
        return $response;
    }
    public function getCookie(Request $request)
    {
        return $request->cookie('KhoaHoc');
    }
    public function page_viewpost($id)
    {
        $fileDirectory= DB::table('articles')
        ->where('id', $id)->value('fileUrl');
        $content = file_get_contents($fileDirectory);
        return view('pages.viewpost')->with('content', $content);
    }
    // public function showProfile($username){
    //     if($request->session()->has('username')){
    //         return view('user/{$username}/profile');
    //     }else{
    //         return view('pages.expiredSession');
    //     }
    // }
    public function doProject()
    {
        return view('pages.code.doProject');
    }
    public function generalCode()
    {
        return view('pages.code.generalCode');
    }
    public function awards()
    {
        return view('pages.info.awards');
    }
    public function members()
    {
        return view('pages.info.members');
    }
    public function project()
    {
        return view('pages.info.project');
    }
    public function recruit()
    {
        return view('pages.info.recruit');
    }
    public function AI()
    {
        return view('pages.study.AI');
    }
    public function books()
    {
        return view('pages.study.books');
    }
    public function co()
    {
        return view('pages.study.co');
    }
    public function codding()
    {
        return view('pages.study.codding');
    }
    public function dienTu()
    {
        return view('pages.study.dienTu');
    }
    public function kyNangMem()
    {
        $data = DB::table('documents')->get();
        return view('pages.study.kyNangMem', compact('data'));
    }
    public function news()
    {
        return view('pages.news');
    }


    public function postForm()
    {
        return view('pages.study.postForm');
    }
    public function postFile(Request $request)
    {
        // kiểm tra có tồn tại myFikle ?
        if ($request->hasFile('theFile')) {
            //save file
            $nameOfFile = $request->file('theFile')->getClientOriginalName('theFile');

            $request->file('theFile')->move(
                'training', //location of file
                $nameOfFile //name of file
            );
            $names = $request->name;
            $describe = $request->describe;
            DB::table('documents')->insert(['name'=>$names,
                                            'describe'=>$describe,
                                            'link'=>$nameOfFile]);
            return view('pages.study.kyNangMem', compact('names', 'describe'));
        } else {
            echo "Chưa có file";
        }
    }
}
