<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

//print_r( $jobwpListingContent );
foreach ( $jobwpListingContent as $option_name => $option_value ) {
    if ( isset( $jobwpListingContent[$option_name] ) ) {
        ${"" . $option_name} = $option_value;
    }
}
?>
<form name="jobwp_listing_content_settings_form" role="form" class="form-horizontal" method="post" action="" id="jobwp-listing-content-settings-form">
    <table class="jobwp-listing-content-settings-table">
        <tr>
            <th scope="row">
                <label for="jobwp_list_display_overview"><?php _e('Hide Overview', JOBWP_TXT_DOMAIN); ?>?</label>
            </th>
            <td>
                <input type="checkbox" name="jobwp_list_display_overview" class="jobwp_list_display_overview" id="jobwp_list_display_overview" value="1"
                    <?php echo $jobwp_list_display_overview ? 'checked' : ''; ?> >
            </td>
        </tr>
        <tr>
            <th scope="row">
                <label for="wbg_cat_label_txt"><?php _e('Overview Word Lengtht', JOBWP_TXT_DOMAIN); ?>:</label>
            </th>
            <td>
                <input type="number" name="jobwp_list_overview_length" class="medium-text" min="1" max="150" step="1" value="<?php esc_attr_e( $jobwp_list_overview_length ); ?>">
            </td>
        </tr>
        <tr>
            <th scope="row">
                <label><?php _e('Experience Label Text', JOBWP_TXT_DOMAIN); ?></label>
            </th>
            <td>
                <input type="text" name="jobwp_list_exp_lbl_txt" id="jobwp_list_exp_lbl_txt" class="regular-text" value="<?php esc_attr_e( $jobwp_list_exp_lbl_txt ); ?>" />
            </td>
        </tr>
        <tr>
            <th scope="row">
                <label><?php _e('Deadline Label Text', JOBWP_TXT_DOMAIN); ?></label>
            </th>
            <td>
                <input type="text" name="jobwp_list_deadline_lbl_txt" id="jobwp_list_deadline_lbl_txt" class="regular-text" value="<?php esc_attr_e( $jobwp_list_deadline_lbl_txt ); ?>" />
            </td>
        </tr>
    </table>
    <hr>
    <p class="submit">
        <button id="updateListingContent" name="updateListingContent" class="button button-primary jobwp-button">
            <i class="fa fa-check-circle" aria-hidden="true"></i>&nbsp;<?php _e('Save Settings', JOBWP_TXT_DOMAIN); ?>
        </button>
    </p>

</form>