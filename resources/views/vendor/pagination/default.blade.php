@if ($paginator->hasPages())
    <ul class="pagination" style="margin:0px;">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="disabled"><span style="background-color:#f8f8f8;border:0px;">&laquo;</span></li>
        @else
            <li><a href="{{ $paginator->previousPageUrl() }}" rel="prev" 
                style="background-color:#f8f8f8;border:0px;">&laquo;</a></li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li class="disabled"><span style="border:0px;background-color:#f8f8f8;">{{ $element }}</span></li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li ><span style="padding:0px 12px;border:0px;background-color:#f8f8f8;font-size:1.5em;"
                        >{{ $page }}</span></li>
                    @else
                        <li><a href="{{ $url }}"
                        style="border:0px;background-color:#f8f8f8;">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li><a href="{{ $paginator->nextPageUrl() }}" rel="next"
            style="background-color:#f8f8f8;border:0px;">&raquo;</a></li>
        @else
            <li class="disabled"><span style="background-color:#f8f8f8;border:0px;">&raquo;</span></li>
        @endif
    </ul>
@endif
