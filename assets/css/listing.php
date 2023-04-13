<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<style type="text/css">
  /* Job Item */
  .jobwp-listing-body-container .jobwp-item {
    border: 1px solid <?php esc_html_e( $jobwp_listing_item_border_color ); ?>;
    background-color: <?php esc_html_e( $jobwp_listing_item_bg_color ); ?>;
  }
  /* Job Listing */
  .jobwp-item .jobwp-job-title a.jobwp-job-title-a {
    color: <?php esc_html_e( $jobwp_listing_title_font_color ); ?>;
    font-size: <?php esc_html_e( $jobwp_listing_title_font_size ); ?>px;
  }
  /* Job overview */
  .jobwp-item p.jobwp-overview-excerpt {
    color: <?php esc_html_e( $jobwp_listing_overview_font_color ); ?>;
    font-size: <?php esc_html_e( $jobwp_listing_overview_font_size ); ?>px;
  }
  /* Job info */
  .jobwp-item .jobwp-bottom .jobwp-list-bottom-item i.fa,
  .jobwp-item .jobwp-bottom .jobwp-list-bottom-item i.fa-solid,
  .jobwp-item .jobwp-bottom .jobwp-list-bottom-item strong.primary-color {
    color: <?php esc_html_e( $jobwp_listing_info_font_color ); ?>;
    font-size: <?php esc_html_e( $jobwp_listing_info_font_size ); ?>px;
  }
</style>