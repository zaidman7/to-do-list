<article class="{{ $class . ' transition-colors duration-300 hover:bg-gray-100 border border-black border-opacity-0 hover:border-opacity-5 rounded-xl' }}">
    <div class="py-6 px-5">
        <div>
            <img src="/images/illustration-3.png" alt="Blog Post illustration" class="rounded-xl">
        </div>

        <div class="mt-8 flex flex-col justify-between">
            <header>
                <div id="buttons-{{ $item->slug }}" class="space-x-2">
                    <x-update-button :item="$item" :featured="0" />
                    <x-delete-button :item="$item" :featured="0" />
                </div>

                <div class="mt-4">
                    <h1 class="text-3xl">
                        <a href="/items/{{ $item->slug }}">
                            {{ $item->todo }}
                        </a>
                    </h1>
                </div>
            </header>

            <div class="update-progress-form-div" id="update-progress-form-div-{{ $item->slug }}" data-id="{{ $item->slug }}" style="display:none">
                @include('update-progress', ['item' => $item, 'featured' => 0])
            </div>

            <div class="delete-item-form-div" id="delete-item-form-div-{{ $item->slug }}" data-id="{{ $item->slug }}" style="display:none">
                @include('delete', ['item' => $item, 'featured' => 0])
            </div>

            <footer class="flex justify-between items-center mt-8">
                <div class="flex items-center text-sm">
                    <img src="/images/lary-avatar.svg" alt="Lary avatar">
                    <div class="ml-3">
                        <x-to-do-by :item="$item" />
                    </div>
                </div>

                <div>
                    <a href="/items/{{ $item->slug }}"
                       class="transition-colors duration-300 text-xs font-semibold bg-gray-200 hover:bg-gray-300 rounded-full py-2 px-8"
                    >View</a>
                </div>
            </footer>
        </div>
    </div>
</article>