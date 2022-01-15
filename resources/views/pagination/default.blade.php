@if ($paginator->hasPages())
    <div class="row">
        <div class="col-sm-12 col-md-5">
            <div class="dataTables_info" id="products-datatable_info" role="status"
                 aria-live="polite"> {!! __('Showing') !!}
                @if ($paginator->firstItem())
                    {{ $paginator->firstItem() }}
                    {!! __('to') !!}
                    {{ $paginator->lastItem() }}
                @else
                    {{ $paginator->count() }}
                @endif
                {!! __('of') !!}
                {{ $paginator->total() }}
            </div>
        </div>
        <div class="col-sm-12 col-md-7">
            <div class="dataTables_paginate paging_simple_numbers" id="products-datatable_paginate">
                <ul class="pagination pagination-rounded">
                    <li class="paginate_button page-item previous disabled" id="products-datatable_previous">
                        <a href="{{ $paginator->previousPageUrl() }}" aria-controls="products-datatable" data-dt-idx="0"
                           tabindex="0" class="page-link">
                            <i class="mdi mdi-chevron-left"></i>
                        </a>
                    </li>

                    @foreach ($elements as $element)
                        @if (is_array($element))
                            @foreach ($element as $page => $url)
                                @if ($page == $paginator->currentPage())
                                    <li class="paginate_button page-item active">
                                        <a href="{{ $url }}" aria-controls="products-datatable" data-dt-idx="{{ $page }}" tabindex="0" class="page-link">{{ $page }}</a>
                                    </li>
                                @else
                                    <li class="paginate_button page-item">
                                        <a href="{{ $url }}" aria-controls="products-datatable" data-dt-idx="{{ $page }}" tabindex="0" class="page-link">{{ $page }}</a>
                                    </li>
                                @endif
                            @endforeach
                        @endif
                    @endforeach

                    <li class="paginate_button page-item next" id="products-datatable_next">
                        <a href="{{ $paginator->nextPageUrl() }}" aria-controls="products-datatable" data-dt-idx="4"
                           tabindex="0" class="page-link">
                            <i class="mdi mdi-chevron-right"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
@endif
