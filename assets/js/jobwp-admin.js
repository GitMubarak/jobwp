(function($) {

    // USE STRICT
    "use strict";

    var jobwpColorPicker = [
        '#jobwp_single_container_bg_color',
        '#jobwp_single_info_font_color',
        '#jobwp_listing_title_font_color',
        '#jobwp_listing_overview_font_color',
        '#jobwp_listing_info_font_color',
        '#jobwp_single_title_font_color',
        '#jobwp_single_apply_btn_bg_color',
        '#jobwp_apply_form_bg_color',
        '#jobwp_apply_form_title_color',
        '#jobwp_apply_form_label_color',
        '#jobwp_apply_form_input_color',
        '#jobwp_apply_form_input_bg_color',
        '#jobwp_apply_form_input_border_color',
        '#jobwp_apply_form_btn_bg_color',
        '#jobwp_apply_form_btn_font_color',
        '#jobwp_apply_form_btn_hvr_bg_color',
        '#jobwp_apply_form_btn_hvr_font_color',
        '#jobwp_listing_item_border_color',
        '#jobwp_listing_item_bg_color',
        '#jobwp_single_title_bg_color',
        '#jobwp_single_how_to_apply_bg_color',
        '#jobwp_search_btn_bg_color',
        '#jobwp_search_btn_font_color',
        '#jobwp_search_btn_bg_color_hvr',
        '#jobwp_search_btn_font_color_hvr',
        '#jobwp_search_container_bg_color',
        '#jobwp_search_container_border_color',
        '#jobwp_search_item_bg_color',
        '#jobwp_search_item_border_color',
        '#jobwp_pagination_font_color',
        '#jobwp_pagination_border_color',
        '#jobwp_hover_bg_color',
        '#jobwp_hover_font_color',
        '#jobwp_pagination_bg_color',
        '#jobwp_single_apply_btn_font_color',
        '#jobwp_single_apply_btn_border_color',
        '#jobwp_single_apply_btn_bg_clr_hvr',
        '#jobwp_single_apply_btn_brdr_clr_hvr',
        '#jobwp_single_apply_btn_font_clr_hvr',
        '#jobwp_single_howtoapply_title_font_clr',
        '#jobwp_single_howtoapply_title_brdr_clr',
        '#jobwp_single_howtoapply_content_clr',
        '#jobwp_single_info_lbl_font_color',
        '#jobwp_list_com_font_color',
        '#jobwp_read_more_bg_color',
        '#jobwp_read_more_font_color',
        '#jobwp_read_more_border_color',
        '#jobwp_read_more_bg_color_hvr',
        '#jobwp_read_more_font_color_hvr',
        '#jobwp_read_more_border_color_hvr',
        '#jobwp_listing_title_font_color_hvr',
        '#jobwp_reset_btn_bg_color',
        '#jobwp_reset_btn_font_color'
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

    var aw_uploader = '';
    $("#jobwp_company_logo_button_remove").hide();

    //alert('Hi');
    $('body').on('click', '#jobwp_company_logo_button_add', function(e) {
        //alert('Hello');
        e.preventDefault();
        aw_uploader = wp.media({
                title: 'JobWP Company Logo',
                button: {
                    text: 'Use this logo'
                },
                multiple: false
            }).on('select', function() {
                var attachment = aw_uploader.state().get('selection').first().toJSON();
                $('#jobwp_company_logo_wrapper').html('');
                $('#jobwp_company_logo_wrapper').html(
                    "<img src=" + attachment.url + " style='width: 200px'>"
                );
                $('#jobwp_company_logo_id').val(attachment.url);
                $("#jobwp_company_logo_button_add").hide();
                $("#jobwp_company_logo_button_remove").show();
            })
            .open();
    });

    $("#jobwp_company_logo_button_remove").click(function() {
        $('#jobwp_company_logo_wrapper').html('');
        $('#jobwp_company_logo_id').val('');
        $(this).hide();
        $("#jobwp_company_logo_button_add").show();
    });

    $(document).ready(function() {
        $("#btnExport").on('click', function() {
            var table = document.getElementsByTagName("table");
            //debugger;
            TableToExcel.convert(table[0], {
                name: `application-list.xlsx`,
                sheet: {
                    name: 'ApplicationList'
                }
            });
        });
    });

})(jQuery);