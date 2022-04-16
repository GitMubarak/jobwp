<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<table class="form-table">
    <tr class="jobwp_experience">
        <th scope="row">
            <label for="jobwp_experience"><?php _e('Year of Experience', JOBWP_TXT_DOMAIN); ?></label>
        </th>
        <td>
            <input type="text" name="jobwp_experience" value="<?php echo esc_attr( $jobwp_experience ); ?>" class="regular-text">
        </td>
    </tr>
    <tr class="jobwp_vacancies">
        <th scope="row">
            <label for="jobwp_vacancies"><?php _e('No. of Vacancies', JOBWP_TXT_DOMAIN); ?></label>
        </th>
        <td>
            <input type="number" min="1" max="20" step="1" name="jobwp_vacancies" value="<?php echo esc_attr( $jobwp_vacancies ); ?>" class="regular-text">
        </td>
    </tr>
    <tr class="jobwp_deadline">
        <th scope="row">
            <label for="jobwp_deadline"><?php _e('Deadline', JOBWP_TXT_DOMAIN); ?></label>
        </th>
        <td>
            <input type="text" name="jobwp_deadline" id="jobwp_deadline" value="<?php esc_attr_e( $jobwp_deadline ); ?>" class="medium-text" readonly>
        </td>
    </tr>
    <tr class="jobwp_status">
        <th scope="row">
            <label for="jobwp_status"><?php _e('Status', JOBWP_TXT_DOMAIN); ?></label>
        </th>
        <td>
            <input type="radio" name="jobwp_status" class="jobwp_status" id="jobwp_status_active" value="active" <?php echo ( 'inactive' !== esc_attr( $jobwp_status ) ) ? 'checked' : ''; ?> >
            <label for="jobwp_status_active"><span></span><?php _e( 'Active', JOBWP_TXT_DOMAIN ); ?></label>
            &nbsp;&nbsp;
            <input type="radio" name="jobwp_status" class="jobwp_status" id="jobwp_status_inactive" value="inactive" <?php echo ( 'inactive' === esc_attr( $jobwp_status ) ) ? 'checked' : ''; ?> >
            <label for="jobwp_status_inactive"><span></span><?php _e( 'Inactive', JOBWP_TXT_DOMAIN ); ?></label>
        </td>
    </tr>
</table>