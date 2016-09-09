@extends('home.layout')

@section('content')
    <div class="container-fluid">
        <div class="reg-box">
            <div class="text-center h4">注册账号</div>
            <div class="reg-box-body">
                <form class="form-horizontal">
                    <div class="form-group">
                        <label for="parent_name" class="col-md-4 control-label">直推会员</label>
                        <div class="col-md-8">
                            <input id="parent_name" type="text" class="form-control" name="parent_name" placeholder="请输入直推人编号" value="{{$parent_name}}" autofocus>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name" class="col-md-4 control-label">玩家编号</label>
                        <div class="col-md-8">
                            <input id="name" type="text" class="form-control" name="name" placeholder="请输入字母或数字"  autofocus>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password" class="col-md-4 control-label">登陆密码</label>

                        <div class="col-md-8">
                            <input id="password" type="password" class="form-control" name="password" placeholder="请输入6-32位任意字符">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password_confirmation" class="col-md-4 control-label">确认密码</label>

                        <div class="col-md-8">
                            <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" placeholder="请再次输入您的登陆密码" >
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password2" class="col-md-4 control-label">资金密码</label>

                        <div class="col-md-8">
                            <input id="password2" type="password" class="form-control" name="password2" placeholder="请输入6-32位任意字符">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password2_confirmation" class="col-md-4 control-label">确认密码</label>

                        <div class="col-md-8">
                            <input id="password2_confirmation" type="password" class="form-control" name="password2_confirmation" placeholder="请再次输入您的资金密码">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="code" class="col-md-4 control-label">验证码</label>
                        <div class="row col-md-8">
                        <div class="col-xs-6">
                            <input id="code" type="text" class="form-control" name="code" placeholder="验证码">
                        </div>
                        <div class="col-xs-6">
                            <img id="code_img" src="{{captcha_src()}}" alt="" style="cursor: pointer;">
                        </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-8 col-md-offset-4">
                            <button type="submit" class="btn btn-primary">
                                马上注册
                            </button>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <p>已经注册的有账号? <a href="{{URL::route('login')}}">立即登陆</a></p>
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
@section('footer')
    <script>
        $(function(){
            $('#code_img').on('click',function(){
                var rand= parseInt(100000000*Math.random())+1;
                this.src='{{url('captcha/default')}}?'+rand;
            });
            $('.form-horizontal').on('click','button[type=submit]',function(e){
                var me=$(this);
                var parent = $(e.delegateTarget);
                me.prop('disabled', true);
                me.addClass('disabled');
                me.text('提交中...');
                var load=layer.load();
                var data={};
                parent.find('input').each(function(e,val){
                    data[val.name]=val.value;
                });
                $.ajax({
                    type:'POST',
                    url: '{{url('/register')}}',
                    data: data,
                    success:function(result){
                        debugger;
                        layer.close(load);
                        if(result.status=='error'){
                            debugger;
                            $.each(result.msg,function(id,arr){
                                var str="";
                                $.each(arr,function(a,b){
                                    str+=b+"<br>";
                                });
                                $('#'+id).focus();
                                layer.tips(str, '#'+id,{
                                    tips: [1, '#ec971f'],
                                    time: 2000,
                                    tipsMore:true
                                });
                                return false ;
                            });
                        }else if(result.status=='success'){
                            layer.msg(result.msg);
                            window.location.href='/login';
                        }else{
                            layer.msg(result.msg);
                        }
                        var rand= parseInt(100000000*Math.random())+1;
                        debugger;
                        $('#code_img').attr('src','{{url('captcha/default')}}?'+rand);
                        me.prop('disabled', false);
                        me.removeClass('disabled');
                        me.text('马上注册');
                    }
                });
            });
        });
    </script>
@endsection
