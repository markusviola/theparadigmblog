@if ($paginator->hasPages())
    <ul class="pagination">
        {{-- Previous Page Link --}}
        <strong>
            @if ($paginator->onFirstPage())
                <li class="page-item disabled mr-2" aria-disabled="true" aria-label="@lang('pagination.previous')">
                    <span class="rounded-pill alt-neutral page-link" aria-hidden="true">&lsaquo;</span>
                </li>
            @else
                <li class="page-item mr-2">
                    <a class="rounded-pill neutral page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">&lsaquo;</a>
                </li>
            @endif
        </strong>

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li class="page-item disabled" aria-disabled="true">
                    <strong>
                        <span class="rounded-lg mx-2 neutral page-link">{{ $element }}</span>
                    </strong>
                </li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="page-item active" aria-current="page">
                            <strong>
                                <span class="text-center rounded-lg mx-2 rev-neutral page-link">{{ $page }}</span>
                            </strong>
                        </li>
                    @else
                        <li class="page-item text-center">
                            <strong>
                                <a class="text-center rounded-lg mx-2 neutral page-link" href="{{ $url }}">{{ $page }}</a>
                            </strong>
                        </li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        <strong>
            @if ($paginator->hasMorePages())
                <li class="page-item ml-2">
                    <a class="rounded-pill neutral page-link" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">&rsaquo;</a>
                </li>
            @else
                <li class="page-item disabled ml-2" aria-disabled="true" aria-label="@lang('pagination.next')">
                    <span class="rounded-pill alt-neutral page-link" aria-hidden="true">&rsaquo;</span>
                </li>
            @endif
        </strong>
    </ul>
@endif
