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
                        <tr>
                            <th scope="row">
                                <label><?php _e('Admin Notification Email', JOBWP_TXT_DOMAIN); ?></label>
                            </th>
                            <td>
                                <input type="text" name="jobwp_admin_noti_email" id="jobwp_admin_noti_email" class="regular-text" value="<?php esc_attr_e( $jobwp_admin_noti_email ); ?>" />
                                <br>
                                <code><?php _e('An email will sent to this email when a candidate submit an applicaiton.', JOBWP_TXT_DOMAIN); ?></code>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">
                                <label><?php _e('Job List Layout', JOBWP_TXT_DOMAIN); ?></label>
                            </th>
                            <td>
                                <input type="radio" name="jobwp_list_layout" id="jobwp_list_layout_list" value="list" <?php echo ( 'list' === $jobwp_list_layout ) ? 'checked' : ''; ?> >
                                <label for="jobwp_list_layout_list"><span></span><?php _e('List', JOBWP_TXT_DOMAIN); ?></label>
                                &nbsp;&nbsp;
                                <input type="radio" name="jobwp_list_layout" id="jobwp_list_layout_grid" value="grid" <?php echo ( 'grid' === $jobwp_list_layout ) ? 'checked' : ''; ?> >
                                <label for="jobwp_list_layout_grid"><span></span><?php _e('Grid', JOBWP_TXT_DOMAIN); ?></label>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">
                                <label for="jobwp_ext_application_form"><?php _e('Use External Apply Form', JOBWP_TXT_DOMAIN); ?>?</label>
                            </th>
                            <td>
                                <input type="checkbox" name="jobwp_ext_application_form" class="jobwp_ext_application_form" id="jobwp_ext_application_form"
                                    <?php echo $jobwp_ext_application_form ? 'checked' : ''; ?> >
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">
                                <label><?php _e('External Apply Form Shortcode', JOBWP_TXT_DOMAIN); ?></label>
                            </th>
                            <td>
                                <input type="text" name="jobwp_ext_application_form_shortcode" id="jobwp_ext_application_form_shortcode" class="regular-text" value="<?php esc_attr_e( stripslashes( $jobwp_ext_application_form_shortcode ) ); ?>" />
                                <br>
                                <code><?php _e('You can use external form instead of default application form. Like WPForms, Contact Form etc.', JOBWP_TXT_DOMAIN); ?></code>
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