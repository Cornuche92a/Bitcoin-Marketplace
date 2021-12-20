@if ($paginator->hasPages())
    <nav role="navigatione" aria-label="{{ __('Pagination Navigation') }}">
        <ul class="pagination pagination-sm justify-content-end mb-0">


                @foreach ($elements as $element)
                    {{-- "Three Dots" Separator --}}
                    @if (is_string($element))
                        <span aria-disabled="true">
                                <span class="text-black">{{ $element }}</span>
                            </span>
                    @endif

                    {{-- Array Of Links --}}
                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <li class="page-item active">
                                        <a class="page-link">{{ $page }}</a>
                                    </li>
                            @else
                                <li class="page-item">
                                <a href="{{ $url }}" class="page-link" aria-label="{{ __('Go to page :page', ['page' => $page]) }}">
                                    {{ $page }}
                                </a>
                                </li>
                            @endif
                        @endforeach
                    @endif
                @endforeach

        </ul>
        <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
            <div>
                <br>
                <p class="text-sm text-gray-700 leading-5">
                    <span class="font-medium">{{ $paginator->lastItem() }}</span>
                    {!! __('résultats sur') !!}
                    <span class="font-medium">{{ $paginator->total() }}</span>
                    {!! __('au total') !!}
                </p>
            </div>


        </div>
    </nav>
@endif
