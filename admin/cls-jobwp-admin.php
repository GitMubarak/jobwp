<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Master Class: Admin
*/
class JobWp_Admin 
{
	use Jobwp_Core, JobwpGeneralSettings, 
	Jobwp_Listing_Content_Settings, 
	Jobwp_Listing_Styles_Settings,
	Jobwp_Search_Content_Settings,
	Jobwp_Search_Styles_Settings,
	Jobwp_Single_Content_Settings, 
	Jobwp_Single_Styles_Settings, 
	Jobwp_Email_Settings,
	Jobwp_ApplyForm_Content_Settings,
	Jobwp_ApplyForm_Style_Settings;

	private $jobwp_version;
	private $jobwp_assets_prefix;

	function __construct( $version ) {

		$this->jobwp_version = $version;
		$this->jobwp_assets_prefix = substr( JOBWP_PRFX, 0, -1 ) . '-';
	}

	/**
	 *	Function For Loading Admin Assets
	 */
	function jobwp_enqueue_assets() {

		wp_enqueue_style(
            $this->jobwp_assets_prefix . 'font-awesome',
            JOBWP_ASSETS . 'css/fontawesome/css/all.min.css',
            array(),
            $this->jobwp_version,
            FALSE
        );

		wp_enqueue_style( 'wp-color-picker');
		wp_enqueue_script( 'wp-color-picker');

		wp_enqueue_style(
			$this->jobwp_assets_prefix . 'admin',
			JOBWP_ASSETS . 'css/' . $this->jobwp_assets_prefix . 'admin.css',
			array(),
			$this->jobwp_version,
			FALSE
		);

		wp_enqueue_style(
			'jquery-ui',
			JOBWP_ASSETS . 'css/jquery-ui.css',
			array(),
			$this->jobwp_version,
			FALSE
		);

		if ( ! wp_script_is('jquery') ) {
			wp_enqueue_script('jquery');
		}
		
		wp_enqueue_script('jquery-ui-datepicker');

		if ( job_fs()->is_plan__premium_only('pro') ) {
			wp_enqueue_media();
		}

		wp_register_script( 'jobwp-table-to-excel', 'https://cdn.jsdelivr.net/gh/linways/table-to-excel@v1.0.4/dist/tableToExcel.js' , '', '', true );
		wp_enqueue_script( 'jobwp-table-to-excel' );
		
		wp_enqueue_script(
			$this->jobwp_assets_prefix . 'admin',
			JOBWP_ASSETS . 'js/' . $this->jobwp_assets_prefix . 'admin.js',
			array('jquery'),
			$this->jobwp_version,
			TRUE
		);
	}

	/**
	 *	Function For Loading Admin Menu
	 */
	function jobwp_admin_menu() {

		$jobwp_cpt_menu = 'edit.php?post_type=jobs';

		add_submenu_page(
			$jobwp_cpt_menu,
			__('General Settings', 'jobwp'),
			__('General Settings', 'jobwp'),
			'edit_others_posts',
			'jobwp-general-settings',
			array($this, 'jobwp_general_settings')
		);

		add_submenu_page(
			$jobwp_cpt_menu,
			__('Listing Page Settings', 'jobwp'),
			__('Listing Page Settings', 'jobwp'),
			'edit_others_posts',
			'jobwp-listing-settings',
			array($this, 'jobwp_listing_settings')
		);

		add_submenu_page(
			$jobwp_cpt_menu,
			__('Search Panel Settings', 'jobwp'),
			__('Search Panel Settings', 'jobwp'),
			'edit_others_posts',
			'jobwp-search-settings',
			array($this, JOBWP_PRFX . 'search_settings')
		);

		add_submenu_page(
			$jobwp_cpt_menu,
			__('Detail Page Settings', 'jobwp'),
			__('Detail Page Settings', 'jobwp'),
			'edit_others_posts',
			'jobwp-single-settings',
			array($this, JOBWP_PRFX . 'single_settings')
		);

		add_submenu_page(
			$jobwp_cpt_menu,
			__('Email Settings', 'jobwp'),
			__('Email Settings', 'jobwp'),
			'edit_others_posts',
			'jobwp-email-settings',
			array($this, 'jobwp_email_settings')
		);
		
		add_submenu_page(
			$jobwp_cpt_menu,
			__('Apply Form', 'jobwp'),
			__('Apply Form', 'jobwp'),
			'edit_others_posts',
			'jobwp-apply-form-settings',
			array($this, JOBWP_PRFX . 'apply_form')
		);

		add_submenu_page(
			$jobwp_cpt_menu,
			__('Application List', 'jobwp'),
			__('Application List', 'jobwp'),
			'edit_others_posts',
			'jobwp-application-list',
			array($this, JOBWP_PRFX . 'application_list')
		);
	}

	/**
	 *	Function For Loading Listing Settings Page
	 */
	function jobwp_general_settings() {

		if ( ! current_user_can( 'edit_others_posts' ) ) {
			return;
		}

		$jobwpGeneralMessage = false;

		if ( isset( $_POST['updateGeneralSettings'] ) ) {
			if ( ! isset( $_POST['jobwp_general_nonce_field'] ) 
				|| ! wp_verify_nonce( $_POST['jobwp_general_nonce_field'], 'jobwp_general_action_filed' ) ) {
				print 'Sorry, your nonce did not verify.';
				exit;
			} else {
				$jobwpGeneralMessage = $this->jobwp_set_general_settings( $_POST );
			}
		}

		$jobwpGeneralSettings = $this->jobwp_get_general_settings();

		require_once JOBWP_PATH . 'admin/view/general.php';
	}

	/**
	 *	Function For Loading Listing Settings Page
	 */
	function jobwp_listing_settings() {

		if ( ! current_user_can( 'edit_others_posts' ) ) {
			return;
		}
	
		$jobwpTab = isset( $_GET['tab'] ) ? sanitize_text_field( $_GET['tab'] ) : null;

		$jobwpListingMessage = false;

		// Content
		if ( isset( $_POST['updateListingContent'] ) ) {
			if ( ! isset( $_POST['jobwp_listing_content_nonce'] ) 
				|| ! wp_verify_nonce( $_POST['jobwp_listing_content_nonce'], 'jobwp_listing_content_action' ) ) {
				print 'Sorry, your nonce did not verify.';
				exit;
			} else {
				$jobwpListingMessage = $this->jobwp_set_listing_content_settings( $_POST );
			}
		}

		$jobwpListingContent = $this->jobwp_get_listing_content_settings();

		// Style
		if ( isset( $_POST['updateListingStyles'] ) ) {
			if ( ! isset( $_POST['jobwp_listing_styles_nonce'] ) 
				|| ! wp_verify_nonce( $_POST['jobwp_listing_styles_nonce'], 'jobwp_listing_styles_action' ) ) {
				print 'Sorry, your nonce did not verify.';
				exit;
			} else {
				$jobwpListingMessage = $this->jobwp_set_listing_styles_settings( $_POST );
			}
		}

        $jobwpListingStyles = $this->jobwp_get_listing_styles_settings();

		require_once JOBWP_PATH . 'admin/view/listing.php';
	}

	/**
	 *	Search Settings Page
	 */
	function jobwp_search_settings() {

		if ( ! current_user_can( 'edit_others_posts' ) ) {
			return;
		}
	
		$jobwpTab = isset( $_GET['tab'] ) ? sanitize_text_field( $_GET['tab'] ) : null;

		$jobwpSearchMessage = false;

		// Content
		if ( isset( $_POST['updateSearchContent'] ) ) {
			if ( ! isset( $_POST['jobwp_search_content_nonce'] ) 
				|| ! wp_verify_nonce( $_POST['jobwp_search_content_nonce'], 'jobwp_search_content_action' ) ) {
				print 'Sorry, your nonce did not verify.';
				exit;
			} else {
				$jobwpSearchMessage = $this->jobwp_set_search_content_settings( $_POST );
			}
		}

		// Style
		if ( isset( $_POST['updateSearchStyles'] ) ) {
			if ( ! isset( $_POST['jobwp_search_style_nonce'] ) 
				|| ! wp_verify_nonce( $_POST['jobwp_search_style_nonce'], 'jobwp_search_style_action' ) ) {
				print 'Sorry, your nonce did not verify.';
				exit;
			} else {
				$jobwpSearchMessage = $this->jobwp_set_search_styles_settings( $_POST );
			}
		}

		$jobwpSearchContent = $this->jobwp_get_search_content_settings();
		$jobwpSearchStyles = $this->jobwp_get_search_styles_settings();

		require_once JOBWP_PATH . 'admin/view/search.php';
	}

	function jobwp_single_settings() {

		if ( ! current_user_can( 'edit_others_posts' ) ) {
			return;
		}
	
		$jobwpTab = isset( $_GET['tab'] ) ? sanitize_text_field( $_GET['tab'] ) : null;

		$jobwpSingleMessage = false;

		// Content
		if ( isset( $_POST['updateSingleContent'] ) ) {
			if ( ! isset( $_POST['jobwp_single_content_nonce'] ) 
				|| ! wp_verify_nonce( $_POST['jobwp_single_content_nonce'], 'jobwp_single_content_action' ) ) {
				print 'Sorry, your nonce did not verify.';
				exit;
			} else {
				$jobwpSingleMessage = $this->jobwp_set_single_content_settings( $_POST );
			}
		}

		$jobwpSingleContent = $this->jobwp_get_single_content_settings();

		// Style
		if ( isset( $_POST['updateSingleStyles'] ) ) {
			if ( ! isset( $_POST['jobwp_single_style_nonce'] ) 
				|| ! wp_verify_nonce( $_POST['jobwp_single_style_nonce'], 'jobwp_single_style_action' ) ) {
				print 'Sorry, your nonce did not verify.';
				exit;
			} else {
				$jobwpSingleMessage = $this->jobwp_set_single_styles_settings( $_POST );
			}
		}

        $jobwpSingleStyles = $this->jobwp_get_single_styles_settings();

		require_once JOBWP_PATH . 'admin/view/single.php';
	}

	function jobwp_email_settings() {

		if ( ! current_user_can( 'edit_others_posts' ) ) {
			return;
		}

		$jobwpEmailMessage = false;

		// Content
		if ( isset( $_POST['updateSettings'] ) ) {
			if ( ! isset( $_POST['jobwp_email_settings_nonce'] ) 
				|| ! wp_verify_nonce( $_POST['jobwp_email_settings_nonce'], 'jobwp_email_settings_action' ) ) {
				print 'Sorry, your nonce did not verify.';
				exit;
			} else {
				$jobwpEmailMessage = $this->jobwp_set_email_settings( $_POST );
			}
		}

		$jobwpEmailSettings = $this->jobwp_get_email_settings();

		require_once JOBWP_PATH . 'admin/view/email.php';
	}

	/**
	 *	Apply Form Settings Page
	 */
	function jobwp_apply_form() {

		if ( ! current_user_can( 'edit_others_posts' ) ) {
			return;
		}
	
		$jobwpTab = isset( $_GET['tab'] ) ? sanitize_text_field( $_GET['tab'] ) : null;

		$jobwpApplyFormMessage = false;

		// Content
		if ( isset( $_POST['updateApplyFormContent'] ) ) {
			if ( ! isset( $_POST['jobwp_apply_form_content_nonce'] ) 
				|| ! wp_verify_nonce( $_POST['jobwp_apply_form_content_nonce'], 'jobwp_apply_form_content_action' ) ) {
				print 'Sorry, your nonce did not verify.';
				exit;
			} else {
				$jobwpApplyFormMessage = $this->jobwp_set_apply_form_content_settings( $_POST );
			}
		}

		$jobwpApplyFormContent = $this->jobwp_get_apply_form_content_settings();

		// Style
		if ( isset( $_POST['updateApplyFormStyle'] ) ) {
			if ( ! isset( $_POST['jobwp_apply_form_style_nonce'] ) 
				|| ! wp_verify_nonce( $_POST['jobwp_apply_form_style_nonce'], 'jobwp_apply_form_style_action' ) ) {
				print 'Sorry, your nonce did not verify.';
				exit;
			} else {
				$jobwpApplyFormMessage = $this->jobwp_set_apply_form_style_settings( $_POST );
			}
		}

		$jobwpApplyFormStyle = $this->jobwp_get_apply_form_style_settings();

		require_once JOBWP_PATH . 'admin/view/apply-form.php';
	}

	/**
	 *	Function For Loading General Settings Page
	 */
	function jobwp_application_list() {

		if ( ! current_user_can( 'edit_others_posts' ) ) {
			return;
		}

		$jobwpColumns = array(
			'cb'                		=> __('Select All', 'jobwp'),
			'jobwp_list_sl'				=> '#',
			'jobwp_applied_for' 		=> __('Applied For', 'jobwp'),
			'jobwp_applicant_name'		=> __('Name', 'jobwp'),
			'jobwp_applicant_email'		=> __('Email', 'jobwp'),
			'jobwp_applicant_message'	=> __('Cover Letter', 'jobwp'),
			'jobwp_applicant_resume'	=> __('Resume', 'jobwp'),
			'jobwp_applied_on'			=> __('Date', 'jobwp')
		);

		if ( job_fs()->is_plan__premium_only('pro', true) ) {
			$jobwpColumns['jobwp_user_consent']	= __('User Consent', 'jobwp');
			$jobwpColumns['jobwp_intl_tel']	= __('Phone', 'jobwp');
		}

		$jobwpColumns['action']	= __('Action', 'jobwp');

		register_column_headers('jobwp-allication-table-column', $jobwpColumns);

		include_once JOBWP_PATH . 'admin/view/application_list.php';
	}

	/**
	 *	Function For Loading Jobs Custom Post Type
	 */
	function jobwp_custom_post_type() {

		$labels = array(
							'name'                => __('All Jobs', 'jobwp'),
							'singular_name'       => __('WP Jobs', 'jobwp'),
							'menu_name'           => __('WP Jobs', 'jobwp'),
							'parent_item_colon'   => __('Parent Job', 'jobwp'),
							'all_items'           => __('All Jobs', 'jobwp'),
							'view_item'           => __('View Job', 'jobwp'),
							'add_new_item'        => __('Add New Job', 'jobwp'),
							'add_new'             => __('Add New', 'jobwp'),
							'edit_item'           => __('Edit Job', 'jobwp'),
							'update_item'         => __('Update Job', 'jobwp'),
							'search_items'        => __('Search Job', 'jobwp'),
							'not_found'           => __('Not Found', 'jobwp'),
							'not_found_in_trash'  => __('Not found in Trash', 'jobwp')
						);
		$args = array(
						'label'               => __('jobs', 'jobwp'),
						'description'         => __('Description For Job', 'jobwp'),
						'labels'              => $labels,
						'supports'            => array('title', 'editor', 'page-attributes', 'thumbnail'),
						'public'              => true,
						'hierarchical'        => false,
						'show_ui'             => true,
						'show_in_menu'        => true,
						'show_in_nav_menus'   => true,
						'show_in_admin_bar'   => true,
						'has_archive'         => false,
						'can_export'          => true,
						'exclude_from_search' => false,
						'yarpp_support'       => true,
						//'taxonomies' 	      => array('post_tag'),
						'publicly_queryable'  => true,
						'capability_type'     => 'post',
						'menu_icon'           => 'dashicons-portfolio'
					);

		register_post_type('jobs', $args);
	}

	/**
	 *	Function For Loading Jobs Taxonomy
	 */
	function jobwp_taxonomy() {

		$category = array(
			'name' 				=> __('Job Categories', 'jobwp'),
			'singular_name' 	=> __('Job Category', 'jobwp'),
			'search_items' 		=> __('Search Job Categories', 'jobwp'),
			'all_items' 		=> __('All Job Categories', 'jobwp'),
			'parent_item' 		=> __('Parent Job Category', 'jobwp'),
			'parent_item_colon'	=> __('Parent Job Category:', 'jobwp'),
			'edit_item' 		=> __('Edit Job Category', 'jobwp'),
			'update_item' 		=> __('Update Job Category', 'jobwp'),
			'add_new_item' 		=> __('Add New Job Category', 'jobwp'),
			'new_item_name' 	=> __('New Job Category Name', 'jobwp'),
			'menu_name' 		=> __('Job Categories', 'jobwp'),
		);

		register_taxonomy('jobs_category', array('jobs'), array(
			'hierarchical' 		=> true,
			'labels' 			=> $category,
			'show_ui' 			=> true,
			'show_admin_column' => true,
			'query_var' 		=> true,
			'sort'				=> true,
			'rewrite' 			=> array('slug' => 'job-category'),
			'default_term'      => [ 
				'name' => 'Accounting & Finance',
				'slug' => 'accounting-finance',
				'description' => 'Accounting & Finance Jobs',
			],
		));

		$nature = array(
			'name' 				=> __('Job Nature', 'jobwp'),
			'singular_name' 	=> __('Job Nature', 'jobwp'),
			'search_items' 		=> __('Search Job Nature', 'jobwp'),
			'all_items' 		=> __('All Job Nature', 'jobwp'),
			'parent_item' 		=> __('Parent Job Nature', 'jobwp'),
			'parent_item_colon'	=> __('Parent Job Nature:', 'jobwp'),
			'edit_item' 		=> __('Edit Job Nature', 'jobwp'),
			'update_item' 		=> __('Update Job Nature', 'jobwp'),
			'add_new_item' 		=> __('Add New Job Nature', 'jobwp'),
			'new_item_name' 	=> __('New Job Nature Name', 'jobwp'),
			'menu_name' 		=> __('Job Nature', 'jobwp'),
		);

		register_taxonomy('jobs_nature', array('jobs'), array(
			'hierarchical' 		=> true,
			'labels' 			=> $nature,
			'show_ui' 			=> true,
			'show_admin_column' => true,
			'query_var' 		=> true,
			'sort'				=> true,
			'rewrite' 			=> array('slug' => 'job-nature'),
			'default_term'      => [ 
				'name' => 'Full Time',
				'slug' => 'full-time',
				'description' => 'Full Time Jobs',
			],
		));

		$position = array(
			'name' 				=> __('Job Level', 'jobwp'),
			'singular_name' 	=> __('Job Level', 'jobwp'),
			'search_items' 		=> __('Search Job Level', 'jobwp'),
			'all_items' 		=> __('All Job Level', 'jobwp'),
			'parent_item' 		=> __('Parent Job Level', 'jobwp'),
			'parent_item_colon'	=> __('Parent Job Level:', 'jobwp'),
			'edit_item' 		=> __('Edit Job Level', 'jobwp'),
			'update_item' 		=> __('Update Job Level', 'jobwp'),
			'add_new_item' 		=> __('Add New Job Level', 'jobwp'),
			'new_item_name' 	=> __('New Job Level Name', 'jobwp'),
			'menu_name' 		=> __('Job Level', 'jobwp'),
		);

		register_taxonomy('jobs_level', array('jobs'), array(
			'hierarchical' 		=> true,
			'labels' 			=> $position,
			'show_ui' 			=> true,
			'show_admin_column' => true,
			'query_var' 		=> true,
			'sort'				=> true,
			'rewrite' 			=> array('slug' => 'job-level'),
			'default_term'      => [ 
				'name' => 'Sr. Position',
				'slug' => 'sr-position',
				'description' => 'Sr. Position Jobs',
			],
		));

		$location = array(
			'name' 				=> __('Job Location', 'jobwp'),
			'singular_name' 	=> __('Job Location', 'jobwp'),
			'search_items' 		=> __('Search Job Location', 'jobwp'),
			'all_items' 		=> __('All Job Location', 'jobwp'),
			'parent_item' 		=> __('Parent Job Location', 'jobwp'),
			'parent_item_colon'	=> __('Parent Job Location:', 'jobwp'),
			'edit_item' 		=> __('Edit Job Location', 'jobwp'),
			'update_item' 		=> __('Update Job Location', 'jobwp'),
			'add_new_item' 		=> __('Add New Job Location', 'jobwp'),
			'new_item_name' 	=> __('New Job Location Name', 'jobwp'),
			'menu_name' 		=> __('Job Location', 'jobwp'),
		);

		register_taxonomy('jobs_location', array('jobs'), array(
			'hierarchical' 		=> true,
			'labels' 			=> $location,
			'show_ui' 			=> true,
			'show_admin_column' => true,
			'query_var' 		=> true,
			'sort'				=> true,
			'rewrite' 			=> array('slug' => 'job-location'),
		));

		if ( job_fs()->is_plan__premium_only('pro') ) {

			$company = array(
				'name' 				=> __('Job Company', 'jobwp'),
				'singular_name' 	=> __('Job Company', 'jobwp'),
				'search_items' 		=> __('Search Job Company', 'jobwp'),
				'all_items' 		=> __('All Job Company', 'jobwp'),
				'parent_item' 		=> __('Parent Job Company', 'jobwp'),
				'parent_item_colon'	=> __('Parent Job Company:', 'jobwp'),
				'edit_item' 		=> __('Edit Job Company', 'jobwp'),
				'update_item' 		=> __('Update Job Company', 'jobwp'),
				'add_new_item' 		=> __('Add New Job Company', 'jobwp'),
				'new_item_name' 	=> __('New Job Company Name', 'jobwp'),
				'menu_name' 		=> __('Job Company', 'jobwp'),
			);
	
			register_taxonomy('job_company', array('jobs'), array(
				'hierarchical' 		=> true,
				'labels' 			=> $company,
				'show_ui' 			=> true,
				'show_admin_column' => false,
				'query_var' 		=> true,
				'sort'				=> true,
				'rewrite' 			=> array('slug' => 'job-company'),
			));

		}
	}

	/**
	 *	Function For Loading Jobs Metaboxes
	 */
	function jobwp_metaboxes() {

		add_meta_box(
			'jobwp_metaboxes',
			__('Job Details:', 'jobwp'),
			array( $this, JOBWP_PRFX . 'metabox_content' ),
			'jobs',
			'normal',
			'high'
		);

		add_meta_box(
			'jobwp-metabox-responsibilities',
			__( 'Responsibilities / Roles', 'jobwp' ),
			array( $this, 'jobwp_metabox_responsibilities' ),
			'jobs',
			'normal',
			'high'
		);
	
		add_meta_box(
			'jobwp-metabox-skills',
			__( 'Skills Required:', 'jobwp' ),
			array( $this, 'jobwp_metabox_skills' ),
			'jobs',
			'normal',
			'high'
		);

		add_meta_box(
			'jobwp-metabox-educational-requirements',
			__( 'Educational Requirements:', 'jobwp' ),
			array( $this, 'jobwp_metabox_educational_requirements' ),
			'jobs',
			'normal',
			'high'
		);
	
		add_meta_box(
			'jobwp-metabox-additional-requirements',
			__( 'Additional Requirements:', 'jobwp' ),
			array( $this, 'jobwp_metabox_additional_requirements' ),
			'jobs',
			'normal',
			'high'
		);
	
		add_meta_box(
			'jobwp-metabox-salary',
			__( 'Salary:', 'jobwp' ),
			array( $this, 'jobwp_metaboxe_salary' ),
			'jobs',
			'normal',
			'high'
		);
	
		add_meta_box(
			'jobwp-metabox-benefits',
			__( 'Other Benefits:', 'jobwp' ),
			array( $this, 'jobwp_metabox_other_benefits' ),
			'jobs',
			'normal',
			'high'
		);
	}

	/**
	 *	Function For Loading Jobs Meta Content
	 */
	function jobwp_metabox_content() {
		
		global $post;

		wp_nonce_field( basename(__FILE__), 'jobwp_fields' );

		$jobwp_experience 		= get_post_meta( $post->ID, 'jobwp_experience', true );
		$jobwp_vacancies		= get_post_meta( $post->ID, 'jobwp_vacancies', true );
		$jobwp_nature 			= get_post_meta( $post->ID, 'jobwp_nature', true );
		$jobwp_level 			= get_post_meta( $post->ID, 'jobwp_level', true );
		$jobwp_location 		= get_post_meta( $post->ID, 'jobwp_location', true );
		$jobwp_edu_req 			= get_post_meta( $post->ID, 'jobwp_edu_req', true );
		$jobwp_deadline 		= get_post_meta( $post->ID, 'jobwp_deadline', true );
		$jobwp_status			= get_post_meta( $post->ID, 'jobwp_status', true );
		$jobwp_application_url	= get_post_meta( $post->ID, 'jobwp_application_url', true );
		$jobwp_company			= get_post_meta( $post->ID, 'jobwp_company', true );
		$jobwp_is_featured_job	= get_post_meta( $post->ID, 'jobwp_is_featured_job', true );

		include_once JOBWP_PATH . 'admin/view/partial/job-info.php';
	}

	function jobwp_metabox_responsibilities() {

		global $post;
			
		$jobwp_responsibilities	= get_post_meta( $post->ID, 'jobwp_responsibilities', true );
		$settings 				= array('media_buttons' => false, 'editor_height' => 200,);
		$content 				= wp_kses_post( $jobwp_responsibilities);
		$editor_id 				= 'jobwp_responsibilities';
		wp_editor( $content, $editor_id, $settings );
	}
	
	function jobwp_metabox_skills() {

		global $post;
			
		$jobwp_skills	= get_post_meta( $post->ID, 'jobwp_skills', true );
		$settings 		= array('media_buttons' => false, 'editor_height' => 200,);
		$content 		= wp_kses_post( $jobwp_skills);
		$editor_id 		= 'jobwp_skills';
		wp_editor( $content, $editor_id, $settings );
	}

	function jobwp_metabox_educational_requirements() {

		global $post;
			
		$jobwp_edu_req	= get_post_meta( $post->ID, 'jobwp_edu_req', true );
		$settings 		= array('media_buttons' => false, 'editor_height' => 200,);
		$content 		= wp_kses_post( $jobwp_edu_req);
		$editor_id 		= 'jobwp_edu_req';
		wp_editor( $content, $editor_id, $settings );
	}
	
	function jobwp_metabox_additional_requirements() {

		global $post;
			
		$jobwp_add_req	= get_post_meta( $post->ID, 'jobwp_add_req', true );
		$settings		= array('media_buttons' => false, 'editor_height' => 200,);
		$content 		= wp_kses_post( $jobwp_add_req);
		$editor_id 		= 'jobwp_add_req';
		wp_editor( $content, $editor_id, $settings );
	}
	
	function jobwp_metaboxe_salary() {

		global $post;
			
		$jobwp_salary	= get_post_meta( $post->ID, 'jobwp_salary', true );
		$settings 		= array('media_buttons' => false, 'editor_height' => 200,);
		$content 		= wp_kses_post( $jobwp_salary);
		$editor_id 		= 'jobwp_salary';
		wp_editor( $content, $editor_id, $settings );
	}
	
	function jobwp_metabox_other_benefits() {

		global $post;
			
		$jobwp_other_benefits	= get_post_meta( $post->ID, 'jobwp_other_benefits', true );
		$settings 				= array('media_buttons' => false, 'editor_height' => 200,);
		$content 				= wp_kses_post( $jobwp_other_benefits);
		$editor_id 				= 'jobwp_other_benefits';
		wp_editor( $content, $editor_id, $settings );
	}

	/**
	 *	Function For Saving Jobs Meta Data
	 */
	function jobwp_save_meta_value( $post_id ) {
		
		global $post;

		if ( ! current_user_can( 'edit_post', $post_id ) ) {
			return $post_id;
		}

		if ( ! isset( $_POST['jobwp_experience'] ) || ! wp_verify_nonce( $_POST['jobwp_fields'], basename(__FILE__) ) ) {
			return $post_id;
		}

		$jobwp_meta_params = array(

			'jobwp_experience'			=> isset( $_POST['jobwp_experience'] ) ? sanitize_text_field( $_POST['jobwp_experience'] ) : null,
			'jobwp_vacancies' 			=> isset( $_POST['jobwp_vacancies'] ) ? sanitize_text_field( $_POST['jobwp_vacancies'] ) : null,
			'jobwp_nature' 				=> isset( $_POST['jobwp_nature'] ) ? sanitize_text_field( $_POST['jobwp_nature'] ) : null,
			'jobwp_level' 				=> isset( $_POST['jobwp_level'] ) ? sanitize_text_field( $_POST['jobwp_level'] ) : null,
			'jobwp_location' 			=> isset( $_POST['jobwp_location'] ) ? sanitize_text_field( $_POST['jobwp_location'] ) : null,
			'jobwp_edu_req' 			=> isset( $_POST['jobwp_edu_req'] ) ? wp_kses_post( $_POST['jobwp_edu_req'] ) : null,
			'jobwp_deadline'			=> isset( $_POST['jobwp_deadline'] ) ? sanitize_text_field($_POST['jobwp_deadline']) : null,
			'jobwp_status'				=> isset( $_POST['jobwp_status'] ) ? sanitize_text_field( $_POST['jobwp_status'] ) : null,
			'jobwp_responsibilities'	=> isset( $_POST['jobwp_responsibilities'] ) ? wp_kses_post( $_POST['jobwp_responsibilities'] ) : null,
			'jobwp_skills'				=> isset( $_POST['jobwp_skills'] ) ? wp_kses_post( $_POST['jobwp_skills'] ) : null,
			'jobwp_add_req'				=> isset( $_POST['jobwp_add_req'] ) ? wp_kses_post( $_POST['jobwp_add_req'] ) : null,
			'jobwp_salary'				=> isset( $_POST['jobwp_salary'] ) ? wp_kses_post( $_POST['jobwp_salary'] ) : null,
			'jobwp_other_benefits'		=> isset( $_POST['jobwp_other_benefits'] ) ? wp_kses_post( $_POST['jobwp_other_benefits'] ) : null,
			'jobwp_application_url'		=> isset( $_POST['jobwp_application_url'] ) ? sanitize_url( $_POST['jobwp_application_url'] ) : '',
			'jobwp_company'				=> isset( $_POST['jobwp_company'] ) ? sanitize_text_field( $_POST['jobwp_company'] ) : null,
			'jobwp_is_featured_job'		=> isset( $_POST['jobwp_is_featured_job'] ) ? sanitize_text_field( $_POST['jobwp_is_featured_job'] ) : null,
		);

		foreach( $jobwp_meta_params as $key => $value ) {

			if ( 'revision' === $post->post_type ) {
				return;
			}

			if ( get_post_meta( $post_id, $key, false ) ) {

				update_post_meta( $post_id, $key, $value );
			} else {

				add_post_meta( $post_id, $key, $value );
			}

			if ( ! $value ) {

				delete_post_meta( $post_id, $key );
			}
		}
	}

	/**
	 *	Flush Rewrite on Plugin initialization
	 */
	function jobwp_flush_rewrite() {

		if ( get_option('jobwp_plugin_settings_have_changed') == true ) {
			flush_rewrite_rules();
			update_option('jobwp_plugin_settings_have_changed', false);
		}
	}

	/**
	 *	Function for loading notification on save / update
	 */
	function jobwp_display_notification( $type, $msg ) { 
		?>
		<div class="jobwp-alert <?php esc_attr_e( $type ); ?>">
			<span class="jobwp-closebtn">&times;</span>
			<strong><?php esc_html_e( ucfirst( $type ), 'jobwp' ); ?>!</strong>
			<?php esc_html_e( $msg, 'jobwp' ); ?>
		</div>
		<?php 
	}

	/**
	 * 
	 */
	private function jobwp_get_all_applications() {
		
		global $wpdb;
    	$table_name     = $wpdb->base_prefix . 'jobwp_applied';
		return $wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name WHERE %d ORDER BY job_id DESC", 1));
	}

	protected function jobwp_delete_single_application( $id ) {

		if ( ! current_user_can('edit_others_posts') ) {
			exit;
		}

		global $wpdb;
		$table_name = $wpdb->base_prefix . 'jobwp_applied';
		
		$resume = $wpdb->get_row( $wpdb->prepare("SELECT * FROM $table_name WHERE job_id = %d", $id), ARRAY_A);

		$success = $wpdb->query( $wpdb->prepare("DELETE FROM $table_name WHERE job_id = %d", $id) );

		if ( $success ) {
			$jobwpDir = wp_upload_dir();
			$jobwpDir = $jobwpDir['basedir'];
			$fileName = $jobwpDir . '/jobwp-resume/' . $resume['resume_name'];
			if ( file_exists( $fileName ) ) {
				unlink( $fileName );
			}
        	return __("Application has been deleted.", 'jobwp');
		}
	}

	function jobwp_export_applications_to_csv() {

		if ( ! current_user_can( 'manage_options' ) ) {
            return;
        }

		if ( job_fs()->is_plan__premium_only('pro', true) ) {

			if ( isset( $_POST['jobwp_download_csv'] ) ) {
				
				$applications = $this->jobwp_get_all_applications();

				$filename = 'applications-' . time() . '.csv';
				$data_rows = [];
				$row = [];
				$asl = 1;
				foreach ( $applications as $application ) {
					$row[0] = $asl;
					$row[1] = ( '' !== $application->applied_for ) ? sanitize_text_field( str_replace(",", ";", $application->applied_for) ) : '';
					$row[2] = ( '' !== $application->applicant_name ) ? sanitize_text_field( $application->applicant_name ) : '';
					$row[3] = ( '' !== $application->applicant_email ) ? sanitize_text_field( $application->applicant_email ) : '';
					$row[4] = ( '' !== $application->applicant_message ) ? sanitize_text_field( str_replace(",", ";", $application->applicant_message) ) : '';
					$row[5] = ( '' !== $application->applied_on ) ? date( 'D d M Y - h:i A', strtotime( sanitize_text_field( $application->applied_on ) ) ) : '';
					$row[6] = ( '' !== $application->resume_name ) ? sanitize_text_field( $application->resume_name ) : '';
					$row[7] = ( '' !== $application->user_consent ) ? sanitize_text_field( $application->user_consent ) : '';
					$row[8] = ( '' !== $application->intl_tel ) ? sanitize_text_field( $application->intl_tel ) : '';
					$data_rows[] = $row;
					$asl++;
				}

				header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
				header('Content-Description: File Transfer');
				header("Content-type: text/csv");
				header("Content-Disposition: attachment; filename={$filename}");
				header("Expires: 0");
				header("Pragma: public");
				printf( "%s,%s,%s,%s,%s,%s,%s,%s,%s", "SL", "Applied For", "Name", "Email", "Cover Letter", "Applied On", "Resume Link", "User Consent" , "Phone" );
				echo "\n";
				
				foreach ( $data_rows as $data ) {
					printf( "%d,%s,%s,%s,%s,%s,%s,%s,%s", $data[0], $data[1], $data[2], $data[3], $data[4], $data[5], $data[6], $data[7], $data[8] );
					echo "\n";
				}
				
				exit;
			}
		}
	}

	/**
	 * Company Extra Info Add Form
	 */
	function jobwp_job_company_add_form_fields( $taxonomy ) {
		?>
		<div class="form-field term-group">

			<label for="jobwp_company_email"><?php _e('Company Email', 'jobwp'); ?></label>
			<input type="text" id="jobwp_company_email" name="jobwp_company_email" class="jobwp_company_email">

		</div>
		<div class="form-field term-group">

			<label for="jobwp_company_web"><?php _e('Company Website', 'jobwp'); ?></label>
			<input type="text" id="jobwp_company_web" name="jobwp_company_web" class="jobwp_company_web">
			
		</div>
		<div class="form-field term-group">

			<label for="jobwp_company_addr"><?php _e('Company Address', 'jobwp'); ?></label>
			<input type="text" id="jobwp_company_addr" name="jobwp_company_addr" class="jobwp_company_addr">
			
		</div>
		<div class="form-field term-group">

			<label for="jobwp_company_logo_id"><?php _e('Company Logo', 'jobwp'); ?></label>
			<input type="hidden" id="jobwp_company_logo_id" name="jobwp_company_logo_id" class="jobwp_company_logo_id" value="">

			<div id="jobwp_company_logo_wrapper"></div>

			<p>
				<input type="button" class="button button-secondary jobwp_company_logo_button_add" id="jobwp_company_logo_button_add" name="jobwp_company_logo_button_add" value="<?php _e( 'Add Logo', 'jobwp' ); ?>">
				<input type="button" class="button button-secondary jobwp_company_logo_button_remove" id="jobwp_company_logo_button_remove" name="jobwp_company_logo_button_remove" value="<?php _e( 'Remove Logo', 'jobwp' ); ?>">
			</p>

		</div>
		<?php
	}

	/**
	 * Company Extra Column Header
	 */
	function jobwp_display_company_extra_column_header( $columns ) {
		$columns['jobwp_company_logo'] 	= __('Logo', 'jobwp');
		$columns['jobwp_company_email']	= __('Email', 'jobwp');
		$columns['jobwp_company_web']	= __('Website', 'jobwp');
		$columns['jobwp_company_addr']	= __('Address', 'jobwp');
		return $columns;
	}

	/**
	 * Set single items order
	 */
	function jobwp_set_single_items_order() {

		delete_option('jobwp_single_item_order_list');
		$new_order 	= $_POST['jobwp_single_sort_item'];
		$new_list	= array();
		
		$i=0;
		foreach ( $new_order as $order ) {
			
			if ( ! isset( $new_list[$i] ) ) {
				$new_list[$i] = $order;
			}
			$i++;
		}
		
		update_option('jobwp_single_item_order_list', $new_list);
		
		die();
	}
}
?>