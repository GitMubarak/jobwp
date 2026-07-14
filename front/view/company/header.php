<?php
# Silence is golden.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$job_url = isset( $attr['url'] ) ? sanitize_text_field( wp_unslash( $attr['url'] ) ) : '';

// Load Styling
include JOBWP_PATH . 'assets/css/company-directory.php';
?>