@extends('admin.layout')

@section('content')
    @include('admin.header')
<div class="content">
    <form class="form-horizontal" role="form" method="POST" action="{{ URL::route('admin.farm.save') }}" enctype="multipart/form-data">
        <div class="nav-tabs-custom">
                {!! csrf_field() !!}
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">@lang('farm.tab_basic')</a></li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content" style="margin-top: 8px;">
                <div role="tabpanel" class="tab-pane active" id="home">
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="display_name">@lang('farm.title')</label>
                        <div class="col-md-4"><input type="text" class="form-control input-sm" name="title"  value="{{$farm->title}}"></div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="name">@lang('farm.point2_day')</label>
                        <div class="col-md-4"><input type="number" class="form-control input-sm" name="name"  value="{{$farm->point2_day}}"></div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="description">@lang('farm.life')</label>
                        <div class="col-md-4"><input type="number" class="form-control input-sm" name="description" value="{{$farm->life}}"></div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="description">@lang('farm.money')</label>
                        <div class="col-md-4"><input type="number" class="form-control input-sm" name="description" value="{{$farm->money}}"></div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="description">@lang('farm.min_level')</label>
                        <div class="col-md-4">
                            <select class="form-control" name="min_level">
                                <option value="0" @if($farm->min_level==0) selected @endif>@lang('farm.pls')</option>
                                @foreach(trans('config.level') as $k => $v)
                                <option value="{{$k}}" @if($farm->min_level==$k) selected @endif>{{$v}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="description">@lang('farm.buy_limit')</label>
                        <div class="col-md-4"><input type="number" class="form-control input-sm" name="description" value="{{$farm->buy_limit}}"></div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="description">@lang('farm.max_limit')</label>
                        <div class="col-md-4"><input type="number" class="form-control input-sm" name="description" value="{{$farm->max_limit}}"></div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="description">@lang('farm.sort_order')</label>
                        <div class="col-md-4"><input type="number" class="form-control input-sm" name="description" value="{{$farm->sort_order}}"></div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="description">@lang('farm.image')</label>
                        <div class="col-md-4"><input type="file" name="image_url" ></div>
                    </div>
                    @if($farm->image)
                    <div class="form-group">
                        <div class="col-md-offset-2"><img src="{{$farm->image}}" height="150" alt="{{$farm->title}}"></div>
                    </div>
                    @endif
                </div>
            </div>
            <div class="text-center" style="padding: 10px 0; border-top: 1px solid #f4f4f4;">
                <input type="hidden" name="id" value="{{$farm->id}}">
                <input type="submit" class="btn btn-primary" value="@lang('sys.submit')">
                <input type="reset" class="btn btn-default" value="@lang('sys.reset')">
            </div>
        </div>
    </form>
</div>
    @include('admin.footer')
@endsection