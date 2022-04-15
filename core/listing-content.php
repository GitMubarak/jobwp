<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
* Trait: Listing Content Settings
*/
trait Jobwp_Listing_Content_Settings 
{
    protected $fields, $settings, $options;

    protected function jobwp_set_listing_content_settings( $post ) {

        $this->fields   = $this->jobwp_listing_content_option_fileds();

        $this->options  = $this->jobwp_build_set_settings_options( $this->fields, $post );

        $this->settings = apply_filters( 'jobwp_detail_settings', $this->options, $post );

        return update_option( 'jobwp_detail_settings', serialize( $this->settings ) );

    }

    function jobwp_get_listing_content_settings() {

        $this->fields   = $this->jobwp_listing_content_option_fileds();
		$this->settings = stripslashes_deep( unserialize( get_option('jobwp_detail_settings') ) );
        
        return $this->jobwp_build_get_settings_options( $this->fields, $this->settings );
	}

    protected function jobwp_listing_content_option_fileds() {

        return [
            [
                'name'      => 'jobwp_list_exp_lbl_txt',
                'type'      => 'text',
                'default'   => 'Experience',
            ],
        ];
    }
}