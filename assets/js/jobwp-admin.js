(function($) {

    // USE STRICT
    "use strict";

    var jobwpColorPicker = [
        '#jobwp_listing_title_font_color',
        '#jobwp_listing_overview_font_color'
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

})(jQuery);