<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$jobwpGeneralSettings = $this->jobwp_get_general_settings();
//print_r( $jobwpGeneralSettings );
foreach ( $jobwpGeneralSettings as $option_name => $option_value ) {
    if ( isset( $jobwpGeneralSettings[$option_name] ) ) {
        ${"" . $option_name} = $option_value;
    }
}
?>
<div id="wph-wrap-all" class="wrap jobwp-single-settings-page">

    <div class="settings-banner">
        <h2><i class="fa fa-cogs" aria-hidden="true"></i>&nbsp;<?php _e('General Settings', 'jobwp'); ?></h2>
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
                <?php wp_nonce_field( 'jobwp_general_action_filed', 'jobwp_general_nonce_field' ); ?>
                    <table class="hm-settings-table jobwp-single-settings-table" cellpadding="0" cellspacing="0">
                        <tr>
                            <td colspan="2" class="jobwp-settings-block-title"><?php _e('Notifications', 'jobwp'); ?></td>
                        </tr>
                        <tr class="jobwp_admin_noti_email">
                            <th scope="row">
                                <label><?php _e('Admin notification email', 'jobwp'); ?></label>
                            </th>
                            <td>
                                <input type="text" name="jobwp_admin_noti_email" id="jobwp_admin_noti_email" class="regular-text" value="<?php esc_attr_e( $jobwp_admin_noti_email ); ?>" />
                                <span><?php _e('An email is sent here when a candidate submits an application.', 'jobwp'); ?></span>
                            </td>
                        </tr>
                        <?php
                        if ( ! job_fs()->is_plan__premium_only('pro', true) ) {
                            ?>
                            <tr class="upgrade-promotion">
                                <th scope="row">
                                    <label for="jobwp_ext_apply_now_url"><i class="fa fa-lock" aria-hidden="true"></i><?php _e('Notification email to user role', 'jobwp'); ?></label>
                                </th>
                                <td>
                                    <div class="pro-unlock">
                                        <i class="fa-regular fa-envelope" style="font-size:18px;flex-shrink:0" aria-hidden="true"></i>
                                        <div class="pro-unlock-text">
                                            <?php _e('Route new applications to specific user roles — not just the admin. Essential for agencies with account managers per client.', 'jobwp'); ?>
                                        </div>
                                        <?php echo '<a href="' . job_fs()->get_upgrade_url() . '" class="pro-unlock-btn">' . __('Unlock', 'jobwp') . '</a>'; ?>
                                    </div>
                                </td>
                            </tr>
                            <?php
                        }
                        
                        if ( job_fs()->is_plan__premium_only('pro', true) ) {
                            ?>
                            <tr class="jobwp_admin_noti_email_users">
                                <th scope="row">
                                    <label for="jobwp_ext_apply_now_url"><?php _e('Notification email to user role', 'jobwp'); ?></label>
                                </th>
                                <td>
                                    <select id="jobwp_admin_noti_email_users" name="jobwp_admin_noti_email_users">
                                        <option value=""><?php _e('Select User Role', 'jobwp'); ?></option>
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
                                    <span><?php _e("An email is sent to this role based user's email when an applicaiton is submitted.", 'jobwp'); ?></span>
                                </td>
                            </tr>
                            <?php
                        }
                        ?>
                        <tr>
                            <td colspan="2" class="jobwp-settings-block-title"><?php _e('Layout', 'jobwp'); ?></td>
                        </tr>
                        <tr class="jobwp_list_layout">
                            <th scope="row">
                                <label><?php _e('Job listing page layout', 'jobwp'); ?></label>
                            </th>
                            <td>
                                <input type="radio" name="jobwp_list_layout" id="jobwp_list_layout_list" value="list" <?php echo ( 'list' === $jobwp_list_layout ) ? 'checked' : ''; ?> >
                                <label for="jobwp_list_layout_list"><?php _e('List', 'jobwp'); ?></label>
                                &nbsp;&nbsp;
                                <input type="radio" name="jobwp_list_layout" id="jobwp_list_layout_grid" value="grid" <?php echo ( 'grid' === $jobwp_list_layout ) ? 'checked' : ''; ?> >
                                <label for="jobwp_list_layout_grid"><?php _e('Grid', 'jobwp'); ?></label>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" class="jobwp-settings-block-title"><?php _e('Application form', 'jobwp'); ?></td>
                        </tr>
                        <tr class="jobwp_ext_application_form">
                            <th scope="row">
                                <label for="jobwp_ext_application_form"><?php _e('Use external application form', 'jobwp'); ?>?</label>
                            </th>
                            <td>
                                <input type="checkbox" name="jobwp_ext_application_form" class="jobwp_ext_application_form" id="jobwp_ext_application_form"
                                    <?php echo $jobwp_ext_application_form ? 'checked' : ''; ?>>
                                <?php _e('Enable', 'jobwp'); ?>
                                <span><?php _e('Use WPForms, Contact Form 7, or any shortcode-based form instead of the built-in form.', 'jobwp'); ?></span>
                                <br>
                                <input type="text" name="jobwp_ext_application_form_shortcode" id="jobwp_ext_application_form_shortcode" class="regular-text" value="<?php esc_attr_e( stripslashes( $jobwp_ext_application_form_shortcode ) ); ?>" />
                            </td>
                        </tr>
                        <?php
                        if ( ! job_fs()->is_plan__premium_only('pro', true) ) {
                            ?>
                            <tr class="upgrade-promotion">
                                <th scope="row">
                                    <label for="jobwp_ext_apply_now_url"><i class="fa fa-lock" aria-hidden="true"></i><?php _e('Allow external application URL', 'jobwp'); ?></label>
                                </th>
                                <td>
                                    <div class="pro-unlock">
                                        <i class="fa-solid fa-arrow-up-right-from-square"></i>
                                        <div class="pro-unlock-text">
                                            <?php _e('Link jobs directly to LinkedIn, Indeed, or any external URL. Perfect for affiliate job boards and agency clients.', 'jobwp'); ?>
                                        </div>
                                        <?php echo '<a href="' . job_fs()->get_upgrade_url() . '" class="pro-unlock-btn">' . __('Unlock', 'jobwp') . '</a>'; ?>
                                    </div>
                                </td>
                            </tr>
                            <?php
                        }

                        if ( job_fs()->is_plan__premium_only('pro', true) ) {
                            ?>
                            <tr class="jobwp_ext_apply_now_url">
                                <th scope="row">
                                    <label for="jobwp_ext_apply_now_url"><?php _e('Allow external application URL', 'jobwp'); ?>?</label>
                                </th>
                                <td>
                                    <input type="checkbox" name="jobwp_ext_apply_now_url" class="jobwp_ext_apply_now_url" id="jobwp_ext_apply_now_url" <?php echo $jobwp_ext_apply_now_url ? 'checked' : ''; ?>>    
                                    <?php _e('Enable', 'jobwp'); ?>
                                </td>
                            </tr>
                            <?php
                        }
                        ?>
                        <tr class="jobwp_hide_jobs_deadline_over">
                            <th scope="row">
                                <label for="jobwp_hide_jobs_deadline_over"><?php _e('Hide Jobs When Deadline is Over', 'jobwp'); ?>?</label>
                            </th>
                            <td>
                                <input type="checkbox" name="jobwp_hide_jobs_deadline_over" class="jobwp_hide_jobs_deadline_over" id="jobwp_hide_jobs_deadline_over" <?php echo $jobwp_hide_jobs_deadline_over ? 'checked' : ''; ?>>  
                            </td>
                        </tr>
                        <tr class="jobwp_allow_login_apply">
                            <th scope="row">
                                <label for="jobwp_allow_login_apply"><?php _e('Should Candidate Login Before Apply', 'jobwp'); ?>?</label>
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
                                    <input type="checkbox" name="jobwp_allow_login_apply" class="jobwp_allow_login_apply" id="jobwp_allow_login_apply" <?php echo $jobwp_allow_login_apply ? 'checked' : ''; ?>>
                                    <?php
                                }
                                ?>
                            </td>
                        </tr>
                        <!-- Redirect After Apply -->
                        <tr>
                            <th scope="row">
                                <label for="jobwp_allow_redirect_after_application"><?php _e('Redirect After Application', 'jobwp'); ?>?</label>
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
                                    <input type="checkbox" name="jobwp_allow_redirect_after_application" class="jobwp_allow_redirect_after_application" id="jobwp_allow_redirect_after_application" value="1" <?php checked( $jobwp_allow_redirect_after_application, 1 ); ?>>
                                    <?php
                                }
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">
                                <label><?php _e('Select Redirect Page', 'wp-stripe-donation'); ?></label>
                            </th>
                            <td colspan="5">
                                <?php
                                if ( ! job_fs()->is_plan__premium_only('pro', true) ) {
                                    ?>
                                    <span><?php echo '<a href="' . job_fs()->get_upgrade_url() . '">' . __('Available in Professional', 'jobwp') . '</a>'; ?></span>
                                    <?php
                                }

                                if ( job_fs()->is_plan__premium_only('pro', true) ) {
                                    ?>
                                    <select name="jobwp_redirect_page_after_submit" id="jobwp_redirect_page_after_submit" class="regular-text">
                                        <option value=""><?php esc_html_e('Select Page'); ?></option>
                                        <?php
                                        $pages = get_pages();
                                        foreach ( $pages as $page ) { 
                                            ?>
                                            <option value="<?php esc_attr_e( $page->post_name ); ?>" <?php selected( $jobwp_redirect_page_after_submit, $page->post_name ); ?>>
                                                <?php esc_html_e( $page->post_title ); ?>
                                            </option>
                                            <?php
                                        } 
                                        ?>
                                    </select>
                                    <span><?php _e('Select the page that will be redirected after application submit', 'jobwp'); ?></span>
                                    <?php
                                }
                                ?>
                            </td>
                        </tr>
                        <!-- Captcha -->
                        <tr>
                            <td colspan="2" class="jobwp-settings-block-title"><?php _e('reCAPTCHA', 'jobwp'); ?></td>
                        </tr>
                        <tr class="jobwp_recaptcha_site_key">
                            <th scope="row">
                                <label><?php _e('Site Key', 'jobwp'); ?></label>
                            </th>
                            <td>
                                <input type="text" name="jobwp_recaptcha_site_key" id="jobwp_recaptcha_site_key" class="regular-text" value="<?php esc_attr_e( stripslashes( $jobwp_recaptcha_site_key ) ); ?>" />
                            </td>
                        </tr>
                        <tr class="jobwp_recaptcha_secret_key">
                            <th scope="row">
                                <label><?php _e('Secret Key', 'jobwp'); ?></label>
                            </th>
                            <td>
                                <input type="password" name="jobwp_recaptcha_secret_key" id="jobwp_recaptcha_secret_key" class="regular-text" value="<?php esc_attr_e( stripslashes( $jobwp_recaptcha_secret_key ) ); ?>" />
                            </td>
                        </tr>
                        <tr class="jobwp_captcha_on_apply_form">
                            <th scope="row">
                                <label for="jobwp_captcha_on_apply_form"><?php _e('Enable on Apply Form', 'jobwp'); ?>?</label>
                            </th>
                            <td>
                                <input type="checkbox" name="jobwp_captcha_on_apply_form" class="jobwp_captcha_on_apply_form" id="jobwp_captcha_on_apply_form" <?php echo $jobwp_captcha_on_apply_form ? 'checked' : ''; ?>>  
                            </td>
                        </tr>
                    </table>
                    <hr>
                    <p class="submit">
                        <button id="updateGeneralSettings" name="updateGeneralSettings" class="button button-primary jobwp-button">
                            <i class="fa fa-check-circle" aria-hidden="true"></i>&nbsp;<?php _e('Save Settings', 'jobwp'); ?>
                        </button>
                    </p>
                </form>
            </div>
        
        </div>

        <?php include_once('partial/admin-sidebar.php'); ?>

    </div>

</div>