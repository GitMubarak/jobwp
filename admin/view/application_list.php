<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$showMessage = '';
// Delete Single Application
if ( isset( $_GET['delID'] ) ) {
    $showMessage = $this->jobwp_delete_single_application( $_GET['delID'] );
}

$jobwpDir = wp_upload_dir();
$jobwpDir = $jobwpDir['baseurl'] . '/jobwp-resume';
?>
<div class="settings-banner">
    <h2><i class="fa-solid fa-list-check"></i>&nbsp;<?php _e('Application Lists', JOBWP_TXT_DOMAIN); ?></h2>
</div>
<?php 
if ( '' !== $showMessage ) {
    $this->jobwp_display_notification('info', $showMessage);
}
?>
<div id="jobwp-wrap-all" class="wrap">
<form id="posts-filter" class="submitterRequest" method="post" action="?post_type=jobs&page=jobwp-application-list">
    <table class="wp-list-table widefat fixed striped posts" cellspacing="0" id="wpc_data_table">
    <thead>
        <tr>
            <?php print_column_headers('jobwp-allication-table-column'); ?>
        </tr>
    </thead>
    <tbody id="the-list">
        <?php
        $jL = 1;
        $applications = $this->jobwp_get_all_applications();
        if ( count( $applications ) > 0 ) {
            foreach ( $applications as $application ) {
                ?>
                <tr>
                    <td><input type="checkbox" class="bulkSelect" name="bulkSelection[]" value="<?php esc_attr_e( $application->job_id ); ?>"></td>
                    <td style="font-weight:600;"><?php printf('%d', $jL); ?></td>
                    <td><?php printf('%s', $application->applied_for); ?></td>
                    <td><?php printf('%s', $application->applicant_name); ?></td>
                    <td><?php printf('%s', $application->applicant_email); ?></td>
                    <td><?php printf('%s', $application->applicant_message); ?></td>
                    <td><a href="<?php printf('%s/%s', $jobwpDir, $application->resume_name); ?>"><?php esc_html_e( $application->resume_name ); ?></a></td>
                    <td><?php printf('%s', date('D d M Y - h:i A', strtotime($application->applied_on))); ?>
                    </td>
                    <td>
                        <span class="delReq">
                            <a href="?post_type=jobs&page=jobwp-application-list&delID=<?php esc_attr_e( $application->job_id ); ?>" class="reqDel"><?php _e('DELETE', JOBWP_TXT_DOMAIN); ?></a>
                        </span>
                    </td>
                </tr>
                <?php 
                $jL++;
            }
        }
        ?>
    </tbody>
    <tfoot>
        <tr>
            <?php print_column_headers('jobwp-allication-table-column', false); ?>
        </tr>
    </tfoot>
    </table>
</form>
</div>
<?php
if ( ! job_fs()->is_plan__premium_only('pro', true) ) {
    ?>
    <a href="#" class="button button-primary jobwp-button"><?php _e('EXPORT TO CSV', JOBWP_TXT_DOMAIN); ?></a><br>
    <span><?php echo '<a href="' . job_fs()->get_upgrade_url() . '">' . __('Please Upgrade Now', 'jobwp') . '</a>'; ?></span>
    <?php
}

if ( job_fs()->is_plan__premium_only('pro', true) ) {
    ?>
    <form method="post" id="jobwp-download-to-csv-form" action="">
        <input type="submit" name="jobwp_download_csv" class="button button-primary jobwp-button" value="<?php _e('EXPORT TO CSV', JOBWP_TXT_DOMAIN); ?>">
    </form>
    <?php
}
?>