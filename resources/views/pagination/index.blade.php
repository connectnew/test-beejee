@php

$last = $paginator->lastPage();
$first = $page > 3 ? ($page - 3) : 1;
$last = ($last - $page) > 3 ? ($page + 3) : $last;

@endphp

@if ($paginator->hasPages())
    <nav>
        <ul class="pagination">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="page-item disabled" aria-disabled="true">
                    <span class="page-link" aria-hidden="true">&lsaquo;</span>
                </li>
            @else
                <li class="page-item">
                    <a class="page-link" href="{{ $paginator->previousPageUrl() . $append }}" rel="prev">&lsaquo;</a>
                </li>
            @endif

            @for ($first; $first <= $last; $first++)
                @if ($first == $page)
                    <li class="page-item disabled" aria-disabled="true"><span class="page-link">{{ $first }}</span></li>
                @else
                    <li class="page-item"><a class="page-link" href="{{ $paginator->url($first) . $append }}">{{ $first }}</a></li>
                @endif
            @endfor

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="page-item">
                    <a class="page-link" href="{{ $paginator->nextPageUrl() . $append }}" rel="next">&rsaquo;</a>
                </li>
            @else
                <li class="page-item disabled" aria-disabled="true">
                    <span class="page-link" aria-hidden="true">&rsaquo;</span>
                </li>
            @endif
        </ul>
    </nav>
@endif
