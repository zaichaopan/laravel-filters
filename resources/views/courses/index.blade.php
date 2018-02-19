@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-3">
        @include('courses.partials._filters')
        </div>
        <div class="col-md-9">
            <div class="card mb-4">
                @each('courses.partials._course', $courses,'course','courses.partials._empty')
            </div>
            {{ $courses->appends(request()->query())->links() }}
        </div>
    </div>
</div>
@endsection
