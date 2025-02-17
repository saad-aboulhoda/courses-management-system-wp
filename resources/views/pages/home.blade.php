<x-layout>
    <x-carousel :carousel="$carousel"/>

    <div class="album py-5 bg-body-tertiary">
        <div class="container position-relative">
            <h2 class="section-title text-center mb-4">Latest Courses</h2>
            <div class="row g-3">
                @foreach($courses as $course)
                    <div class="col-md-6 col-lg-4">
                        <x-course-card :course="$course"/>
                    </div>
                @endforeach
            </div>
            <div class="more-courses-arrow d-flex justify-content-end" title="More Courses...">
                <a class="btn btn-link" href="/courses"><i class="fa-solid fa-arrow-right fa-2xl" style="color: var(--primary);"></i></a>
            </div>
        </div>
    </div>

    <!-- Categories Section -->
    <div class="py-5 bg-white">
        <div class="container">
            <h2 class="section-title text-center mb-4">Languages & Frameworks</h2>
            <div class="row g-4">
                <x-categories-grid :items="$terms" />
            </div>
        </div>
    </div>

    <x-testimonials-grid :testimonials="$testimonials" />

    <!-- Newsletter Section -->
    <div class="bg-dark text-white py-5">
        <div class="container text-center">
            <h3 class="mb-4">Subscribe to Our Newsletter</h3>
            <form class="row g-3 justify-content-center">
                <div class="col-md-4">
                    <input type="email" class="form-control" placeholder="Enter your email">
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary w-100">Subscribe</button>
                </div>
            </form>
        </div>
    </div>
</x-layout>