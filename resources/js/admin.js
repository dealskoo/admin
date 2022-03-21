!function ($) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('.upload-button').on('click', function () {
        $('.file-upload').click();
    });

    $('.file-upload').on('change', function (e) {
        if (e.target.files && e.target.files[0]) {
            let formData = new FormData();
            formData.set('file', e.target.files[0]);
            $.ajax({
                url: $(this).data('action'),
                enctype: 'multipart/form-data',
                data: formData,
                type: 'POST',
                processData: false,
                contentType: false,
                success: function (data) {
                    $('.avatar-pic').attr('src', data.url + "?t=" + (new Date().getTime()));
                }
            });
        }
    });

    $('.upload-btn').on('click', function () {
        $('.file-input').click();
    });

    $('.file-input').on('change', function (e) {
        if (e.target.files && e.target.files[0]) {
            let reader = new FileReader();
            reader.onload = function (event) {
                let dataUrl = reader.result;
                $('.file-pic').attr('src', dataUrl);
            };
            reader.readAsDataURL(e.target.files[0]);
        }
    });

    window.delete_listener = function () {
        $('.delete-btn').on('click', function (e) {
            let table = $('#' + $(this).data('table'));
            let url = $(this).data('url');
            $.ajax({
                url: url,
                type: 'DELETE',
                processData: false,
                contentType: false,
                success: function (data) {
                    table.DataTable().ajax.reload();
                }
            });
        });
    };

    $('.tag-input').parents('form').on('keypress', function (event) {
        return event.keyCode != 13;
    });

    $('.tag-input').on('keyup', function (e) {
        if (e.key === 'Enter' || e.keyCode === 13) {
            let tag = $(this).val().toLowerCase();
            let tags = $("input[name='tags[]']").map(function () {
                return $(this).val();
            }).get();
            $(this).val('');
            if ($.inArray(tag, tags) === -1) {
                let tag_html = '<div class="badge bg-primary rounded-pill position-relative me-2 mt-2 tag-badge">' + tag + '<input type="hidden" name="tags[]" value="' + tag + '"><span class="position-absolute top-0 start-100 translate-middle bg-danger border border-light rounded-circle mdi mdi-close tag-remove"></span></div>';
                $('.tags-box').append(tag_html);
            }
        }
    });

    $('body').on('click', '.tag-remove', function (e) {
        $(this).parents('.tag-badge').remove();
    });
}(window.jQuery);
