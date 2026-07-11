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
<?php wp_nonce_field( 'jobwp_search_content_action', 'jobwp_search_content_nonce' ); ?>
    <table class="hm-settings-table jobwp-listing-content-settings-table" cellpadding="0" cellspacing="0">
        <!-- Hide Search Panel -->
        <tr>
            <th scope="row">
                <label><i class="fa-solid fa-check"></i>&nbsp;<?php _e('Hide Search Panel', 'jobwp'); ?>?</label>
            </th>
            <td colspan="5">
                <input type="checkbox" name="jobwp_hide_search_panel" id="jobwp_hide_search_panel" <?php echo $jobwp_hide_search_panel ? 'checked' : ''; ?>>
                <label for="jobwp_hide_search_panel"><?php _e('Enable', 'jobwp'); ?></label>
            </td>
        </tr>
        <!-- Search Items -->
        <tr class="jobwp-settings-section">
            <td colspan="6" class="jobwp-settings-block-title"><i class="fa-brands fa-sistrix"></i>&nbsp;<?php _e('Search Items', 'jobwp'); ?></td>
        </tr>
        <!-- Hide Keyword / Title -->
        <tr>
            <th scope="row">
                <label><i class="fa-solid fa-check"></i>&nbsp;<?php _e('Hide Keyword/Title', 'jobwp'); ?>?</label>
            </th>
            <td>
                <input type="checkbox" name="jobwp_hide_search_keyword" id="jobwp_hide_search_keyword" <?php echo $jobwp_hide_search_keyword ? 'checked' : ''; ?>>
                <label for="jobwp_hide_search_keyword"><?php _e('Enable', 'jobwp'); ?></label>
            </td>
            <th scope="row">
                <label><i class="fa-solid fa-check"></i>&nbsp;<?php _e('Placeholder Text', 'jobwp'); ?></label>
            </th>
            <td>
                <input type="text" name="jobwp_search_keyword_ph" id="jobwp_search_keyword_ph" class="medium-text" value="<?php esc_attr_e( $jobwp_search_keyword_ph ); ?>" />
            </td>
            <?php
            if ( job_fs()->is_plan__premium_only('pro', true) ) {
                ?>
                <th scope="row">
                    <label><i class="fa-solid fa-check"></i>&nbsp;<?php _e('Order', 'jobwp'); ?></label>
                </th>
                <td>
                    <input type="number" name="jobwp_search_title_order" class="medium-text" min="1" max="20" step="1" value="<?php esc_attr_e( $jobwp_search_title_order ); ?>">
                </td>
                <?php
            }
            ?>
        </tr>
        <!-- Hide Category -->
        <tr>
            <th scope="row">
                <label><i class="fa-solid fa-check"></i>&nbsp;<?php _e('Hide Category', 'jobwp'); ?>?</label>
            </th>
            <td>
                <input type="checkbox" name="jobwp_hide_search_category" id="jobwp_hide_search_category" <?php echo $jobwp_hide_search_category ? 'checked' : ''; ?>>
                <label for="jobwp_hide_search_category"><?php _e('Enable', 'jobwp'); ?></label>
            </td>
            <th scope="row">
                <label><i class="fa-solid fa-check"></i>&nbsp;<?php _e('Placeholder Text', 'jobwp'); ?></label>
            </th>
            <td>
                <input type="text" name="jobwp_search_category_ph" id="jobwp_search_category_ph" class="medium-text" value="<?php esc_attr_e( $jobwp_search_category_ph ); ?>" />
            </td>
            <?php
            if ( job_fs()->is_plan__premium_only('pro', true) ) {
                ?>
                <th scope="row">
                    <label><i class="fa-solid fa-check"></i>&nbsp;<?php _e('Order', 'jobwp'); ?></label>
                </th>
                <td>
                    <input type="number" name="jobwp_search_category_order" class="medium-text" min="1" max="20" step="1" value="<?php esc_attr_e( $jobwp_search_category_order ); ?>">
                </td>
                <?php
            }
            ?>
        </tr>
        <tr>
            <th scope="row">
                <label><i class="fa-solid fa-check"></i>&nbsp;<?php _e('Hide Job Type', 'jobwp'); ?>?</label>
            </th>
            <td>
                <input type="checkbox" name="jobwp_hide_search_jobtype" id="jobwp_hide_search_jobtype" <?php echo $jobwp_hide_search_jobtype ? 'checked' : ''; ?>>
                <label for="jobwp_hide_search_jobtype"><?php _e('Enable', 'jobwp'); ?></label>
            </td>
            <th scope="row">
                <label><i class="fa-solid fa-check"></i>&nbsp;<?php _e('Placeholder Text', 'jobwp'); ?></label>
            </th>
            <td>
                <input type="text" name="jobwp_search_jobtype_ph" id="jobwp_search_jobtype_ph" class="medium-text" value="<?php esc_attr_e( $jobwp_search_jobtype_ph ); ?>" />
            </td>
            <?php
            if ( job_fs()->is_plan__premium_only('pro', true) ) {
                ?>
                <th scope="row">
                    <label><i class="fa-solid fa-check"></i>&nbsp;<?php _e('Order', 'jobwp'); ?></label>
                </th>
                <td>
                    <input type="number" name="jobwp_search_type_order" class="medium-text" min="1" max="20" step="1" value="<?php esc_attr_e( $jobwp_search_type_order ); ?>">
                </td>
                <?php
            }
            ?>
        </tr>
        <tr>
            <th scope="row">
                <label><i class="fa-solid fa-check"></i>&nbsp;<?php _e('Hide Job Location', 'jobwp'); ?>?</label>
            </th>
            <td>
                <input type="checkbox" name="jobwp_hide_search_location" id="jobwp_hide_search_location" <?php echo $jobwp_hide_search_location ? 'checked' : ''; ?>>
                <label for="jobwp_hide_search_location"><?php _e('Enable', 'jobwp'); ?></label>
            </td>
            <th scope="row">
                <label><i class="fa-solid fa-check"></i>&nbsp;<?php _e('Placeholder Text', 'jobwp'); ?></label>
            </th>
            <td>
                <input type="text" name="jobwp_search_location_ph" id="jobwp_search_location_ph" class="medium-text" value="<?php esc_attr_e( $jobwp_search_location_ph ); ?>" />
            </td>
            <?php
            if ( job_fs()->is_plan__premium_only('pro', true) ) {
                ?>
                <th scope="row">
                    <label><i class="fa-solid fa-check"></i>&nbsp;<?php _e('Order', 'jobwp'); ?></label>
                </th>
                <td>
                    <input type="number" name="jobwp_search_location_order" class="medium-text" min="1" max="20" step="1" value="<?php esc_attr_e( $jobwp_search_location_order ); ?>">
                </td>
                <?php
            }
            ?>
        </tr>
        <?php
        // Search Items Order
        $jobwp_upgrade_arr = [
            'label'     => 'Search Items Order',
            'icon'      => 'fa-solid fa-magnifying-glass-arrow-right',
            'message'   => "Control over search items order - place one item before another.",
            'colspan'   => 5
        ];

        $this->jobwp_upgrade_to_premium_section( $jobwp_upgrade_arr );

        // Job Level
        $jobwp_upgrade_arr = [
            'label'     => 'Job Level',
            'icon'      => 'fa-solid fa-sliders',
            'message'   => "Full control over job level control, placeholder text and placement order in the search panel.",
            'colspan'   => 5
        ];

        $this->jobwp_upgrade_to_premium_section( $jobwp_upgrade_arr );

        if ( job_fs()->is_plan__premium_only('pro', true) ) {
            ?>
            <tr>
                <th scope="row">
                    <label><i class="fa-solid fa-check"></i>&nbsp;<?php _e('Hide Job Level', 'jobwp'); ?>?</label>
                </th>
                <td>
                    <input type="checkbox" name="jobwp_hide_search_level" id="jobwp_hide_search_level" value="1" <?php checked( $jobwp_hide_search_level, 1 ); ?>>
                    <label for="jobwp_hide_search_level"><?php _e('Enable', 'jobwp'); ?></label>
                </td>
                <th scope="row">
                    <label><i class="fa-solid fa-check"></i>&nbsp;<?php _e('Placeholder Text', 'jobwp'); ?></label>
                </th>
                <td>
                    <input type="text" name="jobwp_search_level_ph" id="jobwp_search_level_ph" class="medium-text" value="<?php esc_attr_e( $jobwp_search_level_ph ); ?>"/>
                </td>
                <th scope="row">
                    <label><i class="fa-solid fa-check"></i>&nbsp;<?php _e('Order', 'jobwp'); ?></label>
                </th>
                <td>
                    <input type="number" name="jobwp_search_level_order" class="medium-text" min="1" max="20" step="1" value="<?php esc_attr_e( $jobwp_search_level_order ); ?>">
                </td>
            </tr>
            <?php
        }
        ?>
        <!-- Search Items -->
        <tr class="jobwp-settings-section">
            <td colspan="6" class="jobwp-settings-block-title"><i class="fa-solid fa-toggle-off"></i>&nbsp;<?php _e('Search Buttons', 'jobwp'); ?></td>
        </tr>
        <tr>
            <th scope="row">
                <label><?php _e('Search Button Text', 'jobwp'); ?></label>
            </th>
            <td colspan="5">
                <input type="text" name="jobwp_search_button_txt" id="jobwp_search_button_txt" class="normal-text" value="<?php esc_attr_e( $jobwp_search_button_txt ); ?>" />
            </td>
        </tr>
    </table>
    <hr>
    <p class="submit">
        <button id="updateSearchContent" name="updateSearchContent" class="button button-primary jobwp-button">
            <i class="fa fa-check-circle" aria-hidden="true"></i>&nbsp;<?php _e('Save Settings', 'jobwp'); ?>
        </button>
    </p>

</form>