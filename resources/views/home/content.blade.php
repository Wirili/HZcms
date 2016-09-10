@extends('home.layout')

@section('content')
    <div class="container-fluid top clearfix">
        <div class="row clearfix">
            <div class="col-sm-4 logo">
                <img src="/build/default/images/logo2.png" alt="" height="100";>
            </div>
            <div class="col-sm-8 an">
                <div class="btn-group btn-group-lg">
                    <button type="button" class="btn btn-default clearfix visible-xs-block menu-btn"><span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true"></span></button>
                    <a href="{{URL::route('new_list')}}" type="button" class="btn btn-default clearfix"><span class="glyphicon glyphicon-bullhorn" aria-hidden="true"></span><span class="hidden-xs"> @lang('menu.new')</span></a>
                    <a href="{{URL::route('message',['act'=>'in'])}}" type="button" class="btn btn-default clearfix"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span><span class="hidden-xs"> @lang('menu.mail')</span></a>
                    <div class="btn-group btn-group-lg" role="group">
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="glyphicon glyphicon-user" aria-hidden="true"></span> {{Auth::user()->name}}
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-right">
                            <li><a href="{{URL::route('user_info')}}"> @lang('menu.user_info')</a></li>
                            <li><a href="#"> @lang('menu.password_protected')</a></li>
                            <li><a href="{{URL::route('log_login')}}"> @lang('menu.log_login')</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="{{URL::route('logout')}}"><span class="glyphicon glyphicon-off"></span> @lang('menu.logout')</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="main clearfix">
        <!--LEFT -->
        <div class="left pull-left">     <div class="btn-group-vertical choujiang"><a href="/member/lottery.php" target="_blank"><img src="/build/default/images/cj.gif" /></a></div>
            <div class="btn-group-vertical">
                <ul>
                    <li>
                        <a class="btn btn-long" href="{{URL::route('index')}}" id="mlindex"><span class="glyphicon glyphicon-home llong0" aria-hidden="true"></span><span class="llong2">@lang('menu.home')</span></a>
                    </li>
                    <li>
                        <a class="btn btn-long" href="#" role="button"><span class="glyphicon glyphicon-piggy-bank llong0" aria-hidden="true"></span><span class="llong2">@lang('menu.farm_manager')</span><span class="glyphicon glyphicon-menu-left llong1"></span></a>
                        <ul class="sub-menu">
                            <li><a class="btn btn-long8" href="{{URL::route('farm')}}" id="m11">@lang('menu.farm')</a></li>
                            <li><a class="btn btn-long8" href="{{URL::route('farm_detail')}}" id="m12">@lang('menu.farm_detail')</a></li>
                            <li><a class="btn btn-long8" href="{{URL::route('farm_shop')}}" id="m13">@lang('menu.farm_shop')</a></li>
                        </ul>
                    </li>
                    <li>
                        <a class="btn btn-long" href="#" role="button"><span class="glyphicon glyphicon-user llong0" aria-hidden="true"></span><span class="llong2">@lang('menu.user_manager')</span><span class="glyphicon glyphicon-menu-left llong1"></span></a>
                        <ul class="sub-menu">
                            <li><a class="btn btn-long8" href="{{URL::route('user_child')}}" id="m21">@lang('menu.user_child')</a></li>
                            <li><a class="btn btn-long8" href="{{URL::route('child_list')}}" id="m22">@lang('menu.child_list')</a></li>
                            <li><a class="btn btn-long8" href="{{URL::route('act_user')}}" id="m23">@lang('menu.act_user')</a></li>
                            <li><a class="btn btn-long8" href="{{URL::route('act_user_log')}}" id="m24">@lang('menu.act_user_log')</a></li>

                        </ul>
                    </li>
                    <li>
                        <a class="btn btn-long" href="#" role="button"><span class="glyphicon glyphicon-usd llong0" aria-hidden="true"></span><span class="llong2">@lang('menu.account_detail')</span><span class="glyphicon glyphicon-menu-left llong1"></span></a>
                        <ul class="sub-menu">

                            <li><a class="btn btn-long8" href="{{URL::route('point2_log_in')}}" id="m31">@lang('menu.point2_log_in')</a></li>
                            <li><a class="btn btn-long8" href="{{URL::route('point2_log_out')}}" id="m32">@lang('menu.point2_log_out')</a></li>
                        </ul>
                    </li>
                    <li>
                        <a class="btn btn-long" href="#" role="button"><span class="glyphicon glyphicon-retweet llong0" aria-hidden="true"></span><span class="llong2">@lang('menu.trade_manager')</span><span class="glyphicon glyphicon-menu-left llong1"></span></a>
                        <ul class="sub-menu">
                            <li><a class="btn btn-long8" href="{{URL::route('point2_sell_list')}}" id="m45">@lang('menu.point2_sell_list')</a></li>
                            <li><a class="btn btn-long8" href="{{URL::route('point2_buy_log')}}" id="m47">@lang('menu.point2_buy_log')</a></li>
                            <li><a class="btn btn-long8" href="{{URL::route('point2_sell_log')}}" id="m46">@lang('menu.point2_sell_log')</a></li>
                            <li><a class="btn btn-long8" href="{{URL::route('point2_transfer')}}" id="m42">@lang('menu.point2_transfer')</a></li>
                        </ul>
                    </li>
                    <li>
                        <a class="btn btn-long" href="#" role="button"><span class="glyphicon glyphicon-shopping-cart llong0" aria-hidden="true"></span><span class="llong2">购买商品</span><span class="glyphicon glyphicon-menu-left llong1"></span></a>
                        <ul class="sub-menu">
                            <li><a class="btn btn-long8" href="/member/point2_shop.php" id="m51">商城购物</a></li>
                            <li><a class="btn btn-long8" href="/member/point2_shop_order.php" id="m52">我的订单</a></li>
                        </ul>
                    </li>
                    <li>
                        <a class="btn btn-long" href="#" role="button"><span class="glyphicon glyphicon-shopping-cart llong0" aria-hidden="true"></span><span class="llong2">军团管理</span><span class="glyphicon glyphicon-menu-left llong1"></span></a>
                        <ul class="sub-menu">
                            <li><a class="btn btn-long8" href="{{URL::route('corps_index')}}" id="m61">军团详情</a></li>
                            <li><a class="btn btn-long8" href="/member/point2_shop_order.php" id="m62">我的订单</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        <div class="right container-fluid">
            @yield('right')
        </div>
    </div>
@endsection