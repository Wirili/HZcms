@extends('admin.layout')

@section('content')
    @include('admin.header')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <div class="box-body">
                        <table id="dt" class="table table-bordered table-striped table-hover">
                            <thead>
                            <tr align="center">
                                <th class="text-center" width="40">@lang('sys.id')</th>
                                <th class="text-center" width="80">@lang('user.name')</th>
                                <th class="text-center">@lang('user.fullname')</th>
                                <th class="text-center" width="80">@lang('user.parent_name')</th>
                                <th class="text-center" width="80">@lang('user.child_count')</th>
                                <th class="text-center" width="80">@lang('user.reg_time')</th>
                                <th class="text-center" width="80">@lang('user.is_pass')</th>
                                <th class="text-center" width="80">@lang('user.pass_time')</th>
                                <th class="text-center" width="80">@lang('user.last_time')</th>
                                <th class="text-center" width="100">@lang('sys.handle')</th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(function () {
            var table = $('#dt').on('draw.dt',function(e, settings){
                $('[data-toggle="tooltip"]').tooltip();
            })
            .DataTable({
                dom:"<'row'<'col-sm-12'l>><'row'<'col-sm-12'tr>><'row'<'col-sm-5'i><'col-sm-7'p>>",
                pagingType: "full_numbers",
                pageLength: 10,
                autoWidth: false,
                processing: true,
                serverSide: true,
                lengthChange: true,
                searching: false,
                stateSave: true,
                ajax: {
                    type:'POST',
                    url: "{{URL::route('admin.user.ajax',['_token'=>csrf_token()])}}"
                },
                columns: [
                    {data: 'user_id',className:'text-center'},
                    {data: 'name'},
                    {data: 'fullname'},
                    {data: 'parent_id',
                    render:function(data,type,row){
                        if(row.parent)
                            return row.parent.name;
                        return '';
                    }
                    },
                    {
                        data: 'child_count',
                        className: 'text-center',
                    },
                    {data: 'reg_time'},
                    {
                        data: 'is_pass',
                        className: 'text-center',
                        render:function(data,type,row){
                            if(data==1){
                                data="<i class='fa fa-check text-success'></i>";
                            }else{
                                data="<i class='fa fa-remove text-danger'></i>"
                            }
                            return data;
                        }
                    },
                    {data: 'pass_time'},
                    {data: 'last_time'},
                    {
                        data: 'user_id',
                        className: 'text-center',
                        orderable: false,
                        render: function (data, type, row) {
                            data = "<a href='/admin/user/edit/" + data + "' data-toggle='tooltip' data-placement='bottom' title='@lang('sys.edit')' style='padding:0 5px;'><i class='fa fa-edit'></i></a>"
                                    + "<a href='/admin/user/del/" + data + "' class='text-danger' data-toggle='tooltip' data-placement='bottom' title='@lang('sys.del')' style='padding:0 5px;'><i class='fa fa-remove'></i></a>";
                            return data;
                        }
                    }
                ],
                order: [[0, "desc"]]
            });
            $('#dt_length').append("<a class='btn btn-primary pull-right' href='{{URL::route('admin.user.create')}}'>@lang('user.create')</a>");
        });
    </script>
@endsection