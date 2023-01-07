<?php
/**
 * Plugin Name:         JobWP
 * Plugin URI:		    https://wordpress.org/plugins/jobwp/
 * Description: 	    Display job listings in a career page and allow users to apply directly to your site.
 * Version:             1.6
 * Author:		        HM Plugin
 * Author URI:	        https://hmplugin.com
 * Requires at least:   5.2
 * Requires PHP:        7.2
 * Tested up to:        6.1.1
 * Text Domain:         jobwp
 * Domain Path:         /languages/
 * License:             GPL-2.0+
 * License URI:         http://www.gnu.org/licenses/gpl-2.0.txt
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! function_exists( 'job_fs' ) ) {
    // Create a helper function for easy SDK access.
    function job_fs() {
        global $job_fs;

        if ( ! isset( $job_fs ) ) {
            // Include Freemius SDK.
            require_once dirname(__FILE__) . '/freemius/start.php';

            $job_fs = fs_dynamic_init( array(
                'id'                  => '10190',
                'slug'                => 'jobwp',
                'type'                => 'plugin',
                'public_key'          => 'pk_e2d8d8f3056789d2b63d655f5f710',
                'is_premium'          => false,
                'has_addons'          => false,
                'has_paid_plans'      => false,
                'menu'                => array(
                    'slug'           => 'edit.php?post_type=jobs',
                ),
            ) );
        }

        return $job_fs;
    }

    // Init Freemius.
    job_fs();
    // Signal that SDK was initiated.
    do_action( 'job_fs_loaded' );
}

define('JOBWP_PATH', plugin_dir_path(__FILE__));
define('JOBWP_ASSETS', plugins_url('/assets/', __FILE__));
define('JOBWP_SLUG', plugin_basename(__FILE__));
define('JOBWP_PRFX', 'jobwp_');
define('JOBWP_CLS_PRFX', 'cls-jobwp-');
define('JOBWP_TXT_DOMAIN', 'jobwp');
define('JOBWP_VERSION', '1.2');

require_once JOBWP_PATH . 'inc/' . JOBWP_CLS_PRFX . 'master.php';
$jobwp = new JobWp_Master();
register_activation_hook(__FILE__, array($jobwp, JOBWP_PRFX . 'create_tables'));
$jobwp->jobwp_run();

// rewrite_rules upon plugin activation
register_activation_hook( __FILE__, 'jobwp_myplugin_activate' );
function jobwp_myplugin_activate() {
	if ( ! get_option( 'jobwp_flush_rewrite_rules_flag' ) ) {
		add_option( 'jobwp_flush_rewrite_rules_flag', true );
	}
}

add_action( 'init', 'jobwp_flush_rewrite_rules_maybe', 10 );
function jobwp_flush_rewrite_rules_maybe() {
	if( get_option( 'jobwp_flush_rewrite_rules_flag' ) ) {
		flush_rewrite_rules();
		delete_option( 'jobwp_flush_rewrite_rules_flag' );
	}
}