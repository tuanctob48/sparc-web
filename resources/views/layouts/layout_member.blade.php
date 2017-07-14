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
</head>
<header>
    <div class="container">
        <div class="header_top row">
          <div class="col-7 logo">
            <h2>Welcome to SPARC LAB's' Website</h2>
          </div>
        </div>
        <div class="meNu">
            <ul>
                <li><a href="{{url('/home')}}">Trang chủ</a></li>
                <li>
                    <a href="{{url('/members')}}">thông tin</a>
                    <ul id="submenu">
                        <li><a href="{{url('/project')}}">Các dự án đang thực hiện</a></li>
                        <li><a href="{{url('/members')}}">Thành viên lab</a></li>
                        <li><a href="{{url('/awards')}}">Giải thưởng của lab</a></li>
                        <li><a href="{{url('/recruit')}}">Tuyển thành viên</a></li>
                    </ul>
                </li>           
                <li>
                    <a href="{{url('/books')}}">Học tập</a>
                    <ul id="submenu">
                        <li><a href="{{url('/dienTu')}}">Kỹ thuật điện tử</a></li>
                        <li><a href="{{url('/co')}}">Kỹ thuật cơ</a></li>
                        <li><a href="{{url('/codding')}}">Kỹ thuật lập trình</a></li>
                        <li><a href="{{url('/kyNangMem')}}">Kỹ năng mềm</a></li>
                        <li><a href="{{url('/AI')}}">Trí tuệ nhận tạo</a></li>
                        <li><a href="{{url('/books')}}">Sách tham khảo</a></li>
                    </ul>
                </li>
                <li>
                    <a href="{{url('/generalCode')}}">Quy định</a>
                    <ul id="submenu">
                      <li><a href="{{url('/generalCode')}}">Quy định chung của lab</a></li>
                      <li><a href="{{url('/doProject')}}">làm dự án</a></li>
                    </ul>
                </li>
                <li><a href="{{url('/news')}}">Tin tức</a></li>
                @php 
                    if(!isset($_SESSION)) 
                    { 
                        session_start(); 
                    } 
                    $value_login=0; 
                    $value_name="undefine"; // check user authen, if user has been authen then redirect to page home 
                    
                    if(isset($_SESSION['status_authen'])) { 
                        if($_SESSION['status_authen']==AUTHEN_SUCCESS)
                        { 
                            $value_login=1; 
                        } 
                    } 
                    if(isset($_SESSION['status_name'])) {
                        $value_name = $_SESSION['status_name']; 
                    } 
                    if($value_login==1){
                    @endphp
                    <ul>
                        <li> <a href="{{url('/logout')}}">Chao {{$value_name}} </a></li>
                    </ul>
                    @php if($_SESSION['status_admin'] == LEADER_STATUS || $_SESSION['status_admin'] == ADMIN_STATUS){ 
                    @endphp
                    <ul>
                        <li><a href="{{url('/importdata')}}">Import Data</a></li>
                    </ul>
                    <ul>
                        <li><a href="{{url('/importfile')}}">Import File</a></li>
                    </ul>
                    @php 
                    } 
                    @endphp 
                    @php 
                    }else{ 
                    @endphp
                    <ul>
                        <li> <a href="{{url('/login')}}"> Đăng nhập </a></li>
                    </ul>
                    @php 
                    } 
                    @endphp
            </ul>
        </div>
   </div>
</header>

<body>

@yield('content')

</body>


@yield('footer')

</html>
