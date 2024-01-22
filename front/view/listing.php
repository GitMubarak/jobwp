<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

include 'listing/header.php';

if ( $jobwpJobs->have_posts() ) {

    $jobwp_prev_posts = ( $jobwp_paged - 1 ) * $jobwpJobs->query_vars['posts_per_page'];
    $jobwp_from       = 1 + $jobwp_prev_posts;
    $jobwp_to         = count( $jobwpJobs->posts ) + $jobwp_prev_posts;
    $jobwp_of         = $jobwpJobs->found_posts;

    if ( ! $jobwp_hide_total_jobs_found ) {
        ?>
        <div class="jobwp-total-jobs-found">
            <div class="jobwp-total-jobs-found-total"><?php echo esc_html( $jobwp_of ) . '&nbsp;' . __('Jobs Found', JOBWP_TXT_DOMAIN); ?></div>
            <div class="jobwp-total-jobs-found-per-page">    
                <?php _e('Displayed Here', JOBWP_TXT_DOMAIN); ?>: <span><?php printf( '%s - %s', $jobwp_from, $jobwp_to ); ?></span> <?php _e('Jobs', JOBWP_TXT_DOMAIN); ?>
            </div>
        </div>
        <?php
    }
    ?>
    <div class="jobwp-listing-body-container <?php esc_attr_e( $jobwp_list_layout ) ?>">
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
        ?>
    </div>
    <div class="jobwp-pagination">
        <?php
        if ( $jobwpJobs->max_num_pages > 1 ) {
            $jobwpPaginateBig = 999999999; // need an unlikely integer
            $jobwpPaginateArgs = array(
                'base'      => str_replace( $jobwpPaginateBig, '%#%', esc_url( get_pagenum_link( $jobwpPaginateBig ) ) ),
                'format'    => '?page=%#%',
                'total'     => $jobwpJobs->max_num_pages,
                'current'   => max( 1, $jobwp_paged ),
                'end_size'  => 1,
                'mid_size'  => 2,
                'prev_text' => __('« '),
                'next_text' => __(' »'),
                'type'      => 'list',
            );
            echo paginate_links( $jobwpPaginateArgs );
        }
        ?>
    </div>
    <?php
    wp_reset_postdata();
}   
else {
    ?>
    <p class="jobwp-no-jobs-found"><?php _e('No Job found', JOBWP_TXT_DOMAIN); ?></p>
    <?php
}
?>