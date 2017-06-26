<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use DB;
use ZipArchive;
class Articles extends Model
{
    public function getIntro(){

		}
		public function insertArticles2Database($fileDirectory){
			$input = $this->readDocx($fileDirectory);
			// $username = strtok($input, "\n");
			// $username = "admin";
			// $user_id = DB::table('users')->where('username',$input)->value('id');
			// if($user_id == NULL) echo 'null';
			$user_id = 1;
			$name = strtok($input, "\n");
			$imgUrl= strtok($input, "\n");
			$tags = strtok($input, "\n");
			$category = strtok($input, "\n");
			$intro = strtok($input, "\n");
			DB::table('articles')->insert([
        'user_id' => $user_id,
        'name' => $name,
				'imgUrl'=> $imgUrl,
				'fileUrl'=> $fileDirectory,
				'tags'=> $tags,
				'category'=> $category,
				'intro'=> $intro,
      ]);
		}
		function readDocx($filePath) {
    // Create new ZIP archive
    $zip = new ZipArchive;
    $dataFile = 'word/document.xml';
    // Open received archive file
    if (true === $zip->open($filePath)) {
        // If done, search for the data file in the archive
        if (($index = $zip->locateName($dataFile)) !== false) {
            $data = $zip->getFromIndex($index);
            $zip->close();

            $dom = new \DOMDocument();
            $dom->loadXML($data, LIBXML_NOENT
                | LIBXML_XINCLUDE
                | LIBXML_NOERROR
                | LIBXML_NOWARNING);

            $xmldata = $dom->saveXML();

            $contents = strip_tags($xmldata, '<w:p><w:u><w:i><w:b>');
            $contents = preg_replace("/(<(\/?)w:(.)[^>]*>)\1*/", "<$2$3>", $contents);

            $dom = new \DOMDocument();
            @$dom->loadHTML($contents, LIBXML_HTML_NOIMPLIED  | LIBXML_HTML_NODEFDTD);
            $contents = $dom->saveHTML();

            $contents = preg_replace('~<([ibu])>(?=(?:\s*<[ibu]>\s*)*?<\1>)|</([ibu])>(?=(?:\s*</[ibu]>\s*)*?</?\2>)|<p></p>~s', "", $contents);

            return $contents;
        }
        $zip->close();
    }
    // In case of failure return empty string
    return "";
}
		public function read_docx($filename){

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
						$docfileimg = realpath($imgdirectory);
						$uploadedFile[0] = $docfiledata;
						$uploadedFile[1] = $docfileimg;
        }
        // echo $request->file;
        // echo $request->filename;
				return $uploadedFile;
		}
}
