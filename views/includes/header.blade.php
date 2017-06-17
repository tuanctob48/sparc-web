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
