<h1 class="font-bold text-xl">Add an assignment</h1>
<form id="add-item-form" action="/add" method="POST" class="add-item-form mt-10">
    @csrf

    <div class="mb-6">
        <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="progress">
            Name
        </label>

        <input class="border border-gray-400 p-2 w-full"
            type="text"
            name="name"
            id="name"
            required
        >
    </div>

    <div class="mb-6">
        <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="progress">
            Deadline
        </label>

        <input class="border border-gray-400 p-2 w-full"
            type="date"
            name="deadline"
            id="deadline"
            required
        >
    </div>

    <div class="mb-6">
        <button type="submit"
            id="submit-add-item"
            class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500"
        >
            Add
        </button>
    </div>
</form>
