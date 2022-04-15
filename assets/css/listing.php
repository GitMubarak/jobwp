<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<style type="text/css">
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
</style>