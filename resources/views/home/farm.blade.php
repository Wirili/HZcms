@extends('home.content')

@section('right')
<div class="row">
    <div class="col-md-12">
        <h3>@lang('menu.farm_manager') <small>@lang('menu.farm')</small></h3>
        <ol class="breadcrumb">
            <li><span class="glyphicon glyphicon-home" aria-hidden="true"></span> <a href="{{URL::route('index')}}">@lang('menu.index')</a></li>
            <li>@lang('menu.farm_manager')</li>
            <li class="active">@lang('menu.farm')</li>
        </ol>
    </div>
    <div class="col-md-12">
    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('menu.farm')
        </div>
        <div class="panel-body">
            <div class="row">
                @forelse($farm as $item)
                <div class="col-sm-6 col-md-3">
                    <div class="thumbnail">
                        <img src="{{$item->image}}" alt="{{$item->title}}">
                        <div class="caption">
                            <h3>
                                @lang('farm.caption',[
                                    'no'=>$item->title.$item->id,
                                    'num'=>$item->num
                                ])
                            </h3>
                            <div class="progress">
                                <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="0" style="width: {{floatval($item->settle_len)/floatval($item->life)*100}}%;">
                                    @lang('farm.progress',['settle_len'=>$item->settle_len])
                                </div>
                            </div>
                            <p>
                                @lang('farm.detail',[
                                    'settle_money'=>$item->num*$item->point2_day*$item->settle_len,
                                    'left_money'=>$item->num*$item->point2_day*($item->life-$item->settle_len),
                                ])
                            <p>@lang('farm.add_time',['add_time'=>date('Y-m-d',strtotime($item->add_time))])</p>
                        </div>
                    </div>
                </div>
                @empty
                    <div class="text-center">@lang('web.no_data')</div>
                @endforelse
            </div>
            @if($farm->count()>0)
            <div class="row">
                <div class="col-md-12 text-center custom-pagination">
                    {{$farm->render()}}
                </div>
            </div>
            @endif
        </div>
    </div>
    </div>
</div>
@endsection

@section('footer')
    <script>
        mgo('11');
    </script>
@endsection