(function(window, $) {

    // USE STRICT
    "use strict";

    var frm = document.getElementById('upload_form');
    var msg = '';

    $('#submitBtn').on('click', function(e) {

        e.preventDefault();

        $('span.error-message').hide();

        var fullName = $('input#fullName');
        var email = $('input#email');
        var fileElt = jQuery('input#upload');
        var fileName = fileElt.val();
        var maxSize = 300000;

        if (fullName.val() == '') {
            fail('This field is required', fullName);
            return false;
        }

        if (email.val() == '') {
            fail('This field is required', email);
            return false;
        }

        if (fileName.length == 0) {
            fail('Please select a file.', fileElt);
            return false;
        } else if (!/\.(docs|pdf)$/.test(fileName)) {
            fail('Only Pdf file is permitted.', fileElt);
            return false;
        } else {
            var file = fileElt.get(0).files[0];
            if (file.size > maxSize) {
                fail('The file is too large. The maximum size is ' + maxSize + ' bytes.', fileElt);
                return false;
            } else {
                frm.submit();
            }
        }

    });

    function fail(msg, field) {
        $('<span class="error-message">' + msg + '</span>').insertAfter(field);
        field.focus();
    };

})(window, jQuery);