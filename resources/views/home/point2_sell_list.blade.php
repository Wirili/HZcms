@extends('home.content')

@section('right')
<div class="row">
    <div class="col-md-12">
        <h3>@lang('menu.trade_manager') <small>@lang('menu.point2_sell_list')</small></h3>
        <ol class="breadcrumb">
            <li><span class="glyphicon glyphicon-home" aria-hidden="true"></span> <a href="{{URL::route('index')}}">@lang('menu.index')</a></li>
            <li>@lang('menu.trade_manager')</li>
            <li class="active">@lang('menu.point2_sell_list')</li>
        </ol>
    </div>
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                @lang('menu.point2_sell_list')
            </div>
            <div class="panel-body">
                @lang('point2.sell_info')
                <button id="guadan_btn" class="btn btn-success">@lang('point2.sell_btn')</button><br>
                @lang('point2.sell_desc')
            </div>
            <table class="table table-striped table-hover">
                <tr>
                    <td>@lang('point2.label.id')</td>
                    <td>@lang('point2.label.money')</td>
                    <td class="hidden-xs">@lang('point2.label.add_time')</td>
                    <td>@lang('point2.label.handle')</td>
                </tr>
                @forelse($list as $item)
                    <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$item->money}}</td>
                        <td class="hidden-xs">{{$item->add_time}}</td>
                        <td><button data-id="{{$item->id}}" class="btn btn-danger btn-xs qiangou">我要抢购</button></td>
                    </tr>
                @empty
                    <tr><td colspan="5" class="text-center">@lang('web.no_data')</td></tr>
                @endforelse
            </table>
        </div>
    </div>
</div>
<div id="guadan" class="hidden">
    <div style="padding:20px 20px;">
<form class="form-horizontal" onsubmit="return false;">
    <div class="form-group">
        <label for="" class="col-md-4 control-label">可挂单金额</label>
        <div class="col-md-8">
            <input type="text" class="form-control input-sm" value="{{Auth::user()->point2}}">
        </div>
    </div>
    <div class="form-group">
        <label for="" class="col-md-4 control-label">挂单金额</label>
        <div class="col-md-8">
            <input type="text" name="num" class="form-control input-sm">
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-12 text-center">
            <button type="submit" class="btn btn-primary">马上挂单</button>
        </div>
    </div>
</form>
    </div>
</div>
@endsection

@section('footer')
    <script>
        mgo('45');
        $(function(){
            $('#guadan_btn').on('click',function(e){
                if($(window).width()<700)
                    indexdd=layer.open({type: 1,title:'金币挂单',area:'340px',skin: 'layui-layer-rim guadan',content: $("#guadan").html()});
                else
                    indexdd=layer.open({type: 1,title:'金币挂单',area:'600px',skin: 'layui-layer-rim guadan',content: $("#guadan").html()});
            });
            $('body').on('click','.guadan button[type=submit]',function(e){
                var load=layer.load();
                $.ajax({
                    type: 'POST',
                    url: '{{URL::route('point2_sell')}}',
                    data: {num:$('.guadan input[name=num]').val()},
                    success:function(result){
                        debugger;
                        layer.close(load);
                        if(result.status=='error'){
                            $.each(result.msg,function(id,arr){
                                var str="";
                                $.each(arr,function(a,b){
                                    str+=b+"<br>";
                                });
                                $('#'+id).focus();
                                layer.msg(str,{
                                    time: 2000
                                });
                                return false ;
                            });
                        }else if(result.status=='success'){
                            layer.alert(result.msg, {
                                closeBtn: 0
                            }, function(){
                                window.location.reload(true);
                            });
                        }
                    }
                });
            });

            $('.qiangou').on('click',function(e){
                var me=$(this);
                layer.confirm('确认要拍下这单吗?如果拍下后不付款,系统会对您相应的处罚？', {
                    btn: ['确定','取消'] //按钮
                }, function(){
                    var load=layer.load();
                    var id=me.data('id');
                    $.ajax({
                        type: 'POST',
                        url: '{{URL::route('point2_buy')}}',
                        data: {id:id},
                        success:function(result){
                            layer.close(load);
                            if(result.status=='error'){
                                layer.msg(result.msg,{
                                    time: 2000
                                });
                            }else if(result.status=='success'){
                                layer.alert(result.msg, {
                                    closeBtn: 0
                                }, function(){
                                    window.location.reload(true);
                                });
                            }
                        }
                    });
                }, function(){
                });
            });
        })
    </script>
@endsection