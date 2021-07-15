<?php
get_header();

global $post;

$resumeUploadMsg = null;

if (
    ! empty( $_FILES['upload']['name'] ) 
    && ! empty( $_POST['fullName'] ) 
    && ! empty( $_POST['email'] ) 
) {
    if( ! $_FILES['upload']['error'] ) {
        
        //can't be larger than 300 KB
        if ( $_FILES['upload']['size'] > ( 300000 ) ) {
            
            $resumeUploadMsg = 'Your file size is to large.';
        
        } else {
            
            $jobwpDir = wp_upload_dir();
            $jobwpDir = $jobwpDir['basedir'];
            wp_mkdir_p($jobwpDir . '/jobwp-resume');

            if ( ! is_writable($jobwpDir . '/jobwp-resume') ) {

                $resumeUploadMsg = 'The folder ' . esc_html($jobwpDir . '/jobwp-resume') . ' cannot be created or is not writable. Ask for support to your hosting provider.';
            
            } else {

                if ( is_uploaded_file( $_FILES['upload']['tmp_name'] ) ) {

                    unlink($jobwpDir . '/jobwp-resume/' . $_FILES['upload']['name']);
                    
                    $r = move_uploaded_file($_FILES['upload']['tmp_name'], $jobwpDir . '/jobwp-resume/' . $_FILES['upload']['name']);
                    
                    if ( $r === false)  {

                        $resumeUploadMsg = 'The file cannor be copied in the folder ' . $jobwpDir . '/jobwp-resume. Check if it exists and is writeable. You can also ask for support to your hosting provider.';
                    
                    } else {

                        global $wpdb;
                
                        $table_name     = $wpdb->prefix . 'jobwp_applied';

                        $fullName       = isset( $_POST['fullName'] ) ? sanitize_text_field( $_POST['fullName'] ) : null;
                        $applyFor       = isset( $_POST['applyFor'] ) ? sanitize_text_field( $_POST['applyFor'] ) : null;
                        $email 		    = isset( $_POST['email'] ) ? sanitize_email( $_POST['email'] ) : null;
                        $phoneNumber    = isset( $_POST['phoneNumber'] ) ? sanitize_text_field( $_POST['phoneNumber'] ) : null;
                        $message        = isset( $_POST['message'] ) ? sanitize_textarea_field( $_POST['message'] ) : null;

                        $wpdb->query('INSERT INTO ' . $table_name . '(
                            job_post_id,
                            applied_for,
                            applicant_name,
                            applicant_email,
                            applicant_phone,
                            applicant_message,
                            resume_name,
                            applied_on
                        ) VALUES (
                            ' . get_the_ID() . ',
                            "' . $applyFor . '",
                            "' . $fullName . '",
                            "' . $email . '",
                            "' . $phoneNumber . '",
                            "' . $message . '",
                            "' . $_FILES['upload']['name'] . '",
                            "' . date('Y-m-d h:i:s') . '"
                        )');

                        $resumeUploadMsg = 'Thank you for your application!';

                    }
                
                } // if ( is_uploaded_file( $_FILES['upload']['tmp_name'] ) ) {

            }
        }
    }
} else {
    //set that to be the returned message
    $resumeUploadMsg = $_FILES['upload']['error'];
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
                        <h5 class="heading-05 color-white margin-bottom-30"><?php _e('Department: Human Resource', JOBWP_TXT_DOMAIN); ?></h5>
                    </div>
                </div>
            </article>
        </section>
        <?php
        if ( null !== $resumeUploadMsg ) {
            ?>
            <h2 class="jobwp-application-message"><?php esc_html_e( $resumeUploadMsg ); ?></h2>
            <?php
        }
        ?>
        <section class="circulr-detaels-section">
            <article>
                <div class="container">
                    <div class="col-md-9">
                        <div class="content-row">
                            <div class="left-cell padding-top-50">
                                <h5 class="primary-color"><?php _e('Overview', JOBWP_TXT_DOMAIN); ?></h5>
                            </div>
                            <div class="right-cell padding-top-50">
                                <p class="margin-bottom-p"><?php the_content(); ?></p>
                            </div>
                            <div class="clear"></div>
                        </div>

                        <div class="content-row">
                            <div class="left-cell">
                                <h5 class="primary-color"><?php _e('No. of Vacancies', JOBWP_TXT_DOMAIN); ?></h5>
                            </div>
                            <div class="right-cell">
                                <h5 class="primary-color"><?php esc_html_e( $bo_vacancies ); ?></h5>
                            </div>
                            <div class="clear"></div>
                        </div>

                        <div class="content-row">
                            <div class="left-cell">
                                <h5 class="primary-color"><?php _e('Specific Skills', JOBWP_TXT_DOMAIN); ?></h5>
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
                                <h5 class="primary-color"><?php _e('Responsible For', JOBWP_TXT_DOMAIN); ?></h5>
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
                                <h5 class="primary-color"><?php _e('Additional Requirements', JOBWP_TXT_DOMAIN); ?></h5>
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
                                <h5 class="primary-color"><?php _e('Job Nature', JOBWP_TXT_DOMAIN); ?></h5>
                            </div>
                            <div class="right-cell">
                                <h5 class="primary-color"><?php esc_html_e( $bo_job_nature ); ?></h5>
                            </div>
                            <div class="clear"></div>
                        </div>

                        <div class="content-row">
                            <div class="left-cell">
                                <h5 class="primary-color"><?php _e('Educational Requirements', JOBWP_TXT_DOMAIN); ?></h5>
                            </div>
                            <div class="right-cell">
                                <p><?php esc_html_e( $jobwp_edu_req ); ?></p>
                            </div>
                            <div class="clear"></div>
                        </div>

                        <div class="content-row">
                            <div class="left-cell">
                                <h5 class="primary-color"><?php _e('Experience Requirements', JOBWP_TXT_DOMAIN); ?></h5>
                            </div>
                            <div class="right-cell">
                                <h5 class="primary-color"><?php esc_html_e( $bo_experience ); ?></h5>
                            </div>
                            <div class="clear"></div>
                        </div>

                        <div class="content-row">
                            <div class="left-cell">
                                <h5 class="primary-color"><?php _e('Job Location', JOBWP_TXT_DOMAIN); ?></h5>
                            </div>
                            <div class="right-cell">
                                <h5 class="primary-color"><?php esc_html_e( $bo_job_location ); ?></h5>
                            </div>
                            <div class="clear"></div>
                        </div>

                        <div class="content-row">
                            <div class="left-cell">
                                <h5 class="primary-color"><?php _e('Salary', JOBWP_TXT_DOMAIN); ?></h5>
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
                                <h5 class="primary-color"><?php _e('Other Benefits', JOBWP_TXT_DOMAIN); ?></h5>
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
                                <h5 class="primary-color"><?php _e('Job Level', JOBWP_TXT_DOMAIN); ?></h5>
                            </div>
                            <div class="right-cell">
                                <h5 class="primary-color"><?php esc_html_e( $bo_job_level ); ?></h5>
                            </div>
                            <div class="clear"></div>
                        </div>
                    </div>
                    <div class="col-md-3 padding-top-50">
                        <div class="side-nav-right">
                            <h5 class="heading-05 margin-bottom-10"><?php _e('Few more position', JOBWP_TXT_DOMAIN); ?></h5>
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
                    <p class="heading-04"><?php _e('Lets shape your ideas from here', JOBWP_TXT_DOMAIN); ?>.</p>
                </div>
                <div class="col-md-4 apply-now">
                    <a href="javascript:void(0)" class="primary-button apply-now"><?php _e('Apply Now', JOBWP_TXT_DOMAIN); ?></a>
                </div>
            </div>
        </article>
    </section>

</div>

<?php get_footer(); ?>