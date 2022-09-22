<x-layout>
    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6" style="text-align: center;">
        <form action="/testpost" method="POST">
            @csrf
            <button type="submit" class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500">
                Post
            </button>
        </form>
    <main>
</x-layout>