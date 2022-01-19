@extends('admin::layouts.panel')

@section('title',__('admin::admin.admins_list'))
@section('body')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a
                                href="{{ route('admin.dashboard') }}">{{ __('admin::admin.dashboard') }}</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">{{ __('admin::admin.settings') }}</a>
                        </li>
                        <li class="breadcrumb-item active">{{ __('admin::admin.admins_list') }}</li>
                    </ol>
                </div>
                <h4 class="page-title">{{ __('admin::admin.admins_list') }}</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    @if(Auth::user()->canDo('admins.create'))
                        <div class="row mb-2">
                            <div class="col-12">
                                <a href="{{ route('admin.admins.create') }}" class="btn btn-danger mb-2"><i
                                        class="mdi mdi-plus-circle me-2"></i> {{ __('admin::admin.add_admin') }}</a>
                            </div>
                        </div>
                    @endif
                    <div class="table-responsive">
                        <table id="admins_table" class="table table-centered w-100 dt-responsive nowrap">
                            <thead class="table-light">
                            <tr>
                                <th>{{ __('admin::admin.id') }}</th>
                                <th>{{ __('admin::admin.name') }}</th>
                                <th>{{ __('admin::admin.email') }}</th>
                                <th>{{ __('admin::admin.created_at') }}</th>
                                <th>{{ __('admin::admin.updated_at') }}</th>
                                <th>{{ __('admin::admin.status') }}</th>
                                <th>{{ __('admin::admin.action') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script type="text/javascript">
        $(function () {
            $('#admins_table').dataTable({
                "processing": true,
                "serverSide": true,
                "ajax": "{{ route('admin.admins.index') }}",
                "language": language,
                "pageLength": pageLength,
                "columns": [
                    {'orderable': true},
                    {'orderable': true},
                    {'orderable': true},
                    {'orderable': true},
                    {'orderable': true},
                    {'orderable': true},
                    {'orderable': false},
                ],
                "order": [[0, "desc"]],
                "drawCallback": function () {
                    $('.dataTables_paginate > .pagination').addClass('pagination-rounded');
                    $('#admins_table tr td:nth-child(2)').addClass('table-user');
                    $('#admins_table tr td:nth-child(8)').addClass('table-action');
                    $('.delete-btn').on('click', function (e) {
                        let table = $('#' + $(this).data('table'));
                        let url = $(this).data('url');
                        $.ajax({
                            url: url,
                            type: 'DELETE',
                            processData: false,
                            contentType: false,
                            success: function (data) {
                                table.DataTable().ajax.reload();
                            }
                        });
                    });
                }
            })
        });
    </script>
@endsection
