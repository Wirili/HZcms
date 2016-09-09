@extends('admin.layout')

@section('content')
    <div class="content-header">
        <h1>
            General UI
            <small>Preview of UI elements</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#">@lang('sys.home')</a></li>
            <li class="active">@lang('sys.sys_info')</li>
        </ol>
    </div>
    <div class="content">
        <div class="box box-info">
            <div class="box-header">@lang('sys.sys_info')</div>
            <div class="box-body">
                <table class="table table-hover table-responsive" style="margin:0;">
                    <tr align="center">
                        <td class="text-left">@lang('sys.os')</td>
                        <td class="text-left">{{$sys_info['os']}}</td>
                        <td class="text-left">@lang('sys.web_server')</td>
                        <td class="text-left">{{$sys_info['web_server']}}</td>
                    </tr>
                    <tr align="center">
                        <td class="text-left">@lang('sys.php_ver')</td>
                        <td class="text-left">{{$sys_info['php_ver']}}</td>
                        <td class="text-left">@lang('sys.timezone')</td>
                        <td class="text-left">{{$sys_info['timezone']}}</td>
                    </tr>
                    <tr align="center">
                        <td class="text-left">@lang('sys.safe_mode')</td>
                        <td class="text-left">{{$sys_info['safe_mode']}}</td>
                        <td class="text-left">@lang('sys.safe_mode_gid')</td>
                        <td class="text-left">{{$sys_info['safe_mode_gid']}}</td>
                    </tr>
                    <tr align="center">
                        <td class="text-left">@lang('sys.socket')</td>
                        <td class="text-left">{{$sys_info['socket']}}</td>
                        <td class="text-left">@lang('sys.zlib')</td>
                        <td class="text-left">{{$sys_info['zlib']}}</td>
                    </tr>
                    <tr align="center">
                        <td class="text-left">@lang('sys.gd')</td>
                        <td class="text-left">{{$sys_info['gd']}}</td>
                        <td class="text-left">@lang('sys.max_filesize')</td>
                        <td class="text-left">{{$sys_info['max_filesize']}}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    @include('admin.footer')
@endsection