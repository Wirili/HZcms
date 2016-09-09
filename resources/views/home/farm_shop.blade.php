@extends('home.content')

@section('right')
<div class="row">
    <div class="col-md-12">
        <h3>@lang('menu.farm_manager') <small>@lang('menu.farm_shop')</small></h3>
        <ol class="breadcrumb">
            <li><span class="glyphicon glyphicon-home" aria-hidden="true"></span> <a href="{{URL::route('index')}}">@lang('menu.index')</a></li>
            <li>@lang('menu.farm_manager')</li>
            <li class="active">@lang('menu.farm_shop')</li>
        </ol>
    </div>
    <div class="col-md-12">
        <div class="panel panel-default custom">
            <div class="panel-heading">
                @lang('menu.farm_shop')
            </div>
            <table class="table table-striped table-hover">
                <tr>
                    <td></td>
                    <td class="hidden-xs">@lang('farm.label.attr')</td>
                    <td>@lang('farm.label.price')</td>
                    <td class="text-center">@lang('farm.label.num')</td>
                    <td class="text-center hidden-xs">@lang('farm.label.sub_total')</td>
                </tr>
                @forelse($farm as $item)
                    <tr>
                        <td class="text-center"><img src="{{$item->image}}" alt="{{$item->title}}" height="100"></td>
                        <td class="hidden-xs">
                            @lang('farm.desc_text',[
                                'title'=>$item->title,
                                'point2_total'=>$item->point2_day*$item->life,
                                'point2_day'=>$item->point2_day,
                                'life'=>$item->life,
                                'buy_limit'=>$item->buy_limit,
                                'max_limit'=>$item->max_limit,
                                'min_level'=>trans('user.level')[$item->min_level],
                            ])
                        </td>
                        <td>
                            {{$item->money}}
                        </td>
                        <td class="text-center">
                            @if($item->min_level<=Auth::user()->level)
                            <div class="input-group" style="width:130px;margin:0 auto;">
                                <span class="input-group-btn">
                                    <button class="btn btn-default minus" type="button"><span class="glyphicon glyphicon-minus"></span></button>
                                </span>
                                <input type="number" data-id="{{$item->id}}" data-money="{{$item->money}}" class="form-control num" size="3" value="0">
                                <span class="input-group-btn">
                                    <button class="btn btn-default plus" type="button"><span class="glyphicon glyphicon-plus"></span></button>
                                </span>
                            </div>
                            @else
                                等级不足
                            @endif
                        </td>
                        <td class="text-center hidden-xs">
                            <strong class="sub-total">0</strong>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="5" class="text-center">@lang('web.no_data')</td></tr>
                @endforelse
            </table>
            <div class="panel-body">
                <div class="row text-right">
                    <div class="col-md-3">直推人数：<span>{{Auth::user()->children->count()}}</span></div>
                    <div class="col-md-3">当前等级：{!! trans('user.level')[Auth::user()->level] !!}</div>
                    <div class="col-md-3">金币余额：<strong style="color:red;">{{Auth::user()->point2}}</strong></div>
                    <div class="col-md-3">已选择<span id="total_num">0</span>个商品</div>
                    <div class="col-md-12">总价：<strong id="total" style="color:red;">0</strong></div>
                </div>
                <div class="row text-right">
                    <div class="col-md-12"><button id="cart_quick" class="btn btn-danger" type="submit">立即购买</button></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('footer')
    <script>
        mgo('13');
        function total(){
            var total=0;
            var total_num=0;
            $.each($('.num'),function(i,e){
                var me=$(this);
                total_num+=parseInt(me.val());
                total+=parseFloat(me.val())*parseFloat(me.data('money'));
            });
            $('#total_num').html(total_num);
            $('#total').html(total);
        }
        $(function(){
            $('.input-group').on('click','.minus',function(e){
                var me=$(e.currentTarget);
                var j_num=$(e.delegateTarget).children('.num');
                var j_sub_total=me.parents('tr').find('.sub-total');
                var num=parseInt(j_num.val())-1;
                if(num<0)
                    j_num.val(0);
                else
                    j_num.val(num);
                j_sub_total.html(parseFloat(j_num.val())*parseFloat(j_num.data('money')));
                total();
            });
            $('.input-group').on('click','.plus',function(e){
                var me=$(e.currentTarget);
                var j_num=$(e.delegateTarget).children('.num');
                var j_sub_total=me.parents('tr').find('.sub-total');
                var num=parseInt(j_num.val())+1;
                j_num.val(num);
                j_sub_total.html(parseFloat(j_num.val())*parseFloat(j_num.data('money')));
                total();
            });
            $('.input-group').on('input propertychange','.num',function(e){
                var j_num=$(e.currentTarget);
                var j_sub_total=j_num.parents('tr').find('.sub-total');
                debugger;
                if(parseInt(j_num.val())<0||isNaN(parseInt(j_num.val())))
                    j_num.val(0)
                j_sub_total.html(parseFloat(j_num.val())*parseFloat(j_num.data('money')));
                total();
            });
            $('#cart_quick').on('click',function(e){
                var data=[];
                $.each($('.num'),function(){
                   var goods={};
                   goods.num=parseInt($(this).val());
                   if(goods.num>0) {
                       goods.id = $(this).data('id');
                       data.push(goods);
                   }
                });
                debugger;
                if(data.length==0){
                    layer.msg('请输入购买商品数量！',{time:2000});
                    return false;
                }
                var load=layer.load();
                $.ajax({
                    type: 'POST',
                    url: '{{URL::route('cart_quick')}}',
                    data: {data:data},
                    success:function(result){
                        layer.close(load);
                        if(result.status=='error'){
                            layer.msg(result.msg);
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
        });
    </script>
@endsection