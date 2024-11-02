<?php
/**
 * Plugin Name:         JobWP
 * Plugin URI:		    https://wordpress.org/plugins/jobwp/
 * Description: 	    Display job listings in a career page and allow users to apply directly to your site.
 * Version:             2.3.7
 * Author:		        HM Plugin
 * Author URI:	        https://hmplugin.com
 * Requires at least:   5.4
 * Requires PHP:        7.2
 * Tested up to:        6.6.2
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
        define('JOBWP_VERSION', '2.3.7');

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
            
            // Company Extra Info Save
            add_action( 'created_job_company', 'jobwp_save_company_data', 10, 2 );
            function jobwp_save_company_data( $term_id, $tt_id ) {
                
                // Email
                $email = ( isset( $_POST['jobwp_company_email'] ) && '' !== $_POST['jobwp_company_email'] ) ? sanitize_email( $_POST['jobwp_company_email'] ) : '';
                add_term_meta( $term_id, 'jobwp_company_email', $email, true );

                // Logo
                $logo = ( isset( $_POST['jobwp_company_logo_id'] ) && '' !== $_POST['jobwp_company_logo_id'] ) ? sanitize_url( $_POST['jobwp_company_logo_id'] ) : '';
                add_term_meta( $term_id, 'jobwp_company_logo_id', $logo, true );

                // Website
                $web = ( isset( $_POST['jobwp_company_web'] ) && '' !== $_POST['jobwp_company_web'] ) ? sanitize_url( $_POST['jobwp_company_web'] ) : '';
                add_term_meta( $term_id, 'jobwp_company_web', $web, true );

                // Address
                $addr = ( isset( $_POST['jobwp_company_addr'] ) && '' !== $_POST['jobwp_company_addr'] ) ? sanitize_text_field( $_POST['jobwp_company_addr'] ) : '';
                add_term_meta( $term_id, 'jobwp_company_addr', $addr, true );
            }

            // Company Extra Column Data
            add_action( 'manage_job_company_custom_column', 'jobwp_display_data_to_company_column', 10, 3 );
            function jobwp_display_data_to_company_column( $string, $columns, $term_id ) {
            
                $jobwp_company_logo_id	= get_term_meta( $term_id, 'jobwp_company_logo_id', true );
                $jobwp_company_email	= get_term_meta( $term_id, 'jobwp_company_email', true );
                $jobwp_company_web      = get_term_meta( $term_id, 'jobwp_company_web', true );
                $jobwp_company_addr     = get_term_meta( $term_id, 'jobwp_company_addr', true );
            
                switch ( $columns ) {
                    case 'jobwp_company_logo' :
                        ?>
                        <img src="<?php echo esc_url( $jobwp_company_logo_id ); ?>" style="width: 80px"/>
                        <?php
                    break;
                    case 'jobwp_company_email' :
                        esc_html_e( $jobwp_company_email );
                    break;
                    case 'jobwp_company_web' :
                        echo esc_url( $jobwp_company_web );
                    break;
                    case 'jobwp_company_addr' :
                        esc_html_e( $jobwp_company_addr );
                    break;
                }
            }

            // Company Extra Info Edit Form
            add_action( 'job_company_edit_form_fields', 'jobwp_company_edit_form', 10, 2 );
            function jobwp_company_edit_form( $term, $taxonomy ) {
    
                $jobwp_company_logo_id	= get_term_meta( $term->term_id, 'jobwp_company_logo_id', true );
                $jobwp_company_email	= get_term_meta( $term->term_id, 'jobwp_company_email', true );
                $jobwp_company_web      = get_term_meta( $term->term_id, 'jobwp_company_web', true );
                $jobwp_company_addr     = get_term_meta( $term->term_id, 'jobwp_company_addr', true );
                ?>
                <tr class="form-field term-group-wrap">
                    <th scope="row">
                        <label for="jobwp_company_email"><?php _e('Company Email', JOBWP_TXT_DOMAIN); ?></label>
                    </th>
                    <td>
                        <input type="text" id="jobwp_company_email" name="jobwp_company_email" value="<?php esc_attr_e( $jobwp_company_email ); ?>">
                    </td>
                </tr>
                <tr class="form-field term-group-wrap">
                    <th scope="row">
                        <label for="jobwp_company_web"><?php _e('Company Website', JOBWP_TXT_DOMAIN); ?></label>
                    </th>
                    <td>
                        <input type="text" id="jobwp_company_web" name="jobwp_company_web" value="<?php esc_attr_e( $jobwp_company_web ); ?>">
                    </td>
                </tr>
                <tr class="form-field term-group-wrap">
                    <th scope="row">
                        <label for="jobwp_company_addr"><?php _e('Company Address', JOBWP_TXT_DOMAIN); ?></label>
                    </th>
                    <td>
                        <input type="text" id="jobwp_company_addr" name="jobwp_company_addr" value="<?php esc_attr_e( $jobwp_company_addr ); ?>">
                    </td>
                </tr>
                <tr class="form-field term-group-wrap">
                    <th scope="row">
                        <label for="jobwp_company_logo_id"><?php _e('Company Logo', JOBWP_TXT_DOMAIN); ?></label>
                    </th>
                    <td>
                        <input type="hidden" id="jobwp_company_logo_id" name="jobwp_company_logo_id" value="<?php esc_attr_e( $jobwp_company_logo_id ); ?>">
            
                        <div id="jobwp_company_logo_wrapper">
                            <img src="<?php echo esc_url( $jobwp_company_logo_id ); ?>" style="width: 200px"/>
                        </div>
            
                        <p>
                            <input type="button" class="button button-secondary jobwp_company_logo_button_add" id="jobwp_company_logo_button_add" name="jobwp_company_logo_button_add" value="<?php _e( 'Change Logo', JOBWP_TXT_DOMAIN ); ?>">
                            <input type="button" class="button button-secondary jobwp_company_logo_button_remove" id="jobwp_company_logo_button_remove" name="jobwp_company_logo_button_remove" value="<?php _e( 'Remove Logo', JOBWP_TXT_DOMAIN ); ?>">
                        </p>
                    </td>
                </tr>
                <?php
            }

            // Company Extra Info Update Data
            add_action( 'edited_job_company', 'jobwp_update_company_data', 10, 2 );
            function jobwp_update_company_data( $term_id, $tt_id ) {

                $logo = ( isset( $_POST['jobwp_company_logo_id'] ) && '' !== $_POST['jobwp_company_logo_id'] ) ? sanitize_url( $_POST['jobwp_company_logo_id'] ) : '';
                update_term_meta ( $term_id, 'jobwp_company_logo_id', $logo );
            
                $email = ( isset( $_POST['jobwp_company_email'] ) && '' !== $_POST['jobwp_company_email'] ) ? sanitize_email( $_POST['jobwp_company_email'] ) : '';
                update_term_meta( $term_id, 'jobwp_company_email', $email );

                $web = ( isset( $_POST['jobwp_company_web'] ) && '' !== $_POST['jobwp_company_web'] ) ? sanitize_url( $_POST['jobwp_company_web'] ) : '';
                update_term_meta ( $term_id, 'jobwp_company_web', $web );

                $addr = ( isset( $_POST['jobwp_company_addr'] ) && '' !== $_POST['jobwp_company_addr'] ) ? sanitize_text_field( $_POST['jobwp_company_addr'] ) : '';
                update_term_meta ( $term_id, 'jobwp_company_addr', $addr );
            }
            
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

    }
}