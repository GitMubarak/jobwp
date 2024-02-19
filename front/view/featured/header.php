<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( job_fs()->is_plan__premium_only('pro', true) ) {

    global $post;

    $jobwpGeneralSettings = $this->jobwp_get_general_settings();
    //print_r( $jobwpGeneralSettings );
    foreach ( $jobwpGeneralSettings as $option_name => $option_value ) {
        if ( isset( $jobwpGeneralSettings[$option_name] ) ) {
            ${"" . $option_name} = $option_value;
        }
    }

    $jobwpListingContent = $this->jobwp_get_listing_content_settings();
    //print_r( $jobwpListingContent );
    foreach ( $jobwpListingContent as $option_name => $option_value ) {
        if ( isset( $jobwpListingContent[$option_name] ) ) {
            ${"" . $option_name} = $option_value;
        }
    }

    $jobwpListingStyles = $this->jobwp_get_listing_styles_settings();
    foreach ( $jobwpListingStyles as $option_name => $option_value ) {
        if ( isset( $jobwpListingStyles[$option_name] ) ) {
            ${"" . $option_name} = $option_value;
        }
    }

    // Shortcoded Options
    $jobwp_company  = isset( $attr['company'] ) ? $attr['company'] : '';

    // Main Query Arguments
    $jobwpQueryArr = array(
        'post_type'         => 'jobs',
        'post_status'       => 'publish',
        'orderby'           => 'date',
        'order'             => 'DESC',
        'meta_query'  => array(
            array(
                'key'     => 'jobwp_status',
                'value'   => 'active',
                'compare' => '='
            ),
        ),
    );

    // Hide Jobs When Deadline Over
    if ( $jobwp_hide_jobs_deadline_over ) {

        $jobwpQueryArr['meta_query'] = array(
            array(
                'key'     => 'jobwp_deadline',
                'value'   => date('Y-m-d'),
                'compare' => '>=',
                'type'    => 'DATE'
            ),
        );
    }

    // Jobs of a Company
    if ( '' !== $jobwp_company ) {
        
        $jobwpQueryArr['meta_query'] = array(
            array(
                'key'     => 'jobwp_company',
                'value'   => $jobwp_company,
                'compare' => '='
            ),
        );
    }

    $jobwpJobs = new WP_Query( $jobwpQueryArr );
}
?>