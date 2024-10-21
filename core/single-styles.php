<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
* Trait: Single Styles Settings
*/
trait Jobwp_Single_Styles_Settings
{
    protected $fields, $settings, $options;
    
    protected function jobwp_set_single_styles_settings( $post ) {

        $this->fields   = $this->jobwp_single_styles_option_fileds();

        $this->options  = $this->jobwp_build_set_settings_options( $this->fields, $post );

        $this->settings = apply_filters( 'jobwp_single_styles', $this->options, $post );

        return update_option( 'jobwp_single_styles', $this->settings );

    }

    function jobwp_get_single_styles_settings() {

        $this->fields   = $this->jobwp_single_styles_option_fileds();
		$this->settings = get_option('jobwp_single_styles');
        
        return $this->jobwp_build_get_settings_options( $this->fields, $this->settings );
	}

    protected function jobwp_single_styles_option_fileds() {

        return [
            [
                'name'      => 'jobwp_single_container_bg_color',
                'type'      => 'text',
                'default'   => '#FFFFFF',
            ],
            [
                'name'      => 'jobwp_single_title_font_color',
                'type'      => 'text',
                'default'   => '#242424',
            ],
            [
                'name'      => 'jobwp_single_title_font_size',
                'type'      => 'number',
                'default'   => '28',
            ],
            [
                'name'      => 'jobwp_single_info_font_color',
                'type'      => 'text',
                'default'   => '#555555',
            ],
            [
                'name'      => 'jobwp_single_apply_btn_bg_color',
                'type'      => 'text',
                'default'   => '#008b8b',
            ],
            [
                'name'      => 'jobwp_single_title_bg_color',
                'type'      => 'text',
                'default'   => '#EEEEEE',
            ],
            [
                'name'      => 'jobwp_single_how_to_apply_bg_color',
                'type'      => 'text',
                'default'   => '#EEEEEE',
            ],
            [
                'name'      => 'jobwp_single_container_margin_top',
                'type'      => 'number',
                'default'   => '40',
            ],
            [
                'name'      => 'jobwp_single_container_margin_btm',
                'type'      => 'number',
                'default'   => '40',
            ],
            [
                'name'      => 'jobwp_single_apply_btn_font_size',
                'type'      => 'number',
                'default'   => '18',
            ],
            [
                'name'      => 'jobwp_single_apply_btn_font_color',
                'type'      => 'text',
                'default'   => '#FFFFFF',
            ],
            [
                'name'      => 'jobwp_single_apply_btn_padding_h',
                'type'      => 'number',
                'default'   => '15',
            ],
            [
                'name'      => 'jobwp_single_apply_btn_padding_w',
                'type'      => 'number',
                'default'   => '15',
            ],
            [
                'name'      => 'jobwp_single_apply_btn_border_color',
                'type'      => 'text',
                'default'   => '#008b8b',
            ],
            [
                'name'      => 'jobwp_single_apply_btn_bg_clr_hvr',
                'type'      => 'text',
                'default'   => '#FFFFFF',
            ],
            [
                'name'      => 'jobwp_single_apply_btn_brdr_clr_hvr',
                'type'      => 'text',
                'default'   => '#999999',
            ],
            [
                'name'      => 'jobwp_single_apply_btn_font_clr_hvr',
                'type'      => 'text',
                'default'   => '#555555',
            ],
            [
                'name'      => 'jobwp_single_apply_btn_brdr_radius',
                'type'      => 'number',
                'default'   => '0',
            ],
            [
                'name'      => 'jobwp_single_howtoapply_title_font_clr',
                'type'      => 'text',
                'default'   => '#333333',
            ],
            [
                'name'      => 'jobwp_single_howtoapply_title_font_size',
                'type'      => 'number',
                'default'   => '24',
            ],
            [
                'name'      => 'jobwp_single_howtoapply_title_brdr_clr',
                'type'      => 'text',
                'default'   => '#CCCCCC',
            ],
        ];
    }
}