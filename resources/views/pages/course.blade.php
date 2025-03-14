<x-layout>
    <div class="course-details-section pt-3 pb-3">
        <div class="container">
            <div class="d-flex align-items-center justify-content-between flex-wrap mb-1">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/courses">Courses</a></li>
                    <li class="breadcrumb-item"><span>{{ $course->post_title }}</span></li>
                </ol>
                <div class="ms-2">
                    <x-taxonomy-terms-grid :items="$course->terms"/>
                </div>
            </div>
            <div class="card">
                <div class="card-header">{{$course->post_title}}</div>
                <div class="card-body">
                    <div class="row gy-3">
                        <div class="col-lg-6">
                            <img
                                    src="{{ $course->thumbnail }}"
                                    alt=""
                                    class="img-fluid rounded lesson-thumbnail"
                            />
                        </div>
                        <div class="col-lg-6">
                            <div class="course-details px-2">
                                <div class="row gy-2 gx-2">
                                    <div class="col-md-4">
                                        <div class="cat">
                                            <p class="cat-title"><i class="fa-solid fa-chalkboard-user"></i> Instructor
                                            </p>
                                            <p class="cat-text line-clamp-1">{{ $course->instructor }}</p>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="cat">
                                            <p class="cat-title"><i class="fa-solid fa-gauge-high"></i> Difficulty</p>
                                            <p class="cat-text line-clamp-1">{{ $course->difficulty }}</p>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="cat">
                                            <p class="cat-title"><i class="fa-solid fa-clock"></i> Total hours</p>
                                            <p class="cat-text line-clamp-1">{{ $course->totalHours }}</p>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="cat">
                                            <p class="cat-title"><i class="fa-solid fa-circle-info"></i> Description</p>
                                            <p class="cat-description">{{ $course->description }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer d-flex justify-content-end">
                    <a href="{{ $course->firstLesson->link }}" class="btn btn-primary btn-sm">
                        Start with First Lesson
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="course-lessons pt-3 pb-3">
        <div class="container">
            <div class="card">
                <div
                        class="card-header d-flex justify-content-between align-items-center"
                >
                    <span class="whitespace-nowrap pe-2">Lessons ({{ count($course->lessons)  }}):</span>
                    <div class="input-group input-group-sm" style="width: 300px">
                        <span class="input-group-text">Search</span>
                        <input id="lessonsSearchInput" type="text" class="form-control"/>
                    </div>
                </div>
                <div class="card-body">
                    <div class="lessons-list">
                        @foreach($course->lessons as $lesson)
                            <a href="{{ $lesson->link }}" class="lessons-item">
                                <div class="lesson-number">#{{ $lesson->lesson_number }}</div>
                                <div title="{{ $lesson->title }}"
                                     class="lesson-title line-clamp-1 pe-2">{{ $lesson->title }}</div>
                                <div style="white-space: nowrap" title="{{ $lesson->created_at }}"
                                     class="lesson-date text-body-secondary">{{ $lesson->created_at->diffForHumans() }}
                                    <i class="fa-regular fa-calendar"></i></div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>