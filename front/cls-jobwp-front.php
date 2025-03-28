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
	Jobwp_Search_Styles_Settings,
	Jobwp_Single_Content_Settings, 
	Jobwp_Single_Styles_Settings,
	Jobwp_ApplyForm_Content_Settings,
	Jobwp_ApplyForm_Style_Settings,
	Jobwp_Applicaiton;

	private $jobwp_version, $jobwp_assets_prefix;

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

		if ( job_fs()->is_plan__premium_only('pro', true) ) {

			wp_enqueue_style(
				'jobwp-slick', 
				JOBWP_ASSETS . 'css/slick.css',
				array(),
				$this->jobwp_version,
				FALSE 
			);

			wp_enqueue_style(
				'jobwp-slick-theme', 
				JOBWP_ASSETS . 'css/slick-theme.css',
				array(),
				$this->jobwp_version,
				FALSE 
			);

			wp_enqueue_style(
				'jobwp-intltel-input', 
				JOBWP_ASSETS . 'css/intlTelInput.min.css',
				array(),
				$this->jobwp_version,
				FALSE 
			);
		}

		wp_enqueue_style(	
			'jobwp-front',
			JOBWP_ASSETS . 'css/' . $this->jobwp_assets_prefix . 'front.css',
			array(),
			$this->jobwp_version,
			FALSE 
		);
		
		wp_enqueue_script( 'jobwp-recaptcha-script', 'https://www.google.com/recaptcha/api.js' );

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

		if ( job_fs()->is_plan__premium_only('pro', true) ) {
			
			wp_enqueue_script(
				'jobwp-slick',
				JOBWP_ASSETS . 'js/slick.min.js',
				'',
				'2.4.20',
				TRUE
			);

			wp_enqueue_script(
				'jobwp-intltel-input',
				JOBWP_ASSETS . 'js/intlTelInput.min.js',
				'',
				$this->jobwp_version,
				TRUE
			);
		}

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

		if ( job_fs()->is_plan__premium_only('pro', true) ) {
			add_shortcode( 'jobwp_search', array( $this, 'jobwp_load_search_view' ) );
			add_shortcode( 'jobwp_featured', array( $this, 'jobwp_load_featured_view' ) );
			add_shortcode( 'jobwp_single_job', array( $this, 'jobwp_load_single_job_view' ) );
		}
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

	function jobwp_add_ld_json() {

		global $post;
		
		if ( 'jobs' === $post->post_type  ) {
			include_once JOBWP_PATH . 'front/view/ld-json.php';
		}
	}

	/**
	 * Load Search Panel
	*/
	function jobwp_load_search_view( $searchAttr ) {

		$output = '';
		ob_start();
		include_once JOBWP_PATH . 'front/view/search-single.php';
		$output .= ob_get_clean();
		return $output;
	}

	/**
	 * Load Featured View
	*/
	function jobwp_load_featured_view( $attr ) {

		$output = '';
		ob_start();
		include_once JOBWP_PATH . 'front/view/featured.php';
		$output .= ob_get_clean();
		return $output;
	}

	/**
	 * Load Single Job View
	*/
	function jobwp_load_single_job_view( $attr ) {

		$output = '';
		ob_start();
		include_once JOBWP_PATH . 'front/view/single-job.php';
		$output .= ob_get_clean();
		return $output;
	}
}
?>