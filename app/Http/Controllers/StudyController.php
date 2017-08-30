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

class StudyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function page_study(){
        $articles = new Articles();
        $data[0] = $articles->getRecentlyArticleStudyPage('electronics_techique');
        $data[1] = $articles->getRecentlyArticleStudyPage('mechanic_techique');
        $data[2] = $articles->getRecentlyArticleStudyPage('programing_techique');
        $data[3] = $articles->getRecentlyArticleStudyPage('softskill');
        $data[4] = $articles->getRecentlyArticleStudyPage('artificial_intelligent');
        $data[5] = $articles->getRecentlyArticleStudyPage('references');
        return view('pages.study.study',compact('data'));
    }
    public function page_electronic_techique(){
        $articles = new Articles();
        $data = $articles->getRecentlyArticlesByCategory('electric_techique');
        return view('pages.study.electronic_techique',compact('data'));
    }
    public function page_mechanic_techique(){
        $articles = new Articles();
        $data = $articles->getRecentlyArticlesByCategory('mechanic_techique');
        return view('pages.study.mechanic_techique',compact('data'));   
    }
    public function page_programing_techique(){
        $articles = new Articles();
        $data = $articles->getRecentlyArticlesByCategory('programing_techique');
        return view('pages.study.programing_techique',compact('data'));
    }
    public function page_artificial_intelligent(){
        $articles = new Articles();
        $data = $articles->getRecentlyArticlesByCategory('artificial_intelligent');
        return view('pages.study.artificial_intelligent',compact('data'));
    }
    public function page_references(){
        $articles = new Articles();
        $data = $articles->getRecentlyArticlesByCategory('references');
        return view('pages.study.references',compact('data'));
    }
    public function page_softskill(){
        $articles = new Articles();
        $data = $articles->getRecentlyArticlesByCategory('softskill');
        return view('pages.study.softskill',compact('data'));
    }
}
?>
