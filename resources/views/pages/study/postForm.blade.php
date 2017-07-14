@extends('layouts.layout_member')
@section('content')
<div class="clear"></div>
<div class="container" >
    
<form action="{{route("postFile")}}"
 method="post"
 enctype="multipart/form-data" >
      <input type="file" name="theFile" id="theFile" >
      <h2>name of file</h2>
      <input type="text" name="name" >
      <h2>something about the file</h2>
      <input type="text" name="describe" >
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