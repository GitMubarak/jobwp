<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $post;

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

// Search Items
$jobwp_title    =  isset( $_GET['jobwp_title'] ) ? sanitize_text_field( $_GET['jobwp_title'] ) : '';

// Main Query Arguments
$jobwpQueryArrParams = array(
    'post_type'   => 'jobs',
    'post_status' => 'publish',
    'orderby'     => 'date',
    'order'       => 'DESC',
    'meta_query'  => array(
        array(
            'key'     => 'jobwp_status',
            'value'   => 'active',
            'compare' => '='
        ),
    ),
);

// Search Query Ttitle
if ( '' != $jobwp_title ) {
    $jobwpQueryArrParams['s'] = $jobwp_title;
}

$jobwpQueryArr = apply_filters( 'jobwp_front_main_query_array', $jobwpQueryArrParams );

$jobwpJobs = new WP_Query( $jobwpQueryArr );

// Load Styling
include JOBWP_PATH . 'assets/css/listing.php';
// Load Search Panel
include JOBWP_PATH . 'front/view/search.php';
?>
<div class="jobwp-listing-body-container">
    <?php
    if ( $jobwpJobs->have_posts() ) {

        while ( $jobwpJobs->have_posts() ) {

            $jobwpJobs->the_post();

            $jobwp_experience       = get_post_meta( $post->ID, 'jobwp_experience', true );
            $jobwp_deadline         = get_post_meta( $post->ID, 'jobwp_deadline', true );
            $jobwpDateDiff          = date_diff( date_create( date('Y-m-d') ), date_create( $jobwp_deadline ) );
            $jobwpDateDiffNumber    = $jobwpDateDiff->format("%R%a");

            if ( $jobwpDateDiffNumber > -1 ) {
                $jobwpDeadline = date( 'd M, Y', strtotime( $jobwp_deadline ) );
            } else {
                $jobwpDeadline = __( 'Closed', JOBWP_TXT_DOMAIN );
            }
            ?>
            <div class="jobwp-item">
                <h3 class="jobwp-job-title"><a href="<?php the_permalink(); ?>" class="jobwp-job-title-a"><?php the_title(); ?></a></h3>
                <?php
                if ( ! $jobwp_list_display_overview ) {
                    ?>
                    <p class="jobwp-overview-excerpt">
                        <?php echo wp_trim_words( get_the_content(), esc_html( $jobwp_list_overview_length ), '...' ); ?>
                    </p>
                    <?php
                }
                ?>
                <div class="jobwp-bottom">
                    <p class="jobwp-list-bottom-item pull-left">
                        <i class="fa fa-briefcase" aria-hidden="true"></i>
                        <strong class="primary-color"><?php esc_html_e( $jobwp_list_exp_lbl_txt ); ?>:</strong> <span class="ng-binding"><?php esc_html_e( $jobwp_experience ); ?> <?php _e('Years', JOBWP_TXT_DOMAIN); ?></span></p>
                    <p class="jobwp-list-bottom-item pull-right">
                        <i class="fa fa-calendar-o" aria-hidden="true"></i>
                        <strong class="primary-color"><?php esc_html_e( $jobwp_list_deadline_lbl_txt ); ?>:</strong> <span class="ng-binding"><?php esc_html_e( $jobwpDeadline ); ?></span></p>
                </div>
                <div class="clear"></div>
            </div>
            <?php
        }
        wp_reset_postdata();
    }
    ?>
</div>