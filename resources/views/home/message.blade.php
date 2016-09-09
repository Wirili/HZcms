@extends('home.content')

@section('right')
<div class="row">
    <div class="col-md-12">
        <h3>@lang('menu.mail') <small>@if(URL::current()==URL::route('message',['act'=>'out'])) @lang('msg.label.out') @else @lang('msg.label.in') @endif </small></h3>
        <ol class="breadcrumb">
            <li><span class="glyphicon glyphicon-home" aria-hidden="true"></span> <a href="{{URL::route('index')}}">@lang('menu.index')</a></li>
            <li>@lang('menu.mail')</li>
            <li class="active">@if(URL::current()==URL::route('message',['act'=>'out'])) @lang('msg.label.out') @else @lang('msg.label.in') @endif</li>
        </ol>
    </div>
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                @if(URL::current()==URL::route('message',['act'=>'out'])) @lang('msg.label.out') @else @lang('msg.label.in') @endif
            </div>
            <div class="panel-body">
                <a href="{{URL::route('message',['act'=>'in'])}}" class="btn btn-info">@lang('msg.label.in')</a>
                <a href="{{URL::route('message',['act'=>'out'])}}" class="btn btn-info">@lang('msg.label.out')</a>
                <a href="" class="btn btn-info pull-right">@lang('msg.label.write')</a>
            </div>
            <table class="table table-striped table-hover">
                <tr>
                    <td>@lang('msg.label.user')</td>
                    <td>@lang('msg.label.to_user')</td>
                    <td>@lang('msg.label.info')</td>
                    <td>@lang('msg.label.add_time')</td>
                    <td class="hidden-xs">@lang('msg.label.handle')</td>
                </tr>
                @forelse($msg as $item)
                    <tr>
                        <td>{{$item->user_name}}</td>
                        <td>{{$item->to_user_name}}</td>
                        <td>{{$item->info}}</td>
                        <td>{{$item->add_time}}</td>
                        <td class="hidden-xs"></td>
                    </tr>
                @empty
                    <tr><td colspan="5" class="text-center">@lang('web.no_data')</td></tr>
                @endforelse
                    <tr>
                        <td colspan="5" class="text-center custom-pagination">
                        @if($msg->count()>0)
                            {{$msg->render()}}
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