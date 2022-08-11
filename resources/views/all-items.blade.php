<x-layout>
    @include('_all-items-header')

    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
        @if($items->count())
            <x-items-grid :items="$items" />
        @endif
    </main>
</x-layout>