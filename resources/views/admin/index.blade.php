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
                    <div class="row mb-2">
                        <div class="col-12">
                            <a href="{{ route('admin.admins.create') }}" class="btn btn-danger mb-2"><i
                                    class="mdi mdi-plus-circle me-2"></i> {{ __('admin::admin.add_admin') }}</a>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table id="admins_table" class="table table-centered w-100 dt-responsive nowrap">
                            <thead class="table-light">
                            <tr>
                                <th class="all">{{ __('admin::admin.name') }}</th>
                                <th>{{ __('admin::admin.email') }}</th>
                                <th>{{ __('admin::admin.role') }}</th>
                                <th>{{ __('admin::admin.created_at') }}</th>
                                <th>{{ __('admin::admin.updated_at') }}</th>
                                <th>{{ __('admin::admin.status') }}</th>
                                <th>{{ __('admin::admin.action') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($admins as $admin)
                                <tr>

                                    <td class="table-user">
                                        <img src="{{ Auth::user()->avatar_url }}"
                                             alt="{{ Auth::user()->name }}"
                                             title="{{ Auth::user()->name }}" class="me-2 rounded-circle">
                                        <p class="m-0 d-inline-block align-middle font-16">
                                            <a href="{{ route('admin.admins.show',$admin) }}"
                                               class="text-body">{{ Auth::user()->name }}</a>
                                        </p>
                                    </td>
                                    <td>
                                        {{ $admin->email }}
                                    </td>
                                    <td>
                                        <span class="badge bg-success">Owner</span>
                                    </td>
                                    <td>
                                        {{ \Carbon\Carbon::parse($admin->created_at)->diffForHumans() }}
                                    </td>

                                    <td>
                                        {{ \Carbon\Carbon::parse($admin->updated_at)->diffForHumans() }}
                                    </td>
                                    <td>
                                        <span class="badge bg-success">Active</span>
                                    </td>

                                    <td class="table-action">
                                        <a href="{{ route('admin.admins.show',$admin) }}"
                                           class="action-icon"> <i
                                                class="mdi mdi-eye"></i></a>
                                        <a href="{{ route('admin.admins.edit',$admin) }}"
                                           class="action-icon"> <i
                                                class="mdi mdi-square-edit-outline"></i></a>
                                        <a href="{{ route('admin.admins.destroy',$admin) }}"
                                           class="action-icon"> <i
                                                class="mdi mdi-delete"></i></a>
                                    </td>
                                </tr>
                            @endforeach
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
                "ajax": "{{ route('admin.admins.table') }}",
                "language": language,
                "pageLength": pageLength,
                "columns": [
                    {'name': 'name', 'orderable': true},
                    {'orderable': true},
                    {'orderable': true},
                    {'orderable': true},
                    {'orderable': true},
                    {'orderable': true},
                    {'orderable': false},
                ],
                "order": [[0, "asc"]],
                "drawCallback": function () {
                    $('.dataTables_paginate > .pagination').addClass('pagination-rounded');
                }
            })
        });
    </script>
@endsection
