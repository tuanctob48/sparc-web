@extends('layouts.layout_member')
@section('content')
<div class="clear"></div>
<div class="container" >
    
<form action="{{route("postFile")}}"
 method="post"
 enctype="multipart/form-data" >
      <input type="file" name="theFile" id="theFile" >
      <h2>Tiêu đề</h2>
      <input type="text" name="name" >
      <h2>miêu tả đôi chút về file</h2>
      <br>
      <textarea id="describe" class="wmd-input processed" name="describe" cols="92" rows="15" tabindex="101" data-min-length=""></textarea>
      <input type="submit" >
</form>


</div>
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