<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<style type="text/css">
  .jobwp-single-body-container {
    background: <?php esc_html_e( $jobwp_single_container_bg_color ); ?>;
  }
  .jobwp-single-body-container .circulr-details-top {
    background: <?php esc_html_e( $jobwp_single_title_bg_color ); ?>;
  }
  .circulr-details-top .jobwp-job-title {
    color: <?php esc_html_e( $jobwp_single_title_font_color ); ?>;
    font-size: <?php esc_html_e( $jobwp_single_title_font_size ); ?>px;
    line-height: <?php esc_html_e( $jobwp_single_title_font_size + 10 ); ?>px;;
  }
  .jobwp-single-left .label,
  .jobwp-single-left .text {
    color: <?php esc_html_e( $jobwp_single_info_font_color ); ?>;
  }
  .jobwp-single-body-container .circulr-details-bottom-email {
    background: <?php esc_html_e( $jobwp_single_how_to_apply_bg_color ); ?>;
  }
  .circulr-details-bottom-email .jobwp-primary-button {
    background: <?php esc_html_e( $jobwp_single_apply_btn_bg_color ); ?>;
    border: 1px solid <?php esc_html_e( $jobwp_single_apply_btn_bg_color ); ?>;
  }
  .circulr-details-bottom-email .jobwp-primary-button:hover {
    color: <?php esc_html_e( $jobwp_single_apply_btn_bg_color ); ?>!important;
    background: #FFFFFF!important;
  }
</style>