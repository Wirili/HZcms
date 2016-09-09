@extends('admin.layout')

@section('content')
    @include('admin.header')
<div class="content">
    <form class="form-horizontal" role="form" method="POST" action="{{ URL::route('admin.article_cat.save') }}" enctype="multipart/form-data">
        <div class="nav-tabs-custom">
                {!! csrf_field() !!}
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">@lang('article_cat.tab_basic')</a></li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content" style="margin-top: 8px;">
                <div role="tabpanel" class="tab-pane active" id="home">
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="display_name">@lang('article_cat.title')</label>
                        <div class="col-md-4"><input type="text" class="form-control input-sm" name="title"  value="{{$article_cat->title}}"></div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="description">@lang('article_cat.sort_order')</label>
                        <div class="col-md-4"><input type="number" class="form-control input-sm" name="sort_order" value="{{$article_cat->sort_order}}"></div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="description">@lang('article_cat.add_time')</label>
                        <div class="col-md-4"><input type="text" class="form-control input-sm" name="add_time" disabled="disabled" value="{{$article_cat->add_time}}"></div>
                    </div>
                </div>
            </div>
            <div class="text-center" style="padding: 10px 0; border-top: 1px solid #f4f4f4;">
                <input type="hidden" name="id" value="{{$article_cat->cat_id}}">
                <input type="submit" class="btn btn-primary" value="@lang('sys.submit')">
                <input type="reset" class="btn btn-default" value="@lang('sys.reset')">
            </div>
        </div>
    </form>
</div>
    @include('admin.footer')
@endsection