<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( job_fs()->is_plan__premium_only('pro', true) ) {

    include 'featured/header.php';

    if ( $jobwpJobs->have_posts() ) {

        // Load Styling
        include JOBWP_PATH . 'assets/css/featured.php';
        ?>
        <div id="jobwp-featured-wrapper-slide" class="jobwp-featured-wrapper-slide">
            <?php
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

                $jobwp_company      = get_post_meta( $post->ID, 'jobwp_company', true );
                $jobwp_company_info = get_term_by('name', $jobwp_company, 'job_company');

                if ( ! empty( $jobwp_company_info ) ) {
                    $jobwp_company_logo = get_term_meta ( $jobwp_company_info->term_id, 'jobwp_company_logo_id', true );
                } else {
                    $jobwp_company_logo = '';
                }
                ?>
                <div class="jobwp-featured-slide-item">
                    <?php
                    if ( $jobwp_display_company_logo ) {
                        if ( '' !== $jobwp_company_logo ) {
                            ?>
                            <div class="jobwp-featured-slide-img">
                                <img src="<?php echo esc_url( $jobwp_company_logo ); ?>"/>
                            </div>
                            <?php
                        }
                    }
                    ?>
                    <h3 class="jobwp-featured-title"><a href="<?php the_permalink(); ?>" class="jobwp-featured-title-a"><?php the_title(); ?></a></h3>
                    <?php
                    if ( $jobwp_display_company_name ) {
                        ?>
                        <div class="jobwp-featured-comp-name"><?php esc_html_e( $jobwp_company ); ?></div>
                        <?php
                    }

                    if ( ! $jobwp_list_display_overview ) {
                        ?>
                        <div class="jobwp-featured-overview">
                            <?php 
                            $jobwp_featured_desc = strip_tags( get_the_content() );
                            if ( strlen( $jobwp_featured_desc ) > 150 ) {
                                echo substr( $jobwp_featured_desc, 0, 150 ) . '...';
                            } else {
                                echo $jobwp_featured_desc;
                            }
                            ?>
                        </div>
                        <?php
                    }

                    if ( ! $jobwp_list_display_experience ) {
                        ?>
                        <div class="jobwp-featured-meta experience">
                            <i class="fa fa-briefcase" aria-hidden="true"></i>
                            <span class="jobwp-featured-meta-title"><?php esc_html_e( $jobwp_list_exp_lbl_txt ); ?>:</span>
                            <span class="jobwp-featured-meta-value">
                                <?php esc_html_e( $jobwp_experience ); ?> <?php _e('Years', JOBWP_TXT_DOMAIN); ?>
                            </span>
                        </div>
                        <?php
                    }

                    if ( ! $jobwp_list_display_deadline ) {
                        ?>
                        <div class="jobwp-featured-meta deadline">
                            <i class="fa fa-calendar-days" aria-hidden="true"></i>
                            <span class="jobwp-featured-meta-title"><?php esc_html_e( $jobwp_list_deadline_lbl_txt ); ?>:</span>
                            <span class="jobwp-featured-meta-value">
                                <?php esc_html_e( $jobwpDeadline ); ?>
                            </span>
                        </div>
                        <?php
                    }

                    if ( ! $jobwp_list_display_location ) {
                        ?>
                        <div class="jobwp-featured-meta deadline">
                            <i class="fa-solid fa-location-dot" aria-hidden="true"></i>
                            <span class="jobwp-featured-meta-title"><?php esc_html_e( $jobwp_list_loc_lbl_txt ); ?>:</span>
                            <span class="jobwp-featured-meta-value">
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
                    ?>
                </div>
                <?php
            }
            ?>
        </div>
        <?php
        wp_reset_postdata();
    }
}
?>