<?php
if ( ! defined('ABSPATH') ) exit;


class JobWp_Master {

	protected $jobwp_loader;
	protected $jobwp_version;

	function __construct() {

		$this->jobwp_version = JOBWP_VERSION;
		$this->jobwp_load_dependencies();
		$this->jobwp_trigger_admin_hooks();
		$this->jobwp_trigger_front_hooks();
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
		
		$sqlTblExist = "DROP TABLE IF EXISTS $table_name";
		$wpdb->query( $sqlTblExist );
		
		if ($wpdb->get_var("SHOW TABLES LIKE '$table_name'") != $table_name) {
			//table not in database. Create new table
			$charset_collate = $wpdb->get_charset_collate();
			$sql = "CREATE TABLE $table_name (
					bs_job_id INT(11) NOT NULL AUTO_INCREMENT,
					bs_job_post_id INT(11) NOT NULL,
					bs_job_applied_for VARCHAR(155),
					bs_job_name VARCHAR(155) NOT NULL,
					bs_job_email VARCHAR(155) NOT NULL,
					bs_job_phone VARCHAR(55),
					bs_job_message TEXT,
					bs_job_resume_name VARCHAR(155) NOT NULL,
					bs_job_resume_path VARCHAR(255) NOT NULL,
					bs_job_datetime DATETIME,
					PRIMARY KEY (`bs_job_id`)
			) $charset_collate;";
			require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
			dbDelta($sql);
		}
	}
}