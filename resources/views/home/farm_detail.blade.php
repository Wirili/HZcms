@extends('home.content')

@section('right')
<div class="row">
    <div class="col-md-12">
        <h3>@lang('menu.farm_manager') <small>@lang('menu.farm_detail')</small></h3>
        <ol class="breadcrumb">
            <li><span class="glyphicon glyphicon-home" aria-hidden="true"></span> <a href="{{URL::route('index')}}">@lang('menu.index')</a></li>
            <li>@lang('menu.farm_manager')</li>
            <li class="active">@lang('menu.farm_detail')</li>
        </ol>
    </div>
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                @lang('menu.farm_detail')
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12">
                        @forelse($farm_sum as $item)
                            @if($loop->first)
                                @lang('farm.total.0')
                            @else
                                @lang('farm.total.1')
                            @endif
                            {{$item->title.'×'.$item->num}}
                        @empty
                            <div class="text-center">@lang('web.no_data')</div>
                        @endforelse
                    </div>
                </div>
            </div>
            <table class="table table-striped table-hover">
                <tr>
                    <td class="text-center">@lang('farm.label.market')</td>
                    <td class="text-center hidden-xs">@lang('farm.label.attr')</td>
                    <td class="text-center">@lang('farm.label.settle')</td>
                </tr>
                @forelse($farm as $item)
                    <tr>
                        <td class="text-center"><img src="{{$item->image}}" alt="{{$item->title}}" height="100"></td>
                        <td class="hidden-xs">
                            @lang('farm.attr_text',[
                                'title'=>$item->title,
                                'num'=>$item->num,
                                'point2_day'=>$item->point2_day,
                                'point2_day_total'=>$item->num*$item->point2_day,
                            ])
                        </td>
                        <td>
                            @lang('farm.settle_text',[
                                'add_time'=>date('Y-m-d',strtotime($item->add_time)),
                                'end_time'=>date('Y-m-d',strtotime($item->end_time)),
                                'settle_len'=>$item->settle_len,
                                'settle_money'=>$item->num*$item->point2_day*$item->settle_len,
                                'left_len'=>$item->life-$item->settle_len,
                                'left_money'=>$item->num*$item->point2_day*($item->life-$item->settle_len),
                            ])
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="3" class="text-center">@lang('web.no_data')</td></tr>
                @endforelse
                    <tr>
                        <td colspan="3" class="text-center custom-pagination">
                        @if($farm->count()>0)
                            {{$farm->render()}}
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
        mgo('12');
    </script>
@endsection