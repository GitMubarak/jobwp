<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Search Items
$jobwp_title_s      =  isset( $_GET['jobwp_title_s'] ) ? sanitize_text_field( $_GET['jobwp_title_s'] ) : '';
$jobwp_category_s   =  isset( $_GET['jobwp_category_s'] ) ? sanitize_text_field( $_GET['jobwp_category_s'] ) : '';
$jobwp_type_s       =  isset( $_GET['jobwp_type_s'] ) ? sanitize_text_field( $_GET['jobwp_type_s'] ) : '';
$jobwp_location_s   =  isset( $_GET['jobwp_location_s'] ) ? sanitize_text_field( $_GET['jobwp_location_s'] ) : '';

if ( job_fs()->is_plan__premium_only('pro', true) ) {
    $jobwp_level_s      =  isset( $_GET['jobwp_level_s'] ) ? sanitize_text_field( $_GET['jobwp_level_s'] ) : '';
}

// Search Query Ttitle
if ( '' != $jobwp_title_s ) {
    $jobwpQueryArrParams['s'] = $jobwp_title_s;
}

// Search Query Category
if ( '' !== $jobwp_category_s ) {
    $jobwpQueryArrParams['tax_query'][] = array(
        'taxonomy' => 'jobs_category',
        'field' => 'name',
        'terms' => urldecode( $jobwp_category_s )
    );
}

// Search Query Job Type
if ( '' !== $jobwp_type_s ) {
    $jobwpQueryArrParams['tax_query'][] = array(
        'taxonomy' => 'jobs_nature',
        'field' => 'name',
        'terms' => urldecode( $jobwp_type_s )
    );
}

// Search by location
if ( '' !== $jobwp_location_s ) {
    $jobwpQueryArrParams['tax_query'][] = array(
        'taxonomy' => 'jobs_location',
        'field' => 'name',
        'terms' => urldecode( $jobwp_location_s )
    );
}

if ( job_fs()->is_plan__premium_only('pro', true) ) {

    // Search by levels
    if ( '' !== $jobwp_level_s ) {
        $jobwpQueryArrParams['tax_query'][] = array(
            'taxonomy' => 'jobs_level',
            'field' => 'name',
            'terms' => urldecode( $jobwp_level_s )
        );
    }
}

$jobwp_categories   = get_terms( array( 'taxonomy' => 'jobs_category', 'hide_empty' => true, 'order' => 'ASC',  'parent' => 0 ) );
$jobwp_types        = get_terms( array( 'taxonomy' => 'jobs_nature', 'hide_empty' => true, 'order' => 'ASC',  'parent' => 0 ) );
$jobwp_locations    = get_terms( array( 'taxonomy' => 'jobs_location', 'hide_empty' => true, 'order' => 'ASC',  'parent' => 0 ) );

$search_item_arr = [];

for ( $sia=1; $sia<6; $sia++ ) {

    if ( $sia == $jobwp_search_title_order ) {
        $search_item_arr[] = 'title';
    }
    if ( $sia == $jobwp_search_category_order ) {
        $search_item_arr[] = 'category';
    }
    if ( $sia == $jobwp_search_type_order ) {
        $search_item_arr[] = 'type';
    }
    if ( $sia == $jobwp_search_location_order ) {
        $search_item_arr[] = 'location';
    }

    if ( job_fs()->is_plan__premium_only('pro', true) ) {

        if ( $sia == $jobwp_search_level_order ) {
            $search_item_arr[] = 'level';
        }
    }
}
//echo '<pre>';
//print_r( $search_item_arr );
?>
<form method="GET" action="<?php echo get_permalink( $post->ID ); ?>" id="jobwp-search-form">
    <div class="jobwp-search-container"> 
        <?php
        foreach ( $search_item_arr as $searchItem ) {

            // title
            if ( 'title' === $searchItem ) {
                if ( ! $jobwp_hide_search_keyword ) {
                    ?>
                    <div class="jobwp-search-item">
                        <input type="text" name="jobwp_title_s" placeholder="<?php esc_attr_e( $jobwp_search_keyword_ph ); ?>" value="<?php esc_attr_e( $jobwp_title_s ); ?>">
                    </div>
                    <?php
                }
            }
            
            // category
            if ( 'category' === $searchItem ) {
                if ( ! $jobwp_hide_search_category ) {
                    ?>
                    <div class="jobwp-search-item">
                        <select id="jobwp_category_s" name="jobwp_category_s">
                            <option value=""><?php esc_attr_e( $jobwp_search_category_ph ); ?></option>
                            <?php
                            foreach ( $jobwp_categories as $job_category ) {
                                ?>
                                <option value="<?php esc_attr_e( $job_category->name ); ?>" <?php selected( htmlspecialchars($jobwp_category_s), $job_category->name ); ?> ><?php esc_html_e( $job_category->name ); ?></option>
                                <?php 
                            } 
                            ?>
                        </select>
                    </div>
                    <?php
                }
            }

            // type
            if ( 'type' === $searchItem ) {
                if ( ! $jobwp_hide_search_jobtype ) {
                    ?>
                    <div class="jobwp-search-item">
                        <select id="jobwp_type_s" name="jobwp_type_s">
                            <option value=""><?php esc_attr_e( $jobwp_search_jobtype_ph ); ?></option>
                            <?php
                            foreach ( $jobwp_types as $jobwp_type ) {
                                ?>
                                <option value="<?php esc_attr_e( $jobwp_type->name ); ?>" <?php echo ( $jobwp_type_s == $jobwp_type->name ) ? 'Selected' : ''; ?>><?php esc_html_e( $jobwp_type->name ); ?></option>
                                <?php 
                            } 
                            ?>
                        </select>
                    </div>
                    <?php
                }
            }

            // location
            if ( 'location' === $searchItem ) {
                if ( ! $jobwp_hide_search_location ) {
                    ?>
                    <div class="jobwp-search-item">
                        <select id="jobwp_location_s" name="jobwp_location_s">
                            <option value=""><?php esc_attr_e( $jobwp_search_location_ph ); ?></option>
                            <?php
                            foreach ( $jobwp_locations as $job_location ) {
                                ?>
                                <option value="<?php esc_attr_e( $job_location->name ); ?>" <?php echo ( $jobwp_location_s == $job_location->name ) ? 'Selected' : ''; ?>><?php esc_html_e( $job_location->name ); ?></option>
                                <?php 
                            } 
                            ?>
                        </select>
                    </div>
                    <?php
                }
            }

            // Search items for Pro users
            if ( job_fs()->is_plan__premium_only('pro', true) ) {

                // level
                if ( 'level' === $searchItem ) {
                    if ( ! $jobwp_hide_search_level ) {

                        $jobwp_levels = get_terms( array( 'taxonomy' => 'jobs_level', 'hide_empty' => true, 'order' => 'ASC',  'parent' => 0 ) );
                        ?>
                        <div class="jobwp-search-item">
                            <select id="jobwp_level_s" name="jobwp_level_s">
                                <option value=""><?php esc_attr_e( $jobwp_search_level_ph ); ?></option>
                                <?php
                                foreach ( $jobwp_levels as $level ) {
                                    ?>
                                    <option value="<?php esc_attr_e( $level->name ); ?>" <?php echo ( $jobwp_level_s == $level->name ) ? 'Selected' : ''; ?>><?php esc_html_e( $level->name ); ?></option>
                                    <?php 
                                } 
                                ?>
                            </select>
                        </div>
                        <?php
                    }
                }
            }
        }
        ?>

        <div class="jobwp-search-item">
            <input type="submit" class="button submit-btn" value="<?php esc_attr_e( $jobwp_search_button_txt ); ?>">
        </div>

        <div class="jobwp-search-item">
            <a href="<?php echo get_permalink( $post->ID ); ?>" class="fa fa-refresh" id="jobwp-search-refresh"></a>
        </div>
    
    </div>
</form>