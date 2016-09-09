<section class="content-header">
    <h1>
        {{$page_title}}
        <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{URL::route('admin.index')}}">@lang('sys.home')</a></li>
        @foreach($breadcrumb as $item)
            <li><a href="{{$item['url']}}">{{$item['title']}}</a></li>
        @endforeach
    </ol>
</section>