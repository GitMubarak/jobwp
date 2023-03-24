<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

require_once JOBWP_PATH . 'core/core.php';
include_once JOBWP_PATH . 'core/general-settings.php';
include_once JOBWP_PATH . 'core/listing-content.php';
include_once JOBWP_PATH . 'core/listing-styles.php';
include_once JOBWP_PATH . 'core/single-content.php';
include_once JOBWP_PATH . 'core/single-styles.php';
include_once JOBWP_PATH . 'core/search-content.php';

/**
 * Class: Main
 */
class JobWp_Master {

	protected $jobwp_loader;
	protected $jobwp_version;

	function __construct() {

		$this->jobwp_version = JOBWP_VERSION;
		add_action( 'plugins_loaded', array( $this, 'jobwp_load_plugin_textdomain' ) );
		$this->jobwp_load_dependencies();
		$this->jobwp_trigger_admin_hooks();
		$this->jobwp_trigger_front_hooks();
	}

	function jobwp_load_plugin_textdomain() {
		load_plugin_textdomain( JOBWP_TXT_DOMAIN, FALSE, JOBWP_TXT_DOMAIN . '/languages/' );
	}

	private function jobwp_load_dependencies() {

		require_once JOBWP_PATH . 'admin/' . JOBWP_CLS_PRFX . 'admin.php';
		require_once JOBWP_PATH . 'front/' . JOBWP_CLS_PRFX . 'front.php';
		require_once JOBWP_PATH . 'inc/' . JOBWP_CLS_PRFX . 'loader.php';
		$this->jobwp_loader = new JobWp_Loader();
	}

	private function jobwp_trigger_admin_hooks() {

		$jobwp_admin = new JobWp_Admin( $this->jobwp_version() );
		$this->jobwp_loader->add_action('admin_enqueue_scripts', $jobwp_admin, JOBWP_PRFX . 'enqueue_assets');
		$this->jobwp_loader->add_action('admin_menu', $jobwp_admin, JOBWP_PRFX . 'admin_menu', 0);
		$this->jobwp_loader->add_action('init', $jobwp_admin, JOBWP_PRFX . 'custom_post_type', 0);
		$this->jobwp_loader->add_action('init', $jobwp_admin, JOBWP_PRFX . 'taxonomy', 0);
		$this->jobwp_loader->add_action('add_meta_boxes', $jobwp_admin, JOBWP_PRFX . 'metaboxes');
		$this->jobwp_loader->add_action('save_post', $jobwp_admin, JOBWP_PRFX . 'save_meta_value', 1, 1);
		$this->jobwp_loader->add_action('admin_init', $jobwp_admin, JOBWP_PRFX . 'flush_rewrite');
	}

	function jobwp_trigger_front_hooks() {

		$jobwp_front = new JobWp_Front( $this->jobwp_version() );
		$this->jobwp_loader->add_action('wp_enqueue_scripts', $jobwp_front, JOBWP_PRFX . 'front_assets');
		$this->jobwp_loader->add_filter('single_template', $jobwp_front, JOBWP_PRFX . 'single_template', 10);
		$jobwp_front->jobwp_load_shortcode();
	}

	function jobwp_run() {

		$this->jobwp_loader->jobwp_run();
	}

	function jobwp_version() {

		return $this->jobwp_version;
	}

	function jobwp_create_tables() {
		
		global $wpdb;
		
		$table_name = $wpdb->prefix . 'jobwp_applied';
		
		//$sqlTblExist = "DROP TABLE IF EXISTS $table_name";
		//$wpdb->query( $sqlTblExist );
		
		if ($wpdb->get_var("SHOW TABLES LIKE '$table_name'") != $table_name) {
			//table not in database. Create new table
			$charset_collate = $wpdb->get_charset_collate();
			$sql = "CREATE TABLE $table_name (
					job_id INT(11) NOT NULL AUTO_INCREMENT,
					job_post_id INT(11) NOT NULL,
					applied_for VARCHAR(155),
					applicant_name VARCHAR(155) NOT NULL,
					applicant_email VARCHAR(155) NOT NULL,
					applicant_phone VARCHAR(55),
					applicant_message TEXT,
					resume_name VARCHAR(155) NOT NULL,
					applied_on DATETIME,
					PRIMARY KEY (`job_id`)
			) $charset_collate;";
			require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
			dbDelta($sql);
		}
	}
}