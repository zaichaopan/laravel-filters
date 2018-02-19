<div class="d-flex p-2">
    <div class="mr-2">
        <img src="http://via.placeholder.com/50x50" />
    </div>
    <div class="d-flex flex-column">
        <div>
            {{ $course->name }}
        </div>

        <div class="d-flex small">
            <div class="text-capitalize">
                {{ $course->difficulty }}
            </div>

            <div class="px-2 text-capitalize">
                {{ $course->formattedAccess }}
            </div>

            <div class="text-capitalize pr-2">
                {{ $course->formattedStarted }}
            </div>

            <div class="text-capitalize mr-2">
                {{ $course->type }}
            </div>

            @foreach($course->subjects as $subject)
            <span class="text-uppercase">{{ $subject->name }}</span>
            @endforeach
        </div>
    </div>
</div>
