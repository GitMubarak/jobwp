<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<div id="wph-wrap-all" class="wrap jobwp-single-settings-page">

    <div class="settings-banner">
        <h2><i class="fa fa-cogs" aria-hidden="true"></i>&nbsp;<?php _e('Detail Page Settings', 'jobwp'); ?></h2>
    </div>

    <?php 
        if ( $jobwpSingleMessage ) {
            $this->jobwp_display_notification('success', 'Your information updated successfully.');
        }
    ?>

    <div class="jobwp-wrap">

        <nav class="nav-tab-wrapper">
            <a href="?post_type=jobs&page=jobwp-single-settings&tab=settings" class="nav-tab jobwp-tab <?php if ( $jobwpTab !== 'styles' ) { ?>jobwp-tab-active<?php } ?>">
                <i class="fa fa-cog" aria-hidden="true">&nbsp;</i><?php _e('Content', 'jobwp'); ?>
            </a>
            <a href="?post_type=jobs&page=jobwp-single-settings&tab=styles" class="nav-tab jobwp-tab <?php if ( $jobwpTab === 'styles' ) { ?>jobwp-tab-active<?php } ?>">
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
                                'icon' => 'fa-solid fa-arrows-left-right-to-line',
                                'heading' => 'Horizontal layout column width',
                                'sub-heading' => "Control left side, right side column width in the job details page"
                            ]
                        ];

                        $jobwp_pro_features_global = [
                            'Featured jobs slider',
                            'Post-submission redirect',
                            'CSV & Excel export',
                            'DOC & DOCX resume uploads',
                            'Embed search panel on any page via shortcode',
                            'Job level filtering by shortcode'
                        ];

                        include_once JOBWP_PATH . 'admin/view/partial/single-style.php';
                        break;
                    default:

                        $jobwp_pro_features_local = [
                            [
                                'icon' => 'fa-solid fa-toggle-off',
                                'heading' => 'Multiple detail page layout',
                                'sub-heading' => "Choose among multiple details page which suits your website"
                            ],
                            [
                                'icon' => 'fa-regular fa-address-card',
                                'heading' => 'Display company name & logo',
                                'sub-heading' => "Show the hiring company's name and logo on the job details page"
                            ],
                            [
                                'icon' => 'fa-brands fa-facebook',
                                'heading' => 'Control social sharing',
                                'sub-heading' => "Control the ability to share your jobs in various social platforms"
                            ]
                        ];

                        $jobwp_pro_features_global = [
                            'Featured jobs slider',
                            'Post-submission redirect',
                            'CSV & Excel export',
                            'DOC & DOCX resume uploads',
                            'Embed search panel on any page via shortcode',
                            'Job level filtering by shortcode'
                        ];

                        include_once JOBWP_PATH . 'admin/view/partial/single-content.php';
                        break;
                } 
                ?>
            </div>
        
        </div>

        <?php $this->jobwp_load_admin_sidebar( $jobwp_pro_features_local, $jobwp_pro_features_global ); ?>

    </div>
</div>