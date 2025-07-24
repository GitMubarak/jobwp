<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

include 'listing/header.php';

//$listing_item_arr = ['experience', 'deadline', 'location', 'jobtype', 'salary', 'role', 'vacancy', 'publishdate'];
$listing_item_arr = [];

for ( $lia=1; $lia<9; $lia++ ) {

    if ( $lia == $jobwp_list_exp_order ) {
        $listing_item_arr[] = 'experience';
    }
    if ( $lia == $jobwp_list_deadline_order ) {
        $listing_item_arr[] = 'deadline';
    }
    if ( $lia == $jobwp_list_loc_order ) {
        $listing_item_arr[] = 'location';
    }
    if ( $lia == $jobwp_list_jobtype_order ) {
        $listing_item_arr[] = 'jobtype';
    }

    if ( job_fs()->is_plan__premium_only('pro', true) ) {

        
        if ( $lia == $jobwp_list_salary_order ) {
            $listing_item_arr[] = 'salary';
        }
        if ( $lia == $jobwp_list_role_order ) {
            $listing_item_arr[] = 'role';
        } 
        if ( $lia == $jobwp_list_vacancy_order ) {
            $listing_item_arr[] = 'vacancy';
        }        
        if ( $lia == $jobwp_list_pdate_order ) {
            $listing_item_arr[] = 'publishdate';
        } 
    }
}
//echo '<pre>';
//print_r( $listing_item_arr );

if ( $jobwpJobs->have_posts() ) {

    $jobwp_prev_posts = ( $jobwp_paged - 1 ) * $jobwpJobs->query_vars['posts_per_page'];
    $jobwp_from       = 1 + $jobwp_prev_posts;
    $jobwp_to         = count( $jobwpJobs->posts ) + $jobwp_prev_posts;
    $jobwp_of         = $jobwpJobs->found_posts;
    ?>
    <div class="jobwp-listing-top">
        <?php
        if ( ! $jobwp_hide_total_jobs_found ) {
            ?>
            <div class="jobwp-total-jobs-found">
                <div class="jobwp-total-jobs-found-total"><?php echo esc_html( $jobwp_of ) . '&nbsp;' . __( $jobwp_total_jobs_found_lbl_txt ); ?></div>
                <div class="jobwp-total-jobs-found-per-page">    
                    <?php _e('Displayed Here', JOBWP_TXT_DOMAIN); ?>: <span><?php printf( '%s - %s', $jobwp_from, $jobwp_to ); ?></span> <?php _e('Jobs', JOBWP_TXT_DOMAIN); ?>
                </div>
            </div>
            <?php
        }
        ?>
        <div class="jobwp-select-view">
            <?php _e('View', JOBWP_TXT_DOMAIN); ?>:
            <span class="view list <?php echo ( 'list' === $jobwp_list_layout ) ? 'active' : ''; ?>" data-view_type="list"><i class="fa fa-list" aria-hidden="true"></i></span>
            <span class="view grid <?php echo ( 'grid' === $jobwp_list_layout ) ? 'active' : ''; ?>" data-view_type="grid"><i class="fas fa-th-large"></i></span>
        </div>
    </div>
    <div class="jobwp-listing-body-container <?php esc_attr_e( $jobwp_list_layout ) ?>">
        <?php
        while ( $jobwpJobs->have_posts() ) {

            $jobwpJobs->the_post();

            $jobwp_experience       = get_post_meta( $post->ID, 'jobwp_experience', true );
            $jobwp_deadline         = get_post_meta( $post->ID, 'jobwp_deadline', true );
            $bo_job_salary          = get_post_meta( $post->ID, 'jobwp_salary', true );
            $bo_job_responsibilities = get_post_meta( $post->ID, 'jobwp_responsibilities', true );
            $bo_vacancies           = get_post_meta( $post->ID, 'jobwp_vacancies', true );
            $jobs_location          = wp_get_post_terms( $post->ID, 'jobs_location', array('fields' => 'all') );
            $jobs_nature            = wp_get_post_terms( $post->ID, 'jobs_nature', array('fields' => 'all') );
            $jobwpDateDiff          = date_diff( date_create( date('Y-m-d') ), date_create( $jobwp_deadline ) );
            $jobwpDateDiffNumber    = $jobwpDateDiff->format("%R%a");

            if ( $jobwpDateDiffNumber > -1 ) {
                $jobwpDeadline = date( 'd M, Y', strtotime( $jobwp_deadline ) );
            } else {
                $jobwpDeadline = __( 'Closed', JOBWP_TXT_DOMAIN );
            }

            if ( job_fs()->is_plan__premium_only('pro', true) ) {
                
                $jobwp_company      = get_post_meta( $post->ID, 'jobwp_company', true );
                $jobwp_company_info = get_term_by('name', $jobwp_company, 'job_company');

                if ( ! empty( $jobwp_company_info ) ) {
                    $jobwp_company_logo = get_term_meta ( $jobwp_company_info->term_id, 'jobwp_company_logo_id', true );
                } else {
                    $jobwp_company_logo = '';
                }
            }
            ?>
            <div class="jobwp-item">
                <div class="jobwp-top">
                    <?php
                    if ( job_fs()->is_plan__premium_only('pro', true) ) {
                        if ( 'grid' === $jobwp_list_layout ) {
                            if ( $jobwp_display_company_logo ) {
                                if ( '' !== $jobwp_company_logo ) {
                                    ?>
                                    <div class="jobwp-top-img">
                                        <img src="<?php echo esc_url( $jobwp_company_logo ); ?>"/>
                                    </div>
                                    <?php
                                }
                            }
                        }
                    }
                    ?>
                    <div class="jobwp-top-left">
                        <h3 class="jobwp-job-title">
                            <a href="<?php the_permalink(); ?>" class="jobwp-job-title-a">
                                <?php echo wp_trim_words( get_the_title(), $jobwp_list_title_length, '...' ); ?>
                            </a>
                        </h3>
                        <?php
                        if ( job_fs()->is_plan__premium_only('pro', true) ) {
                            if ( $jobwp_display_company_name ) {
                                ?>
                                <div class="jwb-list-comp-name"><?php esc_html_e( $jobwp_company ); ?></div>
                                <?php
                            }
                        }
                        
                        // Over view
                        if ( ! $jobwp_list_display_overview ) {
                            echo force_balance_tags( html_entity_decode( wp_trim_words( htmlentities( wpautop( get_the_content() ) ), $jobwp_list_overview_length, '...' ) ) );
                        }

                        // Read More Button
                        if ( job_fs()->is_plan__premium_only('pro', true) ) {
                            if ( $jobwp_display_listing_read_more ) {
                                ?>
                                <a href="<?php the_permalink(); ?>" class="jobwp-read-more"><?php esc_html_e( $jobwp_listing_read_more_txt ); ?></a>
                                <?php
                            }
                        }
                        ?>
                    </div>
                    <?php
                    if ( job_fs()->is_plan__premium_only('pro', true) ) {
                        if ( 'grid' !== $jobwp_list_layout ) {
                            if ( $jobwp_display_company_logo ) {
                                ?>
                                <div class="jobwp-top-right">
                                    <img src="<?php echo esc_url( $jobwp_company_logo ); ?>"/>
                                </div>
                                <?php
                            }
                        }
                    }
                    ?>
                </div>
                <div class="jobwp-list-info-wrapper">
                    <?php
                    $item = 0;
                    foreach ( $listing_item_arr as $infoItems ) {
                        
                        // experience
                        if ( 'experience' === $infoItems ) {

                            if ( ! $jobwp_list_display_experience ) {

                                if ( '' !== $jobwp_experience ) {
                                    
                                    $item++;
                                    $pull_position = ( $item % 2 == 0 ) ? 'pull-right' : 'pull-left';
                                    ?>
                                    <div class="jobwp-list-info-item">
                                        <div class="jobwp-list-bottom-item <?php esc_attr_e( $pull_position ); ?>">
                                            <?php
                                            if ( ! $jobwp_display_listing_icon ) {
                                                ?>
                                                <i class="fa fa-briefcase" aria-hidden="true"></i>
                                                <?php
                                            }
                                            ?>
                                            <strong class="primary-color"><?php esc_html_e( $jobwp_list_exp_lbl_txt ); ?></strong>
                                            <span class="ng-binding">
                                                <?php esc_html_e( $jobwp_experience ); ?>
                                            </span>
                                        </div>
                                    </div>
                                    <?php
                                }
                            }
                        }
                        // deadline
                        if ( 'deadline' === $infoItems ) {

                            if ( ! $jobwp_list_display_deadline ) {

                                $item++;
                                $pull_position = ( $item % 2 == 0 ) ? 'pull-right' : 'pull-left';
                                ?>
                                <div class="jobwp-list-info-item">
                                    <div class="jobwp-list-bottom-item <?php esc_attr_e( $pull_position ); ?>">
                                        <?php
                                        if ( ! $jobwp_display_listing_icon ) {
                                            ?>
                                            <i class="fa fa-calendar-days" aria-hidden="true"></i>
                                            <?php
                                        }
                                        ?>
                                        <strong class="primary-color"><?php esc_html_e( $jobwp_list_deadline_lbl_txt ); ?></strong>
                                        <span class="ng-binding">
                                            <?php esc_html_e( $jobwpDeadline ); ?>
                                        </span>
                                    </div>
                                </div>
                                <?php
                            }
                        }
                        // Location 
                        if ( 'location' === $infoItems ) {

                            if ( ! $jobwp_list_display_location ) {

                                if ( ! empty( $jobs_location ) ) {

                                    $item++;
                                    $pull_position = ( $item % 2 == 0 ) ? 'pull-right' : 'pull-left';
                                    $jobs_location_arr = array();
                                    ?>
                                    <div class="jobwp-list-info-item">
                                        <div class="jobwp-list-bottom-item <?php esc_attr_e( $pull_position ); ?>">
                                            <?php
                                            if ( ! $jobwp_display_listing_icon ) {
                                                ?>
                                                <i class="fa-solid fa-location-dot"></i>
                                                <?php
                                            }
                                            ?>
                                            <strong class="primary-color"><?php esc_html_e( $jobwp_list_loc_lbl_txt ); ?></strong>
                                            <span>
                                            <?php
                                            foreach( $jobs_location as $location ) {
                                                $jobs_location_arr[] = $location->name . '';
                                            }
                                            echo implode( ', ', $jobs_location_arr );
                                            ?>
                                            </span>
                                        </div>
                                    </div>
                                    <?php
                                }
                            }
                        }
                        // Job Type 
                        if ( 'jobtype' === $infoItems ) {

                            if ( ! $jobwp_list_display_jtype ) {

                                if ( ! empty( $jobs_nature ) ) {

                                    $item++;
                                    $pull_position = ( $item % 2 == 0 ) ? 'pull-right' : 'pull-left';
                                    $jobs_nature_arr = array();
                                    ?>
                                    <div class="jobwp-list-info-item">
                                        <div class="jobwp-list-bottom-item <?php esc_attr_e( $pull_position ); ?>">
                                            <?php
                                            if ( ! $jobwp_display_listing_icon ) {
                                                ?>
                                                <i class="fa-solid fa-graduation-cap"></i>
                                                <?php
                                            }
                                            ?>
                                            <strong class="primary-color"><?php esc_html_e( $jobwp_list_job_type_lbl_txt ); ?></strong>
                                            <span>
                                            <?php
                                            foreach( $jobs_nature as $type ) {
                                                $jobs_nature_arr[] = $type->name . '';
                                            }
                                            echo implode( ', ', $jobs_nature_arr );
                                            ?>
                                            </span>
                                        </div>
                                    </div>
                                    <?php
                                }
                            }
                        }

                        if ( job_fs()->is_plan__premium_only('pro', true) ) {

                            // Salary
                            if ( 'salary' === $infoItems ) {

                                if ( $jobwp_list_display_salary ) {

                                    if ( ! empty( $bo_job_salary ) ) {

                                        $item++;
                                        $pull_position = ( $item % 2 == 0 ) ? 'pull-right' : 'pull-left';
                                        ?>
                                        <div class="jobwp-list-info-item">
                                            <div class="jobwp-list-bottom-item <?php esc_attr_e( $pull_position ); ?>">
                                                <?php
                                                if ( ! $jobwp_display_listing_icon ) {
                                                    ?>
                                                    <i class="fa-solid fa-sack-dollar"></i>
                                                    <?php
                                                }
                                                ?>
                                                <strong class="primary-color"><?php esc_html_e( $jobwp_list_salary_lbl_txt ); ?></strong>
                                                <span class="ng-binding">
                                                    <?php echo wp_kses_post( $bo_job_salary ); ?>
                                                </span>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                }
                            }

                            // Role
                            if ( 'role' === $infoItems ) {

                                if ( $jobwp_list_display_responsibility ) {

                                    if ( ! empty( $bo_job_responsibilities ) ) {

                                        $item++;
                                        $pull_position = ( $item % 2 == 0 ) ? 'pull-right' : 'pull-left';
                                        ?>
                                        <div class="jobwp-list-info-item">
                                            <div class="jobwp-list-bottom-item <?php esc_attr_e( $pull_position ); ?>">
                                                <?php
                                                if ( ! $jobwp_display_listing_icon ) {
                                                    ?>
                                                    <i class="fa-solid fa-list-check"></i>
                                                    <?php
                                                }
                                                ?>
                                                <strong class="primary-color"><?php esc_html_e( $jobwp_list_respo_lbl_txt ); ?></strong>
                                                <span class="ng-binding">
                                                    <?php echo wp_kses_post( $bo_job_responsibilities ); ?>
                                                </span>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                }
                            }

                            // Vacancy
                            if ( 'vacancy' === $infoItems ) {

                                if ( $jobwp_list_display_vacancy ) {

                                    if ( ! empty( $bo_vacancies ) ) {

                                        $item++;
                                        $pull_position = ( $item % 2 == 0 ) ? 'pull-right' : 'pull-left';
                                        ?>
                                        <div class="jobwp-list-info-item">
                                            <div class="jobwp-list-bottom-item <?php esc_attr_e( $pull_position ); ?>">
                                                <?php
                                                if ( ! $jobwp_display_listing_icon ) {
                                                    ?>
                                                    <i class="fa-solid fa-users"></i>
                                                    <?php
                                                }
                                                ?>
                                                <strong class="primary-color"><?php esc_html_e( $jobwp_list_vacancy_lbl_txt ); ?></strong>
                                                <span class="ng-binding">
                                                    <?php echo wp_kses_post( $bo_vacancies ); ?>
                                                </span>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                }
                            }

                            // Publish Date
                            if ( 'publishdate' === $infoItems ) {

                                if ( $jobwp_list_display_publish_date ) {

                                    $item++;
                                    $pull_position = ( $item % 2 == 0 ) ? 'pull-right' : 'pull-left';
                                    ?>
                                    <div class="jobwp-list-info-item">
                                        <div class="jobwp-list-bottom-item <?php esc_attr_e( $pull_position ); ?>">
                                            <?php
                                            if ( ! $jobwp_display_listing_icon ) {
                                                ?>
                                                <i class="fa fa-calendar-days"></i>
                                                <?php
                                            }
                                            ?>
                                            <strong class="primary-color"><?php esc_html_e( $jobwp_list_publish_date_lbl_txt ); ?></strong>
                                            <span class="ng-binding">
                                                <?php echo get_the_date( 'd M, Y' ); ?>
                                            </span>
                                        </div>
                                    </div>
                                    <?php
                                }
                            }
                            // Publish Date Ended
                        }
                    }
                    ?>
                </div>
            </div>
            <?php
        }
        ?>
    </div>
    <?php
    if ( ! $jobwp_hide_pagination ) {
        ?>
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
    }
    ?>
    <?php
    wp_reset_postdata();
}   
else {
    ?>
    <p class="jobwp-no-jobs-found"><?php _e('No Job found', JOBWP_TXT_DOMAIN); ?></p>
    <?php
}
?>