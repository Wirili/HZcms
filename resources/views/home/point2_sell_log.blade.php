@extends('home.content')

@section('right')
<div class="row">
    <div class="col-md-12">
        <h3>@lang('menu.trade_manager') <small>@lang('menu.point2_sell_log')</small></h3>
        <ol class="breadcrumb">
            <li><span class="glyphicon glyphicon-home" aria-hidden="true"></span> <a href="{{URL::route('index')}}">@lang('menu.index')</a></li>
            <li>@lang('menu.trade_manager')</li>
            <li class="active">@lang('menu.point2_sell_log')</li>
        </ol>
    </div>
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                @lang('menu.point2_sell_log')
            </div>
            <div class="panel-body">
                @lang('point2.sell_log_info')
            </div>
            <table class="table table-striped table-hover">
                <tr>
                    <td>@lang('point2.label.id')</td>
                    <td>@lang('point2.label.money')</td>
                    <td>@lang('point2.label.sell_pay_info')</td>
                    <td>@lang('point2.label.sell_info')</td>
                    <td>@lang('point2.label.buy_info')</td>
                    <td>@lang('point2.label.state')</td>
                    <td class="hidden-xs">@lang('point2.label.handle')</td>
                </tr>
                @forelse($list as $item)
                    <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$item->money}}</td>
                        <td>{!! trans('point2.sell_pay_info_desc',[
                            'alipay_name'=>$item->user->alipay_name,
                            'alipay_fullname'=>$item->user->alipay_fullname,
                        ]) !!}</td>
                        <td>{!! trans('point2.sell_info_desc',[
                            'weixin'=>$item->user->weixin,
                            'mobile'=>$item->user->mobile
                        ]) !!}</td>
                        <td>{!! trans('point2.buy_info_desc',[
                            'add_time'=>$item->add_time,
                            'is_pay'=>trans('point2.is_pay')[$item->is_pay]
                        ]) !!}</td>
                        <td>{{$item->state}}</td>
                        <td class="hidden-xs">
                            @if($item->state=='挂单中')
                                <botton data-id="{{$item->id}}" class="btn btn-danger btn-xs sell-quit">放弃拍卖</botton>
                            @elseif($item->state=='等待卖家确认收款')
                                <botton data-id="{{$item->id}}" class="btn btn-danger btn-xs sell-quit">收款确认</botton>
                            @else
                                -
                            @endif
                        </td>
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
        mgo('46');
        $(function(){
            $('.sell-quit').on('click',function(e){
                var me=$(this);
                layer.confirm('确认要放弃这单吗?', {
                    btn: ['确定','取消'] //按钮
                }, function(){
                    debugger;
                    var load=layer.load();
                    var id=me.data('id');
                    $.ajax({
                        type: 'POST',
                        url: '{{URL::route('point2_sell_quit')}}',
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