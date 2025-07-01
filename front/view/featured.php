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
                $bo_job_salary          = get_post_meta( $post->ID, 'jobwp_salary', true );
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
                    <h3 class="jobwp-featured-title">
                        <a href="<?php the_permalink(); ?>" class="jobwp-featured-title-a">
                            <?php echo wp_trim_words( get_the_title(), $title_length, '...' ); ?>
                        </a>
                    </h3>
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
                            echo force_balance_tags( html_entity_decode( wp_trim_words( htmlentities( wpautop( get_the_content() ) ), $jobwp_list_overview_length, '...' ) ) );
                            ?>
                        </div>
                        <?php
                    }

                    if ( ! $jobwp_list_display_experience ) {
                        ?>
                        <div class="jobwp-featured-meta experience">
                            <?php
                            if ( ! $jobwp_display_listing_icon ) {
                                ?>
                                <i class="fa fa-briefcase" aria-hidden="true"></i>
                                <?php
                            }
                            ?>
                            <span class="jobwp-featured-meta-title"><?php esc_html_e( $jobwp_list_exp_lbl_txt ); ?></span>
                            <span class="jobwp-featured-meta-value">
                                <?php esc_html_e( $jobwp_experience ); ?>
                            </span>
                        </div>
                        <?php
                    }

                    if ( ! $jobwp_list_display_deadline ) {
                        ?>
                        <div class="jobwp-featured-meta deadline">
                            <?php
                            if ( ! $jobwp_display_listing_icon ) {
                                ?>
                                <i class="fa fa-calendar-days" aria-hidden="true"></i>
                                <?php
                            }
                            ?>
                            <span class="jobwp-featured-meta-title"><?php esc_html_e( $jobwp_list_deadline_lbl_txt ); ?></span>
                            <span class="jobwp-featured-meta-value">
                                <?php esc_html_e( $jobwpDeadline ); ?>
                            </span>
                        </div>
                        <?php
                    }

                    if ( ! $jobwp_list_display_location ) {
                        ?>
                        <div class="jobwp-featured-meta location">
                            <?php
                            if ( ! $jobwp_display_listing_icon ) {
                                ?>
                                <i class="fa-solid fa-location-dot" aria-hidden="true"></i>
                                <?php
                            }
                            ?>
                            <span class="jobwp-featured-meta-title"><?php esc_html_e( $jobwp_list_loc_lbl_txt ); ?></span>
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

                    if ( ! $jobwp_list_display_jtype ) {
                        ?>
                        <div class="jobwp-featured-meta job-type">
                            <?php
                            if ( ! $jobwp_display_listing_icon ) {
                                ?>
                                <i class="fa-solid fa-graduation-cap"></i>
                                <?php
                            }
                            ?>
                            <span class="jobwp-featured-meta-title"><?php esc_html_e( $jobwp_list_job_type_lbl_txt ); ?></span>
                            <span class="jobwp-featured-meta-value">
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

                    if ( 'show' === $display_salary ) {

                        if ( ! empty( $bo_job_salary ) ) {
                        ?>
                        <div class="jobwp-featured-meta job-type">
                            <?php
                            if ( ! $jobwp_display_listing_icon ) {
                                ?>
                                <i class="fa-solid fa-sack-dollar"></i>
                                <?php
                            }
                            ?>
                            <span class="jobwp-featured-meta-title"><?php esc_html_e( $jobwp_list_salary_lbl_txt ); ?></span>
                            <span class="jobwp-featured-meta-value">
                                <?php echo wp_kses_post( $bo_job_salary ); ?>
                            </span>
                        </div>
                        <?php
                        }
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