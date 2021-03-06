<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

//$jobwpSingleStyles = [];
foreach ( $jobwpSingleStyles as $option_name => $option_value ) {
    if ( isset( $jobwpSingleStyles[$option_name] ) ) {
        ${"" . $option_name} = $option_value;
    }
}
?>
<form name="jobwp_single_style_form" role="form" class="form-horizontal" method="post" action="" id="jobwp-single-style-form">
    <table class="jobwp-single-style-settings-table">
        <!-- Title -->
        <tr>
            <th scope="row" colspan="2">
                <hr><span><?php _e('Job Title', JOBWP_TXT_DOMAIN); ?></span><hr>
            </th>
        </tr>
        <tr>
            <th scope="row">
                <label><?php _e('Font Color', JOBWP_TXT_DOMAIN); ?>:</label>
            </th>
            <td>
                <input class="jobwp-wp-color" type="text" name="jobwp_single_title_font_color" id="jobwp_single_title_font_color" value="<?php esc_attr_e( $jobwp_single_title_font_color ); ?>">
                <div id="colorpicker"></div>
            </td>
        </tr>
        <tr>
            <th scope="row">
                <label><?php _e('Font Size', JOBWP_TXT_DOMAIN); ?>:</label>
            </th>
            <td>
                <input type="number" class="small-text" min="11" max="50" name="jobwp_single_title_font_size" id="jobwp_single_title_font_size" value="<?php esc_attr_e( $jobwp_single_title_font_size ); ?>">
                <code>px</code>
            </td>
        </tr>
    </table>
    <hr>
    <p class="submit"><button id="updateSingleStyles" name="updateSingleStyles" class="button button-primary jobwp-button"><?php _e('Save Settings', JOBWP_TXT_DOMAIN); ?></button></p>
</form>