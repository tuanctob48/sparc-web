<!doctype html>
<html >
    <head>
        <title>@yield('title')</title>
				<link rel="stylesheet" type="text/css" href="{{url('css/font-awesome.min.css')}}"/>
				<link rel="stylesheet" type="text/css" href="{{url('css/default.css')}}"/>
				<link rel="stylesheet" type="text/css" href="{{url('css/style.css')}}"/>
				</head>
				<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		</head>
    <body>
    @include('includes.header')
    <div class="container">
        @yield('content')
    </div>    
    </body>
</html>