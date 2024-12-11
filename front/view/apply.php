<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$jobwpApplyFormContent = $this->jobwp_get_apply_form_content_settings();
//print_r( $jobwpApplyFormContent );
foreach ( $jobwpApplyFormContent as $option_name => $option_value ) {
    if ( isset( $jobwpApplyFormContent[$option_name] ) ) {
        ${"" . $option_name} = $option_value;
    }
}

$jobwpApplyFormStyle = $this->jobwp_get_apply_form_style_settings();
//print_r( $jobwpApplyFormStyle );
foreach ( $jobwpApplyFormStyle as $fs_name => $fs_value ) {
    if ( isset( $jobwpApplyFormStyle[$fs_name] ) ) {
        ${"" . $fs_name} = $fs_value;
    }
}

$jobwpGeneralSettings = $this->jobwp_get_general_settings();
//print_r( $jobwpGeneralSettings );
foreach ( $jobwpGeneralSettings as $option_name => $option_value ) {
    if ( isset( $jobwpGeneralSettings[$option_name] ) ) {
        ${"" . $option_name} = $option_value;
    }
}

// Shortcoded Options
$job_title  = isset( $applyFrmAttr['job_title'] ) ? $applyFrmAttr['job_title'] : '';

// Load Styling
include JOBWP_PATH . 'assets/css/apply-form.php';

if ( ! $jobwp_hide_apply_form_title ) {
    ?>
    <h3 class="jobwp-apply-title"><?php esc_html_e( $jobwp_apply_form_title ); ?></h3>
    <?php
}
?>
<form id="jobwp_upload_form" action="<?php echo get_permalink(); ?>" enctype="multipart/form-data" method="POST" autocomplete="off">

    <?php //if ( function_exists('wp_nonce_field') ) { wp_nonce_field('jobwp_apply_nonce_field'); } ?>
    <?php wp_nonce_field( 'jobwp_apply_form_action', 'jobwp_apply_form_nonce_field' ); ?>
    <input type="hidden" value="<?php esc_attr_e( $job_title ); ?>" id="jobwp_apply_for" name="jobwp_apply_for">

    <div class="jobwp-apply-form">

        <div class="jobwp-field-row">
            <label><?php esc_html_e( $jobwp_apply_form_name_label ); ?></label><span class="required">*</span>
            <input type="text" class="" placeholder="<?php esc_attr_e( $jobwp_apply_form_name_label ); ?>" id="jobwp_full_name" name="jobwp_full_name">
        </div>

        <div class="jobwp-field-row">
            <label><?php esc_html_e( $jobwp_apply_form_email_label ); ?></label><span class="required">*</span>
            <input type="email" class="" placeholder="<?php esc_attr_e( $jobwp_apply_form_email_label ); ?>" id="jobwp_email" name="jobwp_email">
        </div>

        <div class="jobwp-field-row">
            <label>Phone</label>
            <input type="tel" class="" placeholder="201-555-0123" id="jobwp_tel_1" name="jobwp_tel_1">
        </div>

        <div class="jobwp-field-row">
            <label><?php esc_html_e( $jobwp_apply_form_cover_letter_label ); ?></label>
            <textarea class="" placeholder="<?php esc_attr_e( $jobwp_apply_form_cover_letter_label ); ?>" id="jobwp_cover_letter" name="jobwp_cover_letter"></textarea>
        </div>

        <div class="jobwp-field-row">
            <label><?php _e('Upload CV/Resume', JOBWP_TXT_DOMAIN); ?></label><span class="required">*</span>
            <span><?php _e('Attach your resume. Max size 2mb', JOBWP_TXT_DOMAIN); ?></span>
            <input type="file" name="jobwp_upload_resume" id="jobwp_upload_resume" />
            <span>
                <?php 
                _e('Allowed Type(s): ', JOBWP_TXT_DOMAIN); 
                
                if ( ! job_fs()->is_plan__premium_only('pro', true) ) {
                    _e('pdf', JOBWP_TXT_DOMAIN); 
                }

                if ( job_fs()->is_plan__premium_only('pro', true) ) {
                    _e('pdf, docx', JOBWP_TXT_DOMAIN); 
                }
                ?>
            </span>
        </div>

        <?php
        if ( job_fs()->is_plan__premium_only('pro', true) ) {

            if ( 'on' !== $jobwp_apply_form_user_consent ) {
                ?>
                <div class="jobwp-field-row">
                    <input type="checkbox" name="jobwp_user_consent" id="jobwp_user_consent">&nbsp;&nbsp;<?php esc_html_e( $jobwp_apply_form_user_consent_text ); ?>
                </div>
                <?php
            }
        }
        ?>

        <?php
        if ( $jobwp_captcha_on_apply_form ) {
            ?>
            <div class="jobwp-field-row" id="jobwp-captcha-field">
                <div class="g-recaptcha" data-sitekey="<?php esc_attr_e( $jobwp_recaptcha_site_key ); ?>"></div>
                <div class="captcha-error" style="color: red;"></div>
            </div>
            <?php
        }
        ?>

        <div class="jobwp-field-row">
            <input type="submit" name="jobwp_apply_btn" id="jobwp_apply_btn" class="jobwp-primary-button" value="<?php esc_attr_e( $jobwp_apply_form_submit_btn_txt ); ?>">
        </div>

    </div>

</form>
