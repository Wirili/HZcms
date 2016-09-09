@extends('home.content')

@section('right')
<div class="row">
    <div class="col-md-12">
        <h3>@lang('menu.farm_manager') <small>@lang('menu.act_user_log')</small></h3>
        <ol class="breadcrumb">
            <li><span class="glyphicon glyphicon-home" aria-hidden="true"></span> <a href="{{URL::route('index')}}">@lang('menu.index')</a></li>
            <li>@lang('menu.user_manager')</li>
            <li class="active">@lang('menu.act_user_log')</li>
        </ol>
    </div>
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                @lang('menu.act_user_log')
            </div>
            <table class="table table-striped table-hover">
                <tr>
                    <td>@lang('log1.label.price')</td>
                    <td>@lang('log1.label.about')</td>
                    <td class="hidden-xs">@lang('log1.label.add_time')</td>
                    <td class="hidden-xs">@lang('log1.label.ip')</td>
                </tr>
                @forelse($log as $item)
                    <tr>
                        <td>{{$item->price}}</td>
                        <td>{{$item->about}}</td>
                        <td class="hidden-xs">{{$item->add_time}}</td>
                        <td class="hidden-xs">{{$item->ip}}</td>
                    </tr>
                @empty
                    <tr><td colspan="4" class="text-center">@lang('web.no_data')</td></tr>
                @endforelse
                    <tr>
                        <td colspan="4" class="text-center custom-pagination">
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
        mgo('24');
    </script>
@endsection