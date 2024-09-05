<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
* Trait: Single Styles Settings
*/
trait Jobwp_Email_Settings
{
    protected $fields, $settings, $options;
    
    protected function jobwp_set_email_settings( $post ) {

        $this->fields   = $this->jobwp_email_settings_option_fileds();

        $this->options  = $this->jobwp_build_set_settings_options( $this->fields, $post );

        $this->settings = apply_filters( 'jobwp_email_settings', $this->options, $post );

        return update_option( 'jobwp_email_settings', $this->settings );

    }

    function jobwp_get_email_settings() {

        $this->fields   = $this->jobwp_email_settings_option_fileds();
		$this->settings = get_option('jobwp_email_settings');
        
        return $this->jobwp_build_get_settings_options( $this->fields, $this->settings );
	}

    protected function jobwp_email_settings_option_fileds() {

        return [
            [
                'name'      => 'jobwp_candidate_email_subject',
                'type'      => 'text',
                'default'   => 'Thank you for applying!',
            ],
            [
                'name'      => 'jobwp_candidate_email_body',
                'type'      => 'kses_post',
                'default'   => '',
            ],
            [
                'name'      => 'jobwp_re_from_name',
                'type'      => 'text',
                'default'   => '',
            ],
            [
                'name'      => 'jobwp_can_header_from_email',
                'type'      => 'email',
                'default'   => '',
            ],
        ];
    }
}