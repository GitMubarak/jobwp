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

if ( ! $jobwp_hide_apply_form_title ) {
    ?>
    <h3 class="jobwp-apply-title"><?php esc_html_e( $jobwp_apply_form_title ); ?></h3>
    <?php
}
?>
<form id="jobwp_upload_form" action="<?php echo get_permalink(); ?>" enctype="multipart/form-data" method="POST" autocomplete="off">

    <?php //if ( function_exists('wp_nonce_field') ) { wp_nonce_field('jobwp_apply_nonce_field'); } ?>
    <?php wp_nonce_field( 'jobwp_apply_form_action', 'jobwp_apply_form_nonce_field' ); ?>
    <input type="hidden" value="<?php echo the_title(); ?>" id="jobwp_apply_for" name="jobwp_apply_for">

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
            <label><?php esc_html_e( $jobwp_apply_form_cover_letter_label ); ?></label>
            <textarea class="" placeholder="<?php esc_attr_e( $jobwp_apply_form_cover_letter_label ); ?>" id="jobwp_cover_letter" name="jobwp_cover_letter"></textarea>
        </div>

        <div class="jobwp-field-row">
            <label><?php _e('Upload CV/Resume', JOBWP_TXT_DOMAIN); ?></label><span class="required">*</span>
            <span><?php _e('Attach your resume. Max size 2mb', JOBWP_TXT_DOMAIN); ?></span>
            <input type="file" name="jobwp_upload_resume" id="jobwp_upload_resume" />
            <span><?php _e('Allowed Type(s): .pdf', JOBWP_TXT_DOMAIN); ?></span>
        </div>

        <div class="jobwp-field-row">
            <input type="submit" name="jobwp_apply_btn" id="jobwp_apply_btn" class="jobwp-primary-button" value="<?php esc_attr_e( $jobwp_apply_form_submit_btn_txt ); ?>">
        </div>

    </div>

</form>
