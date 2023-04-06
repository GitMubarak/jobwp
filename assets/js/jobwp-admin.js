(function($) {

    // USE STRICT
    "use strict";

    var jobwpColorPicker = [
        '#jobwp_single_container_bg_color',
        '#jobwp_single_info_font_color',
        '#jobwp_listing_title_font_color',
        '#jobwp_listing_overview_font_color',
        '#jobwp_single_title_font_color',
        '#jobwp_single_apply_btn_bg_color'
    ];

    $.each(jobwpColorPicker, function(index, value) {
        $(value).wpColorPicker();
    });

    $("#jobwp_deadline").datepicker({
        dateFormat: "yy-mm-dd",
        changeMonth: true,
        changeYear: true,
    });

    $('.jobwp-closebtn').on('click', function() {
        this.parentElement.style.display = 'none';
    });

    $("span.jobwp-admin-icon")
        .mouseover(function() {
            $(this).next().css('display', 'block');
        })
        .mouseout(function() {
            $(this).next().css('display', 'none');
        });

})(jQuery);