@if ($paginator->hasPages())
    <div class="row">
        <div class="col-7 mt-1">
            {!! __('Showing') !!}
            @if ($paginator->firstItem())
                {{ $paginator->firstItem() }}
                {!! __('to') !!}
                {{ $paginator->lastItem() }}
            @else
                {{ $paginator->count() }}
            @endif
            {!! __('of') !!}
            {{ $paginator->total() }}
        </div> <!-- end col-->
        <div class="col-5">
            <div class="btn-group float-end">
                <a href="{{ $paginator->previousPageUrl() }}" class="btn btn-light btn-sm"><i
                        class="mdi mdi-chevron-left"></i></a>
                <a href="{{ $paginator->nextPageUrl() }}" class="btn btn-info btn-sm"><i
                        class="mdi mdi-chevron-right"></i></a>
            </div>
        </div> <!-- end col-->
    </div>
@endif
