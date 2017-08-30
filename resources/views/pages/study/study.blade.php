@extends('layouts.layout_member')
@section('content')
<main>
	<div class="clear"></div>
	<div class="container" >
		<div id="content_study">
			<ul>
				@foreach($data as $row)
					<li>
						<img src="{{$row->imgUrl}}" width="360px" height="360px">
						<h2>{{$row->name}}</h2>
						<h3>
							{{$row->intro}}
							<p>
							<a href="{!! route('viewpost', ['id'=>$row->id]) !!}">Xem tiếp</a>
							<a href="{{$row->fileUrl}}"> Download</a>
						</h3>
					</li>

				@endforeach
			</ul>

		</div>
		<div id="list_study">
			<ul>
			@foreach ($data as $row)
				<li>
					<ul>
						<li style = "width : 80px">
							<img src="{{$row->imgUrl}}" width="100%" height="100%">
						</li>
						<li>
							<h3><a href="{!! route('viewpost', ['id'=>$row->id]) !!}">{{$row->name}}</a>
								<a href="{{$row->fileUrl}}"> Download</a>
							</h3>

						</li>
					</ul>
				</li>
			@endforeach
			</ul>
			
		</div>
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