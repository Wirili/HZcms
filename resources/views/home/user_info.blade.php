@extends('home.content')

@section('right')
<div class="row">
    <div class="col-md-12">
        <h3>@lang('menu.user_center') <small>@lang('menu.user_info')</small></h3>
        <ol class="breadcrumb">
            <li><span class="glyphicon glyphicon-home" aria-hidden="true"></span> <a href="{{URL::route('index')}}">@lang('menu.index')</a></li>
            <li>@lang('menu.user_center')</li>
            <li class="active">@lang('menu.user_info')</li>
        </ol>
    </div>
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                @lang('menu.user_info')
            </div>
            <div class="panel-body">
                <div class="custom">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">基本信息</a></li>
                        <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">登陆密码</a></li>
                        <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">资金密码</a></li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="home">
                            <form data-action="info" class="form-horizontal" onsubmit="return false;">
                                <div class="form-group">
                                    <label for="" class="col-md-2 control-label">真实姓名</label>
                                    <div class="col-md-4">
                                        <input type="text" name="fullname" class="form-control input-sm" value="{{$user->fullname}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-md-2 control-label">微信账号</label>
                                    <div class="col-md-4">
                                        <input type="text" name="weixin" class="form-control input-sm" value="{{$user->weixin}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-md-2 control-label">支付宝账号</label>
                                    <div class="col-md-4">
                                        <input type="text" name="alipay_name" class="form-control input-sm" value="{{$user->alipay_name}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-md-2 control-label">支付宝姓名</label>
                                    <div class="col-md-4">
                                        <input type="text" name="alipay_fullname" class="form-control input-sm" value="{{$user->alipay_fullname}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-md-2 control-label">收货人</label>
                                    <div class="col-md-4">
                                        <input type="text" name="addr_name" class="form-control input-sm" value="{{$user->addr_name}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-md-2 control-label">收货地址</label>
                                    <div class="col-md-4">
                                        <input type="text" name="addr_address" class="form-control input-sm" value="{{$user->addr_address}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-md-2 control-label">收货人手机</label>
                                    <div class="col-md-4">
                                        <input type="text" id="addr_tel" name="addr_tel" class="form-control input-sm" value="{{$user->addr_tel}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-md-2 control-label">邮编</label>
                                    <div class="col-md-4">
                                        <input type="text" name="addr_postcode" class="form-control input-sm" value="{{$user->addr_postcode}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-offset-2 col-md-4 text-center">
                                        <button type="submit" class="btn btn-warning">马上修改</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="profile">
                            <form data-action="x-password" class="form-horizontal" onsubmit="return false;">
                                <div class="form-group">
                                    <label for="" class="col-md-2 control-label">当前密码</label>
                                    <div class="col-md-4">
                                        <input type="password" id="password" name="password" class="form-control input-sm" placeholder="请填写您当前密码">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-md-2 control-label">新密码</label>
                                    <div class="col-md-4">
                                        <input type="password" id="password_new" name="password_new" class="form-control input-sm" placeholder="新的密码" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-md-2 control-label">确认密码</label>
                                    <div class="col-md-4">
                                        <input type="password" id="password_new_confirmation" name="password_new_confirmation" class="form-control input-sm" placeholder="确认密码" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-offset-2 col-md-4 text-center">
                                        <button type="submit" class="btn btn-warning">马上修改</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="messages">
                            <form data-action="x-password2" class="form-horizontal" onsubmit="return false;">
                                <div class="form-group">
                                    <label for="" class="col-md-2 control-label">当前资金密码</label>
                                    <div class="col-md-4">
                                        <input type="password" id="password2" name="password2" class="form-control input-sm" placeholder="请填写您当前资金密码">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-md-2 control-label">新资金密码</label>
                                    <div class="col-md-4">
                                        <input type="password" id="password2_new" name="password2_new" class="form-control input-sm" placeholder="新的资金密码" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-md-2 control-label">确认密码</label>
                                    <div class="col-md-4">
                                        <input type="password" id="password2_new_confirmation" name="password2_new_confirmation" class="form-control input-sm" placeholder="确认密码" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-offset-2 col-md-4 text-center">
                                        <button type="submit" class="btn btn-warning">马上修改</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('footer')
    <script>
        $(function(){
            $('.form-horizontal').on('click','button[type=submit]',function(e){
                var me=$(this);
                var parent = $(e.delegateTarget);
                me.prop('disabled', true);
                me.addClass('disabled');
                me.text('提交中...');
                var load=layer.load();
                var data={};
                data['act']=parent.data('action');
                parent.find('input').each(function(e,val){
                    data[val.name]=val.value;
                });
                $.ajax({
                    type:'POST',
                    url: '{{URL::route('user_info')}}',
                    data: data,
                    success:function(result){
                        layer.close(load);
                        if(result.status=='error'){
                            $.each(result.msg,function(id,arr){
                                var str="";
                                $.each(arr,function(a,b){
                                    str+=b+"<br>";
                                });
                                layer.tips(str, '#'+id,{
                                    tips: [1, '#ec971f'],
                                    time: 2000,
                                    tipsMore:true
                                });
                            });
                        }else if(result.status=='success'){
                            layer.msg(result.msg);
                            window.location.reload(true);
                        }else{
                            layer.msg(result.msg);
                        }
                        me.prop('disabled', false);
                        me.removeClass('disabled');
                        me.text('马上修改');
                    }
                });
            });
        });
    </script>
@endsection