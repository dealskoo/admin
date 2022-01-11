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
                    $('.avatar-pic').attr('src', data.url);
                }
            });
        }
    });
}(window.jQuery);
