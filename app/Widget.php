<?php

namespace App;
// namespace App\Http\Controllers\III_Ranks;

use Illuminate\Database\Eloquent\Model;
use PhpOffice\PhpWord\IOFactory;
use ZipArchive;


class Widget extends Model
{
	public static function read_file_docx($filename){

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


}
