<?php
# Silence is golden.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

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
$jobwp_deadline                 = get_post_meta( $post->ID, 'jobwp_deadline', true );
$jobwp_base_salary_min	        = get_post_meta( $post->ID, 'jobwp_base_salary_min', true );
$jobwp_base_salary_max	        = get_post_meta( $post->ID, 'jobwp_base_salary_max', true );
$jobwp_base_salary_currency	    = get_post_meta( $post->ID, 'jobwp_base_salary_currency', true );
$jobwp_base_salary_time	        = get_post_meta( $post->ID, 'jobwp_base_salary_time', true );

if ( job_fs()->is_plan__premium_only('pro', true) ) {
    
    $jobwp_company              = get_post_meta( $post->ID, 'jobwp_company', true );
    $jobwp_company_info         = get_term_by('name', $jobwp_company, 'job_company');

    if ( ! empty( $jobwp_company_info ) ) {
        $jobwp_company_logo     = get_term_meta ( $jobwp_company_info->term_id, 'jobwp_company_logo_id', true );
    } else {
        $jobwp_company_logo = '';
    }
}

// Job Nature
if ( ! empty( $jobs_nature ) ) {
    $jobs_nature_arr = array();
    foreach( $jobs_nature as $nature ) {
        $jobs_nature_arr[] = $nature->name . '';
    }
    $employmentType = implode( ', ', $jobs_nature_arr );   
}
?>