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
<?php wp_nonce_field( 'jobwp_search_style_action', 'jobwp_search_style_nonce' ); ?>
    <table class="jobwp-settings-table">
        <!-- Search Container -->
        <tr>
            <th scope="row" colspan="6" style="text-align: left;">
                <hr><span><?php _e('Container', JOBWP_TXT_DOMAIN); ?></span><hr>
            </th>
        </tr>
        <tr>
            <th scope="row">
                <label><?php _e('Background Color', JOBWP_TXT_DOMAIN); ?>:</label>
            </th>
            <td>
                <input class="jobwp-wp-color" type="text" name="jobwp_search_container_bg_color" id="jobwp_search_container_bg_color" value="<?php esc_attr_e( $jobwp_search_container_bg_color ); ?>">
                <div id="colorpicker"></div>
            </td>
            <th scope="row">
                <label><?php _e('Border Color', JOBWP_TXT_DOMAIN); ?>:</label>
            </th>
            <td>
                <input class="jobwp-wp-color" type="text" name="jobwp_search_container_border_color" id="jobwp_search_container_border_color" value="<?php esc_attr_e( $jobwp_search_container_border_color ); ?>">
                <div id="colorpicker"></div>
            </td>
        </tr>
        <!-- Search Items -->
        <tr>
            <th scope="row" colspan="6" style="text-align: left;">
                <hr><span><?php _e('Search Items', JOBWP_TXT_DOMAIN); ?></span><hr>
            </th>
        </tr>
        <tr>
            <th scope="row">
                <label><?php _e('Background Color', JOBWP_TXT_DOMAIN); ?>:</label>
            </th>
            <td>
                <input class="jobwp-wp-color" type="text" name="jobwp_search_item_bg_color" id="jobwp_search_item_bg_color" value="<?php esc_attr_e( $jobwp_search_item_bg_color ); ?>">
                <div id="colorpicker"></div>
            </td>
            <th scope="row">
                <label><?php _e('Border Color', JOBWP_TXT_DOMAIN); ?>:</label>
            </th>
            <td>
                <input class="jobwp-wp-color" type="text" name="jobwp_search_item_border_color" id="jobwp_search_item_border_color" value="<?php esc_attr_e( $jobwp_search_item_border_color ); ?>">
                <div id="colorpicker"></div>
            </td>
            <th scope="row">
                <label><?php _e('Font Size', JOBWP_TXT_DOMAIN); ?>:</label>
            </th>
            <td>
                <input type="number" class="small-text" min="11" max="50" name="jobwp_search_item_font_size" id="jobwp_search_item_font_size" value="<?php esc_attr_e( $jobwp_search_item_font_size ); ?>">
                <code>px</code>
            </td>
        </tr>
        <!-- Search Button -->
        <tr>
            <th scope="row" colspan="6" style="text-align: left;">
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
            <th scope="row">
                <label><?php _e('Font Size', JOBWP_TXT_DOMAIN); ?>:</label>
            </th>
            <td>
                <input type="number" class="small-text" min="11" max="50" name="jobwp_search_btn_font_size" id="jobwp_search_btn_font_size" value="<?php esc_attr_e( $jobwp_search_btn_font_size ); ?>">
                <code>px</code>
            </td>
        </tr>
        <!-- Search Button::Hover -->
        <tr>
            <th scope="row" colspan="6" style="text-align: left;">
                <hr><span><?php _e('Search Button :: Hover', JOBWP_TXT_DOMAIN); ?></span><hr>
            </th>
        </tr>
        <tr>
            <th scope="row">
                <label><?php _e('Background Color', JOBWP_TXT_DOMAIN); ?>:</label>
            </th>
            <td>
                <input class="jobwp-wp-color" type="text" name="jobwp_search_btn_bg_color_hvr" id="jobwp_search_btn_bg_color_hvr" value="<?php esc_attr_e( $jobwp_search_btn_bg_color_hvr ); ?>">
                <div id="colorpicker"></div>
            </td>
            <th scope="row">
                <label><?php _e('Font Color', JOBWP_TXT_DOMAIN); ?>:</label>
            </th>
            <td>
                <input class="jobwp-wp-color" type="text" name="jobwp_search_btn_font_color_hvr" id="jobwp_search_btn_font_color_hvr" value="<?php esc_attr_e( $jobwp_search_btn_font_color_hvr ); ?>">
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