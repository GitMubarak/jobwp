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
<?php wp_nonce_field( 'jobwp_listing_content_action', 'jobwp_listing_content_nonce' ); ?>
    <table class="jobwp-listing-content-settings-table">
        <tr class="jobwp_display_company_name">
            <th scope="row">
                <label for="jobwp_display_company_name"><?php _e('Display Company Name', JOBWP_TXT_DOMAIN); ?>?</label>
            </th>
            <td>
                <?php
                if ( ! job_fs()->is_plan__premium_only('pro', true) ) {
                    ?>
                    <span><?php echo '<a href="' . job_fs()->get_upgrade_url() . '">' . __('Please Upgrade Now', 'jobwp') . '</a>'; ?></span>
                    <?php
                }

                if ( job_fs()->is_plan__premium_only('pro', true) ) {
                    ?>
                    <input type="checkbox" name="jobwp_display_company_name" class="jobwp_display_company_name" id="jobwp_display_company_name" <?php echo $jobwp_display_company_name ? 'checked' : ''; ?>>
                    <?php
                }
                ?>
            </td>
        </tr>
        <tr class="jobwp_display_company_logo">
            <th scope="row">
                <label for="jobwp_display_company_logo"><?php _e('Display Company Logo', JOBWP_TXT_DOMAIN); ?>?</label>
            </th>
            <td>
                <?php
                if ( ! job_fs()->is_plan__premium_only('pro', true) ) {
                    ?>
                    <span><?php echo '<a href="' . job_fs()->get_upgrade_url() . '">' . __('Please Upgrade Now', 'jobwp') . '</a>'; ?></span>
                    <?php
                }

                if ( job_fs()->is_plan__premium_only('pro', true) ) {
                    ?>
                    <input type="checkbox" name="jobwp_display_company_logo" class="jobwp_display_company_logo" id="jobwp_display_company_logo" <?php echo $jobwp_display_company_logo ? 'checked' : ''; ?>>
                    <?php
                }
                ?>
            </td>
        </tr>
        <!-- Hide Overview -->
        <tr>
            <th scope="row">
                <label for="jobwp_list_display_overview"><?php _e('Hide Overview', JOBWP_TXT_DOMAIN); ?>?</label>
                <span class="dashicons dashicons-info-outline jobwp-admin-icon"></span>
                <img src="<?php echo esc_attr( JOBWP_ASSETS . 'img/jobwp-list-hide-overview.webp' ); ?>" class="jobwp-admin-help-img">
            </th>
            <td>
                <input type="checkbox" name="jobwp_list_display_overview" class="jobwp_list_display_overview" id="jobwp_list_display_overview"
                    <?php echo $jobwp_list_display_overview ? 'checked' : ''; ?> >
            </td>
            <th scope="row">
                <label for="wbg_cat_label_txt"><?php _e('Word Lengtht', JOBWP_TXT_DOMAIN); ?></label>
            </th>
            <td>
                <input type="number" name="jobwp_list_overview_length" class="medium-text" min="1" max="150" step="1" value="<?php esc_attr_e( $jobwp_list_overview_length ); ?>">
            </td>
        </tr>
        <tr>
            <td colspan="4"><hr><hr></td>
        </tr>
        <!-- Hide Experience -->
        <tr>
            <th scope="row">
                <label for="jobwp_list_display_experience"><?php _e('Hide Experience', JOBWP_TXT_DOMAIN); ?>?</label>
            </th>
            <td>
                <input type="checkbox" name="jobwp_list_display_experience" class="jobwp_list_display_experience" id="jobwp_list_display_experience"
                    <?php echo $jobwp_list_display_experience ? 'checked' : ''; ?> >
            </td>
            <th scope="row">
                <label><?php _e('Label Text', JOBWP_TXT_DOMAIN); ?></label>
            </th>
            <td>
                <input type="text" name="jobwp_list_exp_lbl_txt" id="jobwp_list_exp_lbl_txt" class="regular-text" value="<?php esc_attr_e( $jobwp_list_exp_lbl_txt ); ?>" />
            </td>
        </tr>
        <tr>
            <th scope="row">
                <label for="jobwp_list_display_deadline"><?php _e('Hide Deadline', JOBWP_TXT_DOMAIN); ?>?</label>
            </th>
            <td>
                <input type="checkbox" name="jobwp_list_display_deadline" class="jobwp_list_display_deadline" id="jobwp_list_display_deadline"
                    <?php echo $jobwp_list_display_deadline ? 'checked' : ''; ?> >
            </td>
            <th scope="row">
                <label><?php _e('Label Text', JOBWP_TXT_DOMAIN); ?></label>
            </th>
            <td>
                <input type="text" name="jobwp_list_deadline_lbl_txt" id="jobwp_list_deadline_lbl_txt" class="regular-text" value="<?php esc_attr_e( $jobwp_list_deadline_lbl_txt ); ?>" />
            </td>
        </tr>
        <tr>
            <th scope="row">
                <label for="jobwp_list_display_location"><?php _e('Hide Location', JOBWP_TXT_DOMAIN); ?>?</label>
            </th>
            <td>
                <input type="checkbox" name="jobwp_list_display_location" class="jobwp_list_display_location" id="jobwp_list_display_location"
                    <?php echo $jobwp_list_display_location ? 'checked' : ''; ?> >
            </td>
            <th scope="row">
                <label><?php _e('Label Text', JOBWP_TXT_DOMAIN); ?></label>
            </th>
            <td>
                <input type="text" name="jobwp_list_loc_lbl_txt" id="jobwp_list_loc_lbl_txt" class="regular-text" value="<?php esc_attr_e( $jobwp_list_loc_lbl_txt ); ?>" />
            </td>
        </tr>
        <tr class="jobwp_list_display_jtype">
            <th scope="row">
                <label for="jobwp_list_display_jtype"><?php _e('Hide Job Type', JOBWP_TXT_DOMAIN); ?>?</label>
            </th>
            <td>
                <input type="checkbox" name="jobwp_list_display_jtype" class="jobwp_list_display_jtype" id="jobwp_list_display_jtype"
                    <?php echo $jobwp_list_display_jtype ? 'checked' : ''; ?> >
            </td>
            <th scope="row">
                <label><?php _e('Label Text', JOBWP_TXT_DOMAIN); ?></label>
            </th>
            <td>
                <input type="text" name="jobwp_list_job_type_lbl_txt" id="jobwp_list_job_type_lbl_txt" class="regular-text" value="<?php esc_attr_e( $jobwp_list_job_type_lbl_txt ); ?>" />
            </td>
        </tr>
        <tr class="jobwp_list_display_salary">
            <th scope="row">
                <label for="jobwp_list_display_salary"><?php _e('Display Salary', JOBWP_TXT_DOMAIN); ?>?</label>
            </th>
            <td>
                <?php
                if ( ! job_fs()->is_plan__premium_only('pro', true) ) {
                    ?>
                    <span><?php echo '<a href="' . job_fs()->get_upgrade_url() . '">' . __('Please Upgrade Now', 'jobwp') . '</a>'; ?></span>
                    <?php
                }

                if ( job_fs()->is_plan__premium_only('pro', true) ) {
                    ?>
                    <input type="checkbox" name="jobwp_list_display_salary" class="jobwp_list_display_salary" id="jobwp_list_display_salary" value="1" <?php checked( $jobwp_list_display_salary, 1 ); ?> />
                    <?php
                }
                ?>
            </td>
            <th scope="row">
                <label><?php _e('Label Text', JOBWP_TXT_DOMAIN); ?></label>
            </th>
            <td>
                <?php
                if ( ! job_fs()->is_plan__premium_only('pro', true) ) {
                    ?>
                    <span><?php echo '<a href="' . job_fs()->get_upgrade_url() . '">' . __('Please Upgrade Now', 'jobwp') . '</a>'; ?></span>
                    <?php
                }

                if ( job_fs()->is_plan__premium_only('pro', true) ) {
                    ?>
                    <input type="text" name="jobwp_list_salary_lbl_txt" id="jobwp_list_salary_lbl_txt" class="regular-text" value="<?php esc_attr_e( $jobwp_list_salary_lbl_txt ); ?>" />
                    <?php
                }
                ?>
            </td>
        </tr>
        <tr class="jobwp_list_display_responsibility">
            <th scope="row">
                <label for="jobwp_list_display_responsibility"><?php _e('Display Responsibility', JOBWP_TXT_DOMAIN); ?>?</label>
            </th>
            <td>
                <?php
                if ( ! job_fs()->is_plan__premium_only('pro', true) ) {
                    ?>
                    <span><?php echo '<a href="' . job_fs()->get_upgrade_url() . '">' . __('Please Upgrade Now', 'jobwp') . '</a>'; ?></span>
                    <?php
                }

                if ( job_fs()->is_plan__premium_only('pro', true) ) {
                    ?>
                    <input type="checkbox" name="jobwp_list_display_responsibility" class="jobwp_list_display_responsibility" id="jobwp_list_display_responsibility" value="1" <?php checked( $jobwp_list_display_responsibility, 1 ); ?> />
                    <?php
                }
                ?>
            </td>
            <th scope="row">
                <label><?php _e('Label Text', JOBWP_TXT_DOMAIN); ?></label>
            </th>
            <td>
                <?php
                if ( ! job_fs()->is_plan__premium_only('pro', true) ) {
                    ?>
                    <span><?php echo '<a href="' . job_fs()->get_upgrade_url() . '">' . __('Please Upgrade Now', 'jobwp') . '</a>'; ?></span>
                    <?php
                }

                if ( job_fs()->is_plan__premium_only('pro', true) ) {
                    ?>
                    <input type="text" name="jobwp_list_respo_lbl_txt" id="jobwp_list_respo_lbl_txt" class="regular-text" value="<?php esc_attr_e( $jobwp_list_respo_lbl_txt ); ?>" />
                    <?php
                }
                ?>
            </td>
        </tr>
        <tr>
            <td colspan="4"><hr><hr></td>
        </tr>
        <tr class="jobwp_display_listing_read_more">
            <th scope="row">
                <label for="jobwp_display_listing_read_more"><?php _e('Display Read More', JOBWP_TXT_DOMAIN); ?>?</label>
            </th>
            <td>
                <?php
                if ( ! job_fs()->is_plan__premium_only('pro', true) ) {
                    ?>
                    <span><?php echo '<a href="' . job_fs()->get_upgrade_url() . '">' . __('Please Upgrade Now', 'jobwp') . '</a>'; ?></span>
                    <?php
                }

                if ( job_fs()->is_plan__premium_only('pro', true) ) {
                    ?>
                    <input type="checkbox" name="jobwp_display_listing_read_more" class="jobwp_display_listing_read_more" id="jobwp_display_listing_read_more" <?php echo $jobwp_display_listing_read_more ? 'checked' : ''; ?>>
                    <?php
                }
                ?>
            </td>
            <th scope="row">
                <label for="jobwp_listing_read_more_txt"><?php _e('Label Text', JOBWP_TXT_DOMAIN); ?></label>
            </th>
            <td>
                <?php
                if ( ! job_fs()->is_plan__premium_only('pro', true) ) {
                    ?>
                    <span><?php echo '<a href="' . job_fs()->get_upgrade_url() . '">' . __('Please Upgrade Now', 'jobwp') . '</a>'; ?></span>
                    <?php
                }

                if ( job_fs()->is_plan__premium_only('pro', true) ) {
                    ?>
                    <input type="text" name="jobwp_listing_read_more_txt" id="jobwp_listing_read_more_txt" class="regular-text" value="<?php esc_attr_e( $jobwp_listing_read_more_txt ); ?>" />
                    <?php
                }
                ?>
            </td>
        </tr>
        <tr class="jobwp_hide_total_jobs_found">
            <th scope="row">
                <label for="jobwp_hide_total_jobs_found"><?php _e('Hide Total Jobs Found', JOBWP_TXT_DOMAIN); ?>?</label>
            </th>
            <td>
                <input type="checkbox" name="jobwp_hide_total_jobs_found" class="jobwp_hide_total_jobs_found" id="jobwp_hide_total_jobs_found"
                    <?php echo $jobwp_hide_total_jobs_found ? 'checked' : ''; ?> >
            </td>
            <th scope="row">
                <label for="jobwp_total_jobs_found_lbl_txt"><?php _e('Label Text', JOBWP_TXT_DOMAIN); ?></label>
            </th>
            <td>
                <input type="text" name="jobwp_total_jobs_found_lbl_txt" id="jobwp_total_jobs_found_lbl_txt" class="regular-text" value="<?php esc_attr_e( $jobwp_total_jobs_found_lbl_txt ); ?>" />
            </td>
        </tr>
        <tr class="jobwp_display_listing_icon">
            <th scope="row">
                <label for="jobwp_display_listing_icon"><?php _e('Hide Icon', JOBWP_TXT_DOMAIN); ?>?</label>
            </th>
            <td>
                <?php
                if ( ! job_fs()->is_plan__premium_only('pro', true) ) {
                    ?>
                    <span><?php echo '<a href="' . job_fs()->get_upgrade_url() . '">' . __('Please Upgrade Now', 'jobwp') . '</a>'; ?></span>
                    <?php
                }

                if ( job_fs()->is_plan__premium_only('pro', true) ) {
                    ?>
                    <input type="checkbox" name="jobwp_display_listing_icon" class="jobwp_display_listing_icon" id="jobwp_display_listing_icon" <?php echo $jobwp_display_listing_icon ? 'checked' : ''; ?>>
                    <?php
                }
                ?>
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