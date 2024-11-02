<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<style type="text/css">
  .jobwp-single-body-container {
    background: <?php esc_html_e( $jobwp_single_container_bg_color ); ?>;
    margin-top: <?php esc_html_e( $jobwp_single_container_margin_top ); ?>px;
    margin-bottom: <?php esc_html_e( $jobwp_single_container_margin_btm ); ?>px !important;
  }
  .jobwp-single-body-container .circulr-details-top {
    background: <?php esc_html_e( $jobwp_single_title_bg_color ); ?>;
  }
  .circulr-details-top .jobwp-job-title {
    color: <?php esc_html_e( $jobwp_single_title_font_color ); ?>;
    font-size: <?php esc_html_e( $jobwp_single_title_font_size ); ?>px;
    line-height: <?php esc_html_e( $jobwp_single_title_font_size + 10 ); ?>px;
  }
  .jobwp-single-area .content-row .left-cell {
    width: <?php esc_html_e( $jobwp_single_info_column_left_width ); ?>%;
  }
  .jobwp-single-area .content-row .right-cell {
    width: <?php esc_html_e( $jobwp_single_info_column_right_width ); ?>%;
  }
  .jobwp-single-area .content-row .left-cell h5.label,
  .jobwp-single-area .content-row .text {
    color: <?php esc_html_e( $jobwp_single_info_font_color ); ?>;
    margin: 0;
  }
  .jobwp-single-area .content-row .left-cell h5.label {
    font-size: <?php esc_html_e( $jobwp_single_info_lbl_font_size ); ?>px;
  }
  .jobwp-single-body-container .circulr-details-bottom-email {
    background: <?php esc_html_e( $jobwp_single_how_to_apply_bg_color ); ?>;
  }
  .jobwp-single-body-container .circulr-details-bottom-email h3.wpsd-read-before-apply {
    color: <?php esc_html_e( $jobwp_single_howtoapply_title_font_clr ); ?>;
    font-size: <?php esc_html_e( $jobwp_single_howtoapply_title_font_size ); ?>px;
  }
  .jobwp-single-body-container .circulr-details-bottom-email span.wpsd-read-before-apply-border {
    border-color: <?php esc_html_e( $jobwp_single_howtoapply_title_brdr_clr ); ?>;
  }
  .jobwp-single-body-container .circulr-details-bottom-email p.apply-to-email,
  .jobwp-single-body-container .circulr-details-bottom-email p.apply-to-email a {
    color: <?php esc_html_e( $jobwp_single_howtoapply_content_clr ); ?>;
    font-size: <?php esc_html_e( $jobwp_single_howtoapply_content_size ); ?>px;
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