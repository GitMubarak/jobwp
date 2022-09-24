<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
* Trait: Listing Styles Settings
*/
trait Jobwp_Listing_Styles_Settings
{
    protected $fields, $settings, $options;
    
    protected function jobwp_set_listing_styles_settings( $post ) {

        $this->fields   = $this->jobwp_listing_styles_option_fileds();

        $this->options  = $this->jobwp_build_set_settings_options( $this->fields, $post );

        $this->settings = apply_filters( 'jobwp_listing_styles', $this->options, $post );

        return update_option( 'jobwp_listing_styles', $this->settings );

    }

    function jobwp_get_listing_styles_settings() {

        $this->fields   = $this->jobwp_listing_styles_option_fileds();
		$this->settings = get_option('jobwp_listing_styles');
        
        return $this->jobwp_build_get_settings_options( $this->fields, $this->settings );
	}

    protected function jobwp_listing_styles_option_fileds() {

        return [
            [
                'name'      => 'jobwp_listing_title_font_color',
                'type'      => 'text',
                'default'   => '#242424',
            ],
            [
                'name'      => 'jobwp_listing_title_font_size',
                'type'      => 'number',
                'default'   => '20',
            ],
            [
                'name'      => 'jobwp_listing_overview_font_color',
                'type'      => 'text',
                'default'   => '#555555',
            ],
            [
                'name'      => 'jobwp_listing_overview_font_size',
                'type'      => 'number',
                'default'   => '14',
            ],
        ];
    }
}