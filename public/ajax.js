$(document).ready(function() {
    $('body').on('click', '#submit-add-item', function(e) {
        e.preventDefault();
        var name = $("#name").val();
        var deadline = $("#deadline").val();
        var submit = $("#submit").val();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: '/add',
            type: 'POST',
            data: {
                name: name,
                deadline: deadline,
                submit: submit
            },
            success: function(data) {
                $('#items').load(' #items');
                $(".add-item-form")[0].reset();
            },
            error: function(XMLHttpRequest, textStatus, errorThrown) {
                alert("responseText=" + XMLHttpRequest.responseText + "\n textStatus=" + textStatus + "\n errorThrown=" + errorThrown);
            }
        });
    });

    $('body').on('click', '.update-progress', function(e) {
        e.preventDefault();
        let id = $('#' + e.target.id).data('id');
        let featured = $('#' + e.target.id).data('featured');
        if(featured == 1) {
            $('#progress-bar-div-' + id).hide();
        }
        $('#update-progress-form-div-' + id).show();
    });

    $('body').on('click', '.submit-update-progress', function(e) {
        e.preventDefault();
        let id = $('#' + e.target.id).data('id');
        let featured = $('#' + e.target.id).data('featured');

        var progress = $("#progress-" + id).val();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        if(featured == 1) {
            $.ajax({
                url: '/update/' + id,
                type: 'POST',
                data: {
                    progress: progress
                },
                success: function(data) {
                    $('#update-progress-form-div-' + id).hide();
                    $('#progress-bar-div-' + id).load(' #progress-bar-' + id);
                    $('#progress-bar-div-'  + id).show();
                    $('#buttons-' + id).load(' #buttons-' + id);
                    $('#progress-' + id).val(progress);
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    alert("responseText=" + XMLHttpRequest.responseText + "\n textStatus=" + textStatus + "\n errorThrown=" + errorThrown);
                }
            });
        }
        else {
            $.ajax({
                url: '/update/' + id,
                type: 'POST',
                data: {
                    progress: progress
                },
                success: function(data) {
                    $('#update-progress-form-div-' + id).hide();
                    $('#buttons-' + id).load(' #buttons-' + id);
                    $('#progress-' + id).val(progress);
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    alert("responseText=" + XMLHttpRequest.responseText + "\n textStatus=" + textStatus + "\n errorThrown=" + errorThrown);
                }
            });
        }
    });

    $('body').on('click', '.delete-item', function(e) {
        e.preventDefault();
        let id = $('#submit-update-progress').data('id');
        let featured = $('#submit-update-progress').data('featured');

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        if(featuresd) {
            $.ajax({
                url: '/update/' + id,
                type: 'POST',
                data: {
                    progress: progress
                },
                success: function(data) {
                    $('.update-progress-form-div').hide();
                    $('#progress-bar-' + id).load(' #progress-bar-' + id);
                    $('#progress-bar-'  + id).show();
                    $('#buttons-' + id).load(' #buttons-' + id);
                    $('#progress').val(progress);
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    alert("responseText=" + XMLHttpRequest.responseText + "\n textStatus=" + textStatus + "\n errorThrown=" + errorThrown);
                }
            });
        }
        else {
            $.ajax({
                url: '/update/' + id,
                type: 'POST',
                data: {
                    progress: progress
                },
                success: function(data) {
                    $('.update-progress-form-div').hide();
                    $('#progress-bar-' + id).load(' #progress-bar-' + id);
                    $('#progress-bar-'  + id).show();
                    $('#buttons-' + id).load(' #buttons-' + id);
                    $('#progress').val(progress);
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    alert("responseText=" + XMLHttpRequest.responseText + "\n textStatus=" + textStatus + "\n errorThrown=" + errorThrown);
                }
            });
        }
    });
});