<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

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

// Search Content
$jobwpSearchContent = $this->jobwp_get_search_content_settings();
foreach ( $jobwpSearchContent as $sc_name => $sc_value ) {
    if ( isset( $jobwpSearchContent[$sc_name] ) ) {
        ${"" . $sc_name} = $sc_value;
    }
}

// Search Styles
$jobwpSearchStyles = $this->jobwp_get_search_styles_settings();
foreach ( $jobwpSearchStyles as $ss_name => $ss_value ) {
    if ( isset( $jobwpSearchStyles[$ss_name] ) ) {
        ${"" . $ss_name} = $ss_value;
    }
}

// For Pagination
if ( is_front_page() ) {
    $jobwp_paged   = ( get_query_var('page') ) ? get_query_var('page') : 1;
} else {
    $jobwp_paged   = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
}

// Shortcoded Options
$jobwp_list_layout  = isset( $jobwpAttr['layout'] ) ? $jobwpAttr['layout'] : $jobwp_list_layout;
$jobwp_limit        = isset( $jobwpAttr['limit'] ) ? $jobwpAttr['limit'] : 10;
$jobwp_category     = isset( $jobwpAttr['category'] ) ? $jobwpAttr['category'] : '';
$jobwp_search       = isset( $jobwpAttr['hide_search'] ) ? $jobwpAttr['hide_search'] : $jobwp_hide_search_panel; // on to hide
$jobwp_order_by     = isset( $jobwpAttr['order_by'] ) ? $jobwpAttr['order_by'] : 'date'; //title-date-menu_order
$jobwp_order        = isset( $jobwpAttr['order'] ) ? $jobwpAttr['order'] : 'DESC'; //ASC/DESC

// Shortcoded options for Pro users
if ( job_fs()->is_plan__premium_only('pro', true) ) {
    
    $jobwp_company  = isset( $jobwpAttr['company'] ) ? $jobwpAttr['company'] : '';
    $jobwp_level    = isset( $jobwpAttr['level'] ) ? $jobwpAttr['level'] : '';
    $jobwp_location = isset( $jobwpAttr['location'] ) ? explode( ",", $jobwpAttr['location'] ) : [];
}

// Layout view url
$jobwp_list_layout  = isset( $_GET['layout'] ) ? sanitize_text_field( $_GET['layout'] ) : $jobwp_list_layout;

// Main Query Arguments
$jobwpQueryArrParams = array(
    'post_type'         => 'jobs',
    'post_status'       => 'publish',
    'orderby'           => $jobwp_order_by,
    'order'             => $jobwp_order,
    'posts_per_page'    => $jobwp_limit,
    'paged'             => $jobwp_paged,
    'meta_query'        => array(
        'relation' => 'AND',
        array(
            'key'     => 'jobwp_status',
            'value'   => 'active',
            'compare' => '='
        ),
    ),
    'tax_query'         => array(
        'relation' => 'AND',
    ),
);

// If Category params found in shortcode
if( $jobwp_category != '' ) {
    $jobwpQueryArrParams['tax_query'][] = array(
        array(
            'taxonomy'  => 'jobs_category',
            'field'     => 'name',
            'terms'     => $jobwp_category
        )
    );
}

// Hide Jobs When Deadline Over
if ( $jobwp_hide_jobs_deadline_over ) {

    $jobwpQueryArrParams['meta_query'][] = array(
        'key'     => 'jobwp_deadline',
        'value'   => date('Y-m-d'),
        'compare' => '>=',
        'type'    => 'DATE'
    );
}

// Pro query params
if ( job_fs()->is_plan__premium_only('pro', true) ) {

    if ( '' !== $jobwp_company ) {
        
        $jobwpQueryArrParams['meta_query'][] = array(
            array(
                'key'     => 'jobwp_company',
                'value'   => $jobwp_company,
                'compare' => '='
            ),
        );
    }

    // If level found in the shortcode
    if ( '' !== $jobwp_level ) {
        $jobwpQueryArrParams['tax_query'][] = array(
            'taxonomy' => 'jobs_level',
            'field' => 'name',
            'terms' => urldecode( $jobwp_level )
        );
    }

    // If location found in the shortcode
    if ( ! empty( $jobwp_location ) ) {
        $jobwpQueryArrParams['tax_query'][] = array(
            array(
                'taxonomy' => 'jobs_location',
                'field' => 'name',
                'terms' => $jobwp_location
            )
        );
    }
}

// Load Styling
include JOBWP_PATH . 'assets/css/listing.php';
?>
<div class="jobwp-listing-parent-wrapper">
<?php
// Load Search Panel
if ( 'on' !== $jobwp_search ) {
    include JOBWP_PATH . 'front/view/search.php';
}

$jobwpQueryArr = apply_filters( 'jobwp_front_main_query_array', $jobwpQueryArrParams );

//echo '<pre>';
//print_r($jobwpQueryArr);

$jobwpJobs = new WP_Query( $jobwpQueryArr );
?>