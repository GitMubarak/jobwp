<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<div id="wph-wrap-all" class="wrap jobwp-apply-form-settings-page">

    <div class="settings-banner">
        <h2><i class="fa fa-file-pen" aria-hidden="true"></i>&nbsp;<?php _e('Apply Form Settings', 'jobwp'); ?></h2>
    </div>

    <?php 
    if ( $jobwpApplyFormMessage ) {
        $this->jobwp_display_notification('success', 'Your information updated successfully.');
    }
    ?>

    <div class="jobwp-wrap">

        <nav class="nav-tab-wrapper">
            <a href="?post_type=jobs&page=jobwp-apply-form-settings&tab=settings" class="nav-tab jobwp-tab <?php if ( $jobwpTab !== 'styles' ) { ?> jobwp-tab-active<?php } ?>">
                <i class="fa fa-cog" aria-hidden="true">&nbsp;</i><?php _e('Content', 'jobwp'); ?>
            </a>
            <a href="?post_type=jobs&page=jobwp-apply-form-settings&tab=styles" class="nav-tab jobwp-tab <?php if ( $jobwpTab === 'styles' ) { ?> jobwp-tab-active<?php } ?>">
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
                                'heading' => 'Apply Form Styling',
                                'sub-heading' => "Full visual control over your application form — colours, fonts, borders, button styles and hover states"
                            ]
                        ];

                        $jobwp_pro_features_global = [
                            'Featured jobs slider',
                            'Company profiles & logos',
                            'CSV & Excel export',
                            'Post-submission redirect',
                            'Embed search panel on any page via shortcode',
                            'Job level filtering by shortcode'
                        ];
                        
                        include_once JOBWP_PATH . 'admin/view/partial/apply-form-style.php';
                        break;
                    default:

                        $jobwp_pro_features_local = [
                            [
                                'icon' => 'fa-solid fa-phone',
                                'heading' => 'Display phone field',
                                'sub-heading' => "Let candidates include their phone number with country code in their application"
                            ],
                            [
                                'icon' => 'fa-regular fa-square-check',
                                'heading' => 'User consent checkbox',
                                'sub-heading' => "GDPR-compliant consent checkbox with custom message — candidates agree terms before submitting"
                            ],
                            [
                                'icon' => 'fa-regular fa-file-word',
                                'heading' => 'DOC & DOCX resume uploads',
                                'sub-heading' => "Accept Word document CVs alongside PDFs automatically on upgrade"
                            ]
                        ];

                        $jobwp_pro_features_global = [
                            'Featured jobs slider',
                            'Post-submission redirect',
                            'CSV & Excel export',
                            'Role-based email notifications',
                            'Embed search panel on any page via shortcode',
                            'Job level filtering by shortcode'
                        ];

                        include_once JOBWP_PATH . 'admin/view/partial/apply-form-content.php';
                        break;
                } 
                ?>
            </div>
        
        </div>

        <?php $this->jobwp_load_admin_sidebar( $jobwp_pro_features_local, $jobwp_pro_features_global ); ?>
    
    </div>

</div>