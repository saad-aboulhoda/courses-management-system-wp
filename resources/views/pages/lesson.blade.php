{{--
<h3>Lesson details</h3>
<ul>
    <li>Title: {{ $lesson->lesson_number }} : {{ $lesson->title }}</li>
    <li>Description: {{ $lesson->description }}</li>
    <li>Google Video ID: {{ $lesson->google_video_id }}</li>
</ul>

<h3>Course details</h3>
<ul>
    <li>Title: {{ $lesson->course->post_title }}</li>
    <li>Author: {{ $lesson->course->post_author }}</li>
    <li>Date: {{ $lesson->course->post_date }}</li>
    <li>Description: {{ $lesson->course->description() }}</li>
    <li>Instructor: {{ $lesson->course->instructor() }}</li>
    <li>Difficulty: {{ $lesson->course->difficulty() }}</li>
    <li>Total hours: {{ $lesson->course->totalHours() }}</li>
</ul>

<h3>All lessons</h3>
<ul>
    @foreach($lesson->lessons() as $lessonL)
        <li><a href="{{ $lessonL->link()  }}">{{ $lessonL->lesson_number }} :{{ $lessonL->title }}</a>@if($lesson->id == $lessonL->id) (Current Lesson) @endif</li>
    @endforeach
</ul>--}}

@extends('layout.app')

@section('title', "Lesson")

@section('content')

    <div class="pt-3">
        <div class="container-fluid">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Courses</a></li>
                <li class="breadcrumb-item"><a href="{{$lesson->course->link()}}">{{$lesson->course->post_title}}</a>
                </li>
                <li class="breadcrumb-item"><span>{{ $lesson->title }}</span></li>
            </ol>
        </div>
    </div>

    <div class="content-wrapper">

        <aside id="sidebar" class="active">
            <div class="card">
                <div class="card-header">Lessons</div>
                <div class="card-body p-0">
                    <ul class="lesson-list">
                        @foreach($lesson->lessons() as $lessonL)
                            <li>
                                <a href="{{$lessonL->link()}}"
                                   class="lesson-item {{ $lessonL->id == $lesson->id ? 'active' : ''  }}">
                                    <div>
                                        <p>#{{ $lessonL->lesson_number  }} - {{ $lessonL->title  }}</p>
                                    </div>
                                    <p class="text-secondary">{{ date('d-m-Y', strtotime($lessonL->created_at)) }}</p>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </aside>

        <div
                id="videoContainer"
                class="lesson-video-section w-100 position-relative sidebar"
        >
            <div class="card">
                <div class="card-header">#{{ $lesson->lesson_number }} - {{ $lesson->title }}</div>
                <div class="card-body position-relative p-0">
                    <div
                            id="toggle-btn"
                            class="position-absolute d-flex justify-content-center align-items-center"
                    >
                        <svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="25"
                                height="25"
                                fill="#fff"
                                class="bi bi-arrow-left"
                                viewBox="0 0 16 16"
                        >
                            <path
                                    fill-rule="evenodd"
                                    d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8"
                            />
                        </svg>
                    </div>
                    <iframe
                            class="video-iframe"
                            allowfullscreen
                            src="https://drive.google.com/file/d/{{ $lesson->google_video_id  }}/preview"
                            frameborder="0"
                    ></iframe>
                </div>
            </div>
            <div class="comment-section p-3">
                <div class="container">
                    <div class="d-flex justify-content-between mb-3">
                        <button type="button" class="btn btn-secondary">Previous</button>
                        <button type="button" class="btn btn-primary">Next</button>
                    </div>
                    <div class="form-floating">
              <textarea
                      class="form-control"
                      placeholder="Leave a comment here"
                      id="floatingTextarea"
              ></textarea>
                        <label for="floatingTextarea">Comments</label>
                        <div class="d-flex justify-content-end">
                            <button type="button" class="btn btn-primary mt-3">
                                Submit
                            </button>
                        </div>
                    </div>
                    <div class="card mt-3">
                        <div class="card-header">Comments</div>
                        <div class="card-body p-0">
                            <div class="flex">
                                <div class="d-flex align-items-start w-100 comment p-">
                                    <img
                                            src="https://placehold.co/40"
                                            class="me-3"
                                            alt=""
                                            srcset=""
                                            style="border-radius: 50%"
                                    />
                                    <div class="w-100">
                                        <h3>n1akai</h3>
                                        <p>
                                            Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                            Officia, iste?
                                        </p>
                                        <div class="d-flex justify-content-end">
                                            <span class="text-secondary">2 days ago</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex align-items-start w-100 comment p-">
                                    <img
                                            src="https://placehold.co/40"
                                            class="me-3"
                                            alt=""
                                            srcset=""
                                            style="border-radius: 50%"
                                    />
                                    <div class="w-100">
                                        <h3>n1akai</h3>
                                        <p>
                                            Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                            Officia, iste?
                                        </p>
                                        <div class="d-flex justify-content-end">
                                            <span class="text-secondary">2 days ago</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        const header = document.querySelector('header');
        header.style.position = 'static';

        let toggleBtn = document.getElementById("toggle-btn");
        let sideBar = document.getElementById("sidebar");
        const videoContainer = document.querySelector("#videoContainer");
        toggleBtn.addEventListener("click", (event) => {
            event.stopPropagation();
            toggleBtn.children[0].classList.toggle("active");
            videoContainer.classList.toggle("sidebar");
            sideBar.classList.toggle("active");
        });

    </script>
@endsection
