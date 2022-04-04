<?php
if ( ! defined('ABSPATH') ) exit;

$jobwpListingMessage = false;

if ( isset( $_POST['updateListingStyles'] ) ) {
    
    $jobwpListingStylesInfo = array(
        'jobwp_title_font_color'      => isset( $_POST['jobwp_title_font_color'] ) ? sanitize_text_field( $_POST['jobwp_title_font_color'] ) : '#212121',
        'jobwp_title_font_size'       => isset( $_POST['jobwp_title_font_size'] ) ? sanitize_text_field( $_POST['jobwp_title_font_size'] ) : 12,
    );
    
    $jobwpListingMessage = update_option( 'jobwp_search_styles', serialize( $jobwpListingStylesInfo ) );
}

$jobwpListingStyles           = stripslashes_deep( unserialize( get_option('jobwp_search_styles') ) );
$jobwp_title_font_color       = isset( $jobwpListingStyles['jobwp_title_font_color'] ) ? $jobwpListingStyles['jobwp_title_font_color'] : '#212121';
$jobwp_title_font_size        = isset( $jobwpListingStyles['jobwp_title_font_size'] ) ? $jobwpListingStyles['jobwp_title_font_size'] : 12;
?>
<div id="wph-wrap-all" class="wrap jobwp-listing-settings-page">

    <div class="settings-banner">
        <h2><?php _e('Listing Settings', JOBWP_TXT_DOMAIN); ?></h2>
    </div>

    <?php 
        if ( $jobwpListingMessage ) {
            $this->jobwp_display_notification('success', 'Your information updated successfully.');
        }
    ?>

    <div class="hmacs-wrap">

    <nav class="nav-tab-wrapper">
        <a href="?post_type=jobs&page=jobwp-listing-settings&tab=settings" class="nav-tab <?php if ( $jobwpTab !== 'styles' ) { ?>nav-tab-active<?php } ?>"><?php _e('Content', JOBWP_TXT_DOMAIN); ?></a>
        <a href="?post_type=jobs&page=jobwp-listing-settings&tab=styles" class="nav-tab <?php if ( $jobwpTab === 'styles' ) { ?>nav-tab-active<?php } ?>"><?php _e('Styles', JOBWP_TXT_DOMAIN); ?></a>
    </nav>

    <div class="hmacs_personal_wrap hmacs_personal_help" style="width: 895px; float: left; margin-top: 5px;">
        
        <div class="tab-content">
            <?php 
            switch ( $jobwpTab ) {
                case 'styles':
                    ?>
                    <h3><?php _e('Styles:', JOBWP_TXT_DOMAIN); ?></h3>
                    <?php _e('Coming Soon', JOBWP_TXT_DOMAIN); ?>
                    <?php
                    break;
                default:
                    ?>
                    <h3><?php _e('Content:', JOBWP_TXT_DOMAIN); ?></h3>
                    <?php _e('Coming Soon', JOBWP_TXT_DOMAIN); ?>
                    <?php
                    break;
            } 
            ?>
        </div>
    
    </div>

</div>