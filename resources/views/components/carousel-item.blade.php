<div {{ $attributes->merge(['class' => 'carousel-item' . ($active ? ' active' : '')]) }}>
    <div class="carousel-img-container">
        <img src="{{ $imageUrl }}" alt="{{ $imageAlt }}"/>
    </div>
    <div class="container">
        <div class="carousel-caption text-start">
            <h1>{{ html_entity_decode($title) }}</h1>
            <p class="opacity-75">
                {{ html_entity_decode($description) }}
            </p>
            <p>
                <a class="btn btn-primary" href="{{ $btnLink }}">
                    {{ $btnText }}
                </a>
            </p>
        </div>
    </div>
</div>