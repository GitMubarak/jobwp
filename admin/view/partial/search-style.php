<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

//$jobwpSearchStyles = [];
foreach ( $jobwpSearchStyles as $option_name => $option_value ) {
    if ( isset( $jobwpSearchStyles[$option_name] ) ) {
        ${"" . $option_name} = $option_value;
    }
}
?>
<form name="jobwp_search_style_form" role="form" class="form-horizontal" method="post" action="" id="jobwp-search-style-form">
    <table class="jobwp-settings-table">
        <!-- Search Button -->
        <tr>
            <th scope="row" colspan="4">
                <hr><span><?php _e('Search Button', JOBWP_TXT_DOMAIN); ?></span><hr>
            </th>
        </tr>
        <tr>
            <th scope="row">
                <label><?php _e('Background Color', JOBWP_TXT_DOMAIN); ?>:</label>
            </th>
            <td>
                <input class="jobwp-wp-color" type="text" name="jobwp_search_btn_bg_color" id="jobwp_search_btn_bg_color" value="<?php esc_attr_e( $jobwp_search_btn_bg_color ); ?>">
                <div id="colorpicker"></div>
            </td>
            <th scope="row">
                <label><?php _e('Font Color', JOBWP_TXT_DOMAIN); ?>:</label>
            </th>
            <td>
                <input class="jobwp-wp-color" type="text" name="jobwp_search_btn_font_color" id="jobwp_search_btn_font_color" value="<?php esc_attr_e( $jobwp_search_btn_font_color ); ?>">
                <div id="colorpicker"></div>
            </td>
        </tr>
    </table>
    <hr>
    <p class="submit">
        <button id="updateSearchStyles" name="updateSearchStyles" class="button button-primary jobwp-button">
            <i class="fa fa-check-circle" aria-hidden="true"></i>&nbsp;<?php _e('Save Settings', JOBWP_TXT_DOMAIN); ?>
        </button>
    </p>
</form>