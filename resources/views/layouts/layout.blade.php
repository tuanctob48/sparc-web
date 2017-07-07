<?php
/****************************************************************
File Name       : layout.blade.php
Description     : layout for all pages
Creation Date   : 2017/04/16
Author          : Lu Van Cuong
Change History  :
 ****************************************************************/
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Tra cứu chất lượng nuôi tảo</title>
<link rel="stylesheet" type="text/css" href="{{url('css/font-awesome.min.css')}}"/>
<link rel="stylesheet" type="text/css" href="{{url('css/default.css')}}"/>
<link rel="stylesheet" type="text/css" href="{{url('css/style.css')}}"/>
 <link rel="stylesheet" type="text/css" href="{{url('/css/bootstrap-theme.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('/css/popup.css')}}" >
    <link rel="stylesheet" type="text/css" href="{{url('/css/_styles.css')}}" media="screen">
    <link rel="stylesheet" type="text/css" href="{{url('/css/jquery.dataTables.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('/css/demo.css')}}">

    {{-- Declare *.js library--}}
    <script type="text/javascript" src="{{url('/js/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{url('/js/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{url('/js/d3.v3.min.js')}}" charset="utf-8"></script>
    <script type="text/javascript" src="{{url('/js/dagre-d3.js')}}"></script>
    <script type="text/javascript" src="{{url('/js/underscore-min.js')}}"></script>
    <script type="text/javascript" language="javascript" src="{{url('/js/popup.js')}}"></script>
    <script type="text/javascript" language="javascript" src="{{url('/js/jquery.dataTables.js')}}"></script>
    {{--<script type="text/javascript" language="javascript" src="{{url('/js/demo.js')}}"></script>--}}

</head>
<header>
  <div class="container">
    <div class="header_top row">
      <div class="col-7 logo">
        <h2>Welcome to SPARC LAB's' Website</h2>
      </div>
    </div>
    <nav>
      <ul><li><a href="{{url('/home')}}">Trang chủ</a></li></ul>
      <ul><li><a href="{{url('/report')}}">Tin tức</a></li></ul>
      <ul><li><a href="{{url('/about')}}">Liên Hệ</a></li></ul>
	@php 
        if(!isset($_SESSION))
	      {
          session_start();
        }
        $value_login=0;
				$value_name="undefine";
        // check user authen, if user has been authen then redirect to page home
        if(isset($_SESSION['status_authen']))
        {
          if($_SESSION['status_authen']==AUTHEN_SUCCESS)
          {
	          $value_login=1;
          }
				}
				if(isset($_SESSION['status_name']))
        {
					$value_name = $_SESSION['status_name'];
				}
        if($value_login==1){
     		@endphp 
      	  <ul><li> <a href="{{url('/logout')}}">Chao {{$value_name}} </a></li></ul>	
					@php
					if($_SESSION['status_admin'] == LEADER_STATUS || $_SESSION['status_admin'] == ADMIN_STATUS){
					@endphp	
					<ul><li><a href="{{url('/importdata')}}">Import Data</a></li></ul>
					<ul><li><a href="{{url('/importfile')}}">Import File</a></li></ul>
          @php   	
					}
					@endphp
				@php
        }else{
     	@endphp
				<ul><li> <a href="{{url('/login')}}"> Đăng nhập </a></li></ul>
      @php
        }
      @endphp
      </nav>
   </div>
</header>
 <body>

@yield('content')

</body>


@yield('footer')

</html>
