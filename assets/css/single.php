<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<style type="text/css">
  .jobwp-single-body-container {
    background: <?php esc_html_e( $jobwp_single_container_bg_color ); ?>;
    margin-top: <?php esc_html_e( $jobwp_single_container_margin_top ); ?>px;
    margin-bottom: <?php esc_html_e( $jobwp_single_container_margin_btm ); ?>px;
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
    border: 1px solid <?php esc_html_e( $jobwp_single_apply_btn_border_color ); ?>;
    font-size: <?php esc_html_e( $jobwp_single_apply_btn_font_size ); ?>px;
    color: <?php esc_html_e( $jobwp_single_apply_btn_font_color ); ?>;
    padding: <?php esc_html_e( $jobwp_single_apply_btn_padding_h ); ?>px <?php esc_html_e( $jobwp_single_apply_btn_padding_w ); ?>px;
    border-radius: <?php esc_html_e( $jobwp_single_apply_btn_brdr_radius ); ?>px;
  }
  .circulr-details-bottom-email .jobwp-primary-button:hover {
    background: <?php esc_html_e( $jobwp_single_apply_btn_bg_clr_hvr ); ?>;
    border: 1px solid <?php esc_html_e( $jobwp_single_apply_btn_brdr_clr_hvr ); ?>;
    color: <?php esc_html_e( $jobwp_single_apply_btn_font_clr_hvr ); ?>;
  }
</style>