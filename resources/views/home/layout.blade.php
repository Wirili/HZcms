<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{$page_title or ''}} - {{$C['web_title'] or '网站首页'}}</title>

    <!-- Styles -->
    <link href="{{asset('build/common/css/bootstrap.min.css')}}" rel="stylesheet" type='text/css'>
    <link href="{{asset('build/common/css/font-awesome.min.css')}}" rel="stylesheet" type='text/css'>

    <link href="{{ elixir('default/css/default.css') }}" rel="stylesheet" type='text/css'>

    <!-- JavaScripts -->
    <script src="{{asset('build/common/js/jquery-1.12.3.min.js')}}"></script>
    <script src="{{asset('build/common/js/jquery.json.js')}}"></script>
    <script src="{{asset('build/common/js/bootstrap.min.js')}}"></script>
    <!-- 背景图 -->
    <script src="{{asset('build/common/plugin/backstretch/jquery.backstretch.min.js')}}"></script>
    <!-- end -->

    <!-- layer -->
    <link href="{{asset('build/common/plugin/layer/skin/layer.css')}}" rel="stylesheet" type='text/css'>
    <script src="{{asset('build/common/plugin/layer/layer.js')}}"></script>
    <!-- end layer -->
    <!-- swiper -->
    <link href="{{asset('build/common/plugin/swiper/swiper.css')}}" rel="stylesheet" type='text/css'>
    <script src="{{asset('build/common/plugin/swiper/swiper.js')}}"></script>
    <!-- end swiper -->

    <!-- bootstrap treeview -->
    <link href="{{asset('build/common/plugin/bootstrap-treeview/bootstrap-treeview.min.css')}}" rel="stylesheet" type='text/css'>
    <script src="{{asset('build/common/plugin/bootstrap-treeview/bootstrap-treeview.min.js')}}"></script>
    <!-- end layer -->
    <script src="{{asset('build/default/js/app.js')}}"></script>

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="//cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="//cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>

    <![endif]-->
    @yield('header')
</head>
<body>
@yield('content')
@yield('footer')
</body>
</html>
