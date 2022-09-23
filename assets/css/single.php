<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<style type="text/css">
  .jobwp-single-body-container {
    background: <?php esc_html_e( $jobwp_single_container_bg_color ); ?>;
  }
  .circulr-details-top .jobwp-job-title {
    color: <?php esc_html_e( $jobwp_single_title_font_color ); ?>;
    font-size: <?php esc_html_e( $jobwp_single_title_font_size ); ?>px;
  }
  .jobwp-single-left .label,
  .jobwp-single-left .text {
    color: <?php esc_html_e( $jobwp_single_info_font_color ); ?>;
  }
</style>