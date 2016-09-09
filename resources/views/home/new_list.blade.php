@extends('home.content')

@section('right')
<div class="row">
    <div class="col-md-12">
        <h3>@lang('menu.new') <small>@lang('menu.new_list')</small></h3>
        <ol class="breadcrumb">
            <li><span class="glyphicon glyphicon-home" aria-hidden="true"></span> <a href="{{URL::route('index')}}">@lang('menu.index')</a></li>
            <li>@lang('menu.new')</li>
            <li class="active">@lang('menu.new_list')</li>
        </ol>
    </div>
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                @lang('menu.new_list')
            </div>
            <table class="table table-striped table-hover">
                <tr>
                    <td>@lang('new.title')</td>
                    <td>@lang('new.add_time')</td>
                </tr>
                @forelse($list as $item)
                    <tr>
                        <td>@if($item->category) [{{$item->category->title}}] @endif <a href="{{URL::route('new_show',['id'=>$item->id])}}">{{$item->title}}</a></td>
                        <td>{{$item->add_time}}</td>
                    </tr>
                @empty
                    <tr><td colspan="7" class="text-center">@lang('web.no_data')</td></tr>
                @endforelse
                    <tr>
                        <td colspan="7" class="text-center custom-pagination">
                        @if($list->count()>0)
                            {{$list->render()}}
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