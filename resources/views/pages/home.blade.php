@extends('layout.app')

@section('title', 'Home')

@section('content')

    <!-- Carousel - Start -->
    <div id="myCarousel" class="carousel slide mb-6" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button
                    type="button"
                    data-bs-target="#myCarousel"
                    data-bs-slide-to="0"
                    class="active"
                    aria-current="true"
                    aria-label="Slide 1"
            ></button>
            <button
                    type="button"
                    data-bs-target="#myCarousel"
                    data-bs-slide-to="1"
                    aria-label="Slide 2"
            ></button>
            <button
                    type="button"
                    data-bs-target="#myCarousel"
                    data-bs-slide-to="2"
                    aria-label="Slide 3"
            ></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="carousel-img-container">
                    <img src="https://www.mytaskpanel.com/wp-content/uploads/2023/04/consulting-blog-09.webp"
                         alt="Java Image"/>
                </div>
                <div class="container">
                    <div class="carousel-caption text-start">
                        <h1>Master Java Programming</h1>
                        <p class="opacity-75">
                            Learn Java, the powerful programming language, to build scalable applications, Android apps,
                            and enterprise software.
                        </p>
                        <p>
                            <a class="btn btn-primary" href="#">Explore Java</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <button
                class="carousel-control-prev"
                type="button"
                data-bs-target="#myCarousel"
                data-bs-slide="prev"
        >
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button
                class="carousel-control-next"
                type="button"
                data-bs-target="#myCarousel"
                data-bs-slide="next"
        >
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <!-- Carousel - End -->
    <div class="album py-5 bg-body-tertiary">
        <div class="container">
            <h2 class="section-title text-center mb-4">Latest Courses</h2>
            <div class="row g-3">
                @foreach($courses as $course)
                    <div class="col-md-6 col-lg-4">
                        <div class="card shadow-sm">
                            <img class="card-img-top" src="{{ $course->thumbnail()  }}"/>
                            <div class="card-body">
                                <h5 class="line-clamp-1">{{ $course->post_title  }}</h5>
                                <p class="card-text line-clamp-3">
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