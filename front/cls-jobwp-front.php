<?php
if ( ! defined('ABSPATH') ) exit;

/**
 * Class Front Master
*/
class JobWp_Front {

	private $jobwp_version;

	function __construct( $version ) {

		$this->jobwp_version = $version;
		$this->jobwp_assets_prefix = substr(JOBWP_PRFX, 0, -1) . '-';
	}
	
	/**
	 * Function for loading front assets
	*/
	function jobwp_front_assets() {
		
		wp_enqueue_style(	'jobwp-front',
							JOBWP_ASSETS . 'css/' . $this->jobwp_assets_prefix . 'front.css',
							array(),
							$this->jobwp_version,
							FALSE );
		
		if ( ! wp_script_is( 'jquery' ) ) {
			wp_enqueue_script('jquery');
		}

		wp_enqueue_script(  'jobwp-front',
							JOBWP_ASSETS . 'js/' . $this->jobwp_assets_prefix . 'front.js',
							array('jquery'),
							$this->jobwp_version,
							TRUE );
	}

	/**
	 * Function for loading shortcode
	*/
	function jobwp_load_shortcode() {

		add_shortcode( 'jobwp_display_jobs', array( $this, 'jobwp_load_shortcode_view' ) );
		add_shortcode( 'jobwp_apply_now', array( $this, 'jobwp_load_shortcode_apply_now' ) );
	}

	/**
	 * Function for loading shortcode view
	*/
	function jobwp_load_shortcode_view( $jobwpAttr ) {

		$output = '';
		ob_start();
		include_once JOBWP_PATH . 'front/view/' . $this->jobwp_assets_prefix . 'front-view.php';
		$output .= ob_get_clean();
		return $output;
	}

	/**
	 * Function for loading shortcode apply now view
	*/
	function jobwp_load_shortcode_apply_now( $jobwpAttr ) {

		$output = '';
		ob_start();
		include_once JOBWP_PATH . 'front/view/' . $this->jobwp_assets_prefix . 'apply-now.php';
		$output .= ob_get_clean();
		return $output;
	}

	/**
	 * Function for loading Job Single Template
	*/
	function jobwp_single_template( $template ) {
		
		global $post;
		
		if ( 'jobs' === $post->post_type  ) {
			return JOBWP_PATH . 'front/view/jobwp-single.php';
		}

		return $template;
	}
}
?>