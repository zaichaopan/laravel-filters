<ul class="list-group mb-4">
    @foreach($filter as $key => $value)
    <a href="{{ route('courses.index',array_merge(request()->query(), [$query => $key, 'page' => 1])) }}"
       class="px-1 py-1 list-group-item list-group-item-action {{ request($query) === $key ? 'active':''}}">
        {{$value}}
    </a>
    @endforeach

    @if(request($query))
    <a href="{{ route('courses.index', array_except(request()->query(), [$query, 'page']))}}"
       class="p-1 list-group-item list-group-item-info">&times clear this filter
    </a>
    @endif
</ul>
