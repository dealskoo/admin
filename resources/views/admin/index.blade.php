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
                        <div class="col-sm-5">
                            <a href="javascript:void(0);" class="btn btn-danger mb-2"><i
                                    class="mdi mdi-plus-circle me-2"></i> Add Products</a>
                        </div>
                        <div class="col-sm-7">
                            <div class="text-sm-end">
                                <button type="button" class="btn btn-success mb-2 me-1"><i
                                        class="mdi mdi-cog-outline"></i></button>
                                <button type="button" class="btn btn-light mb-2 me-1">Import</button>
                                <button type="button" class="btn btn-light mb-2">Export</button>
                            </div>
                        </div><!-- end col-->
                    </div>
                    <div class="table-responsive">
                        <div id="products-datatable_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="dataTables_length" id="products-datatable_length"><label
                                            class="form-label">Display <select
                                                class="form-select form-select-sm ms-1 me-1">
                                                <option value="5">5</option>
                                                <option value="10">10</option>
                                                <option value="20">20</option>
                                                <option value="-1">All</option>
                                            </select> products</label></div>
                                </div>
                                <div class="col-sm-6">
                                    <div id="products-datatable_filter" class="dataTables_filter"><label>Search:<input
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
                                            <th class="all sorting_disabled dt-checkboxes-cell dt-checkboxes-select-all"
                                                style="width: 27.6px;" rowspan="1" colspan="1" data-col="0" aria-label="


                                                                &amp;nbsp;

                                                        ">
                                                <div class="form-check"><input type="checkbox"
                                                                               class="form-check-input dt-checkboxes"><label
                                                        class="form-check-label">&nbsp;</label></div>
                                            </th>
                                            <th class="all sorting sorting_asc" tabindex="0"
                                                aria-controls="products-datatable" rowspan="1" colspan="1"
                                                style="width: 244.8px;" aria-sort="ascending"
                                                aria-label="Product: activate to sort column descending">Product
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="products-datatable"
                                                rowspan="1" colspan="1" style="width: 92.8px;"
                                                aria-label="Category: activate to sort column ascending">Category
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="products-datatable"
                                                rowspan="1" colspan="1" style="width: 82.8px;"
                                                aria-label="Added Date: activate to sort column ascending">Added Date
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="products-datatable"
                                                rowspan="1" colspan="1" style="width: 41.8px;"
                                                aria-label="Price: activate to sort column ascending">Price
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="products-datatable"
                                                rowspan="1" colspan="1" style="width: 60.8px;"
                                                aria-label="Quantity: activate to sort column ascending">Quantity
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="products-datatable"
                                                rowspan="1" colspan="1" style="width: 44.8px;"
                                                aria-label="Status: activate to sort column ascending">Status
                                            </th>
                                            <th style="width: 85.6px;" class="sorting_disabled" rowspan="1" colspan="1"
                                                aria-label="Action">Action
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>


                                        <tr class="odd">
                                            <td class="dt-checkboxes-cell dtr-control">
                                                <div class="form-check"><input type="checkbox"
                                                                               class="form-check-input dt-checkboxes"><label
                                                        class="form-check-label">&nbsp;</label></div>
                                            </td>
                                            <td class="sorting_1">
                                                <img src="assets/images/products/product-6.jpg" alt="contact-img"
                                                     title="contact-img" class="rounded me-3" height="48">
                                                <p class="m-0 d-inline-block align-middle font-16">
                                                    <a href="apps-ecommerce-products-details.html" class="text-body">Adirondack
                                                        Chair</a>
                                                    <br>
                                                    <span class="text-warning mdi mdi-star"></span>
                                                    <span class="text-warning mdi mdi-star"></span>
                                                    <span class="text-warning mdi mdi-star"></span>
                                                    <span class="text-warning mdi mdi-star"></span>
                                                    <span class="text-warning mdi mdi-star"></span>
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
                                                <a href="javascript:void(0);" class="action-icon"> <i
                                                        class="mdi mdi-eye"></i></a>
                                                <a href="javascript:void(0);" class="action-icon"> <i
                                                        class="mdi mdi-square-edit-outline"></i></a>
                                                <a href="javascript:void(0);" class="action-icon"> <i
                                                        class="mdi mdi-delete"></i></a>
                                            </td>
                                        </tr>
                                        <tr class="even">
                                            <td class="dtr-control dt-checkboxes-cell" tabindex="0">
                                                <div class="form-check"><input type="checkbox"
                                                                               class="form-check-input dt-checkboxes"><label
                                                        class="form-check-label">&nbsp;</label></div>
                                            </td>
                                            <td class="sorting_1">
                                                <img src="assets/images/products/product-1.jpg" alt="contact-img"
                                                     title="contact-img" class="rounded me-3" height="48">
                                                <p class="m-0 d-inline-block align-middle font-16">
                                                    <a href="apps-ecommerce-products-details.html" class="text-body">Amazing
                                                        Modern Chair</a>
                                                    <br>
                                                    <span class="text-warning mdi mdi-star"></span>
                                                    <span class="text-warning mdi mdi-star"></span>
                                                    <span class="text-warning mdi mdi-star"></span>
                                                    <span class="text-warning mdi mdi-star"></span>
                                                    <span class="text-warning mdi mdi-star"></span>
                                                </p>
                                            </td>
                                            <td>
                                                Aeron Chairs
                                            </td>
                                            <td>
                                                09/12/2018
                                            </td>
                                            <td>
                                                $148.66
                                            </td>

                                            <td>
                                                254
                                            </td>
                                            <td>
                                                <span class="badge bg-success">Active</span>
                                            </td>

                                            <td class="table-action">
                                                <a href="javascript:void(0);" class="action-icon"> <i
                                                        class="mdi mdi-eye"></i></a>
                                                <a href="javascript:void(0);" class="action-icon"> <i
                                                        class="mdi mdi-square-edit-outline"></i></a>
                                                <a href="javascript:void(0);" class="action-icon"> <i
                                                        class="mdi mdi-delete"></i></a>
                                            </td>
                                        </tr>
                                        <tr class="odd">
                                            <td class="dt-checkboxes-cell dtr-control">
                                                <div class="form-check"><input type="checkbox"
                                                                               class="form-check-input dt-checkboxes"><label
                                                        class="form-check-label">&nbsp;</label></div>
                                            </td>
                                            <td class="sorting_1">
                                                <img src="assets/images/products/product-2.jpg" alt="contact-img"
                                                     title="contact-img" class="rounded me-3" height="48">
                                                <p class="m-0 d-inline-block align-middle font-16">
                                                    <a href="apps-ecommerce-products-details.html" class="text-body">Bean
                                                        Bag Chair</a>
                                                    <br>
                                                    <span class="text-warning mdi mdi-star"></span>
                                                    <span class="text-warning mdi mdi-star"></span>
                                                    <span class="text-warning mdi mdi-star"></span>
                                                    <span class="text-warning mdi mdi-star"></span>
                                                    <span class="text-warning mdi mdi-star"></span>
                                                </p>
                                            </td>
                                            <td>
                                                Wooden Chairs
                                            </td>
                                            <td>
                                                06/30/2018
                                            </td>
                                            <td>
                                                $99
                                            </td>

                                            <td>
                                                1,021
                                            </td>
                                            <td>
                                                <span class="badge bg-danger">Deactive</span>
                                            </td>
                                            <td class="table-action">
                                                <a href="javascript:void(0);" class="action-icon"> <i
                                                        class="mdi mdi-eye"></i></a>
                                                <a href="javascript:void(0);" class="action-icon"> <i
                                                        class="mdi mdi-square-edit-outline"></i></a>
                                                <a href="javascript:void(0);" class="action-icon"> <i
                                                        class="mdi mdi-delete"></i></a>
                                            </td>
                                        </tr>
                                        <tr class="even">
                                            <td class="dtr-control dt-checkboxes-cell" tabindex="0">
                                                <div class="form-check"><input type="checkbox"
                                                                               class="form-check-input dt-checkboxes"><label
                                                        class="form-check-label">&nbsp;</label></div>
                                            </td>
                                            <td class="sorting_1">
                                                <img src="assets/images/products/product-4.jpg" alt="contact-img"
                                                     title="contact-img" class="rounded me-3" height="48">
                                                <p class="m-0 d-inline-block align-middle font-16">
                                                    <a href="apps-ecommerce-products-details.html" class="text-body">Biblio
                                                        Plastic Armchair</a>
                                                    <br>
                                                    <span class="text-warning mdi mdi-star"></span>
                                                    <span class="text-warning mdi mdi-star"></span>
                                                    <span class="text-warning mdi mdi-star"></span>
                                                    <span class="text-warning mdi mdi-star"></span>
                                                    <span class="text-warning mdi mdi-star-half"></span>
                                                </p>
                                            </td>
                                            <td>
                                                Wooden Chairs
                                            </td>
                                            <td>
                                                09/08/2018
                                            </td>
                                            <td>
                                                $8.99
                                            </td>

                                            <td>
                                                1,874
                                            </td>
                                            <td>
                                                <span class="badge bg-success">Active</span>
                                            </td>
                                            <td class="table-action">
                                                <a href="javascript:void(0);" class="action-icon"> <i
                                                        class="mdi mdi-eye"></i></a>
                                                <a href="javascript:void(0);" class="action-icon"> <i
                                                        class="mdi mdi-square-edit-outline"></i></a>
                                                <a href="javascript:void(0);" class="action-icon"> <i
                                                        class="mdi mdi-delete"></i></a>
                                            </td>
                                        </tr>
                                        <tr class="odd">
                                            <td class="dt-checkboxes-cell dtr-control">
                                                <div class="form-check"><input type="checkbox"
                                                                               class="form-check-input dt-checkboxes"><label
                                                        class="form-check-label">&nbsp;</label></div>
                                            </td>
                                            <td class="sorting_1">
                                                <img src="assets/images/products/product-3.jpg" alt="contact-img"
                                                     title="contact-img" class="rounded me-3" height="48">
                                                <p class="m-0 d-inline-block align-middle font-16">
                                                    <a href="apps-ecommerce-products-details.html" class="text-body">Bootecos
                                                        Plastic Armchair</a>
                                                    <br>
                                                    <span class="text-warning mdi mdi-star"></span>
                                                    <span class="text-warning mdi mdi-star"></span>
                                                    <span class="text-warning mdi mdi-star"></span>
                                                    <span class="text-warning mdi mdi-star"></span>
                                                    <span class="text-warning mdi mdi-star-half"></span>
                                                </p>
                                            </td>
                                            <td>
                                                Wing Chairs
                                            </td>
                                            <td>
                                                07/15/2018
                                            </td>
                                            <td>
                                                $148.66
                                            </td>

                                            <td>
                                                485
                                            </td>
                                            <td>
                                                <span class="badge bg-danger">Deactive</span>
                                            </td>

                                            <td class="table-action">
                                                <a href="javascript:void(0);" class="action-icon"> <i
                                                        class="mdi mdi-eye"></i></a>
                                                <a href="javascript:void(0);" class="action-icon"> <i
                                                        class="mdi mdi-square-edit-outline"></i></a>
                                                <a href="javascript:void(0);" class="action-icon"> <i
                                                        class="mdi mdi-delete"></i></a>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-5">
                                    <div class="dataTables_info" id="products-datatable_info" role="status"
                                         aria-live="polite">Showing products 1 to 5 of 12
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-7">
                                    <div class="dataTables_paginate paging_simple_numbers"
                                         id="products-datatable_paginate">
                                        <ul class="pagination pagination-rounded">
                                            <li class="paginate_button page-item previous disabled"
                                                id="products-datatable_previous"><a href="#"
                                                                                    aria-controls="products-datatable"
                                                                                    data-dt-idx="0" tabindex="0"
                                                                                    class="page-link"><i
                                                        class="mdi mdi-chevron-left"></i></a></li>
                                            <li class="paginate_button page-item active"><a href="#"
                                                                                            aria-controls="products-datatable"
                                                                                            data-dt-idx="1" tabindex="0"
                                                                                            class="page-link">1</a></li>
                                            <li class="paginate_button page-item "><a href="#"
                                                                                      aria-controls="products-datatable"
                                                                                      data-dt-idx="2" tabindex="0"
                                                                                      class="page-link">2</a></li>
                                            <li class="paginate_button page-item "><a href="#"
                                                                                      aria-controls="products-datatable"
                                                                                      data-dt-idx="3" tabindex="0"
                                                                                      class="page-link">3</a></li>
                                            <li class="paginate_button page-item next" id="products-datatable_next"><a
                                                    href="#" aria-controls="products-datatable" data-dt-idx="4"
                                                    tabindex="0" class="page-link"><i class="mdi mdi-chevron-right"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
