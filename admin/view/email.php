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
                        <?php wp_nonce_field( 'jobwp_email_settings_action', 'jobwp_email_settings_nonce' ); ?>
                        <table class="hm-settings-table jobwp-single-settings-table" cellpadding="0" cellspacing="0">
                            <!-- Candidate Email Settings -->
                            <tr class="jobwp-settings-section">
                                <td colspan="2" class="jobwp-settings-block-title"><i class="fa-regular fa-envelope"></i>&nbsp;<?php _e('Candidate Email Settings', 'jobwp'); ?></td>
                            </tr>
                            <tr class="jobwp_disable_candidate_email">
                                <th scope="row" style="text-align: right;">
                                    <label><?php _e('Disable Candidate Email', 'jobwp'); ?>?</label>
                                </th>
                                <td>
                                    <input type="checkbox" name="jobwp_disable_candidate_email" class="jobwp_disable_candidate_email" id="jobwp_disable_candidate_email" value="1" 
                                        <?php checked( $jobwp_disable_candidate_email, 1 ); ?>/>
                                    <label for="jobwp_disable_candidate_email"><?php _e('Enable', 'jobwp'); ?></label>
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
                                    <span><?php _e('To use candidate name apply #candidateName# in the content', 'jobwp'); ?>.</span>
                                    <span><?php _e('To use job title apply #jobTitle# in the content', 'jobwp'); ?>.</span>
                                    <span><?php _e('Use <<code>br</code>> to break line in the content', 'jobwp'); ?>.</span>
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
                } else {
                    ?>
                    <table class="hm-settings-table jobwp-single-settings-table" cellpadding="0" cellspacing="0">
                    <?php
                    $jobwp_upgrade_arr = [
                        'label'     => 'Candidate Email Settings',
                        'icon'      => 'fa-solid fa-envelope-circle-check',
                        'message'   => "Customise candidate confirmation emails — set your own from name, from email, subject line, and email body. Or disable candidate emails entirely.",
                    ];

                    $this->jobwp_upgrade_to_premium_section( $jobwp_upgrade_arr );
                    ?>
                    </table>
                    <?php
                }
                ?>
            </div>
            
        </div>

        <?php
        $jobwp_pro_features_local = [
            [
                'icon' => 'fa-solid fa-envelope-circle-check',
                'heading' => 'Control candidate email alerts',
                'sub-heading' => "Applicants receive an instant acknowledgement email so they know their application was received"
            ]
        ];

        $jobwp_pro_features_global = [
            'Featured jobs slider',
            'Post-submission redirect',
            'CSV & Excel export',
            'DOC & DOCX resume uploads',
            'Embed search panel on any page via shortcode',
            'Job level filtering by shortcode'
        ];

        $this->jobwp_load_admin_sidebar( $jobwp_pro_features_local, $jobwp_pro_features_global );
        ?>
    </div>
</div>