<?php
get_header();

global $post;

if ( isset( $_POST['fullName'] ) ) {
    
    $resumeUploadMsg = 'Hello';

}
?>
<div class="body-container">
	
	<?php 
    if( have_posts() ): while( have_posts() ): 
        the_post();

        $bo_experience      = get_post_meta( $post->ID, 'jobwp_experience', true );
        $bo_vacancies       = get_post_meta( $post->ID, 'jobwp_vacancies', true );
        $bo_job_nature      = get_post_meta( $post->ID, 'jobwp_nature', true );
        $bo_job_level       = get_post_meta( $post->ID, 'jobwp_level', true );
        $bo_job_location    = get_post_meta( $post->ID, 'jobwp_location', true );
        $jobwp_edu_req      = get_post_meta( $post->ID, 'jobwp_edu_req', true );

        $bo_career_skills = get_post_meta( $post->ID, 'jobwp_skills', true );
        $bo_job_responsibilities = get_post_meta( $post->ID, 'jobwp_responsibilities', true );
        $bo_job_additional_requirements = get_post_meta( $post->ID, 'jobwp_add_req', true );
        $bo_other_benefits = get_post_meta( $post->ID, 'jobwp_other_benefits', true );
        $bo_job_salary = get_post_meta( $post->ID, 'jobwp_salary', true );
        ?>
        
        <section id="pageTitle">
            <article class="transperent-bg">
                <div class="container page-title-inner">
                    <div class="col-md-12 center-align">
                        <h3 class="heading-03 margin-bottom-30"><?php the_title(); ?></h3>
                        <h5 class="heading-05 color-white margin-bottom-30">Department: Human Resource</h5>
                    </div>
                </div>
            </article>
        </section>
        <h2 style="text-align: center; width: 100%;"><?php esc_html_e( $resumeUploadMsg ); ?></h2>
        <section class="circulr-detaels-section">
            <article>
                <div class="container">
                    <div class="col-md-9">
                        <div class="content-row">
                            <div class="left-cell padding-top-50">
                                <h5 class="primary-color">Overview</h5>
                            </div>
                            <div class="right-cell padding-top-50">
                                <p class="margin-bottom-p"><?php the_content(); ?></p>
                            </div>
                            <div class="clear"></div>
                        </div>

                        <div class="content-row">
                            <div class="left-cell">
                                <h5 class="primary-color">No. of Vacancies</h5>
                            </div>
                            <div class="right-cell">
                                <h5 class="primary-color"><?php esc_html_e( $bo_vacancies ); ?></h5>
                            </div>
                            <div class="clear"></div>
                        </div>

                        <div class="content-row">
                            <div class="left-cell">
                                <h5 class="primary-color">Specific Skills</h5>
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
                                <h5 class="primary-color">Responsible for</h5>
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
                                <h5 class="primary-color">Additional Requirements</h5>
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
                                <h5 class="primary-color">Job Nature</h5>
                            </div>
                            <div class="right-cell">
                                <h5 class="primary-color"><?php esc_html_e( $bo_job_nature ); ?></h5>
                            </div>
                            <div class="clear"></div>
                        </div>

                        <div class="content-row">
                            <div class="left-cell">
                                <h5 class="primary-color">Educational Requirements</h5>
                            </div>
                            <div class="right-cell">
                                <p><?php esc_html_e( $jobwp_edu_req ); ?></p>
                            </div>
                            <div class="clear"></div>
                        </div>

                        <div class="content-row">
                            <div class="left-cell">
                                <h5 class="primary-color">Experience Requirements</h5>
                            </div>
                            <div class="right-cell">
                                <h5 class="primary-color"><?php esc_html_e( $bo_experience ); ?></h5>
                            </div>
                            <div class="clear"></div>
                        </div>

                        <div class="content-row">
                            <div class="left-cell">
                                <h5 class="primary-color">Job Location</h5>
                            </div>
                            <div class="right-cell">
                                <h5 class="primary-color"><?php esc_html_e( $bo_job_location ); ?></h5>
                            </div>
                            <div class="clear"></div>
                        </div>

                        <div class="content-row">
                            <div class="left-cell">
                                <h5 class="primary-color">Salary</h5>
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
                                <h5 class="primary-color">Other Benefits</h5>
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
                                <h5 class="primary-color">Job Level</h5>
                            </div>
                            <div class="right-cell">
                                <h5 class="primary-color"><?php esc_html_e( $bo_job_level ); ?></h5>
                            </div>
                            <div class="clear"></div>
                        </div>
                    </div>
                    <div class="col-md-3 padding-top-50">
                        <div class="side-nav-right">
                            <h5 class="heading-05 margin-bottom-10">Few more position</h5>
                            <?php
                                get_few_more_positions();
                            ?>
                        </div>
                    </div>
                </div>
            </article>
        </section>

	<?php endwhile; endif; ?>
    
    <section class="circulr-detaels-bottom padding-50-0" style="clear: both;">
        <article>
            <div class="container">
                <div class="col-md-8 apply-now">
                    <p class="heading-04">Lets shape your ideas from here.</p>
                </div>
                <div class="col-md-4 apply-now">
                    <a href="javascript:void(0)" class="primary-button apply-now">Apply Now</a>
                </div>
            </div>
        </article>
    </section>

</div>

<?php get_footer(); ?>