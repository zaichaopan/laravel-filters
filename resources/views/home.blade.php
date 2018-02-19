@extends('layouts.app') @section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            filters
        </div>
        <div class="col-md-8">
            <div class="card mb-4">
                <ul class="list-group list-group-flush">
                    @foreach($courses as $course)
                    <li class="list-group-item d-flex">

                        <div class="mr-2">
                            <img src="http://via.placeholder.com/50x50" />
                        </div>
                        <div class="d-flex flex-column">
                            <div>
                                {{$course->name}}
                            </div>

                            <div class="d-flex small">
                                <div class="text-capitalize">
                                    {{ $course->difficulty}}
                                </div>

                                <div class="px-2 text-capitalize">
                                    {{ $course->formattedAccess}}
                                </div>

                                 <div class="text-capitalize mr-2">
                                    {{ $course->formattedStarted}}
                                </div>

                                @foreach($course->subjects as $subject)
                                <span class="text-uppercase">{{ $subject->name }}</span>
                                @endforeach
                            </div>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>

            {{ $courses->links() }}
        </div>
    </div>
</div>
@endsection
