@if ($paginator->hasPages())
    <div class="pagination style-5 color-4 justify-content-center mt-60">
        
        {{-- Previous Page Link --}}
        @if (! $paginator->onFirstPage())
            <a href="{{ $paginator->previousPageUrl() }}" rel="prev">
                <span><i class="fas fa-chevron-left"></i></span>
            </a>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <a href="#"><span>{{ $element }}</span></a>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <a class="active"><span>{{ $page }}</span></a>
                    @else
                        <a href="{{ $url }}"><span>{{ $page }}</span></a>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" rel="next">
                <span class="text">next <i class="fas fa-chevron-right"></i></span>
            </a>
        @endif
    </div>
@endif
