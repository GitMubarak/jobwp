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
  .jobwp-item .jobwp-job-title,
  .jobwp-item .jobwp-job-title a.jobwp-job-title-a {
    color: <?php esc_html_e( $jobwp_listing_title_font_color ); ?>;
    font-size: <?php esc_html_e( $jobwp_listing_title_font_size ); ?>px;
    line-height: <?php esc_html_e( $jobwp_listing_title_font_size + 10 ); ?>px;
  }
  /* Job overview */
  .jobwp-item p.jobwp-overview-excerpt,
  .jobwp-item .jobwp-top .jobwp-top-left p {
    color: <?php esc_html_e( $jobwp_listing_overview_font_color ); ?>;
    font-size: <?php esc_html_e( $jobwp_listing_overview_font_size ); ?>px;
  }
  /* Job info */
  .jobwp-item .jobwp-bottom .jobwp-list-bottom-item i.fa,
  .jobwp-item .jobwp-bottom .jobwp-list-bottom-item i.fa-solid,
  .jobwp-item .jobwp-bottom .jobwp-list-bottom-item strong.primary-color,
  .jobwp-listing-body-container .jobwp-item .jobwp-list-info-wrapper .jobwp-list-info-item .jobwp-list-bottom-item i.fa,
  .jobwp-listing-body-container .jobwp-item .jobwp-list-info-wrapper .jobwp-list-info-item .jobwp-list-bottom-item i.fa-solid,
  .jobwp-listing-body-container .jobwp-item .jobwp-list-info-wrapper .jobwp-list-info-item .jobwp-list-bottom-item strong.primary-color {
    color: <?php esc_html_e( $jobwp_listing_info_font_color ); ?>;
    font-size: <?php esc_html_e( $jobwp_listing_info_font_size ); ?>px;
  }
  /* Read More */
  .jobwp-item .jobwp-top .jobwp-top-left a.jobwp-read-more {
    color: <?php esc_html_e( $jobwp_read_more_font_color ); ?>;
    background-color: <?php esc_html_e( $jobwp_read_more_bg_color ); ?>;
    font-size: <?php esc_html_e( $jobwp_read_more_font_size ); ?>px;
    border: <?php esc_html_e( $jobwp_read_more_border_width ); ?>px solid <?php esc_html_e( $jobwp_read_more_border_color ); ?>;
    padding: 3px 10px;
    border-radius: 3px;
  }
  /* Pagination */
  .jobwp-pagination .page-numbers li a.page-numbers {
    color: <?php esc_html_e( $jobwp_pagination_font_color ); ?>;
    border: 1px solid <?php esc_html_e( $jobwp_pagination_border_color ); ?>;
    background: <?php esc_html_e( $jobwp_pagination_bg_color ); ?>;
    font-size: <?php esc_html_e( $jobwp_pagination_font_size ); ?>px;
    border-radius: <?php esc_html_e( $jobwp_pagination_border_radius ); ?>px;
  }
  div.jobwp-pagination>ul.page-numbers>li:hover,
  div.jobwp-pagination>ul.page-numbers>li>a.page-numbers:hover {
      background: <?php esc_html_e( $jobwp_hover_bg_color ); ?>;
      color: <?php esc_html_e( $jobwp_hover_font_color ); ?>;
      border-radius: <?php esc_html_e( $jobwp_pagination_border_radius ); ?>px;
  }
  div.jobwp-pagination>ul.page-numbers>li>span.page-numbers.current {
    background: <?php esc_html_e( $jobwp_hover_bg_color ); ?>;
    color: <?php esc_html_e( $jobwp_hover_font_color ); ?>;
    border: 1px solid <?php esc_html_e( $jobwp_pagination_border_color ); ?>;
    font-size: <?php esc_html_e( $jobwp_pagination_font_size ); ?>px;
    border-radius: <?php esc_html_e( $jobwp_pagination_border_radius ); ?>px;
  }
  <?php
  if ( job_fs()->is_plan__premium_only('pro', true) ) {
    ?>
    .jobwp-item .jwb-list-comp-name {
      color: <?php esc_html_e( $jobwp_list_com_font_color ); ?>;
      font-size: <?php esc_html_e( $jobwp_list_com_font_size ); ?>px;
    }
    
    .jobwp-search-container .jobwp-search-item input[type="text"],
    .jobwp-search-container .jobwp-search-item select {
      border-radius: <?php esc_attr_e( $jobwp_search_item_border_radius ); ?>px;
    }
    <?php
  }
  ?>
</style>