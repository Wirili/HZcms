@extends('admin.layout')

@section('content')
    @include('admin.header')
<div class="content">
    <form class="form-horizontal" role="form" method="POST" action="{{ URL::route('admin.user.save') }}" enctype="multipart/form-data">
        <div class="nav-tabs-custom">
                {!! csrf_field() !!}
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">@lang('user.tab_basic')</a></li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content" style="margin-top: 8px;">
                <div role="tabpanel" class="tab-pane active" id="home">
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="name">@lang('user.name')</label>
                        <div class="col-md-4"><input type="text" class="form-control input-sm" name="name" id="name"  value="{{$user->name}}"></div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="parent_name">@lang('user.parent_name')</label>
                        <div class="col-md-4"><input class="form-control input-sm" name="parent_name" id="parent_name" value="{{$user->parent_name}}"></div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="is_pass">@lang('user.is_pass')</label>
                        <div class="col-md-4">
                            <select class="form-control" name="is_pass" id="is_pass">
                                @foreach(trans('user.pass_option') as $k=>$v)
                                <option value="{{$k}}" @if($user->is_pass==$k) selected @endif>{{$v}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="level">@lang('user.level')</label>
                        <div class="col-md-4">
                            <select class="form-control" name="level" id="level">
                                @foreach(trans('config.level') as $k=>$v)
                                    <option value="{{$k}}" @if($user->is_pass==$k) selected @endif>{{$v}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">@lang('user.point1')</label>
                        <div class="col-md-4"><p class="form-control-static">{{$user->point1}}</p></div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">@lang('user.point2')</label>
                        <div class="col-md-4"><p class="form-control-static">{{$user->point2}}</p></div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="name">@lang('user.password')</label>
                        <div class="col-md-4"><input type="password" class="form-control input-sm" name="password" id="password"></div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="name">@lang('user.password2')</label>
                        <div class="col-md-4"><input type="password" class="form-control input-sm" name="password2" id="password2"></div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label" >@lang('user.reg_time')</label>
                        <div class="col-md-4"><p class="form-control-static">{{$user->reg_time}}</p></div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label" >@lang('user.reg_ip')</label>
                        <div class="col-md-4"><p class="form-control-static">{{$user->reg_ip}}</p></div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label" >@lang('user.login_count')</label>
                        <div class="col-md-4"><p class="form-control-static">{{$user->login_count}}</p></div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label" >@lang('user.last_time')</label>
                        <div class="col-md-4"><p class="form-control-static">{{$user->last_time}}</p></div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label" >@lang('user.last_ip')</label>
                        <div class="col-md-4"><p class="form-control-static">{{$user->last_ip}}</p></div>
                    </div>
                </div>
            </div>
            <div class="text-center" style="padding: 10px 0; border-top: 1px solid #f4f4f4;">
                <input type="hidden" name="id" value="{{$user->user_id}}">
                <input type="submit" class="btn btn-primary" value="@lang('sys.submit')">
                <input type="reset" class="btn btn-default" value="@lang('sys.reset')">
            </div>
        </div>
    </form>
</div>
    @include('admin.footer')
@endsection