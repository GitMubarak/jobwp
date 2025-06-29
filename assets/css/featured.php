<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( job_fs()->is_plan__premium_only('pro', true) ) {
    ?>
    <style type="text/css">
        .slick-slide {
            margin-right: 16px;
        }
        .slick-dots li button {
            border: 1px solid <?php esc_html_e( $jobwp_listing_item_border_color ); ?>;
            background-color: <?php esc_html_e( $jobwp_listing_item_bg_color ); ?>;
            border-radius: 50%;
        }
        .slick-prev, .slick-next {
            border: 1px solid #000;
            background: #000;
            color: #fff;
            padding: 5px;
            height: 40px;
            width: 40px;
            z-index: 999;
        }
        .slick-prev:hover, 
        .slick-next:hover,
        .slick-prev:focus, 
        .slick-next:focus {
            background: #555;
        }
        .jobwp-featured-wrapper-slide {
            min-height: 100px;
            width: 100%;
            max-width: 1000px;
            margin: 0 auto;
            padding-left: 15px;
        }
        .jobwp-featured-wrapper-slide .jobwp-featured-slide-item {
            border: 1px solid <?php esc_html_e( $jobwp_listing_item_border_color ); ?>;
            background-color: <?php esc_html_e( $jobwp_listing_item_bg_color ); ?>;
            box-shadow: 0px 2px 2px <?php esc_html_e( $jobwp_listing_item_border_color ); ?>;
            border-radius: 3px;
            display: block;
            min-height: 100px;
            position: relative;
            width: 100%;
            padding: 10px;
        }
        .jobwp-featured-wrapper-slide .jobwp-featured-slide-item .jobwp-featured-slide-img {
            height: 50px;
        }
        .jobwp-featured-wrapper-slide .jobwp-featured-slide-item .jobwp-featured-slide-img img {
            height: 100%;
            width: auto;
        }
        .jobwp-featured-wrapper-slide .jobwp-featured-slide-item .jobwp-featured-title {
            margin: 0;
            padding: 0;
            margin-top: 15px;
            line-height: 18px;
        }

        .jobwp-featured-wrapper-slide .jobwp-featured-slide-item .jobwp-featured-title a.jobwp-featured-title-a {
            font-size: <?php esc_html_e( $jobwp_listing_title_font_size ); ?>px;
            line-height: <?php esc_html_e( $jobwp_listing_title_font_size + 10 ); ?>px;
            font-weight: 600;
            text-decoration: none;
            color: <?php esc_html_e( $jobwp_listing_title_font_color ); ?>;
            margin: 0;
            padding: 0;
        }
        .jobwp-featured-wrapper-slide .jobwp-featured-slide-item .jobwp-featured-title a.jobwp-featured-title-a:hover {
            color: #666;
        }
        .jobwp-featured-wrapper-slide .jobwp-featured-slide-item .jobwp-featured-comp-name {
            line-height: 26px;
            margin: 5px 0;
            font-weight: 600;
            color: <?php esc_html_e( $jobwp_list_com_font_color ); ?>;
            font-size: <?php esc_html_e( $jobwp_list_com_font_size ); ?>px;
        }
        .jobwp-featured-wrapper-slide .jobwp-featured-slide-item .jobwp-featured-overview,
        .jobwp-featured-wrapper-slide .jobwp-featured-slide-item .jobwp-featured-overview p {
            margin-top: 10px;
            color: <?php esc_html_e( $jobwp_listing_overview_font_color ); ?>;
            font-size: <?php esc_html_e( $jobwp_listing_overview_font_size ); ?>px;
        }
        .jobwp-featured-wrapper-slide .jobwp-featured-slide-item .jobwp-featured-meta {
            margin-top: 5px;
        }
        .jobwp-featured-wrapper-slide .jobwp-featured-slide-item .jobwp-featured-meta.experience {
            margin-top: 15px;
        }
        .jobwp-featured-wrapper-slide .jobwp-featured-slide-item .jobwp-featured-meta span,
        .jobwp-featured-wrapper-slide .jobwp-featured-slide-item .jobwp-featured-meta i.fa,
        .jobwp-featured-wrapper-slide .jobwp-featured-slide-item .jobwp-featured-meta i.fa-solid {
            display: inline-block;
            margin-left: 2px;
            color: <?php esc_html_e( $jobwp_listing_info_font_color ); ?>;
            font-size: <?php esc_html_e( $jobwp_listing_info_font_size ); ?>px;
        }
        .jobwp-featured-wrapper-slide .jobwp-featured-slide-item .jobwp-featured-meta span.jobwp-featured-meta-title {
            font-weight: 700;
        }
    </style>
    <?php
}
?>