<div>
    <ul class="flex pl-0 list-none rounded my-2">
        @foreach ($elements as $element)
            @if (is_string($element))
                <li class="disabled">{{ $element }}</li>
            @endif
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="relative block py-2 px-3 leading-tight bg-white border border-gray-300 text-blue-700 hover:bg-gray-200">{{ $page }}</li>
                    @else
                        <li><a href="{{ $url }}" class="relative block py-2 px-3 leading-tight bg-white border border-gray-300 text-blue-700  hover:bg-gray-200">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach
    </ul>
</div>
