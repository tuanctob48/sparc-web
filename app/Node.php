<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Node extends Model
{
    //
    public function checkNodeExist($id){
      $created_at = $request['time'];
      $checkId = DB::table('node_info')->where('node_id',id);
      if($checkId == null){
        $status_error = "Node does not exist";
      }else{
        $status_error = null;  
      }
      return $status_error;
    }
    public function insertStatusNode(Request $request){
			$id = $request['id'];
      DB::table('articles')->insert([
			'user_id' => $user_id,
			'name' => $name,
			'imgUrl'=> $imgDirectory,
			'tags'=> $tags,
			'category'=> $category,
			'intro'=> $intro,
			'created_at'=> \Carbon\Carbon::now()
			]);
    }
}

