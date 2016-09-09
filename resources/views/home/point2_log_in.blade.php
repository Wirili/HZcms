@extends('home.content')

@section('right')
<div class="row">
    <div class="col-md-12">
        <h3>@lang('menu.account_detail') <small>@lang('menu.point2_log_in')</small></h3>
        <ol class="breadcrumb">
            <li><span class="glyphicon glyphicon-home" aria-hidden="true"></span> <a href="{{URL::route('index')}}">@lang('menu.index')</a></li>
            <li>@lang('menu.account_detail')</li>
            <li class="active">@lang('menu.point2_log_in')</li>
        </ol>
    </div>
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                @lang('menu.point2_log_in')
            </div>
            <div class="panel-body">
                <p class="col-sm-6 col-md-3">@lang('log2.in_total.point2',['value'=>\Auth::user()->point2])</p>
                <p class="col-sm-6 col-md-3">@lang('log2.in_total.point2_in',['value'=>App\Models\LogPoint2::where('price','>',0)->where('user_id',\Auth::user()->user_id)->sum('price')??'0.00'])</p>
                <p class="col-sm-6 col-md-3">@lang('log2.in_total.farm_return',['value'=>App\Models\LogPoint2::where('type',trans('log2.type.farm_return'))->where('user_id',\Auth::user()->user_id)->sum('price')??'0.00'])</p>
                <p class="col-sm-6 col-md-3">@lang('log2.in_total.act_user_point2',['value'=>App\Models\LogPoint2::where('type',trans('log2.type.act_user_point2'))->where('user_id',\Auth::user()->user_id)->sum('price')??'0.00'])</p>
                <p class="col-sm-6 col-md-3">@lang('log2.in_total.rem_return',['value'=>App\Models\LogPoint2::where('type',trans('log2.type.rem_return'))->where('user_id',\Auth::user()->user_id)->sum('price')??'0.00'])</p>
            </div>
            <table class="table table-striped table-hover">
                <tr>
                    <td>@lang('log2.label.id')</td>
                    <td>@lang('log2.label.type')</td>
                    <td>@lang('log2.label.price')</td>
                    <td>@lang('log2.label.about')</td>
                    <td class="hidden-xs">@lang('log2.label.add_time')</td>
                </tr>
                @forelse($log as $item)
                    <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$item->type}}</td>
                        <td>{{$item->price}}</td>
                        <td>{{$item->about}}</td>
                        <td class="hidden-xs">{{$item->add_time}}</td>
                    </tr>
                @empty
                    <tr><td colspan="5" class="text-center">@lang('web.no_data')</td></tr>
                @endforelse
                    <tr>
                        <td colspan="5" class="text-center custom-pagination">
                        @if($log->count()>0)
                            {{$log->render()}}
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
        mgo('31');
    </script>
@endsection