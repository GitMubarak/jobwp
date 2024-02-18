<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( job_fs()->is_plan__premium_only('pro', true) ) {

    $jobwp_categories   = get_terms( array( 'taxonomy' => 'jobs_category', 'hide_empty' => true, 'order' => 'ASC',  'parent' => 0 ) );
    $jobwp_types        = get_terms( array( 'taxonomy' => 'jobs_nature', 'hide_empty' => true, 'order' => 'ASC',  'parent' => 0 ) );
    $jobwp_locations    = get_terms( array( 'taxonomy' => 'jobs_location', 'hide_empty' => true, 'order' => 'ASC',  'parent' => 0 ) );

    // Search Content
    $jobwpSearchContent = $this->jobwp_get_search_content_settings();
    foreach ( $jobwpSearchContent as $sc_name => $sc_value ) {
        if ( isset( $jobwpSearchContent[$sc_name] ) ) {
            ${"" . $sc_name} = $sc_value;
        }
    }

    // Search Styles
    $jobwpSearchStyles = $this->jobwp_get_search_styles_settings();
    foreach ( $jobwpSearchStyles as $ss_name => $ss_value ) {
        if ( isset( $jobwpSearchStyles[$ss_name] ) ) {
            ${"" . $ss_name} = $ss_value;
        }
    }

    // Shortcode Options
    $jobwp_search_url  = isset( $searchAttr['url'] ) ? $searchAttr['url'] : '';
    $jobwp_hide_search_keyword  = isset( $searchAttr['keyword'] ) ? $searchAttr['keyword'] : '';      // on/off to display
    $jobwp_hide_search_category = isset( $searchAttr['category'] ) ? $searchAttr['category'] : '';    // on/off to display
    $jobwp_hide_search_jobtype  = isset( $searchAttr['type'] ) ? $searchAttr['type'] : '';            // on/off to display
    $jobwp_hide_search_location = isset( $searchAttr['location'] ) ? $searchAttr['location'] : '';    // on/off to display

    $grid_template_columns_css = 'minmax(40%, auto)';

    if ( 'off' !== $jobwp_hide_search_category ) {
        $grid_template_columns_css .= ' minmax(auto, auto)';
    }

    if ( 'off' !== $jobwp_hide_search_jobtype ) {
        $grid_template_columns_css .= ' minmax(auto, auto)';
    }

    if ( 'off' !== $jobwp_hide_search_location ) {
        $grid_template_columns_css .= ' minmax(auto, auto)';
    }

    $grid_template_columns_css .= ' minmax(100px, 130px)';
    ?>
    <style type="text/css">
        .jobwp-search-container {
            background-color: <?php esc_html_e( $jobwp_search_container_bg_color ); ?>;
            border-color: <?php esc_html_e( $jobwp_search_container_border_color ); ?>;
            grid-template-columns: <?php esc_attr_e( $grid_template_columns_css ); ?>;
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
            max-width: 100%;
            width: 100%;
        }
        .jobwp-search-container .jobwp-search-item .submit-btn:hover {
            background-color: <?php esc_html_e( $jobwp_search_btn_bg_color_hvr ); ?>;
            color: <?php esc_html_e( $jobwp_search_btn_font_color_hvr ); ?>;
            border-color: <?php esc_html_e( $jobwp_search_btn_bg_color_hvr ); ?>;
        }
    </style>
    <form method="GET" action="<?php echo esc_url( home_url( '/' . $jobwp_search_url ) ); ?>" id="jobwp-search-form">

        <div class="jobwp-search-container">
            
            <?php
            if ( 'off' !== $jobwp_hide_search_keyword ) {
                ?>
                <div class="jobwp-search-item">
                    <input type="text" name="jobwp_title_s" placeholder="<?php esc_attr_e( $jobwp_search_keyword_ph ); ?>">
                </div>
                <?php
            }
            
            if ( 'off' !== $jobwp_hide_search_category ) {
                ?>
                <div class="jobwp-search-item">
                    <select id="jobwp_category_s" name="jobwp_category_s">
                        <option value=""><?php esc_attr_e( $jobwp_search_category_ph ); ?></option>
                        <?php
                        foreach ( $jobwp_categories as $job_category ) {
                            ?>
                            <option value="<?php esc_attr_e( $job_category->name ); ?>"><?php esc_html_e( $job_category->name ); ?></option>
                            <?php 
                        } 
                        ?>
                    </select>
                </div>
                <?php
            }

            if ( 'off' !== $jobwp_hide_search_jobtype ) {
                ?>
                <div class="jobwp-search-item">
                    <select id="jobwp_type_s" name="jobwp_type_s">
                        <option value=""><?php esc_attr_e( $jobwp_search_jobtype_ph ); ?></option>
                        <?php
                        foreach ( $jobwp_types as $jobwp_type ) {
                            ?>
                            <option value="<?php esc_attr_e( $jobwp_type->name ); ?>"><?php esc_html_e( $jobwp_type->name ); ?></option>
                            <?php 
                        } 
                        ?>
                    </select>
                </div>
                <?php
            }

            if ( 'off' !== $jobwp_hide_search_location ) {
                ?>
                <div class="jobwp-search-item">
                    <select id="jobwp_location_s" name="jobwp_location_s">
                        <option value=""><?php esc_attr_e( $jobwp_search_location_ph ); ?></option>
                        <?php
                        foreach ( $jobwp_locations as $job_location ) {
                            ?>
                            <option value="<?php esc_attr_e( $job_location->name ); ?>"><?php esc_html_e( $job_location->name ); ?></option>
                            <?php 
                        } 
                        ?>
                    </select>
                </div>
                <?php
            }
            ?>

            <div class="jobwp-search-item">
                <input type="submit" class="button submit-btn" value="<?php esc_attr_e( $jobwp_search_button_txt ); ?>">
            </div>
        
        </div>

    </form>
    <?php
}
?>