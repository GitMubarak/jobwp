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
                'name'      => 'jobwp_hide_search_keyword',
                'type'      => 'boolean',
                'default'   => false,
            ],
            [
                'name'      => 'jobwp_search_keyword_ph',
                'type'      => 'text',
                'default'   => 'Keyword',
            ],
            [
                'name'      => 'jobwp_hide_search_category',
                'type'      => 'boolean',
                'default'   => false,
            ],
            [
                'name'      => 'jobwp_search_category_ph',
                'type'      => 'text',
                'default'   => 'All Job Category',
            ],
            [
                'name'      => 'jobwp_hide_search_jobtype',
                'type'      => 'boolean',
                'default'   => false,
            ],
            [
                'name'      => 'jobwp_search_jobtype_ph',
                'type'      => 'text',
                'default'   => 'All Job Type',
            ],
            [
                'name'      => 'jobwp_hide_search_location',
                'type'      => 'boolean',
                'default'   => false,
            ],
            [
                'name'      => 'jobwp_search_location_ph',
                'type'      => 'text',
                'default'   => 'All Job Location',
            ],
            [
                'name'      => 'jobwp_search_button_txt',
                'type'      => 'text',
                'default'   => 'Search Job',
            ],
            [
                'name'      => 'jobwp_hide_search_level',
                'type'      => 'boolean',
                'default'   => false,
            ],
            [
                'name'      => 'jobwp_search_level_ph',
                'type'      => 'text',
                'default'   => 'All Job Level',
            ],
            [
                'name'      => 'jobwp_search_title_order',
                'type'      => 'number',
                'default'   => '1',
            ],
            [
                'name'      => 'jobwp_search_category_order',
                'type'      => 'number',
                'default'   => '2',
            ],
            [
                'name'      => 'jobwp_search_type_order',
                'type'      => 'number',
                'default'   => '3',
            ],
            [
                'name'      => 'jobwp_search_location_order',
                'type'      => 'number',
                'default'   => '4',
            ],
            [
                'name'      => 'jobwp_search_level_order',
                'type'      => 'number',
                'default'   => '5',
            ],
        ];
    }
}