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
    <table class="jobwp-single-style-settings-table">
        <!-- Container -->
        <tr>
            <th scope="row" colspan="4">
                <hr><span><?php _e('Form Container', 'jobwp'); ?></span><hr>
            </th>
        </tr>
        <tr>
            <th scope="row">
                <label><?php _e('Background Color', 'jobwp'); ?>:</label>
            </th>
            <td colspan="3">
                <?php
				if ( ! job_fs()->is_plan__premium_only('pro', true) ) {
					?>
					<span><?php echo '<a href="' . job_fs()->get_upgrade_url() . '">' . __('Please Upgrade Now', 'jobwp') . '</a>'; ?></span>
					<?php
				}

				if ( job_fs()->is_plan__premium_only('pro', true) ) {
					?>
                    <input class="jobwp-wp-color" type="text" name="jobwp_apply_form_bg_color" id="jobwp_apply_form_bg_color" value="<?php esc_attr_e( $jobwp_apply_form_bg_color ); ?>">
                    <div id="colorpicker"></div>
					<?php
				}
				?>
            </td>
        </tr>
        <!-- Form Title -->
        <tr>
            <th scope="row" colspan="4">
                <hr><span><?php _e('Form Title', 'jobwp'); ?></span><hr>
            </th>
        </tr>
        <tr>
            <th scope="row">
                <label><?php _e('Color', 'jobwp'); ?>:</label>
            </th>
            <td>
                <?php
				if ( ! job_fs()->is_plan__premium_only('pro', true) ) {
					?>
					<span><?php echo '<a href="' . job_fs()->get_upgrade_url() . '">' . __('Please Upgrade Now', 'jobwp') . '</a>'; ?></span>
					<?php
				}

				if ( job_fs()->is_plan__premium_only('pro', true) ) {
					?>
                    <input class="jobwp-wp-color" type="text" name="jobwp_apply_form_title_color" id="jobwp_apply_form_title_color" value="<?php esc_attr_e( $jobwp_apply_form_title_color ); ?>">
                    <div id="colorpicker"></div>
					<?php
				}
				?>
            </td>
            <th scope="row">
                <label><?php _e('Font Size', 'jobwp'); ?>:</label>
            </th>
            <td>
                <?php
				if ( ! job_fs()->is_plan__premium_only('pro', true) ) {
					?>
					<span><?php echo '<a href="' . job_fs()->get_upgrade_url() . '">' . __('Please Upgrade Now', 'jobwp') . '</a>'; ?></span>
					<?php
				}

				if ( job_fs()->is_plan__premium_only('pro', true) ) {
					?>
                    <input type="number" min="11" max="60" step="1" name="jobwp_apply_form_title_font_size" value="<?php esc_attr_e( $jobwp_apply_form_title_font_size ); ?>">
					<?php
				}
				?>
            </td>
        </tr>
        <!-- Form Label -->
        <tr>
            <th scope="row" colspan="4">
                <hr><span><?php _e('Form Label', 'jobwp'); ?></span><hr>
            </th>
        </tr>
        <tr>
            <th scope="row">
                <label><?php _e('Color', 'jobwp'); ?>:</label>
            </th>
            <td>
                <?php
				if ( ! job_fs()->is_plan__premium_only('pro', true) ) {
					?>
					<span><?php echo '<a href="' . job_fs()->get_upgrade_url() . '">' . __('Please Upgrade Now', 'jobwp') . '</a>'; ?></span>
					<?php
				}

				if ( job_fs()->is_plan__premium_only('pro', true) ) {
					?>
                    <input class="jobwp-wp-color" type="text" name="jobwp_apply_form_label_color" id="jobwp_apply_form_label_color" value="<?php esc_attr_e( $jobwp_apply_form_label_color ); ?>">
                    <div id="colorpicker"></div>
					<?php
				}
				?>
            </td>
            <th scope="row">
                <label><?php _e('Font Size', 'jobwp'); ?>:</label>
            </th>
            <td>
                <?php
				if ( ! job_fs()->is_plan__premium_only('pro', true) ) {
					?>
					<span><?php echo '<a href="' . job_fs()->get_upgrade_url() . '">' . __('Please Upgrade Now', 'jobwp') . '</a>'; ?></span>
					<?php
				}

				if ( job_fs()->is_plan__premium_only('pro', true) ) {
					?>
                    <input type="number" min="11" max="30" step="1" name="jobwp_apply_form_label_font_size" value="<?php esc_attr_e( $jobwp_apply_form_label_font_size ); ?>">
					<?php
				}
				?>
            </td>
        </tr>
        <!-- Form Inputs -->
        <tr>
            <th scope="row" colspan="4">
                <hr><span><?php _e('Form Inputs', 'jobwp'); ?></span><hr>
            </th>
        </tr>
        <tr>
            <th scope="row">
                <label><?php _e('Color', 'jobwp'); ?>:</label>
            </th>
            <td>
                <?php
				if ( ! job_fs()->is_plan__premium_only('pro', true) ) {
					?>
					<span><?php echo '<a href="' . job_fs()->get_upgrade_url() . '">' . __('Please Upgrade Now', 'jobwp') . '</a>'; ?></span>
					<?php
				}

				if ( job_fs()->is_plan__premium_only('pro', true) ) {
					?>
                    <input class="jobwp-wp-color" type="text" name="jobwp_apply_form_input_color" id="jobwp_apply_form_input_color" value="<?php esc_attr_e( $jobwp_apply_form_input_color ); ?>">
                    <div id="colorpicker"></div>
					<?php
				}
				?>
            </td>
            <th scope="row">
                <label><?php _e('Font Size', 'jobwp'); ?>:</label>
            </th>
            <td>
                <?php
				if ( ! job_fs()->is_plan__premium_only('pro', true) ) {
					?>
					<span><?php echo '<a href="' . job_fs()->get_upgrade_url() . '">' . __('Please Upgrade Now', 'jobwp') . '</a>'; ?></span>
					<?php
				}

				if ( job_fs()->is_plan__premium_only('pro', true) ) {
					?>
                    <input type="number" min="11" max="30" step="1" name="jobwp_apply_form_input_font_size" value="<?php esc_attr_e( $jobwp_apply_form_input_font_size ); ?>">
					<?php
				}
				?>
            </td>
        </tr>
        <tr>
            <th scope="row">
                <label><?php _e('Background Color', 'jobwp'); ?>:</label>
            </th>
            <td>
                <?php
				if ( ! job_fs()->is_plan__premium_only('pro', true) ) {
					?>
					<span><?php echo '<a href="' . job_fs()->get_upgrade_url() . '">' . __('Please Upgrade Now', 'jobwp') . '</a>'; ?></span>
					<?php
				}

				if ( job_fs()->is_plan__premium_only('pro', true) ) {
					?>
                    <input class="jobwp-wp-color" type="text" name="jobwp_apply_form_input_bg_color" id="jobwp_apply_form_input_bg_color" value="<?php esc_attr_e( $jobwp_apply_form_input_bg_color ); ?>">
                    <div id="colorpicker"></div>
					<?php
				}
				?>
            </td>
            <th scope="row">
                <label><?php _e('Border Color', 'jobwp'); ?>:</label>
            </th>
            <td>
                <?php
				if ( ! job_fs()->is_plan__premium_only('pro', true) ) {
					?>
					<span><?php echo '<a href="' . job_fs()->get_upgrade_url() . '">' . __('Please Upgrade Now', 'jobwp') . '</a>'; ?></span>
					<?php
				}

				if ( job_fs()->is_plan__premium_only('pro', true) ) {
					?>
                    <input class="jobwp-wp-color" type="text" name="jobwp_apply_form_input_border_color" id="jobwp_apply_form_input_border_color" value="<?php esc_attr_e( $jobwp_apply_form_input_border_color ); ?>">
                    <div id="colorpicker"></div>
					<?php
				}
				?>
            </td>
        </tr>
        <!-- Apply Button -->
        <tr>
            <th scope="row" colspan="4">
                <hr><span><?php _e('Apply Button', 'jobwp'); ?></span><hr>
            </th>
        </tr>
        <tr>
            <th scope="row">
                <label><?php _e('Background Color', 'jobwp'); ?>:</label>
            </th>
            <td colspan="3">
                <?php
				if ( ! job_fs()->is_plan__premium_only('pro', true) ) {
					?>
					<span><?php echo '<a href="' . job_fs()->get_upgrade_url() . '">' . __('Please Upgrade Now', 'jobwp') . '</a>'; ?></span>
					<?php
				}

				if ( job_fs()->is_plan__premium_only('pro', true) ) {
					?>
                    <input class="jobwp-wp-color" type="text" name="jobwp_apply_form_btn_bg_color" id="jobwp_apply_form_btn_bg_color" value="<?php esc_attr_e( $jobwp_apply_form_btn_bg_color ); ?>">
                    <div id="colorpicker"></div>
					<?php
				}
				?>
            </td>
        </tr>
        <tr>
            <th scope="row">
                <label><?php _e('Font Color', 'jobwp'); ?>:</label>
            </th>
            <td>
                <?php
				if ( ! job_fs()->is_plan__premium_only('pro', true) ) {
					?>
					<span><?php echo '<a href="' . job_fs()->get_upgrade_url() . '">' . __('Please Upgrade Now', 'jobwp') . '</a>'; ?></span>
					<?php
				}

				if ( job_fs()->is_plan__premium_only('pro', true) ) {
					?>
                    <input class="jobwp-wp-color" type="text" name="jobwp_apply_form_btn_font_color" id="jobwp_apply_form_btn_font_color" value="<?php esc_attr_e( $jobwp_apply_form_btn_font_color ); ?>">
                    <div id="colorpicker"></div>
					<?php
				}
				?>
            </td>
            <th scope="row">
                <label><?php _e('Font Size', 'jobwp'); ?>:</label>
            </th>
            <td>
                <?php
				if ( ! job_fs()->is_plan__premium_only('pro', true) ) {
					?>
					<span><?php echo '<a href="' . job_fs()->get_upgrade_url() . '">' . __('Please Upgrade Now', 'jobwp') . '</a>'; ?></span>
					<?php
				}

				if ( job_fs()->is_plan__premium_only('pro', true) ) {
					?>
                    <input type="number" min="11" max="30" step="1" name="jobwp_apply_form_btn_font_size" value="<?php esc_attr_e( $jobwp_apply_form_btn_font_size ); ?>">
					<?php
				}
				?>
            </td>
        </tr>
        <!-- Apply Button - Hover -->
        <tr>
            <th scope="row" colspan="4">
                <hr><span><?php _e('Apply Button :: Hover', 'jobwp'); ?></span><hr>
            </th>
        </tr>
        <tr>
            <th scope="row">
                <label><?php _e('Background Color', 'jobwp'); ?>:</label>
            </th>
            <td>
                <?php
				if ( ! job_fs()->is_plan__premium_only('pro', true) ) {
					?>
					<span><?php echo '<a href="' . job_fs()->get_upgrade_url() . '">' . __('Please Upgrade Now', 'jobwp') . '</a>'; ?></span>
					<?php
				}

				if ( job_fs()->is_plan__premium_only('pro', true) ) {
					?>
                    <input class="jobwp-wp-color" type="text" name="jobwp_apply_form_btn_hvr_bg_color" id="jobwp_apply_form_btn_hvr_bg_color" value="<?php esc_attr_e( $jobwp_apply_form_btn_hvr_bg_color ); ?>">
                    <div id="colorpicker"></div>
					<?php
				}
				?>
            </td>
            <th scope="row">
                <label><?php _e('Font Color', 'jobwp'); ?>:</label>
            </th>
            <td colspan="2">
                <?php
				if ( ! job_fs()->is_plan__premium_only('pro', true) ) {
					?>
					<span><?php echo '<a href="' . job_fs()->get_upgrade_url() . '">' . __('Please Upgrade Now', 'jobwp') . '</a>'; ?></span>
					<?php
				}

				if ( job_fs()->is_plan__premium_only('pro', true) ) {
					?>
                    <input class="jobwp-wp-color" type="text" name="jobwp_apply_form_btn_hvr_font_color" id="jobwp_apply_form_btn_hvr_font_color" value="<?php esc_attr_e( $jobwp_apply_form_btn_hvr_font_color ); ?>">
                    <div id="colorpicker"></div>
					<?php
				}
				?>
            </td>
        </tr>
    </table>
    <hr>
    <p class="submit"><button id="updateApplyFormStyle" name="updateApplyFormStyle" class="button button-primary jobwp-button"><?php _e('Save Settings', 'jobwp'); ?></button></p>
</form>