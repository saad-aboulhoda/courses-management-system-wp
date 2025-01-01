@extends('layout.app')

@section('title', $course->post_title)

@section('content')
    <div class="course-details-section pt-3 pb-3">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Courses</a></li>
                <li class="breadcrumb-item"><span>{{ $course->post_title }}</span></li>
            </ol>
            <div class="card">
                <div class="card-header">{{$course->post_title}}</div>
                <div class="card-body">
                    <div class="row gy-3">
                        <div class="col-lg-6">
                            <img
                                    src="{{ $course->thumbnail() }}"
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
                                            <p class="cat-text line-clamp-1">{{ $course->instructor() }}</p>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="cat">
                                            <p class="cat-title"><i class="fa-solid fa-gauge-high"></i> Difficulty</p>
                                            <p class="cat-text line-clamp-1">{{ $course->difficulty() }}</p>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="cat">
                                            <p class="cat-title"><i class="fa-solid fa-clock"></i> Total hours</p>
                                            <p class="cat-text line-clamp-1">{{ $course->totalHours() }}</p>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="cat">
                                            <p class="cat-title"><i class="fa-solid fa-circle-info"></i> Description</p>
                                            <p class="cat-description">{{ $course->description() }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer d-flex justify-content-end">
                    <a href="{{ $course->firstLesson()->link() }}" class="btn btn-primary btn-sm">
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
                    <span>Lessons ({{ count($course->lessons)  }}):</span>
                    <div class="input-group input-group-sm" style="width: 300px">
                        <span class="input-group-text">Search</span>
                        <input type="text" class="form-control"/>
                    </div>
                </div>
                <div class="card-body">
                    <div class="lessons-list">
                        @foreach($course->lessons as $lesson)
                        <a href="{{ $lesson->link() }}" class="lessons-item">
                            <div class="lesson-number">#{{ $lesson->lesson_number  }}</div>
                            <div class="lesson-title">{{ $lesson->title  }}</div>
                            <div class="lesson-date">{{ $lesson->created_at->diffForHumans() }} <i class="fa-regular fa-calendar"></i></div>
                        </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection