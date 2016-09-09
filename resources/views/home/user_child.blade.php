@extends('home.content')

@section('right')
<div class="row">
    <div class="col-md-12">
        <h3>@lang('menu.farm_manager') <small>@lang('menu.user_child')</small></h3>
        <ol class="breadcrumb">
            <li><span class="glyphicon glyphicon-home" aria-hidden="true"></span> <a href="{{URL::route('index')}}">@lang('menu.index')</a></li>
            <li>@lang('menu.user_manager')</li>
            <li class="active">@lang('menu.user_child')</li>
        </ol>
    </div>
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                @lang('menu.user_child')
            </div>
            <div class="panel-body">
                <div id="tree"></div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('footer')
    <script>
        mgo('21');
        function getTree() {
            var data=null;
            $.ajax({
                type:'POST',
                url: '{{URL::route('user_child')}}',
                data: {_token:'{{csrf_token()}}'},
                success:function(result){
                    $('#tree').treeview({
                        levels: 2,
                        highlightSelected:false,
                        showTags:true,
                        data: result
                    });
                },
                dataType: 'json'
            });
        }

        $(function(){
            getTree();
        });
    </script>
@endsection