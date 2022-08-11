@props(['item'])

<article
                class="transition-colors duration-300 hover:bg-gray-100 border border-black border-opacity-0 hover:border-opacity-5 rounded-xl">
                <div class="py-6 px-5 lg:flex">
                    <div class="flex-1 lg:mr-8">
                        <img src="/images/illustration-1.png" alt="Blog Post illustration" class="rounded-xl">
                    </div>

                    <div class="flex-1 flex flex-col justify-between">
                        <header class="mt-8 lg:mt-0">
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

                        <div class="text-sm mt-2">
                            <a href="/update-progress/{{ $item->slug }}">
                                    <progress id="progress" value="{{ $item->progress }}" max="100" style="width:100%;"> {{ $item->progress }}% </progress>
                            </a>
                        </div>

                        <footer class="flex justify-between items-center mt-8">
                            <div class="flex items-center text-sm">
                                <img src="/images/lary-avatar.svg" alt="Lary avatar">
                                <div class="ml-3">
                                    <x-to-do-by :item="$item" />
                                </div>
                            </div>

                            <div class="hidden lg:block">
                                <a href="/items/{{ $item->slug }}"
                                   class="transition-colors duration-300 text-xs font-semibold bg-gray-200 hover:bg-gray-300 rounded-full py-2 px-8"
                                >View</a>
                            </div>
                        </footer>
                    </div>
                </div>
            </article>