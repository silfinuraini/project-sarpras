@if ($paginator->hasPages())
    <nav role="navigation" aria-label="{{ __('Pagination Navigation') }}" class="flex items-center justify-between">
        <div class="flex justify-between flex-1 sm:hidden">
            @if ($paginator->onFirstPage())
                <span class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default leading-5 rounded-box dark:text-gray-600 dark:bg-gray-800 dark:border-gray-600">
                    {!! __('pagination.previous') !!}
                </span>
            @else
                <a href="{{ $paginator->previousPageUrl() }}" class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 rounded-box hover:text-gray-500 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150 dark:bg-gray-800 dark:border-gray-600 dark:text-gray-300 dark:focus:border-blue-700 dark:active:bg-gray-700 dark:active:text-gray-300">
                    {!! __('pagination.previous') !!}
                </a>
            @endif

            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" class="relative inline-flex items-center px-4 py-2 ml-3 text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 rounded-box hover:text-gray-500 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150 dark:bg-gray-800 dark:border-gray-600 dark:text-gray-300 dark:focus:border-blue-700 dark:active:bg-gray-700 dark:active:text-gray-300">
                    {!! __('pagination.next') !!}
                </a>
            @else
                <span class="relative inline-flex items-center px-4 py-2 ml-3 text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default leading-5 rounded-box dark:text-gray-600 dark:bg-gray-800 dark:border-gray-600">
                    {!! __('pagination.next') !!}
                </span>
            @endif
        </div>

        <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
            <div>
                <p class="text-sm text-gray-700 leading-5 dark:text-gray-400">
                    {!! __('Memunculkan') !!}
                    @if ($paginator->firstItem())
                        <span class="font-medium">{{ $paginator->firstItem() }}</span>
                        {!! __('-') !!}
                        <span class="font-medium">{{ $paginator->lastItem() }}</span>
                    @else
                        {{ $paginator->count() }}
                    @endif
                    {!! __('dari') !!}
                    <span class="font-medium">{{ $paginator->total() }}</span>
                    {!! __('data') !!}
                </p>
            </div>

            <span class="flex col-span-4 mt-2 sm:mt-auto sm:justify-end">
                <nav aria-label="Table navigation">
                    <ul class="inline-flex items-center">
                        <!-- Previous Page Link -->
                        @if ($paginator->onFirstPage())
                            <li>
                                <span class="px-3 py-1 text-gray-400 rounded-md rounded-l-lg cursor-not-allowed">&laquo;</span>
                            </li>
                        @else
                            <li>
                                <a href="{{ $paginator->previousPageUrl() }}" class="px-3 py-1 rounded-md rounded-l-lg focus:outline-none focus:shadow-outline-purple" aria-label="Previous">&laquo;</a>
                            </li>
                        @endif
    
                        <!-- Pagination Elements -->
                        @foreach ($elements as $element)
                            @if (is_string($element))
                                <li><span class="px-3 py-1">{{ $element }}</span></li>
                            @endif
    
                            @if (is_array($element))
                                @foreach ($element as $page => $url)
                                    @if ($page == $paginator->currentPage())
                                        <li><span class="px-3 py-1 text-white bg-purple-600 border border-r-0 border-purple-600 rounded-md">{{ $page }}</span></li>
                                    @else
                                        <li><a href="{{ $url }}" class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple">{{ $page }}</a></li>
                                    @endif
                                @endforeach
                            @endif
                        @endforeach
    
                        <!-- Next Page Link -->
                        @if ($paginator->hasMorePages())
                            <li>
                                <a href="{{ $paginator->nextPageUrl() }}" class="px-3 py-1 rounded-md rounded-r-lg focus:outline-none focus:shadow-outline-purple" aria-label="Next">&raquo;</a>
                            </li>
                        @else
                            <li>
                                <span class="px-3 py-1 text-gray-400 rounded-md rounded-r-lg cursor-not-allowed">&raquo;</span>
                            </li>
                        @endif
                    </ul>
                </nav>
            </span>
        </div>
    </nav>
@endif
