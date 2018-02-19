@if(array_intersect(array_keys(request()->query()), array_keys($courseFilters)))
    <p><a href="{{ route('courses.index')}}">Clear Flters</a></p>
@endif

@foreach($courseFilters as $query => $filter)
    @include('courses.partials._filter', ['filter' => $filter, 'query' => $query ])
@endforeach


