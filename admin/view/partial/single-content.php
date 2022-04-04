<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

//print_r( $jobwpSingleContent );
foreach ( $jobwpSingleContent as $option_name => $option_value ) {

    if ( isset( $jobwpSingleContent[$option_name] ) ) {

        ${"" . $option_name} = $option_value;

    }

}
?>
<form name="jobwp_single_content_settings_form" role="form" class="form-horizontal" method="post" action="" id="jobwp-single-content-settings-form">
    <table class="jobwp-single-settings-table">
        <tr>
            <th scope="row">
                <label><?php _e('Apply Procedure Title', JOBWP_TXT_DOMAIN); ?></label>
            </th>
            <td>
                <input type="text" name="jobwp_apply_procedure_title" id="jobwp_apply_procedure_title" class="regular-text" value="<?php esc_attr_e( $jobwp_apply_procedure_title ); ?>" />
            </td>
        </tr>
        <tr>
            <th scope="row" style="text-align: right;">
                <label><?php _e('Apply Procedure Content', JOBWP_TXT_DOMAIN); ?></label>
            </th>
            <td>
                <textarea cols="40" style="min-height:100px;" name="jobwp_apply_procedure_content" class="regular-text" id="jobwp_apply_procedure_content"><?php esc_html_e( $jobwp_apply_procedure_content ); ?></textarea>
            </td>
        </tr>
    </table>
    
    <p class="submit"><button id="updateSingleContent" name="updateSingleContent" class="button button-primary jobwp-button"><?php _e('Save Settings', JOBWP_TXT_DOMAIN); ?></button></p>

</form>