<x-layout>
    <div id="header" class="max-w-lg mx-auto mt-10 p-6 rounded-xl">
        @include('add-item-header')
    </div>

    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
        <div id="items">
            @if($items->count())
                @include('items-grid')
            @endif
        </div>
    </main>
</x-layout>