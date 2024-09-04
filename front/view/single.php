<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

include 'single/header.php';
?>
<div class="jobwp-single-body-container">
	<?php
    if ( have_posts() ) { 
        
        while ( have_posts() ) {
            
            the_post();

            $jobs_nature                    = wp_get_post_terms( $post->ID, 'jobs_nature', array('fields' => 'all') );
            $jobs_level                     = wp_get_post_terms( $post->ID, 'jobs_level', array('fields' => 'all') );
            $jobs_location                  = wp_get_post_terms( $post->ID, 'jobs_location', array('fields' => 'all') );
            $bo_experience                  = get_post_meta( $post->ID, 'jobwp_experience', true );
            $bo_vacancies                   = get_post_meta( $post->ID, 'jobwp_vacancies', true );
            $bo_job_nature                  = get_post_meta( $post->ID, 'jobwp_nature', true );
            $bo_job_level                   = get_post_meta( $post->ID, 'jobwp_level', true );
            $bo_job_location                = get_post_meta( $post->ID, 'jobwp_location', true );
            $jobwp_edu_req                  = get_post_meta( $post->ID, 'jobwp_edu_req', true );
            $bo_career_skills               = get_post_meta( $post->ID, 'jobwp_skills', true );
            $bo_job_responsibilities        = get_post_meta( $post->ID, 'jobwp_responsibilities', true );
            $bo_job_additional_requirements = get_post_meta( $post->ID, 'jobwp_add_req', true );
            $bo_other_benefits              = get_post_meta( $post->ID, 'jobwp_other_benefits', true );
            $bo_job_salary                  = get_post_meta( $post->ID, 'jobwp_salary', true );
            $jobwp_application_url          = get_post_meta( $post->ID, 'jobwp_application_url', true );

            if ( job_fs()->is_plan__premium_only('pro', true) ) {
                
                $jobwp_company              = get_post_meta( $post->ID, 'jobwp_company', true );
                $jobwp_company_info         = get_term_by('name', $jobwp_company, 'job_company');

                if ( ! empty( $jobwp_company_info ) ) {
                    $jobwp_company_logo     = get_term_meta ( $jobwp_company_info->term_id, 'jobwp_company_logo_id', true );
                } else {
                    $jobwp_company_logo = '';
                }
            }
            ?>
            <div class="circulr-details-top">
                <div class="single-top-left">
                    <<?php esc_attr_e( $jobwp_single_title_tag ); ?> class="jobwp-job-title"><?php the_title(); ?></<?php esc_attr_e( $jobwp_single_title_tag ); ?>>
                    <?php
                    if ( job_fs()->is_plan__premium_only('pro', true) ) {
                        if ( $jobwp_single_display_company_name ) {
                            ?>
                            <div class="jwb-single-comp-name"><?php esc_html_e( $jobwp_company ); ?></div>
                            <?php
                        }
                    }
                    ?>
                </div>
                <?php
                if ( job_fs()->is_plan__premium_only('pro', true) ) {
                    
                    if ( $jobwp_single_display_company_logo ) {
                        ?>
                        <div class="single-top-right">
                            <img src="<?php echo esc_url( $jobwp_company_logo ); ?>"/>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>
            <?php
            if ( null !== $resumeUploadMsg ) {
                ?>
                <div class="jobwp-application-message"><?php esc_html_e( $resumeUploadMsg ); ?></div>
                <?php
            }
            ?>
            <div class="jobwp-single-area">

                <div class="jobwp-single-left">

                    <div class="content-row">
                            <div class="left-cell">
                            </div>
                            <div class="right-cell">
                            </div>
                            <div class="clear"></div>
                    </div>
                    <!-- Overview -->
                    <?php
                    if ( ! $jobwp_single_hide_overview ) {
                        ?>
                        <div class="content-row">
                            <div class="left-cell">
                                <h5 class="label"><?php esc_html_e( $jobwp_single_overview_text ); ?></h5>
                            </div>
                            <div class="right-cell text">
                                <?php the_content(); ?>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <?php
                    }
                    ?>
                    <!-- Vacancies -->
                    <?php
                    if ( ! $jobwp_single_hide_vacancies ) {
                        ?>
                        <div class="content-row">
                            <div class="left-cell">
                                <h5 class="label"><?php esc_html_e( $jobwp_single_vacancies_text ); ?></h5>
                            </div>
                            <div class="right-cell text">
                                <?php esc_html_e( $bo_vacancies ); ?>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <?php
                    }
                    ?>
                    <!-- Skills -->
                    <?php
                    if ( ! $jobwp_single_hide_skills ) {
                        if ( ! empty( $bo_career_skills ) ) {
                        ?>
                        <div class="content-row">
                            <div class="left-cell">
                                <h5 class="label"><?php esc_html_e( $jobwp_single_skills_text ); ?></h5>
                            </div>
                            <div class="right-cell">
                                <div class="custom-list text">
                                    <?php echo wp_kses_post( $bo_career_skills ); ?>
                                </div>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <?php
                        }
                    }
                    ?>
                    <!-- Responsible -->
                    <?php
                    if ( ! $jobwp_single_hide_responsible ) {
                        if ( ! empty( $bo_job_responsibilities ) ) {
                        ?>
                        <div class="content-row">
                            <div class="left-cell">
                                <h5 class="label"><?php esc_html_e( $jobwp_single_responsible_text ); ?></h5>
                            </div>
                            <div class="right-cell">
                                <div class="custom-list text">
                                    <?php echo wp_kses_post( $bo_job_responsibilities ); ?>
                                </div>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <?php
                        }
                    }
                    ?>
                    <!-- Additional -->
                    <?php
                    if ( ! $jobwp_single_hide_requirements ) {
                        if ( ! empty( $bo_job_additional_requirements ) ) {
                        ?>
                        <div class="content-row">
                            <div class="left-cell">
                                <h5 class="label"><?php esc_html_e( $jobwp_single_requirements_text ); ?></h5>
                            </div>
                            <div class="right-cell">
                                <div class="custom-list text">
                                    <?php echo wp_kses_post( $bo_job_additional_requirements ); ?>
                                </div>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <?php
                        }
                    }
                    ?>
                    <!-- Job Nature -->
                    <?php
                    if ( ! $jobwp_single_hide_job_type ) {
                        ?>
                        <div class="content-row">
                            <div class="left-cell">
                                <h5 class="label"><?php esc_html_e( $jobwp_single_job_type_text ); ?></h5>
                            </div>
                            <div class="right-cell text">
                                <?php
                                // Job Nature
                                if ( ! empty( $jobs_nature ) ) {
                                    $jobs_nature_arr = array();
                                    foreach( $jobs_nature as $nature ) {
                                        $jobs_nature_arr[] = $nature->name . '';
                                    }
                                    echo implode( ', ', $jobs_nature_arr );   
                                }
                                ?>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <?php
                    }
                    ?> 
                    <!-- Educational -->
                    <?php
                    if ( ! $jobwp_single_hide_education ) {
                        if ( ! empty( $jobwp_edu_req ) ) {
                        ?>
                        <div class="content-row">
                            <div class="left-cell">
                                <h5 class="label"><?php esc_html_e( $jobwp_single_education_text ); ?></h5>
                            </div>
                            <div class="right-cell text">
                                <p><?php echo wp_kses_post( $jobwp_edu_req ); ?></p>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <?php
                        }
                    }
                    ?>
                    <!-- Experience -->
                    <?php
                    if ( ! $jobwp_single_hide_experience ) {
                        ?>
                        <div class="content-row">
                            <div class="left-cell">
                                <h5 class="label"><?php esc_html_e( $jobwp_single_experience_text ); ?></h5>
                            </div>
                            <div class="right-cell text">
                                <?php esc_html_e( $bo_experience ); ?>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <?php
                    }
                    ?>
                    <!-- Location -->
                    <?php
                    if ( ! $jobwp_single_hide_loc ) {
                        if ( ! empty( $jobs_location ) ) {
                        ?>
                        <div class="content-row">
                            <div class="left-cell">
                                <h5 class="label"><?php esc_html_e( $jobwp_single_loc_text ); ?></h5>
                            </div>
                            <div class="right-cell text">
                                <?php
                                    $jobs_location_arr = array();
                                    foreach( $jobs_location as $location ) {
                                        $jobs_location_arr[] = $location->name . '';
                                    }
                                    echo implode( ', ', $jobs_location_arr );
                                ?>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <?php
                        }
                    }
                    ?>
                    <!-- Salary -->
                    <?php
                    if ( ! $jobwp_single_hide_salary ) {
                        if ( ! empty( $bo_job_salary ) ) {
                        ?>
                        <div class="content-row">
                            <div class="left-cell">
                                <h5 class="label"><?php esc_html_e( $jobwp_single_salary_text ); ?></h5>
                            </div>
                            <div class="right-cell">
                                <div class="custom-list text">
                                    <?php echo wp_kses_post( $bo_job_salary ); ?>
                                </div>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <?php
                        }
                    }
                    ?>
                    <!-- Other Benefits -->
                    <?php
                    if ( ! $jobwp_single_hide_benefit ) {
                        if ( ! empty( $bo_other_benefits ) ) {
                        ?>
                        <div class="content-row">
                            <div class="left-cell">
                                <h5 class="label"><?php esc_html_e( $jobwp_single_benefit_text ); ?></h5>
                            </div>
                            <div class="right-cell">
                                <div class="custom-list text">
                                    <?php echo wp_kses_post( $bo_other_benefits ); ?>
                                </div>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <?php
                        }
                    }
                    ?>
                    <!-- Job Level -->
                    <?php
                    if ( ! $jobwp_single_hide_level ) {
                        ?>
                        <div class="content-row">
                            <div class="left-cell padding-bottom-50">
                                <h5 class="label"><?php esc_html_e( $jobwp_single_level_text ); ?></h5>
                            </div>
                            <div class="right-cell text">
                                <?php
                                if ( ! empty( $jobs_level ) ) {
                                    $jobs_level_arr = array();
                                    foreach( $jobs_level as $pos ) {
                                        $jobs_level_arr[] = $pos->name . '';
                                    }
                                    echo implode( ', ', $jobs_level_arr );   
                                }
                                ?>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>
            <?php 
        } 
    } 
    
    if ( ! $jobwp_hide_apply_procedure ) {
        ?>
        <div class="circulr-details-bottom-email">
            <h3 class="wpsd-read-before-apply"><?php esc_html_e( $jobwp_apply_procedure_title ); ?></h3>
            <span class="wpsd-read-before-apply-border">&nbsp;</span>
            <?php
            if ( '' != $jobwp_apply_procedure_content ) {
                ?>
                <p class="apply-to-email">
                    <?php echo wp_kses_post( $jobwp_apply_procedure_content ); ?>
                </p>
                <?php
            }

            if ( ! $jobwp_hide_apply_button ) {

                if ( 'on' === $jobwp_ext_apply_now_url ) {
                    ?>
                    <a href="<?php echo esc_url( $jobwp_application_url ); ?>" class="jobwp-primary-button" target="_blank"><?php esc_html_e( $jobwp_apply_button_text ); ?></a>
                    <?php
                } else {

                    if ( $jobwp_allow_login_apply ) {

                        if ( is_user_logged_in() ) {
                            ?>
                            <a href="#" class="jobwp-trigger-link jobwp-primary-button"><?php esc_html_e( $jobwp_apply_button_text ); ?></a>
                            <?php
                        } else {
                            ?>
                            <a href="<?php echo esc_url( home_url( '/wp-login.php' ) ); ?>" class="jobwp-primary-button"><?php esc_html_e( $jobwp_apply_button_text ); ?></a>
                            <?php
                        }
                    } else {
                        ?>
                        <a href="#" class="jobwp-trigger-link jobwp-primary-button"><?php esc_html_e( $jobwp_apply_button_text ); ?></a>
                        <?php
                    }
                }
            }
            ?>
        </div>
        <?php
    }
    ?>

</div>
<?php do_action( 'jobwp_single_after_body_container' ); ?>
<!-- Application form modal -->
<div id="jobwp-apply-form-modal" class="jobwp-apply-form-modal">
    <?php
    if ( $jobwp_ext_application_form ) {
        echo do_shortcode( stripslashes( $jobwp_ext_application_form_shortcode ) );
    } else {
        echo do_shortcode( '[jobwp_apply_form]' );
    }
    ?>
</div>
<?php
    get_footer(); 
?>