<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-6xl mx-auto mt-10 lg:mt-20 space-y-6">
            <article class="max-w-4xl mx-auto lg:grid lg:grid-cols-12 gap-x-10">
                <div class="col-span-4 lg:text-center lg:pt-14 mb-10">
                    <a href="/upload-file/{{ $item->slug }}">
                        @if($item->file)
                            <img src="{{  $item->file->file_path  }}" alt="Blog Post illustration" class="rounded-xl" style="object-fit: cover; width: 280px; height: 220px;">
                        @else
                            <img src="/images/illustration-1.png" alt="Blog Post illustration" class="rounded-xl">
                        @endif
                    </a>
                    <div class="flex items-center lg:justify-center text-sm mt-4">
                        <div class="ml-3 text-left">
                            <x-to-do-by :item="$item" />
                        </div>
                    </div>
                </div>

                <div class="col-span-8">
                    <div class="hidden lg:flex justify-between mb-6">
                        <a href="/"
                            class="transition-colors duration-300 relative inline-flex items-center text-lg hover:text-blue-500">
                            <svg width="22" height="22" viewBox="0 0 22 22" class="mr-2">
                                <g fill="none" fill-rule="evenodd">
                                    <path stroke="#000" stroke-opacity=".012" stroke-width=".5" d="M21 1v20.16H.84V1z">
                                    </path>
                                    <path class="fill-current"
                                        d="M13.854 7.224l-3.847 3.856 3.847 3.856-1.184 1.184-5.04-5.04 5.04-5.04z">
                                    </path>
                                </g>
                            </svg>

                            Back to List
                        </a>

                        <div id="buttons-{{ $item->slug }}" class="space-x-2">
                            <x-update-button :item="$item" :featured="2" />
                            <x-delete-button :item="$item" :featured="2" />
                        </div>
                    </div>

                    <h1 class="font-bold text-3xl lg:text-4xl mb-10">
                        {{ $item->todo }}
                    </h1>

                    <div class="progress-bar" id="progress-bar-div-{{ $item->slug }}" class="text-sm mt-2">
                        <x-progress-bar :item="$item" :featured="2" />
                    </div>
                    
                    <div class="update-progress-form-div" id="update-progress-form-div-{{ $item->slug }}" data-id="{{ $item->slug }}" style="display:none">
                        @include('update-progress', ['item' => $item, 'featured' => 2])
                    </div>

                    <div class="delete-item-form-div" id="delete-item-form-div-{{ $item->slug }}" data-id="{{ $item->slug }}" style="display:none">
                        @include('delete', ['item' => $item, 'featured' => 2])
                    </div>
                </div>
            </article>
        </main>
    </section>
</x-layout>