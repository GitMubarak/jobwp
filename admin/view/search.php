<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<div id="wph-wrap-all" class="wrap jobwp-search-settings-page">

    <div class="settings-banner">
        <h2><i class="fa fa-search" aria-hidden="true"></i>&nbsp;<?php _e('Search Panel Settings', JOBWP_TXT_DOMAIN); ?></h2>
    </div>

    <?php 
        if ( $jobwpSearchMessage ) {
            $this->jobwp_display_notification('success', 'Your information updated successfully.');
        }
    ?>

    <div class="jobwp-wrap">

        <nav class="nav-tab-wrapper">
            <a href="?post_type=jobs&page=jobwp-search-settings&tab=settings" class="nav-tab jobwp-tab <?php if ( $jobwpTab !== 'styles' ) { ?> jobwp-tab-active<?php } ?>">
                <i class="fa fa-cog" aria-hidden="true">&nbsp;</i><?php _e('Content', JOBWP_TXT_DOMAIN); ?>
            </a>
            <a href="?post_type=jobs&page=jobwp-search-settings&tab=styles" class="nav-tab jobwp-tab <?php if ( $jobwpTab === 'styles' ) { ?> jobwp-tab-active<?php } ?>">
                <i class="fa fa-paint-brush" aria-hidden="true"></i>&nbsp;<?php _e('Styles', JOBWP_TXT_DOMAIN); ?>
            </a>
        </nav>

        <div class="jobwp_personal_wrap jobwp_personal_help" style="width: 76%; float: left;">
            
            <div class="tab-content">
                <?php 
                switch ( $jobwpTab ) {
                    case 'styles':
                        //include_once JOBWP_PATH . 'admin/view/partial/search-style.php';
                        echo 'TBA';
                        break;
                    default:
                        include_once JOBWP_PATH . 'admin/view/partial/search-content.php';
                        break;
                } 
                ?>
            </div>
        
        </div>

        <?php include_once('partial/admin-sidebar.php'); ?>
    
    </div>

</div>