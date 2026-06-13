<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Step1: Add Fields
add_action( 'jobs_location_add_form_fields', 'jobwp_location_add_extra_fields', 10, 2 );
function jobwp_location_add_extra_fields( $taxonomy ) {
    ?>
    <div class="form-field term-group">
        <label for="jobwp_location_post_code"><?php _e('Postal Code', 'jobwp'); ?></label>
        <input type="text" name="jobwp_location_post_code"  id="jobwp-location-post-code" class="jobwp-location-post-code">
    </div>
    <?php
}

// Step2: Save Fields
add_action( 'created_jobs_location', 'jobwp_location_save_extra_fields', 10, 2 );
function jobwp_location_save_extra_fields ( $term_id, $tt_id ) {
	
    // Postal Code
    $jobwp_location_post_code = ( isset( $_POST['jobwp_location_post_code'] ) && '' !== $_POST['jobwp_location_post_code'] ) ? sanitize_text_field( $_POST['jobwp_location_post_code'] ) : '';
    add_term_meta( $term_id, 'jobwp_location_post_code', $jobwp_location_post_code, true );
}

// Step3: Display Extra Fields in Edit Form
add_action( 'jobs_location_edit_form_fields', 'jobwp_location_edit_extra_fields', 10, 2 );
function jobwp_location_edit_extra_fields ( $term, $taxonomy ) {

    $jobwp_location_post_code   = get_term_meta( $term->term_id, 'jobwp_location_post_code', true );
    ?>
    <tr class="form-field term-group-wrap">
        <th scope="row">
            <label for="jobwp_location_post_code"><?php _e('Postal Code', 'jobwp'); ?></label>
        </th>
        <td>
            <input type="text" name="jobwp_location_post_code" value="<?php esc_attr_e( $jobwp_location_post_code ); ?>" id="jobwp-location-post-code" class="jobwp-location-post-code">
        </td>
    </tr>
    <?php
}

// Step4: Update extra Field
add_action( 'edited_jobs_location', 'jobwp_location_update_extra_fields', 10, 2 );
function jobwp_location_update_extra_fields ( $term_id, $tt_id ) {

    // Update Postal Code
    $jobwp_location_post_code = ( isset( $_POST['jobwp_location_post_code'] ) && '' !== $_POST['jobwp_location_post_code'] ) ? sanitize_text_field( $_POST['jobwp_location_post_code'] ) : '';
    update_term_meta ( $term_id, 'jobwp_location_post_code', $jobwp_location_post_code );
}

// Step5: Location Extra Column Data
add_filter( 'manage_edit-jobs_location_columns', 'jobwp_location_extra_fields_in_column_heading' );
function jobwp_location_extra_fields_in_column_heading( $columns ) {

    $columns['jobwp_location_post_code'] = __('Postal Code', 'jobwp');
    return $columns;
}

add_action( 'manage_jobs_location_custom_column', 'jobwp_location_extra_fields_in_column', 10, 3 );
function jobwp_location_extra_fields_in_column( $string, $columns, $term_id ) {

    $jobwp_location_post_code = get_term_meta( $term_id, 'jobwp_location_post_code', true );

    switch ( $columns ) {
        case 'jobwp_location_post_code' :
            esc_html_e( $jobwp_location_post_code, 'jobwp' );
        break;
        case 'jobwp_company_addr' :
            esc_html_e( $jobwp_company_addr );
        break;
    }
}