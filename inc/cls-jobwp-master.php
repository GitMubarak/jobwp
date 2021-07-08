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
}