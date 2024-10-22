<?php
# Silence is golden.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<div class="circulr-details-top">
    <div class="single-top-left">
        <<?php esc_attr_e( $jobwp_single_title_tag ); ?> class="jobwp-job-title"><?php esc_html_e( $job_title ); ?></<?php esc_attr_e( $jobwp_single_title_tag ); ?>>
        <?php
        if ( job_fs()->is_plan__premium_only('pro', true) ) {
            if ( $jobwp_single_display_company_name ) {
                ?>
                <div class="jwb-single-comp-name"><?php esc_html_e( $jobwp_company ); ?></div>
                <?php
            }
        }
        ?>
    </div>
    <?php
    if ( job_fs()->is_plan__premium_only('pro', true) ) {
        
        if ( $jobwp_single_display_company_logo ) {
            ?>
            <div class="single-top-right">
                <img src="<?php echo esc_url( $jobwp_company_logo ); ?>"/>
            </div>
            <?php
        }
    }
    ?>
</div>
<?php
if ( null !== $resumeUploadMsg ) {
    ?>
    <div class="jobwp-application-message"><?php esc_html_e( $resumeUploadMsg ); ?></div>
    <?php
}
?>