@php use Illuminate\Support\Str; @endphp
<x-layout title="{{ $name }}">

    <x-hero-section title="Select the {{ Str::title(Str::singular($taxonomy)) }} that you're interested in">

        <div class="input-group mt-4">
            <select class="form-control" id="taxSelector">
                @foreach($terms as $term)
                    <option {{ $name === $term->name ? 'selected' : '' }} value="{{ $term->slug }}">{{ $term->name }}</option>
                @endforeach
            </select>
            <span class="input-group-text"><i class="fa-solid fa-bars"></i></span>
        </div>

    </x-hero-section>

    <div class="album py-5 bg-body-tertiary">
        <div class="container">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                @foreach($courses as $course)
                    <div class="col">
                        <x-course-card :course="$course"/>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

</x-layout>