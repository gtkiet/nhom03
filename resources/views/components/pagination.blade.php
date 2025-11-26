@props(['paginator'])

@if ($paginator->hasPages())
    @php
        $currentPage = $paginator->currentPage();
        $lastPage = $paginator->lastPage();
        $start = max($currentPage - 2, 1);
        $end = min($currentPage + 2, $lastPage);
    @endphp

    <nav>
        <ul class="pagination justify-content-center">

            {{-- Previous --}}
            @if ($paginator->onFirstPage())
                <li class="page-item disabled"><span class="page-link">«</span></li>
            @else
                <li class="page-item">
                    <a class="page-link" href="{{ $paginator->previousPageUrl() }}">«</a>
                </li>
            @endif

            {{-- First Page --}}
            @if($start > 1)
                <li class="page-item"><a class="page-link" href="{{ $paginator->url(1) }}">1</a></li>
                @if($start > 2)
                    <li class="page-item disabled"><span class="page-link">...</span></li>
                @endif
            @endif

            {{-- Page numbers --}}
            @for($i = $start; $i <= $end; $i++)
                <li class="page-item {{ $i == $currentPage ? 'active' : '' }}">
                    <a class="page-link" href="{{ $paginator->url($i) }}">{{ $i }}</a>
                </li>
            @endfor

            {{-- Last Page --}}
            @if($end < $lastPage)
                @if($end < $lastPage - 1)
                    <li class="page-item disabled"><span class="page-link">...</span></li>
                @endif
                <li class="page-item"><a class="page-link" href="{{ $paginator->url($lastPage) }}">{{ $lastPage }}</a></li>
            @endif

            {{-- Next --}}
            @if ($paginator->hasMorePages())
                <li class="page-item">
                    <a class="page-link" href="{{ $paginator->nextPageUrl() }}">»</a>
                </li>
            @else
                <li class="page-item disabled"><span class="page-link">»</span></li>
            @endif

            {{-- Jump to page --}}
<li class="page-item mx-2">
    <select class="form-select"
            style="width: 80px;"
            onchange="window.location.href='{{ $paginator->url(1) }}'.replace(/page=1/, 'page=' + this.value)">
        @for($i = 1; $i <= $lastPage; $i++)
            <option value="{{ $i }}" {{ $i == $currentPage ? 'selected' : '' }}>
                {{ $i }}
            </option>
        @endfor
    </select>
</li>


        </ul>
    </nav>
@endif
