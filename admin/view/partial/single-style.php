<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

//$jobwpSingleStyles = [];
foreach ( $jobwpSingleStyles as $option_name => $option_value ) {
    if ( isset( $jobwpSingleStyles[$option_name] ) ) {
        ${"" . $option_name} = $option_value;
    }
}
?>
<form name="jobwp_single_style_form" role="form" class="form-horizontal" method="post" action="" id="jobwp-single-style-form">
    <table class="jobwp-settings-table">
        <!-- Container -->
        <tr>
            <th scope="row" colspan="6" style="text-align: left;">
                <hr><span><?php _e('Container', JOBWP_TXT_DOMAIN); ?></span><hr>
            </th>
        </tr>
        <tr>
            <th scope="row">
                <label><?php _e('Background Color', JOBWP_TXT_DOMAIN); ?>:</label>
            </th>
            <td>
                <input class="jobwp-wp-color" type="text" name="jobwp_single_container_bg_color" id="jobwp_single_container_bg_color" value="<?php esc_attr_e( $jobwp_single_container_bg_color ); ?>">
                <div id="colorpicker"></div>
            </td>
            <th scope="row">
                <label><?php _e('Margin Top', JOBWP_TXT_DOMAIN); ?>:</label>
            </th>
            <td>
                <input type="number" class="small-text" min="0" max="400" name="jobwp_single_container_margin_top" id="jobwp_single_container_margin_top" value="<?php esc_attr_e( $jobwp_single_container_margin_top ); ?>">
                <code>px</code>
            </td>
            <th scope="row">
                <label><?php _e('Margin Bottom', JOBWP_TXT_DOMAIN); ?>:</label>
            </th>
            <td>
                <input type="number" class="small-text" min="0" max="400" name="jobwp_single_container_margin_btm" id="jobwp_single_container_margin_btm" value="<?php esc_attr_e( $jobwp_single_container_margin_btm ); ?>">
                <code>px</code>
            </td>
        </tr>
        <!-- Title -->
        <tr>
            <th scope="row" colspan="6" style="text-align: left;">
                <hr><span><?php _e('Job Title', JOBWP_TXT_DOMAIN); ?></span><hr>
            </th>
        </tr>
        <tr>
            <th scope="row">
                <label><?php _e('Background Color', JOBWP_TXT_DOMAIN); ?>:</label>
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
                    <input class="jobwp-wp-color" type="text" name="jobwp_single_title_bg_color" id="jobwp_single_title_bg_color" value="<?php esc_attr_e( $jobwp_single_title_bg_color ); ?>">
                    <div id="colorpicker"></div>
                    <?php
                }
                ?>
            </td>
            <th scope="row">
                <label><?php _e('Font Color', JOBWP_TXT_DOMAIN); ?>:</label>
            </th>
            <td>
                <input class="jobwp-wp-color" type="text" name="jobwp_single_title_font_color" id="jobwp_single_title_font_color" value="<?php esc_attr_e( $jobwp_single_title_font_color ); ?>">
                <div id="colorpicker"></div>
            </td>
            <th scope="row">
                <label><?php _e('Font Size', JOBWP_TXT_DOMAIN); ?>:</label>
            </th>
            <td>
                <input type="number" class="small-text" min="11" max="50" name="jobwp_single_title_font_size" id="jobwp_single_title_font_size" value="<?php esc_attr_e( $jobwp_single_title_font_size ); ?>">
                <code>px</code>
            </td>
        </tr>
        <!-- Job Info -->
        <tr>
            <th scope="row" colspan="6" style="text-align: left;">
                <hr><span><?php _e('Job Info', JOBWP_TXT_DOMAIN); ?></span><hr>
            </th>
        </tr>
        <tr>
            <th scope="row">
                <label><?php _e('Font Color', JOBWP_TXT_DOMAIN); ?>:</label>
            </th>
            <td>
                <input class="jobwp-wp-color" type="text" name="jobwp_single_info_font_color" id="jobwp_single_info_font_color" value="<?php esc_attr_e( $jobwp_single_info_font_color ); ?>">
                <div id="colorpicker"></div>
            </td>
        </tr>
        <!-- How to Apply -->
        <tr>
            <th scope="row" colspan="6" style="text-align: left;">
                <hr><span><?php _e('How to Apply', JOBWP_TXT_DOMAIN); ?></span><hr>
            </th>
        </tr>
        <tr>
            <th scope="row">
                <label><?php _e('Background Color', JOBWP_TXT_DOMAIN); ?>:</label>
            </th>
            <td colspan="3">
                <?php
                if ( ! job_fs()->is_plan__premium_only('pro', true) ) {
                    ?>
                    <span><?php echo '<a href="' . job_fs()->get_upgrade_url() . '">' . __('Please Upgrade Now', 'jobwp') . '</a>'; ?></span>
                    <?php
                }

                if ( job_fs()->is_plan__premium_only('pro', true) ) {
                    ?>
                    <input class="jobwp-wp-color" type="text" name="jobwp_single_how_to_apply_bg_color" id="jobwp_single_how_to_apply_bg_color" value="<?php esc_attr_e( $jobwp_single_how_to_apply_bg_color ); ?>">
                    <div id="colorpicker"></div>
                    <?php
                }
                ?>
            </td>
        </tr>
        <!-- Apply Button -->
        <tr>
            <th scope="row" colspan="6" style="text-align: left;">
                <hr><span><?php _e('Apply Button', JOBWP_TXT_DOMAIN); ?></span><hr>
            </th>
        </tr>
        <tr>
            <th scope="row">
                <label><?php _e('Button Color', JOBWP_TXT_DOMAIN); ?>:</label>
            </th>
            <td>
                <input class="jobwp-wp-color" type="text" name="jobwp_single_apply_btn_bg_color" id="jobwp_single_apply_btn_bg_color" value="<?php esc_attr_e( $jobwp_single_apply_btn_bg_color ); ?>">
                <div id="colorpicker"></div>
            </td>
        </tr>
    </table>
    <hr>
    <p class="submit"><button id="updateSingleStyles" name="updateSingleStyles" class="button button-primary jobwp-button"><?php _e('Save Settings', JOBWP_TXT_DOMAIN); ?></button></p>
</form>