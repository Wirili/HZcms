@extends('home.content')

@section('right')
<div class="row">
    <div class="col-md-12">
        <h3>@lang('menu.user_center') <small>@lang('menu.log_login')</small></h3>
        <ol class="breadcrumb">
            <li><span class="glyphicon glyphicon-home" aria-hidden="true"></span> <a href="{{URL::route('index')}}">@lang('menu.index')</a></li>
            <li>@lang('menu.user_center')</li>
            <li class="active">@lang('menu.log_login')</li>
        </ol>
    </div>
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                @lang('menu.log_login')
            </div>
            <table class="table table-striped table-hover">
                <tr>
                    <td>@lang('user.log_login.ip')</td>
                    <td class="hidden-xs">@lang('user.log_login.add_time')</td>
                </tr>
                @forelse($log as $item)
                    <tr>
                        <td>{{$item->ip}}</td>
                        <td class="hidden-xs">{{$item->add_time}}</td>
                    </tr>
                @empty
                    <tr><td colspan="5" class="text-center">@lang('web.no_data')</td></tr>
                @endforelse
                    <tr>
                        <td colspan="5" class="text-center custom-pagination">
                        @if($log->count()>0)
                            {{$log->render()}}
                        @endif
                        </td>
                    </tr>
            </table>
        </div>
    </div>
</div>
@endsection

@section('footer')
    <script>
        mgo('31');
    </script>
@endsection