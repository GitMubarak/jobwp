<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

//$jobwpListingStyles = [];
foreach ( $jobwpListingStyles as $option_name => $option_value ) {
    if ( isset( $jobwpListingStyles[$option_name] ) ) {
        ${"" . $option_name} = $option_value;
    }
}
?>
<form name="jobwp_listing_style_form" role="form" class="form-horizontal" method="post" action="" id="jobwp-listing-style-form">
<?php wp_nonce_field( 'jobwp_listing_styles_action', 'jobwp_listing_styles_nonce' ); ?>
    <table class="hm-settings-table jobwp-listing-style-settings-table" cellpadding="0" cellspacing="0">
        <!-- Job Card Items -->
        <tr class="jobwp-settings-section">
            <td colspan="6" class="jobwp-settings-block-title"><i class="fa-regular fa-rectangle-list"></i>&nbsp;<?php _e('Job Card Items', 'jobwp'); ?></td>
        </tr>
        <?php
        echo '<tr><td colspan="6" style="padding:0;"></td></tr>';
        $jobwp_upgrade_arr = [
            'label'     => 'Background Color & Border Color',
            'icon'      => 'fa-solid fa-palette',
            'message'   => "Available in Professional",
        ];

        $this->jobwp_upgrade_to_premium_section( $jobwp_upgrade_arr );

        if ( job_fs()->is_plan__premium_only('pro', true) ) {
            ?>
            <tr>
                <th scope="row">
                    <label><i class="fa-solid fa-check"></i>&nbsp;<?php _e('Background Color', 'jobwp'); ?>:</label>
                </th>
                <td>
                    <input class="jobwp-wp-color" type="text" name="jobwp_listing_item_bg_color" id="jobwp_listing_item_bg_color" value="<?php esc_attr_e( $jobwp_listing_item_bg_color ); ?>">
                    <div id="colorpicker"></div>
                </td>
                <th scope="row">
                    <label><i class="fa-solid fa-check"></i>&nbsp;<?php _e('Border Color', 'jobwp'); ?>:</label>
                </th>
                <td colspan="3">
                    <input class="jobwp-wp-color" type="text" name="jobwp_listing_item_border_color" id="jobwp_listing_item_border_color" value="<?php esc_attr_e( $jobwp_listing_item_border_color ); ?>">
                    <div id="colorpicker"></div>
                </td>
            </tr>
            <?php
        }
        ?>
        <!-- Job Title -->
        <tr class="jobwp-settings-section">
            <td colspan="6" class="jobwp-settings-block-title"><i class="fa-solid fa-list"></i>&nbsp;<?php _e('Job Title', 'jobwp'); ?></td>
        </tr>
        <tr>
            <th scope="row">
                <label><i class="fa-solid fa-check"></i>&nbsp;<?php _e('Font Color', 'jobwp'); ?>:</label>
            </th>
            <td>
                <input class="jobwp-wp-color" type="text" name="jobwp_listing_title_font_color" id="jobwp_listing_title_font_color" value="<?php esc_attr_e( $jobwp_listing_title_font_color ); ?>">
                <div id="colorpicker"></div>
            </td>
            <th scope="row">
                <label><i class="fa-solid fa-check"></i>&nbsp;<?php _e('Font Size', 'jobwp'); ?>:</label>
            </th>
            <td>
                <input type="number" class="small-text" min="11" max="50" name="jobwp_listing_title_font_size" id="jobwp_listing_title_font_size" value="<?php esc_attr_e( $jobwp_listing_title_font_size ); ?>">
                <code>px</code>
            </td>
            <th scope="row">
                <label><i class="fa-solid fa-check"></i>&nbsp;<?php _e('Hover Font Color', 'jobwp'); ?>:</label>
            </th>
            <td colspan="5">
                <input class="jobwp-wp-color" type="text" name="jobwp_listing_title_font_color_hvr" id="jobwp_listing_title_font_color_hvr" value="<?php esc_attr_e( $jobwp_listing_title_font_color_hvr ); ?>">
                <div id="colorpicker"></div>
            </td>
        </tr>
        <!-- Company -->
        <tr class="jobwp-settings-section">
            <td colspan="6" class="jobwp-settings-block-title"><i class="fa-solid fa-clipboard-list"></i>&nbsp;<?php _e('Company', 'jobwp'); ?></td>
        </tr>
        <?php
        echo '<tr><td colspan="6" style="padding:0;"></td></tr>';
        $jobwp_upgrade_arr = [
            'label' => 'Font Color & Font Size',
            'icon' => 'fa-solid fa-palette',
            'message' => "Available in Professional",
        ];

        $this->jobwp_upgrade_to_premium_section( $jobwp_upgrade_arr );

        if ( job_fs()->is_plan__premium_only('pro', true) ) {
            ?>
            <tr>
                <th scope="row">
                    <label><i class="fa-solid fa-check"></i>&nbsp;<?php _e('Font Color', 'jobwp'); ?>:</label>
                </th>
                <td>
                    <input class="jobwp-wp-color" type="text" name="jobwp_list_com_font_color" id="jobwp_list_com_font_color" value="<?php esc_attr_e( $jobwp_list_com_font_color ); ?>">
                    <div id="colorpicker"></div>
                </td>
                <th scope="row">
                    <label><i class="fa-solid fa-check"></i>&nbsp;<?php _e('Font Size', 'jobwp'); ?>:</label>
                </th>
                <td colspan="3">
                    <input type="number" class="small-text" min="11" max="50" name="jobwp_list_com_font_size" id="jobwp_list_com_font_size" value="<?php esc_attr_e( $jobwp_list_com_font_size ); ?>">
                    <code>px</code>
                </td>
            </tr>
            <?php
        }
        ?>
        <!-- Overview -->
        <tr class="jobwp-settings-section">
            <td colspan="6" class="jobwp-settings-block-title"><i class="fa-regular fa-rectangle-list"></i>&nbsp;<?php _e('Job Overview', 'jobwp'); ?></td>
        </tr>
        <tr>
            <th scope="row">
                <label><i class="fa-solid fa-check"></i>&nbsp;<?php _e('Font Color', 'jobwp'); ?>:</label>
            </th>
            <td>
                <input class="jobwp-wp-color" type="text" name="jobwp_listing_overview_font_color" id="jobwp_listing_overview_font_color" value="<?php esc_attr_e( $jobwp_listing_overview_font_color ); ?>">
                <div id="colorpicker"></div>
            </td>
            <th scope="row">
                <label><i class="fa-solid fa-check"></i>&nbsp;<?php _e('Font Size', 'jobwp'); ?>:</label>
            </th>
            <td colspan="3">
                <input type="number" class="small-text" min="11" max="50" name="jobwp_listing_overview_font_size" id="jobwp_listing_overview_font_size" value="<?php esc_attr_e( $jobwp_listing_overview_font_size ); ?>">
                <code>px</code>
            </td>
        </tr>
        <!-- Job Info -->
        <tr class="jobwp-settings-section">
            <td colspan="6" class="jobwp-settings-block-title"><i class="fa-solid fa-toggle-off"></i>&nbsp;<?php _e('Job Information Label', 'jobwp'); ?></td>
        </tr>
        <?php
        echo '<tr><td colspan="6" style="padding:0;"></td></tr>';
        $jobwp_upgrade_arr = [
            'label' => 'Font Color & Font Size',
            'icon' => 'fa-solid fa-palette',
            'message' => "Available in Professional",
        ];

        $this->jobwp_upgrade_to_premium_section( $jobwp_upgrade_arr );

        if ( job_fs()->is_plan__premium_only('pro', true) ) {
            ?>
            <tr>
                <th scope="row">
                    <label><i class="fa-solid fa-check"></i>&nbsp;<?php _e('Font Color', 'jobwp'); ?>:</label>
                </th>
                <td>
                    <input class="jobwp-wp-color" type="text" name="jobwp_listing_info_font_color" id="jobwp_listing_info_font_color" value="<?php esc_attr_e( $jobwp_listing_info_font_color ); ?>">
                    <div id="colorpicker"></div>
                </td>
                <th scope="row">
                    <label><i class="fa-solid fa-check"></i>&nbsp;<?php _e('Font Size', 'jobwp'); ?>:</label>
                </th>
                <td colspan="3">
                    <input type="number" class="small-text" min="11" max="30" step="1" name="jobwp_listing_info_font_size" id="jobwp_listing_info_font_size" value="<?php esc_attr_e( $jobwp_listing_info_font_size ); ?>">
                    <code>px</code>
                </td>
            </tr>
            <?php
        }
        ?>
        <!-- Read More Button -->
        <tr class="jobwp-settings-section">
            <td colspan="6" class="jobwp-settings-block-title"><i class="fa-solid fa-angles-right"></i>&nbsp;<?php _e('Read More Button', 'jobwp'); ?></td>
        </tr>
        <?php
        echo '<tr><td colspan="6" style="padding:0;"></td></tr>';
        $jobwp_upgrade_arr = [
            'label' => 'Full control over button colors, fonts, borders, hover states, and padding',
            'icon' => 'fa-solid fa-palette',
            'message' => "Available in Professional",
        ];

        $this->jobwp_upgrade_to_premium_section( $jobwp_upgrade_arr );

        if ( job_fs()->is_plan__premium_only('pro', true) ) {
            ?>
            <tr>
                <th scope="row">
                    <label><i class="fa-solid fa-check"></i>&nbsp;<?php _e('Button Color', 'jobwp'); ?>:</label>
                </th>
                <td>
                    <input class="jobwp-wp-color" type="text" name="jobwp_read_more_bg_color" id="jobwp_read_more_bg_color" value="<?php esc_attr_e( $jobwp_read_more_bg_color ); ?>" />
                    <div id="colorpicker"></div>
                </td>
                <th scope="row">
                    <label><i class="fa-solid fa-check"></i>&nbsp;<?php _e('Font Color', 'jobwp'); ?>:</label>
                </th>
                <td>
                    <input class="jobwp-wp-color" type="text" name="jobwp_read_more_font_color" id="jobwp_read_more_font_color" value="<?php esc_attr_e( $jobwp_read_more_font_color ); ?>">
                    <div id="colorpicker"></div>
                </td>
                <th scope="row">
                    <label><i class="fa-solid fa-check"></i>&nbsp;<?php _e('Font Size', 'jobwp'); ?>:</label>
                </th>
                <td>
                    <input type="number" class="small-text" min="11" max="30" step="1" name="jobwp_read_more_font_size" id="jobwp_read_more_font_size" value="<?php esc_attr_e( $jobwp_read_more_font_size ); ?>">
                    <code>px</code>
                </td>
            </tr>
            <tr>
                <th scope="row">
                    <label><i class="fa-solid fa-check"></i>&nbsp;<?php _e('Border Color', 'jobwp'); ?>:</label>
                </th>
                <td>
                    <input class="jobwp-wp-color" type="text" name="jobwp_read_more_border_color" id="jobwp_read_more_border_color" value="<?php esc_attr_e( $jobwp_read_more_border_color ); ?>" />
                    <div id="colorpicker"></div>
                </td>
                <th scope="row">
                    <label><i class="fa-solid fa-check"></i>&nbsp;<?php _e('Border Width', 'jobwp'); ?>:</label>
                </th>
                <td>
                    <input type="number" class="small-text" min="0" max="10" step="1" name="jobwp_read_more_border_width" id="jobwp_read_more_border_width" value="<?php esc_attr_e( $jobwp_read_more_border_width ); ?>">
                    <code>px</code>
                </td>
                <th scope="row">
                    <label><i class="fa-solid fa-check"></i>&nbsp;<?php _e('Border Radius', 'jobwp'); ?>:</label>
                </th>
                <td>
                    <input type="number" class="small-text" min="0" max="50" step="1" name="jobwp_read_more_border_radius" id="jobwp_read_more_border_radius" value="<?php esc_attr_e( $jobwp_read_more_border_radius ); ?>">
                    <code>px</code>
                </td>
            </tr>
            <tr>
                <th scope="row">
                    <label><i class="fa-solid fa-check"></i>&nbsp;<?php _e('Padding', 'jobwp'); ?>:</label>
                </th>
                <td colspan="5">
                    <?php _e('Top-Bottom', 'jobwp'); ?>
                    <input type="number" class="small-text" min="0" max="100" step="1" name="jobwp_read_more_padding_tb" id="jobwp_read_more_padding_tb" value="<?php esc_attr_e( $jobwp_read_more_padding_tb ); ?>">
                    <code>px</code>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <?php _e('Left-Right', 'jobwp'); ?>
                    <input type="number" class="small-text" min="0" max="100" step="1" name="jobwp_read_more_padding_lr" id="jobwp_read_more_padding_lr" value="<?php esc_attr_e( $jobwp_read_more_padding_lr ); ?>">
                    <code>px</code>
                </td>
            </tr>
            <tr>
                <th scope="row">
                    <label><i class="fa-solid fa-check"></i>&nbsp;<?php _e('Hover Background Color', 'jobwp'); ?>:</label>
                </th>
                <td>
                    <input class="jobwp-wp-color" type="text" name="jobwp_read_more_bg_color_hvr" id="jobwp_read_more_bg_color_hvr" value="<?php esc_attr_e( $jobwp_read_more_bg_color_hvr ); ?>" />
                    <div id="colorpicker"></div>
                </td>
                <th scope="row">
                    <label><i class="fa-solid fa-check"></i>&nbsp;<?php _e('Hover Font Color', 'jobwp'); ?>:</label>
                </th>
                <td>
                    <input class="jobwp-wp-color" type="text" name="jobwp_read_more_font_color_hvr" id="jobwp_read_more_font_color_hvr" value="<?php esc_attr_e( $jobwp_read_more_font_color_hvr ); ?>">
                    <div id="colorpicker"></div>
                </td>
                <th scope="row">
                    <label><i class="fa-solid fa-check"></i>&nbsp;<?php _e('Hover Border Color', 'jobwp'); ?>:</label>
                </th>
                <td>
                    <input class="jobwp-wp-color" type="text" name="jobwp_read_more_border_color_hvr" id="jobwp_read_more_border_color_hvr" value="<?php esc_attr_e( $jobwp_read_more_border_color_hvr ); ?>" />
                    <div id="colorpicker"></div>
                </td>
            </tr>
            <?php
        }
        ?>
        <!-- Pagination -->
        <tr class="jobwp-settings-section">
            <td colspan="6" class="jobwp-settings-block-title"><i class="fa-solid fa-ellipsis"></i>&nbsp;<?php _e('Pagination', 'jobwp'); ?></td>
        </tr>
        <?php
        echo '<tr><td colspan="6" style="padding:0;"></td></tr>';
        $jobwp_upgrade_arr = [
            'label' => 'Full control over pagination colors, fonts, borders, hover states etc.',
            'icon' => 'fa-solid fa-palette',
            'message' => "Available in Professional",
        ];

        $this->jobwp_upgrade_to_premium_section( $jobwp_upgrade_arr );

        if ( job_fs()->is_plan__premium_only('pro', true) ) {
            ?>
            <tr>
                <th scope="row">
                    <label><i class="fa-solid fa-check"></i>&nbsp;<?php _e('Background  Color', 'jobwp'); ?>:</label>
                </th>
                <td>
                    <input class="jobwp-wp-color" type="text" name="jobwp_pagination_bg_color" id="jobwp_pagination_bg_color" value="<?php esc_attr_e( $jobwp_pagination_bg_color ); ?>">
                    <div id="colorpicker"></div>
                </td>
                <th scope="row">
                    <label><i class="fa-solid fa-check"></i>&nbsp;<?php _e('Border Color', 'jobwp'); ?>:</label>
                </th>
                <td>
                    <input class="jobwp-wp-color" type="text" name="jobwp_pagination_border_color" id="jobwp_pagination_border_color" value="<?php esc_attr_e( $jobwp_pagination_border_color ); ?>">
                    <div id="colorpicker"></div>
                </td>
                <th scope="row">
                    <label><i class="fa-solid fa-check"></i>&nbsp;<?php _e('Font Color', 'jobwp'); ?>:</label>
                </th>
                <td>
                    <input class="jobwp-wp-color" type="text" name="jobwp_pagination_font_color" id="jobwp_pagination_font_color" value="<?php esc_attr_e( $jobwp_pagination_font_color ); ?>">
                    <div id="colorpicker"></div>
                </td>
            </tr>
            <tr>
                <th scope="row">
                    <label><i class="fa-solid fa-check"></i>&nbsp;<?php _e('Font Size', 'jobwp'); ?>:</label>
                </th>
                <td>
                    <input type="number" class="small-text" min="11" max="40" step="1" name="jobwp_pagination_font_size" id="jobwp_pagination_font_size" value="<?php esc_attr_e( $jobwp_pagination_font_size ); ?>">
                    <code>px</code>
                </td>
                <th scope="row">
                    <label><i class="fa-solid fa-check"></i>&nbsp;<?php _e('Border Radius', 'jobwp'); ?>:</label>
                </th>
                <td colspan="3">
                    <input type="number" class="small-text" min="0" max="50" step="1" name="jobwp_pagination_border_radius" id="jobwp_pagination_border_radius" value="<?php esc_attr_e( $jobwp_pagination_border_radius ); ?>">
                    <code>px</code>
                </td>
            </tr>
            <tr>
                <th scope="row">
                    <label><i class="fa-solid fa-check"></i>&nbsp;<?php _e('Hover Background Color', 'jobwp'); ?>:</label>
                </th>
                <td>
                    <input class="jobwp-wp-color" type="text" name="jobwp_hover_bg_color" id="jobwp_hover_bg_color" value="<?php esc_attr_e( $jobwp_hover_bg_color ); ?>">
                    <div id="colorpicker"></div>
                </td>
                <th scope="row">
                    <label><i class="fa-solid fa-check"></i>&nbsp;<?php _e('Hover Font Color', 'jobwp'); ?>:</label>
                </th>
                <td colspan="3">
                    <input class="jobwp-wp-color" type="text" name="jobwp_hover_font_color" id="jobwp_hover_font_color" value="<?php esc_attr_e( $jobwp_hover_font_color ); ?>">
                    <div id="colorpicker"></div>
                </td>
            </tr>
            <?php
        }
        ?>
    </table>
    <hr>
    <p class="submit"><button id="updateListingStyles" name="updateListingStyles" class="button button-primary jobwp-button"><?php _e('Save Settings', 'jobwp'); ?></button></p>
</form>