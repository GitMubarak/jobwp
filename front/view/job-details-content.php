<?php
/**
 * Template: content-my-item.php
 * * Note: No loop wrapper needed! The global $post is already set up.
 */

// Secure the template so it can't be accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

global $post;

include 'single/header.php';

// Load anything before single_body_container
do_action( 'jobwp_single_before_body_container' );
?>
<div class="jobwp-single-body-container <?php esc_attr_e( $jobwp_single_layout ) ?>">
	<?php
    $job_title      = get_the_title();
    $job_overview   = get_the_content();

    include 'single/post-meta.php';

    include 'single/top-title.php';

    include 'single/job-details.php';

    include 'single/apply-procedure.php';
    ?>
</div>
<?php
// Load anything after single_body_container
do_action( 'jobwp_single_after_body_container' );

// Application form modal
include 'single/applyform-modal.php';

// load structured data
include 'single/structured-data.php';
?>