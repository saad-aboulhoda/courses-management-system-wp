@props(['testimonials'])
<!-- Testimonials Section -->
<div class="bg-light py-5">
    <div class="container">
        <h2 class="section-title text-center mb-4">Student Testimonials</h2>
        <div class="row g-4">
            @foreach ($testimonials as $testimonial)
            <div class="col-md-4">
                <x-testimonials-item :testimonial="$testimonial" />
            </div>
            @endforeach
            <!-- Add more testimonials -->
        </div>
    </div>
</div>