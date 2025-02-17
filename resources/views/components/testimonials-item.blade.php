@props(['testimonial'])
<div class="card h-100">
    <div class="card-body">
        <p class="card-text">{{ $testimonial['testimony'] }}</p>
        <div class="d-flex align-items-center">
            <img style="height: 75px; width: 75px; object-fit: cover;" src="{{ $testimonial['user_image'] }}" alt="Student" class="rounded-circle me-3">
            <div>
                <h6 class="mb-0">{{ $testimonial['full_name'] }}</h6>
                <small>{{ $testimonial['job'] }}</small>
            </div>
        </div>
    </div>
</div>