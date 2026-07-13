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
<?php wp_nonce_field( 'jobwp_apply_form_content_action', 'jobwp_apply_form_content_nonce' ); ?>
    <table class="hm-settings-table jobwp-listing-content-settings-table" cellpadding="0" cellspacing="0">
        <tr>
            <th scope="row">
                <label><?php _e('Hide Form Title', 'jobwp'); ?>?</label>
            </th>
            <td style="vertical-align: top;">
                <input type="checkbox" name="jobwp_hide_apply_form_title" id="jobwp_hide_apply_form_title" <?php echo $jobwp_hide_apply_form_title ? 'checked' : ''; ?>>
                <label for="jobwp_hide_apply_form_title"><?php _e('Enable', 'jobwp'); ?></label>
            </td>
            <th scope="row" style="text-align: right;">
                <label><?php _e('Title Text', 'jobwp'); ?></label>
            </th>
            <td colspan="3">
                <input type="text" name="jobwp_apply_form_title" id="jobwp_apply_form_title" class="regular-text" value="<?php esc_attr_e( $jobwp_apply_form_title ); ?>" />
            </td>
        </tr>
        <!-- Name -->
        <tr>
            <th scope="row">
                <label><?php _e('Name Label', 'jobwp'); ?></label>
            </th>
            <td>
                <input type="text" name="jobwp_apply_form_name_label" id="jobwp_apply_form_name_label" class="medium-text" value="<?php esc_attr_e( $jobwp_apply_form_name_label ); ?>" />
            </td>
            <th scope="row" style="text-align: right;">
                <label><?php _e('Email Label', 'jobwp'); ?></label>
            </th>
            <td colspan="3">
                <input type="text" name="jobwp_apply_form_email_label" id="jobwp_apply_form_email_label" class="medium-text" value="<?php esc_attr_e( $jobwp_apply_form_email_label ); ?>" />
            </td>
        </tr>
        <!-- Phone -->
        <?php
        echo '<tr><td colspan="6" style="padding:0;"></td></tr>';
        $jobwp_upgrade_arr = [
            'label'     => 'Display Phone',
            'icon'      => 'fa-solid fa-phone',
            'message'   => "Let candidates include their phone number in their job application with country code — set phone label text.",
            'colspan'   => 3
        ];

        $this->jobwp_upgrade_to_premium_section( $jobwp_upgrade_arr );

        if ( job_fs()->is_plan__premium_only('pro', true) ) {
            ?>
            <tr>
                <th scope="row">
                    <label><?php _e('Display Phone', 'jobwp'); ?>?</label>
                </th>
                <td style="vertical-align: top;">
                    <input type="checkbox" name="jobwp_display_apply_form_phone" id="jobwp_display_apply_form_phone" <?php echo $jobwp_display_apply_form_phone ? 'checked' : ''; ?>>
                    <label for="jobwp_display_apply_form_phone"><?php _e('Enable', 'jobwp'); ?></label>
                </td>
                <th scope="row" style="text-align: right;">
                    <label><?php _e('Phone Label', 'jobwp'); ?></label>
                </th>
                <td>
                    <input type="text" name="jobwp_apply_form_phone_label" id="jobwp_apply_form_phone_label" class="medium-text" 
                        value="<?php esc_attr_e( $jobwp_apply_form_phone_label ); ?>"/>
                </td>
                <th scope="row" style="text-align: right;">
                    <label><?php _e('Default Country Code', 'jobwp'); ?></label>
                </th>
                <td>
                    <input type="text" name="jobwp_default_country_code" id="jobwp_default_country_code" class="small-text" value="<?php esc_attr_e( $jobwp_default_country_code ); ?>"/>
                    <code><?php _e('2 digit codes (ISO 3166-1)', 'jobwp'); ?></code>
                </td>
            </tr>
            <?php
        }
        ?>
        <!-- Cover Letter -->
        <tr>
            <th scope="row">
                <label><?php _e('Hide Cover Letter', 'jobwp'); ?>?</label>
            </th>
            <td style="vertical-align: top;">
                <input type="checkbox" name="jobwp_hide_apply_form_cover" id="jobwp_hide_apply_form_cover" <?php echo $jobwp_hide_apply_form_cover ? 'checked' : ''; ?>>
                <label for="jobwp_hide_apply_form_cover"><?php _e('Enable', 'jobwp'); ?></label>
            </td>
            <th scope="row" style="text-align: right;">
                <label><?php _e('Cover Letter Label', 'jobwp'); ?></label>
            </th>
            <td colspan="3">
                <input type="text" name="jobwp_apply_form_cover_letter_label" id="jobwp_apply_form_cover_letter_label" class="medium-text" value="<?php esc_attr_e( $jobwp_apply_form_cover_letter_label ); ?>" />
            </td>
        </tr>
        <!-- Upload Resume -->
        <tr>
            <th scope="row">
                <label><?php _e('Upload Resume Label', 'jobwp'); ?></label>
            </th>
            <td>
                <input type="text" name="jobwp_apply_form_upload_label" id="jobwp_apply_form_upload_label" class="medium-text" value="<?php esc_attr_e( $jobwp_apply_form_upload_label ); ?>" />
            </td>
            <th scope="row">
                <label><?php _e('Attach Resume Label', 'jobwp'); ?></label>
            </th>
            <td colspan="3">
                <input type="text" name="jobwp_apply_form_attach_label" id="jobwp_apply_form_attach_label" class="regular-text" value="<?php esc_attr_e( $jobwp_apply_form_attach_label ); ?>" />
            </td>
        </tr>
        <tr>
            <th scope="row">
                <label><?php _e('Allowed Types Label', 'jobwp'); ?></label>
            </th>
            <td colspan="5">
                <input type="text" name="jobwp_apply_form_allowed_types_label" id="jobwp_apply_form_allowed_types_label" class="medium-text" value="<?php esc_attr_e( $jobwp_apply_form_allowed_types_label ); ?>" />
            </td>
        </tr>
        <!-- User Consent -->
        <?php
        echo '<tr><td colspan="6" style="padding:0;"></td></tr>';
        $jobwp_upgrade_arr = [
            'label'     => 'User Consent',
            'icon'      => 'fa-regular fa-square-check',
            'message'   => "GDPR-compliant consent checkbox with custom message — candidates agree to your specific data handling terms before submitting.",
            'colspan'   => 3
        ];

        $this->jobwp_upgrade_to_premium_section( $jobwp_upgrade_arr );

        if ( job_fs()->is_plan__premium_only('pro', true) ) {
            ?>
            <tr>
                <th scope="row">
                    <label><?php _e('Hide User Consent', 'jobwp'); ?>?</label>
                </th>
                <td style="vertical-align: top;">
                    <input type="checkbox" name="jobwp_apply_form_user_consent" class="jobwp_apply_form_user_consent" id="jobwp_apply_form_user_consent" 
                        <?php echo $jobwp_apply_form_user_consent ? 'checked' : ''; ?>>
                    <label for="jobwp_apply_form_user_consent"><?php _e('Enable', 'jobwp'); ?></label>
                </td>
                <th scope="row" style="text-align: right;">
                    <label><?php _e('User Consent Text', 'jobwp'); ?></label>
                </th>
                <td colspan="3">
                    <textarea name="jobwp_apply_form_user_consent_text" id="jobwp_apply_form_user_consent_text" class="regular-text" cols="40" style="min-height: 100px;"><?php echo esc_textarea( $jobwp_apply_form_user_consent_text ); ?></textarea>
                </td>
            </tr>
            <?php
        }
        ?>
        <!-- Apply Button -->
        <tr>
            <th scope="row">
                <label><?php _e('Apply Button Text', 'jobwp'); ?></label>
            </th>
            <td colspan="5">
                <input type="text" name="jobwp_apply_form_submit_btn_txt" id="jobwp_apply_form_submit_btn_txt" class="medium-text" value="<?php esc_attr_e( $jobwp_apply_form_submit_btn_txt ); ?>" />
            </td>
        </tr>
    </table>
    <hr>
    <p class="submit">
        <button id="updateApplyFormContent" name="updateApplyFormContent" class="button button-primary jobwp-button">
            <i class="fa fa-check-circle" aria-hidden="true"></i>&nbsp;<?php _e('Save Settings', 'jobwp'); ?>
        </button>
    </p>
</form>