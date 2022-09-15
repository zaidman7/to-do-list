<x-layout>
    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
        <div class="lg:grid lg:grid-cols-6">
            @foreach($data as $title => $img)
                @if($loop->iteration == 1)
                    @include('news-item-card', ['title' => $title, 'img' => $img,
                    'class' => 'col-span-6'])
                @else
                    @include('news-item-card',
                        ['title' => $title, 'img' => $img,
                        'class' => $loop->iteration < 6 ? 'col-span-3' : 'col-span-2']
                    )
                @endif
            @endforeach
        </div>
    </main>
</x-layout>