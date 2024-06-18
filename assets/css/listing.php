<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<style type="text/css">
  /* Search Panel Started */
  .jobwp-search-container {
    background-color: <?php esc_html_e( $jobwp_search_container_bg_color ); ?>;
    border-color: <?php esc_html_e( $jobwp_search_container_border_color ); ?>;
  }
  .jobwp-search-container .jobwp-search-item input[type="text"],
  .jobwp-search-container .jobwp-search-item select {
    background-color: <?php esc_html_e( $jobwp_search_item_bg_color ); ?>;
    border-color: <?php esc_html_e( $jobwp_search_item_border_color ); ?>;
    font-size: <?php esc_html_e( $jobwp_search_item_font_size ); ?>px;
  }
  .jobwp-search-container .jobwp-search-item .submit-btn {
    background-color: <?php esc_html_e( $jobwp_search_btn_bg_color ); ?>;
    color: <?php esc_html_e( $jobwp_search_btn_font_color ); ?>;
    font-size: <?php esc_html_e( $jobwp_search_btn_font_size ); ?>px;
    line-height: <?php esc_html_e( $jobwp_search_btn_font_size ); ?>px;
  }
  .jobwp-search-container .jobwp-search-item .submit-btn:hover {
    background-color: <?php esc_html_e( $jobwp_search_btn_bg_color_hvr ); ?>;
    color: <?php esc_html_e( $jobwp_search_btn_font_color_hvr ); ?>;
    border-color: <?php esc_html_e( $jobwp_search_btn_bg_color_hvr ); ?>;
  }
  /* Search Panel Ended */
  /* Job Item */
  .jobwp-listing-body-container .jobwp-item {
    border: 1px solid <?php esc_html_e( $jobwp_listing_item_border_color ); ?>;
    background-color: <?php esc_html_e( $jobwp_listing_item_bg_color ); ?>;
  }
  /* Job Listing */
  .jobwp-item .jobwp-job-title a.jobwp-job-title-a {
    color: <?php esc_html_e( $jobwp_listing_title_font_color ); ?>;
    font-size: <?php esc_html_e( $jobwp_listing_title_font_size ); ?>px;
    line-height: <?php esc_html_e( $jobwp_listing_title_font_size + 10 ); ?>px;
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
  /* Pagination */
  .jobwp-pagination .page-numbers li a {
    color: <?php esc_html_e( $jobwp_pagination_font_color ); ?>;
    border: 1px solid <?php esc_html_e( $jobwp_pagination_border_color ); ?>;
  }
  div.jobwp-pagination>ul.page-numbers>li:hover,
  div.jobwp-pagination>ul.page-numbers>li>a.page-numbers:hover {
      background: <?php esc_html_e( $jobwp_hover_bg_color ); ?>;
      color: #FFF;
  }
</style>