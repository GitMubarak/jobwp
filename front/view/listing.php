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

// Load Styling
include JOBWP_PATH . 'assets/css/listing.php';
// Load Search Panel
include JOBWP_PATH . 'front/view/search.php';

$jobwpQueryArr = apply_filters( 'jobwp_front_main_query_array', $jobwpQueryArrParams );

$jobwpJobs = new WP_Query( $jobwpQueryArr );
?>
<div class="jobwp-listing-body-container <?php esc_attr_e( $jobwp_list_layout ) ?>">
    <?php
    if ( $jobwpJobs->have_posts() ) {

        while ( $jobwpJobs->have_posts() ) {

            $jobwpJobs->the_post();

            $jobwp_experience       = get_post_meta( $post->ID, 'jobwp_experience', true );
            $jobwp_deadline         = get_post_meta( $post->ID, 'jobwp_deadline', true );
            $jobs_location          = wp_get_post_terms( $post->ID, 'jobs_location', array('fields' => 'all') );
            $jobs_nature            = wp_get_post_terms( $post->ID, 'jobs_nature', array('fields' => 'all') );
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
                    <?php
                    if ( ! $jobwp_list_display_experience ) {
                        ?>
                        <div class="jobwp-list-bottom-item pull-left">
                            <i class="fa fa-briefcase" aria-hidden="true"></i>
                            <strong class="primary-color"><?php esc_html_e( $jobwp_list_exp_lbl_txt ); ?>:</strong>
                            <span class="ng-binding">
                                <?php esc_html_e( $jobwp_experience ); ?> <?php _e('Years', JOBWP_TXT_DOMAIN); ?>
                            </span>
                        </div>
                        <?php
                    }

                    if ( ! $jobwp_list_display_deadline ) {
                        ?>
                        <div class="jobwp-list-bottom-item pull-right">
                            <i class="fa fa-calendar-days" aria-hidden="true"></i>
                            <strong class="primary-color"><?php esc_html_e( $jobwp_list_deadline_lbl_txt ); ?>:</strong>
                            <span class="ng-binding">
                                <?php esc_html_e( $jobwpDeadline ); ?>
                            </span>
                        </div>
                        <?php
                    }
                    ?>
                </div>
                <div class="jobwp-bottom clear">
                    <?php
                    if ( ! $jobwp_list_display_location ) {
                        ?>
                        <div class="jobwp-list-bottom-item pull-left">
                            <i class="fa-solid fa-location-dot"></i>
                            <strong class="primary-color"><?php esc_html_e( $jobwp_list_loc_lbl_txt ); ?>:</strong>
                            <span>
                            <?php
                            if ( ! empty( $jobs_location ) ) {
                                $jobs_location_arr = array();
                                foreach( $jobs_location as $location ) {
                                    $jobs_location_arr[] = $location->name . '';
                                }
                                echo implode( ', ', $jobs_location_arr );   
                            }
                            ?>
                            </span>
                        </div>
                        <?php
                    }

                    if ( ! $jobwp_list_display_jtype ) {
                        ?>
                        <div class="jobwp-list-bottom-item pull-right">
                            <i class="fa-solid fa-graduation-cap"></i>
                            <strong class="primary-color"><?php esc_html_e( $jobwp_list_job_type_lbl_txt ); ?>:</strong>
                            <span>
                            <?php
                            if ( ! empty( $jobs_nature ) ) {
                                $jobs_nature_arr = array();
                                foreach( $jobs_nature as $type ) {
                                    $jobs_nature_arr[] = $type->name . '';
                                }
                                echo implode( ', ', $jobs_nature_arr );   
                            }
                            ?>
                            </span>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>
            <?php
        }
    }   
    else {
        ?>
        <p class="jobwp-no-jobs-found"><?php _e('No Jobs found', JOBWP_TXT_DOMAIN); ?></p>
        <?php
    }
      
    // Reset Post Data
    wp_reset_postdata();
    ?>
</div>