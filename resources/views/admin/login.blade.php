@extends('admin.layout')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4 col-lg-offset-4 col-sm-4 col-sm-offset-4" style="margin-top: 10%;">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h3 class="text-center">后台管理系统</h3>
                        <form action="{{URL::route('admin.postLogin')}}" method="post">
                            {{csrf_field()}}
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <input id="email" name="email" class="form-control" type="text" placeholder="用户名" value="{{old('email')}}">
                            </div>
                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <input id="password" name="password" class="form-control" type="password" placeholder="密码" value="">
                            </div>
                            <div class="form-group">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember"> 自动登陆
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <input class="btn btn-primary btn-block" type="submit" value="登陆">
                            </div>
                            @foreach($errors->all() as $item)
                                <div class="text-danger">{{$item}}</div>
                            @endforeach
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection