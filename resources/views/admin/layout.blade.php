<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>后台管理</title>

    <!-- Styles -->
    <link href="{{asset('build/common/css/bootstrap.min.css')}}" rel="stylesheet" type='text/css'>
    <link href="{{asset('build/common/css/font-awesome.min.css')}}" rel="stylesheet" type='text/css'>
    <!-- 上传样式 -->
    <link href="{{asset('build/admin/css/fileinput.min.css')}}" rel="stylesheet" type='text/css'>
    <!-- end -->
    {{--<link href="{{asset('css/jquery.dataTables.min.css')}}" rel="stylesheet" type='text/css'>--}}
    <link href="{{asset('build/admin/css/dataTables.bootstrap.min.css')}}" rel="stylesheet" type='text/css'>
    <link href="{{asset('build/admin/css/buttons.bootstrap.min.css')}}" rel="stylesheet" type='text/css'>

    {{--<link href="{{asset('default_admin/css/admin.css')}}" rel="stylesheet" type='text/css'>--}}
    <link href="{{ elixir('admin/css/admin.css') }}" rel="stylesheet" type='text/css'>

    <!-- JavaScripts -->
    <script src="{{asset('build/common/js/jquery-1.12.3.min.js')}}"></script>
    <!-- 上传js -->
    <script src="{{asset('build/admin/js/plugins/canvas-to-blob.min.js')}}"></script>
    <script src="{{asset('build/admin/js/plugins/sortable.min.js')}}"></script>
    <script src="{{asset('build/admin/js/plugins/purify.min.js')}}"></script>
    <script src="{{asset('build/admin/js/fileinput.min.js')}}"></script>
    <!-- end -->
    <script src="{{asset('build/common/js/bootstrap.min.js')}}"></script>

    <script src="{{asset('build/admin/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('build/admin/js/dataTables.bootstrap.min.js')}}"></script>

    <script src="{{asset('build/admin/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('build/admin/js/buttons.bootstrap.min.js')}}"></script>
    <!-- 上传js -->
    <script src="{{asset('build/admin/themes/fa/fa.js')}}"></script>
    <script src="{{asset('build/admin/js/locales/zh.js')}}"></script>
    <!-- end -->
    <!-- select2 -->
    <link href="{{asset('build/common/plugin/select2/css/select2.min.css')}}" rel="stylesheet" type='text/css'>
    <script src="{{asset('build/common/plugin/select2/js/select2.min.js')}}"></script>
    <script src="{{asset('build/common/plugin/select2/js/i18n/zh-CN.js')}}"></script>
    <!-- datepicker -->
    <link href="{{asset('build/common/plugin/datepicker/css/bootstrap-datetimepicker.min.css')}}" rel="stylesheet" type='text/css'>
    <script src="{{asset('build/common/plugin/datepicker/js/bootstrap-datetimepicker.js')}}"></script>
    <script src="{{asset('build/common/plugin/datepicker/js/locales/bootstrap-datetimepicker.zh-CN.js')}}"></script>
    <!-- end -->
    <script src="{{asset('build/admin/js/app.js')}}"></script>

@include('UEditor::head')

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="//cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="//cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>

    <![endif]-->
    @yield('header')
</head>
<body class="skin-blue">
@yield('content')
</body>
</html>
