<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if ( ! function_exists( 'job_fs' ) ) {
    
    // Create a helper function for easy SDK access.
    function job_fs() {

        global $job_fs;

        if ( ! isset( $job_fs ) ) {
            // Include Freemius SDK.
            require_once JOBWP_PATH . '/freemius/start.php';

            $job_fs = fs_dynamic_init( array(
                'id'                  => '10190',
                'slug'                => 'jobwp',
                'type'                => 'plugin',
                'public_key'          => 'pk_e2d8d8f3056789d2b63d655f5f710',
                'is_premium'          => false,
                'premium_suffix'      => 'Professional',
                // If your plugin is a serviceware, set this option to false.
                'has_premium_version' => true,
                'has_addons'          => false,
                'has_paid_plans'      => true,
                'menu'                => array(
                    'slug'           => 'edit.php?post_type=jobs',
                ),
                // Set the SDK to work in a sandbox mode (for development & testing).
                // IMPORTANT: MAKE SURE TO REMOVE SECRET KEY BEFORE DEPLOYMENT.
                'secret_key'          => 'sk_h+^k.XyxKV=*f@+.h!z&<(2egHy.2',
            ) );
        }

        return $job_fs;
    }

    // Init Freemius.
    job_fs();

    // Signal that SDK was initiated.
    do_action( 'job_fs_loaded' );

    function job_fs_custom_connect_message_on_update(
        $message,
        $user_first_name,
        $plugin_title,
        $user_login,
        $site_link,
        $freemius_link
    ) {
        return sprintf(
            __( 'Hey %1$s' ) . ',<br>' .
            __( 'Please help us improve %2$s! If you opt-in, some data about your usage of %2$s will be sent to %5$s. If you skip this, that\'s okay! %2$s will still work just fine.', 'jobwp' ),
            $user_first_name,
            '<b>' . $plugin_title . '</b>',
            '<b>' . $user_login . '</b>',
            $site_link,
            $freemius_link
        );
    }

    job_fs()->add_filter('connect_message_on_update', 'job_fs_custom_connect_message_on_update', 10, 6);

    function job_fs_support_forum_url( $wp_support_url ) {
        return 'https://wordpress.org/support/plugin/jobwp/';
    }

    job_fs()->add_filter( 'support_forum_url', 'job_fs_support_forum_url' );

    function job_fs_uninstall_cleanup() {

		global $wpdb;
	
		$tbl = $wpdb->prefix . 'options';
		$search_string = JOBWP_PRFX .'%';
		
		$sql = $wpdb->prepare( "SELECT option_name FROM $tbl WHERE option_name LIKE %s", $search_string );
		$options = $wpdb->get_results( $sql , OBJECT );
	
		if ( is_array( $options ) && count( $options ) ) {
			
			foreach ( $options as $option ) {
				delete_option( $option->option_name );
				delete_site_option( $option->option_name );
			}
		}

	}
    job_fs()->add_action('after_uninstall', 'job_fs_uninstall_cleanup');
}