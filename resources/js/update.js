$(document).ready(function() {
    $('#update-progress-{{ $item->slug }}').on('click', function(e) {
        e.preventDefault();
        $('#progress-bar-{{ $item->slug }}').hide();
        $('#update-progress-form-div-{{ $item->slug }}').show();
    });

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