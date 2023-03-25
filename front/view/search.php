<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Search Items
$jobwp_title_s      =  isset( $_GET['jobwp_title_s'] ) ? sanitize_text_field( $_GET['jobwp_title_s'] ) : '';
$jobwp_category_s   =  isset( $_GET['jobwp_category_s'] ) ? sanitize_text_field( $_GET['jobwp_category_s'] ) : '';
$jobwp_type_s       =  isset( $_GET['jobwp_type_s'] ) ? sanitize_text_field( $_GET['jobwp_type_s'] ) : '';
$jobwp_location_s   =  isset( $_GET['jobwp_location_s'] ) ? sanitize_text_field( $_GET['jobwp_location_s'] ) : '';

// Search Query Ttitle
if ( '' != $jobwp_title_s ) {
    $jobwpQueryArrParams['s'] = $jobwp_title_s;
}

// Search Query Category
if ( '' !== $jobwp_category_s ) {
    $jobwpQueryArrParams['tax_query'] = array(
        array(
            'taxonomy' => 'jobs_category',
            'field' => 'name',
            'terms' => urldecode ( $jobwp_category_s )
        )
    );
}

// Search Query Job Type
if ( '' !== $jobwp_type_s ) {
    $jobwpQueryArrParams['tax_query'] = array(
        array(
            'taxonomy' => 'jobs_nature',
            'field' => 'name',
            'terms' => urldecode ( $jobwp_type_s )
        )
    );
}

// Search by location
if ( '' !== $jobwp_location_s ) {
    $jobwpQueryArrParams['tax_query'] = array(
        array(
            'taxonomy' => 'jobs_location',
            'field' => 'name',
            'terms' => urldecode ( $jobwp_location_s )
        )
    );
}

$jobwp_categories   = get_terms( array( 'taxonomy' => 'jobs_category', 'hide_empty' => true, 'order' => 'ASC',  'parent' => 0 ) );
$jobwp_types        = get_terms( array( 'taxonomy' => 'jobs_nature', 'hide_empty' => true, 'order' => 'ASC',  'parent' => 0 ) );
$jobwp_locations    = get_terms( array( 'taxonomy' => 'jobs_location', 'hide_empty' => true, 'order' => 'ASC',  'parent' => 0 ) );
?>
<form method="GET" action="<?php echo get_permalink( $post->ID ); ?>" id="jobwp-search-form">

    <div class="jobwp-search-container">
        
        <?php
        if ( ! $jobwp_hide_search_keyword ) {
            ?>
            <div class="jobwp-search-item">
                <input type="text" name="jobwp_title_s" placeholder="<?php esc_attr_e( $jobwp_search_keyword_ph ); ?>" value="<?php esc_attr_e( $jobwp_title_s ); ?>">
            </div>
            <?php
        }
        
        if ( ! $jobwp_hide_search_category ) {
            ?>
            <div class="jobwp-search-item">
                <select id="jobwp_category_s" name="jobwp_category_s">
                    <option value=""><?php esc_attr_e( $jobwp_search_category_ph ); ?></option>
                    <?php
                    foreach ( $jobwp_categories as $job_category ) {
                        ?>
                        <option value="<?php esc_attr_e( $job_category->name ); ?>" <?php echo ( $jobwp_category_s == $job_category->name ) ? 'Selected' : ''; ?>><?php esc_html_e( $job_category->name ); ?></option>
                        <?php 
                    } 
                    ?>
                </select>
            </div>
            <?php
        }

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
        ?>

        <div class="jobwp-search-item">
            <input type="submit" class="button submit-btn" value="<?php esc_attr_e( $jobwp_search_button_txt ); ?>">
        </div>

        <div class="jobwp-search-item">
            <a href="<?php echo get_permalink( $post->ID ); ?>" class="fa fa-refresh" id="jobwp-search-refresh"></a>
        </div>
    
    </div>

</form>