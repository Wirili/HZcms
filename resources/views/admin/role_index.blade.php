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
                                <th class="text-center" width="60">@lang('sys.id')</th>
                                <th class="text-center">@lang('role.display_name')</th>
                                <th class="text-center">@lang('role.name')</th>
                                <th class="text-center">@lang('role.description')</th>
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
                    url: "{{URL::route('admin.role.ajax',['_token'=>csrf_token()])}}"
                },
                columns: [
                    {data: 'id',className:'text-center'},
                    {data: 'display_name'},
                    {data: 'name'},
                    {data: 'description'},
                    {
                        data: 'id',
                        className: 'text-center',
                        orderable: false,
                        render: function (data, type, row) {
                            data = "<a href='/admin/role/edit/" + data + "' data-toggle='tooltip' data-placement='bottom' title='@lang('sys.edit')' style='padding:0 5px;'><i class='fa fa-edit'></i></a>"
                                    + "<a href='/admin/role/del/" + data + "' class='text-danger' data-toggle='tooltip' data-placement='bottom' title='@lang('sys.del')' style='padding:0 5px;'><i class='fa fa-remove'></i></a>";
                            return data;
                        }
                    }
                ],
                order: [[0, "desc"]]
            });
            $('#dt_length').append("<a class='btn btn-primary pull-right' href='{{URL::route('admin.role.create')}}'>@lang('role.create')</a>");
        });
    </script>
@endsection