@extends('admin.layout')

@section('content')
    @include('admin.header')
<div class="content">
    <form class="form-horizontal" role="form" method="POST" action="{{ URL::route('admin.config.save') }}" enctype="multipart/form-data">
        <div class="nav-tabs-custom">
                {!! csrf_field() !!}
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
                @foreach($config as $item)
                <li role="presentation" @if($loop->first) class="active" @endif><a href="#{{$item->code}}" aria-controls="{{$item->code}}" role="tab" data-toggle="tab">@lang('config.'.$item->code)</a></li>
                @endforeach
            </ul>

            <!-- Tab panes -->
            <div class="tab-content" style="margin-top: 8px;">
                @foreach($config as $item)
                <div role="tabpanel" class="tab-pane @if($loop->first) active @endif" id="{{$item->code}}">
                    @foreach($item ->children as $v)
                        <div class="form-group">
                        <label class="col-sm-2 control-label" for="{{$v->id}}">@lang('config.'.$v->code)</label>
                        <div class="col-sm-4">
                        @if($v->type=='select')
                            @foreach($v->store_options as $o)
                            <label class="radio-inline">
                                <input type="radio" name="config[{{$v->id}}]" value="{{$o}}" @if($v->value==$o) checked @endif>@lang('config.range.'.$v->code.'.'.$o)
                            </label>
                            @endforeach
                        @elseif($v->type=='options')
                            <select class="form-control input-sm" name="config[{{$v->id}}]" class="select2">
                            <option value="0">@lang('config.pls')</option>
                            @foreach($v->store_options as $o)
                                <option value="{{$o}}" @if($v->value==$o) selected @endif>@lang('config.range.'.$v->code.'.'.$o)</option>
                            @endforeach
                            </select>
                        @elseif($v->type=='textarea')
                            <textarea rows="3" class="form-control" name="config[{{$v->id}}]">{{$v->value}}</textarea>
                        @elseif($v->type=='file')
                            <input type="file" name="config[{{$v->id}}]" />
                        @else
                            <input type="text" class="form-control input-sm" name="config[{{$v->id}}]" value="{{$v->value}}">
                        @endif
                        </div>
                        @if(trans('config.desc.'.$v->code)!=='config.desc.'.$v->code)<p class="col-sm-6 help-block">@lang('config.desc.'.$v->code)</p>@endif
                        </div>
                    @endforeach
                </div>
                @endforeach
            </div>
            <div class="text-center" style="padding: 10px 0; border-top: 1px solid #f4f4f4;">
                <input type="submit" class="btn btn-primary" value="@lang('sys.submit')">
                <input type="reset" class="btn btn-default" value="@lang('sys.reset')">
            </div>
        </div>
    </form>
</div>
    @include('admin.footer')
@endsection