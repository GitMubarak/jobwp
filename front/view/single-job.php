<?php
# Silence is golden.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( job_fs()->is_plan__premium_only('pro', true) ) {
    
    include 'single/header.php';

    // Shortcoded Options
    $jobID  = isset( $attr['post_id'] ) ? $attr['post_id'] : '';
    $post   = get_post( $jobID );
    
    if ( ! empty( $post )) {

        ?>
        <div class="jobwp-single-body-container">
            <?php
            $job_title      = $post->post_title;
            $job_overview   = $post->post_content;

            include 'single/post-meta.php';

            include 'single/top-title.php';
            
            include 'single/job-details.php';

            include 'single/apply-procedure.php';
            ?>
        </div>
        <?php
        // Application form modal
        include 'single/applyform-modal.php';
    
    } else {
        esc_html_e( 'No job available!', 'jobwp' );
    }
}
?>