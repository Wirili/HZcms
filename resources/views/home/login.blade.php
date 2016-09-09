@extends('home.layout')

@section('content')
<div class="container-fluid">
    <div class="login-box">
        <div class="login-logo text-center h4">Login</div>
        <div class="login-box-body">
            <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                {{ csrf_field() }}
                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <div class="col-md-12">
                        <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="@lang('login.label.name')" autofocus>

                        @if ($errors->has('name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <div class="col-md-12">
                        <input id="password" type="password" class="form-control" name="password" placeholder="@lang('login.label.password')">

                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-12">
                        <div class="checkbox pull-left">
                            <label>
                                <input type="checkbox" name="remember"> @lang('login.remember')
                            </label>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary btn-block">
                            @lang('login.login')
                        </button>
                    </div>
                </div>
                <div class="form-group">
                    <a class="btn btn-link pull-right" href="{{ url('/password/reset') }}">
                        @lang('login.forget')
                    </a>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <p class="help-block">您还不是{{$C['web_title']}}的会员?
                            <a href="{{ URL::route('register') }}">创建一个新账号</a>
                        </p>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
        $.backstretch(["/build/default/images/dl.jpg"], {
            fade: 100,
            duration: 100
        });
</script>
@endsection
