<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
* Trait: Job Application
*/
trait Jobwp_Applicaiton 
{
    function jobwp_upload_resume($post, $file, $admin_email) {
        
        if ( ! empty( $file['jobwp_upload_resume']['name'] ) && ! empty( $post['jobwp_full_name'] )  && ! empty( $post['jobwp_email'] ) ) {

            if ( ! $file['jobwp_upload_resume']['error'] ) {

                $ext = pathinfo( $file['jobwp_upload_resume']['name'], PATHINFO_EXTENSION );
                
                
                // Checking the file type
                if ( ! job_fs()->is_plan__premium_only('pro', true) ) {
                    $allowedfiletype = array("pdf");
                    $allowedfiletypemsg = __('Only Pdf file is permitted', JOBWP_TXT_DOMAIN);
                }

                if ( job_fs()->is_plan__premium_only('pro', true) ) {
                    $allowedfiletype = array("pdf", "docx", "doc");
                    $allowedfiletypemsg = __('Only Pdf, Docx files are permitted', JOBWP_TXT_DOMAIN);
                }

                if ( ! in_array( $ext, $allowedfiletype ) ) {
                    return __( $allowedfiletypemsg );
                }
                //can't be larger than 2mb
                else if ( $file['jobwp_upload_resume']['size'] > ( 2000000 ) ) {
                    return __('Your file size is to large', JOBWP_TXT_DOMAIN);
                } else {

                    $jobwpDir = wp_upload_dir();
                    $jobwpDir = $jobwpDir['basedir'];
                    $uniqueFile = uniqid() . '-' . $_FILES['jobwp_upload_resume']['name'];
                    $fileName = $jobwpDir . '/jobwp-resume/' . $uniqueFile;

                    if ( ! is_writable( $jobwpDir . '/jobwp-resume' ) ) {

                        return 'The folder ' . __($jobwpDir . '/jobwp-resume') . ' cannot be created or is not writable. Ask for support to your hosting provider.';

                    } else {

                        if ( is_uploaded_file( $_FILES['jobwp_upload_resume']['tmp_name'] ) ) {

                            if ( file_exists( $fileName ) ) {
                                unlink( $fileName );
                            }

                            $r = move_uploaded_file( $_FILES['jobwp_upload_resume']['tmp_name'], $fileName );

                            if ( $r === false)  {
                                
                                return __('The file cannot be copied in the folder ' . $jobwpDir . '/jobwp-resume. Check if it exists and is writeable. You can also ask for support to your hosting provider.', JOBWP_TXT_DOMAIN);

                            } else {

                                global $wpdb;
                        
                                $table_name     = $wpdb->base_prefix . 'jobwp_applied';
        
                                $fullName           = isset( $post['jobwp_full_name'] ) ? sanitize_text_field( $post['jobwp_full_name'] ) : null;
                                $applyFor           = isset( $post['jobwp_apply_for'] ) ? sanitize_text_field( $post['jobwp_apply_for'] ) : null;
                                $email 		        = isset( $post['jobwp_email'] ) ? sanitize_email( $post['jobwp_email'] ) : null;
                                $phoneNumber        = isset( $post['phoneNumber'] ) ? sanitize_text_field( $post['phoneNumber'] ) : null;
                                $message            = isset( $post['jobwp_cover_letter'] ) ? sanitize_textarea_field( $post['jobwp_cover_letter'] ) : '';
                                $jobwp_user_consent = isset( $post['jobwp_user_consent'] ) ? sanitize_text_field( $post['jobwp_user_consent'] ) : null;
                                $intl_tel_dial_code = isset( $post['jobwp_tel_country_code'] ) ? sanitize_text_field( $post['jobwp_tel_country_code'] ) : '';
                                $intl_tel           = isset( $post['jobwp_tel_1'] ) ? sanitize_text_field( $post['jobwp_tel_1'] ) : '';

                                $intlPhone          = ( '' !== $intl_tel ) ? $intl_tel_dial_code . $intl_tel : '';
                                
                                $wpdb->query(
                                    $wpdb->prepare(
                                        "INSERT INTO $table_name
                                        ( job_post_id,
                                        applied_for,
                                        applicant_name,
                                        applicant_email,
                                        applicant_phone,
                                        applicant_message,
                                        resume_name,
                                        applied_on,
                                        user_consent,
                                        intl_tel )
                                        VALUES ( %d, %s, %s, %s, %s, %s, %s, %s, %s, %s )",
                                        array(
                                            get_the_ID(),
                                            $applyFor,
                                            $fullName,
                                            $email,
                                            $phoneNumber,
                                            $message,
                                            $uniqueFile,
                                            date('Y-m-d h:i:s'),
                                            $jobwp_user_consent,
                                            $intlPhone,
                                        )
                                    )
                                );
                                
                                // Admin Notification Email
                                $attachments = array($fileName);
						
                                $headers = "MIME-Version: 1.0" . "\r\n";
                                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                                //$headers .= 'From: Career' . "\r\n";
                                
                                $subject = __('Career - New Application', 'jobwp');
                                $emailMessage = __('Applicant: ', 'jobwp') . $fullName;
                                $emailMessage .= '<br>' . __( 'Applied For: ', 'jobwp' ) . $applyFor;
                                $emailMessage .= '<br>' . __( 'Email: ', 'jobwp' ) . $email;

                                if ( '' != $intl_tel ) {
                                    $emailMessage .= '<br>' . __( 'Phone: ' ) . $intlPhone;
                                }

                                if ( '' != $message ) {
                                    $emailMessage .= '<br>' . __( 'Cover Letter: ', 'jobwp' ) . $message;
                                }

                                wp_mail(
                                    $admin_email,
                                    $subject,
                                    $emailMessage,
                                    $headers,
                                    $attachments
                                );

                                if ( job_fs()->is_plan__premium_only('pro', true) ) {
                                    // Applicant Notificaton Email Started

                                    $canEmailSettings	            = get_option('jobwp_email_settings');
                                    $can_email_subj                 = isset( $canEmailSettings['jobwp_candidate_email_subject'] ) ? sanitize_text_field( $canEmailSettings['jobwp_candidate_email_subject'] ) : 'Thank you for applying!';
                                    $can_email_body                 = isset( $canEmailSettings['jobwp_candidate_email_body'] ) ? wp_kses_post( stripslashes( $canEmailSettings['jobwp_candidate_email_body'] ) ) : '';
                                    $jobwp_re_from_name             = isset( $canEmailSettings['jobwp_re_from_name'] ) ? sanitize_text_field( $canEmailSettings['jobwp_re_from_name'] ) : '';
                                    $jobwp_can_header_from_email    = isset( $canEmailSettings['jobwp_can_header_from_email'] ) ? sanitize_email( $canEmailSettings['jobwp_can_header_from_email'] ) : '';

                                    if ( '' != $jobwp_re_from_name ) {
                                        $headers .= "From: {$jobwp_re_from_name} <{$jobwp_can_header_from_email}> \r\n";
			                            $headers .= "Reply-To: {$jobwp_can_header_from_email} \r\n";
                                        $headers .= 'X-Mailer: PHP/' . phpversion();
                                    }

                                    if ( '' != $can_email_body ) {

                                        $can_phrase_before  = ["#candidateName#", "#jobTitle#"];
                                        $can_phrase_after   = ["". $fullName ."", "" . $applyFor . ""];

                                        $can_email_body_final = str_replace($can_phrase_before, $can_phrase_after, $can_email_body);

                                    } else {
                                        
                                        $can_email_subj = "Thank you for applying!";

                                        $recMessage = __('Hi', 'jobwp') . '&nbsp;' . $fullName . ',';
                                        $recMessage .= '<br><br>' . __('Thanks for applying to our', 'jobwp') . '&nbsp;' . $applyFor . '&nbsp;' . __('position', 'jobwp') . '.';
                                        $recMessage .= '&nbsp;' . __("We'll review your application and be sure to get back to you if there might be a fit!", "jobwp");
                                        $recMessage .= '<br><br>' . __('Best', 'jobwp') . ',';
                                        
                                        $can_email_body_final = $recMessage;
                                    }
                                    
                                    wp_mail(
                                        esc_html( $email ),
                                        esc_html( $can_email_subj ),
                                        $can_email_body_final,
                                        $headers
                                    );
                                    // Applicant Notificaton Email Ended
                                }
        
                                return __('Thank you for your application', 'jobwp');
                            }

                        }

                    }

                }
            }
        } else {

            return $file['jobwp_upload_resume']['error'];

        }
    }
}
?>