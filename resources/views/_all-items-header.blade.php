<header class="max-w-xl mx-auto mt-20 text-center">
    <h1 class="text-4xl">
                There are {{ App\Models\Item::count() }} assignments to do.
    </h1>

    <div class="space-y-2 lg:space-y-0 lg:space-x-4 mt-8">
        <a href="/add-item"
            class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500"
        >Add Item</a>
    </div>
</header>