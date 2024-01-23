<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
* Trait: Single Styles Settings
*/
trait JobwpGeneralSettings
{
    protected $fields, $settings, $options;
    
    protected function jobwp_set_general_settings( $post ) {

        $this->fields   = $this->jobwp_general_settings_option_fileds();

        $this->options  = $this->jobwp_build_set_settings_options( $this->fields, $post );

        $this->settings = apply_filters( 'jobwp_general_settings', $this->options, $post );

        return update_option( 'jobwp_general_settings', $this->settings );

    }

    function jobwp_get_general_settings() {

        $this->fields   = $this->jobwp_general_settings_option_fileds();
		$this->settings = get_option('jobwp_general_settings');
        
        return $this->jobwp_build_get_settings_options( $this->fields, $this->settings );
	}

    protected function jobwp_general_settings_option_fileds() {

        return [
            [
                'name'      => 'jobwp_admin_noti_email',
                'type'      => 'email',
                'default'   => '',
            ],
            [
                'name'      => 'jobwp_list_layout',
                'type'      => 'string',
                'default'   => 'list',
            ],
            [
                'name'      => 'jobwp_ext_application_form',
                'type'      => 'boolean',
                'default'   => false,
            ],
            [
                'name'      => 'jobwp_ext_application_form_shortcode',
                'type'      => 'text',
                'default'   => '',
            ],
            [
                'name'      => 'jobwp_ext_apply_now_url',
                'type'      => 'boolean',
                'default'   => false,
            ],
            [
                'name'      => 'jobwp_admin_noti_email_users',
                'type'      => 'text',
                'default'   => '',
            ],
            [
                'name'      => 'jobwp_hide_jobs_deadline_over',
                'type'      => 'boolean',
                'default'   => false,
            ],
            [
                'name'      => 'jobwp_recaptcha_site_key',
                'type'      => 'text',
                'default'   => '',
            ],
            [
                'name'      => 'jobwp_recaptcha_secret_key',
                'type'      => 'text',
                'default'   => '',
            ],
        ];
    }
}