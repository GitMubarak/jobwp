<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

//print_r( $jobwpApplyFormContent );
foreach ( $jobwpApplyFormContent as $option_name => $option_value ) {
    if ( isset( $jobwpApplyFormContent[$option_name] ) ) {
        ${"" . $option_name} = $option_value;
    }
}
?>
<form name="jobwp_apply_form_content_settings_form" role="form" class="form-horizontal" method="post" action="" id="jobwp-apply-form-content-settings-form">
    <table class="jobwp-listing-content-settings-table">
        <tr>
            <th scope="row">
                <label for="jobwp_hide_apply_form_title"><?php _e('Hide Form Title', JOBWP_TXT_DOMAIN); ?>?</label>
            </th>
            <td>
                <input type="checkbox" name="jobwp_hide_apply_form_title" id="jobwp_hide_apply_form_title" <?php echo $jobwp_hide_apply_form_title ? 'checked' : ''; ?>>
            </td>
            <th scope="row">
                <label><?php _e('Title Text', JOBWP_TXT_DOMAIN); ?></label>
            </th>
            <td>
                <input type="text" name="jobwp_apply_form_title" id="jobwp_apply_form_title" class="regular-text" value="<?php esc_attr_e( $jobwp_apply_form_title ); ?>" />
            </td>
        </tr>
        <tr>
            <th scope="row">
                <label><?php _e('Name Label', JOBWP_TXT_DOMAIN); ?></label>
            </th>
            <td colspan="3">
                <input type="text" name="jobwp_apply_form_name_label" id="jobwp_apply_form_name_label" class="regular-text" value="<?php esc_attr_e( $jobwp_apply_form_name_label ); ?>" />
            </td>
        </tr>
        <tr>
            <th scope="row">
                <label><?php _e('Email Label', JOBWP_TXT_DOMAIN); ?></label>
            </th>
            <td colspan="3">
                <input type="text" name="jobwp_apply_form_email_label" id="jobwp_apply_form_email_label" class="regular-text" value="<?php esc_attr_e( $jobwp_apply_form_email_label ); ?>" />
            </td>
        </tr>
        <tr>
            <th scope="row">
                <label><?php _e('Cover Letter Label', JOBWP_TXT_DOMAIN); ?></label>
            </th>
            <td colspan="3">
                <input type="text" name="jobwp_apply_form_cover_letter_label" id="jobwp_apply_form_cover_letter_label" class="regular-text" value="<?php esc_attr_e( $jobwp_apply_form_cover_letter_label ); ?>" />
            </td>
        </tr>
        <tr>
            <th scope="row">
                <label for="jobwp_display_apply_form_phone"><?php _e('Display Phone', JOBWP_TXT_DOMAIN); ?>?</label>
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
                    <input type="checkbox" name="jobwp_display_apply_form_phone" id="jobwp_display_apply_form_phone" <?php echo $jobwp_display_apply_form_phone ? 'checked' : ''; ?>>
                    <?php
                }
                ?>
            </td>
            <th scope="row">
                <label><?php _e('Phone Label Text', JOBWP_TXT_DOMAIN); ?></label>
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
                    <input type="text" name="jobwp_apply_form_phone_label" id="jobwp_apply_form_phone_label" class="regular-text" value="<?php esc_attr_e( $jobwp_apply_form_phone_label ); ?>"/>
                    <?php
                }
                ?>
            </td>
        </tr>
        <tr><td colspan="4"><hr></td></tr>
        <!-- User Consent -->
        <tr>
            <th scope="row">
                <label for="jobwp_apply_form_user_consent"><?php _e('Hide User Consent', JOBWP_TXT_DOMAIN); ?>?</label>
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
                    <input type="checkbox" name="jobwp_apply_form_user_consent" class="jobwp_apply_form_user_consent" id="jobwp_apply_form_user_consent" <?php echo $jobwp_apply_form_user_consent ? 'checked' : ''; ?>>
                    <?php
                }
                ?>
            </td>
            <th scope="row">
                <label><?php _e('User Consent Text', JOBWP_TXT_DOMAIN); ?></label>
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
                    <textarea name="jobwp_apply_form_user_consent_text" id="jobwp_apply_form_user_consent_text" class="regular-text" cols="40" style="min-height: 100px;"><?php esc_html_e( $jobwp_apply_form_user_consent_text ); ?></textarea>
                    <?php
                }
                ?>
            </td>
        </tr>
        <tr>
            <th scope="row">
                <label><?php _e('Submit Button Text', JOBWP_TXT_DOMAIN); ?></label>
            </th>
            <td colspan="3">
                <input type="text" name="jobwp_apply_form_submit_btn_txt" id="jobwp_apply_form_submit_btn_txt" class="medium-text" value="<?php esc_attr_e( $jobwp_apply_form_submit_btn_txt ); ?>" />
            </td>
        </tr>
    </table>
    <hr>
    <p class="submit">
        <button id="updateApplyFormContent" name="updateApplyFormContent" class="button button-primary jobwp-button">
            <i class="fa fa-check-circle" aria-hidden="true"></i>&nbsp;<?php _e('Save Settings', JOBWP_TXT_DOMAIN); ?>
        </button>
    </p>

</form>