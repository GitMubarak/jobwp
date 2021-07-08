<?php
if ( ! defined('ABSPATH') ) exit;

$jobwpGeneralMessage = false;

if ( isset( $_POST['updateGeneralStyles'] ) ) {
    
    $jobwpGeneralStylesInfo = array(
        'jobwp_title_font_color'      => isset( $_POST['jobwp_title_font_color'] ) ? sanitize_text_field( $_POST['jobwp_title_font_color'] ) : '#212121',
        'jobwp_title_font_size'       => isset( $_POST['jobwp_title_font_size'] ) ? sanitize_text_field( $_POST['jobwp_title_font_size'] ) : 12,
    );
    
    $jobwpGeneralMessage = update_option( 'jobwp_search_styles', serialize( $jobwpGeneralStylesInfo ) );
}

$jobwpGeneralStyles           = stripslashes_deep( unserialize( get_option('jobwp_search_styles') ) );
$jobwp_title_font_color       = isset( $jobwpGeneralStyles['jobwp_title_font_color'] ) ? $jobwpGeneralStyles['jobwp_title_font_color'] : '#212121';
$jobwp_title_font_size        = isset( $jobwpGeneralStyles['jobwp_title_font_size'] ) ? $jobwpGeneralStyles['jobwp_title_font_size'] : 12;
?>
<div id="wph-wrap-all" class="wrap jobwp-general-settings-page">

    <div class="settings-banner">
        <h2><?php _e('General Settings', JOBWP_TXT_DOMAIN); ?></h2>
    </div>

    <?php 
        if ( $jobwpGeneralMessage ) {
            $this->jobwp_display_notification('success', 'Your information updated successfully.');
        }
    ?>

    <div class="hmacs-wrap">

    <nav class="nav-tab-wrapper">
        <a href="?post_type=jobs&page=jobwp-general-settings&tab=settings" class="nav-tab <?php if ( $jobwpTab !== 'styles' ) { ?>nav-tab-active<?php } ?>"><?php _e('Content Settings', JOBWP_TXT_DOMAIN); ?></a>
        <a href="?post_type=jobs&page=jobwp-general-settings&tab=styles" class="nav-tab <?php if ( $jobwpTab === 'styles' ) { ?>nav-tab-active<?php } ?>"><?php _e('Styles Settings', JOBWP_TXT_DOMAIN); ?></a>
    </nav>

    <div class="hmacs_personal_wrap hmacs_personal_help" style="width: 895px; float: left; margin-top: 5px;">
        
        <div class="tab-content">
            <?php 
            switch ( $jobwpTab ) {
                case 'styles':
                    ?>
                    <h3><?php _e('Styles Settings::', JOBWP_TXT_DOMAIN); ?></h3>

                    <form name="jobwp_general_style_form" role="form" class="form-horizontal" method="post" action="" id="jobwp-general-style-form">
                        <table class="jobwp-general-style-settings-table">
                            <tr class="jobwp_btn_color">
                                <th scope="row" colspan="2">
                                    <label><?php _e('Job Title', JOBWP_TXT_DOMAIN); ?></label>
                                    <hr>
                                </th>
                            </tr>
                            <tr class="jobwp_title_font_color">
                                <th scope="row">
                                    <label for="jobwp_title_font_color"><?php esc_html_e('Font Color:', JOBWP_TXT_DOMAIN); ?></label>
                                </th>
                                <td>
                                    <input class="jobwp-wp-color" type="text" name="jobwp_title_font_color" id="jobwp_title_font_color" value="<?php esc_attr_e( $jobwp_title_font_color ); ?>">
                                    <div id="colorpicker"></div>
                                </td>
                            </tr>
                            <tr class="jobwp_title_font_size">
                                <th scope="row">
                                    <label for="jobwp_title_font_size"><?php esc_html_e('Font Size:', JOBWP_TXT_DOMAIN); ?></label>
                                </th>
                                <td>
                                    <input class="medium-textr" type="number" min="12" max="46" step="1" name="jobwp_title_font_size" id="jobwp_title_font_size" value="<?php esc_attr_e( $jobwp_title_font_size ); ?>">
                                    <code>px</code>
                                </td>
                            </tr>
                        </table>
                        <p class="submit"><button id="updateGeneralStyles" name="updateGeneralStyles" class="button button-primary"><?php esc_attr_e('Save Settings', JOBWP_TXT_DOMAIN); ?></button></p>
                    </form>
                    <?php
                    break;
                default:
                    ?>
                    <h3><?php _e('Content Settings:', JOBWP_TXT_DOMAIN); ?></h3>
                    <?php _e('Please go to Content Settings', JOBWP_TXT_DOMAIN); ?>
                    <?php
                    break;
            } 
            ?>
        </div>
    
    </div>

</div>