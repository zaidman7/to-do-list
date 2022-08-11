<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10 bg-gray-100 border border-gray-200 p-6 rounded-xl">
            <div class="max-w-lg mx-auto mt-10 p-6 rounded-xl">
                <h1 class="font-bold text-xl">Are you sure?</h1>
                <form method="POST" action="/delete/{{ $item->slug }}" class="mt-10">
                    @csrf

                    <div class="mb-6">
                        <button type="submit"
                            class="bg-blue-400 text-white rounded py-2 px-4 uppercase hover:bg-blue-500"
                        >
                            Yes
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