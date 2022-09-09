@include('item-featured-card', ['item' => $items->first()])

@if($items->count() > 1)
    <div class="lg:grid lg:grid-cols-6">
        @foreach($items->skip(1) as $item)
            @include('item-card',
                ['item' => $item,
                'class' => $loop->iteration < 3 ? 'col-span-3' : 'col-span-2']
            )
        @endforeach
    </div>
@endif