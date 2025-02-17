@props(['course'])
<div class="card shadow-sm h-100">
    <img class="card-img-top aspect-ratio-16x9" src="{{ $course->thumbnail  }}"/>
    <div class="card-body course-body">
        <h5 class="line-clamp-2">{{ $course->post_title  }}</h5>
        <p class="card-text line-clamp-3">
            {{ $course->description  }}
        </p>
        <div
                class="course-body-footer"
        >
            <x-taxonomy-terms-grid :items="$course->terms" />
            <div class="d-flex justify-content-between align-items-center ">
                <div class="btn-group">
                    <a
                            href="{{ $course->firstLesson->link }}"
                            class="btn btn-sm btn-primary"
                    >
                        First Lesson
                    </a>
                    <a
                            href="{{ $course->link }}"
                            class="btn btn-sm btn-outline-secondary"
                    >
                        Details
                    </a>
                </div>
                <small class="text-body-secondary"
                       title="{{ $course->post_date }}">{{ $course->post_date->diffForHumans()  }}</small>
            </div>
        </div>
    </div>
</div>