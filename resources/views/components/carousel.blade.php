@props(['carousel'])

<!-- Carousel - Start -->
<div id="myCarousel" class="carousel slide mb-6" data-bs-ride="carousel">
    <div class="carousel-indicators">
        @foreach($carousel as $key => $item)
            <button
                    type="button"
                    data-bs-target="#myCarousel"
                    data-bs-slide-to="{{ $key }}"
                    class="{{ $loop->first ? 'active' : '' }}"
                    @if ($loop->first) aria-current="true" @endif
                    aria-label="Slide {{ $key + 1  }}"
            ></button>
        @endforeach
    </div>
    <div class="carousel-inner">
        @foreach($carousel as $item)
            <x-carousel-item
                    active="{{ $loop->first }}"
                    image-url="{{ $item->thumbnail  }}"
                    image-alt="Java Image"
                    title="{{ $item->post_title  }}"
                    description="{{ $item->description  }}"
                    btn-link="{{ $item->link  }}"
                    btn-text="Explore"
            ></x-carousel-item>
        @endforeach
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