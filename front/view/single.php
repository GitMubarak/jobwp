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

// Load Styling
include JOBWP_PATH . 'assets/css/single.php';
?>
<div class="jobwp-single-body-container">
	
	<?php 
    if ( have_posts() ) { 
        
        while ( have_posts() ) {
            
            the_post();

            $bo_experience      = get_post_meta( $post->ID, 'jobwp_experience', true );
            $bo_vacancies       = get_post_meta( $post->ID, 'jobwp_vacancies', true );
            $bo_job_nature      = get_post_meta( $post->ID, 'jobwp_nature', true );
            $bo_job_level       = get_post_meta( $post->ID, 'jobwp_level', true );
            $bo_job_location    = get_post_meta( $post->ID, 'jobwp_location', true );
            $jobwp_edu_req      = get_post_meta( $post->ID, 'jobwp_edu_req', true );

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
                <h2 class="jobwp-application-message"><?php esc_html_e( $resumeUploadMsg ); ?></h2>
                <?php
            }
            ?>
            <div class="jobwp-single-area">

                <div class="jobwp-single-left">
                    
                    <div class="content-row">
                        <div class="left-cell padding-top-50">
                            <h5 class="primary-color"><i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;<?php _e('Overview', JOBWP_TXT_DOMAIN); ?></h5>
                        </div>
                        <div class="right-cell padding-top-50">
                            <?php the_content(); ?>
                        </div>
                        <div class="clear"></div>
                    </div>

                    <div class="content-row">
                        <div class="left-cell">
                            <h5 class="primary-color"><i class="fa fa-users" aria-hidden="true"></i>&nbsp;<?php _e('No. of Vacancies', JOBWP_TXT_DOMAIN); ?></h5>
                        </div>
                        <div class="right-cell">
                            <h5><?php esc_html_e( $bo_vacancies ); ?></h5>
                        </div>
                        <div class="clear"></div>
                    </div>

                    <div class="content-row">
                        <div class="left-cell">
                            <h5 class="primary-color"><i class="fa fa-wrench" aria-hidden="true"></i>&nbsp;<?php _e('Specific Skills', JOBWP_TXT_DOMAIN); ?></h5>
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

                    <div class="content-row">
                        <div class="left-cell">
                            <h5 class="primary-color"><i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;<?php _e('Responsible For', JOBWP_TXT_DOMAIN); ?></h5>
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

                    <div class="content-row">
                        <div class="left-cell">
                            <h5 class="primary-color"><i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;<?php _e('Additional Requirements', JOBWP_TXT_DOMAIN); ?></h5>
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

                    <div class="content-row">
                        <div class="left-cell">
                            <h5 class="primary-color"><i class="fa fa-clock-o" aria-hidden="true"></i>&nbsp;<?php _e('Job Nature', JOBWP_TXT_DOMAIN); ?></h5>
                        </div>
                        <div class="right-cell">
                            <h5><?php esc_html_e( $bo_job_nature ); ?></h5>
                        </div>
                        <div class="clear"></div>
                    </div>

                    <div class="content-row">
                        <div class="left-cell">
                            <h5 class="primary-color"><i class="fa fa-graduation-cap" aria-hidden="true"></i>&nbsp;<?php _e('Educational Requirements', JOBWP_TXT_DOMAIN); ?></h5>
                        </div>
                        <div class="right-cell">
                            <p><?php esc_html_e( $jobwp_edu_req ); ?></p>
                        </div>
                        <div class="clear"></div>
                    </div>

                    <div class="content-row">
                        <div class="left-cell">
                            <h5 class="primary-color"><i class="fa fa-briefcase" aria-hidden="true"></i>&nbsp;<?php _e('Experience Requirements', JOBWP_TXT_DOMAIN); ?></h5>
                        </div>
                        <div class="right-cell">
                            <h5><?php esc_html_e( $bo_experience ); ?></h5>
                        </div>
                        <div class="clear"></div>
                    </div>

                    <div class="content-row">
                        <div class="left-cell">
                            <h5 class="primary-color"><i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp;<?php _e('Job Location', JOBWP_TXT_DOMAIN); ?></h5>
                        </div>
                        <div class="right-cell">
                            <h5><?php esc_html_e( $bo_job_location ); ?></h5>
                        </div>
                        <div class="clear"></div>
                    </div>

                    <div class="content-row">
                        <div class="left-cell">
                            <h5 class="primary-color"><i class="fa fa-money" aria-hidden="true"></i>&nbsp;<?php _e('Salary', JOBWP_TXT_DOMAIN); ?></h5>
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

                    <div class="content-row">
                        <div class="left-cell">
                            <h5 class="primary-color"><i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;<?php _e('Other Benefits', JOBWP_TXT_DOMAIN); ?></h5>
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

                    <div class="content-row">
                        <div class="left-cell padding-bottom-50">
                            <h5 class="primary-color"><i class="fa fa-level-up" aria-hidden="true"></i>&nbsp;<?php _e('Job Level', JOBWP_TXT_DOMAIN); ?></h5>
                        </div>
                        <div class="right-cell">
                            <h5><?php esc_html_e( $bo_job_level ); ?></h5>
                        </div>
                        <div class="clear"></div>
                    </div>
                </div>
            </div>
            <?php 
        } 
    } 
    ?>
    
    <div class="circulr-details-bottom-email">
        <h3 class="wpsd-read-before-apply"><?php esc_html_e( $jobwp_apply_procedure_title ); ?></h3>
        <span class="wpsd-read-before-apply-border">&nbsp;</span>
        <p class="apply-to-email">
            <?php esc_html_e( $jobwp_apply_procedure_content ); ?>
        </p>
    </div>

</div>

<?php get_footer(); ?>