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
    <table class="hm-settings-table jobwp-settings-table" cellpadding="0" cellspacing="0">
        <!-- Container -->
        <tr class="jobwp-settings-section">
            <td colspan="6" class="jobwp-settings-block-title"><i class="fa-regular fa-square-full"></i>&nbsp;<?php _e('Container', 'jobwp'); ?></td>
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
        <?php
        echo '<tr><td colspan="6" style="padding:0;"></td></tr>';
        $jobwp_upgrade_arr = [
            'label'     => 'Layout Column Width',
            'icon'      => 'fa-solid fa-palette',
            'message'   => "Control left side, right side column width of the details page - applicable only for the Horizontal layout",
            'colspan'   => 4
        ];

        $this->jobwp_upgrade_to_premium_section( $jobwp_upgrade_arr );

        if ( job_fs()->is_plan__premium_only('pro', true) ) {
            ?>
            <tr>
                <th scope="row">
                    <label><?php _e('Layout Column Width', 'jobwp'); ?>:</label>
                </th>
                <td colspan="5">
                    <input type="number" class="small-text" min="20" max="50" name="jobwp_single_info_column_left_width" id="jobwp_single_info_column_left_width" 
                        value="<?php esc_attr_e( $jobwp_single_info_column_left_width ); ?>">
                    <?php _e('Left Column', 'jobwp'); ?>&nbsp;&nbsp;
                    <input type="number" class="small-text" min="20" max="80" name="jobwp_single_info_column_right_width" id="jobwp_single_info_column_right_width" 
                        value="<?php esc_attr_e( $jobwp_single_info_column_right_width ); ?>">
                    <?php _e('Right Column', 'jobwp'); ?>&nbsp;
                    <code>(100%)</code>
                    <span><?php _e('Applicable only for the Horizontal layout', 'jobwp'); ?></span>
                </td>
            </tr>
            <?php
        }
        ?>
        <!-- Job Title -->
        <tr class="jobwp-settings-section">
            <td colspan="6" class="jobwp-settings-block-title"><i class="fa-solid fa-t"></i>&nbsp;<?php _e('Job Title', 'jobwp'); ?></td>
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
        <tr class="jobwp-settings-section">
            <td colspan="6" class="jobwp-settings-block-title"><i class="fa-solid fa-list"></i>&nbsp;<?php _e('Job Info', 'jobwp'); ?></td>
        </tr>
        <tr>
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
            <td colspan="3">
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
            <td colspan="3">
                <input type="number" class="small-text" min="11" max="50" name="jobwp_single_info_font_size" id="jobwp_single_info_font_size" value="<?php esc_attr_e( $jobwp_single_info_font_size ); ?>">
                <code>px</code>
            </td>
        </tr>
        <!-- How to Apply -->
        <tr class="jobwp-settings-section">
            <td colspan="6" class="jobwp-settings-block-title"><i class="fa-regular fa-file-lines"></i>&nbsp;<?php _e('How to Apply', 'jobwp'); ?></td>
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
        <tr class="jobwp-settings-section">
            <td colspan="6" class="jobwp-settings-block-title"><i class="fa-regular fa-file-lines"></i>&nbsp;<?php _e('Apply Button', 'jobwp'); ?></td>
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
        <tr>
            <th scope="row">
                <label><?php _e('Hover Background Color', 'jobwp'); ?>:</label>
            </th>
            <td>
                <input class="jobwp-wp-color" type="text" name="jobwp_single_apply_btn_bg_clr_hvr" id="jobwp_single_apply_btn_bg_clr_hvr" value="<?php esc_attr_e( $jobwp_single_apply_btn_bg_clr_hvr ); ?>">
                <div id="colorpicker"></div>
            </td>
            <th scope="row">
                <label><?php _e('Hover Border Color', 'jobwp'); ?>:</label>
            </th>
            <td>
                <input class="jobwp-wp-color" type="text" name="jobwp_single_apply_btn_brdr_clr_hvr" id="jobwp_single_apply_btn_brdr_clr_hvr" value="<?php esc_attr_e( $jobwp_single_apply_btn_brdr_clr_hvr ); ?>">
                <div id="colorpicker"></div>
            </td>
            <th scope="row">
                <label><?php _e('Hover Font Color', 'jobwp'); ?>:</label>
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