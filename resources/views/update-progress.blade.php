<form id="update-progress-form-{{ $item->slug }}" method="POST" action="/update/{{ $item->slug }}" class="update-progress-form mt-10">
    @csrf

    <div class="mb-6">
        <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="progress">
            Progress
        </label>

        <input class="border border-gray-400 p-2 w-full"
            type="number"
            min="0"
            max="100"
            value="{{ $item->progress }}"
            name="progress"
            id="progress-{{ $item->slug }}"
            required
        >
    </div>

    <div class="mb-6">
        <button type="submit"
            id="submit-update-progress-{{ $item->slug }}"
            data-id="{{ $item->slug }}"
            data-featured="{{ $featured }}"
            class="submit-update-progress bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500"
        >
            Update
        </button>
    </div>
</form>