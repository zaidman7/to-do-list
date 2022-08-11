@props(['item'])

<article
{{ $attributes->merge(['class' => 'transition-colors duration-300 hover:bg-gray-100 border border-black border-opacity-0 hover:border-opacity-5 rounded-xl']) }}>
    <div class="py-6 px-5">
        <div>
            <img src="/images/illustration-3.png" alt="Blog Post illustration" class="rounded-xl">
        </div>

        <div class="mt-8 flex flex-col justify-between">
            <header>
                <div class="space-x-2">
                    <x-update-button :item="$item" />
                    <x-delete-button :item="$item" />
                </div>

                <div class="mt-4">
                    <h1 class="text-3xl">
                        <a href="/items/{{ $item->slug }}">
                            {{ $item->todo }}
                        </a>
                    </h1>
                </div>
            </header>

            <footer class="flex justify-between items-center mt-8">
                <div class="flex items-center text-sm">
                    <img src="/images/lary-avatar.svg" alt="Lary avatar">
                    <div class="ml-3">
                        <x-to-do-by :item="$item" />
                    </div>
                </div>

                <div>
                    <a href="#"
                       class="transition-colors duration-300 text-xs font-semibold bg-gray-200 hover:bg-gray-300 rounded-full py-2 px-8"
                    >View</a>
                </div>
            </footer>
        </div>
    </div>
</article>