@props(['item'])
<a href="{{ $item->link }}" class="bg-light card text-decoration-none">
    <div class="card-body text-center">
        <h5 title="{{ $item->name }} ({{ ($item->count) }})" class="m-0 line-clamp-1" style="font-size: 14px"><i class="fa-solid fa-tag"></i> {{ $item->name }} ({{ ($item->count) }})</h5>
    </div>
</a>