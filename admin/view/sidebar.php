<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<div class="jobwp-admin-sidebar" style="width: 20%; float: left;">
    <?php
    if ( ! job_fs()->is_plan__premium_only('pro', true) ) {

        $features = count( $pro_features_loc ) == 1 ? 'feature' : 'features';

        if ( count( $pro_features_loc ) > 0 ) {
            ?>
            <div class="postbox pro-features-block">
                <div class="upgrade-card-head">
                    <div class="upgrade-card-title">
                        <i class="fa fa-lock" style="font-size:16px; vertical-align:-1px; margin-right:4px" aria-hidden="true"></i>Unlock Pro features
                    </div>
                    <div class="upgrade-card-sub"><?php echo count( $pro_features_loc ) . '&nbsp;' . esc_html( $features ); ?> locked on this page</div>
                </div>
                <div class="upgrade-features">
                    <?php
                    foreach ( $pro_features_loc as $local ) {
                        ?>
                        <div class="upgrade-feat highlighted">
                            <i class="<?php echo esc_attr( $local['icon'] ); ?> upgrade-feat-icon" aria-hidden="true"></i>
                            <div class="upgrade-feat-text"><?php echo esc_html( $local['heading'] ); ?>
                                <span><?php echo esc_html( $local['sub-heading'] ); ?></span>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                </div>
                <div class="upgrade-cta">
                    <button class="upgrade-btn" onclick="window.location.href='<?php echo esc_url( job_fs()->get_upgrade_url() ); ?>';">Upgrade to Pro</button>
                    <div class="upgrade-meta">From $49.99/yr &nbsp;·&nbsp; 14-day money-back</div>
                </div>
            </div>
            <?php
        }
        ?>

        <div class="postbox">
            <h3 class="hndle"><span>📌 Also included in Pro</span></h3>
            <div class="inside left">
                <ul class="left">
                    <?php
                    foreach ( $pro_features_global as $global ) {
                        ?>
                        <li>&#10003; <?php echo esc_html( $global ); ?></li>
                        <?php
                    }
                    ?>
                </ul>
                <p style="margin-bottom: 1px! important;"><a href="https://wpjoblisting.com/pricing-faq/" target="_blank" class="button button-primary jobwp-button">See all features & pricing</a></p>
            </div>
        </div>
        <?php
    }
    ?>
    <div class="postbox">
        <h3 class="hndle"><span>💬 Support / Bug / Customization</span></h3>
        <div class="inside centered">
            <p>Please feel free to let us know if you have any bugs to report. Your report / suggestion can make the plugin awesome!</p>
            <p style="margin-bottom: 1px! important;"><a href="https://wpjoblisting.com/" target="_blank" class="button button-primary jobwp-button">Get Support</a></p>
        </div>
    </div>
    <div class="postbox">
        <h3 class="hndle"><span>⭐ Enjoying JobWP?</span></h3>
        <div class="inside centered">
            <p>If JobWP is working well for you, a quick review on WordPress.org makes a huge difference — it helps others find the plugin and keeps development going.</p>
            <p style="margin-bottom: 1px! important;">
                <a href="https://wordpress.org/support/plugin/jobwp/reviews/#new-post" target="_blank" class="button button-primary jobwp-button">Leave a Review</a>
            </p>
        </div>
    </div>
</div>