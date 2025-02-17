@props(['title', 'description'])
<section class="py-5 text-center container">
    <div class="row py-lg-5">
        <div class="col-lg-6 col-md-8 mx-auto">
            <h1 class="fw-light">{{ $title ?? '' }}</h1>
            @if($description ?? false)
                <p class="lead">{{ $description }}</p>
            @endif
            {{ $slot }}
        </div>
    </div>
</section>