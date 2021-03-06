(function(window, $) {

    // USE STRICT
    "use strict";

    $(document).on('click', '.jobwp-trigger-link', function(event) {
        event.preventDefault();
        $('#jobwp-apply-form-modal').iziModal('open');
        $('input#jobwp_full_name').val('');
        $('input#jobwp_email').val('');
        $('textarea#jobwp_cover_letter').val('');
        $('input#jobwp_upload_resume').val('');
        $('span.error-message').html('');
    });

    $("#jobwp-apply-form-modal").iziModal({
        // options here
    });

    $('#jobwp_apply_btn').on('click', function(e) {

        e.preventDefault();

        var frm = document.getElementById('jobwp_upload_form');
        var msg = '';

        $('span.error-message').hide();

        var fullName = $('input#jobwp_full_name');
        var email = $('input#jobwp_email');
        var fileElt = $('input#jobwp_upload_resume');
        var fileName = fileElt.val();
        var maxSize = 2000000;

        if (fullName.val() == '') {
            fail('This field is required', fullName);
            return false;
        }

        if (email.val() == '') {
            fail('This field is required', email);
            return false;
        }

        if (!jobwp_validate_email(email.val())) {
            fail('Please Enter Valid Email', email);
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

    function jobwp_validate_email($email) {
        var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,6})?$/;
        return emailReg.test($email);
    }

})(window, jQuery);