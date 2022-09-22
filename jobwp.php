<?php
/**
 * Plugin Name:         JobWP
 * Plugin URI:		    https://wordpress.org/plugins/jobwp/
 * Description: 	    Best Recruitment Plugin for WordPress to display job listing in a career page.
 * Version:             1.5
 * Author:		        HM Plugin
 * Author URI:	        https://hmplugin.com
 * Requires at least:   5.2
 * Requires PHP:        7.2
 * Tested up to:        6.0.2
 * Text Domain:         jobwp
 * Domain Path:         /languages/
 * License:             GPL-2.0+
 * License URI:         http://www.gnu.org/licenses/gpl-2.0.txt
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define('JOBWP_PATH', plugin_dir_path(__FILE__));
define('JOBWP_ASSETS', plugins_url('/assets/', __FILE__));
define('JOBWP_SLUG', plugin_basename(__FILE__));
define('JOBWP_PRFX', 'jobwp_');
define('JOBWP_CLS_PRFX', 'cls-jobwp-');
define('JOBWP_TXT_DOMAIN', 'jobwp');
define('JOBWP_VERSION', '1.5');

require_once JOBWP_PATH . 'inc/' . JOBWP_CLS_PRFX . 'master.php';
$jobwp = new JobWp_Master();
register_activation_hook(__FILE__, array($jobwp, JOBWP_PRFX . 'create_tables'));
$jobwp->jobwp_run();