<article
    class="transition-colors duration-300 hover:bg-gray-100 border border-black border-opacity-0 hover:border-opacity-5 rounded-xl">
    <div class="py-6 px-5 lg:flex">
        <div class="flex-1 lg:mr-8">
            <img src="{{ $img }}" alt="Blog Post illustration" class="rounded-xl">
        </div>

        <div class="flex-1 flex flex-col justify-between">
            <header class="mt-8 lg:mt-0">
                <div class="mt-4">
                    <h1 class="text-3xl">
                        <a href="/items/{{ $title }}">
                            {{ $title }}
                        </a>
                    </h1>
                </div>
            </header>

            <div style="width: 550px; height: 420px;"></div>

            <footer class="flex justify-between items-center mt-8">
                <div class="hidden lg:block">
                    <a href="/items/{{ $title }}"
                       class="transition-colors duration-300 text-xs font-semibold bg-gray-200 hover:bg-gray-300 rounded-full py-2 px-8"
                    >View</a>
                </div>
            </footer>
        </div>
    </div>
</article>