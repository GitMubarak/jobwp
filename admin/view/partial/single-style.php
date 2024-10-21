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
    <table class="jobwp-settings-table">
        <!-- Container -->
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
                <input class="jobwp-wp-color" type="text" name="jobwp_single_container_bg_color" id="jobwp_single_container_bg_color" value="<?php esc_attr_e( $jobwp_single_container_bg_color ); ?>">
                <div id="colorpicker"></div>
            </td>
            <th scope="row">
                <label><?php _e('Margin Top', JOBWP_TXT_DOMAIN); ?>:</label>
            </th>
            <td>
                <input type="number" class="small-text" min="0" max="400" name="jobwp_single_container_margin_top" id="jobwp_single_container_margin_top" value="<?php esc_attr_e( $jobwp_single_container_margin_top ); ?>">
                <code>px</code>
            </td>
            <th scope="row">
                <label><?php _e('Margin Bottom', JOBWP_TXT_DOMAIN); ?>:</label>
            </th>
            <td>
                <input type="number" class="small-text" min="0" max="400" name="jobwp_single_container_margin_btm" id="jobwp_single_container_margin_btm" value="<?php esc_attr_e( $jobwp_single_container_margin_btm ); ?>">
                <code>px</code>
            </td>
        </tr>
        <!-- Title -->
        <tr>
            <th scope="row" colspan="6" style="text-align: left;">
                <hr><span><?php _e('Job Title', JOBWP_TXT_DOMAIN); ?></span><hr>
            </th>
        </tr>
        <tr>
            <th scope="row">
                <label><?php _e('Background Color', JOBWP_TXT_DOMAIN); ?>:</label>
            </th>
            <td>
                <input class="jobwp-wp-color" type="text" name="jobwp_single_title_bg_color" id="jobwp_single_title_bg_color" value="<?php esc_attr_e( $jobwp_single_title_bg_color ); ?>">
                <div id="colorpicker"></div>
            </td>
            <th scope="row">
                <label><?php _e('Font Color', JOBWP_TXT_DOMAIN); ?>:</label>
            </th>
            <td>
                <input class="jobwp-wp-color" type="text" name="jobwp_single_title_font_color" id="jobwp_single_title_font_color" value="<?php esc_attr_e( $jobwp_single_title_font_color ); ?>">
                <div id="colorpicker"></div>
            </td>
            <th scope="row">
                <label><?php _e('Font Size', JOBWP_TXT_DOMAIN); ?>:</label>
            </th>
            <td>
                <input type="number" class="small-text" min="11" max="50" name="jobwp_single_title_font_size" id="jobwp_single_title_font_size" value="<?php esc_attr_e( $jobwp_single_title_font_size ); ?>">
                <code>px</code>
            </td>
        </tr>
        <!-- Job Info -->
        <tr>
            <th scope="row" colspan="6" style="text-align: left;">
                <hr><span><?php _e('Job Info', JOBWP_TXT_DOMAIN); ?></span><hr>
            </th>
        </tr>
        <tr>
            <th scope="row">
                <label><?php _e('Font Color', JOBWP_TXT_DOMAIN); ?>:</label>
            </th>
            <td>
                <input class="jobwp-wp-color" type="text" name="jobwp_single_info_font_color" id="jobwp_single_info_font_color" value="<?php esc_attr_e( $jobwp_single_info_font_color ); ?>">
                <div id="colorpicker"></div>
            </td>
        </tr>
        <!-- How to Apply -->
        <tr>
            <th scope="row" colspan="6" style="text-align: left;">
                <hr><span><?php _e('How to Apply', JOBWP_TXT_DOMAIN); ?></span><hr>
            </th>
        </tr>
        <tr>
            <th scope="row">
                <label><?php _e('Background Color', JOBWP_TXT_DOMAIN); ?>:</label>
            </th>
            <td>
                <input class="jobwp-wp-color" type="text" name="jobwp_single_how_to_apply_bg_color" id="jobwp_single_how_to_apply_bg_color" value="<?php esc_attr_e( $jobwp_single_how_to_apply_bg_color ); ?>">
                <div id="colorpicker"></div>
            </td>
            <th scope="row">
                <label><?php _e('Title Font Color', JOBWP_TXT_DOMAIN); ?>:</label>
            </th>
            <td>
                <input class="jobwp-wp-color" type="text" name="jobwp_single_howtoapply_title_font_clr" id="jobwp_single_howtoapply_title_font_clr" value="<?php esc_attr_e( $jobwp_single_howtoapply_title_font_clr ); ?>">
                <div id="colorpicker"></div>
            </td>
            <th scope="row">
                <label><?php _e('Title Font Size', JOBWP_TXT_DOMAIN); ?>:</label>
            </th>
            <td>
                <input type="number" class="small-text" min="11" max="50" name="jobwp_single_howtoapply_title_font_size" id="jobwp_single_howtoapply_title_font_size" value="<?php esc_attr_e( $jobwp_single_howtoapply_title_font_size ); ?>">
                <code>px</code>
            </td>
        </tr>
        <tr>
            <th scope="row">
                <label><?php _e('Title Border Color', JOBWP_TXT_DOMAIN); ?>:</label>
            </th>
            <td>
                <input class="jobwp-wp-color" type="text" name="jobwp_single_howtoapply_title_brdr_clr" id="jobwp_single_howtoapply_title_brdr_clr" value="<?php esc_attr_e( $jobwp_single_howtoapply_title_brdr_clr ); ?>">
                <div id="colorpicker"></div>
            </td>
        </tr>
        <!-- Apply Button -->
        <tr>
            <th scope="row" colspan="6" style="text-align: left;">
                <hr><span><?php _e('Apply Button', JOBWP_TXT_DOMAIN); ?></span><hr>
            </th>
        </tr>
        <tr>
            <th scope="row">
                <label><?php _e('Button Color', JOBWP_TXT_DOMAIN); ?>:</label>
            </th>
            <td>
                <input class="jobwp-wp-color" type="text" name="jobwp_single_apply_btn_bg_color" id="jobwp_single_apply_btn_bg_color" value="<?php esc_attr_e( $jobwp_single_apply_btn_bg_color ); ?>">
                <div id="colorpicker"></div>
            </td>
            <th scope="row">
                <label><?php _e('Font Size', JOBWP_TXT_DOMAIN); ?>:</label>
            </th>
            <td>
                <input type="number" class="small-text" min="11" max="50" name="jobwp_single_apply_btn_font_size" id="jobwp_single_apply_btn_font_size" value="<?php esc_attr_e( $jobwp_single_apply_btn_font_size ); ?>">
                <code>px</code>
            </td>
            <th scope="row">
                <label><?php _e('Font Color', JOBWP_TXT_DOMAIN); ?>:</label>
            </th>
            <td>
                <input class="jobwp-wp-color" type="text" name="jobwp_single_apply_btn_font_color" id="jobwp_single_apply_btn_font_color" value="<?php esc_attr_e( $jobwp_single_apply_btn_font_color ); ?>">
                <div id="colorpicker"></div>
            </td>
        </tr>
        <tr>
            <th scope="row">
                <label><?php _e('Border Color', JOBWP_TXT_DOMAIN); ?>:</label>
            </th>
            <td>
                <input class="jobwp-wp-color" type="text" name="jobwp_single_apply_btn_border_color" id="jobwp_single_apply_btn_border_color" value="<?php esc_attr_e( $jobwp_single_apply_btn_border_color ); ?>">
                <div id="colorpicker"></div>
            </td>
            <th scope="row">
                <label><?php _e('Padding', JOBWP_TXT_DOMAIN); ?>:</label>
            </th>
            <td>
                <input type="number" class="small-text" min="0" max="50" name="jobwp_single_apply_btn_padding_h" id="jobwp_single_apply_btn_padding_h" value="<?php esc_attr_e( $jobwp_single_apply_btn_padding_h ); ?>">
                <?php _e('Height', JOBWP_TXT_DOMAIN); ?>&nbsp;&nbsp;
                <input type="number" class="small-text" min="0" max="50" name="jobwp_single_apply_btn_padding_w" id="jobwp_single_apply_btn_padding_w" value="<?php esc_attr_e( $jobwp_single_apply_btn_padding_w ); ?>">
                <?php _e('Width', JOBWP_TXT_DOMAIN); ?>&nbsp;
                <code>(px)</code>
            </td>
            <th scope="row">
                <label><?php _e('Border Radius', JOBWP_TXT_DOMAIN); ?>:</label>
            </th>
            <td colspan="5">
                <input type="number" class="small-text" min="0" max="50" name="jobwp_single_apply_btn_brdr_radius" id="jobwp_single_apply_btn_brdr_radius" value="<?php esc_attr_e( $jobwp_single_apply_btn_brdr_radius ); ?>">
                <code>px</code>
            </td>
        </tr>
        <!-- Apply Button: Hover -->
        <tr>
            <th scope="row" colspan="6" style="text-align: left;">
                <hr><span><?php _e('Apply Button: Hover', JOBWP_TXT_DOMAIN); ?></span><hr>
            </th>
        </tr>
        <tr>
            <th scope="row">
                <label><?php _e('Background Color', JOBWP_TXT_DOMAIN); ?>:</label>
            </th>
            <td>
                <input class="jobwp-wp-color" type="text" name="jobwp_single_apply_btn_bg_clr_hvr" id="jobwp_single_apply_btn_bg_clr_hvr" value="<?php esc_attr_e( $jobwp_single_apply_btn_bg_clr_hvr ); ?>">
                <div id="colorpicker"></div>
            </td>
            <th scope="row">
                <label><?php _e('Border Color', JOBWP_TXT_DOMAIN); ?>:</label>
            </th>
            <td>
                <input class="jobwp-wp-color" type="text" name="jobwp_single_apply_btn_brdr_clr_hvr" id="jobwp_single_apply_btn_brdr_clr_hvr" value="<?php esc_attr_e( $jobwp_single_apply_btn_brdr_clr_hvr ); ?>">
                <div id="colorpicker"></div>
            </td>
            <th scope="row">
                <label><?php _e('Font Color', JOBWP_TXT_DOMAIN); ?>:</label>
            </th>
            <td>
                <input class="jobwp-wp-color" type="text" name="jobwp_single_apply_btn_font_clr_hvr" id="jobwp_single_apply_btn_font_clr_hvr" value="<?php esc_attr_e( $jobwp_single_apply_btn_font_clr_hvr ); ?>">
                <div id="colorpicker"></div>
            </td>
        </tr>
    </table>
    <hr>
    <p class="submit"><button id="updateSingleStyles" name="updateSingleStyles" class="button button-primary jobwp-button"><?php _e('Save Settings', JOBWP_TXT_DOMAIN); ?></button></p>
</form>