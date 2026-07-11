<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<div id="wph-wrap-all" class="wrap jobwp-listing-settings-page">

    <div class="settings-banner">
        <h2><i class="fa fa-cogs" aria-hidden="true"></i>&nbsp;<?php _e('Listing Page Settings', 'jobwp'); ?></h2>
    </div>

    <?php 
        if ( $jobwpListingMessage ) {
            $this->jobwp_display_notification('success', 'Your information updated successfully.');
        }
    ?>

    <div class="jobwp-wrap">

        <nav class="nav-tab-wrapper">
            <a href="?post_type=jobs&page=jobwp-listing-settings&tab=settings" class="nav-tab jobwp-tab <?php if ( $jobwpTab !== 'styles' ) { ?> jobwp-tab-active<?php } ?>">
                <i class="fa fa-cog" aria-hidden="true">&nbsp;</i><?php _e('Content', 'jobwp'); ?>
            </a>
            <a href="?post_type=jobs&page=jobwp-listing-settings&tab=styles" class="nav-tab jobwp-tab <?php if ( $jobwpTab === 'styles' ) { ?> jobwp-tab-active<?php } ?>">
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
                                'icon' => 'fa-regular fa-rectangle-list',
                                'heading' => 'Job Card Items',
                                'sub-heading' => 'Background color & corder color'
                            ],
                            [
                                'icon' => 'fa-solid fa-clipboard-list',
                                'heading' => 'Company Info',
                                'sub-heading' => 'Company font color & font Size'
                            ],
                            [
                                'icon' => 'fa-solid fa-toggle-off',
                                'heading' => 'Job Information Label',
                                'sub-heading' => 'Job Information label font color & font Size'
                            ],
                            [
                                'icon' => 'fa-solid fa-angles-right',
                                'heading' => 'Read More Button',
                                'sub-heading' => 'Full control over button colors, fonts, borders, hover states, and padding'
                            ],
                            [
                                'icon' => 'fa-solid fa-ellipsis',
                                'heading' => 'Pagination',
                                'sub-heading' => 'Full control over pagination colors, fonts, borders, hover states etc.'
                            ]
                        ];

                        $jobwp_pro_features_global = [
                            'Featured jobs slider',
                            'Company profiles & logos',
                            'CSV & Excel export',
                            'DOC & DOCX resume uploads',
                            'Display search panel on any page via shortcode',
                            'Job level filtering by shortcode'
                        ];

                        include_once JOBWP_PATH . 'admin/view/partial/listing-style.php';
                        break;
                    default:
                        
                        $jobwp_pro_features_local = [
                            [
                                'icon' => 'fa-regular fa-address-card',
                                'heading' => 'Display company name & logo',
                                'sub-heading' => "Show the hiring company's name and logo on each listing card"
                            ],
                            [
                                'icon' => 'fa-solid fa-sack-dollar',
                                'heading' => 'Display salary',
                                'sub-heading' => 'Show the salary range on the listing card'
                            ],
                            [
                                'icon' => 'fa-solid fa-clipboard-list',
                                'heading' => 'Display responsibility & vacancy count',
                                'sub-heading' => 'Show responsibilities and open vacancy count per listing'
                            ],
                            [
                                'icon' => 'fa-regular fa-calendar-days',
                                'heading' => 'Display publish date',
                                'sub-heading' => 'Show when each job was posted so candidates can identify fresh listings'
                            ],
                            [
                                'icon' => 'fa-solid fa-circle-plus',
                                'heading' => 'Display read more button',
                                'sub-heading' => 'Add a custom Read More button to listing cards with your own label text'
                            ],
                            [
                                'icon' => 'fa-solid fa-square-xmark',
                                'heading' => 'Custom icon control',
                                'sub-heading' => 'Remove the default job information icon from listings'
                            ]
                        ];

                        $jobwp_pro_features_global = [
                            'Full listing page styling control',
                            'Featured jobs slider',
                            'Job level filtering by shortcode',
                            'Display search panel on any page via shortcode',
                            'CSV & Excel export',
                            'DOC & DOCX resume uploads'
                        ];

                        include_once JOBWP_PATH . 'admin/view/partial/listing-content.php';
                        break;
                } 
                ?>
            </div>
        
        </div>

        <?php 
        $this->jobwp_load_admin_sidebar( $jobwp_pro_features_local, $jobwp_pro_features_global );
        ?>
    
    </div>

</div>