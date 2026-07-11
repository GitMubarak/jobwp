<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<div id="wph-wrap-all" class="wrap jobwp-search-settings-page">

    <div class="settings-banner">
        <h2><i class="fa fa-search" aria-hidden="true"></i>&nbsp;<?php _e('Search Panel Settings', 'jobwp'); ?></h2>
    </div>

    <?php 
        if ( $jobwpSearchMessage ) {
            $this->jobwp_display_notification('success', 'Your information updated successfully.');
        }
    ?>

    <div class="jobwp-wrap">

        <nav class="nav-tab-wrapper">
            <a href="?post_type=jobs&page=jobwp-search-settings&tab=settings" class="nav-tab jobwp-tab <?php if ( $jobwpTab !== 'styles' ) { ?> jobwp-tab-active<?php } ?>">
                <i class="fa fa-cog" aria-hidden="true">&nbsp;</i><?php _e('Content', 'jobwp'); ?>
            </a>
            <a href="?post_type=jobs&page=jobwp-search-settings&tab=styles" class="nav-tab jobwp-tab <?php if ( $jobwpTab === 'styles' ) { ?> jobwp-tab-active<?php } ?>">
                <i class="fa fa-paint-brush" aria-hidden="true"></i>&nbsp;<?php _e('Styles', 'jobwp'); ?>
            </a>
        </nav>

        <div class="jobwp_personal_wrap jobwp_personal_help" style="width: 76%; float: left;">
            
            <div class="tab-content">
                <?php 
                switch ( $jobwpTab ) {
                    case 'styles':

                        $jobwp_pro_features_local = [
                            [
                                'icon' => 'fa-solid fa-palette',
                                'heading' => 'Search Items Styles Option Settings',
                                'sub-heading' => 'Control border radius & font color over various search fiields'
                            ]
                        ];

                        $jobwp_pro_features_global = [
                            'Featured jobs slider',
                            'Company profiles & logos',
                            'CSV & Excel export',
                            'DOC & DOCX resume uploads',
                            'Embed search panel on any page via shortcode',
                            'Job level filtering by shortcode'
                        ];

                        include_once JOBWP_PATH . 'admin/view/partial/search-style.php';
                        break;
                    default:

                        $jobwp_pro_features_local = [
                            [
                                'icon' => 'fa-solid fa-magnifying-glass-arrow-right',
                                'heading' => 'Search Items Order',
                                'sub-heading' => 'Control over search items order - place one item before another'
                            ],
                            [
                                'icon' => 'fa-solid fa-sliders',
                                'heading' => 'Control Job Level',
                                'sub-heading' => 'Full control over job level control, placeholder text and placement order in the search panel'
                            ]
                        ];

                        $jobwp_pro_features_global = [
                            'Featured jobs slider',
                            'Company profiles & logos',
                            'CSV & Excel export',
                            'DOC & DOCX resume uploads',
                            'Embed search panel on any page via shortcode',
                            'Job level filtering by shortcode'
                        ];

                        include_once JOBWP_PATH . 'admin/view/partial/search-content.php';
                        break;
                } 
                ?>
            </div>
        
        </div>

        <?php $this->jobwp_load_admin_sidebar( $jobwp_pro_features_local, $jobwp_pro_features_global ); ?>
    
    </div>

</div>