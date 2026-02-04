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
<?php wp_nonce_field( 'jobwp_single_style_action', 'jobwp_single_style_nonce' ); ?>
    <table class="jobwp-settings-table">
        <!-- Container -->
        <tr>
            <th scope="row" colspan="6" style="text-align: left;">
                <hr><span><?php _e('Container', 'jobwp'); ?></span><hr>
            </th>
        </tr>
        <tr>
            <th scope="row">
                <label><?php _e('Background Color', 'jobwp'); ?>:</label>
            </th>
            <td>
                <input class="jobwp-wp-color" type="text" name="jobwp_single_container_bg_color" id="jobwp_single_container_bg_color" value="<?php esc_attr_e( $jobwp_single_container_bg_color ); ?>">
                <div id="colorpicker"></div>
            </td>
            <th scope="row">
                <label><?php _e('Margin Top', 'jobwp'); ?>:</label>
            </th>
            <td>
                <input type="number" class="small-text" min="0" max="400" name="jobwp_single_container_margin_top" id="jobwp_single_container_margin_top" value="<?php esc_attr_e( $jobwp_single_container_margin_top ); ?>">
                <code>px</code>
            </td>
            <th scope="row">
                <label><?php _e('Margin Bottom', 'jobwp'); ?>:</label>
            </th>
            <td>
                <input type="number" class="small-text" min="0" max="400" name="jobwp_single_container_margin_btm" id="jobwp_single_container_margin_btm" value="<?php esc_attr_e( $jobwp_single_container_margin_btm ); ?>">
                <code>px</code>
            </td>
        </tr>
        <!-- Title -->
        <tr>
            <th scope="row" colspan="6" style="text-align: left;">
                <hr><span><?php _e('Job Title', 'jobwp'); ?></span><hr>
            </th>
        </tr>
        <tr>
            <th scope="row">
                <label><?php _e('Background Color', 'jobwp'); ?>:</label>
            </th>
            <td>
                <input class="jobwp-wp-color" type="text" name="jobwp_single_title_bg_color" id="jobwp_single_title_bg_color" value="<?php esc_attr_e( $jobwp_single_title_bg_color ); ?>">
                <div id="colorpicker"></div>
            </td>
            <th scope="row">
                <label><?php _e('Font Color', 'jobwp'); ?>:</label>
            </th>
            <td>
                <input class="jobwp-wp-color" type="text" name="jobwp_single_title_font_color" id="jobwp_single_title_font_color" value="<?php esc_attr_e( $jobwp_single_title_font_color ); ?>">
                <div id="colorpicker"></div>
            </td>
            <th scope="row">
                <label><?php _e('Font Size', 'jobwp'); ?>:</label>
            </th>
            <td>
                <input type="number" class="small-text" min="11" max="50" name="jobwp_single_title_font_size" id="jobwp_single_title_font_size" value="<?php esc_attr_e( $jobwp_single_title_font_size ); ?>">
                <code>px</code>
            </td>
        </tr>
        <!-- Job Info -->
        <tr>
            <th scope="row" colspan="6" style="text-align: left;">
                <hr><span><?php _e('Job Info', 'jobwp'); ?></span><hr>
            </th>
        </tr>
        <tr>
            <th scope="row">
                <label><?php _e('Column Width', 'jobwp'); ?>:</label>
            </th>
            <td>
                <?php
                if ( ! job_fs()->is_plan__premium_only('pro', true) ) {
                    ?>
                    <span><?php echo '<a href="' . job_fs()->get_upgrade_url() . '">' . __('Available in Professional', 'jobwp') . '</a>'; ?></span>
                    <?php
                }

                if ( job_fs()->is_plan__premium_only('pro', true) ) {
                    ?>
                    <input type="number" class="small-text" min="20" max="50" name="jobwp_single_info_column_left_width" id="jobwp_single_info_column_left_width" value="<?php esc_attr_e( $jobwp_single_info_column_left_width ); ?>">
                    <?php _e('Left', 'jobwp'); ?>&nbsp;&nbsp;
                    <input type="number" class="small-text" min="20" max="80" name="jobwp_single_info_column_right_width" id="jobwp_single_info_column_right_width" value="<?php esc_attr_e( $jobwp_single_info_column_right_width ); ?>">
                    <?php _e('Right', 'jobwp'); ?>&nbsp;
                    <code>(100%)</code>
                    <?php
                }
                ?>
            </td>
            <th scope="row">
                <label><?php _e('Label Font Color', 'jobwp'); ?>:</label>
            </th>
            <td>
                <input class="jobwp-wp-color" type="text" name="jobwp_single_info_lbl_font_color" id="jobwp_single_info_lbl_font_color" value="<?php esc_attr_e( $jobwp_single_info_lbl_font_color ); ?>">
                <div id="colorpicker"></div>
            </td>
            <th scope="row">
                <label><?php _e('Label Font Size', 'jobwp'); ?>:</label>
            </th>
            <td>
                <input type="number" class="small-text" min="11" max="50" name="jobwp_single_info_lbl_font_size" id="jobwp_single_info_lbl_font_size" value="<?php esc_attr_e( $jobwp_single_info_lbl_font_size ); ?>">
                <code>px</code>
            </td>
        </tr>
        <tr>
            <th scope="row">
                <label><?php _e('Info Font Color', 'jobwp'); ?>:</label>
            </th>
            <td>
                <input class="jobwp-wp-color" type="text" name="jobwp_single_info_font_color" id="jobwp_single_info_font_color" value="<?php esc_attr_e( $jobwp_single_info_font_color ); ?>">
                <div id="colorpicker"></div>
            </td>
            <th scope="row">
                <label><?php _e('Info Font Size', 'jobwp'); ?>:</label>
            </th>
            <td>
                <input type="number" class="small-text" min="11" max="50" name="jobwp_single_info_font_size" id="jobwp_single_info_font_size" value="<?php esc_attr_e( $jobwp_single_info_font_size ); ?>">
                <code>px</code>
            </td>
        </tr>
        <!-- How to Apply -->
        <tr>
            <th scope="row" colspan="6" style="text-align: left;">
                <hr><span><?php _e('How to Apply', 'jobwp'); ?></span><hr>
            </th>
        </tr>
        <tr>
            <th scope="row">
                <label><?php _e('Background Color', 'jobwp'); ?>:</label>
            </th>
            <td>
                <input class="jobwp-wp-color" type="text" name="jobwp_single_how_to_apply_bg_color" id="jobwp_single_how_to_apply_bg_color" value="<?php esc_attr_e( $jobwp_single_how_to_apply_bg_color ); ?>">
                <div id="colorpicker"></div>
            </td>
            <th scope="row">
                <label><?php _e('Title Font Color', 'jobwp'); ?>:</label>
            </th>
            <td>
                <input class="jobwp-wp-color" type="text" name="jobwp_single_howtoapply_title_font_clr" id="jobwp_single_howtoapply_title_font_clr" value="<?php esc_attr_e( $jobwp_single_howtoapply_title_font_clr ); ?>">
                <div id="colorpicker"></div>
            </td>
            <th scope="row">
                <label><?php _e('Title Font Size', 'jobwp'); ?>:</label>
            </th>
            <td>
                <input type="number" class="small-text" min="11" max="50" name="jobwp_single_howtoapply_title_font_size" id="jobwp_single_howtoapply_title_font_size" value="<?php esc_attr_e( $jobwp_single_howtoapply_title_font_size ); ?>">
                <code>px</code>
            </td>
        </tr>
        <tr>
            <th scope="row">
                <label><?php _e('Title Border Color', 'jobwp'); ?>:</label>
            </th>
            <td>
                <input class="jobwp-wp-color" type="text" name="jobwp_single_howtoapply_title_brdr_clr" id="jobwp_single_howtoapply_title_brdr_clr" value="<?php esc_attr_e( $jobwp_single_howtoapply_title_brdr_clr ); ?>">
                <div id="colorpicker"></div>
            </td>
            <th scope="row">
                <label><?php _e('Content Color', 'jobwp'); ?>:</label>
            </th>
            <td>
                <input class="jobwp-wp-color" type="text" name="jobwp_single_howtoapply_content_clr" id="jobwp_single_howtoapply_content_clr" value="<?php esc_attr_e( $jobwp_single_howtoapply_content_clr ); ?>">
                <div id="colorpicker"></div>
            </td>
            <th scope="row">
                <label><?php _e('Content Size', 'jobwp'); ?>:</label>
            </th>
            <td>
                <input type="number" class="small-text" min="11" max="50" name="jobwp_single_howtoapply_content_size" id="jobwp_single_howtoapply_content_size" value="<?php esc_attr_e( $jobwp_single_howtoapply_content_size ); ?>">
                <code>px</code>
            </td>
        </tr>
        <!-- Apply Button -->
        <tr>
            <th scope="row" colspan="6" style="text-align: left;">
                <hr><span><?php _e('Apply Button', 'jobwp'); ?></span><hr>
            </th>
        </tr>
        <tr>
            <th scope="row">
                <label><?php _e('Button Color', 'jobwp'); ?>:</label>
            </th>
            <td>
                <input class="jobwp-wp-color" type="text" name="jobwp_single_apply_btn_bg_color" id="jobwp_single_apply_btn_bg_color" value="<?php esc_attr_e( $jobwp_single_apply_btn_bg_color ); ?>">
                <div id="colorpicker"></div>
            </td>
            <th scope="row">
                <label><?php _e('Font Size', 'jobwp'); ?>:</label>
            </th>
            <td>
                <input type="number" class="small-text" min="11" max="50" name="jobwp_single_apply_btn_font_size" id="jobwp_single_apply_btn_font_size" value="<?php esc_attr_e( $jobwp_single_apply_btn_font_size ); ?>">
                <code>px</code>
            </td>
            <th scope="row">
                <label><?php _e('Font Color', 'jobwp'); ?>:</label>
            </th>
            <td>
                <input class="jobwp-wp-color" type="text" name="jobwp_single_apply_btn_font_color" id="jobwp_single_apply_btn_font_color" value="<?php esc_attr_e( $jobwp_single_apply_btn_font_color ); ?>">
                <div id="colorpicker"></div>
            </td>
        </tr>
        <tr>
            <th scope="row">
                <label><?php _e('Border Color', 'jobwp'); ?>:</label>
            </th>
            <td>
                <input class="jobwp-wp-color" type="text" name="jobwp_single_apply_btn_border_color" id="jobwp_single_apply_btn_border_color" value="<?php esc_attr_e( $jobwp_single_apply_btn_border_color ); ?>">
                <div id="colorpicker"></div>
            </td>
            <th scope="row">
                <label><?php _e('Padding', 'jobwp'); ?>:</label>
            </th>
            <td>
                <input type="number" class="small-text" min="0" max="50" name="jobwp_single_apply_btn_padding_h" id="jobwp_single_apply_btn_padding_h" value="<?php esc_attr_e( $jobwp_single_apply_btn_padding_h ); ?>">
                <?php _e('Height', 'jobwp'); ?>&nbsp;&nbsp;
                <input type="number" class="small-text" min="0" max="50" name="jobwp_single_apply_btn_padding_w" id="jobwp_single_apply_btn_padding_w" value="<?php esc_attr_e( $jobwp_single_apply_btn_padding_w ); ?>">
                <?php _e('Width', 'jobwp'); ?>&nbsp;
                <code>(px)</code>
            </td>
            <th scope="row">
                <label><?php _e('Border Radius', 'jobwp'); ?>:</label>
            </th>
            <td colspan="5">
                <input type="number" class="small-text" min="0" max="50" name="jobwp_single_apply_btn_brdr_radius" id="jobwp_single_apply_btn_brdr_radius" value="<?php esc_attr_e( $jobwp_single_apply_btn_brdr_radius ); ?>">
                <code>px</code>
            </td>
        </tr>
        <!-- Apply Button: Hover -->
        <tr>
            <th scope="row" colspan="6" style="text-align: left;">
                <hr><span><?php _e('Apply Button: Hover', 'jobwp'); ?></span><hr>
            </th>
        </tr>
        <tr>
            <th scope="row">
                <label><?php _e('Background Color', 'jobwp'); ?>:</label>
            </th>
            <td>
                <input class="jobwp-wp-color" type="text" name="jobwp_single_apply_btn_bg_clr_hvr" id="jobwp_single_apply_btn_bg_clr_hvr" value="<?php esc_attr_e( $jobwp_single_apply_btn_bg_clr_hvr ); ?>">
                <div id="colorpicker"></div>
            </td>
            <th scope="row">
                <label><?php _e('Border Color', 'jobwp'); ?>:</label>
            </th>
            <td>
                <input class="jobwp-wp-color" type="text" name="jobwp_single_apply_btn_brdr_clr_hvr" id="jobwp_single_apply_btn_brdr_clr_hvr" value="<?php esc_attr_e( $jobwp_single_apply_btn_brdr_clr_hvr ); ?>">
                <div id="colorpicker"></div>
            </td>
            <th scope="row">
                <label><?php _e('Font Color', 'jobwp'); ?>:</label>
            </th>
            <td>
                <input class="jobwp-wp-color" type="text" name="jobwp_single_apply_btn_font_clr_hvr" id="jobwp_single_apply_btn_font_clr_hvr" value="<?php esc_attr_e( $jobwp_single_apply_btn_font_clr_hvr ); ?>">
                <div id="colorpicker"></div>
            </td>
        </tr>
    </table>
    <hr>
    <p class="submit"><button id="updateSingleStyles" name="updateSingleStyles" class="button button-primary jobwp-button"><?php _e('Save Settings', 'jobwp'); ?></button></p>
</form>