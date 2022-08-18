<script>
    $(document).ready(function() {
        $("#update-progress-form-{{ $item->slug }}").submit(function(e) {
            e.preventDefault();
            var progress = $("#progress").val();

            $.ajax({
                url: '/update/{{ $item->slug }}',
                type: 'POST',
                data: {
                    _token: "{{ csrf_token() }}",
                    progress: progress
                },
                success: function(data) {
                    $('#update-progress-form-div-{{ $item->slug }}').hide();
                    $('#progress-bar-{{ $item->slug }}').load(' #progress-bar-{{ $item->slug }}');
                    $('#progress-bar-{{ $item->slug }}').show();
                    $('#buttons-{{ $item->slug }}').load(' #buttons-{{ $item->slug }}');
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    alert("responseText=" + XMLHttpRequest.responseText + "\n textStatus=" + textStatus + "\n errorThrown=" + errorThrown);
                }
            });
        });
    });
</script>

<form id="update-progress-form-{{ $item->slug }}" method="POST" action="/update/{{ $item->slug }}" class="mt-10">
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