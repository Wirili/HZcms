@extends('admin.layout')

@section('content')
    @include('admin.header')
<div class="content">
    <form class="form-horizontal" role="form" method="POST" action="{{ URL::route('admin.article.save') }}" enctype="multipart/form-data">
        <div class="nav-tabs-custom">
                {!! csrf_field() !!}
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">@lang('article.tab_basic')</a></li>
                <li role="presentation"><a href="#tab_desc" aria-controls="tab_desc" role="tab" data-toggle="tab">@lang('article.tab_desc')</a></li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content" style="margin-top: 8px;">
                <div role="tabpanel" class="tab-pane active" id="home">
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="display_name">@lang('article.title')</label>
                        <div class="col-md-4"><input type="text" class="form-control input-sm" name="title"  value="{{$article->title}}"></div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="cat_id">@lang('article.cat_id')</label>
                        <div class="col-md-4">
                            <select id="cat_id" class="form-control input-sm" name="cat_id">
                                <option value="0">@lang('article.pls')</option>
                                @foreach($cat as $item)
                                    <option value="{{$item->cat_id}}" @if($item->cat_id==$article->cat_id) selected @endif>{{$item->title}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="name">@lang('article.description')</label>
                        <div class="col-md-4"><textarea class="form-control input-sm" name="description" rows="3">{{$article->description}}</textarea></div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="description">@lang('article.keywords')</label>
                        <div class="col-md-4"><input type="text" class="form-control input-sm" name="keywords" value="{{$article->keywords}}"></div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="description">@lang('article.add_time')</label>
                        <div class="col-md-4"><input type="text" class="form-control input-sm" name="add_time" disabled="disabled" value="{{$article->add_time}}"></div>
                    </div>
                </div>
                <div role="tabpanel" class="tab-pane" id="tab_desc">
                    <!-- 加载编辑器的容器 -->
                    <script id="container" name="contents" style="height: 400px;" type="text/plain">{!! $article->contents !!}</script>

                    <!-- 实例化编辑器 -->
                    <script type="text/javascript">
                        var ue = UE.getEditor('container');
                        ue.ready(function() {
                            ue.execCommand('serverparam', '_token', '{{ csrf_token() }}');//此处为支持laravel5 csrf ,根据实际情况修改,目的就是设置 _token 值.
                        });
                    </script>
                </div>
            </div>
            <div class="text-center" style="padding: 10px 0; border-top: 1px solid #f4f4f4;">
                <input type="hidden" name="id" value="{{$article->id}}">
                <input type="submit" class="btn btn-primary" value="@lang('sys.submit')">
                <input type="reset" class="btn btn-default" value="@lang('sys.reset')">
            </div>
        </div>
    </form>
</div>
    @include('admin.footer')
@endsection