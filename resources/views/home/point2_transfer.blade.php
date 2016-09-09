@extends('home.content')

@section('right')
<div class="row">
    <div class="col-md-12">
        <h3>@lang('menu.trade_manager') <small>@lang('menu.point2_transfer')</small></h3>
        <ol class="breadcrumb">
            <li><span class="glyphicon glyphicon-home" aria-hidden="true"></span> <a href="{{URL::route('index')}}">@lang('menu.index')</a></li>
            <li>@lang('menu.trade_manager')</li>
            <li class="active">@lang('menu.point2_transfer')</li>
        </ol>
    </div>
    <div class="col-md-12">
    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('menu.point2_transfer')
        </div>
        <div class="panel-body">
            <form class="form-horizontal" onsubmit="return false;">
                <div class="form-group">
                    <p class="col-md-4 col-md-offset-2 text-danger">您好! ({{Auth::user()->name}}). 您的可转出金币为:{{Auth::user()->point2}}</p>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label" for="">转出金币</label>
                    <div class="col-md-4">
                        <input type="text" class="form-control input-sm" id="num" name="num">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label" for="">用户编号</label>
                    <div class="col-md-4">
                        <input type="text" id="name" name="name" class="form-control input-sm">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label" for="">资金密码</label>
                    <div class="col-md-4">
                        <input type="password" class="form-control input-sm" id="password2" name="password2">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-6 col-md-offset-2 help-block" id="msg"></div>
                </div>
                <div class="form-group">
                    <div class="col-md-4 col-md-offset-2">
                        <button type="submit" class="btn btn-warning act_user_btn">马上转账</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    </div>
</div>
@endsection

@section('footer')
    <script>
        mgo('42');
        $(function(){
            $('.form-horizontal button[type=submit]').on('click',function(e){
                var me=$(this);
                me.prop('disabled', true);
                me.addClass('disabled');
                me.text('提交中...');
                var load=layer.load();
                $.ajax({
                    type: 'POST',
                    url: '{{URL::route('point2_transfer')}}',
                    data: {name:$('#name').val(),num:$('#num').val(),password2:$('#password2').val()},
                    success:function(result){
                        debugger;
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
                            layer.alert(result.msg, {
                                closeBtn: 0
                            }, function(){
                                window.location.reload(true);
                            });
                        }
                        me.prop('disabled', false);
                        me.removeClass('disabled');
                        me.text('马上转账');
                    }
                });
            });

            $('#name').on('input propertychange',function(e){
                $.ajax({
                    type:'POST',
                    url: '{{URL::route('get_user')}}',
                    data: {_token:'{{csrf_token()}}',act_user:$('#name').val()},
                    success:function(result){
                        if($('#name').val())
                            $('#msg').html(result);
                        else
                            $('#msg').html('');
                    }
                });
            })
        });
    </script>
@endsection