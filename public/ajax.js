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
        if(featured != 0) {
            $('#progress-bar-div-' + id).hide();
        }
        $('#delete-item-form-div-' + id).hide();
        $('#update-progress-form-div-' + id).show();
    });

    $('body').on('click', '.delete-item', function(e) {
        e.preventDefault();
        let id = $('#' + e.target.id).data('id');
        let featured = $('#' + e.target.id).data('featured');
        if(featured != 0) {
            $('#progress-bar-div-' + id).hide();
        }
        $('#update-progress-form-div-' + id).hide();
        $('#delete-item-form-div-' + id).show();
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

        if(featured != 0) {
            $.ajax({
                url: '/update/' + id,
                type: 'POST',
                data: {
                    progress: progress
                },
                success: function(data) {
                    $('#update-progress-form-div-' + id).hide();
                    $('#progress-bar-div-' + id).load(' #progress-bar-' + id);
                    $('#progress-bar-div-' + id).show();
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

    $('body').on('click', '.submit-delete-item', function(e) {
        e.preventDefault();
        let id = $('#' + e.target.id).data('id');
        let featured = $('#' + e.target.id).data('featured');

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        
        if(featured != 2) {
            $.ajax({
                url: '/delete/' + id,
                type: 'POST',
                success: function(data) {
                    $('#items').load(' #items');
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    alert("responseText=" + XMLHttpRequest.responseText + "\n textStatus=" + textStatus + "\n errorThrown=" + errorThrown);
                }
            });
        }
        else {
            $.ajax({
                url: '/delete/' + id,
                type: 'POST',
                success: function(data) {
                    window.location.replace("/");
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    alert("responseText=" + XMLHttpRequest.responseText + "\n textStatus=" + textStatus + "\n errorThrown=" + errorThrown);
                }
            });
        }
    });

    $('body').on('click', '.do-not-delete', function(e) {
        e.preventDefault();
        let id = $('#' + e.target.id).data('id');
        let featured = $('#' + e.target.id).data('featured');
        $('#delete-item-form-div-' + id).hide();
        if(featured != 0) {
            $('#progress-bar-div-' + id).show();
        }
    });
});