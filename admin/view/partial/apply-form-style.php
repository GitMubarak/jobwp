<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

//$jobwpApplyFormStyle = [];
//print_r($jobwpApplyFormStyle);
foreach ( $jobwpApplyFormStyle as $fs_name => $fs_value ) {
    if ( isset( $jobwpApplyFormStyle[$fs_name] ) ) {
        ${"" . $fs_name} = $fs_value;
    }
}
?>
<form name="jobwp_apply_form_style_form" role="form" class="form-horizontal" method="post" action="" id="jobwp-apply-form-style-form">
<?php wp_nonce_field( 'jobwp_apply_form_style_action', 'jobwp_apply_form_style_nonce' ); ?>
    <table class="hm-settings-table jobwp-single-style-settings-table" cellpadding="0" cellspacing="0">
        <?php
        $jobwp_upgrade_arr = [
            'label'     => 'Apply Form Styling Settings',
            'icon'      => 'fa-solid fa-palette',
            'message'   => "Customise every visual aspect of your application form — background colour, field styles, label fonts, button colours, hover states, and border radius — to match your brand perfectly.",
        ];

        $this->jobwp_upgrade_to_premium_section( $jobwp_upgrade_arr );

        if ( job_fs()->is_plan__premium_only('pro', true) ) {
            ?>
            <!-- Form Container -->
            <tr class="jobwp-settings-section">
                <td colspan="4" class="jobwp-settings-block-title"><i class="fa-regular fa-square-minus"></i>&nbsp;<?php _e('Form Container', 'jobwp'); ?></td>
            </tr>
            <tr>
                <th scope="row">
                    <label><?php _e('Background Color', 'jobwp'); ?></label>
                </th>
                <td colspan="3">
                    <input class="jobwp-wp-color" type="text" name="jobwp_apply_form_bg_color" id="jobwp_apply_form_bg_color" 
                        value="<?php esc_attr_e( $jobwp_apply_form_bg_color ); ?>">
                    <div id="colorpicker"></div>
                </td>
            </tr>
            <!-- Form Title -->
            <tr class="jobwp-settings-section">
                <td colspan="4" class="jobwp-settings-block-title"><i class="fa-solid fa-table-columns"></i>&nbsp;<?php _e('Form Title', 'jobwp'); ?></td>
            </tr>
            <tr>
                <th scope="row">
                    <label><?php _e('Color', 'jobwp'); ?></label>
                </th>
                <td>
                    <input class="jobwp-wp-color" type="text" name="jobwp_apply_form_title_color" id="jobwp_apply_form_title_color" 
                        value="<?php esc_attr_e( $jobwp_apply_form_title_color ); ?>">
                    <div id="colorpicker"></div>
                </td>
                <th scope="row">
                    <label><?php _e('Font Size', 'jobwp'); ?></label>
                </th>
                <td>
                    <input type="number" min="11" max="60" step="1" name="jobwp_apply_form_title_font_size" value="<?php esc_attr_e( $jobwp_apply_form_title_font_size ); ?>">
                </td>
            </tr>
            <!-- Form Label -->
            <tr class="jobwp-settings-section">
                <td colspan="4" class="jobwp-settings-block-title"><i class="fa-solid fa-list"></i>&nbsp;<?php _e('Form Label', 'jobwp'); ?></td>
            </tr>
            <tr>
                <th scope="row">
                    <label><?php _e('Color', 'jobwp'); ?></label>
                </th>
                <td>
                    <input class="jobwp-wp-color" type="text" name="jobwp_apply_form_label_color" id="jobwp_apply_form_label_color" 
                        value="<?php esc_attr_e( $jobwp_apply_form_label_color ); ?>">
                    <div id="colorpicker"></div>
                </td>
                <th scope="row">
                    <label><?php _e('Font Size', 'jobwp'); ?></label>
                </th>
                <td>
                    <input type="number" min="11" max="30" step="1" name="jobwp_apply_form_label_font_size" value="<?php esc_attr_e( $jobwp_apply_form_label_font_size ); ?>">
                </td>
            </tr>
            <!-- Form Inputs -->
            <tr class="jobwp-settings-section">
                <td colspan="4" class="jobwp-settings-block-title"><i class="fa-regular fa-file-lines"></i>&nbsp;<?php _e('Form Inputs', 'jobwp'); ?></td>
            </tr>
            <tr>
                <th scope="row">
                    <label><?php _e('Color', 'jobwp'); ?></label>
                </th>
                <td>
                    <input class="jobwp-wp-color" type="text" name="jobwp_apply_form_input_color" id="jobwp_apply_form_input_color" 
                        value="<?php esc_attr_e( $jobwp_apply_form_input_color ); ?>">
                    <div id="colorpicker"></div>
                </td>
                <th scope="row">
                    <label><?php _e('Font Size', 'jobwp'); ?></label>
                </th>
                <td>
                    <input type="number" min="11" max="30" step="1" name="jobwp_apply_form_input_font_size" value="<?php esc_attr_e( $jobwp_apply_form_input_font_size ); ?>">
                </td>
            </tr>
            <tr>
                <th scope="row">
                    <label><?php _e('Background Color', 'jobwp'); ?></label>
                </th>
                <td>
                    <input class="jobwp-wp-color" type="text" name="jobwp_apply_form_input_bg_color" id="jobwp_apply_form_input_bg_color" value="<?php esc_attr_e( $jobwp_apply_form_input_bg_color ); ?>">
                    <div id="colorpicker"></div>
                </td>
                <th scope="row">
                    <label><?php _e('Border Color', 'jobwp'); ?></label>
                </th>
                <td>
                    <input class="jobwp-wp-color" type="text" name="jobwp_apply_form_input_border_color" id="jobwp_apply_form_input_border_color" value="<?php esc_attr_e( $jobwp_apply_form_input_border_color ); ?>">
                    <div id="colorpicker"></div>
                </td>
            </tr>
            <!-- Apply Button -->
            <tr class="jobwp-settings-section">
                <td colspan="4" class="jobwp-settings-block-title"><i class="fa-solid fa-computer-mouse"></i>&nbsp;<?php _e('Apply Button', 'jobwp'); ?></td>
            </tr>
            <tr>
                <th scope="row">
                    <label><?php _e('Background Color', 'jobwp'); ?></label>
                </th>
                <td colspan="3">
                    <input class="jobwp-wp-color" type="text" name="jobwp_apply_form_btn_bg_color" id="jobwp_apply_form_btn_bg_color" value="<?php esc_attr_e( $jobwp_apply_form_btn_bg_color ); ?>">
                    <div id="colorpicker"></div>
                </td>
            </tr>
            <tr>
                <th scope="row">
                    <label><?php _e('Font Color', 'jobwp'); ?></label>
                </th>
                <td>
                    <input class="jobwp-wp-color" type="text" name="jobwp_apply_form_btn_font_color" id="jobwp_apply_form_btn_font_color" value="<?php esc_attr_e( $jobwp_apply_form_btn_font_color ); ?>">
                    <div id="colorpicker"></div>
                </td>
                <th scope="row">
                    <label><?php _e('Font Size', 'jobwp'); ?></label>
                </th>
                <td>
                    <input type="number" min="11" max="30" step="1" name="jobwp_apply_form_btn_font_size" value="<?php esc_attr_e( $jobwp_apply_form_btn_font_size ); ?>">
                </td>
            </tr>
            <tr>
                <th scope="row">
                    <label><?php _e('Hover Background Color', 'jobwp'); ?></label>
                </th>
                <td>
                    <input class="jobwp-wp-color" type="text" name="jobwp_apply_form_btn_hvr_bg_color" id="jobwp_apply_form_btn_hvr_bg_color" 
                        value="<?php esc_attr_e( $jobwp_apply_form_btn_hvr_bg_color ); ?>">
                    <div id="colorpicker"></div>
                </td>
                <th scope="row">
                    <label><?php _e('Hover Font Color', 'jobwp'); ?></label>
                </th>
                <td colspan="2">
                    <input class="jobwp-wp-color" type="text" name="jobwp_apply_form_btn_hvr_font_color" id="jobwp_apply_form_btn_hvr_font_color" 
                        value="<?php esc_attr_e( $jobwp_apply_form_btn_hvr_font_color ); ?>">
                    <div id="colorpicker"></div>
                </td>
            </tr>
            <?php
        }
        ?>
    </table>
    <hr>
    <p class="submit"><button id="updateApplyFormStyle" name="updateApplyFormStyle" class="button button-primary jobwp-button"><?php _e('Save Settings', 'jobwp'); ?></button></p>
</form>