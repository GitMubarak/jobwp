<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<div id="wph-wrap-all" class="wrap jobwp-single-settings-page">

    <div class="settings-banner">
        <h2><?php _e('Detail Page Settings', JOBWP_TXT_DOMAIN); ?></h2>
    </div>

    <?php 
        if ( $jobwpSingleMessage ) {
            $this->jobwp_display_notification('success', 'Your information updated successfully.');
        }
    ?>

    <div class="hmacs-wrap">

    <nav class="nav-tab-wrapper">
        <a href="?post_type=jobs&page=jobwp-single-settings&tab=settings" class="nav-tab <?php if ( $jobwpTab !== 'styles' ) { ?>nav-tab-active<?php } ?>"><?php _e('Content', JOBWP_TXT_DOMAIN); ?></a>
        <a href="?post_type=jobs&page=jobwp-single-settings&tab=styles" class="nav-tab <?php if ( $jobwpTab === 'styles' ) { ?>nav-tab-active<?php } ?>"><?php _e('Styles', JOBWP_TXT_DOMAIN); ?></a>
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
                    include_once JOBWP_PATH . 'admin/view/partial/single-content.php';
                    break;
            } 
            ?>
        </div>
    
    </div>

</div>