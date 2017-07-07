<?php
/****************************************************************
File Name       : home.blade.php
Description     : Header of home page
Creation Date   : 2017/04/16
Author          : Lu Van Cuong
Change History  :
****************************************************************/
?>
@extends('layouts.layout')

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
@section('content')
<div class="clear"></div>

<main>
<div class="container">
  <div class="row">
    <div class="col-8">
      <div class="panel panel-default">
        <div class="panel-heading">Report</div>
        <div class="panel-body">
          <div class="infinite-scroll">
            @foreach($articles as $article)
              <div class="row">
                <div class="col-9"><a href="{!! route('viewpost', ['id'=>$article->id]) !!}">Link</a></div>
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
          </div>
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
    {{-- <div class="container row">
      <div class="col-12 chitiet_footer"></div>
    </div> --}}
    <div class="col-12 banquyen">
             <p>Designed by Hoang Thi Nhung</p>
          </div>
</footer>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="/js/jquery.jscroll.min.js"></script>
    {{-- MAKE SURE THAT YOU PUT THE CORRECT PATH FOR jquery.jscroll.min.js --}}
    
    <script type="text/javascript">
        $('ul.pagination').hide();
        $(function() {
            $('.infinite-scroll').jscroll({
                autoTrigger: true,
                loadingHtml: '<img class="center-block" src="/images/loading.gif" alt="Loading..." />', // MAKE SURE THAT YOU PUT THE CORRECT IMG PATH
                padding: 0,
                nextSelector: '.pagination li.active + li a',
                contentSelector: 'div.infinite-scroll',
                callback: function() {
                    $('ul.pagination').remove();
                }
            });
        });
    </script>
@endsection
