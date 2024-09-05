<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

//print_r( $jobwpEmailSettings );
foreach ( $jobwpEmailSettings as $option_name => $option_value ) {
    if ( isset( $jobwpEmailSettings[$option_name] ) ) {
        ${"" . $option_name} = $option_value;
    }
}
?>
<div id="wph-wrap-all" class="wrap jobwp-single-settings-page">

<div class="settings-banner">
    <h2><i class="fa fa-cogs" aria-hidden="true"></i>&nbsp;<?php _e('Email Settings', 'jobwp'); ?></h2>
</div>

<?php
if ( $jobwpEmailMessage ) {
    $this->jobwp_display_notification('success', 'Your information updated successfully.');
    echo '<br>';
}
?>
<div class="jobwp-wrap">

    <div class="jobwp_personal_wrap jobwp_personal_help" style="width: 76%; float: left;">
        
        <div class="tab-content">

            <?php
            if ( job_fs()->is_plan__premium_only('pro', true) ) {
                ?>
                <form name="jobwp_email_settings_form" role="form" class="form-horizontal" method="post" action="" id="jobwp-email-settings-form">
                <table class="jobwp-single-settings-table">
                    <tr>
                        <td colspan="2">
                            <hr><?php _e('Candidate Email Settings', 'jobwp'); ?><hr>
                        </td>
                    </tr>
                    <tr class="jobwp_re_from_name">
                        <th scope="row" style="text-align: right;">
                            <label><?php _e('Header From Name', 'jobwp'); ?></label>
                        </th>
                        <td>
                            <input type="text" name="jobwp_re_from_name" id="jobwp_re_from_name" class="regular-text" value="<?php esc_attr_e( $jobwp_re_from_name ); ?>"/>
                        </td>
                    </tr>
                    <tr class="jobwp_can_header_from_email">
                        <th scope="row" style="text-align: right;">
                            <label><?php _e('Header From Email', 'jobwp'); ?></label>
                        </th>
                        <td>
                            <input type="email" name="jobwp_can_header_from_email" id="jobwp_can_header_from_email" class="regular-text" value="<?php esc_attr_e( $jobwp_can_header_from_email ); ?>"/>
                        </td>
                    </tr>
                    <tr class="jobwp_candidate_email_subject">
                        <th scope="row" style="text-align: right;">
                            <label><?php _e('Email Subject', 'jobwp'); ?></label>
                        </th>
                        <td>
                            <input type="text" name="jobwp_candidate_email_subject" id="jobwp_candidate_email_subject" class="regular-text" value="<?php esc_attr_e( $jobwp_candidate_email_subject ); ?>"/>
                        </td>
                    </tr>
                    <tr class="jobwp_candidate_email_body">
                        <th scope="row" style="text-align: right;">
                            <label><?php _e('Email Content', 'jobwp'); ?></label>
                            <span class="dashicons dashicons-info-outline jobwp-admin-icon"></span>
                            <img src="<?php esc_attr_e( JOBWP_ASSETS . 'img/jobwp-candidate-email-example.jpg' ); ?>" class="jobwp-admin-help-img">
                        </th>
                        <td colspan="2">
                            <textarea cols="100" style="min-height:200px;" name="jobwp_candidate_email_body" class="medium-text" id="jobwp_candidate_email_body"><?php echo wp_kses_post( stripslashes( $jobwp_candidate_email_body ) ); ?></textarea>
                            <br>
                            <code><?php _e('To use candidate name apply #candidateName# in the content', 'jobwp'); ?>.</code>
                            <br>
                            <code><?php _e('To use job title apply #jobTitle# in the content', 'jobwp'); ?>.</code>
                            <br>
                            <code><?php _e('Use <<code>br</code>> to break line in the content', 'jobwp'); ?>.</code>
                        </td>
                    </tr>
                </table>
                <hr>
                    <p class="submit">
                        <button id="updateSettings" name="updateSettings" class="button button-primary jobwp-button">
                            <i class="fa fa-check-circle" aria-hidden="true"></i>&nbsp;<?php _e('Save Settings', 'jobwp'); ?>
                        </button>
                    </p>
                </form>
                <?php
            }

            if ( ! job_fs()->is_plan__premium_only('pro', true) ) {
                ?>
                <span><?php echo '<a href="' . job_fs()->get_upgrade_url() . '">' . __('Please Upgrade Now', 'jobwp') . '</a>'; ?></span>
                <?php
            }
            ?>
        </div>
        
    </div>

    <?php include_once('partial/admin-sidebar.php'); ?>
</div>

</div>