<?php
# Silence is golden.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();

global $post;

include 'single/header.php';

// Load anything before single_body_container
do_action( 'jobwp_single_before_body_container' );
?>
<div class="jobwp-single-body-container <?php esc_attr_e( $jobwp_single_layout ) ?>">
	<?php
    if ( have_posts() ) { 
        
        while ( have_posts() ) {
            
            the_post();

            $job_title      = get_the_title();
            $job_overview   = get_the_content();

            include 'single/post-meta.php';
            
            include 'single/top-title.php';
            
            include 'single/job-details.php';
        }

        include 'single/apply-procedure.php';
    }
    ?>
</div>
<?php
// Load anything after single_body_container
do_action( 'jobwp_single_after_body_container' );

//Application form modal
include 'single/applyform-modal.php';

get_footer(); 
?>