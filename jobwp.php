<?php
/**
 * Plugin Name:         JobWP
 * Plugin URI:		    https://wordpress.org/plugins/jobwp/
 * Description: 	    Display job listings in a career page and allow users to apply directly to your site.
 * Version:             2.5.0
 * Author:		        HM Plugin
 * Author URI:	        https://hmplugin.com
 * Tested up to:        7.0
 * Requires at least:   5.8
 * Requires PHP:        7.4
 * Text Domain:         jobwp
 * Domain Path:         /languages/
 * License:             GPL-2.0+
 * License URI:         http://www.gnu.org/licenses/gpl-2.0.txt
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( function_exists( 'job_fs' ) ) {

    job_fs()->set_basename( true, __FILE__ );
  
} else {
  
    if ( ! class_exists('JobWp_Master') ) {

        define('JOBWP_PATH', plugin_dir_path(__FILE__));
        define('JOBWP_ASSETS', plugins_url('/assets/', __FILE__));
        define('JOBWP_SLUG', plugin_basename(__FILE__));
        define('JOBWP_PRFX', 'jobwp_');
        define('JOBWP_CLS_PRFX', 'cls-jobwp-');
        define('JOBWP_TXT_DOMAIN', 'jobwp');
        define('JOBWP_VERSION', '2.5.0');

        require_once JOBWP_PATH . '/lib/freemius-integrator.php';
        require_once JOBWP_PATH . 'inc/' . JOBWP_CLS_PRFX . 'master.php';
        $jobwp = new JobWp_Master();
        register_activation_hook(__FILE__, array($jobwp, JOBWP_PRFX . 'create_tables'));
        $jobwp->jobwp_run();

        // rewrite_rules upon plugin activation
        register_activation_hook( __FILE__, 'jobwp_myplugin_activate' );
        function jobwp_myplugin_activate() {
            if ( ! get_option( 'jobwp_flush_rewrite_rules_flag' ) ) {
                add_option( 'jobwp_flush_rewrite_rules_flag', true );
            }
        }

        add_action( 'init', 'jobwp_flush_rewrite_rules_maybe', 10 );
        function jobwp_flush_rewrite_rules_maybe() {
            if( get_option( 'jobwp_flush_rewrite_rules_flag' ) ) {
                flush_rewrite_rules();
                delete_option( 'jobwp_flush_rewrite_rules_flag' );
            }
        }

        if ( job_fs()->is_plan__premium_only('pro', true) ) {
            
            // Loading extra fields in job company
            include 'company-extra-fields.php';
            //===============================================

            /*
            * Add HR Role
            */
            function jobwp_add_hr_role() {
                
                add_role(
                    'hr_user',
                    'HR User',
                    array(
                        'read'         => true,
                        'edit_posts'   => true,
                        'upload_files' => true,
                    )
                );
            }
            add_action( 'init', 'jobwp_add_hr_role' );
            
            /*
            * Add HR User capabilities 
            * Priority must be after the initial role definition
            */
            function jobwp_hr_role_capabilities() {

                $role = get_role( 'hr_user' );
            
                $role->add_cap( 'edit_others_posts', true );
                $role->add_cap( 'edit_published_posts', true );
                $role->add_cap( 'manage_categories', true );
                $role->add_cap( 'publish_posts', true );
                $role->add_cap( 'upload_files', true );
            } 
            add_action( 'init', 'jobwp_hr_role_capabilities', 11 );

            /*
            * Removing some menu for HR Users
            */
            function jobwp_adjust_hr_admin_menu() {

                $user = wp_get_current_user();

                if ( in_array( 'hr_user', (array) $user->roles ) ) {
                    
                    remove_menu_page( 'index.php' );                  //Dashboard
                    remove_menu_page( 'jetpack' );                    //Jetpack* 
                    remove_menu_page( 'edit.php' );                   //Posts
                    remove_menu_page( 'edit.php?post_type=page' );    //Pages
                    remove_menu_page( 'edit-comments.php' );          //Comments
                    remove_menu_page( 'themes.php' );                 //Appearance
                    remove_menu_page( 'plugins.php' );                //Plugins
                    remove_menu_page( 'users.php' );                  //Users
                    remove_menu_page( 'tools.php' );                  //Tools
                    remove_menu_page( 'options-general.php' );        //Settings
                    remove_menu_page( 'profile.php' );                //Profile
                    remove_menu_page( 'edit.php?post_type=wpcr3_review' ); //Settings
                    remove_menu_page( 'upload.php' );                 //Media
                }
            }
            add_action( 'admin_menu','jobwp_adjust_hr_admin_menu', 1 );

            /*
            * Removing Admin Bar Menu for HR Users
            */
            function jobwp_remove_admin_bar_menu_for_hr_users() {

                global $wp_admin_bar;

                $user = wp_get_current_user();
                
                if ( in_array( 'hr_user', (array) $user->roles ) ) {

                    //$wp_admin_bar->remove_node('new-content');
                    $wp_admin_bar->remove_node('new-post');
                    $wp_admin_bar->remove_node('new-link');
                    $wp_admin_bar->remove_node('new-media');
                    $wp_admin_bar->remove_node('comments');
                }
            }
            add_action( 'admin_bar_menu', 'jobwp_remove_admin_bar_menu_for_hr_users', 999 );
        }
        
        // Loading extra fields in job location taxonomy
        // Specially for Google structure data
        include 'location-extra-field.php';
        //===============================================

        // Add a books gallery slug option in permalink setting
        add_action('admin_init', function() {
            add_settings_field('jobwp_cpt_slug', __('JobWP Slug', 'jobwp'), 'jobwp_cpt_slug_output', 'permalink', 'optional');
        });

        // Setting output
        function jobwp_cpt_slug_output() {

            wp_nonce_field('jobwp_cpt_slug_permalink_action', 'jobwp_cpt_slug_permalink_nonce');
            ?>
            <input type="text" name="jobwp_cpt_slug" value="<?php esc_attr_e( get_option('jobwp_cpt_slug') ); ?>" placeholder="<?php echo 'jobs'; ?>" class="regular-text code" />
            <?php
        }

        // Save setting
        add_action('admin_init', function() {

            if ( isset( $_POST['permalink_structure'] ) && current_user_can('manage_options') ) {
                
                if ( isset( $_POST['_wp_http_referer'] ) && strpos( $_POST['_wp_http_referer'], 'options-permalink.php' ) !== false ) {
                    
                    // Checking the nonce exists and is valid
                    if ( ! isset( $_POST['jobwp_cpt_slug_permalink_nonce'] ) || ! wp_verify_nonce( $_POST['jobwp_cpt_slug_permalink_nonce'], 'jobwp_cpt_slug_permalink_action' ) ) {

                        wp_die('Security check failed');
                    
                    } else {
                        
                        update_option( 'jobwp_cpt_slug', trim( sanitize_text_field( $_POST['jobwp_cpt_slug'] ) ) );
                    }
                }
            }
        });
        
        /*
        * Loading text domain at end so that no init error
        */
        function jobwp_load_plugin_textdomain_test() {
            load_plugin_textdomain( 'jobwp', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
        }
        add_action( 'plugins_loaded', 'jobwp_load_plugin_textdomain_test' );

    }
}