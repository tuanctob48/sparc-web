<?php
/****************************************************************
File Name       : home.blade.php
Description     : Header of home page
Creation Date   : 2017/04/16
Author          : Lu Van Cuong
Change History  :
****************************************************************/
?>
@extends('layouts.layout_member')

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
@section('content')

<div class="clear"></div>
<main>
    <div class="container">
         <div class="bieudo_bando row">
             <div class="col-8">

<main>
<div class="container">
  <div class="row">
    <div class="col-8">
      <div class="panel panel-default">
        <div class="panel-heading">Report</div>
        <div class="panel-body">
            @foreach($articles as $article)
              <div class="row">
                <div class="col-9"><a href="{!! route('viewpost', ['id'=>$article->id]) !!}"><h3>{{$article->name}}</h3></a></div>
                <div class="col-3">{{$article->created_at}}</div>
              </div>
              <div class="row">
                <div class="col-3">
                  <div class="thumbnail">
                    <?php
                      $vaulespecific="\"";
                        echo "<img src=".$vaulespecific.$article->imgUrl.$vaulespecific
                        ." class=".$vaulespecific."img-thumbnail".$vaulespecific." alt=".$vaulespecific."Cinque Terre"
                        .$vaulespecific." width=".$vaulespecific."304".$vaulespecific." height=".$vaulespecific."236"
                        .$vaulespecific.">"; 
                      ?>
                  </div>
                </div>
                <div class="col-9">
                  {{$article->intro}}
                </div>	
              </div>
            @endforeach
            {{ $articles->links() }}
          <br>
          <br>
        </div>
      </div>
    </div>
    <div class="col-4">
      <div class="panel panel-default">
        <div class="panel-heading">Report</div>
        <div class="panel-body">Content</div>
      </div>
    </div>
  </div>
</div>
</main>
<footer>
    <div class="container row">
          <div class="col-12 chitiet_footer"></div>
          <div class="col-12 social_footer"></div>
          
    </div>
    <div class="col-12 banquyen">
             <p>Designed by Hoang Thi Nhung</p>
          </div>
</footer>

@endsection
