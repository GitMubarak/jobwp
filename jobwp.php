<?php
/**
 * Plugin Name:     JobWP: Job Manager Plugin
 * Plugin URI:		http://wordpress.org/plugins/jobwp/
 * Description: 	A job manager plugin to display job listing in a career page.
 * Version:         1.0
 * Author:		    Hossni Mubarak
 * Author URI:	    https://hossnimubarak.com
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
$jobwp->jobwp_run();