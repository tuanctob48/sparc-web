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
<title>Tra cứu chất lượng không khí</title>
<link rel="stylesheet" type="text/css" href="{{url('css/font-awesome.min.css')}}"/>
<link rel="stylesheet" type="text/css" href="{{url('css/default.css')}}"/>
<link rel="stylesheet" type="text/css" href="{{url('css/style.css')}}"/>
</head>
<header>
    <div class="container">
         <div class="header_top row">
           <div class="col-7 logo">
             <h2>Welcome to SPARC LAB's' Website</h2>
             <p>
<!--
                @php
                $authen =1;
                @endphp
                @if($authen == 1)
                  {{"Chào mừng đến với trang người dùng"}}
                @elseif($authen == 2)
                  {{"Chào mừng đến với trang quản trị"}}
                @endif
-->

               </p>
           </div>
         </div>
         <nav>
             <ul><li><a href="{{url('/home')}}">Trang chủ</a></li></ul>
             <ul><li><a href="{{url('/report')}}">Tin tức</a></li></ul>
             <ul><li><a href="{{url('/about')}}">Liên Hệ</a></li></ul>
<!--
               @if ($authen != 0)
                 <ul><li> <a href="{{url('/logout')}}">Đăng xuất</a></li></ul>

               @else{

                <ul><li> <a href="{{url('/login')}}"> Đăng nhập </a></li></ul>
              }
               @endif
-->

         </nav>
   </div>
</header>
 <body>

@yield('content')

</body>


@yield('footer')

</html>
