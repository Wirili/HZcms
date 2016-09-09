@extends('home.content')

@section('right')
<div class="row">
    <div class="col-md-12">
        <h3>@lang('menu.user_manager') <small>@lang('menu.child_list')</small></h3>
        <ol class="breadcrumb">
            <li><span class="glyphicon glyphicon-home" aria-hidden="true"></span> <a href="{{URL::route('index')}}">@lang('menu.index')</a></li>
            <li>@lang('menu.user_manager')</li>
            <li class="active">@lang('menu.child_list')</li>
        </ol>
    </div>
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                @lang('menu.child_list')
            </div>
            <table class="table table-striped table-hover">
                <tr>
                    <td>@lang('user.name')</td>
                    <td>@lang('user.fullname')</td>
                    <td>@lang('user.level_label')</td>
                    <td>@lang('user.is_pass')</td>
                    <td class="hidden-xs">@lang('user.is_lock')</td>
                    <td class="hidden-xs">@lang('user.last_time')</td>
                    <td class="hidden-xs">@lang('user.reg_time')</td>
                </tr>
                @forelse($child_list as $item)
                    <tr>
                        <td>{{$item->name}}</td>
                        <td>{{$item->fullname}}</td>
                        <td>{!! trans('user.level')[$item->level] !!}</td>
                        <td>{{ trans('user.is_pass_option')[$item->is_pass] }}</td>
                        <td class="hidden-xs">{{ trans('user.is_lock_option')[$item->is_lock]}}</td>
                        <td class="hidden-xs">{{$item->last_time}}</td>
                        <td class="hidden-xs">{{$item->reg_time}}</td>
                    </tr>
                @empty
                    <tr><td colspan="7" class="text-center">@lang('web.no_data')</td></tr>
                @endforelse
                    <tr>
                        <td colspan="7" class="text-center custom-pagination">
                        @if($child_list->count()>0)
                            {{$child_list->render()}}
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
        mgo('22');
    </script>
@endsection