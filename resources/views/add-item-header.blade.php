<script>
    $(document).ready(function() {
        $("#add-item-form").submit(function(e) {
            e.preventDefault();
            var name = $("#name").val();
            var deadline = $("#deadline").val();
            var submit = $("#submit").val();

            $.ajax({
                url: '/add',
                type: 'POST',
                data: {
                    _token: "{{ csrf_token() }}",
                    name: name,
                    deadline: deadline,
                    submit: submit
                },
                success: function(data) {
                    $('#items').load(' #items');
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    alert("responseText=" + XMLHttpRequest.responseText + "\n textStatus=" + textStatus + "\n errorThrown=" + errorThrown);
                }
            });
        });
    });
</script>

<h1 class="font-bold text-xl">Add an assignment</h1>
<form id="add-item-form" action="/add" method="POST" class="mt-10">
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
            class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500"
        >
            Add
        </button>
    </div>
</form>
