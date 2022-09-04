<div class="max-w-lg mx-auto mt-10 p-6 rounded-xl">
    <h1 class="font-bold text-xl">Are you sure?</h1>
    <form method="POST" action="/delete/{{ $item->slug }}" class="mt-10">
        @csrf

        <div class="mb-6">
            <button type="submit"
                id="submit-delete-item-{{ $item->slug }}"
                data-id="{{ $item->slug }}"
                data-featured="{{ $featured }}"
                class="submit-delete-item bg-blue-400 text-white rounded py-2 px-4 uppercase hover:bg-blue-500"
            >
                Yes
            </button>
            <button
                id="do-not-delete-{{ $item->slug }}"
                data-id="{{ $item->slug }}"
                data-featured="{{ $featured }}"
                class="do-not-delete bg-gray-400 text-white rounded py-2 px-4 uppercase hover:bg-gray-500"
            >
                No
            </button>
        </div>
    </form>
</div>