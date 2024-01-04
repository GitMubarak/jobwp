<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
* Trait: Search Styles Settings
*/
trait Jobwp_Search_Styles_Settings
{
    protected $fields, $settings, $options;
    
    protected function jobwp_set_search_styles_settings( $post ) {

        $this->fields   = $this->jobwp_search_styles_option_fileds();

        $this->options  = $this->jobwp_build_set_settings_options( $this->fields, $post );

        $this->settings = apply_filters( 'jobwp_search_styles', $this->options, $post );

        return update_option( 'jobwp_search_styles', $this->settings );

    }

    function jobwp_get_search_styles_settings() {

        $this->fields   = $this->jobwp_search_styles_option_fileds();
		$this->settings = get_option('jobwp_search_styles');
        
        return $this->jobwp_build_get_settings_options( $this->fields, $this->settings );
	}

    protected function jobwp_search_styles_option_fileds() {

        return [
            [
                'name'      => 'jobwp_search_btn_bg_color',
                'type'      => 'text',
                'default'   => '#13b5ea',
            ],
            [
                'name'      => 'jobwp_search_btn_font_color',
                'type'      => 'text',
                'default'   => '#FFF',
            ],
            [
                'name'      => 'jobwp_search_btn_font_size',
                'type'      => 'number',
                'default'   => '14',
            ],
            [
                'name'      => 'jobwp_search_btn_bg_color_hvr',
                'type'      => 'text',
                'default'   => '#6fa0df',
            ],
            [
                'name'      => 'jobwp_search_btn_font_color_hvr',
                'type'      => 'text',
                'default'   => '#FFF',
            ],
        ];
    }
}