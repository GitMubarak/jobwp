<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

include_once JOBWP_PATH . 'core/job_application.php';

/**
 * Master Class: Front
*/
class JobWp_Front 
{
	use Jobwp_Core, JobwpGeneralSettings, 
	Jobwp_Listing_Content_Settings, 
	Jobwp_Listing_Styles_Settings,
	Jobwp_Search_Content_Settings,
	Jobwp_Single_Content_Settings, 
	Jobwp_Single_Styles_Settings,
	Jobwp_ApplyForm_Content_Settings,
	Jobwp_ApplyForm_Style_Settings,
	Jobwp_Applicaiton;

	private $jobwp_version;

	function __construct( $version ) {

		$this->jobwp_version = $version;
		$this->jobwp_assets_prefix = substr(JOBWP_PRFX, 0, -1) . '-';
	}
	
	/**
	 * Function for loading front assets
	*/
	function jobwp_front_assets() {
		
		wp_enqueue_style(
            $this->jobwp_assets_prefix . 'font-awesome',
            JOBWP_ASSETS . 'css/fontawesome/css/all.min.css',
            array(),
            $this->jobwp_version,
            FALSE
        );

		wp_enqueue_style(	
			'izi-modal',
			JOBWP_ASSETS . 'css/iziModal.min.css',
			array(),
			$this->jobwp_version,
			FALSE 
		);

		wp_enqueue_style(	
			'jobwp-front',
			JOBWP_ASSETS . 'css/' . $this->jobwp_assets_prefix . 'front.css',
			array(),
			$this->jobwp_version,
			FALSE 
		);
		
		if ( ! wp_script_is( 'jquery' ) ) {
			wp_enqueue_script('jquery');
		}

		wp_enqueue_script(  
			'izi-modal',
			JOBWP_ASSETS . 'js/iziModal.min.js',
			array('jquery'),
			$this->jobwp_version,
			TRUE 
		);

		wp_enqueue_script(  
			'jobwp-front',
			JOBWP_ASSETS . 'js/' . $this->jobwp_assets_prefix . 'front.js',
			array('jquery'),
			$this->jobwp_version,
			TRUE 
		);
	}

	/**
	 * Function for loading shortcode
	*/
	function jobwp_load_shortcode() {

		add_shortcode( 'jobwp_listing', array( $this, 'jobwp_load_shortcode_view' ) );
		add_shortcode( 'jobwp_apply_form', array( $this, 'jobwp_load_shortcode_apply_now' ) );
	}

	/**
	 * Function for loading shortcode view
	*/
	function jobwp_load_shortcode_view( $jobwpAttr ) {

		$output = '';
		ob_start();
		include_once JOBWP_PATH . 'front/view/listing.php';
		$output .= ob_get_clean();
		return $output;
	}

	/**
	 * Function for loading shortcode apply now view
	*/
	function jobwp_load_shortcode_apply_now( $applyFrmAttr ) {

		$output = '';
		ob_start();
		include_once JOBWP_PATH . 'front/view/apply.php';
		$output .= ob_get_clean();
		return $output;
	}

	/**
	 * Function for loading Job Single Template
	*/
	function jobwp_single_template( $template ) {
		
		global $post;
		
		if ( 'jobs' === $post->post_type  ) {
			return JOBWP_PATH . 'front/view/single.php';
		}

		return $template;
	}
}
?>