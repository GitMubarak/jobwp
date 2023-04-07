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
                <label><?php _e('Form Title Color', 'jobwp'); ?>:</label>
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
        </tr>
    </table>
    <hr>
    <p class="submit"><button id="updateApplyFormStyle" name="updateApplyFormStyle" class="button button-primary jobwp-button"><?php _e('Save Settings', 'jobwp'); ?></button></p>
</form>