<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

//print_r( $jobwpSearchContent );
foreach ( $jobwpSearchContent as $option_name => $option_value ) {
    if ( isset( $jobwpSearchContent[$option_name] ) ) {
        ${"" . $option_name} = $option_value;
    }
}
?>
<form name="jobwp_search_content_settings_form" role="form" class="form-horizontal" method="post" action="" id="jobwp-search-content-settings-form">
    <table class="jobwp-listing-content-settings-table">
        <tr>
            <th scope="row">
                <label for="jobwp_hide_search_panel"><?php _e('Hide Search Panel', JOBWP_TXT_DOMAIN); ?>?</label>
            </th>
            <td colspan="3">
                <input type="checkbox" name="jobwp_hide_search_panel" id="jobwp_hide_search_panel" <?php echo $jobwp_hide_search_panel ? 'checked' : ''; ?>>
            </td>
        </tr>
        <tr><td colspan="4"><hr></td></tr>
        <tr>
            <th scope="row">
                <label for="jobwp_hide_search_keyword"><?php _e('Hide Keyword', JOBWP_TXT_DOMAIN); ?>?</label>
            </th>
            <td>
                <input type="checkbox" name="jobwp_hide_search_keyword" id="jobwp_hide_search_keyword" <?php echo $jobwp_hide_search_keyword ? 'checked' : ''; ?> >
            </td>
            <th scope="row">
                <label><?php _e('Placeholder Text', JOBWP_TXT_DOMAIN); ?></label>
            </th>
            <td>
                <input type="text" name="jobwp_search_keyword_ph" id="jobwp_search_keyword_ph" class="regular-text" value="<?php esc_attr_e( $jobwp_search_keyword_ph ); ?>" />
            </td>
        </tr>
        <tr>
            <th scope="row">
                <label for="jobwp_hide_search_category"><?php _e('Hide Category', JOBWP_TXT_DOMAIN); ?>?</label>
            </th>
            <td>
                <input type="checkbox" name="jobwp_hide_search_category" id="jobwp_hide_search_category" <?php echo $jobwp_hide_search_category ? 'checked' : ''; ?> >
            </td>
            <th scope="row">
                <label><?php _e('Placeholder Text', JOBWP_TXT_DOMAIN); ?></label>
            </th>
            <td>
                <input type="text" name="jobwp_search_category_ph" id="jobwp_search_category_ph" class="regular-text" value="<?php esc_attr_e( $jobwp_search_category_ph ); ?>" />
            </td>
        </tr>
        <tr>
            <th scope="row">
                <label for="jobwp_hide_search_jobtype"><?php _e('Hide Job Type', JOBWP_TXT_DOMAIN); ?>?</label>
            </th>
            <td>
                <input type="checkbox" name="jobwp_hide_search_jobtype" id="jobwp_hide_search_jobtype" <?php echo $jobwp_hide_search_jobtype ? 'checked' : ''; ?> >
            </td>
            <th scope="row">
                <label><?php _e('Placeholder Text', JOBWP_TXT_DOMAIN); ?></label>
            </th>
            <td>
                <input type="text" name="jobwp_search_jobtype_ph" id="jobwp_search_jobtype_ph" class="regular-text" value="<?php esc_attr_e( $jobwp_search_jobtype_ph ); ?>" />
            </td>
        </tr>
        <tr>
            <th scope="row">
                <label for="jobwp_hide_search_location"><?php _e('Hide Job Location', JOBWP_TXT_DOMAIN); ?>?</label>
            </th>
            <td>
                <input type="checkbox" name="jobwp_hide_search_location" id="jobwp_hide_search_location" <?php echo $jobwp_hide_search_location ? 'checked' : ''; ?> >
            </td>
            <th scope="row">
                <label><?php _e('Placeholder Text', JOBWP_TXT_DOMAIN); ?></label>
            </th>
            <td>
                <input type="text" name="jobwp_search_location_ph" id="jobwp_search_location_ph" class="regular-text" value="<?php esc_attr_e( $jobwp_search_location_ph ); ?>" />
            </td>
        </tr>
        <tr><td colspan="4"><hr></td></tr>
        <tr>
            <th scope="row">
                <label><?php _e('Search Button Text', JOBWP_TXT_DOMAIN); ?></label>
            </th>
            <td colspan="3">
                <input type="text" name="jobwp_search_button_txt" id="jobwp_search_button_txt" class="normal-text" value="<?php esc_attr_e( $jobwp_search_button_txt ); ?>" />
            </td>
        </tr>
    </table>
    <hr>
    <p class="submit">
        <button id="updateSearchContent" name="updateSearchContent" class="button button-primary jobwp-button">
            <i class="fa fa-check-circle" aria-hidden="true"></i>&nbsp;<?php _e('Save Settings', JOBWP_TXT_DOMAIN); ?>
        </button>
    </p>

</form>