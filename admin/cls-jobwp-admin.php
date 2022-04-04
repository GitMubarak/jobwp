<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Master Class: Admin
*/
class JobWp_Admin 
{
	use Jobwp_Core, Jobwp_Single_Content_Settings;

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

		wp_enqueue_style( 'wp-color-picker');
		wp_enqueue_script( 'wp-color-picker');

		wp_enqueue_style(
			$this->jobwp_assets_prefix . 'admin',
			JOBWP_ASSETS . 'css/' . $this->jobwp_assets_prefix . 'admin.css',
			array(),
			$this->jobwp_version,
			FALSE
		);

		if ( ! wp_script_is('jquery') ) {
			wp_enqueue_script('jquery');
		}

		// You need styling for the datepicker. For simplicity I've linked to Google's hosted jQuery UI CSS.
		wp_register_style('jquery-ui', '//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css');
		wp_enqueue_style('jquery-ui');
		// Load the datepicker script (pre-registered in WordPress).
		wp_enqueue_script('jquery-ui-datepicker');
		
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
			__('Listing Settings', JOBWP_TXT_DOMAIN),
			__('Listing Settings', JOBWP_TXT_DOMAIN),
			'manage_options',
			'jobwp-listing-settings',
			array($this, JOBWP_PRFX . 'listing_settings'),
		);

		add_submenu_page(
			$jobwp_cpt_menu,
			__('Detail Page Settings', JOBWP_TXT_DOMAIN),
			__('Detail Page Settings', JOBWP_TXT_DOMAIN),
			'manage_options',
			'jobwp-single-settings',
			array($this, JOBWP_PRFX . 'single_settings'),
		);

		add_submenu_page(
			$jobwp_cpt_menu,
			__('Application List', JOBWP_TXT_DOMAIN),
			__('Application List', JOBWP_TXT_DOMAIN),
			'manage_options',
			'jobwp-application-list',
			array($this, JOBWP_PRFX . 'application_list'),
		);
	}

	/**
	 *	Function For Loading Listing Settings Page
	 */
	function jobwp_listing_settings() {

		if ( ! current_user_can( 'manage_options' ) ) {
			return;
		}
	
		$jobwpTab = isset( $_GET['tab'] ) ? sanitize_text_field( $_GET['tab'] ) : null;

		require_once JOBWP_PATH . 'admin/view/listing-settings.php';
	}

	function jobwp_single_settings() {

		if ( ! current_user_can( 'manage_options' ) ) {
			return;
		}
	
		$jobwpTab = isset( $_GET['tab'] ) ? sanitize_text_field( $_GET['tab'] ) : null;

		$jobwpSingleMessage = false;

		if ( isset( $_POST['updateSingleContent'] ) ) {

			$jobwpSingleMessage = $this->jobwp_set_single_content_settings( $_POST );

		}

		$jobwpSingleContent = $this->jobwp_get_single_content_settings();

		require_once JOBWP_PATH . 'admin/view/single-settings.php';
	}

	/**
	 *	Function For Loading General Settings Page
	 */
	function jobwp_application_list() {

		$jobwpColumns = array(
			'jobwp_list_sl'				=> __('#', JOBWP_TXT_DOMAIN),
			'jobwp_applied_for' 		=> __('Applied For', JOBWP_TXT_DOMAIN),
			'jobwp_applicant_name'		=> __('Name', JOBWP_TXT_DOMAIN),
			'jobwp_applicant_email'		=> __('Email', JOBWP_TXT_DOMAIN),
			'jobwp_applicant_phone'		=> __('Phone', JOBWP_TXT_DOMAIN),
			'jobwp_applicant_message'	=> __('Message', JOBWP_TXT_DOMAIN),
			'jobwp_applicant_resume'	=> __('Resume', JOBWP_TXT_DOMAIN),
			'jobwp_applied_on'			=> __('Date', JOBWP_TXT_DOMAIN),
		);

		register_column_headers('jobwp-allication-table-column', $jobwpColumns);

		$applications = $this->jobwp_get_all_applications();

		$jobwpDir = wp_upload_dir();
		$jobwpDir = $jobwpDir['baseurl'] . '/jobwp-resume';
		?>
		<div id="jobwp-wrap-all" class="wrap">
			<h2 class="jobwp-admin-page-title"><?php _e('Application Lists', JOBWP_TXT_DOMAIN); ?></h2>
			<table class="wp-list-table widefat fixed striped posts" cellspacing="0" id="wpc_data_table">
				<thead>
					<tr>
						<?php print_column_headers('jobwp-allication-table-column'); ?>
					</tr>
				</thead>
				<tbody id="the-list">
					<?php
					$jL = 1;
					if ( count( $applications ) > 0 ) {
						foreach ( $applications as $application ) {
							?>
							<tr>
								<td><?php printf('%d', $jL); ?></td>
								<td><?php printf('%s', $application->applied_for); ?></td>
								<td><?php printf('%s', $application->applicant_name); ?></td>
								<td><?php printf('%s', $application->applicant_email); ?></td>
								<td><?php printf('%s', $application->applicant_phone); ?></td>
								<td><?php printf('%s', $application->applicant_message); ?></td>
								<td><a href="<?php printf('%s/%s', $jobwpDir, $application->resume_name); ?>"><?php esc_html_e( $application->resume_name ); ?></a></td>
								<td><?php printf('%s', date('D d M Y - h:i A', strtotime($application->applied_on))); ?>
								</td>
							</tr>
							<?php 
							$jL++;
						}
					}
					?>
				</tbody>
				<tfoot>
					<tr>
						<?php print_column_headers('jobwp-allication-table-column', false); ?>
					</tr>
				</tfoot>
			</table>
		</div>
		<?php
	}

	/**
	 *	Function For Loading Jobs Custom Post Type
	 */
	function jobwp_custom_post_type() {

		$labels = array(
							'name'                => __('All Jobs'),
							'singular_name'       => __('WP Jobs'),
							'menu_name'           => __('WP Jobs'),
							'parent_item_colon'   => __('Parent Job'),
							'all_items'           => __('All Jobs'),
							'view_item'           => __('View Job'),
							'add_new_item'        => __('Add New Job'),
							'add_new'             => __('Add New'),
							'edit_item'           => __('Edit Job'),
							'update_item'         => __('Update Job'),
							'search_items'        => __('Search Job'),
							'not_found'           => __('Not Found'),
							'not_found_in_trash'  => __('Not found in Trash')
						);
		$args = array(
						'label'               => __('jobs'),
						'description'         => __('Description For Job'),
						'labels'              => $labels,
						'supports'            => array('title', 'editor', 'page-attributes'),
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
						'capability_type'     => 'page',
						'menu_icon'           => 'dashicons-portfolio'
					);

		register_post_type('jobs', $args);
	}

	/**
	 *	Function For Loading Jobs Taxonomy
	 */
	function jobwp_taxonomy() {

		$labels = array(
			'name' 				=> __('Job Categories', JOBWP_TXT_DOMAIN),
			'singular_name' 	=> __('Job Category', JOBWP_TXT_DOMAIN),
			'search_items' 		=> __('Search Job Categories', JOBWP_TXT_DOMAIN),
			'all_items' 		=> __('All Job Categories', JOBWP_TXT_DOMAIN),
			'parent_item' 		=> __('Parent Job Category', JOBWP_TXT_DOMAIN),
			'parent_item_colon'	=> __('Parent Job Category:', JOBWP_TXT_DOMAIN),
			'edit_item' 		=> __('Edit Job Category', JOBWP_TXT_DOMAIN),
			'update_item' 		=> __('Update Job Category', JOBWP_TXT_DOMAIN),
			'add_new_item' 		=> __('Add New Job Category', JOBWP_TXT_DOMAIN),
			'new_item_name' 	=> __('New Job Category Name', JOBWP_TXT_DOMAIN),
			'menu_name' 		=> __('Job Categories', JOBWP_TXT_DOMAIN),
		);

		register_taxonomy('jobs_category', array('jobs'), array(
			'hierarchical' 		=> true,
			'labels' 			=> $labels,
			'show_ui' 			=> true,
			'show_admin_column' => true,
			'query_var' 		=> true,
			'rewrite' 			=> array('slug' => 'job-category'),
		));
	}

	/**
	 *	Function For Loading Jobs Metaboxes
	 */
	function jobwp_metaboxes() {

		add_meta_box(
			'jobwp_metaboxes',
			__('Job Details:', JOBWP_TXT_DOMAIN),
			array( $this, JOBWP_PRFX . 'metabox_content' ),
			'jobs',
			'normal',
			'high'
		);

		add_meta_box(
			'jobwp-metabox-responsibilities',
			__( 'Responsibilities:', JOBWP_TXT_DOMAIN ),
			array( $this, 'jobwp_metabox_responsibilities' ),
			'jobs',
			'normal',
			'high'
		);
	
		add_meta_box(
			'jobwp-metabox-skills',
			__( 'Skills Required:', JOBWP_TXT_DOMAIN ),
			array( $this, 'jobwp_metabox_skills' ),
			'jobs',
			'normal',
			'high'
		);
	
		add_meta_box(
			'jobwp-metabox-additional-requirements',
			__( 'Additional Requirements:', JOBWP_TXT_DOMAIN ),
			array( $this, 'jobwp_metabox_additional_requirements' ),
			'jobs',
			'normal',
			'high'
		);
	
		add_meta_box(
			'jobwp-metabox-salary',
			__( 'Salary:', JOBWP_TXT_DOMAIN ),
			array( $this, 'jobwp_metaboxe_salary' ),
			'jobs',
			'normal',
			'high'
		);
	
		add_meta_box(
			'jobwp-metabox-benefits',
			__( 'Other Benefits:', JOBWP_TXT_DOMAIN ),
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

		$jobwp_experience 	= get_post_meta( $post->ID, 'jobwp_experience', true );
		$jobwp_vacancies	= get_post_meta( $post->ID, 'jobwp_vacancies', true );
		$jobwp_nature 		= get_post_meta( $post->ID, 'jobwp_nature', true );
		$jobwp_level 		= get_post_meta( $post->ID, 'jobwp_level', true );
		$jobwp_location 	= get_post_meta( $post->ID, 'jobwp_location', true );
		$jobwp_edu_req 		= get_post_meta( $post->ID, 'jobwp_edu_req', true );
		$jobwp_deadline 	= get_post_meta( $post->ID, 'jobwp_deadline', true );
		$jobwp_status		= get_post_meta( $post->ID, 'jobwp_status', true );

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

		$jobwp_meta_posts = $_POST;

		$jobwp_meta_params = array(

			'jobwp_experience'			=> isset( $_POST['jobwp_experience'] ) ? sanitize_text_field( $_POST['jobwp_experience'] ) : null,
			'jobwp_vacancies' 			=> isset( $_POST['jobwp_vacancies'] ) ? sanitize_text_field( $_POST['jobwp_vacancies'] ) : null,
			'jobwp_nature' 				=> isset( $_POST['jobwp_nature'] ) ? sanitize_text_field( $_POST['jobwp_nature'] ) : null,
			'jobwp_level' 				=> isset( $_POST['jobwp_level'] ) ? sanitize_text_field( $_POST['jobwp_level'] ) : null,
			'jobwp_location' 			=> isset( $_POST['jobwp_location'] ) ? sanitize_text_field( $_POST['jobwp_location'] ) : null,
			'jobwp_edu_req' 			=> isset( $_POST['jobwp_edu_req'] ) ? sanitize_text_field( $_POST['jobwp_edu_req'] ) : null,
			'jobwp_deadline'			=> isset( $_POST['jobwp_deadline'] ) ? sanitize_text_field($_POST['jobwp_deadline']) : null,
			'jobwp_status'				=> isset( $_POST['jobwp_status'] ) ? sanitize_text_field( $_POST['jobwp_status'] ) : null,
			'jobwp_responsibilities'	=> isset( $_POST['jobwp_responsibilities'] ) ? wp_kses_post( $_POST['jobwp_responsibilities'] ) : null,
			'jobwp_skills'				=> isset( $_POST['jobwp_skills'] ) ? wp_kses_post( $_POST['jobwp_skills'] ) : null,
			'jobwp_add_req'				=> isset( $_POST['jobwp_add_req'] ) ? wp_kses_post( $_POST['jobwp_add_req'] ) : null,
			'jobwp_salary'				=> isset( $_POST['jobwp_salary'] ) ? wp_kses_post( $_POST['jobwp_salary'] ) : null,
			'jobwp_other_benefits'		=> isset( $_POST['jobwp_other_benefits'] ) ? wp_kses_post( $_POST['jobwp_other_benefits'] ) : null,
		);

		$jobwp_meta = apply_filters( 'jobwp_meta_arr', $jobwp_meta_params, $jobwp_meta_posts );

		foreach( $jobwp_meta as $key => $value ) {

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
			<strong><?php esc_html_e( ucfirst( $type ), JOBWP_TXT_DOMAIN ); ?>!</strong>
			<?php esc_html_e( $msg, JOBWP_TXT_DOMAIN ); ?>
		</div>
		<?php 
	}

	/**
	 * 
	 */
	private function jobwp_get_all_applications() {
		
		global $wpdb;
    	$table_name     = $wpdb->prefix . 'jobwp_applied';
		return $wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name WHERE %d ORDER BY job_id DESC", 1));
	}
}
?>