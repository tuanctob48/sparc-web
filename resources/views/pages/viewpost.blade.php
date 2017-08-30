@extends('layouts.layout_member')
@section('content')
<main>
	<div class="clear"></div>   
	<div class="container">
    <iframe src="https://docs.google.com/viewerng/viewer?url="."{{$content}}" width="100%"></iframe>		

	</div>
</main>
<footer style="clear: left;">
    <div class="container row">
          <div class="col-6 chitiet_footer"></div>
          <div class="col-6 social_footer"></div>
          
    </div>
    <div class="col-12 banquyen">
             <p>Designed by Hoang Thi Nhung</p>
          </div>
</footer>

@endsection
