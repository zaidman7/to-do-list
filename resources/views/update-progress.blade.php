<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10 bg-gray-100 border border-gray-200 p-6 rounded-xl">
            <div class="max-w-lg mx-auto mt-10 p-6 rounded-xl">
                <h1 class="font-bold text-xl">Update Progress for "{{ $item->todo }}"</h1>
                <form method="POST" action="/update/{{ $item->slug }}" class="mt-10">
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
                            id="progress"
                            required
                        >
                    </div>

                    <div class="mb-6">
                        <button type="submit"
                            class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500"
                        >
                            Update
                        </button>
                    </div>
                </form>
            </div>
            <div class="display:flex justify-content:center">
                <x-back-button />
            </div>
        </main>
    </section>
</x-layout>