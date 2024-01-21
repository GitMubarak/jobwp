<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

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

$wbgAbctEmail = [];

if ( '' !== $jobwp_admin_noti_email ) {
    $wbgAbctEmail[] = sanitize_email( $jobwp_admin_noti_email );
}

if ( job_fs()->is_plan__premium_only('pro', true) ) {

    $wbgAbctAdmins = get_users( 'role=' . $jobwp_admin_noti_email_users );

    if ( ! empty( $wbgAbctAdmins ) ) {
        foreach ( $wbgAbctAdmins as $admin ):
            $wbgAbctEmail[] = sanitize_email( $admin->user_email );
        endforeach;
    }
}

//echo '<pre>';
//print_r($wbgAbctEmail);

// Upload Resume
if ( isset( $_FILES['jobwp_upload_resume']['name'] ) ) {
    
    if ( ! isset( $_POST['jobwp_apply_form_nonce_field'] ) 
        || ! wp_verify_nonce( $_POST['jobwp_apply_form_nonce_field'], 'jobwp_apply_form_action' ) ) {
        $resumeUploadMsg = __('Sorry, your nonce did not verify.', JOBWP_TXT_DOMAIN);
    } else {

        $resumeUploadMsg = $jobwp_front_new->jobwp_upload_resume($_POST, $_FILES, $wbgAbctEmail);
    }
    
}

// Load anything before single_body_container
do_action( 'jobwp_single_before_body_container' );

// Load Styling
include JOBWP_PATH . 'assets/css/single.php';
?>