@extends('home.content')

@section('right')
<div class="row">
    <div class="col-md-12">
        <h3>@lang('menu.farm_manager') <small>@lang('menu.farm')</small></h3>
        <ol class="breadcrumb">
            <li><span class="glyphicon glyphicon-home" aria-hidden="true"></span> <a href="{{URL::route('index')}}">@lang('menu.index')</a></li>
            <li>@lang('menu.farm_manager')</li>
            <li class="active">@lang('menu.farm')</li>
        </ol>
    </div>
    <div class="col-md-12">
    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('menu.farm')
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-12 text-right"><button class="btn btn-info join-corps">加入军团</button></div>
            </div>
            <div class="row">
                <div class="col-md-12">
            @if($corps)
                    <ul class="nav nav-tabs" role="tablist">
                        @foreach($groups as $item)
                        <li role="groups-{{$item->group}}" @if($loop->first) class="active" @endif><a href="#group-{{$item->group}}" role="group-{{$item->group}}" data-toggle="tab">军团{{$item->group}}</a></li>
                        @endforeach
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content" style="border:1px solid #ddd; border-top:none;padding:15px 0 0 0;">
                        @foreach($groups as $item)
                        <div role="tabpanel" class="tab-pane @if($loop->first) active @endif" id="group-{{$item->group}}">
                            <div class="corps-scoll" style="width:100%;overflow-y: auto;">
                            <table class="table table-hover table-striped" style="margin-bottom:0;width:4200px;">
                                <tr>
                                    <th width="50">级别</th>
                                    <th>用户</th>
                                </tr>
                                <tr>
                                    <td>
                                        <?php $level=0; ?>
                                    @foreach($corps->where('group',$item->group) as $v)
                                        @if($level!=$v->level)
                                            @if(!$loop->first) </td></tr><tr><td> @endif
                                            {{explode(',',$C['corps_level_name'])[$v->level-1]}}</td><td class="text-center" >
                                        @endif
                                        <div class="text-center" style="width:50px;margin:5px;display:inline-block;@if($v->user_id==\Auth::user()->user_id)color:red;@endif">
                                        <img src="{{$v->user->img}}" alt="" height="50" width="50">
                                        {{$v->user->name}}
                                        </div>
                                        <?php $level=$v->level; ?>
                                    @endforeach
                                    </td>
                                </tr>
                            </table>
                            </div>
                        </div>
                        @endforeach
                    </div>
            @else
                <div class="text-center">@lang('web.no_data')</div>
            @endif
                </div>
            </div>
        </div>
    </div>
    </div>
</div>
@endsection

@section('footer')
    <script>
        mgo('61');
        $(function() {

            $('.corps-scoll').scrollLeft(2125-$('.corps-scoll').width()/2);
            $('.join-corps').on('click', function (e) {
                var load = layer.load();
                $.ajax({
                    type: 'POST',
                    url: '{{URL::route('corps_add')}}',
                    success: function (result) {
                        debugger;
                        layer.close(load);
                        if (result.status == 'error') {
                            $.each(result.msg, function (id, arr) {
                                var str = "";
                                $.each(arr, function (a, b) {
                                    str += b + "<br>";
                                    return false;
                                });
                                layer.msg(str, {
                                    time: 2000,
                                });
                                return false;
                            });
                        } else if (result.status == 'success') {
                            layer.alert(result.msg, {
                                closeBtn: 0
                            }, function () {
                                window.location.reload(true);
                            });
                        }
                    }
                });
            });
        });
    </script>
@endsection