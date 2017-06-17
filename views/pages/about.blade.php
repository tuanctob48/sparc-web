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

@section('content')

<div class="clear"></div>
<!-- Page Content -->

<div class="container">
    <!-- Introduction Row -->
    <div class="row">
        <div class="col-lg-12">
                <center><h1>Team Development!</h1></center>
        </div>
    </div>
    

    <!-- Team Members Row -->
    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">Our Team</h2>
        </div>
        <table style="width:100%">
        <tr>
	    	<th>   
		    	<div class="col-lg-4 col-sm-6 text-center">
		            <img class="img-circle img-responsive img-center" src="{{url('/img/Nam.jpg')}}" style="height:200px;width:200px;" alt="">
		            <h3>Đặng vũ Nam
		                <small>Project Technical Leader</small>
		            </h3>
		        </div>
	        </th> 
	        <th>
		        <div class="col-lg-4 col-sm-6 text-center">
		            <img class="img-circle img-responsive img-center" src="{{url('/img/May.jpg')}}" style="height:200px;width:200px;" alt="">
		            <h3>Trần  Thị Mây
		                <small> biotechnlegy Leader</small>
		            </h3>
		        </div>
	        </th>
	    </tr>
	    <tr>
	    	<th>    
		        <div class="col-lg-4 col-sm-6 text-center">
		            <img class="img-circle img-responsive img-center" src="{{url('/img/phuong.jpg')}}" style="height:200px;width:200px;" alt="">
		            <h3>Do thi phuong
		                <small>Menber </small>
		            </h3>
		        </div>
		    </th>
		    <th>    
	        <div class="col-lg-4 col-sm-6 text-center">
	            <img class="img-circle img-responsive img-center" src="{{url('/img/tri.jpg')}}" style="height:200px;width:200px;" alt="">
	            <h3>Minh Trí
	                <small>member</small>
	            </h3>
	        </div>
	        </th>
	    </tr>
	    <tr>
	    	<th>    
		        <div class="col-lg-4 col-sm-6 text-center">
		            <img class="img-circle img-responsive img-center" src="{{url('/img/Tam.jpg')}}" style="height:200px;width:200px;" alt="">
		            <h3>Tâm
		                <small>Menber</small>
		            </h3>
		        </div>
		    </th>
		    <th>    
	            <div class="col-lg-4 col-sm-6 text-center">
		            <img class="img-circle img-responsive img-center" src="{{url('/img/thuoc_nhung_hue.jpg')}}" style="height:200px;width:200px;" alt="">
		            <h3>Thuoc Nhung Huế
		                <small>Menber</small>
		            </h3>
		        </div>
		    </th>    
	     </tr>   
        </table>
    </div>

</div>

<footer>
    <div class="container row">
          <div class="col-6 chitiet_footer"></div>
          <div class="col-6 social_footer"></div>
          
    </div>
    <div class="col-12 banquyen">
             <p>Designed by Hoang Thi Nhung</p>
          </div>
</footer>

@endsection
