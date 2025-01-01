{{--
 Course Columns:
 - ID
 - post_title
 - post_author
 - post_date
 - thumbnail()
 --}}
{{-- @foreach($courses as $course)
    <a style="color: unset; text-decoration: unset" href="{{ $course->link() }}">
        <div style="border: 1px solid #ddd; padding: 8px; margin-bottom: 6px;">
            <div>
                <span>Title:</span>
                <span>{{ $course->post_title }}</span>
            </div>
            <div>
                <span>Thumbnail URL:</span>
                <span>{{ $course->thumbnail() }}</span>
            </div>
            <div>
                <span>Author:</span>
                <span>{{ $course->post_author }}</span>
            </div>
            <div>
                <span>Date:</span>
                <span>{{ $course->post_date }}</span>
            </div>
            <div>
                <span>Description:</span>
                <span>{{ $course->description() }}</span>
            </div>
            <div>
                <span>Instructor:</span>
                <span>{{ $course->instructor() }}</span>
            </div>
            <div>
                <span>Difficulty:</span>
                <span>{{ $course->difficulty() }}</span>
            </div>
            <div>
                <span>Total Hours:</span>
                <span>{{ $course->totalHours() }}</span>
            </div>
        </div>
    </a>
@endforeach --}}


@extends('layout.app')

@section('title', 'Courses')

@section('content')
      <section class="py-5 text-center container">
        <div class="row py-lg-5">
          <div class="col-lg-6 col-md-8 mx-auto">
            <h1 class="fw-light">All Courses</h1>
          </div>
        </div>
      </section>

    <div class="album py-5 bg-body-tertiary">
        <div class="container">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                @foreach($courses as $course)
                    <div class="col">
                        <div class="card shadow-sm">
                            <img class="card-img-top" src="{{ $course->thumbnail()  }}"/>
                            <div class="card-body">
                                <h5>{{ $course->post_title  }}</h5>
                                <p class="card-text">
                                    {{ $course->description()  }}
                                </p>
                                <div
                                        class="d-flex justify-content-between align-items-center"
                                >
                                    <div class="btn-group">
                                        <a
                                                href="{{ $course->lessons()->first()->link() }}"
                                                class="btn btn-sm btn-primary"
                                        >
                                            First Lesson
                                        </a>
                                        <a
                                                href="{{ $course->link() }}"
                                                class="btn btn-sm btn-outline-secondary"
                                        >
                                            Details
                                        </a>
                                    </div>
                                    <small class="text-body-secondary">{{ $course->post_date->diffForHumans()  }}</small>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

@endsection