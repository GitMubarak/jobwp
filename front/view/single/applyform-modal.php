<div id="jobwp-apply-form-modal" class="jobwp-apply-form-modal">
    <?php
    if ( $jobwp_ext_application_form ) {
        echo do_shortcode( stripslashes( $jobwp_ext_application_form_shortcode ) );
    } else {
        echo do_shortcode('[jobwp_apply_form job_title="' . $post->post_title . '"]');
    }
    ?>
</div>