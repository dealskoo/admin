!function ($) {
    "use strict";

    var ImageUpload = function () {
        this.body = $("body");
    }

    ImageUpload.prototype.init = function () {
        var removeActionUrl = '';
        $('.upload-previews').each(function () {
            var uploadZone = $(this).find('.upload-zone');
            var actionUrl = uploadZone.data('action');
            removeActionUrl = uploadZone.data('remove-action');
            var fileInput = $(this).find('.image-file');
            var previews = $(this);
            uploadZone.on('click', function () {
                fileInput.click();
            });

            fileInput.on('change', function (e) {
                if (e.target.files && e.target.files[0]) {
                    let formData = new FormData();
                    formData.set('file', e.target.files[0]);
                    $.ajax({
                        url: actionUrl,
                        enctype: 'multipart/form-data',
                        data: formData,
                        type: 'POST',
                        processData: false,
                        contentType: false,
                        success: function (data) {
                            var html = '<div class="upload-preview-image"><img src="' + data.url + '?t="' + (new Date().getTime()) + ' class="img-fluid" /><a href="javascript:void(0);" class="remove-image" data-id="' + data.id + '"><i class="uil-times"></i></a></div>';
                            $('.upload-previews').append(html);
                        }
                    });
                }
            });
            $('body').on('click', '.upload-preview-image .remove-image', function (e) {
                var id = $(this).data('id');
                var url = removeActionUrl.replace('id', id);
                $.ajax({
                    url: url,
                    type: 'GET',
                    processData: false,
                    contentType: false,
                    success: function (data) {
                    }
                });
                $(this).parent('.upload-preview-image').remove();
            });
        });
    },
        $.ImageUpload = new ImageUpload, $.ImageUpload.Constructor = ImageUpload;
}(window.jQuery),
    function ($) {
        "use strict";
        $.ImageUpload.init();
    }(window.jQuery);
