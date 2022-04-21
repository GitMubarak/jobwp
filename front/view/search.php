<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<form method="GET" action="<?php echo get_permalink( $post->ID ); ?>" id="jobwp-search-form">

    <div class="jobwp-search-container">
        
        <div class="jobwp-search-item">
            <input type="text" name="jobwp_title" placeholder="<?php _e( 'Keyword', JOBWP_TXT_DOMAIN ); ?>" value="<?php esc_attr_e( $jobwp_title ); ?>">
        </div>

        <div class="jobwp-search-item">
            <input type="submit" class="button submit-btn" value="<?php _e( 'Search Job', JOBWP_TXT_DOMAIN ); ?>">
        </div>

        <div class="jobwp-search-item">
            <a href="<?php echo get_permalink( $post->ID ); ?>" class="fa fa-refresh" id="jobwp-search-refresh"></a>
        </div>
    
    </div>

</form>