<?php
get_header();

global $post;

$resumeUploadMsg = null;

require_once JOBWP_PATH . 'front/' . JOBWP_CLS_PRFX . 'front.php';
$jobwp_front_new = new JobWp_Front(JOBWP_VERSION);

// Single Settings Content
$jobwpSingleContent = $jobwp_front_new->jobwp_get_single_content_settings();

foreach ( $jobwpSingleContent as $option_name => $option_value ) {
    if ( isset( $jobwpSingleContent[$option_name] ) ) {
        ${"" . $option_name} = $option_value;
    }
}

// Single Settings Styles
$jobwpSingleStyles = $jobwp_front_new->jobwp_get_single_styles_settings();

foreach ( $jobwpSingleStyles as $option_name => $option_value ) {
    if ( isset( $jobwpSingleStyles[$option_name] ) ) {
        ${"" . $option_name} = $option_value;
    }
}

// General Settings
$jobwpGeneralSettings = $jobwp_front_new->jobwp_get_general_settings();
foreach ( $jobwpGeneralSettings as $option_name => $option_value ) {
    if ( isset( $jobwpGeneralSettings[$option_name] ) ) {
        ${"" . $option_name} = $option_value;
    }
}

// Upload Resume
if ( isset( $_FILES['jobwp_upload_resume']['name'] ) ) {
    $resumeUploadMsg = $jobwp_front_new->jobwp_upload_resume($_POST, $_FILES, $jobwp_admin_noti_email);
}

// Load Styling
include JOBWP_PATH . 'assets/css/single.php';
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
            ?>
            <div class="circulr-details-top">
                <p class="jobwp-job-title"><?php the_title(); ?></p>
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
                                <h5 class="primary-color"><?php esc_html_e( $jobwp_single_vacancies_text ); ?></h5>
                            </div>
                            <div class="right-cell">
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
                        ?>
                        <div class="content-row">
                            <div class="left-cell">
                                <h5 class="primary-color"><?php esc_html_e( $jobwp_single_skills_text ); ?></h5>
                            </div>
                            <div class="right-cell">
                                <div class="custom-list">
                                <?php
                                    if ( ! empty( $bo_career_skills ) ) {
                                        echo wp_kses_post( $bo_career_skills );
                                    }
                                ?>
                                </div>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <?php
                    }
                    ?>
                    <!-- Responsible -->
                    <?php
                    if ( ! $jobwp_single_hide_responsible ) {
                        ?>
                        <div class="content-row">
                            <div class="left-cell">
                                <h5 class="primary-color"><?php esc_html_e( $jobwp_single_responsible_text ); ?></h5>
                            </div>
                            <div class="right-cell">
                                <div class="custom-list">
                                <?php
                                    if ( ! empty( $bo_job_responsibilities ) ) {
                                        echo wp_kses_post( $bo_job_responsibilities );
                                    }
                                ?>
                                </div>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <?php
                    }
                    ?>
                    <!-- Additional -->
                    <?php
                    if ( ! $jobwp_single_hide_requirements ) {
                        ?>
                        <div class="content-row">
                            <div class="left-cell">
                                <h5 class="primary-color"><?php esc_html_e( $jobwp_single_requirements_text ); ?></h5>
                            </div>
                            <div class="right-cell">
                                <div class="custom-list">
                                <?php
                                    if ( ! empty( $bo_job_additional_requirements ) ) {
                                        echo wp_kses_post( $bo_job_additional_requirements );
                                    }
                                ?>
                                </div>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <?php
                    }
                    ?>
                    <!-- Job Nature -->
                    <?php
                    if ( ! $jobwp_single_hide_job_type ) {
                        ?>
                        <div class="content-row">
                            <div class="left-cell">
                                <h5 class="primary-color"><i class="fa fa-clock" aria-hidden="true"></i>&nbsp;<?php esc_html_e( $jobwp_single_job_type_text ); ?></h5>
                            </div>
                            <div class="right-cell">
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
                        ?>
                        <div class="content-row">
                            <div class="left-cell">
                                <h5 class="primary-color"><i class="fa fa-graduation-cap" aria-hidden="true"></i>&nbsp;<?php esc_html_e( $jobwp_single_education_text ); ?></h5>
                            </div>
                            <div class="right-cell">
                                <p><?php esc_html_e( $jobwp_edu_req ); ?></p>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <?php
                    }
                    ?>
                    <!-- Experience -->
                    <?php
                    if ( ! $jobwp_single_hide_experience ) {
                        ?>
                        <div class="content-row">
                            <div class="left-cell">
                                <h5 class="primary-color"><i class="fa fa-briefcase" aria-hidden="true"></i>&nbsp;<?php esc_html_e( $jobwp_single_experience_text ); ?></h5>
                            </div>
                            <div class="right-cell">
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
                        ?>
                        <div class="content-row">
                            <div class="left-cell">
                                <h5 class="primary-color"><?php esc_html_e( $jobwp_single_loc_text ); ?></h5>
                            </div>
                            <div class="right-cell">
                                <?php
                                // Job Location
                                if ( ! empty( $jobs_location ) ) {
                                    $jobs_location_arr = array();
                                    foreach( $jobs_location as $location ) {
                                        $jobs_location_arr[] = $location->name . '';
                                    }
                                    echo implode( ', ', $jobs_location_arr );   
                                }
                                ?>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <?php
                    }
                    ?>
                    <!-- Salary -->
                    <?php
                    if ( ! $jobwp_single_hide_salary ) {
                        ?>
                        <div class="content-row">
                            <div class="left-cell">
                                <h5 class="primary-color"><?php esc_html_e( $jobwp_single_salary_text ); ?></h5>
                            </div>
                            <div class="right-cell">
                                <div class="custom-list">
                                <?php
                                    if ( ! empty( $bo_job_salary ) ) {
                                        echo wp_kses_post( $bo_job_salary );
                                    }
                                ?>
                                </div>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <?php
                    }
                    ?>
                    <!-- Other Benefits -->
                    <?php
                    if ( ! $jobwp_single_hide_benefit ) {
                        ?>
                        <div class="content-row">
                            <div class="left-cell">
                                <h5 class="primary-color"><?php esc_html_e( $jobwp_single_benefit_text ); ?></h5>
                            </div>
                            <div class="right-cell">
                                <div class="custom-list">
                                <?php
                                    if ( ! empty( $bo_other_benefits ) ) {
                                        echo wp_kses_post( $bo_other_benefits );
                                    }
                                ?>
                                </div>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <?php
                    }
                    ?>
                    <!-- Job Level -->
                    <?php
                    if ( ! $jobwp_single_hide_level ) {
                        ?>
                        <div class="content-row">
                            <div class="left-cell padding-bottom-50">
                                <h5 class="primary-color"><?php esc_html_e( $jobwp_single_level_text ); ?></h5>
                            </div>
                            <div class="right-cell">
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
                    <?php esc_html_e( $jobwp_apply_procedure_content ); ?>
                </p>
                <?php
            }

            if ( ! $jobwp_hide_apply_button ) {
                ?>
                <a href="#" class="jobwp-trigger-link jobwp-primary-button"><?php esc_html_e( $jobwp_apply_button_text ); ?></a>
                <?php
            }
            ?>
        </div>
        <?php
    }
    ?>

</div>
<?php
// Load Search Panel
include JOBWP_PATH . 'front/view/apply-form.php';

get_footer(); 
?>