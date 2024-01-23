<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

//print_r( $jobwpGeneralSettings );
foreach ( $jobwpGeneralSettings as $option_name => $option_value ) {
    if ( isset( $jobwpGeneralSettings[$option_name] ) ) {
        ${"" . $option_name} = $option_value;
    }
}
?>
<div id="wph-wrap-all" class="wrap jobwp-single-settings-page">

    <div class="settings-banner">
        <h2><i class="fa fa-cogs" aria-hidden="true"></i>&nbsp;<?php _e('General Settings', JOBWP_TXT_DOMAIN); ?></h2>
    </div>

    <?php
    if ( $jobwpGeneralMessage ) {
        $this->jobwp_display_notification('success', 'Your information updated successfully.');
        echo '<br>';
    }
    ?>

    <div class="jobwp-wrap">

        <div class="jobwp_personal_wrap jobwp_personal_help" style="width: 76%; float: left;">
            
            <div class="tab-content">
                <form name="jobwp_general_settings_form" role="form" class="form-horizontal" method="post" action="" id="jobwp-general-settings-form">
                    <table class="jobwp-single-settings-table">
                        <tr class="jobwp_admin_noti_email">
                            <th scope="row">
                                <label><?php _e('Admin Notification Email', JOBWP_TXT_DOMAIN); ?></label>
                            </th>
                            <td>
                                <input type="text" name="jobwp_admin_noti_email" id="jobwp_admin_noti_email" class="regular-text" value="<?php esc_attr_e( $jobwp_admin_noti_email ); ?>" />
                                <br>
                                <code><?php _e('An email will sent to this email when a candidate submit an applicaiton.', JOBWP_TXT_DOMAIN); ?></code>
                            </td>
                        </tr>
                        <tr class="jobwp_admin_noti_email_users">
                            <th scope="row">
                                <label for="jobwp_ext_apply_now_url"><?php _e('Notification Email to User Role', JOBWP_TXT_DOMAIN); ?></label>
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
                                    <select id="jobwp_admin_noti_email_users" name="jobwp_admin_noti_email_users">
                                        <option value=""><?php _e('Select User Role', JOBWP_TXT_DOMAIN); ?></option>
                                        <?php
                                        $roles = get_editable_roles();
                                        foreach ( $roles as $role => $details ) {
                                            $name = translate_user_role( $details['name'] );
                                            ?>
                                            <option value="<?php esc_attr_e( $role ); ?>" <?php echo ( $jobwp_admin_noti_email_users === $role ) ? 'selected ' : ''; ?>><?php esc_html_e( $name ); ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                    <?php
                                }
                                ?>
                                <br>
                                <code><?php _e('An email will sent to this role based user emails when a candidate submit an applicaiton.', JOBWP_TXT_DOMAIN); ?></code>
                            </td>
                        </tr>
                        <tr class="jobwp_list_layout">
                            <th scope="row">
                                <label><?php _e('Job Page Layout', JOBWP_TXT_DOMAIN); ?></label>
                            </th>
                            <td>
                                <input type="radio" name="jobwp_list_layout" id="jobwp_list_layout_list" value="list" <?php echo ( 'list' === $jobwp_list_layout ) ? 'checked' : ''; ?> >
                                <label for="jobwp_list_layout_list"><span></span><?php _e('List', JOBWP_TXT_DOMAIN); ?></label>
                                &nbsp;&nbsp;
                                <input type="radio" name="jobwp_list_layout" id="jobwp_list_layout_grid" value="grid" <?php echo ( 'grid' === $jobwp_list_layout ) ? 'checked' : ''; ?> >
                                <label for="jobwp_list_layout_grid"><span></span><?php _e('Grid', JOBWP_TXT_DOMAIN); ?></label>
                            </td>
                        </tr>
                        <tr class="jobwp_ext_application_form">
                            <th scope="row">
                                <label for="jobwp_ext_application_form"><?php _e('Use External Application Form', JOBWP_TXT_DOMAIN); ?>?</label>
                            </th>
                            <td>
                                <input type="checkbox" name="jobwp_ext_application_form" class="jobwp_ext_application_form" id="jobwp_ext_application_form"
                                    <?php echo $jobwp_ext_application_form ? 'checked' : ''; ?> >
                            </td>
                        </tr>
                        <tr class="jobwp_ext_application_form_shortcode">
                            <th scope="row">
                                <label><?php _e('External Application Form Shortcode', JOBWP_TXT_DOMAIN); ?></label>
                            </th>
                            <td>
                                <input type="text" name="jobwp_ext_application_form_shortcode" id="jobwp_ext_application_form_shortcode" class="regular-text" value="<?php esc_attr_e( stripslashes( $jobwp_ext_application_form_shortcode ) ); ?>" />
                                <br>
                                <code><?php _e('You can use external form instead of default application form. Like WPForms, Contact Form etc.', JOBWP_TXT_DOMAIN); ?></code>
                            </td>
                        </tr>
                        <tr class="jobwp_ext_apply_now_url">
                            <th scope="row">
                                <label for="jobwp_ext_apply_now_url"><?php _e('Allow External Application URL', JOBWP_TXT_DOMAIN); ?>?</label>
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
                                    <input type="checkbox" name="jobwp_ext_apply_now_url" class="jobwp_ext_apply_now_url" id="jobwp_ext_apply_now_url" <?php echo $jobwp_ext_apply_now_url ? 'checked' : ''; ?>>
                                    <?php
                                }
                                ?>
                            </td>
                        </tr>
                        <tr class="jobwp_hide_jobs_deadline_over">
                            <th scope="row">
                                <label for="jobwp_hide_jobs_deadline_over"><?php _e('Hide Jobs When Deadline Over', JOBWP_TXT_DOMAIN); ?>?</label>
                            </th>
                            <td>
                                <input type="checkbox" name="jobwp_hide_jobs_deadline_over" class="jobwp_hide_jobs_deadline_over" id="jobwp_hide_jobs_deadline_over" <?php echo $jobwp_hide_jobs_deadline_over ? 'checked' : ''; ?>>  
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" style="font-size: 18px;">
                                <hr><b><?php _e('Captcha', JOBWP_TXT_DOMAIN); ?></b><hr>
                            </td>
                        </tr>
                        <tr class="jobwp_recaptcha_site_key">
                            <th scope="row">
                                <label><?php _e('Site Key', JOBWP_TXT_DOMAIN); ?></label>
                            </th>
                            <td>
                                <input type="text" name="jobwp_recaptcha_site_key" id="jobwp_recaptcha_site_key" class="regular-text" value="<?php esc_attr_e( stripslashes( $jobwp_recaptcha_site_key ) ); ?>" />
                            </td>
                        </tr>
                        <tr class="jobwp_recaptcha_secret_key">
                            <th scope="row">
                                <label><?php _e('Secret Key', JOBWP_TXT_DOMAIN); ?></label>
                            </th>
                            <td>
                                <input type="text" name="jobwp_recaptcha_secret_key" id="jobwp_recaptcha_secret_key" class="regular-text" value="<?php esc_attr_e( stripslashes( $jobwp_recaptcha_secret_key ) ); ?>" />
                            </td>
                        </tr>
                        <tr class="jobwp_captcha_on_apply_form">
                            <th scope="row">
                                <label for="jobwp_captcha_on_apply_form"><?php _e('Enable on Apply Form', JOBWP_TXT_DOMAIN); ?>?</label>
                            </th>
                            <td>
                                <input type="checkbox" name="jobwp_captcha_on_apply_form" class="jobwp_captcha_on_apply_form" id="jobwp_captcha_on_apply_form" <?php echo $jobwp_captcha_on_apply_form ? 'checked' : ''; ?>>  
                            </td>
                        </tr>
                    </table>
                    <hr>
                    <p class="submit">
                        <button id="updateGeneralSettings" name="updateGeneralSettings" class="button button-primary jobwp-button">
                            <i class="fa fa-check-circle" aria-hidden="true"></i>&nbsp;<?php _e('Save Settings', JOBWP_TXT_DOMAIN); ?>
                        </button>
                    </p>
                </form>
            </div>
        
        </div>

        <?php include_once('partial/admin-sidebar.php'); ?>

    </div>

</div>