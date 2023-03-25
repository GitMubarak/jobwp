<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
* Trait: ApplyForm Content Settings
*/
trait Jobwp_ApplyForm_Content_Settings 
{
    protected $fields, $settings, $options;

    protected function jobwp_set_apply_form_content_settings( $post ) {

        $this->fields   = $this->jobwp_apply_form_content_option_fileds();

        $this->options  = $this->jobwp_build_set_settings_options( $this->fields, $post );

        $this->settings = apply_filters( 'jobwp_apply_form_content', $this->options, $post );

        return update_option( 'jobwp_apply_form_content', serialize( $this->settings ) );

    }

    function jobwp_get_apply_form_content_settings() {

        $this->fields   = $this->jobwp_apply_form_content_option_fileds();
		$this->settings = stripslashes_deep( unserialize( get_option('jobwp_apply_form_content') ) );
        
        return $this->jobwp_build_get_settings_options( $this->fields, $this->settings );
	}

    protected function jobwp_apply_form_content_option_fileds() {

        return [
            [
                'name'      => 'jobwp_hide_apply_form_title',
                'type'      => 'boolean',
                'default'   => false,
            ],
            [
                'name'      => 'jobwp_apply_form_title',
                'type'      => 'text',
                'default'   => 'Apply for this position',
            ],
            [
                'name'      => 'jobwp_apply_form_name_label',
                'type'      => 'text',
                'default'   => 'Full Name',
            ],
            [
                'name'      => 'jobwp_apply_form_email_label',
                'type'      => 'text',
                'default'   => 'Email',
            ],
            [
                'name'      => 'jobwp_apply_form_cover_letter_label',
                'type'      => 'text',
                'default'   => 'Cover Letter',
            ],
            [
                'name'      => 'jobwp_apply_form_submit_btn_txt',
                'type'      => 'text',
                'default'   => 'Apply Now',
            ],
        ];
    }
}