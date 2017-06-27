<?php

namespace App;
header("Connection: close");
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use DB;
use ZipArchive;
use PhpOffice\PhpWord\IOFactory;
use App\Docx_reader;
class Articles extends Model
{
	
    public function getIntro(){

		}
		public function read_file_docx($filename){
			$striped_content = '';
			$content = '';
			if(!$filename || !file_exists($filename)) return false;
			$zip = zip_open($filename);
			if (!$zip || is_numeric($zip)) return false;
			while ($zip_entry = zip_read($zip)) {
			if (zip_entry_open($zip, $zip_entry) == FALSE) continue;
			if (zip_entry_name($zip_entry) != "word/document.xml") continue;
			$content .= zip_entry_read($zip_entry, zip_entry_filesize($zip_entry));
			zip_entry_close($zip_entry);
			}// end while
			zip_close($zip);
        $content = str_replace('</w:r></w:p></w:tc><w:tc>', " ", $content);
        $content = str_replace('</w:r></w:p>', " <br><br> ", $content);
        // $striped_content = strip_tags($content);
			return $content;
	}
		public function insertArticles2Database($uploadedFile){
			if(!isset($_SESSION))
			{
				session_start();
			}
			if(isset($_SESSION['status_name']))
			{
				$username =$_SESSION['status_name'];
			}
			$user_id = DB::table('users')->where('username',$username)->value('id');
			$fileDirectory = $uploadedFile[0];
			$imgDirectory = $uploadedFile[1];
			$doc = new Docx_reader();
			// echo $fileDirectory;
			$doc->setFile($fileDirectory);
			if(!$doc->get_errors()) {
			    $html = $doc->to_html();
			    $plain_text = $doc->to_plain_text();
			    // echo $plain_text;
			} else {
			    echo implode(', ',$doc->get_errors());
			}
			// $input = $this->read_file_docx($fileDirectory);
			$str= explode("””",$plain_text);
			$name = $str[0];
			$tags = $str[1];
			$category = $str[2];
			$intro = $str[3];
			// echo $name;
			$k = stripos($html,$name,0);
			echo $k;
			// var_dump($str);
			substr_replace($html,'',stripos($html,$name,0),strlen($name));
			substr_replace($html,'',stripos($html,$tags,0),strlen($tags));
			substr_replace($html,'',stripos($html,$category,0),strlen($category));
			substr_replace($html,'',stripos($html,$intro,0),strlen($intro));
			$fp = @fopen($fileDirectory.".html", "w");
			if (!$fp) {
				echo 'Mở file không thành công';
			}
			else
			{
		    	fwrite($fp, $html);
			}
			DB::table('articles')->insert([
				'user_id' => $user_id,
				'name' => $name,
				'imgUrl'=> $imgDirectory,
				'fileUrl'=> $fileDirectory,
				'tags'=> $tags,
				'category'=> $category,
				'intro'=> $intro,
				'created_at'=> \Carbon\Carbon::now(),
				'updated_at'=>\Carbon\Carbon::now(),
			]);
		}
		public function uploadFile(Request $request){
		       /*  $input = $request->all();
     if($file = $request->filename{
        $name = $file->getClientOriginalName();
        $file->move('folder_where_to_save', $name);
        $input['your_file'] = $name;
    }*/
				$input = Input::all();
				// VALIDATION RULES
				$rules = array(
				    'file' => 'image|max:3000',
				);
				// PASS THE INPUT AND RULES INTO THE VALIDATOR
				$validation = Validator::make($input, $rules);
				$file = array_get($input,'file');
				$img = array_get($input,'img');
				// SET UPLOAD PATH
				$destinationPath = 'docfile';
				// GET THE FILE EXTENSION
				// RENAME THE UPLOAD WITH RANDOM NUMBER
				$fileName = $file ->getClientOriginalName();
				$imgName = $img->getClientOriginalName();
				// MOVE THE UPLOADED FILES TO THE DESTINATION DIRECTORY
				$upload_success_file = $file->move($destinationPath, $fileName);
				$upload_success_img = $img->move($destinationPath,$imgName);
				if ($upload_success_file && $upload_success_img) {
				$filepath = $request->filename;
				$imgpath = $request->imgname;
				$filedirectory = $filepath = "docfile"."//".$filepath."";
				$imgdirectory = $filepath = "docfile"."//".$imgpath."";
				$docfiledata = realpath($filedirectory);
				$docfileimg = $imgdirectory;
				$uploadedFile[0] = $docfiledata;
				$uploadedFile[1] = $docfileimg;
				}
				// echo $request->file;
				// echo $request->filename;
				return $uploadedFile;
		}
		public function getRecentlyArticles(){

		}
}
