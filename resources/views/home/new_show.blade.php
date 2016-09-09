@extends('home.content')

@section('right')
<div class="row">
    <div class="col-md-12">
        <h3>@lang('menu.new') <small>@lang('menu.new_show')</small></h3>
        <ol class="breadcrumb">
            <li><span class="glyphicon glyphicon-home" aria-hidden="true"></span> <a href="{{URL::route('index')}}">@lang('menu.index')</a></li>
            <li>@lang('menu.new')</li>
            <li class="active">@lang('menu.new_show')</li>
        </ol>
    </div>
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                @lang('menu.new_show')
            </div>
            <div class="panel-body">
                @if($new)
                <h1 class="text-center">{{$new->title}}</h1>
                <h5 class="text-right">{{$new->add_time}}</h5>
                    {!! $new->contents !!}
                @else
                    <h4>@lang('web.no_data')</h4>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection

@section('footer')
    <script>
        mgo('22');
    </script>
@endsection