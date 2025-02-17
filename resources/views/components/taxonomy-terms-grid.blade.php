@props(['items'])

@if($items ?? false)
    <div class="mb-2">
        @foreach($items as $item)
            <x-taxonomy-term-item :item="$item" />{{ $loop->last ? '' : ',' }}
        @endforeach
    </div>
@endif