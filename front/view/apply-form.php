<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<div id="jobwp-apply-form-modal" class="jobwp-apply-form-modal">
    
    <h3 class="jobwp-apply-title"><?php _e('Apply for this position', JOBWP_TXT_DOMAIN); ?></h3>

    <form id="jobwp_upload_form" action="<?php echo get_permalink(); ?>" enctype="multipart/form-data" method="POST" autocomplete="off">

        <?php if( function_exists('wp_nonce_field') ) { wp_nonce_field('jobwp_apply_nonce_field'); } ?>
        <input type="hidden" value="<?php echo the_title(); ?>" id="jobwp_apply_for" name="jobwp_apply_for">

        <div class="jobwp-apply-form">

            <div class="jobwp-field-row">
                <label><?php _e('Full Name', JOBWP_TXT_DOMAIN); ?></label><span class="required">*</span>
                <input type="text" class="" placeholder="<?php _e('Full Name', JOBWP_TXT_DOMAIN); ?>" id="jobwp_full_name" name="jobwp_full_name">
            </div>

            <div class="jobwp-field-row">
                <label><?php _e('Email', JOBWP_TXT_DOMAIN); ?></label><span class="required">*</span>
                <input type="email" class="" placeholder="<?php _e('Email', JOBWP_TXT_DOMAIN); ?>" id="jobwp_email" name="jobwp_email">
            </div>

            <div class="jobwp-field-row">
                <label><?php _e('Cover Letter', JOBWP_TXT_DOMAIN); ?></label>
                <textarea class="" placeholder="<?php _e('Cover Letter', JOBWP_TXT_DOMAIN); ?>" id="jobwp_cover_letter" name="jobwp_cover_letter"></textarea>
            </div>

            <div class="jobwp-field-row">
                <label><?php _e('Upload CV/Resume', JOBWP_TXT_DOMAIN); ?></label><span class="required">*</span>
                <span><?php _e('Attach your resume. Max size 2mb', JOBWP_TXT_DOMAIN); ?></span>
                <input type="file" name="jobwp_upload_resume" id="jobwp_upload_resume" />
                <span><?php _e('Allowed Type(s): .pdf', JOBWP_TXT_DOMAIN); ?></span>
            </div>

            <div class="jobwp-field-row">
                <input type="submit" name="jobwp_apply_btn" id="jobwp_apply_btn" class="jobwp-primary-button" value="<?php _e('Apply Now', JOBWP_TXT_DOMAIN); ?>">
            </div>

        </div>

    </form>
</div>