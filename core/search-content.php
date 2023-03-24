<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
* Trait: Search Content Settings
*/
trait Jobwp_Search_Content_Settings 
{
    protected $fields, $settings, $options;

    protected function jobwp_set_search_content_settings( $post ) {

        $this->fields   = $this->jobwp_search_content_option_fileds();

        $this->options  = $this->jobwp_build_set_settings_options( $this->fields, $post );

        $this->settings = apply_filters( 'jobwp_search_content', $this->options, $post );

        return update_option( 'jobwp_search_content', serialize( $this->settings ) );

    }

    function jobwp_get_search_content_settings() {

        $this->fields   = $this->jobwp_search_content_option_fileds();
		$this->settings = stripslashes_deep( unserialize( get_option('jobwp_search_content') ) );
        
        return $this->jobwp_build_get_settings_options( $this->fields, $this->settings );
	}

    protected function jobwp_search_content_option_fileds() {

        return [
            [
                'name'      => 'jobwp_hide_search_panel',
                'type'      => 'boolean',
                'default'   => false,
            ],
            [
                'name'      => 'jobwp_list_display_experience',
                'type'      => 'boolean',
                'default'   => false,
            ],
            [
                'name'      => 'jobwp_list_exp_lbl_txt',
                'type'      => 'text',
                'default'   => 'Experience',
            ],
        ];
    }
}