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
    <table class="jobwp-listing-style-settings-table">
        <!-- Job Item -->
        <tr>
            <th scope="row" colspan="6" style="text-align: left;">
                <hr><span><?php _e('Job Item', 'jobwp'); ?></span><hr>
            </th>
        </tr>
        <tr>
            <th scope="row">
                <label><?php _e('Background Color', 'jobwp'); ?>:</label>
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
                    <input class="jobwp-wp-color" type="text" name="jobwp_listing_item_bg_color" id="jobwp_listing_item_bg_color" value="<?php esc_attr_e( $jobwp_listing_item_bg_color ); ?>">
                    <div id="colorpicker"></div>
					<?php
				}
				?>
            </td>
            <th scope="row">
                <label><?php _e('Border Color', 'jobwp'); ?>:</label>
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
                    <input class="jobwp-wp-color" type="text" name="jobwp_listing_item_border_color" id="jobwp_listing_item_border_color" value="<?php esc_attr_e( $jobwp_listing_item_border_color ); ?>">
                    <div id="colorpicker"></div>
					<?php
				}
				?>
            </td>
        </tr>
        <!-- Title -->
        <tr>
            <th scope="row" colspan="6" style="text-align: left;">
                <hr><span><?php _e('Job Title', 'jobwp'); ?></span><hr>
            </th>
        </tr>
        <tr>
            <th scope="row">
                <label><?php _e('Font Color', 'jobwp'); ?>:</label>
            </th>
            <td>
                <input class="jobwp-wp-color" type="text" name="jobwp_listing_title_font_color" id="jobwp_listing_title_font_color" value="<?php esc_attr_e( $jobwp_listing_title_font_color ); ?>">
                <div id="colorpicker"></div>
            </td>
            <th scope="row">
                <label><?php _e('Font Size', 'jobwp'); ?>:</label>
            </th>
            <td>
                <input type="number" class="small-text" min="11" max="50" name="jobwp_listing_title_font_size" id="jobwp_listing_title_font_size" value="<?php esc_attr_e( $jobwp_listing_title_font_size ); ?>">
                <code>px</code>
            </td>
            <th scope="row">
                <label><?php _e('Hover Font Color', 'jobwp'); ?>:</label>
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
                    <input class="jobwp-wp-color" type="text" name="jobwp_listing_title_font_color_hvr" id="jobwp_listing_title_font_color_hvr" value="<?php esc_attr_e( $jobwp_listing_title_font_color_hvr ); ?>">
                    <div id="colorpicker"></div>
					<?php
				}
				?>
            </td>
        </tr>
        <!-- Company -->
        <tr>
            <th scope="row" colspan="6" style="text-align: left;">
                <hr><span><?php _e('Company', 'jobwp'); ?></span><hr>
            </th>
        </tr>
        <tr>
            <th scope="row">
                <label><?php _e('Font Color', 'jobwp'); ?>:</label>
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
                    <input class="jobwp-wp-color" type="text" name="jobwp_list_com_font_color" id="jobwp_list_com_font_color" value="<?php esc_attr_e( $jobwp_list_com_font_color ); ?>">
                    <div id="colorpicker"></div>
					<?php
				}
				?>
            </td>
            <th scope="row">
                <label><?php _e('Font Size', 'jobwp'); ?>:</label>
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
                    <input type="number" class="small-text" min="11" max="50" name="jobwp_list_com_font_size" id="jobwp_list_com_font_size" value="<?php esc_attr_e( $jobwp_list_com_font_size ); ?>">
                    <code>px</code>
					<?php
				}
				?>
            </td>
        </tr>
        <!-- Overview -->
        <tr>
            <th scope="row" colspan="6" style="text-align: left;">
                <hr><span><?php _e('Job Overview', 'jobwp'); ?></span><hr>
            </th>
        </tr>
        <tr>
            <th scope="row">
                <label><?php _e('Font Color', 'jobwp'); ?>:</label>
            </th>
            <td>
                <input class="jobwp-wp-color" type="text" name="jobwp_listing_overview_font_color" id="jobwp_listing_overview_font_color" value="<?php esc_attr_e( $jobwp_listing_overview_font_color ); ?>">
                <div id="colorpicker"></div>
            </td>
            <th scope="row">
                <label><?php _e('Font Size', 'jobwp'); ?>:</label>
            </th>
            <td>
                <input type="number" class="small-text" min="11" max="50" name="jobwp_listing_overview_font_size" id="jobwp_listing_overview_font_size" value="<?php esc_attr_e( $jobwp_listing_overview_font_size ); ?>">
                <code>px</code>
            </td>
        </tr>
        <!-- Job Info -->
        <tr>
            <th scope="row" colspan="6" style="text-align: left;">
                <hr><span><?php _e('Job Information Label', 'jobwp'); ?></span><hr>
            </th>
        </tr>
        <tr>
            <th scope="row">
                <label><?php _e('Font Color', 'jobwp'); ?>:</label>
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
                    <input class="jobwp-wp-color" type="text" name="jobwp_listing_info_font_color" id="jobwp_listing_info_font_color" value="<?php esc_attr_e( $jobwp_listing_info_font_color ); ?>">
                    <div id="colorpicker"></div>
					<?php
				}
				?>
            </td>
            <th scope="row">
                <label><?php _e('Font Size', 'jobwp'); ?>:</label>
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
                    <input type="number" class="small-text" min="11" max="30" step="1" name="jobwp_listing_info_font_size" id="jobwp_listing_info_font_size" value="<?php esc_attr_e( $jobwp_listing_info_font_size ); ?>">
                    <code>px</code>
					<?php
				}
				?>
            </td>
        </tr>
        <!-- Read More Button -->
        <tr>
            <th scope="row" colspan="6" style="text-align: left;">
                <hr><span><?php _e('Read More Button', 'jobwp'); ?></span><hr>
            </th>
        </tr>
        <tr>
            <th scope="row">
                <label><?php _e('Background Color', 'jobwp'); ?>:</label>
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
                    <input class="jobwp-wp-color" type="text" name="jobwp_read_more_bg_color" id="jobwp_read_more_bg_color" value="<?php esc_attr_e( $jobwp_read_more_bg_color ); ?>" />
                    <div id="colorpicker"></div>
					<?php
				}
				?>
            </td>
            <th scope="row">
                <label><?php _e('Font Color', 'jobwp'); ?>:</label>
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
                    <input class="jobwp-wp-color" type="text" name="jobwp_read_more_font_color" id="jobwp_read_more_font_color" value="<?php esc_attr_e( $jobwp_read_more_font_color ); ?>">
                    <div id="colorpicker"></div>
					<?php
				}
				?>
            </td>
            <th scope="row">
                <label><?php _e('Font Size', 'jobwp'); ?>:</label>
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
                    <input type="number" class="small-text" min="11" max="30" step="1" name="jobwp_read_more_font_size" id="jobwp_read_more_font_size" value="<?php esc_attr_e( $jobwp_read_more_font_size ); ?>">
                    <code>px</code>
					<?php
				}
				?>
            </td>
        </tr>
        <tr>
            <th scope="row">
                <label><?php _e('Border Color', 'jobwp'); ?>:</label>
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
                    <input class="jobwp-wp-color" type="text" name="jobwp_read_more_border_color" id="jobwp_read_more_border_color" value="<?php esc_attr_e( $jobwp_read_more_border_color ); ?>" />
                    <div id="colorpicker"></div>
					<?php
				}
				?>
            </td>
            <th scope="row">
                <label><?php _e('Border Width', 'jobwp'); ?>:</label>
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
                    <input type="number" class="small-text" min="0" max="10" step="1" name="jobwp_read_more_border_width" id="jobwp_read_more_border_width" value="<?php esc_attr_e( $jobwp_read_more_border_width ); ?>">
                    <code>px</code>
					<?php
				}
				?>
            </td>
            <th scope="row">
                <label><?php _e('Border Radius', 'jobwp'); ?>:</label>
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
                    <input type="number" class="small-text" min="0" max="50" step="1" name="jobwp_read_more_border_radius" id="jobwp_read_more_border_radius" value="<?php esc_attr_e( $jobwp_read_more_border_radius ); ?>">
                    <code>px</code>
					<?php
				}
				?>
            </td>
        </tr>
        <tr>
            <th scope="row">
                <label><?php _e('Padding', 'jobwp'); ?>:</label>
            </th>
            <td colspan="5">
            <?php
				if ( ! job_fs()->is_plan__premium_only('pro', true) ) {
					?>
					<span><?php echo '<a href="' . job_fs()->get_upgrade_url() . '">' . __('Please Upgrade Now', 'jobwp') . '</a>'; ?></span>
					<?php
				}

				if ( job_fs()->is_plan__premium_only('pro', true) ) {
					?>
                    <?php _e('Top/Bottom', 'jobwp'); ?>
                    <input type="number" class="small-text" min="0" max="100" step="1" name="jobwp_read_more_padding_tb" id="jobwp_read_more_padding_tb" value="<?php esc_attr_e( $jobwp_read_more_padding_tb ); ?>">
                    <code>px</code>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <?php _e('Left/Right', 'jobwp'); ?>
                    <input type="number" class="small-text" min="0" max="100" step="1" name="jobwp_read_more_padding_lr" id="jobwp_read_more_padding_lr" value="<?php esc_attr_e( $jobwp_read_more_padding_lr ); ?>">
                    <code>px</code>
					<?php
				}
				?>
            </td>
        </tr>
        <!-- Read More Button : Hover -->
        <tr>
            <th scope="row" colspan="6" style="text-align: left;">
                <hr><span><?php _e('Read More Button : Hover', 'jobwp'); ?></span><hr>
            </th>
        </tr>
        <tr>
            <th scope="row">
                <label><?php _e('Background Color', 'jobwp'); ?>:</label>
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
                    <input class="jobwp-wp-color" type="text" name="jobwp_read_more_bg_color_hvr" id="jobwp_read_more_bg_color_hvr" value="<?php esc_attr_e( $jobwp_read_more_bg_color_hvr ); ?>" />
                    <div id="colorpicker"></div>
					<?php
				}
				?>
            </td>
            <th scope="row">
                <label><?php _e('Font Color', 'jobwp'); ?>:</label>
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
                    <input class="jobwp-wp-color" type="text" name="jobwp_read_more_font_color_hvr" id="jobwp_read_more_font_color_hvr" value="<?php esc_attr_e( $jobwp_read_more_font_color_hvr ); ?>">
                    <div id="colorpicker"></div>
					<?php
				}
				?>
            </td>
            <th scope="row">
                <label><?php _e('Border Color', 'jobwp'); ?>:</label>
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
                    <input class="jobwp-wp-color" type="text" name="jobwp_read_more_border_color_hvr" id="jobwp_read_more_border_color_hvr" value="<?php esc_attr_e( $jobwp_read_more_border_color_hvr ); ?>" />
                    <div id="colorpicker"></div>
					<?php
				}
				?>
            </td>
        </tr>
        <!-- Pagination -->
        <tr>
            <th scope="row" colspan="6" style="text-align: left;">
                <hr><span><?php _e('Pagination', 'jobwp'); ?></span><hr>
            </th>
        </tr>
        <tr>
            <th scope="row">
                <label><?php _e('Background  Color', 'jobwp'); ?>:</label>
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
                    <input class="jobwp-wp-color" type="text" name="jobwp_pagination_bg_color" id="jobwp_pagination_bg_color" value="<?php esc_attr_e( $jobwp_pagination_bg_color ); ?>">
                    <div id="colorpicker"></div>
					<?php
				}
				?>
            </td>
            <th scope="row">
                <label><?php _e('Border Color', 'jobwp'); ?>:</label>
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
                    <input class="jobwp-wp-color" type="text" name="jobwp_pagination_border_color" id="jobwp_pagination_border_color" value="<?php esc_attr_e( $jobwp_pagination_border_color ); ?>">
                    <div id="colorpicker"></div>
					<?php
				}
				?>
            </td>
            <th scope="row">
                <label><?php _e('Font Color', 'jobwp'); ?>:</label>
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
                    <input class="jobwp-wp-color" type="text" name="jobwp_pagination_font_color" id="jobwp_pagination_font_color" value="<?php esc_attr_e( $jobwp_pagination_font_color ); ?>">
                    <div id="colorpicker"></div>
					<?php
				}
				?>
            </td>
        </tr>
        <tr>
            <th scope="row">
                <label><?php _e('Font Size', 'jobwp'); ?>:</label>
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
                    <input type="number" class="small-text" min="11" max="40" step="1" name="jobwp_pagination_font_size" id="jobwp_pagination_font_size" value="<?php esc_attr_e( $jobwp_pagination_font_size ); ?>">
                    <code>px</code>
					<?php
				}
				?>
            </td>
            <th scope="row">
                <label><?php _e('Border Radius', 'jobwp'); ?>:</label>
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
                    <input type="number" class="small-text" min="0" max="50" step="1" name="jobwp_pagination_border_radius" id="jobwp_pagination_border_radius" value="<?php esc_attr_e( $jobwp_pagination_border_radius ); ?>">
                    <code>px</code>
					<?php
				}
				?>
            </td>
        </tr>
        <tr>
            <th scope="row">
                <label><?php _e('Hover Background Color', 'jobwp'); ?>:</label>
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
                    <input class="jobwp-wp-color" type="text" name="jobwp_hover_bg_color" id="jobwp_hover_bg_color" value="<?php esc_attr_e( $jobwp_hover_bg_color ); ?>">
                    <div id="colorpicker"></div>
					<?php
				}
				?>
            </td>
            <th scope="row">
                <label><?php _e('Hover Font Color', 'jobwp'); ?>:</label>
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
                    <input class="jobwp-wp-color" type="text" name="jobwp_hover_font_color" id="jobwp_hover_font_color" value="<?php esc_attr_e( $jobwp_hover_font_color ); ?>">
                    <div id="colorpicker"></div>
					<?php
				}
				?>
            </td>
        </tr>
    </table>
    <hr>
    <p class="submit"><button id="updateListingStyles" name="updateListingStyles" class="button button-primary jobwp-button"><?php _e('Save Settings', 'jobwp'); ?></button></p>
</form>