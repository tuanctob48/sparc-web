@extends('layouts.layout_member')
@section('content')
<main>
	<div class="clear"></div>   
	{{-- <div class="container">
		<div class="row">
			<div class="col-md-5">$article['name']</div>
			<div class="col-md-3">$article['created_at']</div>
		</div>
		<div class="row">
			<div class="col-md-3">
				<div class="thumbnail">
					<a href="/$articles['imgUrl']" target="_blank">
						<div class="/$articles['imgUrl']" alt="Nature" style="width:100%">
						<p>$article['imgDescription']</p>
						</div>
					</a>
				</div>
			</div>
			<div class="col-md-5">$article['intro']</div>
		</div>
	</div> --}}
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
