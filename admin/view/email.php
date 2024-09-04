<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( job_fs()->is_plan__premium_only('pro', true) ) {
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
            <form name="jobwp_email_settings_form" role="form" class="form-horizontal" method="post" action="" id="jobwp-email-settings-form">
                <table class="jobwp-single-settings-table">
                    <tr>
                        <td colspan="2">
                            <hr><?php _e('Candidate Email Settings', 'jobwp'); ?><hr>
                        </td>
                    </tr>
                    <tr class="jobwp_candidate_email_subject">
                        <th scope="row">
                            <label><?php _e('Email Subject', 'jobwp'); ?></label>
                        </th>
                        <td>
                            <input type="text" name="jobwp_candidate_email_subject" id="jobwp_candidate_email_subject" class="regular-text" value="<?php esc_attr_e( $jobwp_candidate_email_subject ); ?>"/>
                        </td>
                    </tr>
                    <tr class="jobwp_candidate_email_body">
                        <th scope="row" style="text-align: right;">
                            <label><?php _e('Email Content', 'jobwp'); ?></label>
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
            </div>
        
        </div>

        <?php include_once('partial/admin-sidebar.php'); ?>

    </div>

</div>
<?php
}
?>