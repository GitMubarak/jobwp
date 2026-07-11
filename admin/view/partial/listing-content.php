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
    <table class="hm-settings-table jobwp-listing-content-settings-table" cellpadding="0" cellspacing="0">
        <!-- Title Word Lengtht -->
        <tr>
            <th scope="row">
                <label for="jobwp_list_title_length"><i class="fa-solid fa-check"></i>&nbsp;<?php _e('Title Word Length', 'jobwp'); ?></label>
            </th>
            <td colspan="6">
                <input type="number" name="jobwp_list_title_length" class="medium-text" min="1" max="150" step="1" value="<?php esc_attr_e( $jobwp_list_title_length ); ?>">
            </td>
        </tr>
        <?php
        $jobwp_upgrade_arr = [
            'label' => 'Display company name & logo',
            'icon' => 'fa-regular fa-address-card',
            'message' => "Show the hiring company's name and logo on each listing card — essential for recruitment agencies posting jobs on behalf of multiple clients.",
            'colspan' => 5
        ];

        $this->jobwp_upgrade_to_premium_section( $jobwp_upgrade_arr );

        if ( job_fs()->is_plan__premium_only('pro', true) ) {
            ?>
            <tr class="jobwp_display_company_name">
                <th scope="row">
                    <label><i class="fa-solid fa-check"></i>&nbsp;<?php _e('Display Company Name', 'jobwp'); ?>?</label>
                </th>
                <td>
                    <input type="checkbox" name="jobwp_display_company_name" class="jobwp_display_company_name" id="jobwp_display_company_name" <?php echo $jobwp_display_company_name ? 'checked' : ''; ?>>
                    <label for="jobwp_display_company_name"><?php _e('Enable', 'jobwp'); ?></label>
                </td>
                <th scope="row">
                    <label><i class="fa-solid fa-check"></i>&nbsp;<?php _e('Display Company Logo', 'jobwp'); ?>?</label>
                </th>
                <td colspan="3">
                    <input type="checkbox" name="jobwp_display_company_logo" class="jobwp_display_company_logo" id="jobwp_display_company_logo" <?php echo $jobwp_display_company_logo ? 'checked' : ''; ?>>
                    <label for="jobwp_display_company_logo"><?php _e('Enable', 'jobwp'); ?></label>
                </td>
            </tr>
            <?php
        }
        ?>
        <!-- Hide Overview -->
        <tr class="jobwp_list_display_overview">
            <th scope="row">
                <label><i class="fa-solid fa-check"></i>&nbsp;<?php _e('Hide Overview', 'jobwp'); ?>?</label>
                <span class="dashicons dashicons-info-outline jobwp-admin-icon"></span>
                <img src="<?php echo esc_attr( JOBWP_ASSETS . 'img/jobwp-list-hide-overview.webp' ); ?>" class="jobwp-admin-help-img">
            </th>
            <td>
                <input type="checkbox" name="jobwp_list_display_overview" class="jobwp_list_display_overview" id="jobwp_list_display_overview"
                    <?php echo $jobwp_list_display_overview ? 'checked' : ''; ?>>
                <label for="jobwp_list_display_overview"><?php _e('Enable', 'jobwp'); ?></label>
            </td>
            <th scope="row">
                <label for="wbg_cat_label_txt"><i class="fa-solid fa-check"></i>&nbsp;<?php _e('Word Length', 'jobwp'); ?></label>
            </th>
            <td colspan="3">
                <input type="number" name="jobwp_list_overview_length" class="medium-text" min="1" max="150" step="1" value="<?php esc_attr_e( $jobwp_list_overview_length ); ?>">
            </td>
        </tr>
        <!-- Job Information -->
        <tr class="jobwp-settings-section">
            <td colspan="6" class="jobwp-settings-block-title"><i class="fa-regular fa-rectangle-list"></i>&nbsp;<?php _e('Job Information', 'jobwp'); ?></td>
        </tr>
        <!-- Hide Experience -->
        <tr>
            <th scope="row">
                <label><i class="fa-solid fa-check"></i>&nbsp;<?php _e('Hide Experience', 'jobwp'); ?>?</label>
            </th>
            <td>
                <input type="checkbox" name="jobwp_list_display_experience" class="jobwp_list_display_experience" id="jobwp_list_display_experience"
                    <?php echo $jobwp_list_display_experience ? 'checked' : ''; ?>>
                <label for="jobwp_list_display_experience"><?php _e('Enable', 'jobwp'); ?></label>
            </td>
            <th scope="row">
                <label><i class="fa-solid fa-check"></i>&nbsp;<?php _e('Label Text', 'jobwp'); ?></label>
            </th>
            <td>
                <input type="text" name="jobwp_list_exp_lbl_txt" id="jobwp_list_exp_lbl_txt" class="medium-text" value="<?php esc_attr_e( $jobwp_list_exp_lbl_txt ); ?>" />
            </td>
            <th scope="row">
                <label for="jobwp_list_exp_order"><i class="fa-solid fa-check"></i>&nbsp;<?php _e('Order', 'jobwp'); ?></label>
            </th>
            <td>
                <input type="number" name="jobwp_list_exp_order" class="medium-text" min="1" max="20" step="1" value="<?php esc_attr_e( $jobwp_list_exp_order ); ?>">
            </td>
        </tr>
        <!-- Hide Deadline -->
        <tr>
            <th scope="row">
                <label><i class="fa-solid fa-check"></i>&nbsp;<?php _e('Hide Deadline', 'jobwp'); ?>?</label>
            </th>
            <td>
                <input type="checkbox" name="jobwp_list_display_deadline" class="jobwp_list_display_deadline" id="jobwp_list_display_deadline"
                    <?php echo $jobwp_list_display_deadline ? 'checked' : ''; ?>>
                <label for="jobwp_list_display_deadline"><?php _e('Enable', 'jobwp'); ?></label>
            </td>
            <th scope="row">
                <label><i class="fa-solid fa-check"></i>&nbsp;<?php _e('Label Text', 'jobwp'); ?></label>
            </th>
            <td>
                <input type="text" name="jobwp_list_deadline_lbl_txt" id="jobwp_list_deadline_lbl_txt" class="medium-text" value="<?php esc_attr_e( $jobwp_list_deadline_lbl_txt ); ?>" />
            </td>
            <th scope="row">
                <label for="jobwp_list_deadline_order"><i class="fa-solid fa-check"></i>&nbsp;<?php _e('Order', 'jobwp'); ?></label>
            </th>
            <td>
                <input type="number" name="jobwp_list_deadline_order" class="medium-text" min="1" max="20" step="1" value="<?php esc_attr_e( $jobwp_list_deadline_order ); ?>">
            </td>
        </tr>
        <!-- Hide Location -->
        <tr>
            <th scope="row">
                <label><i class="fa-solid fa-check"></i>&nbsp;<?php _e('Hide Location', 'jobwp'); ?>?</label>
            </th>
            <td>
                <input type="checkbox" name="jobwp_list_display_location" class="jobwp_list_display_location" id="jobwp_list_display_location"
                    <?php echo $jobwp_list_display_location ? 'checked' : ''; ?>>
                <label for="jobwp_list_display_location"><?php _e('Enable', 'jobwp'); ?></label>
            </td>
            <th scope="row">
                <label><i class="fa-solid fa-check"></i>&nbsp;<?php _e('Label Text', 'jobwp'); ?></label>
            </th>
            <td>
                <input type="text" name="jobwp_list_loc_lbl_txt" id="jobwp_list_loc_lbl_txt" class="medium-text" value="<?php esc_attr_e( $jobwp_list_loc_lbl_txt ); ?>" />
            </td>
            <th scope="row">
                <label for="jobwp_list_loc_order"><i class="fa-solid fa-check"></i>&nbsp;<?php _e('Order', 'jobwp'); ?></label>
            </th>
            <td>
                <input type="number" name="jobwp_list_loc_order" class="medium-text" min="1" max="20" step="1" value="<?php esc_attr_e( $jobwp_list_loc_order ); ?>">
            </td>
        </tr>
        <!-- Hide Job Type -->
        <tr class="jobwp_list_display_jtype">
            <th scope="row">
                <label><i class="fa-solid fa-check"></i>&nbsp;<?php _e('Hide Job Type', 'jobwp'); ?>?</label>
            </th>
            <td>
                <input type="checkbox" name="jobwp_list_display_jtype" class="jobwp_list_display_jtype" id="jobwp_list_display_jtype"
                    <?php echo $jobwp_list_display_jtype ? 'checked' : ''; ?>>
                <label for="jobwp_list_display_jtype"><?php _e('Enable', 'jobwp'); ?></label>
            </td>
            <th scope="row">
                <label><i class="fa-solid fa-check"></i>&nbsp;<?php _e('Label Text', 'jobwp'); ?></label>
            </th>
            <td>
                <input type="text" name="jobwp_list_job_type_lbl_txt" id="jobwp_list_job_type_lbl_txt" class="medium-text" value="<?php esc_attr_e( $jobwp_list_job_type_lbl_txt ); ?>" />
            </td>
            <th scope="row">
                <label for="jobwp_list_jobtype_order"><i class="fa-solid fa-check"></i>&nbsp;<?php _e('Order', 'jobwp'); ?></label>
            </th>
            <td>
                <input type="number" name="jobwp_list_jobtype_order" class="medium-text" min="1" max="20" step="1" value="<?php esc_attr_e( $jobwp_list_jobtype_order ); ?>">
            </td>
        </tr>
        <!-- Hide Salary -->
        <?php
        $jobwp_upgrade_arr = [
            'label' => 'Display salary',
            'icon' => 'fa-solid fa-sack-dollar',
            'message' => "Show the salary range on the listing card — candidates filter by salary and listings with it visible get more clicks.",
            'colspan' => 5
        ];

        $this->jobwp_upgrade_to_premium_section( $jobwp_upgrade_arr );
        
        if ( job_fs()->is_plan__premium_only('pro', true) ) {
            ?>
            <tr class="jobwp_list_display_salary">
                <th scope="row">
                    <label><i class="fa-solid fa-check"></i>&nbsp;<?php _e('Display Salary', 'jobwp'); ?>?</label>
                </th>
                <td>
                    <input type="checkbox" name="jobwp_list_display_salary" class="jobwp_list_display_salary" id="jobwp_list_display_salary" value="1" 
                        <?php checked( $jobwp_list_display_salary, 1 ); ?> />
                    <label for="jobwp_list_display_salary"><?php _e('Enable', 'jobwp'); ?></label>   
                </td>
                <th scope="row">
                    <label><i class="fa-solid fa-check"></i>&nbsp;<?php _e('Label Text', 'jobwp'); ?></label>
                </th>
                <td>
                    <input type="text" name="jobwp_list_salary_lbl_txt" id="jobwp_list_salary_lbl_txt" class="medium-text" 
                        value="<?php esc_attr_e( $jobwp_list_salary_lbl_txt ); ?>" />
                </td>
                <th scope="row">
                    <label for="jobwp_list_salary_order"><i class="fa-solid fa-check"></i>&nbsp;<?php _e('Order', 'jobwp'); ?></label>
                </th>
                <td>
                    <input type="number" name="jobwp_list_salary_order" class="medium-text" min="1" max="20" step="1" 
                        value="<?php esc_attr_e( $jobwp_list_salary_order ); ?>" />
                </td>
            </tr>
            <?php
        }
        ?>
        <!-- Hide Responsibility -->
        <?php
        $jobwp_upgrade_arr = [
            'label' => 'Display responsibility & vacancy count',
            'icon' => 'fa-solid fa-clipboard-list',
            'message' => "Show job responsibilities and number of open positions directly on the listing — gives candidates more context before clicking through.",
            'colspan' => 5
        ];

        $this->jobwp_upgrade_to_premium_section( $jobwp_upgrade_arr );

        if ( job_fs()->is_plan__premium_only('pro', true) ) {
            ?>
            <tr class="jobwp_list_display_responsibility">
                <th scope="row">
                    <label><i class="fa-solid fa-check"></i>&nbsp;<?php _e('Display Responsibility', 'jobwp'); ?>?</label>
                </th>
                <td>
                    <input type="checkbox" name="jobwp_list_display_responsibility" class="jobwp_list_display_responsibility" id="jobwp_list_display_responsibility" value="1" 
                        <?php checked( $jobwp_list_display_responsibility, 1 ); ?> />
                    <label for="jobwp_list_display_responsibility"><?php _e('Enable', 'jobwp'); ?></label>
                </td>
                <th scope="row">
                    <label><i class="fa-solid fa-check"></i>&nbsp;<?php _e('Label Text', 'jobwp'); ?></label>
                </th>
                <td>
                    <input type="text" name="jobwp_list_respo_lbl_txt" id="jobwp_list_respo_lbl_txt" class="medium-text" value="<?php esc_attr_e( $jobwp_list_respo_lbl_txt ); ?>" />    
                </td>
                <th scope="row">
                    <label for="jobwp_list_role_order"><i class="fa-solid fa-check"></i>&nbsp;<?php _e('Order', 'jobwp'); ?></label>
                </th>
                <td>
                    <input type="number" name="jobwp_list_role_order" class="medium-text" min="1" max="20" step="1" value="<?php esc_attr_e( $jobwp_list_role_order ); ?>" />
                </td>
            </tr>
            <!-- Hide Vacancy -->
            <tr class="jobwp_list_display_vacancy">
                <th scope="row">
                    <label><i class="fa-solid fa-check"></i>&nbsp;<?php _e('Display Vacancy', 'jobwp'); ?>?</label>
                </th>
                <td>
                    <input type="checkbox" name="jobwp_list_display_vacancy" class="jobwp_list_display_vacancy" id="jobwp_list_display_vacancy" value="1" 
                        <?php checked( $jobwp_list_display_vacancy, 1 ); ?> />
                    <label for="jobwp_list_display_vacancy"><?php _e('Enable', 'jobwp'); ?></label>
                </td>
                <th scope="row">
                    <label><i class="fa-solid fa-check"></i>&nbsp;<?php _e('Label Text', 'jobwp'); ?></label>
                </th>
                <td>
                    <input type="text" name="jobwp_list_vacancy_lbl_txt" id="jobwp_list_vacancy_lbl_txt" class="medium-text" 
                        value="<?php esc_attr_e( $jobwp_list_vacancy_lbl_txt ); ?>" />   
                </td>
                <th scope="row">
                    <label for="jobwp_list_vacancy_order"><i class="fa-solid fa-check"></i>&nbsp;<?php _e('Order', 'jobwp'); ?></label>
                </th>
                <td>
                    <input type="number" name="jobwp_list_vacancy_order" class="medium-text" min="1" max="20" step="1" value="<?php esc_attr_e( $jobwp_list_vacancy_order ); ?>" />  
                </td>
            </tr>
            <?php
        }
        ?>
        <!-- Hide Publish Date -->
        <?php
        $jobwp_upgrade_arr = [
            'label' => 'Display publish date',
            'icon' => 'fa-regular fa-calendar-days',
            'message' => "Show when each job was posted — helps candidates identify fresh listings and builds trust in your board's activity.",
            'colspan' => 5
        ];

        $this->jobwp_upgrade_to_premium_section( $jobwp_upgrade_arr );

        if ( job_fs()->is_plan__premium_only('pro', true) ) {
            ?>
            <tr class="jobwp_list_display_publish_date">
                <th scope="row">
                    <label><i class="fa-solid fa-check"></i>&nbsp;<?php _e('Display Publish Date', 'jobwp'); ?>?</label>
                </th>
                <td>
                    <input type="checkbox" name="jobwp_list_display_publish_date" class="jobwp_list_display_publish_date" id="jobwp_list_display_publish_date" value="1" 
                        <?php checked( $jobwp_list_display_publish_date, 1 ); ?> />
                    <label for="jobwp_list_display_publish_date"><?php _e('Enable', 'jobwp'); ?></label>
                </td>
                <th scope="row">
                    <label><i class="fa-solid fa-check"></i>&nbsp;<?php _e('Label Text', 'jobwp'); ?></label>
                </th>
                <td>
                    <input type="text" name="jobwp_list_publish_date_lbl_txt" id="jobwp_list_publish_date_lbl_txt" class="medium-text" 
                        value="<?php esc_attr_e( $jobwp_list_publish_date_lbl_txt ); ?>" />
                </td>
                <th scope="row">
                    <label for="jobwp_list_pdate_order"><i class="fa-solid fa-check"></i>&nbsp;<?php _e('Order', 'jobwp'); ?></label>
                </th>
                <td>
                    <input type="number" name="jobwp_list_pdate_order" class="medium-text" min="1" max="20" step="1" 
                        value="<?php esc_attr_e( $jobwp_list_pdate_order ); ?>" />
                </td>
            </tr>
            <?php
        }
        ?>
        <!-- Other Settings -->
        <tr class="jobwp-settings-section">
            <td colspan="6" class="jobwp-settings-block-title"><i class="fa-solid fa-sliders"></i>&nbsp;<?php _e('Other Settings', 'jobwp'); ?></td>
        </tr>
        <!-- Display Read More -->
        <?php
        $jobwp_upgrade_arr = [
            'label' => 'Display read more button',
            'icon' => 'fa-solid fa-circle-plus',
            'message' => "Add a custom Read More button to listing cards with your own label text.",
            'colspan' => 5
        ];

        $this->jobwp_upgrade_to_premium_section( $jobwp_upgrade_arr );

        if ( job_fs()->is_plan__premium_only('pro', true) ) {
            ?>
            <tr class="jobwp_display_listing_read_more">
                <th scope="row">
                    <label><i class="fa-solid fa-check"></i>&nbsp;<?php _e('Display read more button', 'jobwp'); ?>?</label>
                </th>
                <td>
                    <input type="checkbox" name="jobwp_display_listing_read_more" class="jobwp_display_listing_read_more" id="jobwp_display_listing_read_more" 
                        <?php echo $jobwp_display_listing_read_more ? 'checked' : ''; ?>>
                    <label for="jobwp_display_listing_read_more"><?php _e('Enable', 'jobwp'); ?></label>
                </td>
                <th scope="row">
                    <label for="jobwp_listing_read_more_txt"><i class="fa-solid fa-check"></i>&nbsp;<?php _e('Label Text', 'jobwp'); ?></label>
                </th>
                <td colspan="3">
                    <input type="text" name="jobwp_listing_read_more_txt" id="jobwp_listing_read_more_txt" class="medium-text" 
                        value="<?php esc_attr_e( $jobwp_listing_read_more_txt ); ?>" />
                </td>
            </tr>
            <?php
        }
        ?>
        <!-- Hide Total Jobs Found -->
        <tr class="jobwp_hide_total_jobs_found">
            <th scope="row">
                <label><i class="fa-solid fa-check"></i>&nbsp;<?php _e('Hide Total Jobs Found', 'jobwp'); ?>?</label>
            </th>
            <td>
                <input type="checkbox" name="jobwp_hide_total_jobs_found" class="jobwp_hide_total_jobs_found" id="jobwp_hide_total_jobs_found"
                    <?php echo $jobwp_hide_total_jobs_found ? 'checked' : ''; ?>>
                <label for="jobwp_hide_total_jobs_found"><?php _e('Enable', 'jobwp'); ?></label>
            </td>
            <th scope="row">
                <label for="jobwp_total_jobs_found_lbl_txt"><i class="fa-solid fa-check"></i>&nbsp;<?php _e('Label Text', 'jobwp'); ?></label>
            </th>
            <td colspan="3">
                <input type="text" name="jobwp_total_jobs_found_lbl_txt" id="jobwp_total_jobs_found_lbl_txt" class="medium-text" value="<?php esc_attr_e( $jobwp_total_jobs_found_lbl_txt ); ?>" />
            </td>
        </tr>
        <!-- Hide Icon -->
        <?php
        $jobwp_upgrade_arr = [
            'label' => 'Hide icon',
            'icon' => 'fa-solid fa-square-xmark',
            'message' => "Remove the default job info icon from listings for a cleaner, more minimal design.",
            'colspan' => 5
        ];

        $this->jobwp_upgrade_to_premium_section( $jobwp_upgrade_arr );

        if ( job_fs()->is_plan__premium_only('pro', true) ) {
            ?>
            <tr class="jobwp_display_listing_icon">
                <th scope="row">
                    <label><i class="fa-solid fa-check"></i>&nbsp;<?php _e('Hide icon', 'jobwp'); ?>?</label>
                </th>
                <td colspan="5">
                    <input type="checkbox" name="jobwp_display_listing_icon" class="jobwp_display_listing_icon" id="jobwp_display_listing_icon" 
                        <?php echo $jobwp_display_listing_icon ? 'checked' : ''; ?>>
                    <label for="jobwp_display_listing_icon"><?php _e('Enable', 'jobwp'); ?></label>
                </td>
            </tr>
            <?php
        }
        ?>
        <tr class="jobwp_hide_pagination">
            <th scope="row">
                <label><i class="fa-solid fa-check"></i>&nbsp;<?php _e('Hide Pagination', 'jobwp'); ?>?</label>
            </th>
            <td colspan="5">
                <input type="checkbox" name="jobwp_hide_pagination" class="jobwp_hide_pagination" id="jobwp_hide_pagination" value="1" 
                    <?php checked( $jobwp_hide_pagination, 1 ); ?> />
                <label for="jobwp_hide_pagination"><?php _e('Enable', 'jobwp'); ?></label>
            </td>
        </tr>
    </table>
    <hr>
    <p class="submit">
        <button id="updateListingContent" name="updateListingContent" class="button button-primary jobwp-button">
            <i class="fa fa-check-circle" aria-hidden="true"></i>&nbsp;<?php _e('Save Settings', 'jobwp'); ?>
        </button>
    </p>

</form>