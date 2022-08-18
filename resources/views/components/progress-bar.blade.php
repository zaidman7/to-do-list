<script>
    $(document).ready(function() {
        $('#update-progress-{{ $item->slug }}').on('click', function(e) {
            e.preventDefault();
            $('#progress-bar-{{ $item->slug }}').hide();
            $('#update-progress-form-div-{{ $item->slug }}').show();
        });
    });
</script>

<a id="update-progress-{{ $item->slug }}" href="/update-progress/{{ $item->slug }}">
    <progress
        id="progress-{{ $item->slug }}" value="{{ $item->progress }}" max="100" style="width:100%;"></progress>
</a>