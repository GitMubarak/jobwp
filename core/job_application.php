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

                //can't be larger than 2mb
                if ( $file['jobwp_upload_resume']['size'] > ( 2000000 ) ) {

                    return __('Your file size is to large', JOBWP_TXT_DOMAIN);

                } else {

                    $jobwpDir = wp_upload_dir();
                    $jobwpDir = $jobwpDir['basedir'];
                    $fileName = $jobwpDir . '/jobwp-resume/' . $_FILES['jobwp_upload_resume']['name'];

                    if ( ! is_writable( $jobwpDir . '/jobwp-resume' ) ) {

                        return 'The folder ' . __($jobwpDir . '/jobwp-resume') . ' cannot be created or is not writable. Ask for support to your hosting provider.';

                    } else {

                        if ( is_uploaded_file( $_FILES['jobwp_upload_resume']['tmp_name'] ) ) {

                            if ( file_exists( $fileName ) ) {
                                unlink( $fileName );
                            }

                            $r = move_uploaded_file( $_FILES['jobwp_upload_resume']['tmp_name'], $fileName );

                            if ( $r === false)  {
                                
                                return __('The file cannor be copied in the folder ' . $jobwpDir . '/jobwp-resume. Check if it exists and is writeable. You can also ask for support to your hosting provider.', JOBWP_TXT_DOMAIN);

                            } else {

                                global $wpdb;
                        
                                $table_name     = $wpdb->prefix . 'jobwp_applied';
        
                                $fullName       = isset( $post['jobwp_full_name'] ) ? sanitize_text_field( $post['jobwp_full_name'] ) : null;
                                $applyFor       = isset( $post['jobwp_apply_for'] ) ? sanitize_text_field( $post['jobwp_apply_for'] ) : null;
                                $email 		    = isset( $post['jobwp_email'] ) ? sanitize_email( $post['jobwp_email'] ) : null;
                                $phoneNumber    = isset( $post['phoneNumber'] ) ? sanitize_text_field( $post['phoneNumber'] ) : null;
                                $message        = isset( $post['jobwp_cover_letter'] ) ? sanitize_textarea_field( $post['jobwp_cover_letter'] ) : null;
        
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
                                    "' . $_FILES['jobwp_upload_resume']['name'] . '",
                                    "' . date('Y-m-d h:i:s') . '"
                                )');
                                
                                // Admin Notification Email
                                $attachments = array($fileName);
						
                                $headers = "MIME-Version: 1.0" . "\r\n";
                                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                                $headers .= 'From: Career' . "\r\n";
                                
                                $subject = __('Career - New Application', 'jobwp');
                                $emailMessage = __('Applicant: ', 'jobwp') . $fullName;
                                $emailMessage .= '<br>' . __( 'Applied For: ', 'jobwp' ) . $applyFor;
                                $emailMessage .= '<br>' . __( 'Email: ', 'jobwp' ) . $email;
                                //$emailMessage .= '<br>' . __( 'Phone: ' ) . $phoneNumber;
                                $emailMessage .= '<br>' . __( 'Cover Letter: ', 'jobwp' ) . $message;
                                wp_mail(
                                    esc_html( $admin_email ),
                                    $subject,
                                    $emailMessage,
                                    $headers,
                                    $attachments
                                );

                                // Applicant Notificaton Email Started
                                $subjectRec = "Thank you for applying!";

                                $recMessage = __('Hi', 'jobwp') . '&nbsp; ' . $fullName . ',';
                                $recMessage .= '<br><br>' . __('Thanks for applying to our', 'jobwp') . '&nbsp;' . $applyFor . '&nbsp;' . __('position', 'jobwp') . '.';
                                $recMessage .= '&nbsp;' . __("We'll review your application and be sure to get back to you if there might be a fit!", "jobwp");
                                $recMessage .= '<br><br>' . __('Best', 'jobwp') . ',';

                                wp_mail(
                                    esc_html( $email ),
                                    $subjectRec,
                                    $recMessage,
                                    $headers
                                );
                                // Applicant Notificaton Email Ended
        
                                return __('Thank you for your application', JOBWP_TXT_DOMAIN);
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