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
    <table class="jobwp-settings-table">
        <!-- Search Container -->
        <tr>
            <th scope="row" colspan="6" style="text-align: left;">
                <hr><span><?php _e('Container', 'jobwp'); ?></span><hr>
            </th>
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
            <td>
                <input class="jobwp-wp-color" type="text" name="jobwp_search_container_border_color" id="jobwp_search_container_border_color" value="<?php esc_attr_e( $jobwp_search_container_border_color ); ?>">
                <div id="colorpicker"></div>
            </td>
        </tr>
        <!-- Search Items -->
        <tr>
            <th scope="row" colspan="6" style="text-align: left;">
                <hr><span><?php _e('Search Items', 'jobwp'); ?></span><hr>
            </th>
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
        <tr>
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
                    <input type="number" class="small-text" min="0" max="50" name="jobwp_search_item_border_radius" id="jobwp_search_item_border_radius" value="<?php esc_attr_e( $jobwp_search_item_border_radius ); ?>">
                    <code>px</code>
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
                    <input class="jobwp-wp-color" type="text" name="jobwp_search_item_font_color" id="jobwp_search_item_font_color" value="<?php esc_attr_e( $jobwp_search_item_font_color ); ?>">
                    <div id="colorpicker"></div>
                    <?php
                }
                ?>
            </td>
        </tr>
        <!-- Search Button -->
        <tr>
            <th scope="row" colspan="6" style="text-align: left;">
                <hr><span><?php _e('Search Button', 'jobwp'); ?></span><hr>
            </th>
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
        </tr>
        <!-- Search Button::Hover -->
        <tr>
            <th scope="row" colspan="6" style="text-align: left;">
                <hr><span><?php _e('Search Button :: Hover', 'jobwp'); ?></span><hr>
            </th>
        </tr>
        <tr>
            <th scope="row">
                <label><?php _e('Background Color', 'jobwp'); ?>:</label>
            </th>
            <td>
                <input class="jobwp-wp-color" type="text" name="jobwp_search_btn_bg_color_hvr" id="jobwp_search_btn_bg_color_hvr" value="<?php esc_attr_e( $jobwp_search_btn_bg_color_hvr ); ?>">
                <div id="colorpicker"></div>
            </td>
            <th scope="row">
                <label><?php _e('Font Color', 'jobwp'); ?>:</label>
            </th>
            <td>
                <input class="jobwp-wp-color" type="text" name="jobwp_search_btn_font_color_hvr" id="jobwp_search_btn_font_color_hvr" value="<?php esc_attr_e( $jobwp_search_btn_font_color_hvr ); ?>">
                <div id="colorpicker"></div>
            </td>
        </tr>
        <!-- Reset Button -->
        <tr>
            <th scope="row" colspan="6" style="text-align: left;">
                <hr><span><?php _e('Reset Button', 'jobwp'); ?></span><hr>
            </th>
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
        <!-- Reset Button:Hover -->
        <tr>
            <th scope="row" colspan="6" style="text-align: left;">
                <hr><span><?php _e('Reset Button :: Hover', 'jobwp'); ?></span><hr>
            </th>
        </tr>
        <tr>
            <th scope="row">
                <label><?php _e('Background Color', 'jobwp'); ?>:</label>
            </th>
            <td>
                <input class="jobwp-wp-color" type="text" name="jobwp_reset_btn_bg_color_hvr" id="jobwp_reset_btn_bg_color_hvr" value="<?php esc_attr_e( $jobwp_reset_btn_bg_color_hvr ); ?>">
                <div id="colorpicker"></div>
            </td>
            <th scope="row">
                <label><?php _e('Font Color', 'jobwp'); ?>:</label>
            </th>
            <td>
                <input class="jobwp-wp-color" type="text" name="jobwp_reset_btn_font_color_hvr" id="jobwp_reset_btn_font_color_hvr" value="<?php esc_attr_e( $jobwp_reset_btn_font_color_hvr ); ?>">
                <div id="colorpicker"></div>
            </td>
            <th scope="row">
                <label><?php _e('Border Color', 'jobwp'); ?>:</label>
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