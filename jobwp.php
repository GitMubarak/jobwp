<?php
/**
 * Plugin Name:     JobWP - Best Recruitment Plugin for WordPress
 * Plugin URI:		https://wordpress.org/plugins/jobwp/
 * Description: 	Best Recruitment Plugin for WordPress to display job listing in a career page.
 * Version:         1.0
 * Author:		    HM Plugin
 * Author URI:	    https://hmplugin.com
 * License:         GPL-2.0+
 * License URI:     http://www.gnu.org/licenses/gpl-2.0.txt
*/

if ( ! defined('ABSPATH') ) exit;

define('JOBWP_PATH', plugin_dir_path(__FILE__));
define('JOBWP_ASSETS', plugins_url('/assets/', __FILE__));
define('JOBWP_SLUG', plugin_basename(__FILE__));
define('JOBWP_PRFX', 'jobwp_');
define('JOBWP_CLS_PRFX', 'cls-jobwp-');
define('JOBWP_TXT_DOMAIN', 'jobwp');
define('JOBWP_VERSION', '1.0');

require_once JOBWP_PATH . 'inc/' . JOBWP_CLS_PRFX . 'master.php';
$jobwp = new JobWp_Master();
register_activation_hook(__FILE__, array($jobwp, JOBWP_PRFX . 'create_tables'));
$jobwp->jobwp_run();