<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
* Trait: Job Application
*/
trait JobWP_Applicaiton_Management
{
	/**
	 * Get applications with optional pagination.
	 */
	private function jobwp_get_all_applications( $per_page = 20, $offset = 0 ) {
		global $wpdb;

		$table_name = $wpdb->base_prefix . 'jobwp_applied';

		if ( 0 === (int) $per_page ) {
			return $wpdb->get_results(
				"SELECT * FROM $table_name ORDER BY job_id DESC"
			);
		}

		return $wpdb->get_results(
			$wpdb->prepare(
				"SELECT * FROM $table_name ORDER BY job_id DESC LIMIT %d OFFSET %d",
				$per_page,
				$offset
			)
		);
	}

	/**
	 * Get total number of applications.
	 */
	private function jobwp_get_applications_count() {

		global $wpdb;

		$table_name = $wpdb->base_prefix . 'jobwp_applied';

		return (int) $wpdb->get_var(
			"SELECT COUNT(*) FROM $table_name"
		);
	}

	/**
	 * Delete single application
	 */
	protected function jobwp_delete_single_application( $id ) {

		if ( ! current_user_can( 'edit_others_posts' ) ) {
			return __( 'You do not have permission to delete applications.', 'jobwp' );
		}

		$id = absint( $id );

		if ( ! $id ) {
			return __( 'Invalid application ID.', 'jobwp' );
		}

		global $wpdb;

		$table_name = $wpdb->base_prefix . 'jobwp_applied';

		$resume = $wpdb->get_row(
			$wpdb->prepare(
				"SELECT * FROM $table_name WHERE job_id = %d",
				$id
			),
			ARRAY_A
		);

		if ( ! $resume ) {
			return __( 'Application not found.', 'jobwp' );
		}

		$success = $wpdb->query(
			$wpdb->prepare(
				"DELETE FROM $table_name WHERE job_id = %d",
				$id
			)
		);

		if ( false === $success ) {
			return __( 'Failed to delete application.', 'jobwp' );
		}

		if ( 0 === $success ) {
			return __( 'Application not found.', 'jobwp' );
		}

		$upload_dir = wp_upload_dir();
		$resume_dir = trailingslashit( $upload_dir['basedir'] ) . 'jobwp-resume/';
		$resume_name = isset( $resume['resume_name'] ) ? basename( $resume['resume_name'] ) : '';

		if ( '' !== $resume_name ) {
			
			$file_name = $resume_dir . $resume_name;

			if ( is_file( $file_name ) ) {
				wp_delete_file( $file_name );
			}
		}

		return __( 'Application has been deleted.', 'jobwp' );
	}

	/**
	 * Delete multiple applications
	 */
	protected function jobwp_delete_delete_bulk_applications( $action ) {

		if ( ! current_user_can( 'edit_others_posts' ) ) {
			return __( 'You do not have permission to delete applications.', 'jobwp' );
		}

		if ( 'del_all' !== $action ) {
			return __( 'Please choose a valid bulk action.', 'jobwp' );
		}

		$req_array = isset( $_POST['jobwp_bulk_selection'] ) ? wp_unslash( $_POST['jobwp_bulk_selection'] ) : array();

		if ( ! is_array( $req_array ) || empty( $req_array ) ) {
			return __( 'Please select applications to delete.', 'jobwp' );
		}

		$deleted = 0;

		foreach ( $req_array as $row_id ) {

			$row_id = absint( $row_id );

			if ( $row_id && $this->jobwp_delete_single_application( $row_id ) ) {
				$deleted++;
			}
		}

		if ( $deleted > 0 ) {
			return sprintf(
				/* translators: %d: Number of deleted applications. */
				_n(
					'%d application has been deleted.',
					'%d applications have been deleted.',
					$deleted,
					'jobwp'
				),
				$deleted
			);
		}

		return __( 'No applications were deleted.', 'jobwp' );
	}

	/**
	 * Export applications to csv
	 */
	function jobwp_export_applications_to_csv() {

		if ( ! current_user_can( 'manage_options' ) ) {
            return;
        }

		if ( ! isset( $_POST['jobwp_download_csv'] ) ) {
			return;
		}

		check_admin_referer( 'jobwp_download_csv_action', 'jobwp_csv_nonce' );

		if ( job_fs()->is_plan__premium_only('pro', true) ) {

			$applications = $this->jobwp_get_all_applications( 0 );

			$filename = 'applications-' . time() . '.csv';

			header( 'Content-Type: text/csv; charset=utf-8' );
			header( 'Content-Disposition: attachment; filename="' . esc_attr( $filename ) . '"' );
			header( 'Pragma: no-cache' );
			header( 'Expires: 0' );

			$output = fopen( 'php://output', 'w' );

			// CSV Header
			fputcsv(
				$output,
				array(
					'Applied For',
					'Name',
					'Email',
					'Cover Letter',
					'Applied On',
					'Resume Link',
					'User Consent',
					'Phone',
				)
			);

			foreach ( $applications as $application ) {

				$row = array();

				$row[] = sanitize_text_field( $application->applied_for );
				$row[] = sanitize_text_field( $application->applicant_name );
				$row[] = sanitize_email( $application->applicant_email );
				$row[] = sanitize_text_field( $application->applicant_message );
				$row[] = ! empty( $application->applied_on ) ? gmdate( 'd-m-Y', strtotime( $application->applied_on ) ) : '';
				$row[] = sanitize_text_field( $application->resume_name );
				$row[] = ( 'on' === $application->user_consent ) ? 'Yes' : '';
				$row[] = sanitize_text_field( $application->intl_tel );
				
				fputcsv( $output, $row );
			}
			
			exit;
		}
	}

}