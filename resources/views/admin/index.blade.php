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
                        <div id="products-datatable_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="dataTables_length" id="products-datatable_length"><label
                                            class="form-label">{{ __('admin::admin.display') }} <select
                                                class="form-select form-select-sm ms-1 me-1">
                                                <option value="10">10</option>
                                                <option value="20">20</option>
                                                <option value="-1">All</option>
                                            </select> {{ __('admin::admin.admins') }}</label></div>
                                </div>
                                <div class="col-sm-6">
                                    <div id="products-datatable_filter" class="dataTables_filter">
                                        <label>{{ __('admin::admin.search') }}:<input
                                                type="search" class="form-control form-control-sm" placeholder=""
                                                aria-controls="products-datatable"></label></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <table
                                        class="table table-centered w-100 dt-responsive nowrap dataTable no-footer dtr-inline"
                                        id="products-datatable" aria-describedby="products-datatable_info"
                                        style="width: 1015px;">
                                        <thead class="table-light">
                                        <tr>
                                            <th class="all sorting sorting_asc" tabindex="0"
                                                aria-controls="products-datatable" rowspan="1" colspan="1"
                                                style="width: 244.8px;" aria-sort="ascending"
                                                aria-label="Product: activate to sort column descending">{{ __('admin::admin.name') }}
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="products-datatable"
                                                rowspan="1" colspan="1" style="width: 92.8px;"
                                                aria-label="Category: activate to sort column ascending">{{ __('admin::admin.email') }}
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="products-datatable"
                                                rowspan="1" colspan="1" style="width: 82.8px;"
                                                aria-label="Added Date: activate to sort column ascending">{{ __('admin::admin.role') }}
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="products-datatable"
                                                rowspan="1" colspan="1" style="width: 41.8px;"
                                                aria-label="Price: activate to sort column ascending">{{ __('admin::admin.created_at') }}
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="products-datatable"
                                                rowspan="1" colspan="1" style="width: 60.8px;"
                                                aria-label="Quantity: activate to sort column ascending">{{ __('admin::admin.updated_at') }}
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="products-datatable"
                                                rowspan="1" colspan="1" style="width: 44.8px;"
                                                aria-label="Status: activate to sort column ascending">{{ __('admin::admin.status') }}
                                            </th>
                                            <th style="width: 85.6px;" class="sorting_disabled" rowspan="1" colspan="1"
                                                aria-label="Action">{{ __('admin::admin.action') }}
                                            </th>
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
                                                    Aeron Chairs
                                                </td>
                                                <td>
                                                    07/07/2018
                                                </td>
                                                <td>
                                                    $65.94
                                                </td>

                                                <td>
                                                    652
                                                </td>
                                                <td>
                                                    <span class="badge bg-success">Active</span>
                                                </td>

                                                <td class="table-action">
                                                    <a href="{{ route('admin.admins.show',$admin) }}" class="action-icon"> <i
                                                            class="mdi mdi-eye"></i></a>
                                                    <a href="{{ route('admin.admins.edit',$admin) }}" class="action-icon"> <i
                                                            class="mdi mdi-square-edit-outline"></i></a>
                                                    <a href="{{ route('admin.admins.destroy',$admin) }}" class="action-icon"> <i
                                                            class="mdi mdi-delete"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            {{ $admins->withQueryString()->links('admin::pagination.simple') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
