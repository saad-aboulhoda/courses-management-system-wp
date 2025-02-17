@props(['items'])
@foreach($items as $item)
    <div class="col-6 col-md-2">
        <x-category-item :item="$item" />
    </div>
@endforeach