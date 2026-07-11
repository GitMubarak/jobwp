<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

//$jobwpSearchStyles = [];
foreach ( $jobwpSearchStyles as $option_name => $option_value ) {
    if ( isset( $jobwpSearchStyles[$option_name] ) ) {
        ${"" . $option_name} = $option_value;
    }
}
?>
<form name="jobwp_search_style_form" role="form" class="form-horizontal" method="post" action="" id="jobwp-search-style-form">
<?php wp_nonce_field( 'jobwp_search_style_action', 'jobwp_search_style_nonce' ); ?>
    <table class="hm-settings-table jobwp-settings-table" cellpadding="0" cellspacing="0">
        <!-- Search Container -->
        <tr class="jobwp-settings-section">
            <td colspan="6" class="jobwp-settings-block-title"><i class="fa-regular fa-square"></i>&nbsp;<?php _e('Search Container', 'jobwp'); ?></td>
        </tr>
        <tr>
            <th scope="row">
                <label><?php _e('Background Color', 'jobwp'); ?>:</label>
            </th>
            <td>
                <input class="jobwp-wp-color" type="text" name="jobwp_search_container_bg_color" id="jobwp_search_container_bg_color" value="<?php esc_attr_e( $jobwp_search_container_bg_color ); ?>">
                <div id="colorpicker"></div>
            </td>
            <th scope="row">
                <label><?php _e('Border Color', 'jobwp'); ?>:</label>
            </th>
            <td colspan="3">
                <input class="jobwp-wp-color" type="text" name="jobwp_search_container_border_color" id="jobwp_search_container_border_color" value="<?php esc_attr_e( $jobwp_search_container_border_color ); ?>">
                <div id="colorpicker"></div>
            </td>
        </tr>
        <!-- Search Items / Fields -->
        <tr class="jobwp-settings-section">
            <td colspan="6" class="jobwp-settings-block-title"><i class="fa-solid fa-magnifying-glass-chart"></i>&nbsp;<?php _e('Search Items / Fields', 'jobwp'); ?></td>
        </tr>
        <tr>
            <th scope="row">
                <label><?php _e('Background Color', 'jobwp'); ?>:</label>
            </th>
            <td>
                <input class="jobwp-wp-color" type="text" name="jobwp_search_item_bg_color" id="jobwp_search_item_bg_color" value="<?php esc_attr_e( $jobwp_search_item_bg_color ); ?>">
                <div id="colorpicker"></div>
            </td>
            <th scope="row">
                <label><?php _e('Border Color', 'jobwp'); ?>:</label>
            </th>
            <td>
                <input class="jobwp-wp-color" type="text" name="jobwp_search_item_border_color" id="jobwp_search_item_border_color" value="<?php esc_attr_e( $jobwp_search_item_border_color ); ?>">
                <div id="colorpicker"></div>
            </td>
            <th scope="row">
                <label><?php _e('Font Size', 'jobwp'); ?>:</label>
            </th>
            <td>
                <input type="number" class="small-text" min="11" max="50" name="jobwp_search_item_font_size" id="jobwp_search_item_font_size" value="<?php esc_attr_e( $jobwp_search_item_font_size ); ?>">
                <code>px</code>
            </td>
        </tr>
        <?php
        echo '<tr><td colspan="6" style="padding:0;"></td></tr>';
        $jobwp_upgrade_arr = [
            'label'     => 'Border Radius & Font Color',
            'icon'      => 'fa-solid fa-palette',
            'message'   => "Available in Professional",
            'colspan'   => 2
        ];

        $this->jobwp_upgrade_to_premium_section( $jobwp_upgrade_arr );

        if ( job_fs()->is_plan__premium_only('pro', true) ) {
            ?>
            <tr>
                <th scope="row">
                    <label><?php _e('Border Radius', 'jobwp'); ?>:</label>
                </th>
                <td>
                    <input type="number" class="small-text" min="0" max="50" name="jobwp_search_item_border_radius" id="jobwp_search_item_border_radius" value="<?php esc_attr_e( $jobwp_search_item_border_radius ); ?>">
                    <code>px</code>
                </td>
                <th scope="row">
                    <label><?php _e('Font Color', 'jobwp'); ?>:</label>
                </th>
                <td>
                    <input class="jobwp-wp-color" type="text" name="jobwp_search_item_font_color" id="jobwp_search_item_font_color" value="<?php esc_attr_e( $jobwp_search_item_font_color ); ?>">
                    <div id="colorpicker"></div>
                </td>
            </tr>
            <?php
        }
        ?>
        <!-- Search Button -->
        <tr class="jobwp-settings-section">
            <td colspan="6" class="jobwp-settings-block-title"><i class="fa-solid fa-toggle-off"></i>&nbsp;<?php _e('Search Button', 'jobwp'); ?></td>
        </tr>
        <tr>
            <th scope="row">
                <label><?php _e('Background Color', 'jobwp'); ?>:</label>
            </th>
            <td>
                <input class="jobwp-wp-color" type="text" name="jobwp_search_btn_bg_color" id="jobwp_search_btn_bg_color" value="<?php esc_attr_e( $jobwp_search_btn_bg_color ); ?>">
                <div id="colorpicker"></div>
            </td>
            <th scope="row">
                <label><?php _e('Font Color', 'jobwp'); ?>:</label>
            </th>
            <td>
                <input class="jobwp-wp-color" type="text" name="jobwp_search_btn_font_color" id="jobwp_search_btn_font_color" value="<?php esc_attr_e( $jobwp_search_btn_font_color ); ?>">
                <div id="colorpicker"></div>
            </td>
            <th scope="row">
                <label><?php _e('Font Size', 'jobwp'); ?>:</label>
            </th>
            <td>
                <input type="number" class="small-text" min="11" max="50" name="jobwp_search_btn_font_size" id="jobwp_search_btn_font_size" value="<?php esc_attr_e( $jobwp_search_btn_font_size ); ?>">
                <code>px</code>
            </td>
        </tr>
        <tr>
            <th scope="row">
                <label><?php _e('Border Color', 'jobwp'); ?>:</label>
            </th>
            <td>
                <input class="jobwp-wp-color" type="text" name="jobwp_search_btn_border_color" id="jobwp_search_btn_border_color" value="<?php esc_attr_e( $jobwp_search_btn_border_color ); ?>">
                <div id="colorpicker"></div>
            </td>
            <th scope="row">
                <label><?php _e('Hover Background Color', 'jobwp'); ?>:</label>
            </th>
            <td>
                <input class="jobwp-wp-color" type="text" name="jobwp_search_btn_bg_color_hvr" id="jobwp_search_btn_bg_color_hvr" value="<?php esc_attr_e( $jobwp_search_btn_bg_color_hvr ); ?>">
                <div id="colorpicker"></div>
            </td>
            <th scope="row">
                <label><?php _e('Hover Font Color', 'jobwp'); ?>:</label>
            </th>
            <td>
                <input class="jobwp-wp-color" type="text" name="jobwp_search_btn_font_color_hvr" id="jobwp_search_btn_font_color_hvr" value="<?php esc_attr_e( $jobwp_search_btn_font_color_hvr ); ?>">
                <div id="colorpicker"></div>
            </td>
        </tr>
        <tr>
            <th scope="row">
                <label><?php _e('Hover Border Color', 'jobwp'); ?>:</label>
            </th>
            <td colspan="5">
                <input class="jobwp-wp-color" type="text" name="jobwp_search_btn_border_color_hvr" id="jobwp_search_btn_border_color_hvr" value="<?php esc_attr_e( $jobwp_search_btn_border_color_hvr ); ?>">
                <div id="colorpicker"></div>
            </td>
        </tr>
        <!-- Reset Button -->
        <tr class="jobwp-settings-section">
            <td colspan="6" class="jobwp-settings-block-title"><i class="fa-solid fa-filter-circle-xmark"></i>&nbsp;<?php _e('Reset Button', 'jobwp'); ?></td>
        </tr>
        <tr>
            <th scope="row">
                <label><?php _e('Background Color', 'jobwp'); ?>:</label>
            </th>
            <td>
                <input class="jobwp-wp-color" type="text" name="jobwp_reset_btn_bg_color" id="jobwp_reset_btn_bg_color" value="<?php esc_attr_e( $jobwp_reset_btn_bg_color ); ?>">
                <div id="colorpicker"></div>
            </td>
            <th scope="row">
                <label><?php _e('Font Color', 'jobwp'); ?>:</label>
            </th>
            <td>
                <input class="jobwp-wp-color" type="text" name="jobwp_reset_btn_font_color" id="jobwp_reset_btn_font_color" value="<?php esc_attr_e( $jobwp_reset_btn_font_color ); ?>">
                <div id="colorpicker"></div>
            </td>
            <th scope="row">
                <label><?php _e('Border Color', 'jobwp'); ?>:</label>
            </th>
            <td>
                <input class="jobwp-wp-color" type="text" name="jobwp_reset_btn_border_color" id="jobwp_reset_btn_border_color" value="<?php esc_attr_e( $jobwp_reset_btn_border_color ); ?>">
                <div id="colorpicker"></div>
            </td>
        </tr>
        <tr>
            <th scope="row">
                <label><?php _e('Hover Background Color', 'jobwp'); ?>:</label>
            </th>
            <td>
                <input class="jobwp-wp-color" type="text" name="jobwp_reset_btn_bg_color_hvr" id="jobwp_reset_btn_bg_color_hvr" value="<?php esc_attr_e( $jobwp_reset_btn_bg_color_hvr ); ?>">
                <div id="colorpicker"></div>
            </td>
            <th scope="row">
                <label><?php _e('Hover Font Color', 'jobwp'); ?>:</label>
            </th>
            <td>
                <input class="jobwp-wp-color" type="text" name="jobwp_reset_btn_font_color_hvr" id="jobwp_reset_btn_font_color_hvr" value="<?php esc_attr_e( $jobwp_reset_btn_font_color_hvr ); ?>">
                <div id="colorpicker"></div>
            </td>
            <th scope="row">
                <label><?php _e('Hover Border Color', 'jobwp'); ?>:</label>
            </th>
            <td>
                <input class="jobwp-wp-color" type="text" name="jobwp_reset_btn_border_color_hvr" id="jobwp_reset_btn_border_color_hvr" value="<?php esc_attr_e( $jobwp_reset_btn_border_color_hvr ); ?>">
                <div id="colorpicker"></div>
            </td>
        </tr>
    </table>
    <hr>
    <p class="submit">
        <button id="updateSearchStyles" name="updateSearchStyles" class="button button-primary jobwp-button">
            <i class="fa fa-check-circle" aria-hidden="true"></i>&nbsp;<?php _e('Save Settings', 'jobwp'); ?>
        </button>
    </p>
</form>