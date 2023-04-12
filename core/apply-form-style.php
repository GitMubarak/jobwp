<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
* Trait: ApplyForm Style Settings
*/
trait Jobwp_ApplyForm_Style_Settings 
{
    protected $fields, $settings, $options;

    protected function jobwp_set_apply_form_style_settings( $post ) {

        $this->fields   = $this->jobwp_apply_form_style_option_fileds();

        $this->options  = $this->jobwp_build_set_settings_options( $this->fields, $post );

        $this->settings = apply_filters( 'jobwp_apply_form_style', $this->options, $post );

        return update_option( 'jobwp_apply_form_style', serialize( $this->settings ) );

    }

    function jobwp_get_apply_form_style_settings() {

        $this->fields   = $this->jobwp_apply_form_style_option_fileds();
		$this->settings = stripslashes_deep( unserialize( get_option('jobwp_apply_form_style') ) );
        
        return $this->jobwp_build_get_settings_options( $this->fields, $this->settings );
	}

    protected function jobwp_apply_form_style_option_fileds() {

        return [
            [
                'name'      => 'jobwp_apply_form_bg_color',
                'type'      => 'text',
                'default'   => '#FFF',
            ],
            [
                'name'      => 'jobwp_apply_form_title_color',
                'type'      => 'text',
                'default'   => '#222',
            ],
            [
                'name'      => 'jobwp_apply_form_title_font_size',
                'type'      => 'number',
                'default'   => '30',
            ],
            [
                'name'      => 'jobwp_apply_form_label_color',
                'type'      => 'text',
                'default'   => '#333',
            ],
            [
                'name'      => 'jobwp_apply_form_label_font_size',
                'type'      => 'number',
                'default'   => '14',
            ],
            [
                'name'      => 'jobwp_apply_form_input_color',
                'type'      => 'text',
                'default'   => '#666',
            ],
            [
                'name'      => 'jobwp_apply_form_input_font_size',
                'type'      => 'number',
                'default'   => '14',
            ],
            [
                'name'      => 'jobwp_apply_form_input_bg_color',
                'type'      => 'text',
                'default'   => '#FAFAFA',
            ],
            [
                'name'      => 'jobwp_apply_form_input_border_color',
                'type'      => 'text',
                'default'   => '#DDD',
            ],
            [
                'name'      => 'jobwp_apply_form_btn_bg_color',
                'type'      => 'text',
                'default'   => '#0274be;',
            ],
            [
                'name'      => 'jobwp_apply_form_btn_font_color',
                'type'      => 'text',
                'default'   => '#FFF',
            ],
            [
                'name'      => 'jobwp_apply_form_btn_font_size',
                'type'      => 'number',
                'default'   => '22',
            ],
            [
                'name'      => 'jobwp_apply_form_btn_hvr_bg_color',
                'type'      => 'text',
                'default'   => '#0274be;',
            ],
            [
                'name'      => 'jobwp_apply_form_btn_hvr_font_color',
                'type'      => 'text',
                'default'   => '#FFF',
            ],
        ];
    }
}